<?php
include_once 'data/config.php';

if(true) {
    try {
        $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
        $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

        if(true) {
            session_name('Private');
            $user_email = $_SESSION['email'];
            $statement = $db->prepare("SELECT * FROM users WHERE email != '$user_email'");
            $statement->execute();
            $peopleList = array();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row)
            {
                $peopleList[$row['email']] = $row['first_name'] ." ".  $row['last_name'];
            }
        }
        $db = null;
    } catch(PDOException $e) {
        echo '<script language="javascript"> alert("Unable to connect to the database") </script>';
    }
}

?>