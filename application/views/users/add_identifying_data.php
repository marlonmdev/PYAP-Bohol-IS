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
            <?php include('alerts.php'); ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="progresscontainer">
                      <ul class="progressbar">
                        <li class="active">Step 1</li>
                        <li>Step 2</li>
                        <li>Step 3</li>
                        <li>Step 4</li>
                        <li>Step 5</li>
                        <li>Step 6</li>
                        <li>Step 7</li>
                      </ul>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">I. Identifying Data</h3>
                        </div>
                        <div class="panel-body">
                          <form id="id_data" method="post" action="<?= base_url(); ?>lgu/members/add/identifying_data/save" enctype="multipart/form-data">
                            <div class="row form-group">
                              <div class="col-md-7"><div class="well" style="height:155px;border-radius:0px;background-color:#249E60;"><h2 class="text-center" style="color:#f4f4f4;margin-top:45px;">Youth's Information</h2></div></div>
                              <div class="col-md-2"><label style="margin-top:50%;">Photo <span style="color:#2FA341;">(Optional)</span></label></div>
                              <div class="inp col-md-3">
                                <input type="file" name="userfile" class="dropify" data-height="150" data-max-file-size="3M" accept="image/*">
                              </div>
                            </div>
                            <div class="row form-group">
                              <div class="inp col-md-3">
                                <label>First Name</label>
                                <input type="text" name="fName" class="form-control" placeholder="Enter First Name" maxlength="30" required>
                              </div>
                              <div class="inp col-md-3">
                                <label>Middle Name</label>
                                <input type="text" name="mName" class="form-control" placeholder="Enter Middle Name" maxlength="30" required>
                              </div>
                              <div class="inp col-md-3">
                                <label>Last Name</label>
                                <input type="text" name="lName" class="form-control" placeholder="Enter Last Name" maxlength="30" required>
                              </div>
                              <div class="inp col-md-3">
                                <label>Ext. (Sr./Jr.)</label>
                                <select name="ext" id="ext" class="form-control"/>
                                  <option value=""></option>
                                  <option value="Jr.">Jr.</option>
                                  <option value="Sr.">Sr.</option>
                                </select>
                              </div>
                            </div>  

                            <div class="row form-group">
                              <div class="inp col-md-3">
                                <label>Sex</label>
                                <select name="sex" class="form-control" required/>
                                  <option value=""></option>
                                  <option value="Male">Male</option>
                                  <option value="Female">Female</option>
                                </select>
                              </div>
                              <div class="inp col-md-3">
                                <label>Date of Birth</label>
                                <input type="text" id="dob" name="dBirth" class="form-control" placeholder="Select Date" autocomplete="off" required/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Age</label>
                                <input type="number" id="age" name="age" class="form-control" minlength="2" placeholder="Age" required/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Civil Status</label>
                                <select name="civilStat" id="civilStat" class="form-control" required/>
                                  <option value=""></option>
                                  <option value="Single">Single</option>
                                  <option value="Married">Married</option>
                                  <option value="Solo Parent">Solo Parent</option>
                                </select>
                              </div>
                            </div>

                            <h5><strong>A D D R E S S</strong></h5>
                            <div class="row form-group">
                              <div class="inp col-md-3">
                                <label>Barangay</label>
                                <select name="brgy" id="brgy" class="form-control" required/>
                                  <option value="">Select barangay..</option>
                                  <?php 
                                    $municipal = $this->session->userdata('municipal');
                                    include('options/'.$municipal.'.php'); 
                                  ?>
                                </select>
                              </div>
                              <div class="inp col-md-3">
                                <label>City/Municipality </label>
                                <input type="text" id="mun" class="form-control" value="<?= $this->session->userdata('municipal')?>" name="mun" readonly/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Province</label>
                                <input type="text" id="prov" class="form-control" value="Bohol" name="prov" readonly/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Region</label>
                                <input type="text" id="region" class="form-control" value="VII" name="region" readonly/>
                              </div> 
                            </div>

                            <h5><strong>P L A C E &nbsp; O F &nbsp; B I R T H</strong></h5>
                            <input type="checkbox" id="sameB" name="sameB" class="form-check-input" style="left:50px;"><span style="margin-left:15px;">Same as Address</span>
                            <div class="row form-group">
                              <div class="inp col-md-3">
                                <label>Barangay</label>
                                <input type="text" id="bbrgy" name="bBrgy" class="form-control" placeholder="Enter Barangay" maxlength="30" required/>
                              </div>
                              <div class="inp col-md-3">
                                <label>City/Municipality</label>
                                <input type="text" id="bmun" name="bMun" class="form-control" placeholder="Enter City/Municipality" maxlength="30" required/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Province</label>
                                <input type="text" id="bprov" name="bProv" class="form-control" placeholder="Enter Province" maxlength="30" required/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Region</label>
                                <select id="bregion" name="bRegion" class="form-control" required/> 
                                  <option value=""></option>
                                  <option value="CAR">CAR</option>
                                  <option value="I">I</option>
                                  <option value="II">II</option>
                                  <option value="III">III</option>
                                  <option value="NCR">NCR</option>
                                  <option value="IV-A">IV-A</option>
                                  <option value="IV-B">IV-B</option>
                                  <option value="V">V</option>
                                  <option value="VI">VI</option>
                                  <option value="VII">VII</option>
                                  <option value="VIII">VIII</option>
                                  <option value="IX">IX</option>
                                  <option value="X">X</option>
                                  <option value="XI">XI</option>
                                  <option value="XII">XII</option>
                                  <option value="XIII">XIII</option>
                                  <option value="ARMM">ARMM</option>
                                </select>
                              </div> 
                            </div>

                            <div class="row form-group">
                              <div class="inp col-md-4">
                                <label>Religion</label>
                                <input type="text" name="religion" class="form-control" placeholder="Enter Religion" maxlength="40"/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Cellphone No.</label>
                                <input type="text" name="celNo" class="form-control" placeholder="Enter Cellphone No." minlength="11" maxlength="11" required/>
                              </div>
                              <div class="inp col-md-5">
                                <label>Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter Email Address" maxlength="30"/>
                              </div>
                            </div>

                            <h5><strong>F A T H E R' S &nbsp; I N F O R M A T I O N</strong></h5>
                            <div class="row form-group">
                              <div class="inp col-md-4">
                                <label>Name of Father</label>
                                <input type="text" name="fathName" class="form-control" placeholder="Enter Father's Name" maxlength="60"/>
                              </div>
                              <div class="inp col-md-2">
                                <label>Age</label>
                                <input type="number" name="fathAge" class="form-control" placeholder="Enter Age" minlength="2" maxlength="3"/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Occupation</label>
                                <input type="text" name="fathOccup" class="form-control" placeholder="Enter Occupation" maxlength="30"/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Monthly Income</label>
                                <input type="text" name="fathIncome" class="form-control" placeholder="Enter Monthly Income"/>
                              </div>
                            </div>

                            <h5><strong>M O T H E R' S &nbsp; I N F O R M A T I O N</strong></h5>
                            <div class="row form-group">
                              <div class="inp col-md-4">
                                <label>Name of Mother</label>
                                <input type="text" name="mothName" class="form-control" placeholder="Enter Mother's Name" maxlength="60"/>
                              </div>
                              <div class="inp col-md-2">
                                <label>Age</label>
                                <input type="number" name="mothAge" class="form-control" placeholder="Enter Age" minlength="2" maxlength="3"/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Occupation</label>
                                <input type="text" name="mothOccup" class="form-control" placeholder="Enter Occupation" maxlength="30"/>
                              </div>
                              <div class="inp col-md-3">
                                <label>Monthly Income</label>
                                <input type="text" name="mothIncome" class="form-control" placeholder="Enter Monthly Income"/>
                              </div>
                            </div>
                              <a onclick="GoBack()" class="btn btn-danger"> Cancel</a>&nbsp; 
                              <button type="submit" class="btn btn-primary">Next <span class="ti-arrow-right"></span></button>
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


