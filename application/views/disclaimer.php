<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>

<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
      <li class="breadcrumb-item" ><a href="<?php echo base_url();?>disclaimer" style="color: #93909c;">Disclaimer</a></li>
    </ol>
  </nav>
</div>



<section class="section pt-0">
  <div class="container">
    <div class="row">

      <div class="col-12">
        <h2 class="font-weight-black text-uppercase mb-5">Disclaimer</h2>
        <?php if(!empty($disclaimer)){ 
          foreach($disclaimer as $disclaimer){ ?>
            <div class="col-lg-12 col-md-12">
              <div class="team">
                <div class="team__info">
                  <h6>
                    <?php echo $disclaimer['title']; ?>
                  </h6>
                  <p>
                    <?php  echo $disclaimer['shortName']; ?>
                  </p>
                  <p class="lead">
                    <?php  echo $disclaimer['body']; ?>

                  </p>
                  <div class="team__txt">
                    <p>
                      <?php  echo  $disclaimer['legalVettingName']; ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          <?php } }else{ ?>
            <center><p>No data found. </p></center>
          <?php  } ?>
        </div> <!-- END col-12 -->
      </div>
    </div>
  </section>





  <!-- footer menu -->
  <?php  $this->load->view('includes/footer_menu.php');?>
