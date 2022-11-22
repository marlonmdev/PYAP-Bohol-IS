  <div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#00C292!important;border-bottom:none;">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url() ?>lgu"><img src="<?= base_url('resources/images/pyapbohol.png'); ?>" height="35" width="180" style="margin-top:-7px;"></a>
      </div> <!-- END OF NAVBAR HEADER -->
      <ul class="nav navbar-right top-nav">
          <li style="margin-top:12px;margin-right:5px;"><span class="ti-help-alt" style="color:#fff!important;font-size:1.3em!important;"><a href="<?= base_url(); ?>lgu/help" style="color:#fff;"> Help</a></span></li>
          <li style="margin-top:12px;"><span class="ti-flag-alt" style="color:#fff; font-size: 1.3em;"> <a href="" style="color:#ffffff;"><?= $this->session->userdata('municipal'); ?></a></span></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url(); ?>users/thumbs/<?= $val->photo; ?>" alt="user account" height="30" width="30" style="margin-top:-7px;border-radius:50%;"><span> &nbsp;<?= $val->name; ?></span> <b class="caret"></b></a>
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
    </nav> <!-- END OF NAVIGATION -->
    <div id="page-wrapper"><!-- START OF PAGE-WRAPPER -->
      <div class="container-fluid">
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="<?= base_url('lgu/members'); ?>">Members</a></li>
          <li role="presentation" class="active"><a href="">Edit</a></li>
        </ul>
        <div class="row">
          <div class="col-lg-12"><br>
            <ol class="breadcrumb" style="border-radius:0px;">
              <li><a href="<?= base_url() ?>lgu/members" style="font-size: 1.2em;">Members</a></li>
              <li class="active" style="font-size: 1.2em;">Special Skills</li>
            </ol>
            <?php include 'alerts.php'; ?>
            <div class="row">
                <div class="col-lg-12">
                    <h4><label><?php echo $info->fName.' '.$info->mName.' '.$info->lName.' '.$info->ext ?>'s Special Skills</label></h4>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Special Skills</h3>
                        </div>
                        <div class="panel-body">
                          <form method="POST" action="<?= base_url(); ?>lgu/members/edit/special_skills/update/<?= $row->id; ?>">
                            <input type="hidden" name="mid" value="<?= $row->mid; ?>">
                            <div class="row form-group">
                              <?php if($row->none == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="none" class="form-check-input" checked> None </div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="none" class="form-check-input"> None </div>
                              <?php } ?>

                              <?php if($row->agri == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="agri" class="form-check-input" checked> Agriculture/Farming</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="agri" class="form-check-input"> Agriculture/Farming</div>
                              <?php } ?>

                              <?php if($row->tech == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="tech" class="form-check-input" checked> Technician/Repair</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="tech" class="form-check-input"> Technician/Repair</div>
                              <?php } ?>

                              <?php if($row->construct == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="construct" class="form-check-input" checked> Construction</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="construct" class="form-check-input"> Construction</div>
                              <?php } ?>
                            </div>

                            <div class="row form-group">
                              <?php if($row->singing == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="singing" class="form-check-input" checked> Singing</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="singing" class="form-check-input"> Singing</div>
                              <?php } ?>

                              <?php if($row->dancing == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="dancing" class="form-check-input" checked> Dancing</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="dancing" class="form-check-input"> Dancing</div>
                              <?php } ?>
                              <?php if($row->carpentry == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="carpentry" class="form-check-input" checked> Carpentry</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="carpentry" class="form-check-input"> Carpentry</div>
                              <?php } ?>

                              <?php if($row->computer == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="computer" class="form-check-input" checked> Computer</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="computer" class="form-check-input"> Computer</div>
                              <?php } ?>
                            </div>

                            <div class="row form-group">
                              <?php if($row->drawing == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="drawing" class="form-check-input" checked> Drawing/Painting</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="drawing" class="form-check-input"> Drawing/Painting</div>
                              <?php } ?>

                              <?php if($row->dress == 1){ ?>
                                <div class="col-md-3"><input type="checkbox" value="1" name="dress" class="form-check-input" checked> Dressmaking/Tailoring</div>
                              <?php }else{ ?>  
                                <div class="col-md-3"><input type="checkbox" value="1" name="dress" class="form-check-input"> Dressmaking/Tailoring</div>
                              <?php } ?>

                              <?php if($row->sports == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="sports" class="form-check-input" checked> Sports </div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="sports" class="form-check-input"> Sports </div>
                              <?php } ?>

                              <?php if($row->arts == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="arts" class="form-check-input" checked> Arts/Designing</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="arts" class="form-check-input"> Arts/Designing</div>
                              <?php } ?>
                            </div>

                            <div class="row form-group">
                              <?php if($row->music == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="music" class="form-check-input" checked> Playing Musical Instrument</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="music" class="form-check-input"> Playing Musical Instrument</div>
                              <?php } ?>

                              <?php if($row->business == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="business" class="form-check-input" checked> Business/Entrepreneurship</div>
                              <?php }else{ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="business" class="form-check-input"> Business/Entrepreneurship</div>
                              <?php } ?>

                              <?php if($row->swimming == 1){ ?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="swimming" class="form-check-input" checked> Swimming</div>
                              <?php }else{ ?>
                                   <div class="col-md-3"><input type="checkbox" value="1" name="swimming" class="form-check-input"> Swimming</div>
                              <?php } ?>

                              <?php if($row->writing == 1) {?>
                                  <div class="col-md-3"><input type="checkbox" value="1" name="writing" class="form-check-input" checked> Writing</div>
                              <?php  } ?>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>&nbsp;
                            <a href="<?= base_url(); ?>lgu/members" class="btn btn-danger">Cancel</a>  
                          </form>
                        </div>
                    </div>
                </div>
            </div>
          </div><!-- END OF COLUMN -->
        </div><!-- END OF ROW -->               
      </div><!-- END OF CONTAINER FLUID -->            
    </div><!-- END OF PAGE-WRAPPER -->
  </div><!-- END OF WRAPPER -->


