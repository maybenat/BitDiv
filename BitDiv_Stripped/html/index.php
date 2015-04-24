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

        <?php include("header.php"); ?>

        <!-- content -->
        <div id="content" class="app-content" role="main">
            <div class="app-content-body ">


                <div class="hbox hbox-auto-xs hbox-auto-sm" ng-init="
    app.settings.asideFolded = false;
    app.settings.asideDock = false;
  ">
                    <!-- main -->
                    <?php 
                    
                        $portfolio_count = 0;
                        foreach($_SESSION['portfolios'] as $i => $portfolio_params) {
                            $portfolio_count++;
                        }
                        
                        $i = $_SESSION['active_p_id'];
                        $cur_num_stocks = 0;
                        $total_invested = 0;
                        foreach($_SESSION['user_stocks'][$i] as $key => $value) {            
                            $cur_num_stocks++;
                            foreach($value as $sid => $sparams) {
                                if($sparams['transfer']) {
                                    $total_num_shares -= $sparams['number_shares'];
                                    $total_invested -= $sparams['number_shares']*$sparams['price'];
                                } else {
                                    $total_invested += $sparams['number_shares']*$sparams['price'];
                                    $total_num_shares += $sparams['number_shares'];
                                }
                            }
                        }
                    ?>
                    <div class="col">
                        <!-- main header -->
                        <div class="bg-light lter b-b wrapper-md">
                            <div class="row">
                                <div class="col-sm-6 col-xs-12">
                                    <h1 class="m-n font-thin h3 text-black">Dashboard</h1>
                                    <small class="text-muted">Welcome back, <?php echo $_SESSION['first_name']; ?>!</small>
                                </div>
                                <div class="col-sm-6 text-right hidden-xs">
                                    <div class="inline m-r text-left">
                                        <?php echo '<div class="m-b-xs">'.$cur_num_stocks.'<span class="text-muted"> holdings</span></div>', PHP_EOL ?>
                                        <!--<div ui-jq="sparkline" ui-options="[ 106,108,110,105,110,109,105,104,107,109,105,100,105,102,101,99,98 ], {type:'bar', height:20, barWidth:5, barSpacing:1, barColor:'#dce5ec'}" class="sparkline inline">loading...
                                        </div>-->
                                    </div>
                                    <div class="inline text-left">
                                        <?php echo '<div class="m-b-xs">$'.$total_invested.'<span class="text-muted"> invested</span></div>', PHP_EOL ?>

                                        <!--<div ui-jq="sparkline" ui-options="[ 105,102,106,107,105,104,101,99,98,109,105,100,108,110,105,110,109 ], {type:'bar', height:20, barWidth:5, barSpacing:1, barColor:'#dce5ec'}" class="sparkline inline">loading...
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
<?php
    $desired_payout = $_SESSION['desired_monthly_payout'];
    $desired_mode_string = ($_SESSION['reinvest'] == 0 ? 'Dividend Payout' : 'Reinvestment');
    $current_portfolio_name = $_SESSION['portfolios'][$_SESSION['active_p_id']]['p_name'];
    $i = $_SESSION['active_p_id'];//TODO: set portfolio to current portfolio
    $current_value = 0;
    $total_invested = 0;
    $symbols = array();
    $symbols_with_shares = array();
    $symbol_count = 0;
    $shares = array();
    
    foreach($_SESSION['user_stocks'][$i] as $key => $value) {
        foreach($value as $sid => $sparams) {
            $symbol_with_shares[$symbol_count] = array();
            $symbols_with_shares[$symbol_count]['ticker'] = $sparams['ticker'];
            $symbols[] = $sparams['ticker'];
            if($sparams['transfer']) {
                $symbols_with_shares[$symbol_count]['shares'] -= $sparams['number_shares'];
                $total_num_shares -= $sparams['number_shares'];
                $shares[$sparams['ticker']] -= $sparams['number_shares'];
            } else {
                $symbols_with_shares[$symbol_count]['shares'] += $sparams['number_shares'];
                $total_num_shares += $sparams['number_shares'];
                $shares[$sparams['ticker']] += $sparams['number_shares'];
            }
        }
        $symbol_count++;
        $current_value += (float)($total_num_shares*$_SESSION['user_stocks_db_info'][$key]->Open);
    }
    
    $servername = "mysql.eng.utah.edu";
    $username = "tharp";
    $password = "wHP8+xPvw5";
    $dbname = "tharp";
    $wiki_table = "wiki_eod_symbols";
    $quandl_table = "quandl";
    $dividendshares = array();
    $holdings_names = array();
    $open_prices = array();
    $total_payout = 0;
    $dividenddates = array();
    $exdividends = array();
    $industries = array();
    $recommendations = array();
    
    $months = array();
    $months[] = "Jan";
    $months[] = "Feb";
    $months[] = "Mar";
    $months[] = "Apr";
    $months[] = "May";
    $months[] = "Jun";
    $months[] = "Jul";
    $months[] = "Aug";
    $months[] = "Sep";
    $months[] = "Oct";
    $months[] = "Nov";
    $months[] = "Dec";
    
    $top_industries = array();
    
    $top_industries[] = "Transportation";
    $top_industries[] = "Finance";
    $top_industries[] = "Technology";
    $top_industries[] = "Energy";
    $top_industries[] = "Health Care";
    $top_industries[] = "Capital Goods";
    $top_industries[] = "Basic Industries";
    $top_industries[] = "Public Utilities";
    $top_industries[] = "Consumer Services";
    $top_industries[] = "Consumer Durables";
    $top_industries[] = "Consumer Non-Durables";
    $top_industries[] = "Miscellaneous";
    

    $recommended_industries = array();
    
    $last_twelve_months = array();
    $this_month = date('n');
    
    for($m = 0; $m < 12; $m++){
        $last_twelve_months[] = $months[($this_month+$m)%12];
    }

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = $conn->prepare("SELECT symbol, name, open, dividendshare, industry FROM ".$wiki_table." WHERE symbol IN ('".implode("','", $symbols)."')");
        $query->execute();
        $result = $query;
        
        foreach($result as $row){
            $dividendshares[$row['symbol']] = $row['dividendshare'];
            $total_payout += $dividendshares[$row['symbol']]*$shares[$row['symbol']];
            $holdings_names[$row['symbol']] = $row['name'];
            $open_prices[$row['symbol']] = $row['open'];
            $industries[$row['symbol']] = $row['industry'];
        }
       
        $query = $conn->prepare("SELECT symbol, date, exdividend FROM ".$quandl_table." WHERE date >= DATE_SUB(NOW(), INTERVAL 1 YEAR) and symbol IN ('".implode("','", $symbols)."') and exdividend > 0");
        $query->execute();
        $result = $query;
        
        foreach($symbols as $s){
            $dividenddates[$s] = array();
            $exdividends[$s] = array();
        }
        
        foreach($result as $row){
            $dividenddates[$row['symbol']][] = $row['date'];
            $exdividends[$row['symbol']][] = $row['exdividend'];
        }
        
        foreach($top_industries as $industry){
            $have = false;
            foreach($industries as $my_industry){
                if($my_industry == $industry){
                    $have = true;
                }
            }
            if(!$have){
                $recommended_industries[] = $industry;
            }
            if(count($recommended_industries) >= 4){
                break;
            }
        }
        
        foreach($recommended_industries as $industry){
            $query = $conn->prepare("SELECT * from(SELECT symbol, name, industry, ebitda, pegratio, peratio, dividendshare, open FROM ".$wiki_table." WHERE industry ='".$industry."' and pegratio > 0 and symbol not in ('".implode("','", $symbols)."') order by pegratio desc limit 20) as T order by dividendshare/open desc limit 1");
            $query->execute();
            $result = $query;
            
            foreach($result as $row){
                if(!array_key_exists($row['symbol'], $recommendations)){
                    $recommendations[$row['symbol']] = array();
                    $recommendations[$row['symbol']]['based_on'] = array();
                }
                
                $recommendations[$row['symbol']]['peratio'] = $row['peratio'];
                $recommendations[$row['symbol']]['symbol'] = $row['symbol'];
                $recommendations[$row['symbol']]['name'] = $row['name'];
                $recommendations[$row['symbol']]['industry'] = $row['industry'];
                $recommendations[$row['symbol']]['pegratio'] = $row['pegratio'];
                $recommendations[$row['symbol']]['ebitda'] = $row['ebitda'];
                $recommendations[$row['symbol']]['dividendshare'] = $row['dividendshare'];
                $recommendations[$row['symbol']]['open'] = $row['open'];
                
                $recommendations[$row['symbol']]['based_on'][] = 'PEG Ratio';
            }
            
            $query = $conn->prepare("SELECT * from(SELECT symbol, name, industry, ebitda, pegratio, peratio, dividendshare, open FROM ".$wiki_table." WHERE industry ='".$industry."' and peratio > 0 and symbol not in ('".implode("','", $symbols)."') order by peratio desc limit 20) as T order by dividendshare/open desc limit 1");
            $query->execute();
            $result = $query;
            
            foreach($result as $row){
                if(!array_key_exists($row['symbol'], $recommendations)){
                    $recommendations[$row['symbol']] = array();
                    $recommendations[$row['symbol']]['based_on'] = array();
                }
                
                $recommendations[$row['symbol']]['peratio'] = $row['peratio'];
                $recommendations[$row['symbol']]['symbol'] = $row['symbol'];
                $recommendations[$row['symbol']]['name'] = $row['name'];
                $recommendations[$row['symbol']]['industry'] = $row['industry'];
                $recommendations[$row['symbol']]['pegratio'] = $row['pegratio'];
                $recommendations[$row['symbol']]['ebitda'] = $row['ebitda'];
                $recommendations[$row['symbol']]['dividendshare'] = $row['dividendshare'];
                $recommendations[$row['symbol']]['open'] = $row['open'];
                
                $recommendations[$row['symbol']]['based_on'][] = 'P/E Ratio';
            }
            
            $query = $conn->prepare("SELECT * from(SELECT symbol, name, industry, ebitda, pegratio, peratio, dividendshare, open FROM ".$wiki_table." WHERE industry ='".$industry."' and ebitda > 0 and symbol not in ('".implode("','", $symbols)."') order by ebitda desc limit 20) as T order by dividendshare/open desc limit 1");
            $query->execute();
            $result = $query;
            
            foreach($result as $row){
                if(!array_key_exists($row['symbol'], $recommendations)){
                    $recommendations[$row['symbol']] = array();
                    $recommendations[$row['symbol']]['based_on'] = array();
                }
                
                $recommendations[$row['symbol']]['peratio'] = $row['peratio'];
                $recommendations[$row['symbol']]['symbol'] = $row['symbol'];
                $recommendations[$row['symbol']]['name'] = $row['name'];
                $recommendations[$row['symbol']]['industry'] = $row['industry'];
                $recommendations[$row['symbol']]['pegratio'] = $row['pegratio'];
                $recommendations[$row['symbol']]['ebitda'] = $row['ebitda'];
                $recommendations[$row['symbol']]['dividendshare'] = $row['dividendshare'];
                $recommendations[$row['symbol']]['open'] = $row['open'];
                
                $recommendations[$row['symbol']]['based_on'][] = 'EBITDA';
            }
        }
    }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    
    
