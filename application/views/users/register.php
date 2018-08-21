<!DOCTYPE html>
<html>
<head>
	<title>Auth</title>
	<link rel="stylesheet" type="text/css" href="<?=base_url().'assets/pages/css/formstyle.css'?>">
	
    <link href="<?=base_url().'assets/pages/css/bootstrap.min.css'?>" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url().'assets/pages/css/font-awesome.min.css'?>">
	<link rel="stylesheet" href="<?=base_url().'assets/pages/css/animate.css'?>">
	<link href="<?=base_url().'assets/pages/css/animate.min.css'?>" rel="stylesheet"> 
	<link href="<?=base_url().'assets/pages/css/style.css'?>" rel="stylesheet" />	
    <!-- custom style -->
    <link href="<?=base_url().'assets/pages/css/post.css'?>" rel="stylesheet" />  
    <link href="<?=base_url().'assets/pages/css/formstyle.css'?>" rel="stylesheet" />    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
</head>
<body class="backgroundbody">		
	<div class="container">
		<?php if($this->session->flashdata('user_registered')):?>
			<?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>';?>
		<?php endif;?>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
				<h1 class="text-center" style="color: black;font-weight: 600;"><?= $title; ?></h1>
				<?php  echo '<div class=" text-danger">'.validation_errors().'</div>'; ?>
			</div>
		</div>
		

		<?php echo form_open('users/register');?>
			<div class="row">
				<div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control registerinput" placeholder="Name">
					</div>
					<div class="form-group">
						<label>ZipCode</label>
						<input type="text" name="zipcode" class="form-control registerinput" placeholder="Zipcode">
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control registerinput" placeholder="Email">
					</div>
					<div class="form-group">
						<label>Username</label>
						<input type="text" name="username" class="form-control registerinput" placeholder="Username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control registerinput" placeholder="Password">
					</div>
					<div class="form-group">
						<label>Confirm Password</label>
						<input type="password" name="password2" class="form-control registerinput" placeholder="Confirm Password">
					</div>
					<div class="form-group">
						<button type="submit" class="btnregister">Register</button>
					</div>
					<div class="dont-have-acc">
						<h5>Already have an account? <a href="<?php echo site_url('users/login')?>"><strong> Sign in</strong></a></h5>
					</div>
				</div>
			</div>
		<?php echo form_close();?>
	</div>


	<script src="<?=base_url().'assets/pages/js/jquery.js'?>"></script>		
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url().'assets/pages/js/bootstrap.min.js'?>"></script>	
	<script src="<?=base_url().'assets/pages/js/wow.min.js'?>"></script>

	<script>
        var timeout = 5000;
        $('.alert-success').delay(timeout).fadeOut(300);
        $('.alert-primary').delay(timeout).fadeOut(300);
        $('.alert-danger').delay(timeout).fadeOut(300);
    </script>
</body>
</html>