<?php include 'includes/session.php'; ?>

<?php include 'includes/portfolio_populate.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>bitdiv</title>

  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />

  <script src="../bower_components/jquery/dist/jquery.min.js"></script>
  <script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>

  <script src="http://code.highcharts.com/stock/highstock.js"></script>
  <script src="js/algs.js"></script>
  <script src="js/stock.js"></script>

  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script type="text/javascript" src="js/ddaccordion.js">
    /***********************************************
     * Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
     * Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
     * This notice must stay intact for legal use
     ***********************************************/
  </script>

  <script type="text/javascript">
    ddaccordion.init({
      headerclass: "expandable", //Shared CSS class name of headers group that are expandable
      contentclass: "categoryitems", //Shared CSS class name of contents group
      revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
      mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
      collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
      defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
      onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
      animatedefault: false, //Should contents open by default be animated into view?
      persiststate: true, //persist state of opened contents within browser session?
      toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
      togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
      animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
      oninit:function(headers, expandedindices) { //custom code to run when headers have initalized
        //do nothing
      },
      onopenclose:function(header, index, state, isuseractivated) { //custom code to run whenever a header is opened or closed
        //do nothing
      }
    })
  </script>
  <style>
  .fixed {
    position: fixed;
    width: 100%;
  }
  </style>
</head>
<body>
  <div class="app app-header-fixed">

<?php include 'header.php'; ?>

    <!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body">

        <div class="hbox hbox-auto-xs hbox-auto-sm">

        <div class="bg-light lter b-b wrapper-md">
          <h1 class="m-n font-thin h3">My Portfolios</h1>
        </div>

        <div class="wrapper-md">

                            <div class="panel hbox hbox-auto-xs no-border">
                                <div class="col wrapper">