?>
                        <div class="wrapper-md" ng-controller="FlotChartDemoCtrl">
                            <div class="panel wrapper" id="no_portfolios_div" style="display: none;">
                                <div class="row">
                                    <div class="col-md-12 b-r b-light no-border-xs">
                                        <h3 class="font-thin m-t-none m-b-md text-muted">You dont have any portfolios!</h3>
                                    </div>
                                    <div class="col-md-12 b-r b-light no-border-xs">
                                        <h4 class="font-thin m-t-none m-b-md text-muted">This is the dashboard, which will normall show a summary of your portfolios and a detailed overview of your current profile.</h4>
                                        <h4 class="font-thin m-t-none m-b-md text-muted">To use this page, create a portfolio at the <a href="page_portfolios.php">portfolio page.</a></h4>
                                    </div>
                                </div>
                            </div>

                            <div class="panel wrapper" id="portfolios_table_div">
                                <div class="row">
                                    <div class="col-md-12 b-r b-light no-border-xs">
                                        <h4 class="font-thin m-t-none m-b-md text-muted">Your Portfolios:</h4>
                                        <table id="portfolios_table" class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Portfolio</th>
                                                    <th>Value</th>
                                                    <th>Shares</th>
                                                </tr>
                                            </thead>
                                            <tbody>
    <?php
        foreach($_SESSION['portfolios'] as $i => $portfolio_params) {
            $num_stocks = 0;
            $current_value = 0.0;
            $total_num_shares = 0;
            $total_invested = 0;
            foreach($_SESSION['user_stocks'][$i] as $key => $value) {
                $num_shares = 0;
                $num_stocks++;
                foreach($value as $sid => $sparams) {
                    if($sparams['transfer']) {
                        $total_num_shares -= $sparams['number_shares'];
                        $num_shares -= $sparams['number_shares'];
                    } else {
                        $total_num_shares += $sparams['number_shares'];
                        $num_shares += $sparams['number_shares'];
                    }
                }
                $total_invested += $num_shares*$sparams['price'];
                $current_value += (float)($num_shares*$_SESSION['user_stocks_db_info'][$key]->Open);
            }
            
            $active_class = ($i == $_SESSION['active_p_id']) ? 'class="info"' : "";
            
            echo '<tr>', PHP_EOL;
            echo '  <td '.$active_class.'><a href="page_portfolios.php?pid='.$i.'">'.$portfolio_params['p_name'].'</a></td>', PHP_EOL;
            echo '  <td '.$active_class.'>$'.number_format($current_value, 2, '.', '').'</td>', PHP_EOL;
            echo '  <td '.$active_class.'>'.$total_num_shares.'</td>', PHP_EOL;
            echo '</tr>', PHP_EOL;
        }
    ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel wrapper" id="no_holdings_div" style="display: none;">
                                <div class="row">
                                    <div class="col-md-12 b-r b-light no-border-xs">
                                        <h3 class="font-thin m-t-none m-b-md text-muted">You dont have any stocks!</h3>
                                    </div>
                                    <div class="col-md-12 b-r b-light no-border-xs">
                                        <h4 class="font-thin m-t-none m-b-md text-muted">This part of the dashboard will normally show a detailed overview of your current portfolio.</h4>
                                        <h4 class="font-thin m-t-none m-b-md text-muted">To use this page, add stocks to the portfolio using the <a href="page_portfolios.php">portfolio page</a> or the sidebar on the right.</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="panel wrapper" id="recommendations_table_div">
                                <div class="row">
                                    <div class="col-md-12 b-r b-light no-border-xs">
                                        <h4 class="font-thin m-t-none m-b-md text-muted"><?php echo $current_portfolio_name?> Recommendations:</h4>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Symbol</th>
                                                    <th>Name</th>
                                                    <th>Sector</th>
                                                    <th>Last Open Price</th>
                                                    <th>Annual Div Payout Per Share (% of Price)</th>
                                                    <th>P/E Ratio</th>
                                                    <th>PEG Ratio</th>
                                                    <th>Based On</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $rec_count = 0;
                                                    foreach($recommendations as $rec){
                                                        $symbol = $rec['symbol'];
                                                        $name = $rec['name'];
                                                        $div_per_share = $rec['dividendshare'];
                                                        $ebitda = $rec['ebitda'];
                                                        $pegratio = $rec['pegratio'];
                                                        $peratio = $rec['peratio'];
                                                        $industry = $rec['industry'];
                                                        $open = $rec['open'];
                                                        $basedon = $rec['based_on'][0];
                                                        
                                                        if(isset($name) && $name !== ''){
                                                            echo '<tr>', PHP_EOL;
                                                            echo '<td><a href="ui_chart.php?stocks='.$symbol.'">'.$symbol.'</a></td>', PHP_EOL;
                                                            echo '<td><a href="ui_chart.php?stocks='.$symbol.'">'.$name.'</a></td>', PHP_EOL;
                                                            echo '<td>'.$industry.'</td>', PHP_EOL;
                                                            if($open > 0) {
                                                                echo '<td>$'.number_format($open, 2, '.', '').'</td>', PHP_EOL;
                                                            }
                                                            else {
                                                                echo '<td> - </td>', PHP_EOL;
                                                            }
                                                            if($div_per_share > 0){
                                                                echo '<td>$'.number_format($div_per_share, 2, '.', '').' ('.number_format($div_per_share/$open, 2, '.', '').'%)</td>', PHP_EOL;
                                                            }
                                                            else {
                                                                echo '<td> - </td>', PHP_EOL;
                                                            }
                                                            if($peratio > 0) {
                                                                echo '<td>'.number_format($peratio, 2, '.', '').'</td>', PHP_EOL;
                                                            }
                                                            else {
                                                                echo '<td> - </td>', PHP_EOL;
                                                            }
                                                            if($pegratio > 0) {
                                                                echo '<td>'.number_format($pegratio, 2, '.', '').'</td>', PHP_EOL;
                                                            }
                                                            else {
                                                                echo '<td> - </td>', PHP_EOL;
                                                            }
                                                            echo '<td>'.$basedon.'</td>', PHP_EOL;
                                                            echo '</tr>', PHP_EOL;
                                                        }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="panel wrapper" id="portfolio_table_div">
                                <div class="row">
                                    <div class="col-md-12 b-r b-light no-border-xs">
                                        <h4 class="font-thin m-t-none m-b-md text-muted"><?php echo $current_portfolio_name?> Holdings:</h4>
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Symbol</th>
                                                    <th>Name</th>
                                                    <th>Shares</th>
                                                    <th>Annual Dividend Payout Per Share (Total)</th>
                                                    <th>Last Open Price</th>
                                                    <th>Value</th>
                                                </tr>
                                            </thead>
                                            <tbody>
    <?php
        foreach($symbols_with_shares as $symbol_with_shares) {
            $symbol = $symbol_with_shares['ticker'];
            $name = $holdings_names[$symbol];
            $div_per_share = $dividendshares[$symbol];
            $shares = $symbol_with_shares['shares'];
            $div_total = $shares*$div_per_share;
            $open = $open_prices[$symbol];
            if(isset($name) && $name !== ''){
                echo '<tr>', PHP_EOL;
                echo '<td><a href="ui_chart.php?stocks='.$symbol.'">'.$symbol.'</a></td>', PHP_EOL;
                echo '<td><a href="ui_chart.php?stocks='.$symbol.'">'.$name.'</a></td>', PHP_EOL;
                echo '<td>'.$shares.'</td>', PHP_EOL;
                if($div_per_share > 0){
                    echo '<td>$'.number_format($div_per_share, 2, '.', '').' ($'.number_format($div_total, 2, '.', '').')</td>', PHP_EOL;
                }
                else {
                    echo '<td> - </td>', PHP_EOL;
                }
                if($open > 0) {
                    echo '<td>$'.number_format($open, 2, '.', '').'</td>', PHP_EOL;
                }
                else {
                    echo '<td> - </td>', PHP_EOL;
                }
                if($open > 0) {
                    echo '<td>$'.number_format($symbol_with_shares['shares']*$open_prices[$symbol], 2, '.', '').'</td>', PHP_EOL;
                }
                else {
                    echo '<td> - </td>', PHP_EOL;
                }
                echo '</tr>', PHP_EOL;
            }
        }
    ?>
                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                <div id="containerinvestments"></div>
                            </div>
                            
                                                        
                            <div class="panel wrapper" id ="div_payout_div">
                                <div id="containerdivpayoutpie"></div>
                                <!--<div id="containerdivpayout"></div>-->
                            </div>

                            <!--<div class="panel wrapper">
                                <div id="containerholdings"></div>
                            </div>-->

                        <!--
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
                        -->
                            <!-- / service -->
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

<script>

    <?php 
        if($portfolio_count == 0) {
            echo "$('#recommendations_table_div').hide()", PHP_EOL;
            echo "$('#portfolio_table_div').hide()", PHP_EOL;
            echo "$('#div_payout_div').hide()", PHP_EOL;
            echo "$('#portfolios_table_div').hide()", PHP_EOL;
            echo "$('#no_portfolios_div').css('display', 'block')", PHP_EOL;
        }
        else if($cur_num_stocks == 0) {
            echo "$('#recommendations_table_div').hide()", PHP_EOL;
            echo "$('#portfolio_table_div').hide()", PHP_EOL;
            echo "$('#div_payout_div').hide()", PHP_EOL;
            echo "$('#no_holdings_div').css('display', 'block')", PHP_EOL;
        }
    ?>

function requestData() {
    $.ajax({
        url: 'dashboard-chart-data.php',
        success: function(point) {
            var series = chart.series[0],
                shift = series.data.length > 20; // shift if the series is 
                                                 // longer than 20
            // add the point
            chart.series[0].addPoint(point, true, shift);
            
            // call it again after one second
            setTimeout(requestData, 1000);    
        },
        cache: false
    });
}

$(function () {
    $('#containerdivpayout').highcharts({
        chart: {
            type: 'column',
            //width: 780
        },
        title: {
            text: '<?php echo $current_portfolio_name?> Dividend History'
        },
        xAxis: {
            categories: [
                <?php 
                    $count = 0;
                    foreach($last_twelve_months as $month){
                        echo "'".$month."'";
                        if($count++ == 11){
                            echo PHP_EOL;
                        }
                        else{
                            echo ",", PHP_EOL;
                        }
                    }
                ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Payout amount per share ($)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>${point.y:.2f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series:
        [{
            name: 'KO',
            data: [.33, 0, 0,.30, 0, .30, 0, 0, .30, 0, 0, 0]
        }, {
            name: 'RGR',
            data: [0, .49, 0,0, .45, 0, 0, .14, 0, 0, 0, .17]
        }, {
            name: 'UNP',
            data: [0,0,0,.46,0,0,.50,0,0,.50,0,.55]
        }]
    });
});

$(function () {
    $('#containerdivpayoutpie').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<?php echo $current_portfolio_name?> Dividend Payout Summary'
        },
        subtitle: {
            text: 'Annual Payout: <?php echo number_format($total_payout, 2, '.', '')?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>${point.y:.2f}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Annual payout',
            data: [
                <?php
                    $symbol_count = 0;
                    $len = count($symbols_with_shares);
                    foreach($symbols_with_shares as $symbol_with_shares) {
                        $symbol = $symbol_with_shares['ticker'];
                        if(isset($dividendshares[$symbol]) && $dividendshares[$symbol] !== ''){
                            if($symbol_count++ < $len - 1) {
                                echo "['".$symbol."', ".$symbol_with_shares['shares']*$dividendshares[$symbol]."],", PHP_EOL;
                            }
                            else {
                                echo "['".$symbol."', ".$symbol_with_shares['shares']*$dividendshares[$symbol]."]", PHP_EOL;
                            }
                        }
                    }
                ?>
            ]
        }]
    });
});
    
$(function () {
    $('#containerinvestments').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
        title: {
            text: '<?php echo $current_portfolio_name?> Holdings'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>${point.y:.2f}</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Amount: ',
            data: [
                <?php
                    $symbol_count = 0;
                    $len = count($symbols_with_shares);
                    foreach($symbols_with_shares as $symbol_with_shares) {
                        $symbol = $symbol_with_shares['ticker'];
                        if(isset($open_prices[$symbol]) && $open_prices[$symbol] !== ''){
                            if($symbol_count++ < $len - 1) {
                                echo "['".$symbol."', ".$symbol_with_shares['shares']*$open_prices[$symbol]."],", PHP_EOL;
                            }
                            else {
                                echo "['".$symbol."', ".$symbol_with_shares['shares']*$open_prices[$symbol]."]", PHP_EOL;
                            }
                        }
                    }
                ?>
            ]
        }]
    });
});
</script>