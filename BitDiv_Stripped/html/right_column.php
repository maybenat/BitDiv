<!-- right col -->
<div class="col w-md bg-white-only b-l bg-auto no-border-xs">
  <div style="position:fixed">
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
          <div class="m-b-sm font-thin text-md">Transaction</div>
          <p class="font-thin">Add shares of this stock to your portfolio.</p>

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
              $current_price = number_format($quote->Open, 2, '.', '');
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
              <p class="m-t font-thin">Stock purchased:</p>
              <input type="text" name="ticker" placeholder="ticker" class="form-control" id="rp_tr_ticker" onblur="rp_tr_ticker_blur()" required value="<?php echo $current_stock; ?>" />
              <p class="m-t font-thin">Shares purchased:</p>
              <input type="number" name="number_shares" placeholder="number of shares" class="form-control" id="rp_tr_shares" onblur="rp_tr_shares_blur()" required />
              <p class="m-t font-thin">Price at time of purchase:</p>
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="number" step="any" name="price" placeholder="price" class="form-control" id="rp_tr_price" onblur="rp_tr_price_blur()" required value="<?php echo $current_price; ?>" />
              </div>

              <p class="m-t font-thin">Date purchased:</p>
              <div class="input-group date" id="datetimepicker1">
                <input type="date" name="date_purchased" placeholder="01/01/2001" class="form-control" required value="<?php echo date('m/d/Y'); ?>" />
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              </div>

              <p class="m-t"></p>
              <select name="portfolio" class="form-control font-thin">
                <?php
                $i = 0;
                foreach($_SESSION['portfolios'] as $p_id => $portfolio_params) {
                $sel = ($p_id == $_SESSION['active_p_id']) ? ' selected="selected"' : '';
                  ?>
                  <option class="font-thin" value="<?php echo $p_id; ?>"<?php echo $sel; ?>><?php echo $portfolio_params['p_name']; ?></option>
                  <?php
                  $i++;
                }
                  if(empty($i)) { 
                ?>
                  <option value="new">New Portfolio (create)</option>
                <?php
                  }
                ?>
              </select>

              <!--<p class="m-t"></p>-->
              <button type="submit" class="btn btn-default btn-rounded m-t" id="rp_tr_submit">Submit</button>
              <!--<button type="reset" class="btn btn-default btn-rounded m-t">Clear</button>-->
            </form>
          </div><!--

          <p class="m-t font-thin">Recently viewed:</p>
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
          </ul>-->
        </div>
      </div>
      <!-- End of trans tab in right column php-->

      <!--follow tab in right column php-->
      <div class="tab-pane" id="follow">
       <div class="wrapper-md">
        <form action="" class="text-center">
          Search User: <input type="text" id="search" onkeyup="showUsers(this.value)">
        </form>
        <ul class="list-group no-bg no-borders pull-in text-center">
          <span id="userList"></span>
          <div class="m-b-sm text-center">Who to follow</div>
          <?php include 'peoplelist.php';?></ul>
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
        <script>
          function rp_tr_ticker_blur() {
            var rp_tr_ticker = document.getElementById("rp_tr_ticker");
            var rp_tr_price = document.getElementById("rp_tr_price");
            var rp_tr_submit = document.getElementById("rp_tr_submit");
            
            rp_tr_ticker.value = rp_tr_ticker.value.toUpperCase();
            
            var url = 'https://query.yahooapis.com/v1/public/yql';
            var symbol = rp_tr_ticker.value;
            var data = encodeURIComponent("select * from yahoo.finance.quotes where symbol in ('" + symbol + "')");

            $.getJSON(url, 'q=' + data + "&format=json&diagnostics=true&env=http://datatables.org/alltables.env")
              .done(function (data) {
                if(!data.query.results.quote.LastTradePriceOnly) {
                  rp_tr_price.value = 0;
                  rp_tr_submit.disabled = true;
                } else {
                  rp_tr_price.value = data.query.results.quote.Open;
                  //LastTradePriceOnly;
                  rp_tr_submit.disabled = false;
                }
              })
              .fail(function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log('Request failed: ' + err);
              });
          }
        </script>
        <script>
          function rp_tr_shares_blur() {
            var rp_tr_ticker = document.getElementById("rp_tr_ticker");
            var rp_tr_shares = document.getElementById("rp_tr_shares");
            var rp_tr_price = document.getElementById("rp_tr_price");
            var rp_tr_submit = document.getElementById("rp_tr_submit");
            
            rp_tr_ticker.value = rp_tr_ticker.value.toUpperCase();
            
            var url = 'https://query.yahooapis.com/v1/public/yql';
            var symbol = rp_tr_ticker.value;
            var data = encodeURIComponent("select * from yahoo.finance.quotes where symbol in ('" + symbol + "')");

            $.getJSON(url, 'q=' + data + "&format=json&diagnostics=true&env=http://datatables.org/alltables.env")
              .done(function (data) {
                // if number of shares invalid, disable submit button
                if(rp_tr_shares.value < 1) {
                  rp_tr_submit.disabled = true;
                } else {
                  rp_tr_submit.disabled = false;
                }
              })
              .fail(function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log('Request failed: ' + err);
              });
          }
        </script>
        <script>
          function rp_tr_price_blur() {
            var rp_tr_ticker = document.getElementById("rp_tr_ticker");
            var rp_tr_price = document.getElementById("rp_tr_price");
            var rp_tr_submit = document.getElementById("rp_tr_submit");
            
            rp_tr_ticker.value = rp_tr_ticker.value.toUpperCase();
            
            var url = 'https://query.yahooapis.com/v1/public/yql';
            var symbol = rp_tr_ticker.value;
            var data = encodeURIComponent("select * from yahoo.finance.quotes where symbol in ('" + symbol + "')");

            $.getJSON(url, 'q=' + data + "&format=json&diagnostics=true&env=http://datatables.org/alltables.env")
              .done(function (data) {
                // if price invalid, disable submit button
                  //rp_tr_submit.disabled = true;
              })
              .fail(function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log('Request failed: ' + err);
              });
          }
        </script>
      </div><!-- End of follow tab -->
    </div><!-- tab-content -->
  </div><!-- positon fixed -->
</div><!-- / right col -->
