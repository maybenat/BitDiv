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
              <?php echo "$firstname $lastname" ;; ?>
              <button type="submit" class="btn btn-default" value=<?php echo $following; ?>><?php echo $following; ?></button>
            </h1>
          </div>

          <script type="text/javascript">
            $(document).ready(function(){
              $('button').click(function(){
                var clickBtnValue = $(this).val();
                //alert(clickBtnValue);
                var ajaxurl = 'follow.php',
                data =  {'action': clickBtnValue};
                $.post(ajaxurl, data, function (response) {
                  alert(response)
                });
              });
            });
          </script>


          <div class="wrapper-md">
            <div class=" col-md-9 col-lg-9 ">
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
                    <tr>
                      <td>Risk Level:</td>
                      <td><?php switch ($risk){ case 0:echo 'High Risk';break; case 1:echo 'Medium Risk';break; case 2:echo 'Low Risk';break; }; ?></td>
                    </tr>
                    <tr>
                      <td>Reinvest/Monthly Payout:</td>
                      <td><?php switch ($reinvest) {case 0: echo 'Reinvest';break; case 1: echo'Monthly Payout';break;}; ?></td>
                    </tr>
                    <td>desired_monthly_payout:</td>
                    <td><?php echo $desired_monthly_payout; ?></td>
                  </tr>
                </tbody>
              </table>


            </div>
          </div>
          <?php include 'right_column.php'; ?>
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
