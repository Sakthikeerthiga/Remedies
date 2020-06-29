<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->database();
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="<?php echo base_url(); ?>assets/css/admin.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="limiter">

  <div class="container-login100">

    <div class="wrap-login100">

      <div class="login100-pic js-tilt" data-tilt>
        <img src="<?php echo base_url(); ?>assets/img/best-remedies-logo.png" alt="">
      </div>

      <form class="login100-form validate-form" method="POST" action="<?php echo base_url().'Editor/editorlogin';?>">
        <span class="login100-form-title">
          Editor Login
        </span>
        <?php if($this->session->flashdata('editor_login_error')){ ?>
          <div class="alert alert-danger">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $this->session->flashdata('editor_login_error'); ?>
          </div>
        <?php } ?>
        <div class="wrap-input100 validate-input" >
          <input class="input100" type="text" name="name" placeholder="Username" required="required">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-envelope" aria-hidden="true"></i>
          </span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Password is required">
          <input class="input100" type="password" name="pwd" placeholder="Password" required="required">
          <span class="focus-input100"></span>
          <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
          </span>
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn">
            Login
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(".close").click(function(){ 
    $(".alert-danger").hide();
  });
</script>