<?php

  include 'data/config.php';

  // TODO: implement column 'number_portfolios' to be stored in users table
  // currently static 3 portfolios
  session_name('Private');
  session_start();
  $_SESSION['number_portfolios'] = 3;
  session_write_close();





  //if(!isset($_SESSION['user_stocks'])) {
  {
    try {

      // write session variables to database
      $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

      $statement = $db->prepare('SELECT * FROM user_stocks WHERE uid="'.$_SESSION['uid'].'"');
      $statement->execute();

      // find all user stocks
      $user_stocks = array();
      $stock_list = array();
      while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
        $user_stocks[$row['portfolio']][$row['ticker']][$row['stock_id']] = $row;
        // track list of tickers
        if(!in_array($row['ticker'], $stock_list)) {
          $stock_list[] = $row['ticker'];
        }
      }

      // save to session
      session_name('Private');
      session_start();
      $_SESSION['user_stocks'] = $user_stocks;
      session_write_close();

    } catch(PDOException $e) {
      echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
      exit;
    }
  }


  //if(!isset($_SESSION['user_stocks_db_info'])) {
  {
  $YBASE_URL = "https://query.yahooapis.com/v1/public/yql";

  // construct list of tickers for query
  $query_tickers = '"null"';
  foreach($stock_list as $ticker) {
    $query_tickers .= ',"'.$ticker.'"';
  }
  //$query_tickers = substr($query_tickers, 0, -1);
  //echo $query_tickers;

  // Form YQL query and build URI to YQL Web service
  $yql_query = 'select * from yahoo.finance.quotes where symbol in (' . $query_tickers . ')';
  $yql_query_url = $YBASE_URL . "?q=" . urlencode($yql_query) . "&format=json" . "&env=http://datatables.org/alltables.env";

  // Make call with cURL
  $session = curl_init($yql_query_url);
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
  $json = curl_exec($session);

  //print_r($json);

  // Convert JSON to PHP object
  $phpObj = json_decode($json);

/*
  "results": {
   "quote": [
    {
     "symbol": "YHOO",
     "AverageDailyVolume": "17558700",
     "Change": "-0.17",
     "DaysLow": "42.36",
     "DaysHigh": "42.99",
     "YearLow": "32.15",
     "YearHigh": "52.62",
     "MarketCapitalization": "39.79B",
     "LastTradePriceOnly": "42.50",
     "DaysRange": "42.36 - 42.99",
     "Name": "Yahoo! Inc.",
     "Symbol": "YHOO",
     "Volume": "10007342",
     "StockExchange": "NMS"
    },
    ...

Object
(
    [quote] => stdClass Object
        (
            [symbol] => AAPL
            [Ask] => 122.32
            [AverageDailyVolume] => 58625600
            [Bid] => 122.32
            [AskRealtime] => 
            [BidRealtime] => 
            [BookValue] => 21.17
            [Change_PercentChange] => -2.27 - -1.82%
            [Change] => -2.27
            [Commission] => 
            [Currency] => USD
            [ChangeRealtime] => 
            [AfterHoursChangeRealtime] => 
            [DividendShare] => 1.88
            [LastTradeDate] => 3/11/2015
            [TradeDate] => 
            [EarningsShare] => 7.39
            [ErrorIndicationreturnedforsymbolchangedinvalid] => 
            [EPSEstimateCurrentYear] => 8.61
            [EPSEstimateNextYear] => 9.26
            [EPSEstimateNextQuarter] => 1.66
            [DaysLow] => 122.11
            [DaysHigh] => 124.77
            [YearLow] => 73.05
            [YearHigh] => 133.60
            [HoldingsGainPercent] => 
            [AnnualizedGain] => 
            [HoldingsGain] => 
            [HoldingsGainPercentRealtime] => 
            [HoldingsGainRealtime] => 
            [MoreInfo] => 
            [OrderBookRealtime] => 
            [MarketCapitalization] => 712.02B
            [MarketCapRealtime] => 
            [EBITDA] => 67.66B
            [ChangeFromYearLow] => 49.19
            [PercentChangeFromYearLow] => +67.34%
            [LastTradeRealtimeWithTime] => 
            [ChangePercentRealtime] => 
            [ChangeFromYearHigh] => -11.36
            [PercebtChangeFromYearHigh] => -8.50%
            [LastTradeWithTime] => 4:00pm - <b>122.24</b>
            [LastTradePriceOnly] => 122.24
            [HighLimit] => 
            [LowLimit] => 
            [DaysRange] => 122.11 - 124.77
            [DaysRangeRealtime] => 
            [FiftydayMovingAverage] => 123.02
            [TwoHundreddayMovingAverage] => 110.92
            [ChangeFromTwoHundreddayMovingAverage] => 11.32
            [PercentChangeFromTwoHundreddayMovingAverage] => +10.21%
            [ChangeFromFiftydayMovingAverage] => -0.78
            [PercentChangeFromFiftydayMovingAverage] => -0.63%
            [Name] => Apple Inc.
            [Notes] => 
            [Open] => 124.73
            [PreviousClose] => 124.51
            [PricePaid] => 
            [ChangeinPercent] => -1.82%
            [PriceSales] => 3.63
            [PriceBook] => 5.88
            [ExDividendDate] => 2/5/2015
            [PERatio] => 16.55
            [DividendPayDate] => 2/12/2015
            [PERatioRealtime] => 
            [PEGRatio] => 1.12
            [PriceEPSEstimateCurrentYear] => 14.20
            [PriceEPSEstimateNextYear] => 13.20
            [Symbol] => AAPL
            [SharesOwned] => 
            [ShortRatio] => 0.90
            [LastTradeTime] => 4:00pm
            [TickerTrend] => 
            [OneyrTargetPrice] => 137.80
            [Volume] => 68938974
            [HoldingsValue] => 
            [HoldingsValueRealtime] => 
            [YearRange] => 73.05 - 133.60
            [DaysValueChange] => 
            [DaysValueChangeRealtime] => 
            [StockExchange] => NMS
            [DividendYield] => 1.50
            [PercentChange] => -1.82%
        )

)
*/

  // Confirm that results were returned before parsing
  if(!is_null($phpObj->query->results)) {
    // Parse results and extract data to display
//*
    foreach($phpObj->query->results->quote as $quote) {
      $_SESSION['user_stocks_db_info'][$quote->symbol] = $quote;
    }
//*/
    //$_SESSION['user_stocks_db_info'] = $phpObj->query->results;
  }

  //print_r($_SESSION['user_stocks_db_info']);
  //foreach($_SESSION['user_stocks_db_info'] as $symbol => $quote) {
  //  echo $symbol . ' (' . $quote->Name . ')' . PHP_EOL;
  //  echo $quote->PercentChange . PHP_EOL;
  //}

  //exit;
  }
?>