<?php
  //print_r($user_stocks);

  echo '      <ul class="nav nav-tabs">', PHP_EOL;

  // print tabs for each portfolio
  // tabs labeled with id=portfolio{i}
  echo '        <li class="active"><a href="#portfolio1" data-toggle="tab">Portfolio 1<i class="fa"></i></a></li>', PHP_EOL;
  for($i = 2; $i <= $_SESSION['number_portfolios']; $i++) {
    echo '        <li><a href="#portfolio'.$i.'" data-toggle="tab">Portfolio '.$i.'<i class="fa"></i></a></li>', PHP_EOL;
  }

  // add tab for new portfolio, id=portfolio_new
  //echo '        <li><a href="includes/new_portfolio.php" data-toggle="tab">New Portfolio<i class="fa"></i></a></li>', PHP_EOL;


  echo '      </ul>', PHP_EOL;

  echo '      <div class="tab-content">', PHP_EOL;

  // print tables for each portfolio, populate with stocks associated with portfolio
  for($i = 1; $i <= $_SESSION['number_portfolios']; $i++) {

    $active = $i == 1 ? ' active' : '';
    echo '        <div class="tab-pane'.$active.'" id="portfolio'.$i.'">', PHP_EOL;

    $num_stocks = 0;
    $total_invested = 0;
    foreach($_SESSION['user_stocks'][$i] as $key => $value) {
      $num_stocks++;
      foreach($value as $sid => $sparams) {
        if($sparams['transfer']) {
          //$total_invested -= $sparams['number_shares'];
        } else {
          $total_invested += $sparams['number_shares']*$sparams['price'];
        }
      }
    }

        // identify columns
        echo '          <div class="bg-light b-b wrapper-md">', PHP_EOL;
        echo '            <h1 class="m-n font-thin h3">Portfolio '.$i.'</h1>', PHP_EOL;
        echo '            <p><small>'.$num_stocks.' stocks, $'.number_format((float)$total_invested, 2, '.', '').' invested</small></p>', PHP_EOL;
        //echo '            <p><small class="text-muted">ticker / number shares / price / date purchased</small></p>', PHP_EOL;
        echo '          </div>', PHP_EOL;


    // enumerate stocks in portfolio
    $num_stocks = 0;

    // key => value
    // ticker => (stock_id => params)
    foreach($_SESSION['user_stocks'][$i] as $key => $value) {

      $total_num_shares = 0;
      $original_investment = 0;
      foreach($value as $sid => $sparams) {
        if($sparams['transfer']) {
          $total_num_shares -= $sparams['number_shares'];
        } else {
          $original_investment += $sparams['number_shares']*$sparams['price'];
          $total_num_shares += $sparams['number_shares'];
        }
      }


/*
Route::get('fetch', function() {
  $stock = Input::get('stock');
  $cache_key = 'stock_data' . date('Y-m-d') . $stock;
  $data = Cache::get($cache_key);

  if(!$data) {
    $resource = "https://query.yahooapis.com/v1/public/yql?q=";
    $resource .= urlencode("select * from yahoo.finance.quotes ");
    $resource .= urlencode("where symbol in ('$stock')");
    $resource .= "&format=json&diagnostics=true";
    $resource .= "&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&callback=";

    try {
      $data = file_get_contents($resource);
    } catch(Exception $e) {
      $data = json_encode(['error' => $e->getMessage()]);
    }

  }
*/


      echo '          <div class="bg-light lter b-b wrapper-md expandable">', PHP_EOL;
      echo '            <h1 class="m-n font-thin h3">'.$key.' / '.$total_num_shares.' shares / $'.$original_investment.'</h1>', PHP_EOL;
      echo '          </div>', PHP_EOL;
      echo '          <div class="categoryitems">', PHP_EOL;
      echo '          <div class="row">', PHP_EOL;
      echo '            <div class="container">', PHP_EOL;
      echo '            <div class="col-lg-3">', PHP_EOL;
      echo '              <strong>Purchase history</strong>', PHP_EOL;

      // stock ticker => stock_id
      foreach($value as $sid => $sparams) {
        $transfer = $sparams['transfer'] ? 'Sold' : 'Bought';
        $color = $sparams['transfer'] ? 'text-danger' : 'text-success';
        $sprice = number_format((float)$sparams['price'], 2, '.', '');
        echo '            <div class="'.$color.'">'.$transfer.': '.$key.' / '.$sparams['number_shares'].' shares / $'.$sprice.' / '.$sparams['date_purchased'].'</div>', PHP_EOL;

      }

      echo '            </div>', PHP_EOL;
      echo '            <div class="col-lg-9">', PHP_EOL;

      // sell/remove stocks form
      echo '            <ul class="nav nav-pills nav-stacked">', PHP_EOL;
      echo '              <li><a href="#sell_'.$key.'" data-toggle="tab">Sell<i class="fa"></i></a></li>', PHP_EOL;
      echo '              <li><a href="#remove_'.$key.'" data-toggle="tab">Remove<i class="fa"></i></a></li>', PHP_EOL;
      echo '            </ul>', PHP_EOL;
      echo '            <div class="tab-content">', PHP_EOL;
      echo '              <div class="tab-pane" id="sell_'.$key.'">', PHP_EOL;
      echo '                <p>Sell shares of this stock and register sale with portfolio.</p>', PHP_EOL;
?>
                <div class="form-group">
                  <form action="includes/form_transaction.php?act=sell&referer=<?php echo $current_page_url; ?>" method="post">
                    <p class="m-t">Shares sold:</p>
                    <input type="number" name="number_shares" placeholder="number of shares" class="form-control" required />
                    <p class="m-t">Price at time of sale:</p>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="number" name="price" placeholder="price" class="form-control" required value="" /> <!-- fix input type/view -->
                    </div>
                    <button name="submit" value="<?php echo $sid; ?>" type="submit" class="btn btn-default btn-rounded m-t">Submit</button>
                    <button type="reset" class="btn btn-default btn-rounded m-t">Clear</button>
                  </form>
                </div>

<?php
      echo '              </div>', PHP_EOL;
      echo '              <div class="tab-pane" id="remove_'.$key.'">', PHP_EOL;
      echo '                <p>Remove a purchase without updating portfolio.</p>', PHP_EOL;
      echo '              </div>', PHP_EOL;
      echo '            </div>', PHP_EOL;


      echo '            </div>', PHP_EOL;
      echo '            </div>', PHP_EOL;
      echo '          </div>', PHP_EOL;

      echo '          </div>', PHP_EOL;

      $num_stocks++;
    }

    if($num_stocks == 0) {
      echo '          <div class="bg-light lter b-b wrapper-md">', PHP_EOL;
      echo '            <h4 class="m-n font-thin h4">No stocks to show.</h4>', PHP_EOL;
      echo '          </div>', PHP_EOL;
    }

    echo '        </div>', PHP_EOL;
  }

  // TODO: implement new portfolio
  echo '        <div class="tab-pane" id="portfolio_new">', PHP_EOL;
  echo '          <div class="bg-light lter b-b wrapper-md">', PHP_EOL;
  //echo '            <h1 class="m-n font-thin h3">TODO: Implement New Portfolio function in script at bottom of page.</h1>', PHP_EOL;
  echo '          </div>', PHP_EOL;
  echo '        </div>', PHP_EOL;

  echo '      </div>', PHP_EOL;
?>

                                </div>
                            </div>

        </div>

<?php include 'right_column.php'; ?>

        </div>

      </div>
    </div>
    <!-- / content -->

  </div>

  <script src="js/ui-load.js"></script>
  <script src="js/ui-jp.config.js"></script>
  <script src="js/ui-jp.js"></script>
  <script src="js/ui-nav.js"></script>
  <script src="js/ui-toggle.js"></script>

</body>
</html>
