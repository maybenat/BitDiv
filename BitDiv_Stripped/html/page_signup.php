<?php include 'signup.php' ?>
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

    <div class="container w-xxl w-auto-xs" ng-controller="SignupFormController" ng-init="app.settings.container = false;">
      <img src="img/logoy.png">  <div class="m-b-lg">

      <div class="wrapper text-center">
        <strong>Sign up </strong>
      </div>
      <form name="form" class="form-validation" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <div class="text-danger wrapper text-center">

        </div>
        <div class="list-group list-group-sm">
          <div class="list-group-item">
            <input placeholder="First Name" name="firstname" class="form-control no-border"  required>
          </div>
          <div class="list-group-item">
            <input placeholder="Last Name" name="lastname" class="form-control no-border"  required>
          </div>
          <div class="list-group-item">
            <input type="email" placeholder="Email" name="email" class="form-control no-border"  required>
          </div>
          <div class="list-group-item">
           <input type="password" placeholder="Password" name="password1" class="form-control no-border"  required>
         </div>
         <div class="list-group-item">
         <input type="password" placeholder="Password again" name="password2" class="form-control no-border"  required>
         </div>
       </div>
       <div class="checkbox m-b-md m-t-none">
        <label class="i-checks">
          <input type="checkbox" ng-model="agree" required><i></i> Agree to the <a href>terms and policy</a>
        </label>
      </div>
      <button type="submit" class="btn btn-lg btn-primary btn-block">Sign up</button>
      <div class="line line-dashed"></div>
      <p class="text-center"><small>Already have an account?</small></p>
      <a href="page_signin.php" class="btn btn-lg btn-default btn-block">Sign in</a>
    </form>
  </div>



</div>

<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.js"></script>
<script src="js/ui-load.js"></script>
<script src="js/ui-jp.config.js"></script>
<script src="js/ui-jp.js"></script>
<script src="js/ui-nav.js"></script>
<script src="js/ui-toggle.js"></script>

</body>
</html>
