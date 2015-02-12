
<?php

  // user risk value
  if(!isset($_SESSION['reinvest'])) {
    session_name('Private');
    session_start();
    $_SESSION['reinvest'] = 0;
    session_write_close();
  }

?>

          <div class="wrapper text-left">
            <strong>Are you looking to reinvest your returns, or are you looking for a monthly payout?</strong>
          </div>
          <div class="text-danger wrapper text-center">

          </div>
            <div class="m-b-lg">
              <div class="btn-group">
                <button type="submit" name="payout" class="btn btn-lg btn-info <?php if(!$_SESSION['reinvest']) echo 'active'; ?>"><i class="fa fa-check text-active"></i>Monthly payout</label>
                <button type="submit" name="reinvest" class="btn btn-lg btn-success <?php if($_SESSION['reinvest']) echo 'active'; ?>"><i class="fa fa-check text-active"></i>Reinvest</label>
              </div>
            </div>

