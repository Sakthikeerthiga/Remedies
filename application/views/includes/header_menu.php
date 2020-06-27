<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">

  <!--Title-->
  <title>Best Remedies</title>
  <!-- Google font -->
  <link
  href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,700;0,900;1,800&family=Open+Sans:ital,wght@0,400;0,600;1,400&display=swap"
  rel="stylesheet">

  <!-- CSS -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">
  <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet">
</head>

<body>

  <header class="site-header">

    <div class="header-top">
      <div class="container">
        <input type="hidden" name="user_id" class="userId" value="<?php echo (!empty($this->session->userdata('logged_user')['user_id'])) ? $this->session->userdata('logged_user')['user_id'] : '' ?>">
        <?php if(!empty($this->session->userdata('logged_user')['screenName'])){ ?>
          <p class="mb-0 text-right text-secondary pt-4">
            <div class="dropdown" style="text-align: right;">
              Welcome<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $this->session->userdata('logged_user')['screenName'] ?></a>
              <div class="dropdown-menu logout">
                <a class="dropdown-item" href="<?php echo base_url();?>profile">Edit Profile</a>
                <a class="divider"></a>
                <a class="dropdown-item" href="<?php echo base_url();?>logout">Logout</a>
              </div>
            </div>
          </p>
        <?php }else{ ?>
        <p class="mb-0 text-right text-secondary pt-4">
          <a href="<?php echo base_url(); ?>sign-up">Sign up
          </a>
          /
          <a href="<?php echo base_url(); ?>login">
          login</a>
        </p>
      <?php } ?>
      </div>
    </div><!-- END header-top -->

    <nav class="site-nav">
      <div class="container">
        <div class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img src="<?php echo base_url(); ?>assets/img/best-remedies-logo.png" alt="">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#br_navbar_sm"
          aria-controls="br_navbar_sm" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="br_navbar_sm">
          <ul class="navbar-nav ml-auto main-menu">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>">Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>about-us">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>condition-list">Conditions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>remedies-list">Remedies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url(); ?>article-list">Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact us</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  
</header>