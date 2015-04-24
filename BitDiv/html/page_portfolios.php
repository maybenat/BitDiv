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

  <script type="text/javascript" src="js/ddaccordion.js">
    /***********************************************
     * Accordion Content script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
     * Visit http://www.dynamicDrive.com for hundreds of DHTML scripts
     * This notice must stay intact for legal use
     ***********************************************/
   </script>

   <script type="text/javascript">
    ddaccordion.init({
      headerclass: "expandable", //Shared CSS class name of headers group that are expandable
      contentclass: "categoryitems", //Shared CSS class name of contents group
      revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click", "clickgo", or "mouseover"
      mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
      collapseprev: false, //Collapse previous content (so only one open at any time)? true/false
      defaultexpanded: [], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
      onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
      animatedefault: true, //Should contents open by default be animated into view?
      persiststate: true, //persist state of opened contents within browser session?
      toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
      togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
      animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
      oninit:function(headers, expandedindices) { //custom code to run when headers have initalized
        //do nothing
      },
      onopenclose:function(header, index, state, isuseractivated) { //custom code to run whenever a header is opened or closed
        //do nothing
      }
    })
  </script>
  <style>
    .fixed {
      position: fixed;
      width: 100%;
    }
    .lim-padding {
      padding-top: 4px;
      padding-bottom: 4px;
      margin-top: 0px;
      margin-bottom: 0px;
    }
    .lim-padding-bottom {
      padding-top: 8px;
      padding-bottom: 2px;
      margin-top: 0px;
      margin-bottom: 0px;
    }
    .no-padding {
      padding-top: 0px;
      padding-bottom: 0px;
      margin-top: 0px;
      margin-bottom: 0px;
    }
    .expandable:hover {
      background-color: #FDFDFD;
      padding-top: 6px;
    }
    .glyphicon-sm {
    font-size: 0.8em;
    }
    .container_spacer {
      margin-bottom: 12px;
    }
  </style>
