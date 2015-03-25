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
<!-- <script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
-->

<style>


.loading {
  opacity:0.45;
/*   -moz-opacity:0.45;
*/   filter:alpha(opacity=0.45);
position:center;
width:900px;
x-padding: 20px;
}

.table {
  width:700px;
  x-padding: 20px;
}

</style>

</head>
<body>
  <?php

  // The value of the variable name is found
  $somevar = $_GET["stocks"];
  ?>
  <script type="text/javascript">
  window.onload = function() {
    var javaScriptVar = "<?php print $somevar ?>";
    console.log(javaScriptVar);
  getValue(javaScriptVar);
};</script>
  <div class="app app-header-fixed">

    <?php include("header.php"); ?>
    <!-- content -->
    <div id="content" class="app-content" role="main">
      <div class="app-content-body">

        <div class="hbox hbox-auto-xs hbox-auto-sm">

          <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3"><span id="currentName"></h1>
          </div>
          <div class="wrapper-md-fixed">

            <div class="content-fixed">
              <div class="container">

                <div class="col-sm-12">
                  <!-- <div class="loading"><img src="img/load.GIF" /><img src="img/load.GIF" /><p></div> -->

                </div>
                <!-- <div class="col-sm-12"> -->
            <!-- <form class="form-inline" role="form">
                <input type="text" placeholder="" id="stockCode" />

                <button type="button" class="btn btn-warning" onClick="getValue()">Go</button>
              </form> -->
              <!-- </div> -->
            </div>
          </div>

                 <div class="panel wrapper">

            <div class="loading"><img src="img/load.GIF" alt="" /><img src="img/load.GIF" alt="Be patient..." /><h1>Loading Data....</h1></div>

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

<!--             <div class="row"> -->

              <div class="panel wrapper">
                                <div class="row">
                                    <div class="col-md-12 b-r b-light no-border-xs">
                                        <h4 class="font-thin m-t-none m-b-md text-muted">Dividend Information:</h4>
                                        <table class="table table-hover">
                                            <thead>
<a tabindex="0" class="btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus" title="Dismissible popover" data-content="And here's some amazing content. It's very engaging. Right?">Dismissible popover</a><script>
$('[data-toggle="popover"]').popover();



                                              </script>
                                                <tr>
                                                    <th>Key Dates</th>
                                                    <th>Payout</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="active">
                                                    <td class="success"><span id="exDivDate"></td>
                                                   <td class="success"><span id="divPayout"></td>
                                                </tr>
                                                <tr>
                                                    <td class="success"><span id="divdat"></td>
                                                    <td class="success"><span id="divYield"></td>
                                                </tr>
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

             <!--  <div class="col-lg-4">
                <div class="panel panel-default">

                  <div class="panel-heading font-bold">
                    Dividend Information
                  </div>
                  <div class="panel-body">
                    <div class="inline">
                      <div>
                        <span class="h2 m-l-sm step"><span id="exDivDate"></span>
                        <span class="h2 m-l-sm step"><span id="divdat"></span>
                        <span class="h3 m-l-sm step"><span id="divPayout"></span>
                        <span class="h3 m-l-sm step"><span id="divYield"></span>


                      </div>
                    </div>
                  </div>
                  <div class="panel-footer"><small></small></div>
                </div>
              </div>
              <div class="col-lg-4">
                <div class="panel panel-default">
                  <div class="panel-heading font-bold">
                    Safety Rating
                  </div>
                  <div class="panel-body text-center">
                    <div class="inline">
                      <div id="safety">
                        <div>
                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="panel-footer"><small>Is the stock overvalued right now?</small></div>
                </div>
              </div>
              <div class="col-lg-4"></div>

            </div> -->
          </div>


        <div class="panel wrapper">
            <div id="safety"></div>

          </div>
        <div class="panel wrapper">
                        <div id="pie"></div>
          </div>


        <div class="panel wrapper">
            <div id="container2"></div>
          </div>

        <div class="panel wrapper">
            <div id="container3"></div>

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

  
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>

</body>
</html>
