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
                    <a href="<?= base_url(); ?>admin">Dashboard <span class="ti-home pull-right"></span></a>
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
                <li role="presentation"><a href="<?= base_url(); ?>admin/accounts">Accounts</a></li>
                <li role="presentation"  class="active"><a href="">Edit</a></li>
              </ul><br><br>       
              <div class="row">
                <div class="col-md-12">
                  <?php include 'alerts.php'; ?>
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Edit Account</h3>
                            </div>
                            <div class="panel-body">
                                <form id="acForm" method="POST" action="<?= base_url(); ?>admin/accounts/edit/update/<?= $row->id; ?>" enctype="multipart/form-data">
                                  <div class="row form-group">
                                    <div class="inp col-md-4">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" maxlength="75" value="<?= $row->name; ?>" placeholder="Enter Full Name" required/>
                                    </div>
                                    <div class="inp col-md-3">
                                        <label>Position</label>
                                        <input type="text" name="position" class="form-control" maxlength="30" value="<?= $row->position; ?>" placeholder="Position" required/>
                                    </div>
                                    <div class="inp col-md-2">
                                        <label>Role</label>
                                        <select name="role" class="form-control" required>
                                            <option vaue="<?= $row->role; ?>"><?= $row->role; ?></option>
                                            <option value=""></option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="LGU User">LGU User</option>
                                        </select>
                                    </div>
                                    <div class="inp col-md-3">
                                        <label>Municipality</label>
                                        <select name="municipal" class="form-control" required>
                                            <option value="<?= $row->municipal; ?>"><?= $row->municipal; ?></option>
                                            <option value=""></option>
                                            <option value="Alburquerque">Alburquerque</option>
                                            <option value="Alicia">Alicia</option>
                                            <option value="Anda">Anda</option>
                                            <option value="Antequera">Antequera</option>
                                            <option value="Baclayon">Baclayon</option>
                                            <option value="Balilihan">Balilihan</option>
                                            <option value="Batuan">Batuan</option>
                                            <option value="Bien Unido">Bien Unido</option>
                                            <option value="Bilar">Bilar</option>
                                            <option value="Buenavista">Buenavista</option>
                                            <option value="Calape">Calape</option>
                                            <option value="Candijay">Candijay</option>
                                            <option value="Carmen">Carmen</option>
                                            <option value="Catigbian">Catigbian</option>
                                            <option value="Clarin">Clarin</option>
                                            <option value="Corella">Corella</option>
                                            <option value="Cortes">Cortes</option>
                                            <option value="Dagohoy">Dagohoy</option>
                                            <option value="Danao">Danao</option>
                                            <option value="Dauis">Dauis</option>
                                            <option value="Dimiao">Dimiao</option>
                                            <option value="Duero">Duero</option>
                                            <option value="Garcia Hernandez">Garcia Hernandez</option>
                                            <option value="Getafe">Getafe</option>
                                            <option value="Guindulman">Guindulman</option>
                                            <option value="Inabanga">Inabanga</option>
                                            <option value="Jagna">Jagna</option>
                                            <option value="Lila">Lila</option>
                                            <option value="Loay">Loay</option>
                                            <option value="Loboc">Loboc</option>
                                            <option value="Loon">Loon</option>
                                            <option value="Mabini">Mabini</option>
                                            <option value="Maribojoc">Maribojoc</option>
                                            <option value="Panglao">Panglao</option>
                                            <option value="Pilar">Pilar</option>
                                            <option value="Pres. Carlos P. Garcia">Pres. Carlos P. Garcia</option>
                                            <option value="Sagbayan">Sagbayan</option>
                                            <option value="San Isidro">San Isidro</option>
                                            <option value="San Miguel">San Miguel</option>
                                            <option value="Sevilla">Sevilla</option>
                                            <option value="Sierra Bullones">Sierra Bullones</option>
                                            <option value="Sikatuna">Sikatuna</option>
                                            <option value="Tagbilaran">Tagbilaran</option>
                                            <option value="Talibon">Talibon</option>
                                            <option value="Trinidad">Trinidad</option>
                                            <option value="Tubigon">Tubigon</option>
                                            <option value="Ubay">Ubay</option>
                                            <option value="Valencia">Valencia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="inp col-md-4">
                                        <label>Phone Number</label>
                                        <input type="number" name="phone" class="form-control" minlength="11" maxlength="11" value="<?= $row->phone; ?>" placeholder="Enter Phone Number" required/>
                                    </div>
                                    <div class="inp col-md-4">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" maxlength="30" value="<?= $row->email; ?>" placeholder="Enter Email Address" required/>
                                    </div>
                                    <div class="inp col-md-4">
                                        <label>User Name</label>
                                        <input type="text" name="uname" class="form-control" maxlength="15" value="<?= $row->uname; ?>" placeholder="Enter Username" required/>
                                    </div>
                                </div>    
                                <div class="row form-group">
                                    <div class="inp col-md-4">
                                        <label>Profile Picture <span style="color:green;">(Optional)</span></label>
                                        <input type="file" name="userfile" class="dropify" data-height="150" data-max-file-size="3M" data-default-file="<?= base_url();?>users/thumbs/<?= $row->photo; ?>" accept="image/*">
                                    </div>
                                    <div class="inp col-md-4">
                                        <label>Password</label>
                                        <input type="password" id="pword1" name="pword1" class="form-control" minlength="6" placeholder="Enter your password to continue" required>
                                        <input type="checkbox" onclick="showPword()"> <label>Show Password</label>
                                    </div>
                                </div>   
                                <div class="row">
                                    <div class="col-md-12">
                                      <button type="submit" class="btn btn-success"> Update</button>&nbsp;
                                      <a href="<?= base_url(); ?>admin/accounts" class="btn btn-danger"> Cancel</a>
                                    </div>
                                </div>                            
                              </form>
                            </div>
                        </div>
                    </div>
                  </div>
                </div><!-- END OF COLUMN -->
              </div><!-- END OF ROW -->
          </div><!-- END OF CONTAINER-FLUID -->
      </div><!-- END OF PAGE-WRAPPER -->
  </div>
