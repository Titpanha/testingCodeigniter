<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Backend</title>
    
    <!-- Bootstrap -->
    <link href="<?=base_url().'assets/pages/css/bootstrap.min.css'?>" rel="stylesheet">
	<link rel="stylesheet" href="<?=base_url().'assets/pages/css/font-awesome.min.css'?>">
	<link rel="stylesheet" href="<?=base_url().'assets/pages/css/animate.css'?>">
    <link rel="stylesheet" href="<?=base_url().'assets/pages/css/backend.css'?>">
	<link href="<?=base_url().'assets/pages/css/animate.min.css'?>" rel="stylesheet"> 
	<link href="<?=base_url().'assets/pages/css/style.css'?>" rel="stylesheet" />	
    <!-- custom style -->
    <script src="<?=base_url().'assets/pages/js/backend.js'?>"></script>
    <link href="<?=base_url().'assets/pages/css/post.css'?>" rel="stylesheet" />   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
</head>
<body>
<div class="page-wrapper chiller-theme toggled">
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div id="toggle-sidebar">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>
                <div class="sidebar-brand">
                    <a href="<?php echo site_url('home')?>" style="align:center;">Website</a>
                </div>
                <!-- <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/bootstrap4/assets/img/user.jpg" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">Jhon
                            <strong>Smith</strong>
                        </span>
                        <span class="user-role">Administrator</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div> -->
                <!-- sidebar-header  -->
                <!-- <div class="sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- sidebar-search  -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="<?php echo site_url('posts/create')?>">
                                <i class="fa fa-tachometer"></i>
                                <span>Dashboard</span>
                                <!-- <span class="badge badge-pill badge-danger">New</span> -->
                            </a>
                            <!-- <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Dashboard 1
                                            <span class="badge badge-pill badge-success">Pro</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Dashboard 3</a>
                                    </li>
                                </ul>
                            </div> -->
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="<?php echo site_url('posts/postslist')?>">
                                <i class="fa fa-shopping-cart"></i>
                                <span>List Post</span>
                                
                            </a>
                         
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="<?php echo site_url('categories')?>">
                                <i class="fa fa-list-alt"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="<?php echo site_url('categories/create')?>">
                                <i class="fa fa-list-alt"></i>
                                <span>Create Category</span>
                            </a>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="<?php echo site_url('users/userlist')?>">
                                <i class="fa fa-user"></i>
                                <span>Users</span>
                            </a>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">HTML</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CSS</a></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">JavaScript</a></li>
                              <li role="presentation" class="divider"></li>
                              <li role="presentation"><a role="menuitem" tabindex="-1" href="#">About Us</a></li>
                            </ul>
                        </li>
                        <!-- <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-chart-line"></i>
                                <span>Charts</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Pie chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Line chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Bar chart</a>
                                    </li>
                                    <li>
                                        <a href="#">Histogram</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-globe"></i>
                                <span>Maps</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Google maps</a>
                                    </li>
                                    <li>
                                        <a href="#">Open street map</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-calendar"></i>
                                <span>Calendar</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span>Examples</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-book"></i>
                                <span>Documentation</span>
                            </a>
                        </li>
                    
                    </div> -->
                    <!-- sidebar-menu  -->
                    </ul>
            </div>
            <!-- sidebar-content  -->
            <!-- <div class="sidebar-footer">
                <a href="#">
                    <i class="fa fa-bell"></i>
                    <span class="badge badge-pill badge-warning notification">3</span>
                </a>
                <a href="#">
                    <i class="fa fa-envelope"></i>
                    <span class="badge badge-pill badge-success notification">7</span>
                </a>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="badge-sonar"></span>
                </a>
                <a href="#">
                    <i class="fa fa-power-off"></i>
                </a>
            </div> -->
        </nav>
        <!-- sidebar-wrapper  -->
        <!-- <main class="page-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group col-md-12">
                        <h1>Sidebar template</h1>
                        <p>This is a responsive sidebar template with dropdown menu based on bootstrap 4 framework.</p>

                    </div>
                </div>
  
                <hr> -->
                <!-- <div class="row">
                    <div class="form-group col-md-12">
                        <a href="https://github.com/azouaoui-med/pro-sidebar-template" class="btn btn-secondary" target="_blank">
                            <i class="fab fa-github"></i> View source on Github</a>
                        <a href="https://github.com/azouaoui-med/pro-sidebar-template/archive/gh-pages.zip" class="btn btn-outline-secondary" target="_blank">
                            <i class="fa fa-download"></i> Download code</a>
                    </div>
                </div> -->
            <!-- </div> -->
    <!-- </main> -->
    <!-- page-content" -->
    <main class="page-content">
        <div class="container-fluid">
   
