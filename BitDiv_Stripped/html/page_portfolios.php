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
</head>
<body>
  <div class="app app-header-fixed">

<?php include 'header.php'; ?>

    <!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">

        <div class="hbox hbox-auto-xs hbox-auto-sm">

        <div class="bg-light lter b-b wrapper-md">
          <h1 class="m-n font-thin h3">My Portfolios</h1>
        </div>

        <div class="wrapper-md">

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
  echo '        <li><a href="#portfolio_new" data-toggle="tab">New Portfolio<i class="fa"></i></a></li>', PHP_EOL;


  echo '      </ul>', PHP_EOL;

  echo '      <div class="tab-content">', PHP_EOL;

  // print tables for each portfolio, populate with stocks associated with portfolio
  for($i = 1; $i <= $_SESSION['number_portfolios']; $i++) {

    $active = $i == 1 ? ' active' : '';
    echo '        <div class="tab-pane'.$active.'" id="portfolio'.$i.'">', PHP_EOL;


        // identify columns
        echo '          <div class="bg-light lter b-b wrapper-md">', PHP_EOL;
        echo '            <h1 class="m-n font-thin h3">ticker / number shares / price / date purchased</h1>', PHP_EOL;
        echo '          </div>', PHP_EOL;


    // enumerate stocks in portfolio
    // key->ticker, value->db_row
    $num_stocks = 0;
    foreach($_SESSION['user_stocks'] as $key => $value) {
      if($value['portfolio'] == $i) {
        echo '          <div class="bg-light lter b-b wrapper-md">', PHP_EOL;
        echo '            <h1 class="m-n font-thin h3">'.$key.' / '.$value['number_shares'].' / '.$value['price'].' / '.$value['date_purchased'].'</h1>', PHP_EOL;
        echo '          </div>', PHP_EOL;
        $num_stocks++;
      }
    }

    if($num_stocks == 0) {
      echo '          <div class="bg-light lter b-b wrapper-md">', PHP_EOL;
      echo '            <h1 class="m-n font-thin h3">No stocks to show</h1>', PHP_EOL;
      echo '          </div>', PHP_EOL;
    }

    echo '        </div>', PHP_EOL;
  }

  // TODO: implement new portfolio
  echo '        <div class="tab-pane" id="portfolio_new">', PHP_EOL;
  echo '          <div class="bg-light lter b-b wrapper-md">', PHP_EOL;
  echo '            <h1 class="m-n font-thin h3">TODO: Implement New Portfolio function in script at bottom of page.</h1>', PHP_EOL;
  echo '          </div>', PHP_EOL;
  echo '        </div>', PHP_EOL;

  echo '      </div>', PHP_EOL;
?>

        </div>

<?php include 'right_column.php'; ?>

        </div>

      </div>
    </div>
    <!-- / content -->

  </div>

  <script>
$(document).ready(function() {
    $('#accountForm')
        .formValidation({
            excluded: [':disabled'],
            ...
        })

        // Called when a field is invalid
        .on('err.field.fv', function(e, data) {
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id');

            $('a[href="#' + tabId + '"][data-toggle="tab"]')
                .parent()
                .find('i')
                .removeClass('fa-check')
                .addClass('fa-times');
        })

        // Called when a field is valid
        .on('success.field.fv', function(e, data) {
            // data.fv      --> The FormValidation instance
            // data.element --> The field element

            var $tabPane = data.element.parents('.tab-pane'),
                tabId    = $tabPane.attr('id'),
                $icon    = $('a[href="#' + tabId + '"][data-toggle="tab"]')
                            .parent()
                            .find('i')
                            .removeClass('fa-check fa-times');

            // Check if the submit button is clicked
            if (data.fv.getSubmitButton()) {
                // Check if all fields in tab are valid
                var isValidTab = data.fv.isValidContainer($tabPane);
                $icon.addClass(isValidTab ? 'fa-check' : 'fa-times');
            }
        });
});
  </script>

  <script src="js/ui-load.js"></script>
  <script src="js/ui-jp.config.js"></script>
  <script src="js/ui-jp.js"></script>
  <script src="js/ui-nav.js"></script>
  <script src="js/ui-toggle.js"></script>

</body>
</html>
