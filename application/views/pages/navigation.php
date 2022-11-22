  	<!-- link to home css -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('resources/css/home.css'); ?>">
</head>
<body>
<!-- Start of the Navbar -->
    <nav class="navbar navbar-default" id="myNav">
	  	<div class="container">
		    <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span> 
			    </button>
		        <a class="navbar-brand" href="<?php echo base_url(); ?>" id="brand"><img class="img-responsive" src="<?php echo base_url('resources/images/pyapbohol.png'); ?>" id="imgLogo"></a>
		    </div>
		    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul id="myNavLinks" class="nav navbar-nav navbar-right">
			      	<li><a <?= $this->uri->segment(1) == null ? 'id="current"' : '';?> class="navLink" href="<?php echo base_url(); ?>">HOME</a></li>
			      	<li><a <?= $this->uri->segment(2) == 'activity' || $this->uri->segment(2) == 'activities' ? 'id="current"' : '';?> class="navLink" href="<?php echo base_url(); ?>#activities">ACTIVITIES</a></li>
			      	<li><a <?= $this->uri->segment(2) == 'announcement' || $this->uri->segment(2) == 'announcements' ? 'id="current"' : '';?> class="navLink" href="<?php echo base_url(); ?>#announcements">ANNOUCEMENTS</a></li>
			      	<li><a class="navLink" href="<?php echo base_url(); ?>#about">ABOUT</a></li>
			        <li><a class="navLink" href="<?php echo base_url(); ?>#contact">CONTACT</a></li>
			        <li><a class="navLink" href="<?php echo base_url(); ?>login">LOGIN</a></li>
			    </ul>
			</div>
	  	</div>
	</nav>
<!-- End of the Navbar -->