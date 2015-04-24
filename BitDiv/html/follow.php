<?php
include 'includes/session.php';

if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'follow':
        follow();
        break;
        case 'unfollow':
        unfollow();
        break;
    }
}

function follow() {
    include 'data/config.php';
    try {
        $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
        $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );
        if(true) {
            $statement = $db->prepare("insert into user_relationships values ((select uid from users where email = ?),(select uid from users where email = ?))");
            $statement->bindParam(1, $my_email);
            $statement->bindParam(2, $user_email);
            $my_email = $_POST['my_email'];
            $user_email = $_POST['user_email'];
            $statement->execute();

        }
        $db = null;
    } catch(PDOException $e) {
        echo 'Unable to connect to the database';
    }
    exit;
}

function unfollow() {
    include 'data/config.php';
    try {
        $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
        $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );
        if(true) {
            session_name('Private');
            $user_email = $emailkey;
            $statement = $db->prepare("delete from user_relationships where user_id = (select uid from users where email = ?) and following_id = (select uid from users where email = ?)");
            $statement->bindParam(1, $my_email);
            $statement->bindParam(2, $user_email);
            $my_email = $_POST['my_email'];
            $user_email = $_POST['user_email'];
            $statement->execute();
        }
        $db = null;
    } catch(PDOException $e) {
        echo 'Unable to connect to the database';
    }
    exit;
}
?>