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
          <li role="presentation" class="active"><a href="">Add</a></li>
        </ul>
        <div class="row">
          <div class="col-lg-12"><br>
            <?php include 'alerts.php'; ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Work Experience</h3>
                        </div>
                        <div class="panel-body">
                          <form id="work" method="POST" action="<?= base_url(); ?>lgu/members/view/work_experience/add/save/<?= $id; ?>">
                            <a id="addWork" class="btn btn-primary btn-xs" style="margin-left:8px;"><span class="ti-plus" data-toggle="tooltip" title="Click to add more fields"></span></a>
                            <table id="work" class="table">
                              <tr>
                                <td style="border:none;" class="inp">
                                  <label>Month & Year</label>
                                  <input type="text" id="workDate" name="workDate[]" class="form-control"placeholder="Select Date" autocomplete="off" required>
                                </td>
                                <td style="border:none;" class="inp">
                                  <label>Job Title</label>
                                  <input type="text" name="jobTitle[]" class="form-control" placeholder="Enter Job Title" maxlength="40" required>
                                </td>
                                <td style="border:none;" class="inp">
                                  <label>Monthly Income</label>
                                  <input type="number" name="monIncome[]" class="form-control" placeholder="Enter Monthly Income" maxlength="5" required>
                                </td>
                                <td style="border:none;" class="inp">
                                  <label>Reason for Leaving</label>
                                  <input type="text" name="reLeave[]" class="form-control" placeholder="Enter Reason" maxlength="40" required>
                                </td>
                              </tr>
                            </table> 
                            <button type="submit" class="btn btn-success" style="margin-left: 10px;">Save</button>&nbsp;
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


