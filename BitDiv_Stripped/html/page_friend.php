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
</head>
<body>
  <div class="app app-header-fixed">

    <?php include 'header.php'; ?>

    <!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body ">

        <div class="hbox hbox-auto-xs hbox-auto-sm">

          <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">Following</h1>
          </div>

          <div class="wrapper-md">
            <div class=" col-md-9 col-lg-9 ">
              <table class="table table-user-information">
                <tbody>
                  <?php include 'friendDB.php';?>
                  <?php foreach ($friendList as $key => $value) {
                    $email = $value['email'];
                    echo "<tr>";
                    foreach ($value as $key => $info) {
                      print_r("<td><a href=\"page_people.php?email=$email&following=1\"> $info </a></td>");
                    }
                    echo "</tr>";
                  } ?>
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
