<?php
include_once 'data/config.php';
if(isset($_GET["email"]))
{
    $emailkey = $_GET["email"];
    $following = $_GET['following'] == 1 ? "unfollow" : "follow";
}


if(true) {
    try {
        $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
        $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

        if(true) {
            session_name('Private');
            $user_email = $emailkey;
            $statement = $db->prepare("SELECT * FROM users WHERE email = '$user_email'");
            $statement->execute();

            $peopleList = array();
            $riskList = array();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row)
            {
                $firstname = $row['first_name'];
                $lastname = $row['last_name'];
                $age = $row['age'];
                $funding = $row['funding'];
                $risk = $row['risk'];
                $reinvest = $row['reinvest'];
                $desired_monthly_payout = $row['desired_monthly_payout'];
            }
        }
        $db = null;
    } catch(PDOException $e) {
        echo '<script language="javascript"> alert("Unable to connect to the database") </script>';
    }
}
?>