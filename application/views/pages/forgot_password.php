	<link rel="stylesheet" type="text/css" href="<?= base_url('resources/css/login.css'); ?>">
</head>
<body>   
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="loginPanel">
                <?php include 'alerts.php'; ?>     
                <a href="<?= base_url(); ?>"><img src="<?= base_url('resources/images/user.png'); ?>" class="img-responsive" id="logImg" title="Click to go back to homepage"></a>    
                <form method="POST" action="<?php echo base_url('forgot_password/reset'); ?>">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><span class="ti-email"></span></span>
                        <input type="email" class="form-control" placeholder="Enter your email here.." name="email" required/>
                    </div>
                        <input type="submit" class="btn btn-primary" value="Send Request"/>  
                    </div>
                    <a href="<?= base_url(); ?>login" class="pull-left" id="forgot" style="margin-top:10px;"><span class="ti-angle-left"></span> Go Back</a>
                </form>
            </div>
        </div>
    </div>
     

	