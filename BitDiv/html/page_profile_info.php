<div id="profile", class=" col-md-9 col-lg-9 ">
  <table class="table table-user-information">
    <tbody>
      <tr>
        <td>Email:</td>
        <td><?php echo $_SESSION['email']; ?></td>
      </tr>
      <tr>
        <td>First Name:</td>
        <td><?php echo $_SESSION['first_name']; ?></td>
      </tr>
      <tr>
        <td>Last Name:</td>
        <td><?php echo $_SESSION['last_name']; ?></td>
      </tr>
      <tr>
        <td>Age:</td>
        <td><?php echo $_SESSION['age']; ?></td>
      </tr>
      <tr>
        <td>Funding</td>
        <td><?php echo $_SESSION['funding']; ?></td>
      </tr>
      <tr>
        <td>Risk Level:</td>
        <td><?php switch ($_SESSION['risk']){ case 0:echo 'High Risk';break; case 1:echo 'Medium Risk';break; case 2:echo 'Low Risk';break; }; ?></td>
      </tr>
      <tr>
        <td>Reinvest/Monthly Payout:</td>
        <td><?php switch ($_SESSION['reinvest']) {case 0: echo 'Reinvest';break; case 1: echo'Monthly Payout';break;}; ?></td>
      </tr>
      <tr>
        <td>Desired monthly payout:</td>
        <td><?php echo $_SESSION['desired_monthly_payout']; ?></td>
      </tr>
    </tbody>
  </table>
</div>