</head>
<body>
  <div class="app app-header-fixed">

    <?php include 'header.php'; ?>

    <!-- content -->
    <div id="content" class="app-content" role="main">
          <!--<div style="position:absolute;overflow-y:scroll;overflow-x:hidden;">-->

      <div class="app-content-body">
        <div class="hbox hbox-auto-xs hbox-auto-sm">
          <div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">My Portfolios</h1>
          </div>
          <div class="wrapper-md">

            <div class="panel hbox hbox-auto-xs no-border">
              <div class="col wrapper">

                <?php
                
                // -------------------------------
                // ---- print tabs for each portfolio
                // -------------------------------
                echo '      <ul class="nav nav-tabs">', PHP_EOL;

                $create_new = ($_GET['act'] == 'new');

                if(!empty($_SESSION['active_p_id'])) {
                  $first = 0;
                } else {
                  $first = 1;
                }

                $num_portfolios1 = 0;
                foreach($_SESSION['portfolios'] as $p_id => $portfolio_params) {
                  $active = ($first || ($p_id == $_SESSION['active_p_id'])) && !$create_new ? ' class="active"' : ''; $first = 0;
                  echo '        <li'.$active.'><a href="#portfolio'.$p_id.'" data-toggle="tab">'.$portfolio_params['p_name'].'<i class="fa"></i></a></li>', PHP_EOL;
                  $num_portfolios1++;
                }

                // add tab for new portfolio, id=portfolio_new
                $active = ($create_new || empty($num_portfolios1)) ? ' class="active"' : '';
                echo '        <li'.$active.'><a href="#portfolio_new" data-toggle="tab"><span class="glyphicon glyphicon-sm glyphicon-menu-right"></span> <strong>Create New</strong><i class="fa"></i></a></li>', PHP_EOL;
                echo '      </ul>', PHP_EOL;

                
                // -------------------------------
                // ---- print tables for each portfolio, populate with stocks associated with portfolio
                // -------------------------------
                echo '      <div class="tab-content">', PHP_EOL;

                if(!empty($_SESSION['active_p_id'])) {
                  $first = 0;
                } else {
                  $first = 1;
                }

                foreach($_SESSION['portfolios'] as $i => $portfolio_params) {

                  $active = ($first || ($i == $_SESSION['active_p_id'])) && !$create_new ? ' active' : ''; $first = 0;
                  echo '        <div class="tab-pane'.$active.'" id="portfolio'.$i.'">', PHP_EOL;

                  $num_stocks = 0;
                  $total_invested = 0;
                  foreach($_SESSION['user_stocks'][$i] as $key => $value) {
                    $num_stocks++;
                    foreach($value as $sid => $sparams) {
                      if($sparams['transfer']) {
                        //$total_invested -= $sparams['number_shares'];
                      } else {
                        $total_invested += $sparams['number_shares']*$sparams['price'];
                      }
                    }
                  }

                  // -------------------------------
                  // ---- portfolio header presenting parameters as a form
                  // -------------------------------
                  echo '          <div class="bg-light b-b wrapper-md ">', PHP_EOL;
                  ?>

                  <div class="form-group no-padding">
                    <form action="includes/portfolio_update.php?p_id=<?php echo $i; ?>" method="post">
                      <input type="text" name="p_name" placeholder="<?php echo $portfolio_params['p_name']; ?>" class="bg-light m-n font-thin h3 no-border" value="<?php echo $portfolio_params['p_name']; ?>" size="<?php echo strlen($portfolio_params['p_name']) + 3; ?>" />

                      <div class="input-group no-border">
                        <span class="m-n font-thin h5">$</span>
                        <input type="number" step="any" name="p_funding" class="bg-light m-n font-thin h5 no-border" placeholder= "<?php echo number_format($portfolio_params['p_funding'], 2, '.', ''); ?>"
                        size="<?php echo strlen(''.number_format($portfolio_params['p_funding'], 2, '.', '')); ?>"
                        required value="<?php echo number_format($portfolio_params['p_funding'], 2, '.', ''); ?>" /> <span class="m-n font-thin h5">available funding</span>
                      </div>
                      <div class="input-group no-border">
                        <span class="h5"> </span>
                        <select name="p_risk" class="bg-light m-n font-thin h5 no-border">
                          <?php
                          for($j = 0; $j < 3; $j++) {
                            switch($j) {
                              case 0: $opt = 'high risk'; break;
                              case 1: $opt = 'medium risk'; break;
                              case 2: $opt = 'low risk'; break;
                            }
                            ?>
                            <option value="<?php echo $j; ?>"<?php if($portfolio_params['p_risk'] == $j) { echo 'selected="selected"'; } ?>><?php echo $opt; ?></option>
                            <?php
                          }
                          ?>
                        </select>
                      </div>
                      <input type="checkbox" name="p_reinvest"<?php if($portfolio_params['p_reinvest']) { echo ' checked'; } ?> /> <span class="m-n font-thin h5">Re-invest </span>
                      <input type="checkbox" name="p_public"<?php if($portfolio_params['p_public']) { echo ' checked'; } ?> /> <span class="m-n font-thin h5">Allow others to view this portfolio</span><br />
                      <button name="update" value="<?php echo $i; ?>" type="submit" class="btn btn-sm m-t lim-padding">Update</button>
                      <button name="delete" value="<?php echo $i; ?>" type="submit" class="btn btn-sm m-t lim-padding">Delete</button>
                      <button name="copy" value="<?php echo $i; ?>" type="submit" class="btn btn-sm m-t lim-padding">Copy</button>
                    </form>
                  </div>

                  <?php
                  echo '          </div>', PHP_EOL;

                  $num_stocks = 0;

                  // -------------------------------
                  // ---- enumerate stocks in the portfolio
                  // ----           $key (ticker) => $value (stock id - per transaction)
                  // ---- $value as $sid (stock id) => $sparams (stock parameters, per transaction, as row of user_stocks table in database)
                  // -------------------------------
                  foreach($_SESSION['user_stocks'][$i] as $key => $value) {

                    $total_num_shares = 0;
                    $original_investment = 0;
                    foreach($value as $sid => $sparams) {
                      if($sparams['transfer']) {
                        $total_num_shares -= $sparams['number_shares'];
                        $original_investment -= $sparams['number_shares']*$sparams['price'];
                      } else {
                        $total_num_shares += $sparams['number_shares'];
                        $original_investment += $sparams['number_shares']*$sparams['price'];
                      }
                    }

  echo '          <div class="bg-light lter b-b wrapper-md lim-padding-bottom font-thin">', PHP_EOL;
  ?>

  <div class="row">
    <div class="col-lg-3">

      <?php
      $current_value = (float)($total_num_shares*$_SESSION['user_stocks_db_info'][$key]->Open);
      if($current_value < 0) {
        $current_value_str = '<strong class="text-danger">-$'.number_format(abs($current_value), 2, '.', '').'</strong>';
      } else {
        $current_value_str = '<strong class="text-success">$'.number_format($current_value, 2, '.', '').'</strong>';
      }
      $change_value = $current_value - $original_investment;
      if($change_value < 0) {
        $change_value_str = '<strong class="text-danger">-$'.number_format(abs($change_value), 2, '.', '').'</strong> loss';
      } else {
        $change_value_str = '<strong class="text-success">+$'.number_format($change_value, 2, '.', '').'</strong> profit';
      }
      
      // stock ticker and company name
      echo '            <h1 class="m-n font-thin h4">';

      // if invalid stock, allow user to remove the stock by presenting a form
      if(!$_SESSION['user_stocks_db_info'][$key]->Name) {
        echo $key.'</h1>', PHP_EOL, '  <p><strong>Could not find stock information</strong></p>', PHP_EOL;
        echo '</div></div></div>';

        echo '          <div class="categoryitems">', PHP_EOL;
        echo '          <div class="row">', PHP_EOL;
        echo '            <div class="container">', PHP_EOL;
        echo '            <div class="col-lg-4">', PHP_EOL;

        echo '                <p>Remove a purchase without updating portfolio.</p>', PHP_EOL;
        ?>

        <div class="form-group">
          <form action="includes/form_transaction.php?act=remove<?php echo '&ticker='.$key.'&portfolio='.$i.'&referer='.$current_page_url; ?>" method="post">
            <select name="stock_id" class="form-control">
              <?php
              foreach($value as $sid => $sparams) {
                $transfer = $sparams['transfer'] ? 'Sold' : 'Bought';
                $color = $sparams['transfer'] ? 'text-danger' : 'text-success';
                $sprice = number_format((float)$sparams['price'], 2, '.', '');
                echo '                      <option value="'.$sparams['stock_id'].'">'.$transfer.' '.$key.': '.$sparams['number_shares'].' shares at $'.$sprice.' on '.$sparams['date_purchased'].'</option>', PHP_EOL;
              }
              ?>
            </select>
            <button name="remove" type="submit" class="btn btn-default btn-rounded m-t">Submit</button>
            <button type="reset" class="btn btn-default btn-rounded m-t">Clear</button>
          </form>
        </div>

      </div>
    </div>
  </div>
</div>
<?php

      // END invalid stock, stock is valid after this point 
continue;
}

// continue with stock title
echo '<a href="ui_chart.php?stocks='.$key.'">'.$key.' ('.$_SESSION['user_stocks_db_info'][$key]->Name.')</a></h1>', PHP_EOL;
echo '            <p><strong>'.$total_num_shares.'</strong> shares for '.$current_value_str.' value</p>', PHP_EOL;
?>

</div>
<div class="col-lg-3">

  <?php
echo '            <p>Total '.$change_value_str.' from original investments</p>', PHP_EOL;
  ?>

</div>
</div>

<?php
// expandable div
echo '          </div>', PHP_EOL;
  echo '          <div class="bg-light lter b-b wrapper-md expandable lim-padding">', PHP_EOL;
  
  //---------------
  
  echo '          </div>', PHP_EOL;
  
                // -------------------------------
                // ---- stock expanded region - show relevant information
                // -------------------------------
echo '          <div class="categoryitems font-thin">', PHP_EOL;

echo '            <div class="row">', PHP_EOL;
echo '              <div class="container_spacer">', PHP_EOL;
echo '              </div>', PHP_EOL;
echo '            </div>', PHP_EOL;
echo '            <div class="row">', PHP_EOL;
echo '              <div class="container">', PHP_EOL;

echo '<div class="col-lg-4">', PHP_EOL;

echo '            <p class="m-n font-thin h4"><a href="ui_chart.php?stocks='.$key.'">'.$key.' ('.$_SESSION['user_stocks_db_info'][$key]->Name.') <br /><small>Go to stock research page</small></a></p>', PHP_EOL;

echo '</div>', PHP_EOL;
echo '<div class="col-lg-4">', PHP_EOL;

  if($_SESSION['user_stocks_db_info'][$key]->Change < 0) {
    echo '<p class="text-danger"><span class="glyphicon glyphicon-arrow-down"></span> <strong>$'.substr($_SESSION['user_stocks_db_info'][$key]->Change, 1)
    .' ('.$_SESSION['user_stocks_db_info'][$key]->ChangeinPercent.')</strong></p>', PHP_EOL;
  } else {
    echo '<p class="text-success"><span class="glyphicon glyphicon-arrow-up"></span> <strong>$'.substr($_SESSION['user_stocks_db_info'][$key]->Change, 1)
    .' ('.$_SESSION['user_stocks_db_info'][$key]->ChangeinPercent.')</strong></p>', PHP_EOL;
  }

  $div_share = $_SESSION['user_stocks_db_info'][$key]->DividendShare;
  if(!$div_share) { $div_share = '0.00'; }
  $div_yield = $_SESSION['user_stocks_db_info'][$key]->DividendYield;
  if(!$div_yield) { $div_yield = '0.00'; }
  echo '<p>Div & Yield: ', PHP_EOL;
  echo '<strong>$'.$div_share.' ('.$div_yield.'%)</strong></p>', PHP_EOL;



echo '</div>', PHP_EOL;
  
  
  

echo '            </div>', PHP_EOL;
echo '          </div><hr />', PHP_EOL;
echo '          <div class="row">', PHP_EOL;
echo '            <div class="container">', PHP_EOL;
echo '            <div class="col-lg-4">', PHP_EOL;
echo '              <strong>Transaction history</strong>', PHP_EOL;

      // stock ticker => stock_id
foreach($value as $sid => $sparams) {
  $transfer = $sparams['transfer'] ? 'Sold' : 'Bought';
  $color = $sparams['transfer'] ? 'text-danger' : 'text-success';
  $sprice = number_format((float)$sparams['price'], 2, '.', '');
  echo '            <div class="'.$color.'">'.$transfer.' '.$key.': <strong>'.$sparams['number_shares'].' shares</strong> at <strong>$'.$sprice.'</strong> on <strong>'.$sparams['date_purchased'].'</strong></div>', PHP_EOL;

}

echo '            </div>', PHP_EOL;
echo '            <div class="col-lg-4">', PHP_EOL;
echo '              <strong>Sell stock or remove transactions</strong>', PHP_EOL;

      // sell/remove stocks form
echo '            <ul class="nav nav-pills nav-stacked">', PHP_EOL;
echo '              <li><a href="#sell_'.$key.$i.'" data-toggle="tab">Sell<i class="fa"></i></a></li>', PHP_EOL;
echo '              <li><a href="#remove_'.$key.$i.'" data-toggle="tab">Remove<i class="fa"></i></a></li>', PHP_EOL;
echo '            </ul>', PHP_EOL;
echo '            <div class="tab-content">', PHP_EOL;
echo '              <div class="tab-pane" id="sell_'.$key.$i.'">', PHP_EOL;
echo '                <p>Sell shares of this stock and register sale with portfolio.</p>', PHP_EOL;
?>
<div class="form-group">
  <form action="includes/form_transaction.php?act=sell<?php echo '&ticker='.$key.'&portfolio='.$i.'&referer='.$current_page_url; ?>" method="post">
    <p class="m-t">Shares sold:</p>
    <input type="number" name="number_shares" placeholder="number of shares" class="form-control" required />
    <p class="m-t">Price at time of sale:</p>
    <div class="input-group">
      <span class="input-group-addon">$</span>
      <input type="number" step="any" name="price" placeholder="price" class="form-control" required value="<?php echo number_format($_SESSION['user_stocks_db_info'][$key]->Open, 2, '.', ''); ?>" />
    </div>
    <p class="m-t">Date of sale:</p>
    <div class="input-group date">
      <input type="date" name="date_purchased" placeholder="01/01/2001" class="form-control" required value="<?php echo date('m/d/Y'); ?>" />
      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
    </div>
    <button name="sell" type="submit" class="btn btn-default btn-rounded m-t">Submit</button>
    <button type="reset" class="btn btn-default btn-rounded m-t">Clear</button>
  </form>
</div>

<?php
echo '              </div>', PHP_EOL;
echo '              <div class="tab-pane" id="remove_'.$key.$i.'">', PHP_EOL;
echo '                <p>Remove a purchase without updating portfolio.</p>', PHP_EOL;
// remove trancaction form
?>

<div class="form-group">
  <form action="includes/form_transaction.php?act=remove<?php echo '&ticker='.$key.'&portfolio='.$i.'&referer='.$current_page_url; ?>" method="post">
    <select name="stock_id" class="form-control">
      <?php
      foreach($value as $sid => $sparams) {
        $transfer = $sparams['transfer'] ? 'Sold' : 'Bought';
        $color = $sparams['transfer'] ? 'text-danger' : 'text-success';
        $sprice = number_format((float)$sparams['price'], 2, '.', '');
        echo '                      <option value="'.$sparams['stock_id'].'">'.$transfer.' '.$key.': '.$sparams['number_shares'].' shares at $'.$sprice.' on '.$sparams['date_purchased'].'</option>', PHP_EOL;
      }
      ?>
    </select>
    <button name="remove" type="submit" class="btn btn-default btn-rounded m-t">Submit</button>
    <button type="reset" class="btn btn-default btn-rounded m-t">Clear</button>
  </form>
</div>

<?php
echo '              </div>', PHP_EOL;
echo '            </div>', PHP_EOL;


echo '            </div>', PHP_EOL;
echo '            </div>', PHP_EOL;
echo '          </div>', PHP_EOL;

echo '          </div>', PHP_EOL;

$num_stocks++;
}

if($num_stocks == 0) {
  echo '          <div class="bg-light lter b-b wrapper-md">', PHP_EOL;
  echo '            <h4 class="m-n font-thin h4">No stocks to show.</h4>', PHP_EOL;
  echo '          </div>', PHP_EOL;
}

echo '        </div>', PHP_EOL;
}

                $active = ($create_new || empty($num_portfolios1)) ? ' active' : '';
