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
            </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12"><br>
                            <ol class="breadcrumb" style="border-radius:0px;">
                              <li><a href="<?= base_url() ?>lgu/members" style="font-size: 1.2em;">Members</a></li>
                              <li class="active" style="font-size: 1.2em;">Details</li>
                            </ol>  
                            <a href="<?= base_url(); ?>lgu/members" class="btn btn-info">Go Back</a><br><br>  
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4>Added On : <?= date_formats($iden->added_on); ?> &nbsp;&nbsp; Added By : <?= $iden->added_by; ?></h4>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <?php
                                            function date_formats($timestamp){
                                                date_default_timezone_set('Asia/Manila');
                                                //Produces date like February 21, 2018 at 10:00:00 AM
                                                $the_date = date('F d, Y \a\t h:i:s A', strtotime($timestamp));
                                                return $the_date;
                                            }
                                        ?>
                                        <div class="col-md-2 pull-right">
                                            <a onclick="printlayer('data')" class="btn btn-warning" title="Click to print report"><span class="ti-printer"></span> Print Info</a>
                                        </div>      
                                    </div>
                                    <div id="data">
                                        <h3>Member's Profile</h3><br> 
                                        <img src="<?= base_url() ?>members/thumbs/<?= $iden->photo ?>" class="img-responsive thumbnail" height="180" width="180" alt="Member Photo">
                                        <h4>Name : <?= $iden->fName ?> <?=$iden->mName ?> <?=$iden->lName ?> <?= $iden->ext; ?></h4>
                                        <h4>Age : <?= $iden->age; ?></h4>
                                        <h4>Sex : <?= $iden->sex; ?></h4>
                                        <h4>Date of Birth : <?= $iden->dBirth ?></h4>
                                        <h4>Address : <?= $iden->brgy ?>, <?= $iden->mun ?>, <?= $iden->prov ?></h4>
                                        <h4>Birth Place : <?= $iden->bBrgy ?>, <?= $iden->bMun ?>, <?= $iden->bProv ?></h4>
                                        <?php if(!empty($iden->religion)) {?>
                                            <h4>Religion : <?= $iden->religion; ?></h4>
                                        <?php } ?>
                                        <?php if(!empty($iden->fathName)) {?>
                                            <h4>Father : <?= $iden->fathName; ?> &nbsp; Age : <?= $iden->fathAge; ?> &nbsp; Occuppation : <?= $iden->fathOccup; ?> &nbsp; Monthly Income : &#8369; <?= number_format($iden->fathIncome, 2); ?></h4>
                                        <?php } ?>
                                        <?php if(!empty($iden->mothName)) {?>
                                            <h4>Mother : <?= $iden->mothName; ?> &nbsp; Age : <?= $iden->mothAge; ?> &nbsp; Occupation : <?= $iden->mothOccup; ?> &nbsp; Monthly Income : &#8369; <?= number_format($iden->mothIncome, 2); ?></h4>
                                        <?php } ?>
                                    <div><hr>
                                    <div>
                                        <h3>Educational Background</h3>
                                        <?php 
                                            if(!empty($educ->eName) && !empty($educ->sName) && !empty($educ->cName)){
                                                echo '<h3>Elementary</h3>';
                                                echo '<h4>School Name : '.$educ->eName.'</h4>';
                                                echo '<h4>Address : '.$educ->eAddr.'</h4>';
                                                echo '<h4>Level : '.$educ->eLevel.' &nbsp; Status : '.$educ->eStat.'</h4>';
                                                echo '<h4>From : '.$educ->eFrom.' &nbsp; To : '.$educ->eTo.'</h4>';

                                                echo '<h3>Secondary</h3>';
                                                echo '<h4>School Name : '.$educ->sName.'</h4>';
                                                echo '<h4>Address : '.$educ->sAddr.'</h4>';
                                                echo '<h4>Level : '.$educ->sLevel.' &nbsp; Status : '.$educ->sStat.'</h4>';
                                                echo '<h4>From : '.$educ->sFrom.' &nbsp; To : '.$educ->sTo.'</h4>';

                                                echo '<h3>College</h3>';
                                                echo '<h4>School Name : '.$educ->cName.'</h4>';
                                                echo '<h4>Address : '.$educ->cAddr.'</h4>';
                                                echo '<h4>Level : '.$educ->cLevel.' &nbsp; Status : '.$educ->cStat.'</h4>';
                                                echo '<h4>Degree/Course : '.$educ->cDegree.'</h4>';
                                                echo '<h4>From : '.$educ->cFrom.' &nbsp; To : '.$educ->cTo.'</h4>';
                                            }elseif(!empty($educ->eName) && !empty($educ->sName)){
                                                echo '<h3>Elementary</h3>';
                                                echo '<h4>School Name : '.$educ->eName.'</h4>';
                                                echo '<h4>Address : '.$educ->eAddr.'</h4>';
                                                echo '<h4>Level : '.$educ->eLevel.' &nbsp; Status : '.$educ->eStat.'</h4>';
                                                echo '<h4>From : '.$educ->eFrom.' &nbsp; To : '.$educ->eTo.'</h4>';

                                                echo '<h3>Secondary</h3>';
                                                echo '<h4>School Name : '.$educ->sName.'</h4>';
                                                echo '<h4>Address : '.$educ->sAddr.'</h4>';
                                                echo '<h4>Level : '.$educ->sLevel.' &nbsp; Status : '.$educ->sStat.'</h4>';
                                                echo '<h4>From : '.$educ->sFrom.' &nbsp; To : '.$educ->sTo.'</h4>';
                                            }elseif(!empty($educ->eName) && !empty($educ->cName)){
                                                echo '<h3>Elementary</h3>';
                                                echo '<h4>School Name : '.$educ->eName.'</h4>';
                                                echo '<h4>Address : '.$educ->eAddr.'</h4>';
                                                echo '<h4>Level : '.$educ->eLevel.' &nbsp; Status : '.$educ->eStat.'</h4>';
                                                echo '<h4>From : '.$educ->eFrom.' &nbsp; To : '.$educ->eTo.'</h4>';

                                                echo '<h3>College</h3>';
                                                echo '<h4>School Name : '.$educ->cName.'</h4>';
                                                echo '<h4>Address : '.$educ->cAddr.'</h4>';
                                                echo '<h4>Level : '.$educ->cLevel.' &nbsp; Status : '.$educ->cStat.'</h4>';
                                                echo '<h4>Degree/Course : '.$educ->cDegree.'</h4>';
                                                echo '<h4>From : '.$educ->cFrom.' &nbsp; To : '.$educ->cTo.'</h4>';
                                            }elseif(!empty($educ->sName) && !empty($educ->cName)){
                                                echo '<h3>Secondary</h3>';
                                                echo '<h4>School Name : '.$educ->sName.'</h4>';
                                                echo '<h4>Address : '.$educ->sAddr.'</h4>';
                                                echo '<h4>Level : '.$educ->sLevel.' &nbsp; Status : '.$educ->sStat.'</h4>';
                                                echo '<h4>From : '.$educ->sFrom.' &nbsp; To : '.$educ->sTo.'</h4>';

                                                echo '<h3>College</h3>';
                                                echo '<h4>School Name : '.$educ->cName.'</h4>';
                                                echo '<h4>Address : '.$educ->cAddr.'</h4>';
                                                echo '<h4>Level : '.$educ->cLevel.' &nbsp; Status : '.$educ->cStat.'</h4>';
                                                echo '<h4>Degree/Course : '.$educ->cDegree.'</h4>';
                                                echo '<h4>From : '.$educ->cFrom.' &nbsp; To : '.$educ->cTo.'</h4>';
                                            }
                                            elseif(!empty($educ->eName)){
                                                echo '<h3>Elementary</h3>';
                                                echo '<h4>School Name : '.$educ->eName.'</h4>';
                                                echo '<h4>Address : '.$educ->eAddr.'</h4>';
                                                echo '<h4>Level : '.$educ->eLevel.' &nbsp; Status : '.$educ->eStat.'</h4>';
                                                echo '<h4>From : '.$educ->eFrom.' &nbsp; To : '.$educ->eTo.'</h4>';
                                            }else{
                                                echo "<h4 class='text-danger'>No educational background added.</h4>";
                                            }
                                        ?>
                                    </div><hr>
                                    <?php if(!empty($reasons)){ ?>
                                        <div id="divList">
                                            <h3>Reason/s for Dropping</h3>
                                            <h4>
                                                <?php if($reasons->finProb == 1){ ?>
                                                  <li>Financial Problems</li><br>
                                                <?php } ?>      
                                                <?php if($reasons->nInterest == 1){ ?>
                                                  <li>Not Interested</li><br>
                                                <?php } ?>  
                                                <?php if($reasons->famProb == 1){ ?>
                                                  <li>Family Problems</li><br>
                                                <?php } ?>    
                                                <?php if($reasons->ePreg == 1){ ?>
                                                  <li>Early Pregnancy</li><br>
                                                <?php } ?> 
                                                <?php if($reasons->hProb == 1){ ?>
                                                  <li>Health Problems</li>
                                                <?php } ?>        
                                            </h4>
                                        </div><hr>
                                    <?php } ?>
                                    <div id="divList">
                                        <h3>Siblings</h3>
                                        <?php 
                                            if(!empty($sibs)){
                                                foreach($sibs as $sib){
                                                    echo '<h4><li>';
                                                    echo 'Name : '.$sib->sibName.' &nbsp; Sex : '.$sib->sibSex.' &nbsp; Age : '.$sib->sibAge.' &nbsp; Occupation : '.$sib->sibOccup.' &nbsp; Grade/Year : '.$sib->sibGrYr.' &nbsp; ISY/OSY : '.$sib->sibIOSY;
                                                    echo '</li></h4>';
                                                }
                                            }else{
                                                echo "<h4 class='text-danger'>No Siblings added.</h4>";
                                            }
                                        ?>     
                                    </div><hr>
                                    <div id="divList">
                                        <h3>Special Skills</h3>
                                        <?php 
                                            if(!empty($sk)){
                                        ?>
                                            <h4>
                                            <?php if($sk->none == 1){ ?>
                                              <li>None</li>
                                            <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->agri == 1){ ?>
                                                  <li>Agriculture</li>
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->tech == 1){ ?>
                                                    <li>Technician/Repair</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->construct == 1){ ?>
                                                  <li>Construction</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->singing == 1){ ?>
                                                  <li>Singing</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->dancing == 1){ ?>
                                                  <li>Dancing</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->carpentry == 1){ ?>
                                                  <li>Carpentry</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->computer == 1){ ?>
                                                  <li>Computer</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->drawing == 1){ ?>
                                                  <li>Drawing</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->dress == 1){ ?>
                                                  <li>Dressmaking</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->sports == 1){ ?>
                                                  <li>Sports</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->arts == 1){ ?>
                                                  <li>Arts/Designing</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->music == 1){ ?>
                                                  <li>Playing Musical Instruments</li> 
                                                <?php } ?>        
                                            </h4>
                                                <?php if($sk->business == 1){ ?>
                                                  <li>Business/Entrepreneurship</li> 
                                                <?php } ?>        
                                            </h4>
                                            </h4>
                                                <?php if($sk->swimming == 1){ ?>
                                                  <li>Swimming</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($sk->writing == 1){ ?>
                                                  <li>Writing</li> 
                                                <?php } ?>        
                                            </h4>
                                        <?php
                                        }else{
                                            echo "<h4 class='text-danger'>No special skills added.</h4>";
                                        }
                                        ?>                                        
                                    </div><hr>
                                    <div id="divList">
                                        <h3>Interest/Hobbies</h3>
                                        <?php 
                                            if(!empty($hob)){
                                        ?>
                                            <h4>
                                                <?php if($hob->internet == 1){ ?>
                                                  <li>Internet</li>
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($hob->watch == 1){ ?>
                                                  <li>Watching TV</li>
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($hob->sports == 1){ ?>
                                                    <li>Sports</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($hob->music == 1){ ?>
                                                  <li>Music</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($hob->arts == 1){ ?>
                                                  <li>Arts</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($hob->singing == 1){ ?>
                                                  <li>Singing</li> 
                                                <?php } ?>        
                                            </h4>
                                            <h4>
                                                <?php if($hob->dancing == 1){ ?>
                                                  <li>Dancing</li> 
                                                <?php } ?>        
                                            </h4>
                                        <?php 
                                        }else{
                                            echo "<h4 class='text-danger'>No interest/hobbies added.</h4>";
                                        }   
                                        ?>
                                    </div><hr>
                                    <div id="divList">
                                        <h3>Work Experience</h3>
                                        <?php 
                                            if(!empty($works)){
                                                foreach($works as $work){
                                                    echo '<h4><li>';
                                                    echo 'Work Date : '.$work->workDate.' &nbsp; Job Title : '.$work->jobTitle.' &nbsp; Monthly Income : &#8369; '.number_format($work->monIncome, 2).' &nbsp; Reason for leaving : '.$work->reLeave;
                                                    echo '</li></h4>';
                                                }
                                            }else{
                                                echo "<h4 class='text-danger'>No Work Experience added</h4>";
                                            }
                                        ?> 
                                    </div><hr>
                                    <div id="divList">
                                        <h3>Membership on Organizations</h3>
                                        <?php 
                                            if(!empty($orgs)){
                                                foreach($orgs as $org){
                                                    echo '<h4><li>';
                                                    echo 'Name of Organization : '.$org->nameOrg.' &nbsp; Position Held : '.$org->posHeld.' &nbsp; Year : '.$org->orgYear;
                                                    echo '</li></h4>';
                                                }
                                            }else{
                                                echo "<h4 class='text-danger'>No membership on organizations added</h4>";
                                            }
                                        ?> 
                                    </div>
                                </div> <!-- End of panel body -->
                            </div> <!-- End of panel-default -->
                        </div> <!-- End of column -->      
                    </div> <!-- End of Row -->              
                </div> <!-- End of container fluid div -->
            </div>
        </div>