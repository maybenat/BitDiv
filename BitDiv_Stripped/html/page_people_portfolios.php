<?php
include_once 'data/config.php';
if(isset($_GET["email"]))
{
    $email = $_GET["email"];
}

if(true) {
    try {
        $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
        $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

        if(true) {
            session_name('Private');
            $email = $_SESSION['email'];
            $statement = $db->prepare("select * from user_stocks where uid = (SELECT uid FROM users WHERE email = '$email')");
            $statement->execute();

            $stocks = array();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row)
            {
                $info = array("ticker"=>$row['ticker'], "shares"=>$row['number_shares'], "price"=>$row['price'], "date"=>$row['date_purchased']);
                array_push($stocks, $info);
            }
        }
        $db = null;
    } catch(PDOException $e) {
        echo '<script language="javascript"> alert("Unable to connect to the database in file friendDB.php") </script>';
    }
}
?>