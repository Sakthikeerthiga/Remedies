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
  <link rel="stylesheet" href="assets/vendor/bootstrap-select-1.13.14/dist/css/bootstrap-select.min.css">
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <header class="site-header">

    <div class="header-top">
      <div class="container">
        <p class="mb-0 text-right text-secondary pt-4">
          <a href="sign-up.html">Sign up
          </a>
          /
          <a href="sign-in.html">
          login</a>
        </p>
      </div>
    </div><!-- END header-top -->

    <nav class="site-nav">
      <div class="container">
        <div class="navbar navbar-expand-lg navbar-light">
          <a class="navbar-brand" href="<?php echo base_url(); ?>">
            <img src="assets/img/best-remedies-logo.png" alt="">
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
              <a class="nav-link" href="about-us.html">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="condition.html">Conditions</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Remedies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="article-details.html">Articles</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact us</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="col-lg-5 ml-auto">
      <form action="#" method="POST">
        <div class="input-group input-group__search">
          <input type="text" class="form-control" placeholder="Search for specific conditions/sicknesses" id="sample_search">
          <div class="input-group-append">
            <button class="btn" type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewbox="0 0 24 24" fill="none"
              stroke="#28CE90" stroke-width="3" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8"></circle>
              <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
            </svg>
          </button>
        </div>
      </div>
      <ul id="listsearch"></ul>
    </form>
  </div>
</div>
</header>