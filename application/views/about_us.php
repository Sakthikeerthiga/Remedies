<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>

<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
        <li class="breadcrumb-item" ><a href="<?php echo base_url();?>about-us" style="color: #93909c;">About Us</a></li>
      </ol>
    </nav>
  </div>



  <section class="section pt-0">
    <div class="container">
      <div class="row">

        <div class="col-12">
          <h2 class="font-weight-black text-uppercase mb-5">ABOUT US</h2>
          <p class="lead">
           <?php if(!empty($content)){ 
            echo $content[0]->bodyText;
            } ?>
          </p>
        </div> <!-- END col-12 -->

     <?php if(!empty($about_us)){ 
        foreach($about_us as $about){ ?>
        <div class="col-lg-3 col-md-6">
          <div class="team">
            <img class="team__img rounded img-responsive" src="<?php echo (!empty($about['profilePic']) ? base_url().'assets/uploads/editors/writers/'.$about['profilePic'] : "https://dummyimage.com/204x204/4D4D4D/ffffff.jpg&text=Image+Here" ); ?>"
              alt="">
            <div class="team__info">
              <h6>
                <?php echo $about['firstName'].'&nbsp'.$about['surname']; ?>
              </h6>
              <p>
                <?php  echo  $about['title']; ?>
              </p>
              <span class="divider"></span>
            </div>
            <div class="team__txt">
              <p>
                <?php  echo  $about['bio']; ?>
              </p>
            </div>
          </div> <!-- END team -->
        </div><!-- END  col-lg-3 col-md-6-->
     
     <?php } }else{ ?>
       <center><p>No data found. </p></center>
     <?php  } ?>
  
      </div> <!-- END row -->
    </div>
  </section>
       





  <!-- footer menu -->
  <?php  $this->load->view('includes/footer_menu.php');?>
