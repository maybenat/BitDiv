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

.price-box {
  margin: 0 auto;
  background: #E9E9E9;
  border-radius: 10px;
  padding: 40px 15px;
  /*width: 500px;*/
}

.ui-widget-content {
  border: 1px solid #bdc3c7;
  background: #e1e1e1;
  color: #222222;
  margin-top: 4px;
}

.ui-slider .ui-slider-handle {
  position: absolute;
  z-index: 2;
  width: 7.2em;
  height: 2.7em;
  cursor: default;
  margin: 0 -40px auto !important;
  text-align: center; 
  line-height: 30px;
  color: #FFFFFF;
  font-size: 12px;
}

.ui-slider .ui-slider-handle .glyphicon {
  color: #FFFFFF;
  margin: 0 1px; 
  font-size: 11px;
  opacity: 0.7;
}

.ui-corner-all {
  border-radius: 20px;
}

.ui-slider-horizontal .ui-slider-handle {
  top: -.9em;
}

.ui-state-default,
.ui-widget-content .ui-state-default {
  border: 1px solid #f9f9f9;
  background: #3498db;
}

.ui-slider-horizontal .ui-slider-handle {
  margin-left: -0.5em;
}

.ui-slider .ui-slider-handle {
  cursor: pointer;
}

.ui-slider a,
.ui-slider a:focus {
  cursor: pointer;
  outline: none;
}

.price, .lead p {
  font-weight: 600;
  font-size: 32px;
  display: inline-block;
  line-height: 60px;
  border:0;
  width: 245px;
}

h4.great {
  background: #00ac98;
  margin: 0 0 25px -60px;
  padding: 7px 15px;
  color: #ffffff;
  font-size: 18px;
  font-weight: 600;
  border-radius: 5px;
  display: inline-block;
  -moz-box-shadow:    2px 4px 5px 0 #ccc;
    -webkit-box-shadow: 2px 4px 5px 0 #ccc;
    box-shadow:         2px 4px 5px 0 #ccc;
}

.total {
  border-bottom: 1px solid #7f8c8d;
  /*display: inline;
  padding: 10px 5px;*/
  position: relative;
  padding-bottom: 20px;
}

.total:before {
  content: "";
  display: inline;
  position: absolute;
  left: 0;
  bottom: 5px;
  width: 100%;
  height: 3px;
  background: #7f8c8d;
  opacity: 0.5;
}

.price-slider {
  margin-bottom: 70px;
}

.price-slider span {
  font-weight: 200;
  display: inline-block;
  color: #7f8c8d;
  font-size: 16px;
}

.form-pricing {
  background: #ffffff;
  padding: 20px;
  border-radius: 4px;
}

.price-form {
  background: #ffffff;
  padding: 5px;
  border: 1px solid #eeeeee;
  border-radius: 4px;
  /*-moz-box-shadow:    0 5px 5px 0 #ccc;
    -webkit-box-shadow: 0 5px 5px 0 #ccc;
    box-shadow:         0 5px 5px 0 #ccc;*/
}

.form-group {
  margin-bottom: 0;
}

.form-group span.price {
  font-weight: 200;
  display: inline-block;
  color: #7f8c8d;
  font-size: 14px;
}

.help-text {
  display: block;
  margin-top: -10px;
  margin-bottom: 10px;
  color: #737373;
  /*position: absolute;*/
  /*margin-left: 20px;*/
  font-weight: 200;
  /*text-align: right;*/
  width: 188px;
}

.price-form label {
  font-weight: 200;
  font-size: 21px;
}

img.payment {
  display: block;
    margin-left: auto;
    margin-right: auto
}

.ui-slider-range-min {
  background: #2980b9;
}

.active-month,
.active-term {
  background: #3276b1;
}

/* HR */

hr.style {
  margin-top: 0;
    border: 0;
    border-bottom: 1px dashed #ccc;
    background: #999;
}


#top-link-block.affix-top {
    position: absolute; /* allows it to "slide" up into view */
    bottom: -82px; /* negative of the offset - height of link element */
    right: 10px; /* padding from the left side of the window */
}
#top-link-block.affix {
    position: fixed; /* keeps it on the bottom once in view */
    bottom: 18px; /* height of link element */
    right: 10px; /* padding from the left side of the window */
}


</style>

