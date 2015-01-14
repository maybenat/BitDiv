using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
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

        static WebClient client = new WebClient();
        static DBConnect dbconnector = new DBConnect();

        public static void DownloadFile(string remoteFile, string localFile)
        {
            client.DownloadFile(remoteFile, localFile);
        }

        public static string GetFile(string remoteFile)
        {
            return client.DownloadString(remoteFile);
        }

        public static void PopulateTable(string tickerListLocalPath)
        {
            System.IO.StreamReader file = new System.IO.StreamReader(tickerListLocalPath);
            string line;
            //read through the file of symbols to make an api call for each one
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
                        DownloadFile(apiCall, fileName);

                        Console.WriteLine("Writing " + symbol + "...");
                        //populate database with info from the current symbol
                        PopulateSymbol(symbol, fileName);
                        Console.WriteLine(symbol + " finished!");
                    }
                    catch (Exception e)
                    {
                        Console.WriteLine("Error: " + e.Message);
                    }
                }
            }
        }

        public static void PopulateSymbol(string symbol, string fileName)
        {
            System.IO.StreamReader file = new System.IO.StreamReader(fileName);
            string line;
            //each row is a different date of market info, now iterate through dates
            while ((line = file.ReadLine()) != null)
            {
                String[] lineArray = line.Split(',');
                if (lineArray[0] != "Date")
                {
                    String[] lineArrayReduced = new String[8];
                    Array.Copy(lineArray, lineArrayReduced, 8);
                    //for each date, write the information we want to the database
                    dbconnector.Insert(symbol, lineArrayReduced);
                    
                }
            }
        }

        static void Main(string[] args)
        {
            //first get the list of symbols/tickers available on the db
            DownloadFile(tickerListPath, tickerListLocalPath);

            //use the list of tickers to populate the db
            PopulateTable(tickerListLocalPath);
        }
    }

    class DBConnect
    {
        private MySqlConnection connection;
        private string server;
        private string database;
        private string uid;
        private string password;

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
        public void Insert(string symbol, String[] rowToInsert)
        {
            string query = "INSERT INTO quandl (symbol, date, open, high, low, close, volume, exdividend, splitratio)" +
                " VALUES('" + symbol + "'";
            for (int a = 0; a < rowToInsert.Length; a++)
            {
                query += ", '" + rowToInsert[a] + "'";
            }

            query += ")";
            //'33')";

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
                }

                //close connection
                this.CloseConnection();
            }
        }

        //Update statement
        public void Update()
        {
            string query = "UPDATE tableinfo SET name='Joe', age='22' WHERE name='John Smith'";

            //Open connection
            if (this.OpenConnection())
            {
                //create mysql command
                MySqlCommand cmd = new MySqlCommand();
                //Assign the query using CommandText
                cmd.CommandText = query;
                //Assign the connection using Connection
                cmd.Connection = connection;

                //Execute query
                cmd.ExecuteNonQuery();

                //close connection
                this.CloseConnection();
            }
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
