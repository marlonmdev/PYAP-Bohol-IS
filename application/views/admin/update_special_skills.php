  <div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#00C292!important;border-bottom:none;">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= base_url() ?>admin"><img src="<?= base_url('resources/images/pyapbohol.png'); ?>" height="35" width="180" style="margin-top:-7px;"></a>
      </div> <!-- END OF NAVBAR HEADER -->
      <ul class="nav navbar-right top-nav">
          <li style="margin-top:12px;margin-right:5px;"><span class="ti-help-alt" style="color:#fff!important;font-size:1.3em!important;"><a href="<?= base_url(); ?>admin/help" style="color:#fff;"> Help</a></span></li>
          <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url(); ?>users/thumbs/<?= $val->photo; ?>" alt="user account" height="30" width="30" style="margin-top:-7px;border-radius:50%;"><span> &nbsp;<?= $val->name; ?></span> <b class="caret"></b></a>
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
    </nav> <!-- END OF NAVIGATION -->
    <div id="page-wrapper"><!-- START OF PAGE-WRAPPER -->
      <div class="container-fluid">
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="<?= base_url('admin/members'); ?>">Members</a></li>
          <li role="presentation" class="active"><a href="">Update</a></li>
        </ul>
        <div class="row">
          <div class="col-lg-12"><br>
            <ol class="breadcrumb" style="border-radius:0px;">
              <li><a href="<?= base_url() ?>admin/members" style="font-size: 1.2em;">Members</a></li>
              <li><a onclick="GoBack()" style="font-size: 1.2em;">Barangays</a></li>
              <li class="active" style="font-size: 1.2em;">Special Skills</li>
            </ol>    
            <?php include 'alerts.php'; ?>
            <div class="row">
                <div class="col-lg-12">
                    <h4><label><?php echo $info->fName.' '.$info->mName.' '.$info->lName.' '.$info->ext ?>'s Special Skills</label></h4>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Special Skills</h3>
                        </div>
                        <div class="panel-body">
                          <form method="POST" action="<?= base_url(); ?>admin/members/add/special_skills/update/<?= $id; ?>"> 
                            <div class="row form-group">
                              <div class="col-md-3"><input type="checkbox" value="1" name="none" id="none" class="form-check-input"> None </div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="agri" id="agri" class="form-check-input"> Agriculture/Farming</div>    

                              <div class="col-md-3"><input type="checkbox" value="1" name="tech" id="tech" class="form-check-input"> Technician/Repair</div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="construct" id="construct" class="form-check-input"> Construction</div>
                            </div>

                            <div class="row form-group">
                              <div class="col-md-3"><input type="checkbox" value="1" name="singing" id="singing" class="form-check-input"> Singing</div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="dancing" id="dancing" class="form-check-input"> Dancing</div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="carpentry" id="carpentry" class="form-check-input"> Carpentry</div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="computer" id="computer" class="form-check-input"> Computer</div>
                            </div>

                            <div class="row form-group">
                              <div class="col-md-3"><input type="checkbox" value="1" name="drawing" id="drawing" class="form-check-input"> Drawing/Painting</div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="dress" id="dress" class="form-check-input"> Dressmaking/Tailoring</div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="sports" id="sports" class="form-check-input"> Sports </div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="arts" id="arts" class="form-check-input"> Arts/Designing</div>
                            </div>

                            <div class="row form-group">
                              <div class="col-md-3"><input type="checkbox" value="1" name="music" id="music" class="form-check-input"> Playing Musical Instrument</div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="business" id="business" class="form-check-input"> Business/Entrepreneurship</div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="swimming" id="swimming" class="form-check-input"> Swimming</div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="writing" id="writing" class="form-check-input"> Writing</div>
                            </div>
                            <button type="submit" class="btn btn-success">Update</button>&nbsp;
                            <a onclick="GoBack()" class="btn btn-danger">Cancel</a>
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


