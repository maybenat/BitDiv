<form id="edit" method="post" hidden>
  <div class=" col-md-9 col-lg-9 ">
    <table class="table table-user-information">
      <tbody>
        <tr>
          <td>Email:</td>
          <td><?php echo $_SESSION['email']; ?></td>
          <td><input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>"></td>
        </tr>
        <tr>
          <td>First Name:</td>
          <td><input type="text" name="fname" value="<?php echo $_SESSION['first_name']; ?>"></td>
        </tr>
        <tr>
          <td>Last Name:</td>
          <td><input type="text" name="lname" value="<?php echo $_SESSION['last_name']; ?>"></td>
        </tr>
        <tr>
          <td>Age:</td>
          <td><input type="text" name="age" value="<?php echo $_SESSION['age']; ?>"></td>
        </tr>
        <tr>
          <td>Funding</td>
          <td><input type="text" name="funding" value="<?php echo $_SESSION['funding']; ?>"></td>
        </tr>
        <tr>
          <td>Risk Level:</td>
          <td><select name="risk">
            <option value="0" <?php if ($_SESSION['risk']==0) {echo "selected";} ?>>High</option>
            <option value="1" <?php if ($_SESSION['risk']==1) {echo "selected";} ?>>Medium</option>
            <option value="2" <?php if ($_SESSION['risk']==2) {echo "selected";} ?>>Low</option></select>
          </td>
        </tr>
        <tr>
          <td>Reinvest/Monthly Payout:</td>
          <td><select name="reinvest">
            <option value="0" <?php if ($_SESSION['reinvest']==0) {echo "selected";} ?>>Reinvest</option>
            <option value="1" <?php if ($_SESSION['reinvest']==1) {echo "selected";} ?>>Monthly Payout</option>
          </td>
        </tr>
        <tr>
          <td>Desired monthly payout:</td>
          <td><input type="text" name="payout" value="<?php echo $_SESSION['desired_monthly_payout'];?>"></td>
        </tr>
      </tbody>
    </table>
  </div>
  <input type="submit" value="save">
  <input type="reset" value="reset">
</form>