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
                <li role="presentation" class="active"><a href="">Update</a></li>
              </ul><br><br>       
              <div class="row">
                <div class="col-md-6">
                  <?php include 'alerts.php'; ?>
                  <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Change Account Password</h3>
                            </div>
                            <div class="panel-body">
                              <form id="cPForm" method="POST" action="<?= base_url(); ?>admin/accounts/change_password/update/<?= $row->id; ?>">
                                <div class="inp row form-group">
                                  <div class="col-md-12">
                                    <label>New Password</label>
                                    <input type="password" name="pword1" id="pword1" class="form-control" placeholder="Enter New Password" required/>
                                    <input type="checkbox" onclick="showPword()"> <label>Show Password</label>
                                  </div>
                                </div>
                                <div class="inp row form-group">
                                  <div class="col-md-12">
                                    <label>Your Password</label>
                                    <input type="password" name="pword2" class="form-control" placeholder="Enter Your Password to Continue" required/>
                                  </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                      <button type="submit" class="btn btn-success">Update Password</button>&nbsp;
                                      <a href="<?= base_url(); ?>admin/accounts" class="btn btn-danger">Cancel</a>
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
