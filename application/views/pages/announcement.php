	<br><br>
	<div class="row">
		<div class="container">
			<a onclick="GoBack()" class="anLink"><span class="ti-angle-left"></span> Go Back</a>	
		</div>
	</div>
	<br><br>
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
	<div class="container">
        <div class="row">
            <div class="col-lg-3" style="height:100%">
               <img class="img-responsive animated rollIn" id="announcePic" src="<?= base_url();?>resources/icons/Announcements.png" height="100%" width="100%" alt="Activity Picture">                 
            </div>
            <div class="col-lg-9 animated fadeIn">
            	<div class="panel panel-default articles" style="border-radius:0px;">
					<div class="panel-body articles-container">
						<div class="article border-bottom">
							<div class="col-xs-12">
								<div class="row">
									<div class="col-xs-10 col-md-10">
										<h4 class="text-danger"><?= $row->title; ?></h4>
										<p style="color:#394247;"><span style="color:#595C64;">Posted By: Admin</span> &nbsp; <span class="ti-time"></span> <?= time_ago_format($row->posted_on);?> </p>
										<p class="text-justify"><?= $row->descr;?></p>
									</div>
								</div>
							</div>
							<div class="clear"></div>
						</div><!--End .article-->
					</div>
				</div><!--End .articles--> 
            </div>
        </div>
	</div>
	<br><br>

	<footer class="text-center" style="margin-top:10%;">
		<a class="up-arrow" href="#myNav" data-toggle="tooltip" title="Back to Top">
			<span class="glyphicon glyphicon-chevron-up"></span>
		</a><br><br>
		<h4 id="cpright">Copyright &copy; 2018 | PYAP Bohol Chapter | All Rights Reserved.</h4>
	</footer>