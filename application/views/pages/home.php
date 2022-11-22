	<!-- This will be display on desktop size only -->
	<div id="welcome">
		<div class="container-fluid">
			<div class="row">
				<img src="<?= base_url() ?>resources/images/pyap_img.png" class="img-responsive" id="welLogo" alt="PYAP Logo">
				<div id="profile" class="box animated fadeIn">
					<center><h1>Our &nbsp; Profile</h1></center>
					<p class="text-justify">
					&nbsp;&nbsp;The Pag-asa Youth Association is a youth group organized by Department of Social Welfare and Development (DSWD). It aims to develop young people, especially the out-of-school for holistic development, by offering programs on livelihood, education, and capability building. It also offers avenue for volunteerism and community development by engaging them in activities for environment, spiritual formation, and responsible citizenship.	
					</p>
					<center><a href="#about" class="btn btn-default" role="button" id="btnLearn1">Learn More</a></center>
				</div><br>
			</div>
		</div>
  	</div>
  	<!-- This div will be display only on mobile size -->
  	<div id="welcome2" style="display:none;">
		<div class="container-fluid">
			<div class="row">
				<div class="col=md-8">
					<img src="<?= base_url() ?>resources/images/pyap_img.png" class="img-responsive animated fadeIn" alt="PYAP Logo">
				</div>
				<div class="col-md-4">
					<div id="profile2" class="box animated fadeInUp">
						<center><h2>Our &nbsp; Profile</h2></center>
						<p class="text-justify">
						&nbsp;&nbsp;The Pag-asa Youth Association is a youth group organized by Department of Social Welfare and Development (DSWD). It aims to develop young people, especially the out-of-school for holistic development, by offering programs on livelihood, education, and capability building. It also offers avenue for volunteerism and community development by engaging them in activities for environment, spiritual formation, and responsible citizenship.	
						</p>
						<center><a href="#about" class="btn btn-default btn-md" role="button" id="btnLearn2">Learn More</a></center>
					</div><br>
				</div>
			</div>
		</div>
  	</div>
  	<div id="activities"><br>
  		<div class="container">
  			<center><label>Our &nbsp; Activities</label></center><br>
	  		<div class="row">
	  			<?php 
                if(empty($content)){   
                echo '<h3 class="text-center">No Activities Added Yet.</h3>';  
                }elseif(!empty($content)){
                    foreach($content as $row){
                ?>	
                	<a href="<?= base_url(); ?>view/activity/<?= $row->id; ?>">
	                	<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 animated zoomIn">
						    <div class="thumbnail actTilt" id="activity">
						      <div style="height:180px; width:100%; margin: 0 auto;">	
						      	<img src="<?= base_url();?>pictures/<?= $row->pic; ?>" style="height:100%; width:100%; margin: 0 auto;" alt="Activity Picture">
						      </div>
						      <div class="caption" style="height:35px;">
						      	 <h4 class="text-justify" id="actName" style="color:#3c8dbc !important;"><?= mb_strimwidth($row->aname, 0, 22, "...");?></h4>
						      </div>
						      <div class="caption">  
						        <p>Municipality: <?= mb_strimwidth($row->municipal, 0, 20, "..."); ?></p>
						        <p><a href="<?= base_url(); ?>view/activity/<?= $row->id; ?>" class="btn btn-default btn-md" id="btnMore" role="button">More Info</a>
						      </div>
						    </div>
					  	</div>
					</a>
	            <?php   
	                }
	            }
	            ?>  
			</div>
			<?php if(!empty($content)){ ?>
				<div class="row">
					<div class="col-md-9"></div>
					<div class="col-md-3">
						<a href="<?= base_url('view/activities/all'); ?>" class="morelink pull-right" style="margin-bottom:20px;">View More..</a>
					</div>		
	        	</div>
        	<?php }else{ echo '<br>'; } ?>
		</div>
  	</div>

  	<div id="announcements">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
	            	<div class="box" id="about">	
	            		<img src="<?php echo base_url(); ?>resources/images/logos.png" class="img-responsive" height="200px" width="375px" style="margin:0 auto;"><br>
	            		<center><label style="color:#F4F4F4;">About Us</label></center>
	            		<p class="aboutUs text-justify">
						&nbsp;&nbsp;&nbsp;&nbsp;Pag-asa Youth Association of the Philippines Incorporation (PYAP) is a duly constituted barangay based organization of the out-of-school youth between 15 to 30 years old who are clientele of the Department of the Social Welfare and Development (DSWD). The PYAP was first incorporated on July 29, 1974 with the Securities and Exchange Commission (SEC) under the name of Pag-asa Youth Movement Inc. (PYM) and thus become an affiliate organization of the DSWD. As a result of innovative programs and services and further strengthening the capabilities of the youth program, the PYM Inc. changed its name to PYAP Inc. based on its new SEC Registration Number 01328, approved on April 12, 1996. The PYAP is organized nationwide and is federated from the Municipal, City/Provincial, Regional and National Levels.
						</p>
					</div>
				</div>
				<center><label id="announce" style="color:#F4F4F4;">Recent &nbsp; Announcements</label></center><br>	
				<?php
					function time_ago_format($timestamp){
						date_default_timezone_set('Asia/Manila');
						$time_ago = strtotime($timestamp);
						$current_time = time();
						$time_difference = $current_time - $time_ago;
						$seconds = $time_difference;

						$minutes = round($seconds/60);
						$hours = round($seconds/3600);
						$days = round($seconds/86400);
						$weeks = round($seconds/604800);
						$months = round($seconds/2629440);
						$years = round($seconds/31553280);

						if($seconds <= 60){
							return "Just now";
						}elseif($minutes <= 60){
							if($minutes == 1){
								return "One minute ago";
							}else{
								return "$minutes minutes ago";
							}
						}elseif($hours <= 24){
							if($hours == 1){
								return "An hour ago";
							}else{
								return "$hours hours ago";
							}
						}elseif($days <= 7){
							if($days == 1){
								return "Yesterday";
							}else{
								return "$days days ago";
							}
						}elseif($weeks <= 4.3){
							if($weeks == 1){
								return "A week ago";
							}else{
								return "$weeks weeks ago";
							}
						}elseif($months <= 12){
							if($months == 1){
								return "A month ago";
							}else{
								return "$months months ago";
							}
						}else{
							if($years == 1){
								return "One year ago";
							}else{
								return "$years years ago";
							}
						}
					}
				?>
				<?php 
				 if(empty($results)){   
	                echo '<h3 class="text-center">No Announcements Added Yet.</h3>';  
	                }elseif(!empty($results)){
	                    foreach($results as $row){
	            ?>
				<div class="col-lg-6">
					<a href="<?= base_url(); ?>view/announcement/<?= $row->id; ?>">
						<div class="panel panel-default articles" id="anBox">
							<div class="panel-body articles-container">
								<div class="article border-bottom">
									<div class="col-xs-12">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-xs-12">
												<h4 class="text-danger"><?= $row->title; ?></h4><div class="pull-right" style="margin-top:-30px;color:#DAE5EB;"><span class="ti-world" title="Public"></span></div>
												<p style="color:#B0B8C6;font-size:.9em;"><span>Posted By: Admin</span> &nbsp; <span class="ti-time"></span> <?= time_ago_format($row->posted_on);?></p>
												<p id="descrip"><?= mb_strimwidth($row->descr, 0, 65, "..."); ?></p>
											</div>
										</div>
									</div>
									<div class="clear"></div>
								</div><!--End .article-->
							</div>
						</div><!--End .articles-->
					</a>
				</div>
				<?php   
	                }
	            }
            	?>
	            <?php if(!empty($results)){ ?>	
					<div class="row">
						<div class="col-md-9"></div>
						<div class="col-md-3">
							<a href="<?= base_url('view/announcements'); ?>" class="anLink pull-right">View More..</a>
						</div>		
		        	</div><br>
	        	<?php }else{ echo '<br>'; } ?>
			</div>
		</div>
	</div>
	<div id="contact">
		<div class="container">
			<p class="editContent text-center">Contact &nbsp; Info</p><br>	
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="box">
					<div class="icon">
						<i class="fa fa-map-marker" aria-hidden="true"></i>
					</div>
					<div class="details" id="d1"><label>Tamblot, Tagbilaran City, Bohol</label></div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="box">
					<div class="icon">
						<i class="fa fa-phone" aria-hidden="true"></i>
					</div>
					<div class="details" id="d2"><label><?php if(!empty($cont->telNo)){ echo $cont->telNo; }else{ echo 'No Tel. No. yet.'; } ?></label></div>
				</div>
			</div>
			<div class="col-md-4 col-sm-12 col-xs-12">
				<div class="box">
					<div class="icon">
						<i class="fa fa-envelope" aria-hidden="true"></i>
					</div>
					<div class="details" id="d3"><label><?php if(!empty($cont->email)){ echo $cont->email; }else{ echo 'No email yet.'; } ?></label></div>
				</div>
			</div>
		</div>
	</div>
	<footer class="text-center">
		<a class="up-arrow" href="#myNav" data-toggle="tooltip" title="Back to Top">
			<span class="glyphicon glyphicon-chevron-up"></span>
		</a><br><br>
		<h4 id="cpright">Copyright &copy;
			<?php echo date('Y'); ?> | PYAP Bohol Chapter | All Rights Reserved.
		</h4>
	</footer>