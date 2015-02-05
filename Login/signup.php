    <?php
    include './config.php';

// Start/resume a session.
    //$email = $lname = $fname = $password = "";
// Error checker
    //$error1 = $error2 = $error3 = $error4 = $error5 = "";

    if (! empty ( $_POST )) {
        session_start ();
        echo '<!-- hello! -->';
        // set variable
        if (! empty ( $_POST ['firstname'] )) {
            $fname = $_SESSION ['firstname'] = $_POST ['firstname'];
        } else {
            $error1 = "Please provide your first name.";
        }
        if (! empty ( $_POST ['lastname'] )) {
            $lname = $_SESSION ['lastname'] = $_POST ['lastname'];
        } else {
            $error2 = "Please provide your last name.";
        }
        if (! empty ( $_POST ['email'] )) {
            $email = $_SESSION ['email'] = $_POST ['email'];
        } else {
            $error3 = "Please provide your e-mail.";
        }
        if (! empty ( $_POST ['password1'] )) {
            $password = $_SESSION ['password1'] = $_POST ['password1'];
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
        //if (! empty ( $_POST ['password1'] ) && ! empty ( $_POST ['password2'] )) {
        //    if ($_POST ['password1'] == $_POST ['password2']) {
        //        $pw = $_POST ['password1'];
        //    } else {
        //        $error5 = "Passwords do not match.";
        //    }
        //}
        session_write_close();
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
                $statement = $db->prepare ( "INSERT INTO users (email, password, last_name, first_name, created)
                    values ('$email', '$password', '$lname', '$fname', NOW())" );
                $statement->execute ();

                header ( "Location: index.html" );
                exit;
            }
        } catch ( PDOException $e ) {
            echo '<!DOCTYPE html><html><head><script language="javascript"> alert("Unable to connect to the database") </script></head><body></body></html>';
        }
    }
    }
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create new account</title>

</head>

<body background="img/background.jpg";>
    <div class="container">
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
            <div class="panel panel-info">

                <div class="panel-heading">
                    <div class="panel-title">Sign Up</div>
                    <div style="float:right; font-size: 85%; position: relative; top:-10px"><a href="login.php" >Sign In</a></div>
                </div>

                <div class="panel-body" >
                    <form id="signupform" class="form-horizontal" role="form"
                    method="post"
                    action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                    <div id="signupalert" style="display:none" class="alert alert-danger">
                        <p>Error:</p>
                        <span></span>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name" <?php echo 'value="'.$fname.'"'; ?>>
                            <?php if(isset($error1)) echo '<p>'.$error1.'<p>'; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name" <?php echo 'value="'.$lname.'"'; ?>>
                            <?php if(isset($error2)) echo '<p>'.$error2.'<p>'; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Email Address" <?php echo 'value="'.$email.'"'; ?>>
                            <?php if(isset($error3)) echo '<p>'.$error3.'<p>'; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password1" placeholder="Password" <?php echo 'value="'.$password.'"'; ?>>
                            <?php if(isset($error4)) echo '<p>'.$error4.'<p>'; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Repeat Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password2" placeholder="Password" <?php echo 'value="'.$password2.'"'; ?>>
                            <?php if(isset($error5)) echo '<p>'.$error5.'<p>'; ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-md-offset-3 col-md-9">
                            <button id="btn-signup" type="submit" class="btn btn-info"><i class="icon-hand-right"></i> Sign Up</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

</body>
</html>