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

<?php include("header.php"); ?>

    <!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body">

        <div class="hbox hbox-auto-xs hbox-auto-sm">

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">GOOG (Google, Inc.)</h1>
</div>
<div class="wrapper-md">

<div class="content">
    <div class="container">
        <div class="col-sm-12">
            <h3>Testing Database</h3>
        </div>
        <div class="col-sm-12">
            <form class="form-inline" role="form">
                <input type="text" placeholder="" id="stockCode" />

                <button type="button" class="btn btn-warning" onClick="getValue()">Go</button>
            </form>
        </div>
    </div>
</div>

<div class="container">
    <div id="container" style="height: 500px; width: 100px"></div>
    <p></p>
    <table id="table" class="table table-bordered table-hover">
        <tr>
            <th>
                <center>
                    <h5>Headlines from <span id="date">today.</span></h5>
                </center>
            </th>
        </tr>
    </table>

    <!-- <div class="container" id="wat"></div> -->

</div>

<div class="container">

  <div class="row">
    <div class="col-lg-4">
      <div class="panel panel-default">

        <div class="panel-heading font-bold">
          Popularity Rating
        </div>
        <div class="panel-body text-center">
          <div class="inline">
            <div ui-jq="easyPieChart" ui-options="{
                      percent: 75,
                      lineWidth: 10,
                      trackColor: '#e8eff0',
                      barColor: '#fad733',
                      scaleColor: '#e8eff0',
                      size: 188,
                      lineCap: 'butt'
                    }">
              <div>
                <span class="h2 m-l-sm step">75 %</span>

              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer"><small>% of viewers today</small></div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">
          Views
        </div>
        <div class="panel-body text-center">
          <div class="inline">
            <div ui-jq="easyPieChart"  ui-options="{
                      percent: 25,
                      lineWidth: 10,
                      trackColor: '#e8eff0',
                      barColor: '#27c24c',
                      scaleColor: '#e8eff0',
                      size: 188,
                      lineCap: 'butt',
                      animate: 1000
                    }">
              <div>
                <span class="h2 m-l-sm step">25</span>
              </div>
            </div>
          </div>

        </div>
        <div class="panel-footer"><small>all time views</small></div>
      </div>
    </div>
    <div class="col-lg-4"></div>

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
