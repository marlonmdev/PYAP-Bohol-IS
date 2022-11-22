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
              <li class="active" style="font-size: 1.2em;">Educational Background</li>
            </ol> 
            <?php include 'alerts.php'; ?>
            <div class="row">
                <div class="col-lg-12">
                    <h4><label><?php echo $info->fName.' '.$info->mName.' '.$info->lName.' '.$info->ext ?>'s Educational Background</label></h4>        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">Edit Educational Background</h3>
                        </div>
                        <div class="panel-body">
                          <form id="education" method="POST" action="<?= base_url(); ?>lgu/members/edit/educational_background/update/<?= $row->mid; ?>">
                            <h5><strong>E L E M E N T A R Y &nbsp; L E V E L</strong></h5>
                            <div class="row form-group">
                              <div class="inp col-md-3">
                                  <label>School Name</label>
                                  <input type="text" name="eName" class="form-control" value="<?= $row->eName; ?>" placeholder="Enter School Name" maxlength="50" required>
                              </div>
                              <div class="inp col-md-4">
                                  <label>School Address</label>
                                  <input type="text" name="eAddr" class="form-control" value="<?= $row->eAddr; ?>" placeholder="Enter School Address" maxlength="50" required>
                              </div>
                              <div class="inp col-md-2">
                                <label>Grade Level</label>
                                <select name="eLevel" class="form-control" required>
                                  <option value="<?= $row->eLevel; ?>"><?= $row->eLevel; ?></option>
                                  <option value=""></option>
                                  <option value="Grade 1">Grade 1</option>
                                  <option value="Grade 2">Grade 2</option>
                                  <option value="Grade 3">Grade 3</option>
                                  <option value="Grade 4">Grade 4</option>
                                  <option value="Grade 5">Grade 5</option>
                                  <option value="Grade 6">Grade 6</option>
                                </select>
                              </div>
                              <div class="inp col-md-3">
                                <label>Educational Status</label>
                                <select id="eStat" name="eStat" class="form-control" required>
                                  <option value="<?= $row->eStat; ?>"><?= $row->eStat; ?></option>
                                  <option value=""></option>
                                  <option value="In School">In School</option>
                                  <option value="Out of School">Out of School</option>
                                  <option value="Graduated">Graduated</option>
                                </select>
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="inp col-md-3">
                                <label>From <span class="text-success">(Optional)</span></label>
                                <input type="text" id="eFrom" name="eFrom" value="<?= $row->eFrom; ?>" class="form-control" placeholder="Select Date" autocomplete="off">
                              </div>
                              <div class="inp col-md-3">
                                <label>To <span class="text-success">(Optional)</span></label>
                                <input type="text" id="eTo" name="eTo" class="form-control" value="<?= $row->eTo; ?>" placeholder="Select Date" autocomplete="off">
                              </div>
                              <div class="inp col-md-6" style="display:none;" id="eReason">
                                <?php if(!empty($res) && $res->level == 'Elementary'){ ?>
                                  <label>Reason for Dropping</label><br>
                                  <?php if($res->finProb == 1){ ?>
                                      <input type="checkbox" value="1" name="eFinProb" class="form-check-input" checked> Financial Problems |
                                  <?php }else{ ?>
                                     <input type="checkbox" value="1" name="eFinProb" class="form-check-input"> Financial Problems |
                                  <?php } ?>

                                  <?php if($res->nInterest == 1){ ?>
                                      <input type="checkbox" value="1" name="eNInterest" class="form-check-input" checked> Not Interested |
                                  <?php }else{ ?>
                                      <input type="checkbox" value="1" name="eNInterest" class="form-check-input"> Not Interested |
                                  <?php } ?>
                                 
                                  <?php if($res->famProb == 1){ ?>
                                      <input type="checkbox" value="1" name="eFamProb" class="form-check-input" checked> Family Problem |
                                  <?php }else{ ?>
                                      <input type="checkbox" value="1" name="eFamProb" class="form-check-input"> Family Problem |
                                  <?php } ?>
                                  
                                  <?php if($res->ePreg == 1){ ?>
                                      <input type="checkbox" value="1" name="eEPreg" class="form-check-input" checked> Early Pregnancy |
                                  <?php }else{ ?>
                                      <input type="checkbox" value="1" name="eEPreg" class="form-check-input"> Early Pregnancy |
                                  <?php } ?>
                                  
                                  <?php if($res->hProb == 1){ ?>
                                      <input type="checkbox" value="1" name="eHProb" class="form-check-input" checked> Health Problems
                                  <?php }else{ ?>
                                      <input type="checkbox" value="1" name="eHProb" class="form-check-input"> Health Problems
                                  <?php } ?>
                                <?php }else{ ?>
                                  <label>Reason for Dropping</label><br>
                                  <input type="checkbox" value="1" name="eFinProb" class="form-check-input"> Financial Problems |
                                  <input type="checkbox" value="1" name="eNInterest" class="form-check-input"> Not Interested |
                                  <input type="checkbox" value="1" name="eFamProb" class="form-check-input"> Family Problem |
                                  <input type="checkbox" value="1" name="eEPreg" class="form-check-input"> Early Pregnancy |
                                  <input type="checkbox" value="1" name="eHProb" class="form-check-input"> Health Problems
                                <?php } ?>
                              </div>
                            </div>

                            <h5><strong>S E C O N D A R Y &nbsp; L E V E L</strong></h5>
                            <div class="row form-group">
                              <div class="col-md-3">
                                <label>School Name</label>
                                  <input type="text" name="sName" class="form-control" value="<?= $row->sName; ?>" placeholder="Enter School Name" maxlength="50">
                                </div>
                              <div class="col-md-4">
                                <label>School Address</label>
                                  <input type="text" name="sAddr" class="form-control" value="<?= $row->sAddr; ?>" placeholder="Enter School Address" maxlength="50">
                                </div>
                              <div class="col-md-2">
                                <label>Grade Level</label>
                                <select name="sLevel" class="form-control">
                                  <option value="<?= $row->sLevel; ?>"><?= $row->sLevel; ?></option>
                                  <option value=""></option>
                                  <option value="Grade 7">Grade 7</option>
                                  <option value="Grade 8">Grade 8</option>
                                  <option value="Grade 9">Grade 9</option>
                                  <option value="Grade 10">Grade 10</option>
                                  <option value="Grade 11">Grade 11</option>
                                  <option value="Grade 12">Grade 12</option>
                                </select>
                              </div>
                              <div class="col-md-3">
                                <label>Educational Status</label>
                                <select id="sStat" name="sStat" class="form-control">
                                  <option value="<?= $row->sStat; ?>"><?= $row->sStat; ?></option>
                                  <option value=""></option>
                                  <option value="In School">In School</option>
                                  <option value="Out of School">Out of School</option>
                                  <option value="Graduated">Graduated</option>
                                </select>
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="col-md-3">
                                <label>From <span class="text-success">(Optional)</span></label>
                                <input type="text" id="sFrom" name="sFrom" value="<?= $row->sFrom; ?>" class="form-control" placeholder="Select Date" autocomplete="off">
                              </div>
                              <div class="col-md-3">
                                <label>To <span class="text-success">(Optional)</span></label>
                                <input type="text" id="sTo" name="sTo" class="form-control" value="<?= $row->sTo; ?>" placeholder="Select Date" autocomplete="off">
                              </div>
                              <div class="inp col-md-6" style="display:none;" id="sReason">
                                <?php if(!empty($res) && $res->level == 'Secondary'){ ?>
                                  <label>Reason for Dropping</label><br>
                                  <?php if($res->finProb == 1){ ?>
                                      <input type="checkbox" value="1" name="sFinProb" class="form-check-input" checked> Financial Problems |
                                  <?php }else{ ?>
                                      <input type="checkbox" value="1" name="sFinProb" class="form-check-input"> Financial Problems |
                                  <?php } ?>

                                  <?php if($res->nInterest == 1){ ?>
                                      <input type="checkbox" value="1" name="sNInterest" class="form-check-input" checked> Not Interested |
                                  <?php }else{ ?>
                                      <input type="checkbox" value="1" name="sNInterest" class="form-check-input"> Not Interested |
                                  <?php } ?>
                                 
                                  <?php if($res->famProb == 1){ ?>
                                      <input type="checkbox" value="1" name="sFamProb" class="form-check-input" checked> Family Problem |
                                  <?php }else{ ?>
                                      <input type="checkbox" value="1" name="sFamProb" class="form-check-input"> Family Problem |
                                  <?php } ?>
                                  
                                  <?php if($res->ePreg == 1){ ?>
                                      <input type="checkbox" value="1" name="sEPreg" class="form-check-input" checked> Early Pregnancy |
                                  <?php }else{ ?>
                                      <input type="checkbox" value="1" name="sEPreg" class="form-check-input"> Early Pregnancy |
                                  <?php } ?>
                                  
                                  <?php if($res->hProb == 1){ ?>
                                      <input type="checkbox" value="1" name="sHProb" class="form-check-input" checked> Health Problems
                                  <?php }else{ ?>
                                      <input type="checkbox" value="1" name="sHProb" class="form-check-input"> Health Problems
                                  <?php } ?>
                                <?php }else{ ?>
                                  <label>Reason for Dropping</label><br>
                                  <input type="checkbox" value="1" name="sFinProb" class="form-check-input"> Financial Problems |
                                  <input type="checkbox" value="1" name="sNInterest" class="form-check-input"> Not Interested |
                                  <input type="checkbox" value="1" name="sFamProb" class="form-check-input"> Family Problem |
                                  <input type="checkbox" value="1" name="sEPreg" class="form-check-input"> Early Pregnancy |
                                  <input type="checkbox" value="1" name="sHProb" class="form-check-input"> Health Problems
                                <?php } ?>
                              </div>
                            </div>

                            <h5><strong>C O L L E G E &nbsp; L E V E L</strong></h5>
                            <div class="row form-group">
                              <div class="col-md-3">
                                <label>School Name</label>
                                  <input type="text" name="cName" class="form-control" value="<?= $row->cName; ?>" placeholder="Enter School Name" maxlength="50">
                              </div>
                              <div class="col-md-4">
                                <label>School Address</label>
                                  <input type="text" name="cAddr" class="form-control" value="<?= $row->cAddr; ?>" placeholder="Enter School Address" maxlength="50">
                              </div>
                              <div class="col-md-2">
                                <label>Year Level</label>
                                <select name="cLevel" class="form-control">
                                  <option value="<?= $row->cLevel; ?>"><?= $row->cLevel; ?></option>
                                  <option value=""></option>
                                  <option value="1st Year">1st Year</option>
                                  <option value="2nd Year">2nd Year</option>
                                  <option value="3rd Year">3rd Year</option>
                                  <option value="4th Year">4th Year</option>
                                  <option value="5th Year">5th Year</option>
                                </select>
                              </div>
                              <div class="col-md-3">
                                <label>Educational Status</label>
                                <select id="cStat" name="cStat" class="form-control">
                                  <option value="<?= $row->cStat; ?>"><?= $row->cStat; ?></option>
                                  <option value=""></option>
                                  <option value="In School">In School</option>
                                  <option value="Out of School">Out of School</option>
                                  <option value="Graduated">Graduated</option>
                                </select>
                              </div>        
                            </div>
                            <div class="row form-group">
                              <div class="col-md-6">
                                <label>Degree/Course</label>
                                  <input type="text" name="cDegree" class="form-control" value="<?= $row->cDegree; ?>" placeholder="Enter degree/course" maxlength="60">
                              </div>
                              <div class="col-md-3">
                                <label>From <span class="text-success">(Optional)</span></label>
                                <input type="text" id="cFrom" name="cFrom" value="<?= $row->cFrom; ?>" class="form-control" placeholder="Select Date" autocomplete="off">
                              </div>
                              <div class="col-md-3">
                                <label>To <span class="text-success">(Optional)</span></label>
                                <input type="text" id="cTo" name="cTo" class="form-control" value="<?= $row->cTo; ?>" placeholder="Select Date" autocomplete="off">
                              </div>
                            </div>
                            <div class="row form-group" style="margin-left:2px; display:none;"  id="cReason">
                              <?php if(!empty($res) && $res->level == 'College'){ ?>
                                <label>Reason for Dropping</label><br>
                                <?php if($res->finProb == 1){ ?>
                                    <input type="checkbox" value="1" name="cFinProb" class="form-check-input" checked> Financial Problems |
                                <?php }else{ ?>
                                   <input type="checkbox" value="1" name="cFinProb" class="form-check-input"> Financial Problems |
                                <?php } ?>

                                <?php if($res->nInterest == 1){ ?>
                                    <input type="checkbox" value="1" name="cNInterest" class="form-check-input" checked> Not Interested |
                                <?php }else{ ?>
                                    <input type="checkbox" value="1" name="cNInterest" class="form-check-input"> Not Interested |
                                <?php } ?>
                               
                                <?php if($res->famProb == 1){ ?>
                                    <input type="checkbox" value="1" name="cFamProb" class="form-check-input" checked> Family Problem |
                                <?php }else{ ?>
                                    <input type="checkbox" value="1" name="cFamProb" class="form-check-input"> Family Problem |
                                <?php } ?>
                                
                                <?php if($res->ePreg == 1){ ?>
                                    <input type="checkbox" value="1" name="cEPreg" class="form-check-input" checked> Early Pregnancy |
                                <?php }else{ ?>
                                    <input type="checkbox" value="1" name="cEPreg" class="form-check-input"> Early Pregnancy |
                                <?php } ?>
                                
                                <?php if($res->hProb == 1){ ?>
                                    <input type="checkbox" value="1" name="cHProb" class="form-check-input" checked> Health Problems
                                <?php }else{ ?>
                                    <input type="checkbox" value="1" name="cHProb" class="form-check-input"> Health Problems
                                <?php } ?>
                              <?php }else{ ?>
                                  <label>Reason for Dropping</label><br>
                                  <input type="checkbox" value="1" name="cFinProb" class="form-check-input"> Financial Problems |
                                  <input type="checkbox" value="1" name="cNInterest" class="form-check-input"> Not Interested |
                                  <input type="checkbox" value="1" name="cFamProb" class="form-check-input"> Family Problem |
                                  <input type="checkbox" value="1" name="cEPreg" class="form-check-input"> Early Pregnancy |
                                  <input type="checkbox" value="1" name="cHProb" class="form-check-input"> Health Problems
                              <?php } ?>
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


