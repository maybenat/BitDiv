using MySql.Data.MySqlClient;
using System;
using System.Collections;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net;
using System.Text;
using System.Threading.Tasks;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Windows.Threading;
using System.Collections.ObjectModel;

namespace BitDiv
{
    class FinanceScraper
    {
        static WebClient client = new WebClient();
        static DBConnect dbConnector = new DBConnect("eng");
        static string tickerListLocalPath = "ticker_list.csv";
        private readonly System.Timers.Timer timer = new System.Timers.Timer();
        private int quoteCount = 0;
        private int failCount = 0;
        private string currentSymbol = "";

        private string[] attributes = {"Ask", "Bid", "AverageDailyVolume", "BookValue", "Change", "DividendShare", "LastTradeDate",
                                          "EarningsShare", "EpsEstimateCurrentYear", "EpsEstimateNextYear","EpsEstimateNextQuarter",
                                          "DailyLow","DailyHigh","YearlyLow","YearlyHigh","MarketCapitalization","Ebitda",
                                          "ChangeFromYearLow","PercentChangeFromYearLow","ChangeFromYearHigh","LastTradePrice",
                                          "PercentChangeFromYearHigh","FiftyDayMovingAverage","TwoHundredDayMovingAverage",
                                          "ChangeFromTwoHundredDayMovingAverage","PercentChangeFromTwoHundredDayMovingAverage",
                                          "PercentChangeFromFiftyDayMovingAverage","Name","Open","PreviousClose","ChangeInPercent",
                                          "PriceSales","PriceBook","ExDividendDate","PeRatio","DividendPayDate","PegRatio",
                                          "PriceEpsEstimateCurrentYear","PriceEpsEstimateNextYear","ShortRatio","OneYearPriceTarget",
                                          "Volume","StockExchange", "LastUpdate"};

        private string[] GetSymbols()
        {
            //read through list of wiki eod symbols to build symbols for yahoo finance calls
            ArrayList symbols = new ArrayList();
            using (System.IO.StreamReader file = new System.IO.StreamReader(tickerListLocalPath))
            {
                string line;
                while ((line = file.ReadLine()) != null)
                {
                    String[] lineArray = line.Split(',');
                    if (lineArray[0] != "quandl code")
                    {
                        //remove WIKI/ from the front of each symbol (WIKI/AAPL -> AAPL)
                        string symbol = lineArray[0].Substring(lineArray[0].IndexOf('/') + 1);
                        //e.g. BRK_B -> BRK-B
                        symbol = symbol.Replace('_', '-');
                        symbols.Add(symbol);
                    }
                }
            }
            return (string[])symbols.ToArray(typeof(string));
        }

        public void Run()
        {
            //fetch list of symbols
            string[] symbols = GetSymbols();
            DateTime lastFetch = DateTime.Now;
            //only request one page every 5 seconds to avoid being blocked
            if (currentSymbol != string.Empty)
            {
                while (symbols[quoteCount] != currentSymbol)
                {
                    quoteCount++;
                }
            }
            while (quoteCount < symbols.Length)
            {
                do { } while (lastFetch.AddSeconds(5).CompareTo(DateTime.Now) > 0);

                Fetch(symbols);
                lastFetch = DateTime.Now;
            }

            Console.WriteLine("Done");
            /*
            timer.Interval = 50000;
            timer.Elapsed += (o, e) => Fetch(symbols);
            timer.Start();
            /*
            foreach (string s in symbols)
            {
                //for round 2
                //build url for each symbol
                //select * from html where url='http://finance.yahoo.com/q/ks?s=PNFP+Key+Statistics' and xpath='//td[@class = "yfnc_tabledata1"]|//td[@class = "yfnc_tablehead1"]'
                //string url = "http://finance.yahoo.com/q/ks?s=" + s + "+Key+Statistics";
                //fetch page for each url
                //string page = client.DownloadString(url);

                //RunAsync().Wait();
                //scrape page for data

            }
            */
        }

