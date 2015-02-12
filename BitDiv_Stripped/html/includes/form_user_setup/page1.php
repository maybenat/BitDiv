
          <div class="wrapper text-left">
            <strong>Before we can begin we need to get to know you and the goals you have.</strong>
          </div>
          <div class="text-danger wrapper text-center">

          </div>
          <div class="list-group list-group-sm">
            <div class="list-group-item">
              <span>$</span><input type="number" name="funding" placeholder="Funds available to you" class="form-control no-border" required <?php if(isset($_SESSION['funding'])) echo 'value="'.$_SESSION['funding'].'"'; ?>>
            </div>
            <div class="list-group-item">
              <input type="number" name="age" placeholder="Your age" class="form-control no-border" required <?php if(isset($_SESSION['age'])) echo 'value="'.$_SESSION['age'].'"'; ?>>
            </div>
          </div>

