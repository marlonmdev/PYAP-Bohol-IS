    <script type="text/javascript">
        $(function () {
            var $arrColors = ['#607D8B', '#4CAF50', '#2196F3', '#3F51B5', '#F44336', '#FF5722', '#795548', '#673AB7', '#FF9800', '#E91E63', '#8BC34A', '#FFC107', '#CDDC39', '#9C27B0', '#03A9F4', '#FFEB3B'];
            Morris.Bar({
                element: 'myChart',
                data: [
                    { a: 'None',b: <?= $skill1; ?> }, 
                    { a: 'Agriculture/Farming', b: <?= $skill2; ?> }, 
                    { a: 'Technician/Repair', b: <?= $skill3; ?> }, 
                    { a: 'Construction', b: <?= $skill4; ?> },
                    { a: 'Singing', b: <?= $skill5; ?> }, 
                    { a: 'Dancing', b: <?= $skill6; ?> }, 
                    { a: 'Carpentry', b: <?= $skill7; ?> },
                    { a: 'Computer', b: <?= $skill8; ?> },
                    { a: 'Drawing/Painting', b: <?= $skill9; ?> },
                    { a: 'Dressmaking/Tailoring', b: <?= $skill10; ?> },
                    { a: 'Sports', b: <?= $skill11; ?> },
                    { a: 'Arts', b: <?= $skill12; ?> },
                    { a: 'Music', b: <?= $skill13; ?> },
                    { a: 'Business/Entrepreneurship', b: <?= $skill14; ?> }, 
                    { a: 'Swimming', b: <?= $skill15; ?> },
                    { a: 'Writing', b: <?= $skill16; ?> }
                ],
                horizontal: true,
                xkey: 'a',
                ykeys: 'b',
                labels: ['Skills Count'],
                barColors: function (row, series, type){return $arrColors[row.x];},
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
                    <li>
                        <a href="<?= base_url(); ?>admin/tabular_reports">Tabular Reports <span class="ti-layout pull-right"></span></a>
                    </li>
                    <li class="active">
                        <a href="<?= base_url(); ?>admin/graphical_reports">Graphical Reports <span class="ti-bar-chart pull-right"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <ul class="nav nav-tabs">
                    <li role="presentation"><a href="<?= base_url(); ?>admin/graphical_reports">Municipality Members</a></li>
                    <li role="presentation"><a href="<?= base_url(); ?>admin/graphical_reports/age_brackets_report">Age Brackets</a></li>
                    <li role="presentation"><a href="<?= base_url(); ?>admin/graphical_reports/highest_educational_attainment_report">Educational Background</a></li>
                    <li role="presentation" class="active"><a href="<?= base_url(); ?>admin/graphical_reports/skills_report">Skills</a></li>
                    <li role="presentation"><a href="<?= base_url(); ?>admin/graphical_reports/reason_for_dropping_report">Reason for Dropping</a></li>
                    <li role="presentation"><a href="<?= base_url(); ?>admin/graphical_reports/interest_hobbies_report">Interest/Hobbies</a></li>
                </ul><br>
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-10">
                                <form id="repForm" method="POST" action="<?= base_url(); ?>admin/graphical_reports/skills_report/filter">
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
                            <center><h4>BOHOL PROVINCE</h4></center>
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
                            <div id='myChart' style="margin-top:20px;width:100%;height:auto;min-height:500px;"></div>
                            <br>
                            <div style="float:left;margin-left:40px;">
                                <div style="float:left">
                                    <p>Prepared By: </p>
                                </div>
                                <div style="float:right;margin-left:7px;">
                                    <p style="text-align:center;"><?= $this->session->userdata('name') ?></p>
                                    <p style="text-align:center;font-size:.9em;"><?= $this->session->userdata('position') ?></p>
                                </div>
                            </div>
                            <div style="float:right;margin-right:40px;">
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
                        </div>          
                        </div><!-- END OF TABLE-RESPONSIVE DIV --> 
                    </div>
                </div>   
            </div>
        </div>
    </div>
    
