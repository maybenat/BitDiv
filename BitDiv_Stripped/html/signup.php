<?php
    include 'data/config.php';

    //$email = $lname = $fname = $password = "";
    // Error checker
    //$error1 = $error2 = $error3 = $error4 = $error5 = "";

    if(!empty($_POST)) {
        // set variable
        if (! empty ( $_POST ['firstname'] )) {
            $fname = $_POST ['firstname'];
        } else {
            $error1 = "Please provide your first name.";
        }
        if (! empty ( $_POST ['lastname'] )) {
            $lname = $_POST ['lastname'];
        } else {
            $error2 = "Please provide your last name.";
        }
        if (! empty ( $_POST ['email'] )) {
            $email = $_POST ['email'];
        } else {
            $error3 = "Please provide your e-mail.";
        }
        if (! empty ( $_POST ['password1'] )) {
            $password = $_POST ['password1'];
        } else {
            $error4 = "Please provide a password.";
        }
        if (! empty ( $_POST ['password2'] )) {
            $password2 = $_POST ['password2'];
        } else {
            $error5 = "Please repeat the password you provided above.";
        }
        if(isset($password) && isset($password2)) {
            if($password != $password2) {
                $error5 = "Passwords do not match.";
            }
        }

        if(!(isset($error1) || isset($error2) || isset($error3) || isset($error4) || isset($error5))) {
        try {
        // connect to DB
            $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
            $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

            $statement = $db->prepare ( "SELECT * FROM users WHERE email='$email'" );
            $statement->execute ();
            $result = $statement->fetch ( PDO::FETCH_ASSOC );
        // check user id exist or not
            if (isset ( $result ) && $result != false) {
                $error3 = "An account with the e-mail provided already exists. Try <a href=\"login.php\">logging in</a> here.";
                //echo '<script type="text/javascript">', 'userExists();', '</script>';
            } else {
                $statement = $db->prepare ( "INSERT INTO users (email, password, last_name, first_name, created, first_login)
                    VALUES ('$email', '$password', '$lname', '$fname', NOW(), DEFAULT)" );
                $statement->execute ();

                $statement = $db->prepare ( "SELECT * FROM users WHERE email = '$email' AND password = '$password' " );
                $statement->execute ();

                $result = $statement->fetch ( PDO::FETCH_ASSOC );

                    session_name('Private');
                    session_start();
                    session_regenerate_id();
                    $_SESSION['email'] = $email;
                    $_SESSION['first_name'] = $fname;
                    $_SESSION['last_name'] = $lname;
                    $_SESSION['uid'] = $result['uid'];
                    $_SESSION['first_login'] = 1; // DEFAULT
                    session_write_close();

                header ( "Location: user_setup.php" );
                exit;
            }
        } catch ( PDOException $e ) {
            echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database") </script></head><body></body></html>';
        }
    }
    }
?>
