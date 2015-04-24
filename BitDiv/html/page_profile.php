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
</head>
<body>
  <div class="app app-header-fixed">
    <?php include 'header.php'; ?>
    <!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">
        <div class="hbox hbox-auto-xs hbox-auto-sm">
          <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">My Profile</h1>
          </div>
          <div class="wrapper-md">
            <!--<p><a href="user_setup.php">Go to profile setup</a></p>-->
            <p><input id="btn" type="button" value="Edit"></p>
            <?php include "save_info.php"; ?>
            <?php include "page_profile_edit.php"; ?>
            <?php include "page_profile_info.php"; ?>
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

    <script type="text/javascript">
      $(document).ready(function(){
        var status = 0;
        $( "#btn" ).click(function() {
          if (status == 0)
          {
            $("#profile").hide();
            $("#edit").show();
            status = 1;
            this.value = "Back";
          }
          else
          {
            $("#profile").show();
            $("#edit").hide();
            status = 0;
            this.value = "Edit";
          }
        });
      });
    </script>

  </body>
  </html>
