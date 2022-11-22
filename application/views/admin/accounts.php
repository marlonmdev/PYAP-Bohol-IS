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
                    <li class="active">
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
            <div class="container-fluid">
                <ul class="nav nav-tabs">
                  <li role="presentation" class="active"><a href="<?= base_url(); ?>admin/accounts">Accounts</a></li>
                  <li role="presentation"><a href="<?= base_url(); ?>admin/accounts/add/new">Add</a></li>
                </ul><br>       
                    <div class="col-md-12">
                        <?php include 'alerts.php'; ?>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Photo</th>
                                        <th>Name</th>
                                        <th>Role</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Municipality</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(!empty($content)){
                                        foreach($content as $row){
                                    ?>
                                    <tr id="tdata">
                                        <td class="text-center"><?= $row->id ?></td>
                                        <td title="Click to view enlarge photo"><a href="<?= base_url();?>users/thumbs/<?= $row->photo ?>" target="_blank" data-lightbox="members"><img src="<?= base_url(); ?>users/thumbs/<?= $row->photo ?>" class="img-responsive" height="30" width="30" style="margin:0 auto;"></a></td>
                                        <td><?= mb_strimwidth($row->name, 0, 15, "...") ?></td>
                                        <td><?= $row->role ?></td>
                                        <td><?= mb_strimwidth($row->uname, 0, 10, "...") ?></td>
                                        <td><?= mb_strimwidth($row->email, 0, 15, "...") ?></td>
                                        <td><?= $row->phone ?></td>
                                        <td><?= $row->municipal ?></td>                                  
                                        <td class="text-center">
                                            <a href="<?= base_url();?>admin/accounts/change_password/<?= $row->id;?>" class="btn btn-warning" title="Change Password"><span class="ti-key"></span></a>
                                            <a href="<?= base_url();?>admin/accounts/edit/<?= $row->id;?>" class="btn btn-success" title="Edit"><span class="ti-pencil-alt"></span></a>
                                            <a onclick="deleteAccount(<?= $row->id;?>)" class="btn btn-danger" title="Delete"><span class="ti-trash"></span></a>
                                        </td>          
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

    <div class="modal fade" id="delAccount" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0px;">
          <div class="modal-header" id="modalHeaderColorDanger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirm!</h4>
          </div>
          <div class="modal-body">
            <h4 class="text-center"><span style="color:#D2322D!important;" class="ti-help-alt"></span>&nbsp; Are you sure to delete account?</h4>
          </div>
          <div class="modal-footer">
            <a id="delLink" class="btn btn-danger">Yes</a>
            <a data-dismiss="modal" class="btn btn-warning">No</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