        private void Fetch(string[] symbols)
        {
            Quote quote = new Quote(symbols[quoteCount]);
            if (YahooStockEngine.Fetch(quote))
            {

                Console.WriteLine("Fetched data for " + quote.Symbol);

                object[] quoteData = new object[attributes.Length];
                int a = 0;
                quoteData[a++] = quote.Ask;
                quoteData[a++] = quote.Bid;
                quoteData[a++] = quote.AverageDailyVolume;
                quoteData[a++] = quote.BookValue;
                quoteData[a++] = quote.Change;
                quoteData[a++] = quote.DividendShare;
                quoteData[a++] = quote.LastTradeDate;
                quoteData[a++] = quote.EarningsShare;
                quoteData[a++] = quote.EpsEstimateCurrentYear;
                quoteData[a++] = quote.EpsEstimateNextYear;
                quoteData[a++] = quote.EpsEstimateNextQuarter;
                quoteData[a++] = quote.DailyLow;
                quoteData[a++] = quote.DailyHigh;
                quoteData[a++] = quote.YearlyLow;
                quoteData[a++] = quote.YearlyHigh;
                quoteData[a++] = quote.MarketCapitalization;
                quoteData[a++] = quote.Ebitda;
                quoteData[a++] = quote.ChangeFromYearLow;
                quoteData[a++] = quote.PercentChangeFromYearLow;
                quoteData[a++] = quote.ChangeFromYearHigh;
                quoteData[a++] = quote.LastTradePrice;
                quoteData[a++] = quote.PercentChangeFromYearHigh;
                quoteData[a++] = quote.FiftyDayMovingAverage;
                quoteData[a++] = quote.TwoHundredDayMovingAverage;
                quoteData[a++] = quote.ChangeFromTwoHundredDayMovingAverage;
                quoteData[a++] = quote.PercentChangeFromTwoHundredDayMovingAverage;
                quoteData[a++] = quote.PercentChangeFromFiftyDayMovingAverage;
                quoteData[a++] = quote.Name;
                if (quote.Name.Contains('\''))
                {
                    quoteData[a-1] = quote.Name.Replace("\'", "\\'");
                }
                quoteData[a++] = quote.Open;
                quoteData[a++] = quote.PreviousClose;
                quoteData[a++] = quote.ChangeInPercent;
                quoteData[a++] = quote.PriceSales;
                quoteData[a++] = quote.PriceBook;
                quoteData[a++] = quote.ExDividendDate;
                quoteData[a++] = quote.PeRatio;
                quoteData[a++] = quote.DividendPayDate;
                quoteData[a++] = quote.PegRatio;
                quoteData[a++] = quote.PriceEpsEstimateCurrentYear;
                quoteData[a++] = quote.PriceEpsEstimateNextYear;
                quoteData[a++] = quote.ShortRatio;
                quoteData[a++] = quote.OneYearPriceTarget;
                quoteData[a++] = quote.Volume;
                quoteData[a++] = quote.StockExchange;
                quoteData[a++] = quote.LastUpdate;

                if (dbConnector.UpdateQuote("wiki_eod_symbols", attributes, quoteData, "where symbol='" + quote.Symbol + "'"))
                {
                    Console.WriteLine("Wrote data for: " + symbols[quoteCount]);
                }
                else
                {
                    failCount++;
                }
            }
            else
            {
                failCount++;
            }
            Console.WriteLine(quoteCount + " out of " + symbols.Length + " complete. " + failCount + " failures.");
            quoteCount++;
        }
        /*
        static async Task RunAsync()
        {
            using (var client = new HttpClient())
            {
                client.BaseAddress = new Uri("http://localhost:9000/");
                client.DefaultRequestHeaders.Accept.Clear();
                client.DefaultRequestHeaders.Accept.Add(new MediaTypeWithQualityHeaderValue("application/json"));

                // New code:
                HttpResponseMessage response = await client.GetAsync("api/products/1");
                if (response.IsSuccessStatusCode)
                {
                    response.Content.ReadAsAsync();
                    //Console.WriteLine("{0}\t${1}\t{2}", product.Name, product.Price, product.Category);
                }
                // TODO - Send HTTP requests
            }
        }
        */
    }
}
