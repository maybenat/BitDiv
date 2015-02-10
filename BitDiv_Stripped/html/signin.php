<?php
    include_once 'data/config.php';

    session_name('Private');
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
                    $_SESSION['first_name'] = $result['first_name'];
                    $_SESSION['last_name'] = $result['last_name'];
                    $_SESSION['uid'] = $result['uid'];
                    $_SESSION['age'] = $result['age'];
                    $_SESSION['funding'] = $result['funding'];
                    $_SESSION['risk'] = $result['risk'];
                    $_SESSION['reinvest'] = $result['reinvest'];
                    $_SESSION['desired_monthly_payout'] = $result['desired_monthly_payout'];
                    $_SESSION['first_login'] = $result['first_login'];

                    // Redirect to Home page
                    header ( "Location: index.php" );

                    exit ();
                } else {
                    unset ( $_SESSION ['email'] );
                    $_SESSION['login_error'] = "The email or password you entered is incorrect.";
                    echo '<script language="javascript"> alert(wrong) </script>';
                    header ( "Location: page_signin.php" );

                }
            }
            $db->disconnect();
        } catch ( PDOException $e ) {
            echo '<script language="javascript"> alert("Unable to connect to the database") </script>';
        }
    }
    ?>
