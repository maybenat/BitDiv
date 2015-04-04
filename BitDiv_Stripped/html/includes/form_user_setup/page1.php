
          <div class="wrapper text-left">
            <strong>Before we can begin we need to get to know you and the goals you have.</strong>
          </div>
          <div class="text-danger wrapper text-center">

          </div>
          <div class="form-group input-group-sm">
            <p class="m-t">Funds available to you:</p>
            <div class="input-group">
              <span class="input-group-addon">$</span>
              <input type="number" step="any" name="funding" placeholder="" class="form-control" required <?php if(isset($_SESSION['funding'])) echo 'value="'.$_SESSION['funding'].'"'; ?>>
            </div>
            <p class="m-t">Your date of birth:</p>
            <div class="input-group">
              <input type="date" name="date_of_birth" placeholder="" class="form-control no-border" required <?php if(isset($_SESSION['date_of_birth'])) echo 'value="'.$_SESSION['date_of_birth'].'"'; ?>>
            </div>
          </div>

