<?php
include_once 'data/config.php';
if(true) {
    try {
        $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
        $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

        if(true) {
            session_name('Private');
            $email = $_SESSION['email'];
            $statement = $db->prepare("SELECT * FROM users where uid not in  (select following_id from user_relationships where user_id =  (select uid from users where email = '$email') ) and email != '$email'");
            $statement->execute();

            $peopleList = array();
            $riskList = array();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row)
            {
                $peopleList[$row['email']] = $row['first_name'] . " " . $row['last_name'];
                $riskList[$row['email']] = $row['risk'];
            }
        }
        $db = null;
    } catch(PDOException $e) {
        echo '<script language="javascript"> alert("Unable to connect to the database in file peopleDB.php") </script>';
    }
}
?>