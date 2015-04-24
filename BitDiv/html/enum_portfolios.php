<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>bitdiv</title>
</head>
<body>

<?php
  session_name('Private');
  session_start();

  foreach($_SESSION['portfolios'] as $p_id => $portfolio) {
    echo 'This portfolio belongs to uid: '.$portfolio['uid'].' (current user)<br />'.PHP_EOL;
    // note that there is no longer for(i from 1 to $_SESSION['num_portfolios']) - access must be a foreach loop (unless you know the p_ids)
    echo 'This portfolio has p_id: '.$portfolio['p_id'].' (or accessed as the key of this foreach loop: '.$p_id.')<br />'.PHP_EOL;
    echo 'This portfolio has the name: '.$portfolio['p_name'].'<br />'.PHP_EOL;
    echo 'This portfolio has an associated funding: $'.$portfolio['p_funding'].'<br />'.PHP_EOL;
    echo 'This portfolio has an associated risk: '.$portfolio['p_risk'].'<br />'.PHP_EOL;
    echo 'This portfolio is '.($portfolio['public'] ? 'public' : 'not public').'<br />'.PHP_EOL;
    echo '<br />'.PHP_EOL;
  }
?>

</body>
</html>
