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
    <?php include 'people_info.php'; ?>
    <?php include 'follow.php' ?>
    <!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">
          <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">
              <?php echo "$firstname $lastname";?>
              <input id="following" type="button" class="btn btn-default" value=<?php echo $following; ?>>
            </h1>
          </div>

          <script type="text/javascript">
            $(document).ready(function(){
              $('#following').click(function(){
                var thisValue = $(this).val();
                var newValue = $(this).val() == "follow" ? 1 : 0;
                var user_email = '<?php echo $user_email ?>';
                var ajaxurl = 'follow.php';
                //alert(user_email);
                data =  {'action': thisValue, 'email': user_email};
                $.post(ajaxurl, data, function (response) {
                  location.href = location.origin + location.pathname + '?email='+user_email+'&following='+newValue;
                });
              });
            });
          </script>

          <div class="wrapper-md">
            <div class=" col-md-9 col-lg-9">
              <table class="table table-user-information">
                <tbody>
                  <tr>
                    <td>Email:</td>
                    <td><?php echo $emailkey; ?></td>
                  </tr>
                  <tr>
                    <td>First Name:</td>
                    <td><?php echo $firstname; ?></td>
                  </tr>
                  <tr>
                    <td>Last Name:</td>
                    <td><?php echo $lastname; ?></td>
                  </tr>
                  <tr>
                    <td>Age:</td>
                    <td><?php echo $age; ?></td>
                  </tr>
                  <tr>
                    <td>Funding</td>
                    <td><?php echo $funding; ?></td>
                  </tr>
                  <tr>
                    <td>Risk Level:</td>
                    <td><?php switch ($risk){ case 0:echo 'High Risk';break; case 1:echo 'Medium Risk';break; case 2:echo 'Low Risk';break; }; ?></td>
                  </tr>
                  <tr>
                    <td>Reinvest/Monthly Payout:</td>
                    <td><?php switch ($reinvest) {case 0: echo 'Reinvest';break; case 1: echo'Monthly Payout';break;}; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div><p>this is portfoilo</p></div>
          </div>
          <?php include 'right_column.php'; ?>
        </div>
      </div>
    </div>
    <!-- / content -->

    <script src="js/ui-load.js"></script>
    <script src="js/ui-jp.config.js"></script>
    <script src="js/ui-jp.js"></script>
    <script src="js/ui-nav.js"></script>
    <script src="js/ui-toggle.js"></script>

  </body>
  </html>
