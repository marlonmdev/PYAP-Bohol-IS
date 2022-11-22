    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#00C292!important;border-bottom:none;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= base_url(); ?>lgu"><img src="<?= base_url('resources/images/pyapbohol.png'); ?>" height="35" width="180" style="margin-top:-7px;"></a>
            </div>
            <ul class="nav navbar-right top-nav">
                <li style="margin-top:12px;margin-right:5px;"><span class="ti-help-alt" style="color:#fff!important;font-size:1.3em!important;"><a href="<?= base_url(); ?>lgu/help" style="color:#fff;"> Help</a></span></li>
                <li style="margin-top:12px;"><span class="ti-flag-alt" style="color:#fff; font-size: 1.3em;"> <a href="" style="color:#ffffff;"><?= $this->session->userdata('municipal'); ?></a></span></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url(); ?>users/thumbs/<?= $row->photo; ?>" alt="user account" height="30" width="30" style="margin-top:-7px;border-radius:50%;"><span> &nbsp;<?= $row->name; ?></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= base_url(); ?>lgu/settings">Settings<span class="ti-settings pull-right"></span> </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#logout" data-toggle="modal" data-target="#logout">Log Out <span class="ti-power-off pull-right"></span></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="background:#000!important">
                    <li>
                        <a href="<?= base_url(); ?>lgu">Home <span class="ti-home pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>lgu/members">Members <span class="ti-user pull-right"></span></i></a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url(); ?>lgu/activities">Activities <span class="ti-clipboard pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>lgu/tabular_reports">Tabular Reports <span class="ti-layout pull-right"></span></a>
                    </li>
                    <li>
                        <a href="<?= base_url(); ?>lgu/graphical_reports">Graphical Reports <span class="ti-bar-chart pull-right"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <ul class="nav nav-tabs">
                  <li role="presentation"><a href="<?= base_url(); ?>lgu/activities">Activity List</a></li>
                  <li role="presentation" class="active"><a href="<?= base_url(); ?>lgu/activities/add_activity">Add</a></li>
                </ul><br>
                <div class="row">
                    <div class="col-lg-12">  
                        <?php include 'alerts.php'; ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Add New Activity</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form id="actForm" method="post" action="<?php echo base_url(); ?>lgu/activities/add/activity/save" enctype="multipart/form-data">
                                           <div class="row form-group">
                                              <div class="inp col-md-12">
                                                <label>Title</label>
                                                <input type="text" name="aname" class="form-control" required>
                                              </div>
                                            </div>

                                            <div class="row form-group">
                                              <div class="inp col-md-6">
                                                <label>Description</label>
                                                <textarea name="descr" class="form-control" rows="10" required></textarea>
                                              </div>
                                              <div class="inp col-md-6">
                                                <label>Photo <span style="color:#2FA341;">(Optional)</span></label>
                                                <input type="file" name="userfile" class="dropify" data-height="217" data-max-file-size="3M" accept="image/*">
                                              </div>
                                            </div>

                                            <div class="row form-group">       
                                              <div class="inp col-md-3">
                                                <label>From</label>
                                                <input type="text" id="afrom" name="afrom" class="form-control" placeholder="Select Date" autocomplete="off" required>
                                              </div>
                                              <div class="inp col-md-3">
                                                <label>To</label>
                                                <input type="text" id="ato" name="ato" class="form-control" placeholder="Select Date" autocomplete="off" required>
                                              </div>
                                              <div class="inp col-md-3">
                                                <label>Municipality</label>
                                                <input type="text" name="municipal" class="form-control" value="<?= $municipal; ?>" readonly>
                                              </div>
                                              <div class="inp col-md-3">
                                                <label>Budget</label>
                                                <input type="text" id="budget" name="budget" class="form-control" maxlength="8">
                                              </div>
                                            </div>
                                            <button type="submit" class="btn btn-success">Save</button>&nbsp;
                                            <a href="<?= base_url(); ?>lgu/activities" class="btn btn-danger"> Cancel</a>  
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- END OF COLUMN -->
                </div><!-- END OF ROW -->             
            </div>
        </div>
    </div>