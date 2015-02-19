<?php
    include_once 'data/config.php';

    try {
        $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
        $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

        $symbol = $_POST['symbol'];

        $statement = $db->prepare("SELECT * FROM quandl WHERE symbol LIKE '%$symbol%'");
        $statement->execute();

        $result = $statement->fetchAll();
        echo json_encode($result);
        //$db->disconnect();
    } catch(PDOException $e) {
        echo '<script language="javascript"> alert("Unable to connect to the database") </script>';
    }
?>
