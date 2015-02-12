<?php include 'includes/session.php'; ?>

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
    <div class="container">
      <div class="m-b-lg">
        <p><a href="user_setup.php">Go to profile setup</a></p>
        <p>$_SESSION variables: </p>
        <ul>
<?php
  foreach($_SESSION as $key => $value) {
    echo '        <li>'.$key.': '.$value.'</li>';
  }
?>
        </ul>
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
