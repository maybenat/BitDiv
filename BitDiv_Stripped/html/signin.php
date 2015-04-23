<?php
include_once 'data/config.php';

if(!empty($_POST)) {
    try {
        $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
        $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

        if(isset($_REQUEST['Login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $statement = $db->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
            $statement->execute();

            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if(isset($result) && $result != false) {

                session_name('Private');
                session_start();
                $_SESSION['email'] = $result['email'];
                $_SESSION['first_name'] = $result['first_name'];
                $_SESSION['last_name'] = $result['last_name'];
                $_SESSION['uid'] = $result['uid'];
                $_SESSION['date_of_birth'] = date('Y-m-d', strtotime($result['date_of_birth']));
                $_SESSION['age'] = (int)(date('Y') - date('Y', strtotime($result['date_of_birth'])));
                $_SESSION['funding'] = $result['funding'];
                $_SESSION['risk'] = $result['risk'];
                $_SESSION['reinvest'] = $result['reinvest'];
                $_SESSION['desired_monthly_payout'] = $result['desired_monthly_payout'];
                $_SESSION['first_login'] = $result['first_login'];
                $_SESSION['recently_viewed_stock'][0] = $result['recent_stock1'];
                $_SESSION['recently_viewed_stock'][1] = $result['recent_stock2'];
                $_SESSION['recently_viewed_stock'][2] = $result['recent_stock3'];
                $_SESSION['recently_viewed_stock'][3] = $result['recent_stock4'];
                $_SESSION['recently_viewed_stock'][4] = $result['recent_stock5'];
                
                $_SESSION['active_p_id'] = $result['p_id_current'];
                
                $_SESSION['active_p_id'] = empty($_SESSION['active_p_id']) ? 0 : $_SESSION['active_p_id'];
                
                  //if(!isset($_SESSION['portfolios'])) {
                  {
                    try {

                      // write session variables to database
                      $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
                      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                      $statement = $db->prepare('SELECT * FROM user_portfolios WHERE uid="'.$_SESSION['uid'].'"');
                      $statement->execute();

                      // find all user portfolios
                      $portfolios = array();
                      while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $portfolios[$row['p_id']] = $row;
                      }

                      // save to session
                      session_name('Private');
                      session_start();
                      $_SESSION['portfolios'] = $portfolios;
                      session_write_close();

                    } catch(PDOException $e) {
                      echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
                      exit;
                    }
                  }

                  //if(!isset($_SESSION['user_stocks'])) {
                  {
                    try {

                      // write session variables to database
                      $db = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $user, $dbPassword);
                      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                      $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                      $statement = $db->prepare('SELECT * FROM user_stocks WHERE uid="'.$_SESSION['uid'].'"');
                      $statement->execute();

                      // find all user stocks
                      $user_stocks = array();
                      $stock_list = array();
                      while($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                        $user_stocks[$row['portfolio']][$row['ticker']][$row['stock_id']] = $row;
                        // track list of tickers
                        if(!in_array($row['ticker'], $stock_list)) {
                          $stock_list[] = $row['ticker'];
                        }
                      }
      
                      for($i = 0; $i < 5; $i++) {
                        // track list of tickers
                        if(!in_array($_SESSION['recently_viewed_stock'][$i], $stock_list)) {
                          $stock_list[] = $_SESSION['recently_viewed_stock'][$i];
                        }
                      }

                      // save to session
                      session_name('Private');
                      session_start();
                      $_SESSION['user_stocks'] = $user_stocks;
                      session_write_close();

                    } catch(PDOException $e) {
                      echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database: '.$e.'") </script></head><body></body></html>';
                      exit;
                    }
                  }

                  //if(!isset($_SESSION['user_stocks_db_info'])) {
                  {
                  $YBASE_URL = "https://query.yahooapis.com/v1/public/yql";

                  // construct list of tickers for query
                  $query_tickers = '"null"';
                  foreach($stock_list as $ticker) {
                    $query_tickers .= ',"'.$ticker.'"';
                  }

                  // Form YQL query and build URI to YQL Web service
                  $yql_query = 'select * from yahoo.finance.quotes where symbol in (' . $query_tickers . ')';
                  $yql_query_url = $YBASE_URL . "?q=" . urlencode($yql_query) . "&format=json" . "&env=http://datatables.org/alltables.env";

                  // Make call with cURL
                  $session = curl_init($yql_query_url);
                  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);
                  $json = curl_exec($session);

                  // Convert JSON to PHP object
                  $phpObj = json_decode($json);

                  // Confirm that results were returned before parsing
                  if(!is_null($phpObj->query->results)) {
                    // Parse results and extract data to display
                    foreach($phpObj->query->results->quote as $quote) {
                      $quote->Name = trim(str_replace('(The)', '', $quote->Name));
                      $_SESSION['user_stocks_db_info'][$quote->symbol] = $quote;
                    }
                  }

                  }
                
                session_write_close();

                    // Redirect to Home page
                header("Location: index.php");
                exit;
            } else {
                $login_error = "The email or password you entered is incorrect.";
                return;
            }
        }
        $db->disconnect();
    } catch(PDOException $e) {
        echo '<script language="javascript"> alert("Unable to connect to the database") </script>';
    }
    
}
?>
