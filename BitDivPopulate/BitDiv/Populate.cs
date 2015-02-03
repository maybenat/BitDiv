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
        static DBConnect dbconnector = new DBConnect();

        static System.IO.StreamWriter logger = null;

        static readonly bool cleanupFiles = true;
        static readonly bool populateSymbolList = true;

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
                            //"WIKI/ACT,\"Actavis, Inc.\""
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
                        Log("Insertion failed on " + symbol);
                        
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

    class DBConnect
    {
        private MySqlConnection connection;
        private string server;
        private string database;
        private string uid;
        private string password;

        static string quandlTableName = "quandl";
        static string symbolListTableName = "wiki_eod_symbols";

        //Constructor
        public DBConnect()
        {
            Initialize();
        }

        //Initialize values
        private void Initialize()
        {
            server = "localhost";
            database = "bitdiv";
            uid = "root";
            password = "root";
            string connectionString;
            connectionString = "SERVER=" + server + ";" + "DATABASE=" +
            database + ";" + "UID=" + uid + ";" + "PASSWORD=" + password + ";";

            connection = new MySqlConnection(connectionString);
        }

        //open connection to database
        private bool OpenConnection()
        {
            try
            {
                connection.Open();
                return true;
            }
            catch (MySqlException ex)
            {
                //When handling errors, you can your application's response based 
                //on the error number.
                //The two most common error numbers when connecting are as follows:
                //0: Cannot connect to server.
                //1045: Invalid user name and/or password.
                switch (ex.Number)
                {
                    case 0:
                        Console.WriteLine("Cannot connect to server.  Contact administrator");
                        break;

                    case 1045:
                        Console.WriteLine("Invalid username/password, please try again");
                        break;
                    case 1042:
                        Console.WriteLine("Unable to connect to MySQL host");
                        break;
                }
                return false;
            }
        }

        //Close connection
        private bool CloseConnection()
        {
            try
            {
                connection.Close();
                return true;
            }
            catch (MySqlException ex)
            {
                Console.WriteLine(ex.Message);
                return false;
            }
        }

        //Insert statement
        public bool Insert(string tableName, String[] rowToInsert)
        {
            string query = "INSERT INTO " + tableName;
            if (tableName == quandlTableName)
            {
                query += " (symbol, date, open, high, low, close, volume, exdividend, splitratio)";
            }
            else if(tableName == symbolListTableName){
                query += " (quandl_code, name, symbol)";
            }
  
            query += " VALUES('" + rowToInsert[0] + "'";
            for (int a = 1; a < rowToInsert.Length; a++)
            {
                query += ", '" + rowToInsert[a] + "'";
            }
            query += ")";

            //open connection
            if (this.OpenConnection())
            {
                try
                {
                    //create command and assign the query and connection from the constructor
                    MySqlCommand cmd = new MySqlCommand(query, connection);

                    //Execute command
                    cmd.ExecuteNonQuery();
                }
                catch (Exception e)
                {
                    Console.WriteLine("Error: " + e.Message);
                    this.CloseConnection();
                    return false;
                }

                //close connection
                this.CloseConnection();
                return true;
            }
            return false;
        }

        //Update statement
        public bool Update()
        {
            string query = "UPDATE tableinfo SET name='Joe', age='22' WHERE name='John Smith'";

            //Open connection
            if (this.OpenConnection())
            {
                try
                {
                    //create mysql command
                    MySqlCommand cmd = new MySqlCommand();
                    //Assign the query using CommandText
                    cmd.CommandText = query;
                    //Assign the connection using Connection
                    cmd.Connection = connection;

                    //Execute query
                    cmd.ExecuteNonQuery();
                }
                catch (Exception e)
                {
                    this.CloseConnection();
                    return false;
                }

                //close connection
                this.CloseConnection();
                return true;
            }
            return false;
        }

        //Delete statement
        public void Delete()
        {
            string query = "DELETE FROM tableinfo WHERE name='John Smith'";

            if (this.OpenConnection())
            {
                MySqlCommand cmd = new MySqlCommand(query, connection);
                cmd.ExecuteNonQuery();
                this.CloseConnection();
            }
        }

        ////Select statement
        //public List<string>[] Select()
        //{
        //}

        ////Count statement
        //public int Count()
        //{
        //}

        ////Backup
        //public void Backup()
        //{
        //}

        ////Restore
        //public void Restore()
        //{
        //}
    }
}
