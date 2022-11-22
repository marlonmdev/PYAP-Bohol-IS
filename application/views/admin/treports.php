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
                        <div class="row">
                            <div class="col-md-10">
                                <form id="repForm" method="POST" action="<?= base_url(); ?>admin/tabular_reports/filter">
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
                            <center><h4>PROVINCIAL CONSOLIDATED REPORT ON PAG-ASA YOUTH ASSOCIATION</h4></center>
                            <center><h4>BOHOL PROVINCE</h4></center>
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
                                echo "<center><h4>".$quarter." Quarter Report, CY ".$yr."</h4></center>"
                            ?>
                            <table class="table table-hover table-striped table-bordered">
                                <thead>
                                    <tr>
                                       <th rowspan="2" class="text-center">MUNICIPALITY</th>
                                       <th rowspan="2" class="text-center">TOTAL # OF BRGY</th>
                                       <th rowspan="2" class="text-center">BRGYS W/ PYAP</th>
                                       <th rowspan="2" class="text-center">TOTAL # OF MEMBERS</th>
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
                                        <th class="text-center">BELOW 3K</th>
                                        <th class="text-center">3K - 5K</th>
                                        <th class="text-center">6K - 15K</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if(empty($content)){   
                                        echo '<td colspan="19"><strong><h3 class="text-center"><span class="ti-face-sad"></span> No Data Found..</h3></strong></td>'; 
                                    }elseif(!empty($content)){
                                        foreach($content as $row){
                                    ?>
                                    <tr>
                                        <td class="text-center"><a href="<?= base_url(); ?>admin/tabular_reports/breakdown/<?= $row->municipal; ?>/<?=  $row->mun_id; ?>" style="text-decoration: none;" title="Click to show municipality information"><?= $row->municipal; ?></a></td>
                                        <td class="text-center"><?= $row->m_brgys; ?></td>
                                        <td class="text-center"><?= $row->m_pyap; ?></td>
                                        <td class="text-center"><?= $row->m_youth; ?></td>
                                        <td class="text-center"><?= $row->m_ageBr1; ?></td>
                                        <td class="text-center"><?= $row->m_ageBr2; ?></td>
                                        <td class="text-center"><?= $row->m_ageBr3; ?></td>
                                        <td class="text-center"><?= $row->m_male; ?></td>
                                        <td class="text-center"><?= $row->m_female; ?></td>
                                        <td class="text-center"><?= $row->m_osy_m; ?></td>
                                        <td class="text-center"><?= $row->m_osy_f; ?></td>
                                        <td class="text-center"><?= $row->m_isy_m; ?></td>
                                        <td class="text-center"><?= $row->m_isy_f; ?></td>
                                        <td class="text-center"><?= $row->m_attainment1; ?></td>
                                        <td class="text-center"><?= $row->m_attainment2; ?></td>
                                        <td class="text-center"><?= $row->m_attainment3; ?></td>
                                        <td class="text-center"><?= $row->m_attainment4; ?></td>
                                        <td class="text-center"><?= $row->m_attainment5; ?></td>
                                        <td class="text-center"><?= $row->m_attainment6; ?></td>
                                        <td class="text-center"><?= $row->m_single; ?></td>
                                        <td class="text-center"><?= $row->m_married; ?></td>
                                        <td class="text-center"><?= $row->m_solo; ?></td>
                                        <td class="text-center"><?= $row->m_income1; ?></td>
                                        <td class="text-center"><?= $row->m_income2; ?></td>
                                        <td class="text-center"><?= $row->m_income3; ?></td>
                                    </tr>
                                     <?php   
                                        }
                                        }
                                    ?>
                                    <tr>
                                        <td class="text-center">Sub-total</td>
                                        <td class="text-center"><?= $total_brgys ?></td>
                                        <td class="text-center"><?= $total_brgys_pyap ?></td>
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
                            <div style="float:left;">
                                <div style="float:left">
                                    <p>Prepared By: </p>
                                </div>
                                <div style="float:right;margin-left:7px;">
                                    <p style="text-align:center;"><?= $this->session->userdata('name') ?></p>
                                    <p style="text-align:center;font-size:.9em;"><?= $this->session->userdata('position') ?></p>
                                </div>
                            </div>
                            <div style="float:right;">
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
