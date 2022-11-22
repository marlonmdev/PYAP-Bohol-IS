	<br><br>
	<div class="row">
		<div class="container">
			<a onclick="GoBack()" class="anLink"><span class="ti-angle-left"></span> Go Back</a>	
		</div>
	</div>
	<br><br>
	<div class="container">
        <div class="row">
            <div class="col-lg-6" style="height:100%">
               <img class="img-responsive animated rollIn" src="<?= base_url();?>pictures/<?= $row->pic; ?>" height="100%" width="100%" alt="Activity Picture">                 
            </div>
            <div class="col-lg-6 animated fadeIn" id="actDescr" style="margin-top:-45px;">
                <div class="box box-primary">
                    <div class="box-header" style="color:#F4F4F4;text-align: center;"><h3><?= $row->aname; ?></h3></div><hr>
                    <div class="box-body">
                        <h4 style="color:#F4F4F4;">Municipality: <?= $row->municipal; ?></h4>
                        <?php if(!empty($row->ato)) {?>
                            <h4 style="color:#F4F4F4;">Date: <?= $row->afrom; ?> -  <?= $row->ato; ?></h4>
                        <?php }else{ ?>
                            <h4>Date: <?= $row->afrom; ?></h4>
                        <?php } ?>
                        <h4 style="color:#F4F4F4;">Budget: &#8369; <?= number_format($row->budget, 2); ?></h4>
                        <h4 style="color:#F4F4F4;" >Description:</h4>
                        <div style="background-color: #E1E1E1; padding: 10px 20px;">
                            <h4 class="text-justify"> &nbsp;&nbsp;<?= $row->descr; ?></h4> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<br><br>

	<footer class="text-center">
		<a class="up-arrow" href="#myNav" data-toggle="tooltip" title="Back to Top">
			<span class="glyphicon glyphicon-chevron-up"></span>
		</a><br><br>
		<h4 id="cpright">Copyright &copy; 2018 | PYAP Bohol Chapter | All Rights Reserved.</h4>
	</footer>