<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - SB Editor</title>
  <link href="<?php echo base_url();?>assets/css/admin/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <?php if(current_url()!= base_url()."Editor"){
  foreach ($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; } ?>
</head>
<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo base_url();?>Editor"><img class="nav-logo" src="<?php echo base_url(); ?>assets/img/best-remedies-logo.png" alt=""></a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
      </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url();?>Editor/logout">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading"></div>
           <?php $url_id =  $this->uri->segment('4'); ?>

            <a class="nav-link <?php echo (current_url() == base_url().'Editor/sickness' || current_url() == base_url().'Editor/sickness/add' || current_url() == base_url().'Editor/sickness/read/'.$url_id || current_url() == base_url().'Editor/sickness/clone'.$url_id) ? '': 'collapsed' ?> " href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-thermometer-full"></i></div>
              Sickness
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion" <?php if (current_url() == base_url().'Editor/sickness' || current_url() == base_url().'Editor/sickness/add' || current_url() == base_url().'Editor/sickness/read/'.$url_id || current_url() == base_url().'Editor/sickness/clone'.$url_id ) {?> style="display:block" <?php } ?>>
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link <?php echo (current_url() == base_url().'Editor/sickness' || current_url() == base_url().'Editor/sickness/add' || current_url() == base_url().'Editor/sickness/read/'.$url_id || current_url() == base_url().'Editor/sickness/clone'.$url_id) ? 'active': '' ?>" href="<?php echo site_url('Editor/sickness')?>">Conditions</a>
              </nav>
            </div>

            <a class="nav-link  <?php echo (current_url() == base_url().'Editor/remedy' ||  current_url() == base_url().'Editor/remedy/add' ||  current_url() == base_url().'Editor/remedy/read/'.$url_id ||  current_url() == base_url().'Editor/remedy/clone/'.$url_id || current_url() == base_url().'Editor/dosageUnit' || current_url() == base_url().'Editor/dosageUnit/add' || current_url() == base_url().'Editor/dosageUnit/read/'.$url_id || current_url() == base_url().'Editor/dosageUnit/clone/'.$url_id ||  current_url() == base_url().'Editor/duration' || current_url() == base_url().'Editor/duration/add' || current_url() == base_url().'Editor/duration/read/'.$url_id || current_url() == base_url().'Editor/duration/clone/'.$url_id || current_url() == base_url().'Editor/availability' || current_url() == base_url().'Editor/availability/add' || current_url() == base_url().'Editor/availability/read/'.$url_id || current_url() == base_url().'Editor/availability/clone/'.$url_id ||  current_url() == base_url().'Editor/reliefType' ||  current_url() == base_url().'Editor/reliefType/add' ||  current_url() == base_url().'Editor/reliefType/read/'.$url_id ||  current_url() == base_url().'Editor/reliefType/clone/'.$url_id) ? '': 'collapsed' ?> " href="#" data-toggle="collapse" data-target="#collapseLayouts_condition" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa fa-tint"></i></div>
              supplements
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts_condition" aria-labelledby="headingOne" data-parent="#sidenavAccordion" <?php if (current_url() == base_url().'Editor/remedy' ||  current_url() == base_url().'Editor/remedy/add' ||  current_url() == base_url().'Editor/remedy/read/'.$url_id ||  current_url() == base_url().'Editor/remedy/clone/'.$url_id || current_url() == base_url().'Editor/dosageUnit' || current_url() == base_url().'Editor/dosageUnit/add' || current_url() == base_url().'Editor/dosageUnit/read/'.$url_id || current_url() == base_url().'Editor/dosageUnit/clone/'.$url_id ||  current_url() == base_url().'Editor/duration' || current_url() == base_url().'Editor/duration/add' || current_url() == base_url().'Editor/duration/read/'.$url_id || current_url() == base_url().'Editor/duration/clone/'.$url_id || current_url() == base_url().'Editor/availability' || current_url() == base_url().'Editor/availability/add' || current_url() == base_url().'Editor/availability/read/'.$url_id || current_url() == base_url().'Editor/availability/clone/'.$url_id ||  current_url() == base_url().'Editor/reliefType' ||  current_url() == base_url().'Editor/reliefType/add' ||  current_url() == base_url().'Editor/reliefType/read/'.$url_id ||  current_url() == base_url().'Editor/reliefType/clone/'.$url_id) {?> style="display:block" <?php } ?>>
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link <?php echo (current_url() == base_url().'Editor/remedy' ||  current_url() == base_url().'Editor/remedy/add' ||  current_url() == base_url().'Editor/remedy/read/'.$url_id ||  current_url() == base_url().'Editor/remedy/clone/'.$url_id ) ? 'active': '' ?> " href="<?php echo site_url('Editor/remedy')?>">Remedy</a>

                <a class="nav-link <?php echo ( current_url() == base_url().'Editor/dosageUnit' || current_url() == base_url().'Editor/dosageUnit/add' || current_url() == base_url().'Editor/dosageUnit/read/'.$url_id || current_url() == base_url().'Editor/dosageUnit/clone/'.$url_id) ? 'active': '' ?>"  href="<?php echo site_url('Editor/dosageUnit')?>">Dosage Unit</a>

                <a class="nav-link <?php echo (  current_url() == base_url().'Editor/duration' || current_url() == base_url().'Editor/duration/add' || current_url() == base_url().'Editor/duration/read/'.$url_id || current_url() == base_url().'Editor/duration/clone/'.$url_id) ? 'active': '' ?> " href="<?php echo site_url('Editor/duration')?>">Duration</a>

                <a class="nav-link <?php echo (current_url() == base_url().'Editor/availability' || current_url() == base_url().'Editor/availability/add' || current_url() == base_url().'Editor/availability/read/'.$url_id || current_url() == base_url().'Editor/availability/clone/'.$url_id ) ? 'active': '' ?> " href="<?php echo site_url('Editor/availability')?>">Availability</a>

                <a class="nav-link <?php echo  (current_url() == base_url().'Editor/reliefType' ||  current_url() == base_url().'Editor/reliefType/add' ||  current_url() == base_url().'Editor/reliefType/read/'.$url_id ||  current_url() == base_url().'Editor/reliefType/clone/'.$url_id) ? 'active': '' ?> " href="<?php echo site_url('Editor/reliefType')?>">Relief Type</a>
              </nav>
            </div>


            <a class="nav-link <?php echo (current_url() == base_url().'Editor/article' ||  current_url() == base_url().'Editor/article/add' ||  current_url() == base_url().'Editor/article/read/'.$url_id ||  current_url() == base_url().'Editor/article/clone/'.$url_id) ? '': 'collapsed' ?> " href="#" data-toggle="collapse" data-target="#collapseLayouts_article" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
              Articles
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts_article" aria-labelledby="headingOne" data-parent="#sidenavAccordion" <?php if (current_url() == base_url().'Editor/article' ||  current_url() == base_url().'Editor/articleSuccess' ) {?> style="display:block" <?php } ?>>
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link" href="<?php echo site_url('Editor/article')?>">Articles</a>
              </nav>
            </div>

          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small"></div>
        </div>
      </nav>
    </div>