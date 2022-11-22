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
                                <div class="col-md-10">
                                    <form id="repForm" method="POST" action="<?= base_url(); ?>lgu/tabular_reports/filter">
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
                                    <a onclick="printlayer('data')" class="btn btn-warning" title="Click to print report"><span class="ti-printer"></span> Print Report</a>
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
                                    echo "<center><h4>".$quarter." Quarter Report, CY ".$fYear."</h4></center>";
                                }else{
                                    echo "<center><h4>Annual Report, CY ".$fYear."</h4></center>";
                                }
                            ?>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center">BARANGAY</th>
                                        <th rowspan="2" class="text-center">Total No. of Members</th>
                                        <th colspan="3" class="text-center">AGE</th>
                                        <th colspan="2" class="text-center">SEX</th>   
                                        <th colspan="2" class="text-center">OSY</th>   
                                        <th colspan="2" class="text-center">ISY</th> 
                                        <th colspan="6" class="text-center">EDUCATIONAL BACKGROUND</th>  
                                        <th colspan="3" class="text-center">CIVIL STATUS</th>  
                                        <th colspan="3" class="text-center">FAMILY INCOME</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">15-20 YO</th>
                                        <th class="text-center">21-25 YO</th>
                                        <th class="text-center">26-30 YO</th>
                                        <th class="text-center">M</th>
                                        <th class="text-center">F</th>
                                        <th class="text-center">M</th>
                                        <th class="text-center">F</th>
                                        <th class="text-center">M</th>
                                        <th class="text-center">F</th>
                                        <th class="text-center">ELEM LEV</th>
                                        <th class="text-center">ELEM GRAD</th>
                                        <th class="text-center">H.S LEV</th>
                                        <th class="text-center">H.S GRAD</th>
                                        <th class="text-center">COLL LEV</th>
                                        <th class="text-center">COLL GRAD</th>
                                        <th class="text-center">Single</th>
                                        <th class="text-center">Married</th>
                                        <th class="text-center">Solo Parent</th>
                                        <th class="text-center">Below 3K</th>
                                        <th class="text-center">3K - 5K</th>
                                        <th class="text-center">6K - 15K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(empty($content)){   
                                        echo '<td colspan="17"><strong><h3 class="text-center"><span class="ti-face-sad"></span> No Data Found..</h3></strong></td>'; 
                                    }elseif(!empty($content)){
                                        foreach($content as $row){
                                    ?>
                                    <tr>
                                        <td class="text-center"><a href="<?= base_url(); ?>lgu/tabular_reports/<?= $row->brgy_id ?>/members/<?= $quart ?>/<?= $fYear ?>" title="Click to view members"><?= $row->brgy;?></a></td>
                                        <td class="text-center"><?= $row->b_youth; ?></td>
                                        <td class="text-center"><?= $row->b_ageBr1; ?></td>
                                        <td class="text-center"><?= $row->b_ageBr2; ?></td>
                                        <td class="text-center"><?= $row->b_ageBr3; ?></td>
                                        <td class="text-center"><?= $row->b_male; ?></td>
                                        <td class="text-center"><?= $row->b_female; ?></td>
                                        <td class="text-center"><?= $row->b_osy_m; ?></td>
                                        <td class="text-center"><?= $row->b_osy_f; ?></td>
                                        <td class="text-center"><?= $row->b_isy_m; ?></td>
                                        <td class="text-center"><?= $row->b_isy_f; ?></td>
                                        <td class="text-center"><?= $row->b_attainment1; ?></td>
                                        <td class="text-center"><?= $row->b_attainment2; ?></td>
                                        <td class="text-center"><?= $row->b_attainment3; ?></td>
                                        <td class="text-center"><?= $row->b_attainment4; ?></td>
                                        <td class="text-center"><?= $row->b_attainment5; ?></td>
                                        <td class="text-center"><?= $row->b_attainment6; ?></td>
                                        <td class="text-center"><?= $row->b_single; ?></td>
                                        <td class="text-center"><?= $row->b_married; ?></td>
                                        <td class="text-center"><?= $row->b_solo; ?></td>
                                        <td class="text-center"><?= $row->b_income1; ?></td>
                                        <td class="text-center"><?= $row->b_income2; ?></td>
                                        <td class="text-center"><?= $row->b_income3; ?></td>
                                    </tr>
                                     <?php   
                                        }
                                        }
                                    ?>
                                    <tr>
                                        <td class="text-center">Sub-total</td>
                                        <td class="text-center"><?= $total_members ?></td>
                                        <td class="text-center"><?= $total_age_bracket1 ?></td>
                                        <td class="text-center"><?= $total_age_bracket2 ?></td>
                                        <td class="text-center"><?= $total_age_bracket3 ?></td>
                                        <td class="text-center"><?= $total_male_members ?></td>
                                        <td class="text-center"><?= $total_female_members ?></td>
                                        <td class="text-center"><?= $total_male_osy ?></td>
                                        <td class="text-center"><?= $total_female_osy ?></td>
                                        <td class="text-center"><?= $total_male_isy ?></td>
                                        <td class="text-center"><?= $total_female_isy ?></td>
                                        <td class="text-center"><?= $total_attainment1 ?></td>
                                        <td class="text-center"><?= $total_attainment2 ?></td>
                                        <td class="text-center"><?= $total_attainment3 ?></td>
                                        <td class="text-center"><?= $total_attainment4 ?></td>
                                        <td class="text-center"><?= $total_attainment5 ?></td>
                                        <td class="text-center"><?= $total_attainment6 ?></td>
                                        <td class="text-center"><?= $total_single_members ?></td>
                                        <td class="text-center"><?= $total_married_members ?></td>
                                        <td class="text-center"><?= $total_solo_members ?></td>
                                        <td class="text-center"><?= $total_income1 ?></td>
                                        <td class="text-center"><?= $total_income2 ?></td>
                                        <td class="text-center"><?= $total_income3 ?></td>
                                    </tr>         
                                </tbody>
                            </table><br>
                            <div style="float:left;margin-left:3px;">
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