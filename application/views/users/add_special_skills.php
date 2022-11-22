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
    </nav> <!-- END OF NAVIGATION -->
    <div id="page-wrapper"><!-- START OF PAGE-WRAPPER -->
      <div class="container-fluid">
        <ul class="nav nav-tabs">
          <li role="presentation"><a href="<?= base_url('lgu/members'); ?>">Members</a></li>
          <li role="presentation" class="active"><a href="">Add</a></li>
        </ul>
        <div class="row">
          <div class="col-lg-12"><br>
            <?php include 'alerts.php'; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="progresscontainer">
                      <ul class="progressbar">
                        <li class="active">Step 1</li>
                        <li class="active">Step 2</li>
                        <li class="active">Step 3</li>
                        <li class="active">Step 4</li>
                        <li>Step 5</li>
                        <li>Step 6</li>
                        <li>Step 7</li>
                      </ul>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">IV. Special Skills</h3>
                        </div>
                        <div class="panel-body">
                          <form method="POST" action="<?= base_url(); ?>lgu/members/add/special_skills/save/<?= $id; ?>">
                            <div class="row form-group">
                                <div class="col-md-3"><input type="checkbox" value="1" id="none" name="none" class="form-check-input"> None </div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="agri" name="agri" class="form-check-input"> Agriculture/Farming</div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="tech" name="tech" class="form-check-input"> Technician/Repair</div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="construct" name="construct" class="form-check-input"> Construction</div>
                              </div>

                              <div class="row form-group">
                                <div class="col-md-3"><input type="checkbox" value="1" id="singing" name="singing" class="form-check-input"> Singing</div>
                                 <div class="col-md-3"><input type="checkbox" value="1" id="dancing" name="dancing" class="form-check-input"> Dancing</div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="carpentry" name="carpentry" class="form-check-input"> Carpentry</div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="computer" name="computer" class="form-check-input"> Computer</div>
                              </div>

                              <div class="row form-group">
                                 <div class="col-md-3"><input type="checkbox" value="1" id="drawing" name="drawing" class="form-check-input"> Drawing/Painting</div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="dress" name="dress" class="form-check-input"> Dressmaking/Tailoring</div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="sports" name="sports" class="form-check-input"> Sports </div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="arts" name="arts" class="form-check-input"> Arts/Designing</div>
                              </div>

                              <div class="row form-group">
                                 <div class="col-md-3"><input type="checkbox" value="1" id="music" name="music" class="form-check-input"> Playing Musical Instrument</div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="business" name="business" class="form-check-input"> Business/Entrepreneurship</div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="swimming" name="swimming" class="form-check-input"> Swimming</div>
                                <div class="col-md-3"><input type="checkbox" value="1" id="writing" name="writing" class="form-check-input"> Writing</div>
                              </div><br>
                              <button type="submit" class="btn btn-primary">Next <span class="ti-arrow-right"></span></button>
                            </div>
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


