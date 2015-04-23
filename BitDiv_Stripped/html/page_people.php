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
  <!-- <script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>-->

  <script src="http://code.highcharts.com/stock/highstock.js"></script>
  <script src="js/algs.js"></script>
  <script src="js/stock.js"></script>
</head>
<body>
  <div class="app app-header-fixed">
    <?php include 'header.php'; ?>
    <?php include 'people_info.php'; ?>
    <?php include 'follow.php'; ?>
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
                var my_email = "<?php echo $_SESSION['email'] ?>";
                var ajaxurl = 'follow.php';
                data =  {'action': thisValue, 'my_email': my_email, 'user_email': user_email};
                $.post(ajaxurl, data, function (response) {
                  //alert(response);
                  location.href = location.origin + location.pathname + '?email='+user_email+'&following='+newValue;
                });
              });
            });
          </script>

          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a data-target="#personal" data-toggle="tab">Profile</a></li>
            <li><a data-target="#Portfolio" data-toggle="tab">Portfolio</a></li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane active" id="personal">
             <div class="col-md-9 col-lg-9">
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
          </div>

          <!--Show Use's Portfoilo-->
          <div class="tab-pane" id="Portfolio">
           <div class="panel wrapper">
            <div class="row">
              <div class="col-md-12 b-r b-light no-border-xs">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Symbol</th>
                      <th>Name</th>
                      <th>Shares</th>
                      <th>Annual Dividend Payout Per Share (Total)</th>
                      <th>Last Open Price</th>
                      <th>Value</th>
                      <th>Date purchased</th>
                    </tr>
                  </thead>
                  <?php include "page_people_portfolios.php"; ?>
                  <tbody>
                    <?php
                    foreach ($stocks as $key => $value) {
                      if(!empty($value[0])){
                        echo "<tr>";
                        echo "<td>". $value[0]."</td>";
                        echo "<td>". $value[1]."</td>";
                        echo "<td>". $value[2]."</td>";
                        echo "<td>$". $value[3]."($".number_format($value[3] * $value[2],2,".","").")</td>";
                        echo "<td>". $value[4]."</td>";
                        echo "<td>". "$".number_format($value[4] * $value[2],2,".","")."</td>";
                        echo "<td>". $value[5]."</td>";
                        echo "</tr>";
                      }
                    }?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div><!-- / tab-content -->
      <?php include 'right_column.php'; ?>
    </div>
  </div>
</div>

<script>
  jQuery(function () {
    jQuery('#myTab a:first').tab('show')
  })
</script>
<!-- / content -->

<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>

</body>
</html>
