<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create new account</title>
    <?php
    include './config.php';

// Start/resume a session.
    session_start ();
    $email = $lname = $fname = $password = "";
// Error checker
    $error1 = $error2 = $error3 = $error4 = $error5 = "";

    if (! empty ( $_POST )) {

    // set variable
        if (! empty ( $_POST ['fname'] )) {
            $fname = $_SESSION ['fname'] = $_POST ['fname'];
        } else {
            $error1 = "You can't leave this empty.";
        }
        if (! empty ( $_POST ['lname'] )) {
            $lname = $_SESSION ['lname'] = $_POST ['lname'];
        } else {
            $error2 = "You can't leave this empty.";
        }
        if (! empty ( $_POST ['email'] )) {
            $email = $_SESSION ['email'] = $_POST ['email'];
        } else {
            $error3 = "You can't leave this empty.";
        }
        if (! empty ( $_POST ['password1'] ) && ! empty ( $_POST ['password2'] )) {
            if ($_POST ['password1'] == $_POST ['password2']) {
                $pw = $_POST ['password1'];
            } else {
                $error5 = "These passwords don't match. Try again?";
            }
        }


        try {
        // connect to DB
            $db = new PDO ( "mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password );
            $db->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            $db->setAttribute ( PDO::ATTR_EMULATE_PREPARES, false );

            //$statement = $db->prepare ( "select * from ps5_user where login='$login'" );
            $statement->execute ();
            $result = $statement->fetch ( PDO::FETCH_ASSOC );
        // check user id exist or not
            if (isset ( $result ) && $result != false) {
                $error3 = "Someone already has that username. Try another?";
                //echo '<script type="text/javascript">', 'userExists();', '</script>';
            } else {
                $statement = $db->prepare ( "INSERT INTO users (login, passwords, lastname, firstname)
                    values ('$email','$password', '$lname', '$fname')" );
                $statement->execute ();

                header ( "Location: ./index.html" );
            }
        } catch ( PDOException $e ) {
            echo '<script language="javascript"> alert("Unable to connect to the database") </script>';
        }
    }
    ?>



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
                        <label for="email" class="col-md-3 control-label">Email</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="email" placeholder="Email Address">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="firstname" class="col-md-3 control-label">First Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="col-md-3 control-label">Last Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password1" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-md-3 control-label">Repeat Password</label>
                        <div class="col-md-9">
                            <input type="password" class="form-control" name="password2" placeholder="Password">
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