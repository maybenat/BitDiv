using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;

namespace BitDiv
{
    class Populate
    {
        static string tickerListPath = "https://s3.amazonaws.com/quandl-static-content/Ticker+CSV%27s/WIKI_tickers.csv";
        static string tickerListLocalPath = "ticker_list.csv";

        static string apiCallPrefix = "https://www.quandl.com/api/v1/datasets/";
        static string apiCallType = ".csv";
        static string authToken = "?auth_token=hM_FtE8cFi1AC-e3Sufo";

        static string populateSymbolLogPath = "populateSymbolLog.txt";
        static string populateSymbolListLogPath = "populateSymbolLIstLog.txt";

        public static string quandlTableName = "quandl";
        public static string symbolListTableName = "wiki_eod_symbols";

        static string successCode = "SUCCESS";

        static string downloadCode = "DOWNLOAD";
        static string populateCode = "POPULATE";
        static string deleteCode = "DELETE";

        static WebClient client = new WebClient();
        static DBConnect dbconnector = new DBConnect("eng");

        static System.IO.StreamWriter logger = null;

        static readonly bool cleanupFiles = true;
        static readonly bool populateSymbolList = false;

        public static bool DownloadFile(string remoteFile, string localFile)
        {
            try
            {
                client.DownloadFile(remoteFile, localFile);
            }
            catch (Exception)
            {
                return false;
            }
            return true;
        }

        public static string GetFile(string remoteFile)
        {
            return client.DownloadString(remoteFile);
        }

        public static bool DeleteFile(string localFile)
        {
            try
            {
                File.Delete(localFile);
            }
            catch (Exception)
            {
                return false;
            }
            return true;
        }

        public static void PopulateTable(string tickerListLocalPath)
        {
            System.IO.StreamReader file = new System.IO.StreamReader(tickerListLocalPath);
            if (populateSymbolList)
            {
                string line;
                InitLogger(populateSymbolListLogPath);
                while ((line = file.ReadLine()) != null)
                {
                    String[] lineArray = line.Split(',');
                    if (lineArray[0] != "quandl code")
                    {
                        String[] rowToInsert = new String[3];
                        int comma = line.IndexOf(',');
                        rowToInsert[0] = line.Substring(0, comma);
                        rowToInsert[1] = line.Substring(comma+2,line.Length-comma-3);
                        if (rowToInsert[1].Contains("'"))
                        {
                            int quote = rowToInsert[1].IndexOf("'");

                            rowToInsert[1] = rowToInsert[1].Substring(0, quote) + @"\" + rowToInsert[1].Substring(quote);
                        }
                        rowToInsert[2] = line.Substring(lineArray[0].IndexOf('/')+1,comma-lineArray[0].IndexOf('/')-1);
                        if (!dbconnector.Insert(symbolListTableName, rowToInsert))
                        {
                            Log("failed");
                        }
                    }
                }
            }
            else
            {
                string line;
                //read through the file of symbols to make an api call for each one
                InitLogger(populateSymbolLogPath);
                while ((line = file.ReadLine()) != null)
                {
                    String[] lineArray = line.Split(',');
                    if (lineArray[0] != "quandl code")
                    {
                        try
                        {
                            //build quandl api call for the current symbol, and download the info for that symbol
                            string apiCall = apiCallPrefix + lineArray[0] + apiCallType + authToken;
                            string symbol = lineArray[0].Substring(lineArray[0].IndexOf('/') + 1);
                            string fileName = symbol + apiCallType;

                            Console.WriteLine("Downloading " + symbol + "...");
                            while (!DownloadFile(apiCall, fileName)) { }
                            Log(symbol + " " + downloadCode + " " + successCode);

                            Console.WriteLine("Writing " + symbol + "...");
                            //populate database with info from the current symbol
                            PopulateSymbol(symbol, fileName);
                            Log(symbol + " " + populateCode + " " + successCode);
                            Console.WriteLine(symbol + " finished!");

                            if (cleanupFiles)
                            {
                                if (DeleteFile(fileName))
                                {
                                    Log(symbol + " " + deleteCode + " " + successCode);
                                    Console.WriteLine(symbol + " deleted");
                                }
                            }
                        }
                        catch (Exception e)
                        {
                            Console.WriteLine("Error: " + e.Message);
                        }
                    }
                }
            }
            file.Close();
            CloseLogger();
        }

        public static void PopulateSymbol(string symbol, string fileName)
        {
            using (System.IO.StreamReader file = new System.IO.StreamReader(fileName))
            {
                int duplicateEntryCount = 0;
                string line;
                //each row is a different date of market info, now iterate through dates
                while ((line = file.ReadLine()) != null)
                {
                    String[] lineArray = line.Split(',');
                    if (lineArray[0] == "Date")
                    {
                        continue;
                    }
                    String[] lineArrayReduced = new String[9];
                    lineArrayReduced[0] = symbol;
                    for (int a = 1; a < lineArrayReduced.Length; a++)
                    {
                        lineArrayReduced[a] = lineArray[a - 1];
                    }
                    //for (int a = 0; a < lineArrayReduced.Length; a++)
                    //{
                    //    if (lineArrayReduced[a] == string.Empty)
                    //    {
                    //        lineArrayReduced[a] = null;
                    //    }
                    //}
                    //for each date, write the information we want to the database
                    if (!dbconnector.Insert(quandlTableName, lineArrayReduced))
                    {
                        if (dbconnector.errorMessage.Substring(0,15).Equals("Duplicate entry"))
                        {
                            if (++duplicateEntryCount > 100)
                            {
                                Console.Write("100 consecutive duplicate entries, moving to next symbol\n");
                                Log("100 consecutive duplicate entries, moving to next symbol\n");
                                break;
                            }
                        }
                        Log("Insertion failed on " + symbol);  
                    }
                    else
                    {
                        duplicateEntryCount = 0;
                    }
                }
            }
        }

        static void Main(string[] args)
        {
            //first get the list of symbols/tickers available on the db
            DownloadFile(tickerListPath, tickerListLocalPath);

            //use the list of tickers to populate the wiki EOD table
            PopulateTable(tickerListLocalPath);
        }

        static void InitLogger(string path)
        {
            logger = new System.IO.StreamWriter(path);
        }

        static void Log(string message)
        {
            if (logger != null)
            {
                logger.WriteLine(message);
            }
        }

        static void CloseLogger()
        {
            logger.Close();
            logger = null;
        }
    }
}