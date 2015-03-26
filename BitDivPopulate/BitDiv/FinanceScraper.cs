using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;

namespace BitDiv
{
    class FinanceScraper
    {
        static WebClient client = new WebClient();
        static DBConnect dbConnector = new DBConnect("eng");

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

        static void Main(string[] args)
        {
            //first get the list of symbols/tickers available on the db
            DownloadFile(tickerListPath, tickerListLocalPath);

            //use the list of tickers to populate the wiki EOD table
            PopulateTable(tickerListLocalPath);
        }
    }
}
