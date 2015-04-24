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
            $statement = $db->prepare("select * from users left join user_relationships on user_relationships.following_id = uid where user_relationships.user_id = (SELECT uid FROM users WHERE email = '$email')");
            $statement->execute();

            $friendList = array();

            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach($result as $row)
            {
                $info = array("fname"=>$row['first_name'], "lname"=>$row['last_name'], "email"=>$row['email']);
                array_push($friendList, $info);
            }
        }
        $db = null;
    } catch(PDOException $e) {
        echo '<script language="javascript"> alert("Unable to connect to the database in file friendDB.php") </script>';
    }
}
?>