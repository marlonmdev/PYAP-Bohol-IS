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
                    <li>
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
                    <li class="active">
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
            <?php include('alerts.php'); ?>
            <div class="container-fluid">
                <ul class="nav nav-tabs">
                  <li role="presentation" class="active"><a href="<?= base_url(); ?>admin/login_history">Login History</a></li>
                </ul><br>
                <div class="row">
                    <div class="col-lg-2">
                        <button class="btn btn-danger" data-toggle="modal" data-target="#modClear"><span class="ti-eraser"></span> Clear History</button>
                    </div>
                    <div class="col-lg-2" style="left:-40px!important;"><a onclick="printlayer3('data-table-basic')" class="btn btn-warning pull-left"><span class="ti-printer"></span> Print Report</a></div>
                </div><br>     
                <div class="row"> 
                    <?php 
                        include 'alerts.php'; 
                        function date_formats($timestamp){
                                date_default_timezone_set('Asia/Manila');
                                //Full //February 12, 2018 at 10:00 AM
                                $the_date = date('F d, Y \a\t h:i A', strtotime($timestamp));
                                return $the_date;
                        }
                    ?>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th width="15%">Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Municipality</th>
                                        <th>Browser</th>
                                        <th>IP Address</th>
                                        <th>OS</th>
                                        <th>Logged On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(!empty($content)){
                                        foreach($content as $row){
                                    ?>
                                    <tr id="tdata">
                                        <td class="text-center"><?= $row->id ?></td>
                                        <td class="name"><?= $row->name ?></td>
                                        <td><?= $row->email ?></td>
                                        <td><?= $row->role ?></td>
                                        <td><?= $row->municipal ?></td>
                                        <td><?= $row->browser ?></td>
                                        <td><?= $row->ip_addr ?></td>
                                        <td><?= $row->os ?></td>
                                        <td><?= date_formats($row->logged_on) ?></td>     
                                    </tr>
                                     <?php   
                                        }
                                        }
                                    ?>       
                                </tbody>
                            </table>
                        </div><!-- END OF TABLE RESPONSIVE DIV -->
                    </div><!-- END OF COLUMN -->
                </div><!-- END OF ROW -->
            </div>
        </div><!-- END OF PAGE-WRAPPER -->
    </div>

    <div class="modal fade" id="modClear" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0px;">
          <div class="modal-header" id="modalHeaderColorDanger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirm!</h4>
          </div>
          <div class="modal-body">
            <h4 class="text-center"><span style="color:#D2322D!important;" class="ti-help-alt"></span>&nbsp; Are you sure to clear login history?</h4>
          </div>
          <div class="modal-footer">
            <a href="<?= base_url(); ?>admin/login_history/clear/all" class="btn btn-danger">Yes</a>
            <a data-dismiss="modal" class="btn btn-warning">No</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
