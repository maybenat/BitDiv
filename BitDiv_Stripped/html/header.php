<script src="js/bloodhound.js"></script>
<script src="js/bloodhound.min.js"></script>
<script src="js/typeahead.bundle.js"></script>
<script src="js/typeahead.bundle.min.js"></script>
<script src="js/typeahead.jquery.js"></script>
<script src="js/typeahead.jquery.min.js"></script>


<!-- header -->
<header id="header" class="app-header navbar" role="menu">
    <!-- navbar header -->
    <div class="navbar-header bg-dark">
        <button class="pull-right visible-xs dk" ui-toggle="show" target=".navbar-collapse">
            <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle="off-screen" target=".app-aside" ui-scroll="app">
            <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <a href="#/" class="navbar-brand text-lt">
            <i class="fa fa-area-chart"></i>
            <span class="hidden-folded m-l-xs">bitdiv</span>
        </a>
    </div>
    <!-- / navbar header -->

    <!-- navbar collapse -->
    <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
            <a href="#" class="btn no-shadow navbar-btn" ui-toggle="app-aside-folded" target=".app">
                <i class="fa fa-dedent fa-fw text"></i>
                <i class="fa fa-indent fa-fw text-active"></i>
            </a>

        </div>
        <!-- / buttons -->

        <!-- link and dropdown -->
        <ul class="nav navbar-nav hidden-sm">
            <li class="dropdown pos-stc">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <span>Help</span>
                    <span class="caret"></span>
                </a>
                <div class="dropdown-menu wrapper w-full bg-white">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="row">
                                <div class="col-xs-6">
                                    <ul class="list-unstyled l-h-2x">
                                        <li>
                                            <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Tutorial</a>
                                        </li>

                                        <li>
                                            <a href><i class="fa fa-fw fa-angle-right text-muted m-r-xs"></i>Help</a>
                                        </li>

                                    </ul>
                                </div>

                            </div>

            </li>

        </ul>
        <!-- / link and dropdown -->

        <!-- search form -->
        <form class="navbar-form navbar-form-sm navbar-left shift" ui-shift="prependTo" data-target=".navbar-collapse" role="search">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" ng-model="selected" typeahead="stock for stock in stocks | filter:$viewValue | limitTo:8" class="form-control input-sm bg-light no-border rounded padder" placeholder="Search stocks...">
                    <span class="input-group-btn">
                <button type="submit" class="btn btn-sm bg-light rounded"><i class="fa fa-search"></i></button>
              </span>
                </div>
            </div>
        </form>


        <!-- / search form -->

        <!-- nabar right -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                    <i class="icon-bell fa-fw"></i>
                    <span class="visible-xs-inline">Notifications</span>
                    <span class="badge badge-sm up bg-danger pull-right-xs">2</span>
                </a>
                <!-- dropdown -->
                <div class="dropdown-menu w-xl animated fadeInUp">
                    <div class="panel bg-white">
                        <div class="panel-heading b-light bg-light">
                            <strong>You have <span>2</span> notifications</strong>
                        </div>
                        <div class="list-group">
                            <a href class="media list-group-item">
                                </span>
                                <span class="media-body block m-b-none">
                      Buy Stocks!<br>
                    </span>
                            </a>
                            <a href class="media list-group-item">
                                <span class="media-body block m-b-none">
                      Welcome!<br>
                    </span>
                            </a>
                        </div>

                    </div>
                </div>
                <!-- / dropdown -->
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
                    <span class="hidden-sm hidden-md"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name']; ?></span> <b class="caret"></b>
                </a>
                <!-- dropdown -->
                <ul class="dropdown-menu animated fadeInRight w">

                    <li>
                        <a href>
                            <span>Settings</span>
                        </a>
                    </li>
                    <li>
                        <a ui-sref="page_profile.php">Profile</a>
                    </li>

                    <li class="divider"></li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- / navbar right -->
        </div>
        <!-- / navbar collapse -->
</header>
<!-- / header -->

<!-- aside -->
<aside id="aside" class="app-aside hidden-xs bg-dark">
    <div class="aside-wrap">
        <div class="navi-wrap">


            <!-- nav -->
            <nav ui-nav class="navi clearfix">
                <ul class="nav">
                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Navigation</span>
                    </li>
                    <li>
                        <a href="index.php">
                            <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
                            <span class="font-bold">Dashboard</span>
                        </a>

                    </li>

                    <li class="line dk"></li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Components</span>
                    </li>

                    <li>
                        <a href="ui_chart.php">
                            <i class="glyphicon glyphicon-signal"></i>
                            <span>Research Center</span>
                        </a>
                    </li>
                    <li>
                        <a href="page_portfolios.php">
                            <i class="fa fa-money"></i>
                            <span>My Portfolios</span>
                        </a>
                    </li>

                    <li class="line dk hidden-folded"></li>

                    <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
                        <span>Your Stuff</span>
                    </li>
                    <li>
                        <a href="page_profile.php">
                            <i class="icon-user icon text-success-lter"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- nav -->
        </div>
    </div>
</aside>
<!-- / aside -->
