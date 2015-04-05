<?php
    include_once 'data/config.php';

    if(!empty($_POST)) {
        try {
            $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $dbPassword );
            $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

            if(isset($_REQUEST['Login'])) {
                $email = $_POST['email'];
                $password = $_POST['password'];

                $statement = $db->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$password'");
                $statement->execute();

                $result = $statement->fetch(PDO::FETCH_ASSOC);

                if(isset($result) && $result != false) {

                    session_name('Private');
                    session_start();
                    $_SESSION['email'] = $result['email'];
                    $_SESSION['first_name'] = $result['first_name'];
                    $_SESSION['last_name'] = $result['last_name'];
                    $_SESSION['uid'] = $result['uid'];
                    $_SESSION['date_of_birth'] = date('Y-m-d', strtotime($result['date_of_birth']));
                    $_SESSION['age'] = (int)(date('Y') - date('Y', strtotime($result['date_of_birth'])));
                    $_SESSION['funding'] = $result['funding'];
                    $_SESSION['risk'] = $result['risk'];
                    $_SESSION['reinvest'] = $result['reinvest'];
                    $_SESSION['desired_monthly_payout'] = $result['desired_monthly_payout'];
                    $_SESSION['first_login'] = $result['first_login'];
                    session_write_close();

                    // Redirect to Home page
                    header("Location: index.php");
                    exit;
                } else {
                    $login_error = "The email or password you entered is incorrect.";
                    return;
                }
            }
            $db->disconnect();
        } catch(PDOException $e) {
            echo '<script language="javascript"> alert("Unable to connect to the database") </script>';
        }
    }
?>
