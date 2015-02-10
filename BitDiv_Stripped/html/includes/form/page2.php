
<?php

  // user risk value
  if(!isset($_SESSION['risk'])) {
    $_SESSION['risk'] = $RISK['med'];
  }

?>
          <div class="wrapper text-left">
            <strong>What kind of risk are you willing to take?</strong>
          </div>
          <div class="text-danger wrapper text-center">

          </div>
            <div class="m-b-lg">

              <div class="btn-group">

                <button type="submit" name="risk_high" class="btn btn-lg btn-primary <?php if($_SESSION['risk'] == $RISK['high']) echo 'active'; ?>"><i class="fa fa-check text-active"></i>High Risk</label>

                <button type="submit" name="risk_med" class="btn btn-lg btn-info <?php if($_SESSION['risk'] == $RISK['med']) echo 'active'; ?>"><i class="fa fa-check text-active"></i>Medium Risk</label>

                <button type="submit" name="risk_low" class="btn btn-lg btn-success <?php if($_SESSION['risk'] == $RISK['low']) echo 'active'; ?>"><i class="fa fa-check text-active"></i>Low Risk</label>

              </div>

            </div>