echo '        <div class="tab-pane'.$active.'" id="portfolio_new">', PHP_EOL;
echo '          <div class="bg-light b-b wrapper-md">', PHP_EOL;


                  // -------------------------------
                  // ---- content for new portfolio tab
                  // -------------------------------
?>

<div class="form-group">
  <form action="includes/new_portfolio.php" method="post">
    <input type="text" name="p_name" placeholder="New Portfolio" class="bg-light m-n font-thin h3 no-border" value="" size="15" />

    <div class="input-group no-border">
      <span class="m-n font-thin h5">$</span>
      <input type="number" step="any" name="p_funding" class="bg-light m-n font-thin h5 no-border" placeholder= "0.00"
      size="8"
      required value="10000.00" /> <span class="m-n font-thin h5">available funding</span>
    </div>
    <div class="input-group no-border">
      <span class="h5"> </span>
      <select name="p_risk" class="bg-light m-n font-thin h5 no-border">
        <?php
        for($j = 0; $j < 3; $j++) {
          switch($j) {
            case 0: $opt = 'high risk'; break;
            case 1: $opt = 'medium risk'; break;
            case 2: $opt = 'low risk'; break;
          }
          ?>
          <option value="<?php echo $j; ?>"><?php echo $opt; ?></option>
          <?php
        }
        ?>
      </select>
    </div>
    <input type="checkbox" name="p_reinvest" /> <span class="m-n font-thin h5">Re-invest </span>
    <input type="checkbox" name="p_public" /> <span class="m-n font-thin h5">Allow others to view this portfolio</span><br />
    <button name="create" type="submit" class="btn btn-sm m-t">Create New</button>
  </form>
</div>

<?php
echo '          </div>', PHP_EOL;
echo '        </div>', PHP_EOL;

echo '      </div>', PHP_EOL;


?>

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
