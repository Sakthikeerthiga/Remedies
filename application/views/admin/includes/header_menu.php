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
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    
    </ul>
    
  
    <ul class="navbar-nav ml-auto">
     
        <li class="nav-item">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <img src="img/nobody.jpg" class="ts-avatar hidden-side" alt="">
                <?php if(!empty($this->session->userdata('admin_login')['is_admin'])){  ?>
                  <input type="hidden" name="admin_userid" value="<?php echo $this->session->userdata('admin_login')['admin_userid'];?>">

                <?php } ?> 
                <i class="fas fa-angle-down hidden-side"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <a href="c-password.php" class="dropdown-item">Change Password</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TechieSurf</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Blog <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all-posts.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Posts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add-post.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Post</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="add-categories.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Categories</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="all-categories.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Categories</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>Questions <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all-questions.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Questions</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add-question.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Question</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add-tags.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Tags</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="all-tags.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Tags</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Users <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="all-users.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="subscribers.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Subscribers</p>
                </a>
              </li>
                <?php if($_SESSION['aid']=='1'){ ?>
              <li class="nav-item">
                <a href="all-admin.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Admin</p>
                </a>
              </li>
                <?php } ?>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-mobile"></i>
              <p>Application <i class="fas fa-angle-left right"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="app-categories-list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>App Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add-app-category.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add App Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="app-images-list.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>App Images</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="add-app-images.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add App Images</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>

