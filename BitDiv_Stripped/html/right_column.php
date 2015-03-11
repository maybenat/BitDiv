

<!-- right col -->
<div class="col w-md bg-white-only b-l bg-auto no-border-xs">
    <div class="nav-tabs-alt">
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="#trans" data-toggle="tab"><i class="glyphicon glyphicon-transfer text-md text-muted wrapper-sm"></i></a>
            </li>
            <li><a href="#follow" data-toggle="tab"><i class="glyphicon glyphicon-user text-md text-muted wrapper-sm"></i></a>
            </li>


        </ul>
    </div>
    <div class="tab-content">

        <div class="tab-pane active" id="trans">
            <div class="wrapper-md">
                <div class="m-b-sm text-md">Transaction</div>
                <p>Add shares of this stock to your portfolio.</p>

                <div class="form-group">
                  <form action="includes/form_transaction.php?referer=<?php echo $current_page_url; ?>" method="post">
                    <p>Stock purchased:</p>
                    <input type="text" name="ticker" placeholder="ticker" class="form-control" required value="" />
                    <p class="m-t">Shares purchased:</p>
                    <input type="number" name="number_shares" placeholder="number of shares" class="form-control" required />
                    <p class="m-t">Price at time of purchase:</p>
                    <div class="input-group">
                      <span class="input-group-addon">$</span>
                      <input type="number" step="any" name="price" placeholder="price" class="form-control" required value="" /> <!-- fix input type/view -->
                  </div>

                  <p class="m-t">Date purchased:</p>
                  <div class="input-group date" id="datetimepicker1">
                      <input type="date" name="date_purchased" placeholder="01/01/2001" class="form-control" required value="" />
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                  </div>

                  <p class="m-t"></p>
                  <select name="portfolio" class="form-control">
                      <option value="1">Portfolio 1</option>
                  </select>

                  <p class="m-t"></p>

                  <button type="submit" class="btn btn-default btn-rounded m-t">Submit</button>
                  <button type="reset" class="btn btn-default btn-rounded m-t">Clear</button>
              </form>
          </div>

        <!--<script type="text/javascript"> reference: http://eonasdan.github.io/bootstrap-datetimepicker/
            $(function () {
                $('#datetimepicker1').datetimepicker({
		    pickTime: false
                });
            });
        </script>-->

        <p class="m-t">Recently viewed:</p>
        <ul class="list-group list-group-sm list-group-sp list-group-alt auto m-t">
            <li class="list-group-item">GOOG</li>
            <li class="list-group-item">MSFT</li>
            <li class="list-group-item">AAPL</li>
        </ul>


    </div>
</div>

<div class="tab-pane" id="follow">
    <div class="wrapper-md">
        <div class="m-b-sm text-md">Who to follow</div>
        <ul class="list-group no-bg no-borders pull-in">
            <li class="list-group-item">
                <a herf class="pull-left thumb-sm avatar m-r">
                    <i class="on b-white bottom"></i>
                </a>
                <div class="clear">
                    <div><a href>The Advisor Profile</a>
                    </div>
                    <small class="text-muted">advisor</small>
                </div>
            </li>
            <li class="list-group-item">
                <a herf class="pull-left thumb-sm avatar m-r">
                    <i class="on b-white bottom"></i>
                </a>
                <div class="clear">
                    <div><a href>Karl Tharp</a>
                    </div>
                    <small class="text-muted">High Risk</small>
                </div>
            </li>

        </ul>

        <?php include 'people.php';
        foreach ($peopleList as $key => $val )
        {
            echo "<p>  $val  </p>";
        }
        ?>

        <div class="text-center">
            <a href class="btn btn-sm btn-primary padder-md m-b">More Connections</a>
        </div>
    </div>
</div>

</div>
<div class="padder-md">

</div>



</div>
<!-- / right col -->
