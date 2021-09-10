<?php

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">

    <!-- Bootstrap core CSS -->
<link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">

  </head>
  <body>
<!--NavBar Start-->
     <nav class="navbar navbar-expand-md navbar-default bg-dark text-uppercase tex fixed-top" id="mainNav">
      <div class="container">
       <a href="<?php echo base_url()?>" class="navbar-brand">
            <img src="<?= base_url('assets/Image/Logo.png') ?>" width="250" height="50" alt="handsOfRecords" href="">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('release')?>">Release</a>
            </li>
             <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('artist')?>">Artist</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('about')?>">About</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="<?php echo base_url('login')?>">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    </div>
  </div>
</nav>
<!--Navbar End-->