<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
      <li class="breadcrumb-item" ><a href="<?php echo base_url();?>contact-us" style="color: #93909c;">Contact us</a></li>
    </ol>
  </nav>
</div>



<section class="section pt-0">
  <div class="container">
   <!--Section: Contact v.2-->
 <div class="row">
      <div class="col-12">
    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

   <form action="<?php echo base_url();?>save-contact" method="POST">
            <div class="form-group row align-items-center">
              <label class="col-lg-2 col-md-3"> Name </label>
              <div class="col-md-4 xdr-select">
                <input type="text" class="form-control" name="firstName" placeholder="Enter First Name" required="required" value="">
              </div>
              <div class="col-md-4 xdr-select">
                <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" required="required" value="">
              </div>
            </div>

            <div class="form-group row align-items-center">
              <label class="col-lg-2 col-md-3"> Email </label>
              <div class="col-md-8 xdr-select">
                <input type="text" id="email" name="email" class="form-control" onkeyup="emailFormat();" placeholder="E-mail here" autocomplete="off" value="" required>
                <span id="error_email" style="color: red;"></span>
              </div>
            </div>
        
         <div class="form-group row align-items-center">
              <label class="col-lg-2 col-md-3"> Subject </label>
              <div class="col-md-8 xdr-select">
                <input type="text" id="email" name="subject" class="form-control" placeholder="Subject here" autocomplete="off" value="" required>
              </div>
            </div>
        <div class="form-group row">
          <label class="col-lg-2 col-md-3">Your message</label>
          <div class="col-md-8 xdr-select">
            <textarea class="form-control " name="warnings" rows="3" placeholder="Text formating here"></textarea>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-12 text-center">
            <input class="btn btn-primary px-5" type="submit" class="btn btn-primary px-5">
          </div>
        </div>
      </form>

<!--Section: Contact v.2-->
</div>
</div>
    </div>
  </section>





  <!-- footer menu -->
  <?php  $this->load->view('includes/footer_menu.php');?>
  <script type="text/javascript">
    
    function emailFormat() {
    var regex =  /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
    var email = $("#email").val(); 
    if(!regex.test(email)) {
        jQuery("#error_email").html("Please Enter the vaild email");  
        $(':input[type="submit"]').prop('disabled', true);
    }else{
        jQuery("#error_email").html("");  
        $(':input[type="submit"]').prop('disabled', false);
    }
  }
  </script>
