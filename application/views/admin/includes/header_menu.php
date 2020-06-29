<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Dashboard - SB Admin</title>
  <link href="<?php echo base_url();?>assets/css/admin/styles.css" rel="stylesheet" />
  <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
  <?php if(current_url() == base_url()."Admin" || current_url() == base_url()."admin"){
  }else{
  foreach ($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
  <?php endforeach; } ?>
</head>
<body class="sb-nav-fixed">
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo base_url();?>Admin"><img class="nav-logo" src="<?php echo base_url(); ?>assets/img/best-remedies-logo.png" alt=""></a>
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
          <a class="dropdown-item" href="<?php echo base_url();?>Admin/logout">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <?php $url_id =  $this->uri->segment('4'); ?>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
          <div class="nav">
            <div class="sb-sidenav-menu-heading"></div>
            <a class="nav-link <?php echo (current_url() == base_url().'Admin/user' || current_url() == base_url().'Admin/user/add' || current_url() == base_url().'Admin/user/edit/'.$url_id || current_url() == base_url().'Admin/user/read/'.$url_id || current_url() == base_url().'Admin/user/clone/'.$url_id ) ? 'active': '' ?>" href="<?php echo site_url('Admin/user')?>">
              <div class="sb-nav-link-icon"><i class="fa fa-user"></i></div>
              Users
            </a>
            
            <a class="nav-link  <?php echo (current_url() == base_url().'Admin/questionCategory' || current_url() == base_url().'Admin/questionCategory/add' || current_url() == base_url().'Admin/questionCategory/edit/'.$url_id  || current_url() == base_url().'Admin/questionCategory/read/'.$url_id || current_url() == base_url().'Admin/questionCategory/clone/'.$url_id  ||  current_url() == base_url().'Admin/questions'  ||  current_url() == base_url().'Admin/questions/add'  ||  current_url() == base_url().'Admin/questions/edit/'.$url_id   ||  current_url() == base_url().'Admin/questions/read/'.$url_id ||  current_url() == base_url().'Admin/questions/clone/'.$url_id) ? '': 'collapsed' ?> " href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
              Question Section
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
           
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion" <?php if (current_url() == base_url().'Admin/questionCategory' || current_url() == base_url().'Admin/questionCategory/add' || current_url() == base_url().'Admin/questionCategory/edit/'.$url_id  || current_url() == base_url().'Admin/questionCategory/read/'.$url_id || current_url() == base_url().'Admin/questionCategory/clone/'.$url_id  ||  current_url() == base_url().'Admin/questions'  ||  current_url() == base_url().'Admin/questions/add'  ||  current_url() == base_url().'Admin/questions/edit/'.$url_id   ||  current_url() == base_url().'Admin/questions/read/'.$url_id ||  current_url() == base_url().'Admin/questions/clone/'.$url_id) {?> style="display:block" <?php } ?>>
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link  <?php echo (current_url() == base_url().'Admin/questionCategory' || current_url() == base_url().'Admin/questionCategory/add' || current_url() == base_url().'Admin/questionCategory/edit/'.$url_id  || current_url() == base_url().'Admin/questionCategory/read/'.$url_id || current_url() == base_url().'Admin/questionCategory/clone/'.$url_id)? 'active' : '' ?>" href="<?php echo site_url('Admin/questionCategory')?>">Question Category</a>
                
                <a class="nav-link <?php echo ( current_url() == base_url().'Admin/questions'  ||  current_url() == base_url().'Admin/questions/add'  ||  current_url() == base_url().'Admin/questions/edit/'.$url_id   ||  current_url() == base_url().'Admin/questions/read/'.$url_id ||  current_url() == base_url().'Admin/questions/clone/'.$url_id) ? 'active': '' ?> " href="<?php echo site_url('Admin/questions')?>">Questions</a>
              </nav>
            </div>


            <a class="nav-link  <?php echo (current_url() == base_url().'Admin/homePage' || current_url() == base_url().'Admin/homePage/add' || current_url() == base_url().'Admin/homePage/edit/'.$url_id || current_url() == base_url().'Admin/homePage/read/'.$url_id || current_url() == base_url().'Admin/homePage/clone/'.$url_id ) ? 'active': '' ?>"  href="<?php echo site_url('Admin/homePage')?>">
              <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
              Home Page
            </a>

            <a class="nav-link <?php echo (current_url() == base_url().'Admin/disclaimer' || current_url() == base_url().'Admin/disclaimer/add' || current_url() == base_url().'Admin/disclaimer/edit/'.$url_id || current_url() == base_url().'Admin/disclaimer/read/'.$url_id || current_url() == base_url().'Admin/disclaimer/clone/'.$url_id ) ? 'active': '' ?>"  href="<?php echo site_url('Admin/disclaimer')?>">
              <div class="sb-nav-link-icon"><i class="fas fa-bandcamp"></i></div>
              Disclaimers
            </a>

            <a class="nav-link <?php echo (current_url() == base_url().'Admin/brands' || current_url() == base_url().'Admin/brands/add' || current_url() == base_url().'Admin/brands/edit/'.$url_id || current_url() == base_url().'Admin/brands/read/'.$url_id || current_url() == base_url().'Admin/brands/clone/'.$url_id ) ? 'active': '' ?>"  href="<?php echo site_url('Admin/brands')?>">
              <div class="sb-nav-link-icon"><i class="fa fa-cube" aria-hidden="true"></i></div>
              Brands
            </a>


            <a class="nav-link <?php echo (current_url() == base_url().'Admin/sickness' || current_url() == base_url().'Admin/sickness/add' || current_url() == base_url().'Admin/sickness/edit/'.$url_id || current_url() == base_url().'Admin/sickness/read/'.$url_id || current_url() == base_url().'Admin/sickness/clone/'.$url_id) ? '': 'collapsed' ?> " href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
              <div class="sb-nav-link-icon"><i class="fas fa-thermometer-full"></i></div>
              Sickness
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion" <?php if (current_url() == base_url().'Admin/sickness' || current_url() == base_url().'Admin/sickness/add' || current_url() == base_url().'Admin/sickness/edit/'.$url_id || current_url() == base_url().'Admin/sickness/read/'.$url_id || current_url() == base_url().'Admin/sickness/clone/'.$url_id) {?> style="display:block" <?php } ?>>
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link  <?php echo (current_url() == base_url().'Admin/sickness' || current_url() == base_url().'Admin/sickness/add' || current_url() == base_url().'Admin/sickness/edit/'.$url_id || current_url() == base_url().'Admin/sickness/read/'.$url_id || current_url() == base_url().'Admin/sickness/clone/'.$url_id) ? 'active': '' ?> "  href="<?php echo site_url('Admin/sickness')?>">Conditions</a>
              </nav>
            </div>

              <a class="nav-link  <?php echo (current_url() == base_url().'Admin/remedy' ||  current_url() == base_url().'Admin/remedy/add' ||  current_url() == base_url().'Admin/remedy/read/'.$url_id  ||  current_url() == base_url().'Admin/remedy/edit/'.$url_id  ||  current_url() == base_url().'Admin/remedy/clone/'.$url_id || current_url() == base_url().'Admin/dosageUnit' || current_url() == base_url().'Admin/dosageUnit/add' || current_url() == base_url().'Admin/dosageUnit/edit/'.$url_id   || current_url() == base_url().'Admin/dosageUnit/read/'.$url_id || current_url() == base_url().'Admin/dosageUnit/clone/'.$url_id ||  current_url() == base_url().'Admin/duration' || current_url() == base_url().'Admin/duration/edit/'.$url_id || current_url() == base_url().'Admin/duration/add' || current_url() == base_url().'Admin/duration/read/'.$url_id || current_url() == base_url().'Admin/duration/clone/'.$url_id || current_url() == base_url().'Admin/availability' || current_url() == base_url().'Admin/availability/add'  || current_url() == base_url().'Admin/availability/edit/'.$url_id  || current_url() == base_url().'Admin/availability/read/'.$url_id || current_url() == base_url().'Admin/availability/clone/'.$url_id ||  current_url() == base_url().'Admin/reliefType' ||  current_url() == base_url().'Admin/reliefType/add' ||  current_url() == base_url().'Admin/reliefType/edit/'.$url_id ||  current_url() == base_url().'Admin/reliefType/read/'.$url_id ||  current_url() == base_url().'Admin/reliefType/clone/'.$url_id) ? '': 'collapsed' ?> " href="#" data-toggle="collapse" data-target="#collapseLayouts_condition" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa fa-tint"></i></div>
              supplements
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseLayouts_condition" aria-labelledby="headingOne" data-parent="#sidenavAccordion" <?php if (current_url() == base_url().'Admin/remedy' ||  current_url() == base_url().'Admin/remedy/add' ||  current_url() == base_url().'Admin/remedy/read/'.$url_id  ||  current_url() == base_url().'Admin/remedy/edit/'.$url_id  ||  current_url() == base_url().'Admin/remedy/clone/'.$url_id || current_url() == base_url().'Admin/dosageUnit' || current_url() == base_url().'Admin/dosageUnit/add' || current_url() == base_url().'Admin/dosageUnit/edit/'.$url_id   || current_url() == base_url().'Admin/dosageUnit/read/'.$url_id || current_url() == base_url().'Admin/dosageUnit/clone/'.$url_id ||  current_url() == base_url().'Admin/duration' || current_url() == base_url().'Admin/duration/edit/'.$url_id || current_url() == base_url().'Admin/duration/add' || current_url() == base_url().'Admin/duration/read/'.$url_id || current_url() == base_url().'Admin/duration/clone/'.$url_id || current_url() == base_url().'Admin/availability' || current_url() == base_url().'Admin/availability/add'  || current_url() == base_url().'Admin/availability/edit/'.$url_id  || current_url() == base_url().'Admin/availability/read/'.$url_id || current_url() == base_url().'Admin/availability/clone/'.$url_id ||  current_url() == base_url().'Admin/reliefType' ||  current_url() == base_url().'Admin/reliefType/add' ||  current_url() == base_url().'Admin/reliefType/edit/'.$url_id ||  current_url() == base_url().'Admin/reliefType/read/'.$url_id ||  current_url() == base_url().'Admin/reliefType/clone/'.$url_id) {?> style="display:block" <?php } ?>>
              <nav class="sb-sidenav-menu-nested nav">
              <a class="nav-link <?php echo (current_url() == base_url().'Admin/remedy' ||  current_url() == base_url().'Admin/remedy/add' ||  current_url() == base_url().'Admin/remedy/read/'.$url_id ||  current_url() == base_url().'Admin/remedy/edit/'.$url_id ||  current_url() == base_url().'Admin/remedy/clone/'.$url_id ) ? 'active': '' ?> " href="<?php echo site_url('Admin/remedy')?>">Remedy</a>

              <a class="nav-link <?php echo ( current_url() == base_url().'Admin/dosageUnit' || current_url() == base_url().'Admin/dosageUnit/add' || current_url() == base_url().'Admin/dosageUnit/read/'.$url_id ||  current_url() == base_url().'Admin/dosageUnit/edit/'.$url_id || current_url() == base_url().'Admin/dosageUnit/clone/'.$url_id) ? 'active': '' ?>"  href="<?php echo site_url('Admin/dosageUnit')?>">Dosage Unit</a>

              <a class="nav-link <?php echo (  current_url() == base_url().'Admin/duration' || current_url() == base_url().'Admin/duration/add' || current_url() == base_url().'Admin/duration/read/'.$url_id  || current_url() == base_url().'Admin/duration/edit/'.$url_id || current_url() == base_url().'Admin/duration/clone/'.$url_id) ? 'active': '' ?> " href="<?php echo site_url('Admin/duration')?>">Duration</a>

              <a class="nav-link <?php echo (current_url() == base_url().'Admin/availability' || current_url() == base_url().'Admin/availability/add' || current_url() == base_url().'Admin/availability/read/'.$url_id || current_url() == base_url().'Admin/availability/edit/'.$url_id || current_url() == base_url().'Admin/availability/clone/'.$url_id ) ? 'active': '' ?> " href="<?php echo site_url('Admin/availability')?>">Availability</a>

              <a class="nav-link <?php echo  (current_url() == base_url().'Admin/reliefType' ||  current_url() == base_url().'Admin/reliefType/add' ||  current_url() == base_url().'Admin/reliefType/read/'.$url_id ||  current_url() == base_url().'Admin/reliefType/edit/'.$url_id ||  current_url() == base_url().'Admin/reliefType/clone/'.$url_id) ? 'active': '' ?> " href="<?php echo site_url('Admin/reliefType')?>">Relief Type</a>
              </nav>
              </div>

            <a class="nav-link <?php echo (current_url() == base_url().'Admin/comment' || current_url() == base_url().'Admin/comment/add' || current_url() == base_url().'Admin/comment/edit/'.$url_id || current_url() == base_url().'Admin/comment/read/'.$url_id || current_url() == base_url().'Admin/comment/clone/'.$url_id ) ? 'active': '' ?>" href="<?php echo site_url('Admin/comment')?>">
              <div class="sb-nav-link-icon"><i class="fas fa-comment"></i></div>
              Comments
            </a>

            <a class="nav-link <?php echo (current_url() == base_url().'Admin/article' || current_url() == base_url().'Admin/article/add' || current_url() == base_url().'Admin/article/edit/'.$url_id || current_url() == base_url().'Admin/article/read/'.$url_id || current_url() == base_url().'Admin/article/clone/'.$url_id ||  current_url() == base_url().'Admin/articleSuccess'   || current_url() == base_url().'Admin/articleSuccess/add' || current_url() == base_url().'Admin/articleSuccess/edit/'.$url_id || current_url() == base_url().'Admin/articleSuccess/read/'.$url_id || current_url() == base_url().'Admin/articleSuccess/clone/'.$url_id ) ? '': 'collapsed' ?> " href="#" data-toggle="collapse" data-target="#collapseLayouts_article" aria-expanded="false" aria-controls="collapseLayouts">
              <div class="sb-nav-link-icon"><i class="fa fa-book"></i></div>
              Articles
              <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts_article" aria-labelledby="headingOne" data-parent="#sidenavAccordion" <?php if (current_url() == base_url().'Admin/article' || current_url() == base_url().'Admin/article/add' || current_url() == base_url().'Admin/article/edit/'.$url_id || current_url() == base_url().'Admin/article/read/'.$url_id || current_url() == base_url().'Admin/article/clone/'.$url_id ||  current_url() == base_url().'Admin/articleSuccess'   || current_url() == base_url().'Admin/articleSuccess/add' || current_url() == base_url().'Admin/articleSuccess/edit/'.$url_id || current_url() == base_url().'Admin/articleSuccess/read/'.$url_id || current_url() == base_url().'Admin/articleSuccess/clone/'.$url_id  ) {?> style="display:block" <?php } ?>>
              <nav class="sb-sidenav-menu-nested nav">
                <a class="nav-link <?php echo (current_url() == base_url().'Admin/article' || current_url() == base_url().'Admin/article/add' || current_url() == base_url().'Admin/article/edit/'.$url_id || current_url() == base_url().'Admin/article/read/'.$url_id || current_url() == base_url().'Admin/article/clone/'.$url_id) ? 'active' :'' ?> " href="<?php echo site_url('Admin/article')?>">Articles</a>
                <a class="nav-link <?php echo (current_url() == base_url().'Admin/articleSuccess' || current_url() == base_url().'Admin/articleSuccess/add' || current_url() == base_url().'Admin/articleSuccess/edit/'.$url_id || current_url() == base_url().'Admin/articleSuccess/read/'.$url_id || current_url() == base_url().'Admin/articleSuccess/clone/'.$url_id) ? 'active' :'' ?> " href="<?php echo site_url('Admin/articleSuccess')?>">Articles Success</a>
              </nav>
            </div>

            <a class="nav-link <?php echo (current_url() == base_url().'Admin/testimony' || current_url() == base_url().'Admin/testimony/add' || current_url() == base_url().'Admin/testimony/edit/'.$url_id || current_url() == base_url().'Admin/testimony/read/'.$url_id || current_url() == base_url().'Admin/testimony/clone/'.$url_id) ? 'active' :'' ?> "  href="<?php echo site_url('Admin/testimony')?>">
              <div class="sb-nav-link-icon"><i class="fas fa-file-text"></i></div>
              Testimonies
            </a>

            <a class="nav-link <?php echo (current_url() == base_url().'Admin/editor' || current_url() == base_url().'Admin/editor/add' || current_url() == base_url().'Admin/editor/edit/'.$url_id || current_url() == base_url().'Admin/editor/read/'.$url_id || current_url() == base_url().'Admin/editor/clone/'.$url_id) ? 'active' :'' ?> "  href="<?php echo site_url('Admin/editor')?>">
              <div class="sb-nav-link-icon"><i class="fas fa-pencil"></i></div>
              Editors
            </a>

            <a class="nav-link <?php echo (current_url() == base_url().'Admin/metaTags' || current_url() == base_url().'Admin/metaTags/add' || current_url() == base_url().'Admin/metaTags/edit/'.$url_id || current_url() == base_url().'Admin/metaTags/read/'.$url_id || current_url() == base_url().'Admin/metaTags/clone/'.$url_id) ? 'active' :'' ?> "  href="<?php echo site_url('Admin/metaTags')?>">
              <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
              Meta Tags 
            </a>

          </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small"></div>
        </div>
      </nav>
    </div>