</head>
<body>
  <?php

  // The value of the variable name is found
  $key = $_GET["stocks"];
  ?>
  <script type="text/javascript">
  window.onload = function() {
    var javaScriptVar = "<?php print $key ?>";
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
            <h1 class="m-n font-thin h3"><span id="currentName"></h1><span id="currentPrice">
          </div>
          <div class="wrapper-md-fixed">

            <div class="content-fixed">
               <div class="row text-center">
      <a href="#" class="btn btn-lg btn-info" data-toggle="modal" data-target="#basicModal">What should I look for?</a>
  </div>
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Getting Started</h4>
      </div>
      <div class="modal-body">
                <h3>Some useful tips</h3>
                  <p> 1. Drag on the graph to zoom in. </p>
                  <p> 2. Toggle different moving averages </p>
                  <p> 3. Compare how the moving averages and MACD indicate trends in the price. </p>
                  <p> 4. Click on the price in order to fetch relevant news related to the stock. See how reactionary the markets are by clicking on low and high points! </p>

        <h3>Moving Average Crossovers</h3>
        <p>Price moves from one side of a moving average and closes on the other.</p>
        <img src = "img/avg2.png" />
        <p>The second type of crossover occurs when a short-term average crosses through a long-term average. HIGHLY OBJECTIVE.</p>
        <img src = "img/avg2.png" />
        <h3>MACD Crossovers</h3>
        <p> MACD goes below the signal line, bearish indicator, may be time to SELL. MACD above the signal line, bullish indicator, the stock might be going up! </p>
        <img src = "img/macd.png" />

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Now let me go try!</button>
      </div>
    </div>
  </div>
</div>


              <div class="container">

                <div class="col-sm-12">

                </div>

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

                                                    <th>Key Dates</th>
                                                    <th>Payout</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="active">
                                                     <td class="active"><span id="exDivDate"></td>
                                                   <td class="active"><span id="divPayout"></td>
                                                </tr>
                                                <tr>
                                                    <td class="active"><span id="divdat"></td>
                                                    <td class="active"><span id="divYield"></td>
                                                </tr>
                                              
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

          
          </div>
          <div class="container">
      <div class="price-box">
        <div class="row">
          <div class="col-sm-4">
                <form class="form-horizontal form-pricing" role="form">

                  <div class="price-slider">
                    <h4 class="great">Shares</h4>
                    <span>Minimum 1 is required</span>
                    <div class="col-sm-12">
                      <div id="slider_amirol"></div>
                       <input name="sliderVal" type="hidden" id="sliderVal" readonly="readonly" />

                    </div>
                  </div>
                  <div class="price-slider">
                    <h4 class="great">Price</h4>
                    <div class="col-sm-12">
                      <div id="slider_amirol2"></div>
                      <input name="sliderVal2" type="hidden" id="sliderVal2" readonly="readonly" />
                    </div>
                  </div>
                  
              </div>
              <div class="col-md-3">
                <div class="price-form">

                  <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="amount_amirol">Amount Paid ($): </label>
                          <span class="help-text">Monthly or Reinvest</span>
                        </div>
                        <div class="col-sm-12">
                            <input type="hidden" id="amount_amirol" class="form-control">
                            <!-- <p class="price lead" id="total"></p> -->
                            <input class="price lead" name="totalprice" type="text" id="total" disabled="disabled" style="" />
                        </div>
                    </div>
                    </div>
                       <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="amount_amirol" class="control-label">Total Investment ($): </label>
                          <span class="help-text">Monthly or Reinvest</span>
                        </div>
                        <div class="col-sm-12">
                            <input type="hidden" id="amount_amirol" class="form-control">
                            <!-- <p class="price lead" id="total"></p> -->
                            <input class="price lead" name="totalprice12" type="text" id="total12" disabled="disabled" style="" />
                        </div>

                    </div>
                    </div>
    <div class="form-group">
                      <div class="row">
                        <div class="col-sm-12">
                          <label for="amount_amirol" class="control-label">Shares Needed ($): </label>
                          <span class="help-text">Monthly or Reinvest</span>
                        </div>
                        <div class="col-sm-12">
                            <input type="hidden" id="amount_amirol" class="form-control">
                            <!-- <p class="price lead" id="total"></p> -->
                            <input class="price lead" name="shares" type="text" id="shares" disabled="disabled" style="" />
                        </div>
                        
                    </div>
                    </div>
                  </div>

                </form>
            </div>
        </div>

          </div>

      </div>


<!--         <div class="panel wrapper">
            <div id="safety"></div>

          </div> -->
        <div class="panel wrapper">
           <div class="row text-center">
      <a href="#" class="btn btn-lg btn-info" data-toggle="modal" data-target="#basicModal2">What are these metrics?</a>
  </div>
<div class="modal fade" id="basicModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal2" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Metrics</h4>
      </div>
      <div class="modal-body">
                <h3>PE/G Ratio</h3>
                  <p> Normalizes the PE for growth rate. </p>
                  <p> When this is negative the stock is probably undervalued. </p>
                  <p> When this is positive the stock is probably overvalued. The higher the number the more overvalued it is. </p>

        <h3>EBITDA</h3>
                          <p> EBITDA = Revenue - Expenses (excluding interest, taxes) </p>
                  <p> Use this to compare profitability against companies in the same sector. </p>
        <h3>Forward PE</h3>
                <p>Forward P/E can be used to compare current to estimated future earnings. </p>
                  <p>If earnings are expected to grow in the future, the Forward P/E will be lower than the current P/E. </p>

</p>

        <h3>Price/BV</h3>
                <p>If this is <= 3 typically two things are considered: </p>
                <p>1) Undervalued </p>
                <p>2) The stock will fail </p>
                <p>Be sure to check out the other metrics to make your decision </p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

                        <div id="pie"></div>
          </div>
        <div class="panel wrapper">


            <div id="container3"></div>
           <div class="row text-center">
      <a href="#" class="btn btn-lg btn-info" data-toggle="modal" data-target="#basicModal3">Help?</a>
  </div>
<div class="modal fade" id="basicModal3" tabindex="-1" role="dialog" aria-labelledby="basicModal3" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Help?</h4>
      </div>
            <div class="modal-body">
                <h3>What should I look for?</h3>
                  <p> 1) Price Changes</p>
                  <p> 2) Positive changes in volume means lots of people are buying this stock.  </p>
                  <p> 3) Negative changes in volume mean lots of people are selling. You might want to look into this. </p>
                  <p> 3) Big changes in Moving Averages? Go look further into the interactive graph above. </p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
          </div>


        <div class="panel wrapper">
            <div id="container2"></div>
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
<span id="top-link-block" class="hidden">
    <a href="#top" class="well well-sm"  onclick="$('html,body').animate({scrollTop:0},'slow');return false;">
        <i class="glyphicon glyphicon-chevron-up"></i> Top
    </a>
</span>

<script type="text/javascript">
if ( ($(window).height() + 100) < $(document).height() ) {
    $('#top-link-block').removeClass('hidden').affix({
        // how far to scroll down before link "slides" into view
        offset: {top:100}
    });
}</script>


<?php include 'right_column.php'; ?>

</div>
</div>

<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.min.js"></script>
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>


</body>
</html>
