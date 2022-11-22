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
                <li style="margin-top:12px;margin-right:5px;"><span class="ti-help-alt" style="color:#fff!important;font-size:1.3em!important ;"><a href="<?= base_url(); ?>admin/help" style="color:#fff;"> Help</a></span></li>
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
                        <a href="<?= base_url(); ?>admin">Home <span class="ti-home pull-right"></span></a>
                    </li>
                    <li>
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
        </nav>
        <div id="page-wrapper">
            <?php include 'alerts.php'; ?>
            <div class="container-fluid">
                <h3><label>Settings</label></h3><hr>            
                <div class="row well" style="background-color:#3CC47C;border-radius:0px;">
                    <div class="col-lg-12">
                        <a class="lead text-primary" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" title="Click to expand" style="color:#f4f4f4;text-decoration:underline;">Account Settings</a>
                        <div class="collapse" id="collapseExample">
                            <div style="margin-top:20px;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h3 class="panel-title">Change Account Info</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form id="changeAccount" method="POST" action="<?= base_url(); ?>admin/account_settings/info/<?= $this->session->userdata('id') ;?>" enctype="multipart/form-data">
                                                    <div class="inp form-group">
                                                        <label>Profile Picture</label>
                                                        <input type="file" name="userfile" class="dropify" data-height="170" data-max-file-size="3M" data-default-file="<?= base_url(); ?>users/thumbs/<?= $usr->photo; ?>" accept="image/*">
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>Name</label>
                                                        <input type="text" name="n_name" class="form-control" value="<?= $usr->name ?>" required/>
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>Position</label>
                                                        <input type="text" name="n_position" class="form-control" value="<?= $usr->position ?>" required/>
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>Email</label>
                                                        <input type="email" name="n_email" class="form-control" value="<?= $usr->email ?>" required/>
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>Phone number</label>
                                                        <input type="number" name="n_phone" class="form-control" value="<?= $usr->phone ?>" required>
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>Username</label>
                                                        <input type="text" name="n_uname" class="form-control"  value="<?= $usr->uname ?>" maxlength="15" required/>
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>Enter password to continue</label>
                                                        <input type="password" name="password" class="form-control" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Change</button>
                                                </form>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h3 class="panel-title">Change Account Password</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form id="changePass" method="POST" action="<?= base_url(); ?>admin/account_settings/password/<?= $this->session->userdata('id') ;?>">
                                                    <div class="inp form-group">
                                                        <label>Current password</label>
                                                        <input type="password" name="cpass" id="cpass" class="form-control" required>
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>New password</label>
                                                        <input type="password" name="pass1" id="pass1" class="form-control" minlength="6" required>
                                                    </div>
                                                    <input type="checkbox" onclick="showPwords()"> <label>Show Passwords</label><br>
                                                    <div class="inp form-group">
                                                        <label>Confirm new password</label>
                                                        <input type="password" name="pass2" class="form-control" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-success">Change</button>
                                                </form> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div> 
                    </div>                             
                </div>
                <div class="row well" style="background-color:#3CC47C;border-radius:0px;">
                    <div class="col-lg-12">
                        <a class="lead text-primary" data-toggle="collapse" href="#signatories" aria-expanded="false" aria-controls="collapseExample" title="click to expand" style="color:#f4f4f4;text-decoration:underline;">Signatories Settings</a>
                        <div class="collapse" id="signatories">
                            <div style="margin-top:20px;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h3 class="panel-title">Signatory 1</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form id="sig1" method="POST" action="<?= base_url(); ?>admin/settings/signatory1/<?= $this->session->userdata('id') ;?>">
                                                    <div class="inp form-group">
                                                        <?php if(!empty($sign1->name)){ ?>
                                                            <label>Name</label>
                                                            <input type="text" name="name" class="form-control" value="<?= $sign1->name ?>" required/>
                                                        <?php }else{ ?>
                                                            <label>Name</label>
                                                            <input type="text" name="name" class="form-control" required/>
                                                        <?php } ?>
                                                        <?php if(!empty($sign1->position)){ ?>
                                                            <br>
                                                            <label>Position</label>
                                                            <input type="text" name="position" class="form-control" value="<?= $sign1->position ?>" required/>
                                                        <?php }else{ ?>
                                                            <br>
                                                            <label>Position</label>
                                                            <input type="text" name="position" class="form-control" required/>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>Enter password to continue</label>
                                                        <input type="password" name="password" class="form-control" required>
                                                    </div>
                                                    <?php if(!empty($sign1->name)){ ?>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    <?php }else{ ?>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    <?php } ?>
                                                </form>    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h3 class="panel-title">Signatory 2</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form id="sig2" method="POST" action="<?= base_url(); ?>admin/settings/signatory2/<?= $this->session->userdata('id') ;?>">
                                                    <div class="inp form-group">
                                                        <?php if(!empty($sign2->name)){ ?>
                                                            <label>Name</label>
                                                            <input type="text" name="name" class="form-control" value="<?= $sign2->name ?>" required/>
                                                        <?php }else{ ?>
                                                            <label>Name</label>
                                                            <input type="text" name="name" class="form-control" required/>
                                                        <?php } ?>
                                                        <?php if(!empty($sign2->position)){ ?>
                                                            <br>
                                                            <label>Position</label>
                                                            <input type="text" name="position" class="form-control" value="<?= $sign2->position ?>" required/>
                                                        <?php }else{ ?>
                                                            <br>
                                                            <label>Position</label>
                                                            <input type="text" name="position" class="form-control" required/>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>Enter password to continue</label>
                                                        <input type="password" name="password" class="form-control" required>
                                                    </div>
                                                    <?php if(!empty($sign2->name)){ ?>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    <?php }else{ ?>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    <?php } ?>
                                                </form>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>      
                    </div>
                </div>
                <div class="row well" style="background-color:#3CC47C;border-radius:0px;">
                    <div class="col-lg-12">
                        <a class="lead text-primary" data-toggle="collapse" href="#contacts" aria-expanded="false" aria-controls="collapseExample" title="click to expand" style="color:#f4f4f4;text-decoration:underline;">Site Contacts</a>
                        <div class="collapse" id="contacts">
                            <div style="margin-top:20px;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                              <h3 class="panel-title">Contacts</h3>
                                            </div>
                                            <div class="panel-body">
                                                <form id="sContacts" method="POST" action="<?= base_url(); ?>admin/settings/site_contacts/<?= $this->session->userdata('id') ;?>">
                                                    <div class="inp form-group">
                                                        <label>Tel. No.</label>
                                                        <?php if(!empty($cont->telNo)){ ?>
                                                            <input type="text" name="telNo" class="form-control" value="<?= $cont->telNo ?>" required/>
                                                        <?php }else{ ?>
                                                            <input type="text" name="telNo" class="form-control" required/>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>Email</label>
                                                        <?php if(!empty($cont->email)){ ?>
                                                            <input type="email" name="conEmail" class="form-control" value="<?= $cont->email ?>" required/>
                                                        <?php }else{ ?>
                                                            <input type="email" name="conEmail" class="form-control" required/>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="inp form-group">
                                                        <label>Enter password to continue</label>
                                                        <input type="password" name="password" class="form-control" required>
                                                    </div>
                                                    <?php if(!empty($cont->telNo) || !empty($cont->email)){ ?>
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                    <?php }else{ ?>
                                                        <button type="submit" class="btn btn-success">Save</button>
                                                    <?php } ?>
                                                </form>    
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>      
                    </div>
                </div>
            </div> <!-- End of container -->
        </div>
    </div>

