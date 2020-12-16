
  <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Indonesia Water Institute</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url()?>assets/public/img/favicon.png" rel="icon">
  <link href="<?php echo base_url()?>assets/public/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- CSS -->
  <link href="<?php echo base_url()?>assets/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/public/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/public/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/public/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/public/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/public/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/public/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/public/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/public/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url()?>assets/public/css/mystyle.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top topbar-inner-pages">
    <div class="container d-flex align-items-center">
      <div class="contact-info mr-auto">
        <ul>
          <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com"><?php echo $contact['email']?></a></li>
          <li><i class="icofont-phone"></i><?php echo $contact['phone']?></li>
          <!-- <li><i class="icofont-clock-time icofont-flip-horizontal"></i> Mon-Fri 9am - 5pm</li> -->
        </ul>
      </div>
      <div class="cta">
        <?php
          $language = $this->session->userdata('site_lang');
          if($language == "english"){
        ?>
          <a href="<?php echo base_url()?>home/switchLang/indonesia">Bahasa</a>
        <?php
          }else{
        ?>
          <a href="<?php echo base_url()?>home/switchLang/english">English</a>
        <?php
          }
        ?>
        
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="index.html#header" class="scrollto">Anyar</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.html#header" class="logo mr-auto scrollto"><img src="<?php echo base_url()?>assets/images/background/logo2.png" alt="" class="img-fluid"></a>

      <?php
          $uri = $_SERVER['REQUEST_URI'];
          $lastIndex = strripos($uri, "/");
          $pageActive = substr($uri, $lastIndex + 1, strlen($uri));
      ?>
      
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="<?php echo ($pageActive == 'home' ? 'active':'')?>"><a href="<?php echo base_url()?>home"><?php echo $this->lang->line('home') ?></a></li>
          <li class="<?php echo ($pageActive == 'about' ? 'active':'')?>"><a href="<?php echo base_url()?>about"><?php echo $this->lang->line('about') ?></a></li>
          <li class="<?php echo ($pageActive == 'client' ? 'active':'')?>"><a href="<?php echo base_url()?>client"><?php echo $this->lang->line('client') ?></a></li>
          <li class="<?php echo ($pageActive == 'project' ? 'active':'')?>"><a href="<?php echo base_url()?>project"><?php echo $this->lang->line('project') ?></a></li>
          <li class="<?php echo ($pageActive == 'media' ? 'active':'')?>"><a href="<?php echo base_url()?>media"><?php echo $this->lang->line('media') ?></a></li>
          <li class="<?php echo ($pageActive == 'contact' ? 'active':'')?>"><a href="<?php echo base_url()?>contact"><?php echo $this->lang->line('contact') ?></a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->



  