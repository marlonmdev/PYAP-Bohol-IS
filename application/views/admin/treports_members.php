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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?=base_url(); ?>users/thumbs/<?= $row->photo; ?>" alt="user account" height="30" width="30" style="margin-top:-7px;border-radius:50%;"><span> &nbsp;<?= $row->name; ?></span> <b class="caret"></b></a>
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
                    <li class="active">
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
                    <li role="presentation" class="active"><a href="<?= base_url(); ?>admin/tabular_reports">Summary</a></li>
                    <li role="presentation"><a href="<?= base_url(); ?>admin/tabular_reports/skills_report">Skills</a></li>
                    <li role="presentation"><a href="<?= base_url(); ?>admin/tabular_reports/reason_for_dropping_report">Reason for Dropping</a></li>
                    <li role="presentation"><a href="<?= base_url(); ?>admin/tabular_reports/interest_hobbies_report">Interest/Hobbies</a></li>
                </ul><br>
   
                    <div class="col-lg-12">
                        <div>
                            <a onclick="printlayer('data')" class="btn btn-warning" title="Click to print report"><span class="ti-printer"></span> Print Report</a>&nbsp;
                            <a onclick="GoBack()" class="btn btn-info">Go Back</a>
                        </div>
                        <div class="table-responsive" id="data">
                            <center><h4>PROVINCIAL CONSOLIDATED REPORT ON PAG-ASA YOUTH ASSOCIATION</h4></center>
                            <center><h4>BOHOL PROVINCE</h4></center>
                            <center><h4>Barangay <?= $brgy->brgy; ?>, <?= $municipal; ?>, Bohol</h4></center>
                            <?php 
                                $yr = date('Y');
                                $month = date('F');
                                if($month == 'January' || $month == 'Febuary' || $month == 'March'){
                                    $quarter = '1<sup>st</sup>';
                                }elseif($month == 'April' || $month == 'May' || $month == 'June'){
                                    $quarter = '2<sup>nd</sup>';
                                }elseif($month == 'July' || $month == 'August' || $month == 'September'){
                                    $quarter = '3<sup>rd</sup>';
                                }else{
                                    $quarter = '4<sup>th</sup>';
                                }
                                echo "<center><h4>".$quarter." Quarter List of Members, CY ".$yr."</h4></center>"
                            ?>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-left">Photo</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-left">Age</th>
                                        <th class="text-left">Sex</th>
                                        <th class="text-left">Civil Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(empty($content)){   
                                        echo '<td colspan="4"><strong><h3 class="text-center">No Members Found.</h3></strong></td>'; 
                                    }elseif(!empty($content)){
                                        foreach($content as $row){
                                    ?>
                                    <tr>
                                        <td><img src="<?= base_url(); ?>members/thumbs/<?= $row->photo; ?>" class="img-responsive" height="30" width="30" style="margin:0 auto;"></td>
                                        <td><span style="float:left;padding-left:20px;"><?php echo $row->fName;?> <?php echo $row->mName;?> <?php echo $row->lName;?> <?php echo $row->ext;?></span></td>
                                        <td class="text-center"><?php echo $row->age;?></td>
                                        <td class="text-center"><?php echo $row->sex;?></td>
                                        <td class="text-center"><?php echo $row->civilStat;?></td>
                                    </tr>
                                     <?php   
                                        }
                                        }
                                    ?>       
                                </tbody>
                            </table><br>
                            <div style="float:left;margin-left:50px;">
                                <div style="float:left">
                                    <p>Prepared By: </p>
                                </div>
                                <div style="float:right;margin-left:7px;">
                                    <p style="text-align:center;"><?= $this->session->userdata('name') ?></p>
                                    <p style="text-align:center;font-size:.9em;"><?= $this->session->userdata('position') ?></p>
                                </div>
                            </div>
                            <div style="float:right;margin-right:50px;">
                                <div style="float:left">
                                    <p>Noted By: </p>
                                </div>
                                <div style="float:right;margin-left:7px;">
                                    <p style="text-align:center;"><?php if(!empty($sign1->name)){ echo $sign1->name; } ?></p>
                                    <p style="text-align:center;font-size:.9em;"><?php if(!empty($sign1->position)){ echo $sign1->position; } ?></p>
                                </div>  
                                <br><br> 
                                <div style="float:left;">
                                    <p>Approved By: </p>
                                </div>
                                <div style="float:right;margin-left:7px;" id="divAppr">
                                    <p style="text-align:center;"><?php if(!empty($sign2->name)){ echo $sign2->name; } ?></p>
                                    <p style="text-align:center;font-size:.9em;"><?php if(!empty($sign2->position)){ echo $sign2->position; } ?></p>
                                </div>                             
                            </div>
                        </div><!-- END OF TABLE-RESPONSIVE DIV --> 
                    </div>
                </div>   
            </div>
        </div>
    </div>
