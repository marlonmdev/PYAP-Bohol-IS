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
                    <li class="active">
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
            <div class="container-fluid">
                <ul class="nav nav-tabs">
                  <li role="presentation" class="active"><a href="<?= base_url(); ?>admin/members">Members</a></li>
                </ul><br>       
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <form id="searchForm" method="POST" action="<?= base_url(); ?>admin/members/search/data">
                                <div class="col-lg-4">
                                   <input type="text" class="form-control" name="searchbox" placeholder="Search member here." value="<?= $search ?>" required>
                                </div>
                                <div class="col-lg-1" style="margin-left:-20px;">
                                    <button type="submit" class="btn btn-primary"><span class="ti-search"></span></button>
                                </div>
                            </form>
                        </div><br>
                        <?php include 'alerts.php'; ?>
                        <table class="table table-striped table-hover">
                            <thead>
                                <?php if(!empty($result)){ ?>
                                <tr>
                                    <th style="color:#314D53;" class="text-center">Photo</th>
                                    <th style="color:#314D53;">Firstname</th>
                                    <th style="color:#314D53;">Middlename</th>
                                    <th style="color:#314D53;">Lastname</th>
                                    <th style="color:#314D53;">Age</th>
                                    <th style="color:#314D53;">Sex</th>
                                    <th style="color:#314D53;">Civil Status</th>
                                    <th style="color:#314D53;">Barangay</th>
                                    <th style="color:#314D53;">Municipality</th>
                                    <th style="color:#314D53;" class="text-center">Actions</th>
                                </tr>
                                <?php }else{ ?>
                                    <center><img src="<?= base_url(); ?>resources/images/nothing.png" height="180" width="400" class="img-responsive" style="margin-top:100px;"></center>
                                <?php } ?>
                            </thead>
                            <tbody>
                            <?php 
                                if(!empty($result)){
                                    foreach($result as $row){
                            ?>
                                    <tr>
                                        <td title="Click to view enlarge photo"><a href="<?= base_url();?>members/thumbs/<?= $row['photo']; ?>" target="_blank" data-lightbox="members"><img src="<?= base_url(); ?>members/thumbs/<?= $row['photo']; ?>" class="img-responsive" height="30" width="30" style="margin:0 auto;"></a></td>
                                        <td style="color:#314D53;"><?= $row['fName'] ?></td>
                                        <td style="color:#314D53;"><?= $row['mName'] ?></td>
                                        <td style="color:#314D53;"><?= $row['lName'] ?> <?= $row['ext'] ?></td>
                                        <td style="color:#314D53;"><?= $row['age'] ?></td>
                                        <td style="color:#314D53;"><?= $row['sex'] ?></td>
                                        <td style="color:#314D53;"><?= $row['civilStat'] ?></td>   
                                        <td style="color:#314D53;"><?= $row['brgy'] ?></td>   
                                        <td style="color:#314D53;"><?= $row['mun'] ?></td>   
                                        <td class="text-center">
                                            <a href='<?= base_url(); ?>admin/members/search/view/details/<?= $row['mid']; ?>' class='btn btn-warning' title='Details'><span class='ti-info-alt'></span></a>&nbsp;
                                            <a onclick='showUpdateInfo(<?= $row['mid']; ?>)' class='btn btn-success' title='Edit'><span class='ti-pencil-alt'></span></a>&nbsp;
                                            <a onclick='deleteMember(<?= $row['mid']; ?>)' class='btn btn-danger' title='Delete'><span class='ti-trash'></span></a>
                                        </td>
                                    </tr>
                            <?php 
                                    }
                                } 
                            ?>
                            </tbody>
                        </table>
                        <br><br>
                        <div class="pull-left" style="margin-top:-52px;">
                            <div class="col-md-12">
                                <ul class="pagination">
                                    <?= $pagination; ?>
                                </ul>
                            </div>
                        </div>           
                    </div><!-- END OF COLUMN -->
                </div><!-- END OF ROW -->
            </div>
        </div><!-- END OF PAGE-WRAPPER -->
    </div>

    <!-- Update Info modal -->
    <div class="modal fade" id="updateInfo" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header" id="modalHeaderColorPrimary">
           <button class="close" data-dismiss="modal">&times;</button>
            <center><h3>Update Member Info</h3></center>
          </div>
          <div class="modal-body text-center">
            <a id="id_data" class="text-primary">Identifying Data</a> | 
            <a id="educ" class="text-primary">Educational Background</a> | 
            <a id="siblings" class="text-primary">Siblings</a> | 
             <a id="skills" class="text-primary">Special Skills</a> | 
            <a id="interest" class="text-primary">Interest/Hobbies</a> |
            <a id="work" class="text-primary">Work Experience</a> |
            <a id="org" class="text-primary">Membership on Organizations</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="delMember" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius:0px;">
          <div class="modal-header" id="modalHeaderColorDanger">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Confirm!</h4>
          </div>
          <div class="modal-body">
            <h4 class="text-center"><span style="color:#D2322D!important;" class="ti-help-alt"></span>&nbsp; Are you sure to delete member?</h4>
          </div>
          <div class="modal-footer">
            <a id="delLink" class="btn btn-danger">Yes</a>
            <a data-dismiss="modal" class="btn btn-warning">No</a>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->