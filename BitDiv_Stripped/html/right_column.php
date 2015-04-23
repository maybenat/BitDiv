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
              <span class="m-t font-thin"><small id="rp_tr_sub_ticker"><?php echo $_SESSION['user_stocks_db_info'][$current_stock]->Name; ?></small></span>
              <p class="m-t font-thin">Shares purchased:</p>
              <input type="number" name="number_shares" placeholder="number of shares" class="form-control" id="rp_tr_shares" onblur="rp_tr_shares_blur()" required />
              <span class="m-t font-thin text-danger"><small id="rp_tr_sub_shares"></small></span>
              <p class="m-t font-thin">Price at time of purchase:</p>
              <div class="input-group">
                <span class="input-group-addon">$</span>
                <input type="number" step="any" name="price" placeholder="price" class="form-control" id="rp_tr_price" onblur="rp_tr_price_blur()" required value="<?php echo $current_price; ?>" />
              </div>
              <span class="m-t font-thin"><small id="rp_tr_sub_price"></small></span>

              <p class="m-t font-thin">Date purchased:</p>
              <input type="text" name="date_purchased" placeholder="01/01/2001" class="form-control" id="rp_tr_date" onblur="rp_tr_date_blur()" required value="<?php echo date('m/d/Y'); ?>" />
              <span class="m-t font-thin text-danger"><small id="rp_tr_sub_date"></small></span>

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
              <button type="submit" class="btn btn-default btn-rounded m-t" id="rp_tr_submit" disabled>Submit</button>
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
          function rp_tr_ticker_blur() {
            var rp_tr_ticker = document.getElementById("rp_tr_ticker");
            var rp_tr_sub_ticker = document.getElementById("rp_tr_sub_ticker");
            var rp_tr_price = document.getElementById("rp_tr_price");
            var rp_tr_submit = document.getElementById("rp_tr_submit");

            rp_tr_ticker.value = rp_tr_ticker.value.toUpperCase();

            var url = 'https://query.yahooapis.com/v1/public/yql';
            var symbol = rp_tr_ticker.value;
            var data = encodeURIComponent("select * from yahoo.finance.quotes where symbol in ('" + symbol + "')");

            $.getJSON(url, 'q=' + data + "&format=json&diagnostics=true&env=http://datatables.org/alltables.env")
              .done(function (data) {
                if(!data.query.results.quote.LastTradePriceOnly) {
                  rp_tr_price.value = (0).toFixed(2);
                  rp_tr_sub_ticker.textContent = "Could not find stock information";
                  rp_tr_sub_ticker.className += " text-danger";
                  rp_tr_submit.disabled = true;
                } else {
                  rp_tr_price.value = data.query.results.quote.Open;
                  if(!rp_tr_price.value) {
                    rp_tr_price.value = "0.00";
                  }
                  //LastTradePriceOnly;
                  rp_tr_sub_ticker.textContent = data.query.results.quote.Name;
                  rp_tr_sub_ticker.className = rp_tr_sub_ticker.className.replace( /(?:^|\s)text-danger(?!\S)/g , '' );
                  if(rp_tr_isValid()) {
                    rp_tr_submit.disabled = false;
                  }
                }
              })
              .fail(function (jqxhr, textStatus, error) {
                var err = textStatus + ", " + error;
                console.log('Request failed: ' + err);
              });
          }

          function rp_tr_shares_blur() {
            var rp_tr_shares = document.getElementById("rp_tr_shares");
            var rp_tr_sub_shares = document.getElementById("rp_tr_sub_shares");
            var rp_tr_price = document.getElementById("rp_tr_price");
            var rp_tr_sub_price = document.getElementById("rp_tr_sub_price");
            var rp_tr_submit = document.getElementById("rp_tr_submit");

            rp_tr_shares.value = Math.floor(parseFloat(rp_tr_shares.value));

            // if number of shares invalid, disable submit button
            if(rp_tr_shares.value < 1) {
              rp_tr_sub_shares.textContent = "Please enter a valid number";
              if(!(new RegExp("text-danger")).test(rp_tr_sub_price.className)) {
                rp_tr_sub_price.textContent = "";
              }
              rp_tr_submit.disabled = true;

            // if price invalid, don't change
            } else if((new RegExp("text-danger")).test(rp_tr_sub_price.className)) {
              rp_tr_sub_shares.textContent = "";

            // otherwise present total
            } else {
              rp_tr_sub_shares.textContent = "";
              rp_tr_sub_price.textContent = "Total: $" + (parseFloat(rp_tr_shares.value)*parseFloat(rp_tr_price.value)).toFixed(2);
              if(rp_tr_isValid()) {
                rp_tr_submit.disabled = false;
              }
            }
          }

          function rp_tr_price_blur() {
            var rp_tr_shares = document.getElementById("rp_tr_shares");
            var rp_tr_price = document.getElementById("rp_tr_price");
            var rp_tr_sub_price = document.getElementById("rp_tr_sub_price");
            var rp_tr_submit = document.getElementById("rp_tr_submit");

            rp_tr_price.value = parseFloat(rp_tr_price.value).toFixed(2);

            // if price invalid, disable submit button
            if(rp_tr_price.value < 0.01) {
              rp_tr_sub_price.textContent = "Price not valid";
              rp_tr_sub_price.className += " text-danger";
              rp_tr_submit.disabled = true;
            } else {
              if(!rp_tr_sub_shares.textContent) {
                rp_tr_sub_price.textContent = "Total: $" + (parseFloat(rp_tr_shares.value)*parseFloat(rp_tr_price.value)).toFixed(2);
              } else {
                rp_tr_sub_price.textContent = "";
              }
              rp_tr_sub_price.className = rp_tr_sub_ticker.className.replace( /(?:^|\s)text-danger(?!\S)/g , '' );
              if(rp_tr_isValid()) {
                rp_tr_submit.disabled = false;
              }
            }
          }

          function rp_tr_date_blur() {
            var rp_tr_date = document.getElementById("rp_tr_date");
            var rp_tr_sub_date = document.getElementById("rp_tr_sub_date");
            var rp_tr_submit = document.getElementById("rp_tr_submit");

            // if date invalid, disable submit button
            if(!isValidDate(new Date(Date.parse(rp_tr_date.value)))) {
              rp_tr_sub_date.textContent = "Please enter a valid date";
              rp_tr_submit.disabled = true;

            } else {
              var date = (new Date(Date.parse(rp_tr_date.value)));
              var month = (date.getMonth() + 1);
              month = month < 10 ? "0" + month : month;
              var day = date.getDate();
              day = day < 10 ? "0" + day : day;
              //rp_tr_date.value = month + "/" + day + "/" + date.getFullYear();
              rp_tr_sub_date.textContent = "";
              if(rp_tr_isValid()) {
                rp_tr_submit.disabled = false;
              }
            }
          }

          function isValidDate(d) {
            if(Object.prototype.toString.call(d) !== "[object Date]")
              return false;
            return !isNaN(d.getTime());
          }

          function rp_tr_isValid() {
            var rp_tr_sub_ticker = document.getElementById("rp_tr_sub_ticker");
            var rp_tr_sub_shares = document.getElementById("rp_tr_sub_shares");
            var rp_tr_sub_price = document.getElementById("rp_tr_sub_price");
            var rp_tr_sub_date = document.getElementById("rp_tr_sub_date");
            return !(new RegExp("text-danger")).test(rp_tr_sub_ticker.className)
              && !(new RegExp("text-danger")).test(rp_tr_sub_price.className)
              && !rp_tr_sub_shares.textContent
              && !rp_tr_sub_date.textContent;
          }
        </script>
      </div><!-- End of follow tab -->
    </div><!-- tab-content -->
  </div><!-- positon fixed -->
</div><!-- / right col -->
