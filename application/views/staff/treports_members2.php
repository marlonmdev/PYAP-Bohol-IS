          <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background:#00C292!important;border-bottom:none;">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url(); ?>lgu"><img src="<?= base_url('resources/images/pyapbohol.png'); ?>" height="35" width="180" style="margin-top:-7px;"></a>
                </div>
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
                        <li>
                            <a href="<?= base_url(); ?>lgu/members">Members <span class="ti-user pull-right"></span></i></a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>lgu/activities">Activities <span class="ti-clipboard pull-right"></span></a>
                        </li>
                        <li class="active">
                            <a href="<?= base_url(); ?>lgu/tabular_reports">Tabular Reports <span class="ti-layout pull-right"></span></a>
                        </li>
                        <li>
                            <a href="<?= base_url(); ?>lgu/graphical_reports">Graphical Reports <span class="ti-bar-chart pull-right"></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <ul class="nav nav-tabs">
                        <li role="presentation" class="active"><a href="<?= base_url(); ?>lgu/tabular_reports">Summary</a></li>
                        <li role="presentation"><a href="<?= base_url(); ?>lgu/tabular_reports/skills">Skills</a></li>
                        <li role="presentation"><a href="<?= base_url(); ?>lgu/tabular_reports/reason_for_dropping">Reason for Dropping</a></li>
                        <li role="presentation"><a href="<?= base_url(); ?>lgu/tabular_reports/interest_hobbies">Interest/Hobbies</a></li>
                    </ul><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12">
                                    <a onclick="printlayer('data')" class="btn btn-warning" title="Click to print report"><span class="ti-printer"></span> Print Report</a>&nbsp;
                                    <a href="<?= base_url() ?>lgu/tabular_reports" class="btn btn-info">Go Back</a>
                                </div>
                            </div><br><!-- End of Row -->
                        <div class="table-responsive" id="data">
                            <center><h4>PAG-ASA YOUTH ASSOCIATION OF THE PHILIPPINES - BOHOL CHAPTER</h4></center>
                            <center><h4>Barangay  <?= $brgy ?>, <?= $this->session->userdata('municipal'); ?>, Bohol</h4></center>
                            <?php 
                                if($repType == 'Annual'){
                                    echo "<center><h4>Annual List of Members Report, CY ".$fYear."</h4></center>";
                                }else{
                                    if($fQuarter == '1st'){
                                        $quarter = '1<sup>st</sup>';
                                    }elseif($fQuarter == '2nd'){
                                        $quarter = '2<sup>nd</sup>';
                                    }elseif($fQuarter == '3rd'){
                                        $quarter = '3<sup>rd</sup>';
                                    }else{
                                        $quarter = '4<sup>th</sup>';
                                    }
                                    echo "<center><h4>".$quarter." Quarter List of Members Report, CY ".$fYear."</h4></center>";
                                }
                            ?>
                            <table id="tbExport" class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Photo</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Age</th>
                                        <th class="text-center">Sex</th>
                                        <th class="text-center">Civil Status</th>
                                        <th class="text-center">Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(empty($content)){   
                                        echo '<td colspan="5"><strong><h3 class="text-center">No Members Found.</h3></strong></td>'; 
                                    }elseif(!empty($content)){
                                        foreach($content as $row){
                                    ?>
                                    <tr id="tdata">
                                        <td><img src="<?= base_url(); ?>members/thumbs/<?= $row->photo; ?>" class="img-responsive" height="30" width="30" style="margin:0 auto;"></td>
                                        <td><span style="float:left;padding-left:20px;"><?php echo $row->fName;?> <?php echo $row->mName;?> <?php echo $row->lName;?> <?php echo $row->ext;?></span></td>
                                        <td class="text-center"><?php echo $row->age;?></td>
                                        <td class="text-center"><?php echo $row->sex;?></td>
                                        <td class="text-center"><?php echo $row->civilStat;?></td>
                                        <td class="text-center"><?php echo $row->brgy;?>, <?php echo $row->mun;?>, <?php echo $row->prov;?></td>
                                    </tr>
                                     <?php   
                                        }
                                        }
                                    ?>       
                                </tbody>
                            </table><br>
                            <div id="sigDiv1" style="float:left;margin-left:50px;">
                                <div style="float:left">
                                    <p style="font-size:1.2em;">Prepared By: </p>
                                </div>
                                <div style="float:right;margin-left:7px;">
                                    <p style="text-align:center;font-size:1.2em;"><?= $this->session->userdata('name') ?></p>
                                    <p style="text-align:center;"><?= $this->session->userdata('position') ?></p>
                                </div>
                            </div>
                        </div><!-- END OF TABLE-RESPONSIVE DIV -->
                    </div>             
                </div><!-- End of Div Container Fluid -->
            </div><!-- End of Page Wrapper -->
        </div>