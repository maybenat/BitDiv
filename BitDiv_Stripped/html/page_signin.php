<?php include 'signin.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>bitdiv</title>

  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="../bower_components/animate.css/animate.css" type="text/css" />
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="../bower_components/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />

</head>
<body>
  <div class="app app-header-fixed  ">


    <div class="container w-xxl w-auto-xs" ng-controller="SigninFormController" ng-init="app.settings.container = false;">
      <img src="img/logoy.png">  <div class="m-b-lg">
      <div class="wrapper text-center">
        <strong>Sign in</strong>
      </div>
      <form name="form" class="form-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="text-danger wrapper text-center">

        </div>
        <div class="list-group list-group-sm">
          <div class="list-group-item">
            <input type="email" name="email" placeholder="Email" class="form-control no-border" required <?php if(isset($email)) echo 'value="'.$email.'"'; ?>>
          </div>
          <div class="list-group-item">
           <input type="password" name="password" placeholder="Password" class="form-control no-border" required>
         </div>

         <?php if(isset($login_error)) { echo '
         <div class="alert alert-danger" role="alert">
          <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
          <span class="sr-only">Error:</span> '.$login_error.'
         </div>'; } ?>

      </div>
      <button type="submit" name="Login" class="btn btn-lg btn-primary btn-block">Log in</button>
      <div class="text-center m-t m-b"><a ui-sref="access.forgotpwd">Forgot password?</a></div>
      <div class="line line-dashed"></div>
      <p class="text-center"><small>Need an account?</small></p>
      <a href="page_signup.php" class="btn btn-lg btn-default btn-block">Create an account</a>
    </form>
  </div>

</div>
</div>


</div>

<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>

</body>
</html>
