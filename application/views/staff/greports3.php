  
        <script type="text/javascript">
            $(function () {
                var $arrColors = ['#EE0539', '#24CE7F', '#AB34D3', '#C7B82B'];
                Morris.Bar({
                    element: 'myChart',
                    data: [
                        { a: 'Elementary Level', b: <?= $elemLevel_m ?>, c: <?= $elemLevel_f ?> },
                        { a: 'Elementary Graduate', b: <?= $elemGrad_m ?>, c: <?= $elemGrad_f ?> },
                        { a: 'High School Level', b: <?= $hsLevel_m ?>, c: <?= $hsLevel_f ?> },
                        { a: 'High School Graduate', b: <?= $hsGrad_m ?>, c: <?= $hsGrad_f ?> },
                        { a: 'College Level', b: <?= $colLevel_m ?>, c: <?= $colLevel_f ?> },
                        { a: 'College Graduate', b: <?= $colGrad_m ?>, c: <?= $colGrad_f ?> }
                    ],
                    xkey: 'a',
                    ykeys: ['b', 'c'],
                    labels: ['Male', 'Female'],
                    barColors: ['#24CE7F', '#AB34D3'],
                    hideHover: 'auto',
                    gridLineColor: '#eef0f2',
                    resize: true
                }); 
            });
        </script>
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
                        <li>
                            <a href="<?= base_url(); ?>lgu/tabular_reports">Tabular Reports <span class="ti-layout pull-right"></span></a>
                        </li>
                        <li class="active">
                            <a href="<?= base_url(); ?>lgu/graphical_reports">Graphical Reports <span class="ti-bar-chart pull-right"></span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <ul class="nav nav-tabs">
                        <li role="presentation"><a href="<?= base_url(); ?>lgu/graphical_reports">Barangay Members</a></li>
                        <li role="presentation"><a href="<?= base_url(); ?>lgu/graphical_reports/age_brackets_report">Age Brackets</a></li>
                        <li role="presentation" class="active"><a href="<?= base_url(); ?>lgu/graphical_reports/highest_educational_attainment_report">Educational Background</a></li>
                        <li role="presentation"><a href="<?= base_url(); ?>lgu/graphical_reports/skills_report">Skills</a></li>
                        <li role="presentation"><a href="<?= base_url(); ?>lgu/graphical_reports/reason_for_dropping_report">Reason for Dropping</a></li>
                        <li role="presentation"><a href="<?= base_url(); ?>lgu/graphical_reports/interest_hobbies_report">Interest/Hobbies</a></li>
                    </ul><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-md-10">
                                    <form id="repForm" method="POST" action="<?= base_url(); ?>lgu/graphical_reports/highest_educational_attainment_report/filter">
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
                            <div id="data">
                                <center><h4>PROVINCIAL CONSOLIDATED REPORT ON PAG-ASA YOUTH ASSOCIATION</h4></center>
                                <center><h4>Municipalty of <?= $this->session->userdata('municipal'); ?></h4></center>
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
                                    echo "<center><h4>".$quarter." Quarter Educational Background Report, CY ".$yr."</h4></center>"
                                ?>
                                <br>
                                <div style="margin-left:85%;">
                                    <h3>Legend</h3> 
                                    <div><li style="list-style:square;font-size:1.2em;color:#24CE7F;">Male</li></div>
                                    <div style="left:30px;"><li style="list-style:square;font-size:1.2em;color:#AB34D3;">Female</li></div>
                                </div>
                                <div id='myChart' style="margin-top:20px;height:auto;width:100%;min-height:325px;"></div>
                                <br><br>
                                <div style="float:left;margin-left:40px;">
                                    <div style="float:left">
                                        <p style="font-size:1.2em;">Prepared By: </p>
                                    </div>
                                    <div style="float:right;margin-left:7px;">
                                        <p style="text-align:center;font-size:1.2em;"><?= $this->session->userdata('name') ?></p>
                                        <p style="text-align:center;"><?= $this->session->userdata('position') ?></p>
                                    </div>
                                </div>
                            </div>          
                        </div>
                    </div>
                             
                </div><!-- End of Div Container Fluid -->
            </div><!-- End of Page Wrapper -->
        </div>