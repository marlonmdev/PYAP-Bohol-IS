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
                        <li class="active">
                            <a href="<?= base_url(); ?>lgu/members">Members <span class="ti-user pull-right"></span></i></a>
                        </li>
                        <li>
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
                      <li role="presentation" class="active"><a href="<?= base_url(); ?>lgu/members">Members</a></li>
                      <li role="presentation"><a href="<?= base_url('lgu/members/add/identifying_data'); ?>">Add</a></li>
                    </ul><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <form id="searchForm" method="POST" action="<?= base_url(); ?>lgu/members/search/data">
                                <div class="col-lg-4">
                                    <input type="text" class="form-control" name="searchbox" placeholder="Search member here." required>
                                </div>
                                <div class="col-lg-1" style="margin-left:-20px;">
                                    <button type="submit" class="btn btn-primary"><span class="ti-search"></span></button>
                                </div>
                            </form>
                            </div><br>  
                            <?php include 'alerts.php'; ?>
                            <div class="multi-level">
                                <?php 
                                    $i = 0;
                                    foreach($brgys as $row){
                                ?>
                                    <div class="item well" style="background:#fff;padding:12px 15px;margin-bottom:2px;border-radius:0px;">
                                        <input type="checkbox" id="<?= $row->brgy.$i; ?>"/>
                                        <img src="<?= base_url(); ?>resources/images/Arrow.png" class="arrow"><label for="<?= $row->brgy.$i; ?>"><span style="color:#2A81DD;font-weight:bold;"><?= $row->brgy; ?></span>&nbsp; | &nbsp; # of Youth: <?= $row->youth; ?> &nbsp; | &nbsp; # of OSY: <?= $row->osy; ?> &nbsp; Male: <?= $row->osy_m; ?> &nbsp; Female: <?= $row->osy_f; ?> &nbsp; | &nbsp; # of ISY: <?= $row->isy; ?> &nbsp; Male: <?= $row->isy_m; ?> &nbsp; Female: <?= $row->isy_f; ?> &nbsp; | &nbsp; Solo Parent: <?= $row->solo; ?></label>  
                                        <ul style="padding-left:.8em;">
                                            <?php
                                                if(!empty($row->subs)){
                                            ?>  
                                                <script>
                                                    (function ($) {
                                                     "use strict";
                                                        
                                                        $(document).ready(function() {
                                                             $('<?php echo '#data-table-basic'.$i; ?>').DataTable();
                                                        });
                                                     
                                                    })(jQuery); 
                                                </script>
                                                <table id="<?php echo 'data-table-basic'.$i; ?>" class="table table-striped table-condensed table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th style="color:#314D53;" class="text-center">ID</th>
                                                            <th style="color:#314D53;" class="text-center">Photo</th>
                                                            <th style="color:#314D53;">Firstname</th>
                                                            <th style="color:#314D53;">Middlename</th>
                                                            <th style="color:#314D53;">Lastname</th>
                                                            <th style="color:#314D53;">Age</th>
                                                            <th style="color:#314D53;">Sex</th>
                                                            <th style="color:#314D53;">Civil Status</th>
                                                            <th style="color:#314D53;" class="text-center">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach($row->subs as $sub){
                                                    ?>
                                                        <tr>
                                                            <td style="color:#314D53;" class="text-center"><?= $sub->mid ?></td>
                                                            <td title="Click to view enlarge photo"><a href="<?= base_url();?>members/thumbs/<?= $sub->photo; ?>" target="_blank" data-lightbox="members"><img src="<?= base_url(); ?>members/thumbs/<?= $sub->photo; ?>" class="img-responsive" height="30" width="30" style="margin:0 auto;"></a></td>
                                                            <td style="color:#314D53;"><?= $sub->fName ?></td>
                                                            <td style="color:#314D53;"><?= $sub->mName ?></td>
                                                            <td style="color:#314D53;"><?= $sub->lName ?> <?= $sub->ext ?></td>
                                                            <td style="color:#314D53;"><?= $sub->age ?></td>
                                                            <td style="color:#314D53;"><?= $sub->sex ?></td>
                                                            <td style="color:#314D53;"><?= $sub->civilStat ?></td>   
                                                            <td class="text-center">
                                                                <a href='<?= base_url(); ?>lgu/members/view/details/<?= $sub->mid; ?>' class='btn btn-warning' title='Details'><span class='ti-info-alt'></span></a>&nbsp;
                                                                <a onclick='showUpdateInfo(<?= $sub->mid; ?>)' class='btn btn-success' title='Edit'><span class='ti-pencil-alt'></span></a>&nbsp;
                                                                <a onclick='deleteMember(<?= $sub->mid; ?>)' class='btn btn-danger' title='Delete'><span class='ti-trash'></span></a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    </tbody>
                                                </table>
                                            <?php }else{
                                                echo '<label style="padding-bottom:12px;"><h3 class="text-center">No Members Found.</h3></label>';
                                            } ?>
                                        </ul>
                                    </div>
                                <?php 
                                    $i++;
                                } 
                                ?>
                            </div>
                            <br><br>
                            <div class="pull-left" style="margin-top:-52px;position:absolute;">
                                <div class="col-md-12">
                                    <ul class="pagination">
                                    <?php echo $pagination; ?>
                                    </ul>
                                </div>
                            </div>  
                        </div><!-- End of Column -->
                    </div><!-- End of Row -->             
                </div><!-- End of container fluid div -->
            </div>
        </div>


        <!-- Update Info modal -->
        <div class="modal fade" id="updateInfo" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius:0px;">
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
                <h4 class="text-center"><span style="color:#D2322D!important;" class="ti-help-alt"></span>&nbsp; Are you sure you want to delete member?</h4>
              </div>
              <div class="modal-footer">
                <a id="delLink" class="btn btn-danger">Yes</a>
                <a data-dismiss="modal" class="btn btn-warning">No</a>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->