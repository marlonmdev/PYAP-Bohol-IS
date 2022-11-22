    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#00C292!important;border-bottom:none;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>admin"><img src="<?= base_url('resources/images/pyapbohol.png'); ?>" height="35" width="180" style="margin-top:-7px;"></a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li style="margin-top:12px;margin-right:5px;"><span class="ti-help-alt" style="color:#fff!important;font-size:1.3em!important;"><a href="<?= base_url(); ?>admin/help" style="color:#fff;"> Help</a></span></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url(); ?>users/thumbs/<?= $usr->photo; ?>" alt="user account" height="30" width="30" style="margin-top:-7px;border-radius:50%;"><span> &nbsp;<?= $usr->name; ?></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= base_url(); ?>admin/settings">Settings<span class="ti-settings pull-right"></span> </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#logout" data-toggle="modal" data-target="#logout">Log Out <span class="ti-power-off pull-right"></span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="background:#000!important;">
                    <li class="active">
                        <a href="<?= base_url(); ?>admin">Home <span class="ti-home pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/members">Members <span class="ti-user pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/announcements">Announcements <span class="ti-announcement pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/accounts">Accounts <span class="ti-credit-card pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/login_history">Login History <span class="ti-bookmark-alt pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/tabular_reports">Tabular Reports <span class="ti-layout pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>admin/graphical_reports">Graphical Reports <span class="ti-bar-chart pull-right"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <?php include 'alerts.php'; ?>
            <div class="container-fluid"> 
                <div class="row text-center" style="margin-top:20px;">
                    <div class="col-md-3" style="display:block;">
                        <div class="wb-traffic-inner8">
                            <div class="website-traffic-ctn">
                                <h2><span class="count"><?= $members; ?></span></h2>
                                <p>Members</p>
                            </div>
                            <div class="pull-right" style="margin-left:70px;"><i class="fa fa-group" style="font-size:4.2em;color:#EB4B4B;"></i></div>
                        </div>
                    </div>
                    <div class="col-md-3" style="display:block;">
                        <div class="wb-traffic-inner8">
                            <div class="website-traffic-ctn">
                                <h2><span class="count"><?= $male; ?></span></h2>
                                <p>Male</p>
                            </div>
                            <div class="pull-right" style="margin-left:80px;"><i class="fa fa-male" style="font-size:4.2em;color:#0D4CFF;"></i></div>
                        </div>
                    </div>
                    <div class="col-md-3" style="display:block;">
                        <div class="wb-traffic-inner8">
                            <div class="website-traffic-ctn">
                                <h2><span class="count"><?= $female; ?></span></h2>
                                <p>Female</p>
                            </div>
                            <div class="pull-right" style="margin-left:80px;"><i class="fa fa-female" style="font-size:4.2em;color:#FF5722;"></i></div>
                        </div>
                    </div>
                    <div class="col-md-3" style="display:block;">
                        <div class="wb-traffic-inner8">
                            <div class="website-traffic-ctn">
                                <h2><span class="count"><?= $accounts; ?></span></h2>
                                <p>Accounts</p>
                            </div>
                            <div class="pull-right" style="margin-left:80px;"><i class="fa fa-user" style="font-size:4.2em;color:#AA00FF;"></i></div>
                        </div>
                    </div>
                </div><br>      
                <div class="row" style="margin-top:20px;margin-left:60px;">
                    <div class="col-lg-3">
                        <input type="text" class="knob" value="0" data-rel="<?= $male_percentage ?>" data-linecap="round" data-width="150" data-bgcolor="#E4E4E4" data-fgcolor="#3F51B5" data-thickness=".12" data-readonly="true"><br>
                        <div style="margin-top:-30px;margin-left:22px !important;">
                            <p>Male Members</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="knob" value="0" data-rel="<?= $female_percentage ?>" data-linecap="round" data-width="150" data-bgcolor="#E4E4E4" data-fgcolor="#F44336" data-thickness=".12" data-readonly="true">
                        <div style="margin-top:-30px;margin-left:22px !important;">
                            <p>Female Members</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="knob" value="0" data-rel="<?= $osy_percentage ?>" data-linecap="round" data-width="150" data-bgcolor="#E4E4E4" data-fgcolor="#00c292" data-thickness=".12" data-readonly="true">
                        <div style="margin-top:-30px;margin-left:22px !important;">
                            <p>Out of School Youth</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <input type="text" class="knob" value="0" data-rel="<?= $isy_percentage ?>" data-linecap="round" data-width="150" data-bgcolor="#E4E4E4" data-fgcolor="#9C27B0" data-thickness=".12" data-readonly="true">
                        <div style="margin-top:-30px;margin-left:22px !important;">
                            <p>In School Youth</p>
                        </div>
                    </div>
                </div><br>
                <div class="row" style="margin-top:20px;">
                    <div class="col-md-4" style="display:block;">
                        <div class="wb-traffic-inner8" style="padding-left:10%;">
                            <div class="website-traffic-ctn">
                                <h2><span class="count"><?php login_last_24_hours(); ?></span></h2>
                                <p>Logins Last 24 Hours</p>
                            </div>
                            <div class="pull-right" style="margin-left:70px;"><i class="fa fa-history" style="font-size:4.2em;color:#00BCD4;;"></i></div>
                        </div>
                    </div>
                    <div class="col-md-4" style="display:block;">
                        <div class="wb-traffic-inner8" style="padding-left:10%;">
                            <div class="website-traffic-ctn">
                                <h2><span class="count"><?php login_this_month(); ?></span></h2>
                                <p>Logins This Month</p>
                            </div>
                            <div class="pull-right" style="margin-left:70px;"><i class="fa fa-calendar" style="font-size:4.2em;color:#1F2E86;"></i></div>
                        </div>
                    </div>
                    <div class="col-md-4" style="display:block;">
                        <div class="wb-traffic-inner8" style="padding-left:10%;">
                            <div class="website-traffic-ctn">
                                <h2><span class="count"><?= $announcements ?></span></h2>
                                <p>Announcements</p>
                            </div>
                            <div class="pull-right" style="margin-left:70px;"><i class="fa fa-bell" style="font-size:4.2em;color:#F3C30B;"></i></div>
                        </div>
                    </div>
                </div><br>
            </div>
        </div>
    </div>
    
