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
                    <div class="row">
                        <div class="col-lg-12"><br>
                            <ol class="breadcrumb" style="border-radius:0px;">
                              <li><a href="<?= base_url() ?>lgu/members" style="font-size: 1.2em;">Members</a></li>
                              <li class="active" style="font-size: 1.2em;">Organizations</li>
                            </ol>
                            <h4><label><?php echo $info->fName.' '.$info->mName.' '.$info->lName.' '.$info->ext ?>'s Organization/s</label></h4>
                            <a href="<?= base_url(); ?>lgu/members" class="btn btn-warning pull-left">Back</a>&nbsp;
                            <a href="<?= base_url(); ?>lgu/members/view/member_organization/add/<?= $id; ?>" class="btn btn-primary">Add</a><br><br>
                            <?php include 'alerts.php'; ?>
                            <div class="table-responsive" id="result">
                                <table id="data-table-basic" class="table table-hover table-striped table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Name of Organization</th>
                                            <th>Position Held</th>
                                            <th>Organization Year</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if(!empty($content)){
                                            foreach($content as $row){
                                        ?>
                                            <td><?= $row->nameOrg; ?></td>
                                            <td><?= $row->posHeld; ?></td>
                                            <td><?= $row->orgYear; ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url(); ?>lgu/members/edit/member_organization/<?= $row->id; ?>" class="btn btn-success" title="Edit"><span class="ti-pencil-alt"></span></a>
                                                <a onclick="deleteOrg(<?= $row->id; ?>)" class="btn btn-danger" title="Delete"><span class="ti-trash"></span></a>
                                            </td>          
                                        </tr>
                                         <?php   
                                            }
                                        }
                                        ?>       
                                    </tbody>
                                </table>
                            </div><!-- End of table responsive div -->
                        </div><!-- End of Column -->
                    </div><!-- End of Row -->             
                </div><!-- End of container fluid div -->
            </div>
        </div>

        <div class="modal fade" id="delOrg" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="border-radius:0px;">
              <div class="modal-header" id="modalHeaderColorDanger">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirm!</h4>
              </div>
              <div class="modal-body">
                <h4 class="text-center"><span style="color:#D2322D!important;" class="ti-help-alt"></span>&nbsp; Are you sure to delete member's organization?</h4>
              </div>
              <div class="modal-footer">
                <a id="delLink" class="btn btn-danger">Yes</a>
                <a data-dismiss="modal" class="btn btn-warning">No</a>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
