<!-- right col -->
<div class="col w-md bg-white-only b-l bg-auto no-border-xs">
  <div class="nav-tabs-alt">
    <ul class="nav nav-tabs" role="tablist">
      <li class="active"><a href="#trans" data-toggle="tab"><i class="glyphicon glyphicon-transfer text-md text-muted wrapper-sm"></i></a>
      </li>
      <li><a href="#follow" data-toggle="tab"><i class="glyphicon glyphicon-user text-md text-muted wrapper-sm"></i></a>
      </li>
    </ul>
  </div>
  <div class="tab-content">
    <div class="tab-pane active" id="trans">
      <div class="wrapper-md">
        <div class="m-b-sm text-md">Transaction</div>
        <p>Add shares of this stock to your portfolio.</p>

        <?php
        $current_stock = $_SESSION['current_stock_viewing'];
        $YBASE_URL = "https://query.yahooapis.com/v1/public/yql";
  // construct list of tickers for query
        $query_tickers = '"null"';
        foreach($stock_list as $ticker) {
          $query_tickers .= ',"'.$ticker.'"';
        }
  //$query_tickers = substr($query_tickers, 0, -1);
  //echo $query_tickers;
  // Form YQL query and build URI to YQL Web service
        $yql_query = 'select * from yahoo.finance.quotes where symbol in ("null","' . $current_stock . '")';
        $yql_query_url = $YBASE_URL . "?q=" . urlencode($yql_query) . "&format=json" . "&env=http://datatables.org/alltables.env";
  // Make call with cURL
        $session = curl_init($yql_query_url);
        curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($session);
  //print_r($json);
  // Convert JSON to PHP object
        $phpObj = json_decode($json);
  // Confirm that results were returned before parsing
        if(!is_null($phpObj->query->results)) {
    // Parse results and extract data to display
          foreach($phpObj->query->results->quote as $quote) {
            $current_price = $quote->Open;
          }
    //foreach($phpObj->query->results->quote as $quote) {
    //  $_SESSION['user_stocks_db_info'][$quote->symbol] = $quote;
    //}
    //$_SESSION['user_stocks_db_info'] = $phpObj->query->results;
        }
  //print_r($_SESSION['user_stocks_db_info']);
  //foreach($_SESSION['user_stocks_db_info'] as $symbol => $quote) {
  //  echo $symbol . ' (' . $quote->Name . ')' . PHP_EOL;
  //  echo $quote->PercentChange . PHP_EOL;
  //}
        ?>

        <div class="form-group">
          <form action="includes/form_transaction.php?referer=<?php echo $current_page_url; ?>" method="post">
            <p>Stock purchased:</p>
            <input type="text" name="ticker" placeholder="ticker" class="form-control" required value="<?php echo $current_stock; ?>" />
            <p class="m-t">Shares purchased:</p>
            <input type="number" name="number_shares" placeholder="number of shares" class="form-control" required />
            <p class="m-t">Price at time of purchase:</p>
            <div class="input-group">
              <span class="input-group-addon">$</span>
              <input type="number" step="any" name="price" placeholder="price" class="form-control" required value="<?php echo $current_price; ?>" />
            </div>

            <p class="m-t">Date purchased:</p>
            <div class="input-group date" id="datetimepicker1">
              <input type="date" name="date_purchased" placeholder="01/01/2001" class="form-control" required value="<?php echo date('m/d/Y'); ?>" />
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>

            <p class="m-t"></p>
            <select name="portfolio" class="form-control">
              <option value="1">Portfolio 1</option>
              <option value="2">Portfolio 2</option>
              <option value="3">Portfolio 3</option>
            </select>

            <p class="m-t"></p>

            <button type="submit" class="btn btn-default btn-rounded m-t">Submit</button>
            <button type="reset" class="btn btn-default btn-rounded m-t">Clear</button>
          </form>
        </div>

        <p class="m-t">Recently viewed:</p>
        <ul class="list-group list-group-sm list-group-sp list-group-alt auto m-t">
          <?php
          session_name('Private');
          session_start();
          for($i = 0; $i < 5; $i++) {
            $st = $_SESSION['recently_viewed_stock'][$i];
            if(!$st) {
              break;
            }
            echo '<li class="list-group-item"><a href="ui_chart.php?stocks='.$st.'">'.$st.'</a></li>', PHP_EOL;
          }
          ?>
        </ul>
      </div>
    </div>
    <!-- End of trans tab in right column php-->

    <!--follow tab in right column php-->
    <div class="tab-pane" id="follow">
     <div class="wrapper-md">
      <form action="" class="text-center">
        Search User: <input type="text" id="search" onkeyup="showUsers(this.value)">
      </form>
      <!--<div class="m-b-sm text-md">Who to follow</div>-->
      <ul class="list-group no-bg no-borders pull-in">
        <span id="userList"></span>
        <?php include 'peoplelist.php';?>
      </ul>
    </div>
  </div>

  <script>
    function showUsers(str)
    {
      if (str.length==0) {
        document.getElementById("userList").innerHTML="";
        return;
      } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange=function() {
          if (xmlhttp.readyState==4 && xmlhttp.status==200) {
            document.getElementById("userList").innerHTML=xmlhttp.responseText;
          }
        }
        xmlhttp.open("GET","peoplelist.php?q="+str,true);
        xmlhttp.send();
      }
    }
  </script>
  <!-- End of follow tab -->
  <!-- / right col -->
