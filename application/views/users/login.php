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
	<link href="<?=base_url().'assets/pages/css/backend.css'?>" rel="stylesheet" />	
    <!-- custom style -->
    <link href="<?=base_url().'assets/pages/css/post.css'?>" rel="stylesheet" />   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
</head>

<body class="backgroundbody">
	
		<?php if($this->session->flashdata('user_loggedout')):?>
			<?php echo '<h3 class="alert alert-info">'.$this->session->flashdata('user_loggedout').'</h3>';?>
			</div>
		<?php endif;?>
	</div>
	
		<a class="btn btn-danger btn-lg btn_style" href="<?php echo site_url('home')?>"><i class="fa fa-arrow-left"> Back to home page!</i></a>
	
	<!-- <div class="loginbox"> -->
	<div class="row logform">
		<div class="col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<?php if($this->session->flashdata('login_failed')):?>
					<?php echo '<h3 class="alert alert-danger">'.$this->session->flashdata('login_failed').'</h3>';?>
			<?php endif;?>
			<?php if($this->session->flashdata('user_loggedout')):?>
            <?php echo '<h3 class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</h3>';?>
        <?php endif;?>
			
				
			<?php echo form_open('users/login');?>
				<h1 class="text-center" style="color: black; font-weight: 800;"><?php echo $title;?></h1>
				
					<div class="form-group">
						<input type="text" name="username" class="form-control inputclass" placeholder="Enter Username" required autofocus>
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control inputclass" placeholder="Enter Password" required autofocus>
					</div>
					<div class="form-group">
						<button type="submit" class="login-button" >Login</button>
					</div>

			<?php form_close();?>
			<div class="dont-have-acc">
				<h5>Don`t have an account? <a href="<?php echo site_url('users/register')?>"><strong> Sign Up</strong></a></h5>
			</div>
		</div>
	</div>
	<script src="<?=base_url().'assets/pages/js/jquery.js'?>"></script>		
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=base_url().'assets/pages/js/bootstrap.min.js'?>"></script>	
	<script src="<?=base_url().'assets/pages/js/wow.min.js'?>"></script>
	<script>
		var timeout = 5000;
        $('.alert-success').delay(timeout).fadeOut(300);
        $('.alert-info').delay(timeout).fadeOut(300);
        $('.alert-danger').delay(timeout).fadeOut(300);
	</script>
</body>
</html>



