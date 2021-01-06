<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IWI - Admin</title>
    <link href="<?php echo base_url()?>assets/images/background/logoonly.png" rel="icon">
    <!-- Custom fonts for this template -->
    <link href="<?php echo base_url()?>assets/admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/admin/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url()?>assets/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/summernote/summernote-bs4.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/admin/css/mystyle.css" rel="stylesheet">

</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">IWI Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <?php
                $uri = $_SERVER['REQUEST_URI'];
                $lastIndex = strripos($uri, "/");
                $pageActive = substr($uri, $lastIndex + 1, strlen($uri));
            ?>

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li> -->
            <!-- Nav Item - Dashboard -->
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHome"
                    aria-expanded="true" aria-controls="collapseHome">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Home</span>
                </a>
                <div id="collapseHome" class="collapse <?php echo ($pageActive == 'slideheader' || $pageActive == 'homecontent_id' || $pageActive == 'homecontent_en' || $pageActive == 'columnheader' ? 'show':'')?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Home Page Content</h6>
                        <a class="collapse-item <?php echo ($pageActive == 'slideheader' ? 'active':'')?>" href="<?php echo base_url()?>admin/slideheader">Slide Header</a>
                        <a class="collapse-item <?php echo ($pageActive == 'homecontent_id' || $pageActive == 'homecontent_en' ? 'active':'')?>" href="<?php echo base_url()?>admin/homecontent_id">Home Content</a>
                    </div>
                </div>
            </li>
            <li class="nav-item <?php echo ($pageActive == 'about_id' || $pageActive == 'about_en' ? 'active':'')?>">
                <a class="nav-link" href="<?php echo base_url()?>admin/about_id">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>About</span></a>
            </li>
            <li class="nav-item <?php echo ($pageActive == 'contact' ? 'active':'')?>">
                <a class="nav-link" href="<?php echo base_url()?>admin/contact">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Contact</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Publication
            </div>
            <li class="nav-item <?php echo ($pageActive == 'projects' ? 'active':'')?>">
                <a class="nav-link" href="<?php echo base_url()?>admin/projects">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Project</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Media</span>
                </a>
                <div id="collapseOne" class="collapse <?php echo ($pageActive == 'media' || $pageActive == 'news' ? 'show':'')?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List Media</h6>
                        <a class="collapse-item <?php echo ($pageActive == 'news' ? 'active':'')?>" href="<?php echo base_url()?>admin/news">News</a>
                        <a class="collapse-item <?php echo ($pageActive == 'events' ? 'active':'')?>" href="<?php echo base_url()?>admin/events">Events</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePublication"
                    aria-expanded="true" aria-controls="collapsePublication">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Publication</span>
                </a>
                <div id="collapsePublication" class="collapse <?php echo ($pageActive == 'publication' || $pageActive == 'book' ? 'show':'')?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List Publication</h6>
                        <a class="collapse-item <?php echo ($pageActive == 'book' ? 'active':'')?>" href="<?php echo base_url()?>admin/book">Book & Journal</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>
            <li class="nav-item <?php echo ($pageActive == 'teams' ? 'active':'')?>">
                <a class="nav-link" href="<?php echo base_url()?>admin/teams">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Team</span></a>
            </li>
            <li class="nav-item <?php echo ($pageActive == 'services' ? 'active':'')?>">
                <a class="nav-link" href="<?php echo base_url()?>admin/services">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Services</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Partner & Client</span>
                </a>
                <div id="collapseTwo" class="collapse <?php echo ($pageActive == 'client' || $pageActive == 'country' ? 'show':'')?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">List Partner & Client</h6>
                        <a class="collapse-item <?php echo ($pageActive == 'country' ? 'active':'')?>" href="<?php echo base_url()?>admin/country">Country</a>
                        <a class="collapse-item <?php echo ($pageActive == 'client' ? 'active':'')?>" href="<?php echo base_url()?>admin/client">Partner / Client</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Access
            </div>
            <li class="nav-item <?php echo ($pageActive == 'user' ? 'active':'')?>">
                <a class="nav-link" href="<?php echo base_url()?>admin/user">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>User</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="<?php echo base_url()?>admin/inbox" role="button">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <?php
                                    if($total->total > 0){
                                ?>
                                    <span class="badge badge-danger badge-counter"><?php echo $total->total?></span>
                                <?php
                                    }
                                ?>
                                
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php $this->session->userdata('email'); ?></span>
                                <img class="img-profile rounded-circle"
                                    src="<?php echo base_url()?>assets/images/user/<?php echo $this->session->userdata('image');?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url()?>admin/logout">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

            