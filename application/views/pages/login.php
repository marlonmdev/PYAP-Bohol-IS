	<link rel="stylesheet" type="text/css" href="<?= base_url('resources/css/login.css'); ?>">
</head>
<body>   
    <div class="container">
        <div class="row" id="divRow">

            <div class="col-md-3 col-md-offset-2">
                <center><img id="logImg" src="<?php echo base_url(); ?>resources/icons/lock2.png" class="img-responsive" alt="Security Logo"></center>
                <center><p style="color: #f9f9f9;">Enter your username and password to login.</p></center>
            </div>
            <div class="col-md-4">
                <form id="loginForm" method="POST" action="<?= base_url(); ?>login/parse">
                    <?php include 'alerts.php'; ?>
                    <center><label><h3 style="color:#f9f9f9;">User Log In</h3></label></center>
                    <div class="inp form-group">
                        <input type="text" class="form-control" placeholder="Username" name="uname" value="<?= $this->session->userdata('username'); ?>" required/>
                    </div>
                    <div class="inp form-group">
                        <input type="password" name="pword" id="logPword" class="form-control" placeholder="Password" required/>
                    </div>
                    <input type="checkbox" onclick="showPword()"> <span style="color: #f9f9f9; font-size:1.1em;">Show Password</span><br><br>   
                    <input type="submit" class="btn" name="login" id="btnLogin" value="Log In">&nbsp; 
                    <a href="<?= base_url(); ?>" class="btn" id="btnBack">Homepage</a>
                </form>
            </div>
        </div>
    </div>
     

	