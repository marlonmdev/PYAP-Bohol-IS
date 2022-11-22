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
              <li class="active" style="font-size: 1.2em;">Interest/Hobbies</li>
            </ol>  
            <?php include 'alerts.php'; ?>
            <div class="row">
              <div class="col-lg-12">
                  <h4><label><?php echo $info->fName.' '.$info->mName.' '.$info->lName.' '.$info->ext ?>'s Interest/Hobbies</label></h4>
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title">Update Interest/Hobbies</h3>
                      </div>
                      <div class="panel-body">
                         <form method="POST" action="<?= base_url(); ?>admin/members/add/interest_hobbies/update/<?= $id; ?>">
                            <div class="row form-group">
                              <div class="col-md-3"><input type="checkbox" value="1" name="internet" class="form-check-input"> Internet Surfing </div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="watch" class="form-check-input"> Watching TV </div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="sports" class="form-check-input"> Sports </div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="music" class="form-check-input"> Music </div>
                            </div>

                            <div class="row form-group">
                              <div class="col-md-3"><input type="checkbox" value="1" name="arts" class="form-check-input"> Arts </div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="singing" class="form-check-input"> Singing </div>

                              <div class="col-md-3"><input type="checkbox" value="1" name="dancing" class="form-check-input"> Dancing </div>
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


