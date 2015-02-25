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

</head>

<body>
    <div class="app app-header-fixed">

       <?php include("header.php"); ?>

        <!-- content -->
        <div id="content" class="app-content" role="main">
            <div class="app-content-body ">


                <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
    app.settings.asideFolded = false;
    app.settings.asideDock = false;
  ">
                    <!-- main -->
                    <div class="col">
                        <!-- main header -->
                        <div class="bg-light lter b-b wrapper-md">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <h1 class="m-n font-thin h3 text-black">Dashboard</h1>
                                    <small class="text-muted">Welcome back,</small>
                                </div>
                                <div class="col-sm-6 text-right hidden-xs">
                                    <div class="inline m-r text-left">
                                        <div class="m-b-xs">6 <span class="text-muted">stocks</span>
                                        </div>
                                        <div ui-jq="sparkline" ui-options="[ 106,108,110,105,110,109,105,104,107,109,105,100,105,102,101,99,98 ], {type:'bar', height:20, barWidth:5, barSpacing:1, barColor:'#dce5ec'}" class="sparkline inline">loading...
                                        </div>
                                    </div>
                                    <div class="inline text-left">
                                        <div class="m-b-xs">$10,012 <span class="text-muted">invested</span>
                                        </div>
                                        <div ui-jq="sparkline" ui-options="[ 105,102,106,107,105,104,101,99,98,109,105,100,108,110,105,110,109 ], {type:'bar', height:20, barWidth:5, barSpacing:1, barColor:'#dce5ec'}" class="sparkline inline">loading...
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">

                            <div class="panel hbox hbox-auto-xs no-border">
                                <div class="col wrapper">
                                    <i class="fa fa-circle-o text-info m-r-sm pull-right"></i>
                                    <h4 class="font-thin m-t-none m-b-none text-primary-lt">Recommendations for you.</h4>
                                    <span class="m-b block text-sm text-muted">(updated 1 hour ago)</span>

                                </div>
                                <div class="col wrapper-lg w-lg bg-light dk r-r">
                                    <h4 class="font-thin m-t-none m-b">Reports</h4>
                                    <div class="">
                                        <div class="m-b">
                                            <a href="ui_chart.php">
                                                <span class="pull-right text-primary">60%</span>
                                                <span>LMT</span>
                                            </a>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-primary" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                                        </div>
                                        <div class="m-b">
                                            <span class="pull-right text-info">35%</span>
                                            <span>SJM</span>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                                        </div>
                                        <div class="m-b">
                                            <span class="pull-right text-warning">25%</span>
                                            <span>UNP</span>
                                        </div>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- / service -->

                            <!-- tasks -->
                            <div class="panel wrapper">
                                <div class="row">
                                    <div class="col-md-6 b-r b-light no-border-xs">

                                        <h4 class="font-thin m-t-none m-b-md text-muted">Dividend Payouts</h4>
                                        <div class=" m-b">
                                            <div class="m-b">
                                                <span class="label text-base bg-warning pos-rlt m-r"><i class="arrow right arrow-warning"></i> 02/20</span>
                                                <a href>BLAH</a>
                                            </div>
                                            <div class="m-b">
                                                <span class="label text-base bg-info pos-rlt m-r"><i class="arrow right arrow-info"></i> 03/12</span>
                                                <a href>LMT</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row row-sm">
                                            <div class="col-xs-6 text-center">
                                                <div ui-jq="easyPieChart" ui-options="{
                    percent: 75,
                    lineWidth: 4,
                    trackColor: '#e8eff0',
                    barColor: '#7266ba',
                    scaleColor: false,
                    size: 115,
                    rotate: 90,
                    lineCap: 'butt'
                  }" class="inline m-t">
                                                    <div>
                                                        <span class="text-primary h4">75%</span>
                                                    </div>
                                                </div>
                                                <div class="text-muted font-bold text-xs m-t m-b">of total invested</div>
                                            </div>
                                            <div class="col-xs-6 text-center">
                                                <div ui-jq="easyPieChart" ui-options="{
                    percent: 50,
                    lineWidth: 4,
                    trackColor: '#e8eff0',
                    barColor: '#23b7e5',
                    scaleColor: false,
                    size: 115,
                    rotate: 180,
                    lineCap: 'butt'
                  }" class="inline m-t">
                                                    <div>
                                                        <span class="text-info h4">50%</span>
                                                    </div>
                                                </div>
                                                <div class="text-muted font-bold text-xs m-t m-b">Dividend Paying</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- / main -->

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
