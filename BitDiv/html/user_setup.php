<?php include 'includes/session.php'; ?>

<?php include './includes/form_user_setup.php'; ?>

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
    <div class="container w-xxl w-auto-xs">
      <div class="m-b-lg">
        <form name="form" class="form-validation" method="post" action="user_setup.php">

          <?php include 'includes/form_user_setup/page'.$form_page.'.php'; ?>

          <button type="submit" name="prev<?php echo $form_page; ?>" class="btn btn-lg <?php if($form_page == 1) echo 'hidden'; ?>">Previous</button>
          <button type="submit" name="next<?php echo $form_page; ?>" class="btn btn-lg btn-primary"><?php if($form_page == $NUM_PAGES) echo 'Finish'; else echo 'Next'; ?></button>
          <div class="line line-dashed"></div>

          <div class="progress-xs progress ng-isolate-scope" type="success" value="steps.percent">
            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $percent_complete; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percent_complete; ?>%;" aria-valuetext="<?php echo $percent_complete; ?>%">
            </div>

          </div>

        </form>
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
