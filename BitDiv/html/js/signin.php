<?php
    include_once 'config.php';

    session_start ();
    $email = "";
    $password = "";

    if (! empty ( $_POST )) {


        try {
            $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
            $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );


            if (isset ( $_REQUEST ['Login'] )) {
                $email = $_POST ['username'];
                $password = $_POST ['password'];

                $statement = $db->prepare ( "SELECT uid FROM users WHERE email = '$email' and password = '$password' " );
                $statement->execute ();

                $result = $statement->fetch ( PDO::FETCH_ASSOC );

                if (isset ( $result ) && $result != false) {
                    //$_SESSION ['username'] = $result ["fname"];
                    echo '<script language="javascript"> alert("In the database") </script>';

                    // set session cookie with value of uid
                    setcookie("session", $result, time() + 3600, "/");

                    // Redirect to Home page
                    header ( "Location: index.html" );

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