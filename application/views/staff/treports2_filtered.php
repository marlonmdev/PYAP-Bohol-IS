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
                      <li role="presentation"><a href="<?= base_url(); ?>lgu/tabular_reports">Summary</a></li>
                      <li role="presentation" class="active"><a href="<?= base_url(); ?>lgu/tabular_reports/skills">Skills</a></li>
                      <li role="presentation"><a href="<?= base_url(); ?>lgu/tabular_reports/reason_for_dropping">Reason for Dropping</a></li>
                      <li role="presentation"><a href="<?= base_url(); ?>lgu/tabular_reports/interest_hobbies">Interest/Hobbies</a></li>
                    </ul><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <form id="repForm" method="POST" action="<?= base_url(); ?>lgu/tabular_reports/skills/filter">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <select id="repType" name="repType" class="form-control"/>
                                                    <option value="">Report Type</option>
                                                    <option value="Quarter">Quarter</option>
                                                    <option value="Annual">Annual</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 inp" id="year" style="display:none;">
                                                <div class="col-md-8">
                                                    <select id="repYear" name="repYear" class="form-control"/>
                                                        <option value="">Select Year</option>
                                                        <?php 
                                                            $year = date('Y');
                                                            $endYear = 2017;
                                                            for($i = $year ; $i >= $endYear; $i--) {
                                                        ?>
                                                           
                                                                <option value="<?= $year; ?>"><?= $year; ?></option>
                                                                
                                                        <?php 
                                                                $year--;
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="submit" class="btn btn-info" name="submit" value="Go">
                                                </div>
                                            </div>
                                            <div class="col-md-3 inp" id="quarter" style="display:none;">
                                                <select id="repQuarter" name="repQuarter" class="form-control"/>
                                                    <option value="">Select Quarter</option>
                                                    <option value="1st">1st Quarter</option>
                                                    <option value="2nd">2nd Quarter</option>
                                                    <option value="3rd">3rd Quarter</option>
                                                    <option value="4th">4th Quarter</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 inp" id="Qyear" style="display:none;">
                                                <div class="col-md-8">
                                                    <select id="repQYear" name="repQYear" class="form-control"/>
                                                        <option value="">Select Year</option>
                                                        <?php 
                                                            $year = date('Y');
                                                            $endYear = 2017;
                                                            for($i = $year ; $i >= $endYear; $i--) {
                                                        ?>
                                                           
                                                                <option value="<?= $year; ?>"><?= $year; ?></option>
                                                                
                                                        <?php 
                                                                $year--;
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="submit" class="btn btn-info" name="submit" value="Go">
                                                </div>
                                            </div>
                                        </div>
                                    </form><!-- End of Form -->
                                </div>
                                <div class="col-md-2 pull-right">
                                    <a onclick="printlayer2('data')" class="btn btn-warning" title="Click to print report"><span class="ti-printer"></span> Print Report</a>
                                </div>    
                            </div><br><!-- End of Row -->
                        <div class="table-responsive" id="data">
                            <center><h4>PAG-ASA YOUTH ASSOCIATION OF THE PHILIPPINES - BOHOL CHAPTER</h4></center>
                            <center><h4>Municipalty of <?= $this->session->userdata('municipal'); ?></h4></center>
                            <?php 
                                if($repType == 'Quarter'){
                                    if($fQuarter == '1st'){
                                        $quarter = '1<sup>st</sup>';
                                    }elseif($fQuarter == '2nd'){
                                        $quarter = '2<sup>nd</sup>';
                                    }elseif($fQuarter == '3rd'){
                                        $quarter = '3<sup>rd</sup>';
                                    }else{
                                        $quarter = '4<sup>th</sup>';
                                    }
                                    echo "<center><h4>".$quarter." Quarter Skills Report, CY ".$fYear."</h4></center>";
                                }else{
                                    echo "<center><h4>Annual Skills Report, CY ".$fYear."</h4></center>";
                                }
                            ?>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="font-size:.9em;">BARANGAY</th>
                                        <th colspan="17" class="text-center" style="font-size:.9em;">SPECIAL SKILLS</th>
                                    </tr>
                                    <tr id="trHead">
                                        <th id="vHeader">None</th>
                                        <th id="vHeader">Agriculture/ Farming</th>
                                        <th id="vHeader">Technician/ Repair</th>
                                        <th id="vHeader">Construction</th>
                                        <th id="vHeader">Singing</th>
                                        <th id="vHeader">Dancing</th>
                                        <th id="vHeader">Carpentry</th>
                                        <th id="vHeader">Computer</th>
                                        <th id="vHeader">Drawing/ Painting</th>
                                        <th id="vHeader">Dressmaking/ Tailoring</th>
                                        <th id="vHeader">Sports</th>
                                        <th id="vHeader">Arts</th>
                                        <th id="vHeader">Playing Musical Instrument</th>
                                        <th id="vHeader">Business/ Entrepreneurship</th>
                                        <th id="vHeader">Swimming</th>
                                        <th id="vHeader">Writing</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(empty($content)){   
                                        echo '<td colspan="17"><strong><h3 class="text-center">No Data Found..</h3></strong></td>'; 
                                    }elseif(!empty($content)){
                                        foreach($content as $row){
                                    ?>
                                     <tr>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->brgy; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_none; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_agri; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_tech; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_construct; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_singing; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_dancing; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_carpentry; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_computer; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_drawing ; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_dress; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_sports; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_arts; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_music; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_business; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_swimming; ?></td>
                                        <td class="text-center" style="font-size:.9em;"><?= $row->lgu_writing; ?></td>
                                    </tr>
                                     <?php   
                                        }
                                        }
                                    ?>  
                                </tbody>
                            </table><br>
                            </div>
                            <div style="float:left;">
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