  		<div class="container-fluid" style="background: #F4F4F4;">
          <br><br>
          <div class="col-md-10 col-md-offset-1"> 
  				  <a href="<?= base_url(); ?>" class="morelink"><span class="ti-angle-left"></span> Go Back</a>
          </div>
        <div class="col-md-10 col-md-offset-1">
            <h2>All Announcements</h2><br>
        </div>
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
	  		<div class="row">
          <div class="col-md-10 col-md-offset-1">
	  			 <?php 
                if(empty($content)){   
                echo '<p text-justify">No Announcements Added Yet.</p>';  
                }elseif(!empty($content)){
                    foreach($content as $row){
                ?>
                <div class="col-md-10 col-sm-12 col-xs-12 animated flipInX">
                  <a href="<?= base_url(); ?>view/announcement/<?= $row->id; ?>">
                    <div class="panel panel-default articles" id="anBox">
                      <div class="panel-body articles-container">
                        <div class="article border-bottom">
                          <div class="col-xs-12">
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-12">
                                <h4 class="text-danger"><?= $row->title; ?></h4><div class="pull-right" style="margin-top:-30px;color:#DAE5EB;"><span class="ti-world" title="Public"></span></div>
                                <p style="color:#B0B8C6;"><span>Posted By: Admin</span> &nbsp; <span class="ti-time"></span> <?= time_ago_format($row->posted_on);?> </p>
                                <p id="descrip"><?= mb_strimwidth($row->descr, 0, 100, "..."); ?></p>
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
          </div>
			</div>
			<div class="row">
	            <div class="col-md-10 col-md-offset-1">
	                <ul class="pagination">
	                <?php echo $pagination; ?>
	                </ul>
	            </div>
	        </div>
        </div>
		</div>

	<footer class="text-center">
		<a class="up-arrow" href="#myNav" data-toggle="tooltip" title="Back to Top">
			<span class="glyphicon glyphicon-chevron-up"></span>
		</a><br><br>
		<h4 id="cpright">Copyright &copy; 2018 | PYAP Bohol Chapter | All Rights Reserved.</h4>
	</footer>