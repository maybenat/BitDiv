using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BitDiv
{
    class DBConnect
    {
        private MySqlConnection connection;
        private MySqlDataReader reader;
        private string server;
        private string database;
        private string uid;
        private string password;

        public string errorMessage;

        static string quandlTableName = "quandl";
        static string symbolListTableName = "wiki_eod_symbols";

        //Constructor
        public DBConnect()
        {
            //server = "localhost";
            //database = "bitdiv";
            //uid = "root";
            //password = "root";
            Initialize("localhost", "bitdiv", "root", "root");
        }

        public DBConnect(string dbName)
        {
            if (dbName == "eng")
            {
                Initialize("mysql.eng.utah.edu", "tharp", "tharp", "wHP8+xPvw5");
            }
            else if (dbName == symbolListTableName)
            {

            }
        }

        public DBConnect(string _server, string _database, string _uid, string _password)
        {
            Initialize(_server, _database, _uid, _password);
        }

        //Initialize values
        private void Initialize(string _server, string _database, string _uid, string _password)
        {

            server = _server;
            database = _database;
            uid = _uid;
            password = _password;
            string connectionString;
            connectionString = "SERVER=" + server + ";" + "DATABASE=" +
            database + ";" + "UID=" + uid + ";" + "PASSWORD=" + password + ";";

            connection = new MySqlConnection(connectionString);
        }

        //open connection to database
        private bool OpenConnection()
        {
            if (connection != null && connection.State == ConnectionState.Open)
            {
                return true;
            }
            try
            {
                connection.Open();
                return true;
            }
            catch (MySqlException ex)
            {
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
        public bool CloseConnection()
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
            errorMessage = "";
            string query = "INSERT INTO " + tableName;
            if (tableName == quandlTableName)
            {
                query += " (symbol, date, open, high, low, close, volume, exdividend, splitratio)";
            }
            else if (tableName == symbolListTableName)
            {
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
                    //Console.WriteLine("Error: " + e.Message);
                    this.CloseConnection();
                    errorMessage = e.Message;
                    return false;
                }

                //close connection
                //this.CloseConnection();
                return true;
            }
            return false;
        }

        public bool UpdateQuote(string tableName, string[] columns, object[] quote, string limit) {
            errorMessage = "";
            string query = "UPDATE " + tableName + " SET ";

            for (int a = 0; a < columns.Length-1;a++){
                if (columns[a].Equals("Change"))
                {
                    query += "`" + columns[a] + "` = ";
                }
                else
                {
                    query += columns[a] + " = ";
                }

                query += "'" + quote[a] + "', ";
            }

            query += columns[columns.Length - 1] + " = '" + quote[quote.Length - 1] + "'";

            if (limit != null && limit.Length > 0)
            {
                query += " " + limit;
            }

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
                    this.CloseConnection();
                    errorMessage = e.Message;
                    Console.WriteLine("Error: " + e.Message);
                    return false;
                }

                //close connection
                this.CloseConnection();
                return true;
            }
            return false;
        }

        //Update statement
        public bool Update(string tableName, string[] columns, string[] values, string limit)
        {
            errorMessage = "";
            string query = "UPDATE " + tableName + " SET ";

            for (int a = 0; a < columns.Length - 1; a++)
            {
                if (columns[a].Equals("Change"))
                {
                    query += "`" + columns[a] + "` = ";
                }
                else
                {
                    query += columns[a] + " = ";
                }

                query += "'" + values[a] + "', ";
            }

            query += columns[columns.Length - 1] + " = '" + values[values.Length - 1] + "'";

            if (limit != null && limit.Length > 0)
            {
                query += " " + limit;
            }

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
                    this.CloseConnection();
                    errorMessage = e.Message;
                    Console.WriteLine("Error: " + e.Message);
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

        public MySqlDataReader Select(string[] columns, string table, string limit)
        {
            string query = "SELECT ";
            if (columns.Length == 0)
            {
                query += "* FROM ";
            }
            else
            {
                for (int a = 0; a < columns.Length; a++)
                {
                    query += columns[a] + ", ";
                }
                query = query.Substring(0, query.Length - 2) + " FROM ";
            }

            query += table;

            if (limit.Length > 0)
            {
                query += limit;
            }

            if (this.OpenConnection())
            {
                try
                {
                    MySqlCommand cmd = new MySqlCommand(query, connection);
                    reader = cmd.ExecuteReader();
                }
                catch (Exception e)
                {
                    Console.Write("Error: " + e.Message);
                    this.CloseConnection();
                    return null;
                }

                //this.CloseConnection();
                return reader;
            }

            return null;
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
