<?php
include_once 'data/config.php';

if(!empty($_POST)) {
    $email = $_POST['email'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $age = $_POST['age'];
    $funding = $_POST['funding'];
    $risk = $_POST['risk'];
    $reinvest = $_POST['reinvest'];
    $payout = $_POST['payout'];
    session_start();
    $_SESSION['first_name'] = $fname;
    $_SESSION['last_name'] = $lname;
    $_SESSION['age'] = $age;
    $_SESSION['funding'] = $funding;
    $_SESSION['risk'] = $risk;
    $_SESSION['reinvest'] = $reinvest;
    $_SESSION['desired_monthly_payout'] = $payout;
    try {
        $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
        $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

        $statement = $db->prepare("update users set last_name='$lname', first_name='$fname', age=$age, funding=$funding, risk=$risk, reinvest=$reinvest, desired_monthly_payout=$payout where email='$email'");
        $statement->execute();
        $db->null;
        header( "Location: page_profile.php" );
    } catch(PDOException $e) {
        echo '<script language="javascript"> alert("Unable to connect to the database") </script>';
    }
}
?>
