<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Day - HTML Bootstrap Template</title>
    <!-- html ckeditor -->
    <!-- <script src="//cdn.ckeditor.com/4.10.0/full/ckeditor.js"></script> -->
    <script src="<?=base_url().'assets/ckeditor/ckeditor.js'?>"></script>
    <!-- Bootstrap -->
    <link href="<?php echo base_url().'assets/pages/css/bootstrap.min.css'?>" rel="stylesheet">
  
	<link rel="stylesheet" href="<?=base_url().'assets/pages/css/font-awesome.min.css'?>">
	<!-- <link rel="stylesheet" href="<?=base_url().'assets/pages/css/animate.css'?>"> -->
	<link href="<?=base_url().'assets/pages/css/animate.min.css'?>" rel="stylesheet"> 
	<link href="<?=base_url().'assets/pages/css/style.css'?>" rel="stylesheet" />	
    <!-- custom style -->
    <link href="<?=base_url().'assets/pages/css/post.css'?>" rel="stylesheet" /> 
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
  
    




    
  </head>
  <body>	
	<header id="header">
        <nav class="navbar navbar-default navbar-static-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                   <div class="navbar-brand">
						<a href="<?php echo site_url('home')?>"><h1>learnCodeIgniter</h1></a>
					</div>
                </div>				
                <div class="navbar-collapse collapse">							
					<div class="menu">
						<ul class="nav nav-tabs" role="tablist">
							 <!-- <li role="presentation"><a href="<?php echo site_url('home')?>">Home</a></li> -->
							<li role="presentation"><a href="<?php echo site_url('pages/aboutus')?>">About Us</a></li>
							<li role="presentation"><a href="<?php echo site_url('pages/services')?>">Services</a></li>
							<li role="presentation"><a href="<?php echo site_url('pages/gallery')?>">Gallery</a></li>
							<li role="presentation"><a href="<?php echo site_url('pages/contact')?>">Contact</a></li>
                            <li role="presentation"><a href="<?php echo base_url(); ?>posts">blog</a></li>
                            <!-- <li role="presentation"><a href="<?php echo base_url(); ?>categories">Categories</a></li>             -->
							<?php if(!$this->session->userdata('logged_in')) : ?>
							     <li role="presentation"><a href="<?php echo site_url('users/login')?>">login</a></li>
                                 <!-- <li role="presentation"><a class="cd-signin" href="#0">Sign in</a></li> --> 
                
                        	<?php endif;?>
                        	<?php if($this->session->userdata('logged_in')) : ?>	
                               <!--  <li role="presentation"><a href="<?php echo base_url(); ?>categories/create">Create Category</a></li>  -->
                                <!-- <li role="presentation"><a class="cd-signup" href="#0">Sign up</a></li> -->
                                <li role="presentation"><a href="<?php echo site_url('users/logout')?>">logout</a></li>	
                                <li role="presentation"><a href="<?php echo site_url('posts/create')?>">Dashboard</a></li>
                            <?php endif;?>				
						</ul>
					</div>
				</div>		
            </div><!--/.container-->
        </nav><!--/nav-->		
    </header><!--/header-->	
	
	<div class="container">
       
        <!-- message user registered success -->
        <?php if($this->session->flashdata('user_registered')): ?>
            <?php echo '<h3 class="alert alert-success">'.$this->session->flashdata('user_registered').'</h3>';?>
        <?php endif;?> 

        <!-- message post created success -->
        <?php if($this->session->flashdata('post_created')): ?>
            <?php echo '<h3 class="alert alert-success">'.$this->session->flashdata('post_created').'</h3>';?>
        <?php endif;?> 

        <!-- post updated -->
        <?php if($this->session->flashdata('post_updated')): ?>
            <?php echo '<h3 class="alert alert-success">'.$this->session->flashdata('post_updated').'</h3>';?>
        <?php endif;?> 

         <!-- category created success -->
         <?php if($this->session->flashdata('category_created')): ?>
            <?php echo '<h3 class="alert alert-success">'.$this->session->flashdata('category_created').'</h3>';?>
        <?php endif;?>
         <?php if($this->session->flashdata('category_deleted')):?>
            <?php echo '<h3 class="alert alert-success">'.$this->session->flashdata('category_deleted').'</h3>';?>
        <?php endif;?>

        <!-- post_deleted -->
        
         

<!-- <div class="text-center">
    <a href="" class="btn btn-default btn-rounded my-3" data-toggle="modal" data-target="#modalLRForm">Launch Modal LogIn/Register</a>
</div> -->



   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
     <script>
        var timeout = 5000;
        $('.alert-success').delay(timeout).fadeOut(300);
        $('.alert-primary').delay(timeout).fadeOut(300);
        $('.alert-danger').delay(timeout).fadeOut(300);
    </script>   
	
