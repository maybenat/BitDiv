using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BitDiv
{
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
