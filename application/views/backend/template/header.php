<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend</title>
    
    <!-- Bootstrap -->
    <!-- <link href="<?=base_url().'assets/pages/css/bootstrap.min.css'?>" rel="stylesheet"> -->
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="<?=base_url().'assets/pages/css/menu.css'?>">
    <!-- <link rel="stylesheet" href="<?=base_url().'assets/pages/css/backend.css'?>"> -->
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- Our Custom CSS -->
  
    <link href="<?=base_url().'assets/pages/css/style.css'?>" rel="stylesheet" />   
    <!-- custom style -->
    <link href="<?=base_url().'assets/pages/css/post.css'?>" rel="stylesheet" />   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
</head>
<body>
    <?php 
        $user_id = $this->session->userdata('user_id');
        $role = $this->db->query("SELECT role_id FROM users WHERE id = $user_id")->row_array();
     ?>
   <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">

                <?php 
                    $user_id = $this->session->userdata('user_id');
                    $img = $this->db->query("SELECT name, profileImage FROM users WHERE id = $user_id")->row_array(); 
                ?>
                <div class="row">
                    <div class="col-sm-5">                    
                        <img src="<?php echo site_url();?>assets/images/profile/<?php echo $img['profileImage']; ?>" alt="avatar" style="width: 50px; height: 50px; border-radius:50%;">
                    </div>
                    <div class="col-sm-7">
                        <p style="color: #FBFCFC; font-weight: 500; font-size: 2em;"><?php echo $img['name']; ?></p>
                    </div>
                </div>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-crosshairs"></i> Posts Management</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="<?php echo site_url('posts/create')?>"><i class="fas fa-plus"></i> Create Post</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('posts/postslist')?>"><i class="fa fa-list-ol"></i> Post lists</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fas fa-sitemap"></i> Categories Management</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                       
                            <li>
                                <a href="<?php echo site_url('categories/create')?>"><i class="fas fa-plus"></i> Create category</a>
                            </li>
                          
                        <li>
                            <a href="<?php echo site_url('categories')?>"><i class="fa fa-list-alt"></i> List categories</a>
                        </li>
                    </ul>
                </li>
                <?php if($role['role_id'] != 2 ) : ?>
                <li>
                    <a href="#users" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users"></i> Users Management</a>
                    <ul class="collapse list-unstyled" id="users">
                        <li>
                            <a href="<?php echo site_url('users/userlist')?>">
                                <i class="fa fa-crosshairs"></i>  Users Lists
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('users/register')?>">
                                <i class="fa fa-user-plus"></i> create user
                            </a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo site_url('home')?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle arrow" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Setting
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="<?php echo site_url('users/profile') ?>">Profile</a>
                                <a class="dropdown-item" href="<?php echo site_url('users/changePwd') ?>">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Setting</a>
                            </div>
                        </li>
                        <?php if($this->session->userdata('logged_in')) : ?>
                            <li class="nav-item move-left">
                                <a href="<?php echo site_url('users/logout')?>" class="nav-link">LogOut</a>
                            </li>
                        <?php endif; ?>
                    </ul>
              </div>
            </nav>

   
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
    </script>

    
    
<?php if($this->session->flashdata('pwd_change_success')):?>
    <?php echo '<h3 class="alert alert-success">'.$this->session->flashdata('pwd_change_success').'</h3>';?>
<?php endif;?>

    
