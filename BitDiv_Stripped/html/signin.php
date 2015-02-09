<?php
    include_once 'data/config.php';

    session_start ();
    $email = "";
    $password = "";
    //echo '<script language="javascript"> alert("checkpoint 1") </script>';
    if (! empty ( $_POST )) {


        try {
            $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
            $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );


            if (isset ( $_REQUEST ['Login'] )) {
                $email = $_POST ['email'];
                $password = $_POST ['password'];

                echo '<script language="javascript"> alert("checkpoint 2") </script>';

                $statement = $db->prepare ( "SELECT * FROM users WHERE email = '$email' and password = '$password' " );
                $statement->execute ();

                $result = $statement->fetch ( PDO::FETCH_ASSOC );

                if (isset ( $result ) && $result != false) {
                    $_SESSION ['fname'] = $result ["first_name"];

                    $result["first_name"];


                    // Redirect to Home page
                    header ( "Location: index.php" );

                    exit ();
                } else {
                    unset ( $_SESSION ['email'] );
                }
            }
            $db->disconnect();
        } catch ( PDOException $e ) {
            echo '<script language="javascript"> alert("Unable to connect to the database") </script>';
        }
    }
    ?>
