<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->database();
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>

<!-- bread crumbs section -->
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
			<li class="breadcrumb-item" ><a href="#" style="color: #93909c;">Sign-up</a></li>
		</ol>
	</nav>
</div>
<!-- end of breadcrumb section -->


<!-- sign up section -->
<section class="section-lg pt-0">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<div class="space-5 mt-0">
					<h4>
						SIGN UP
					</h4>
					<h2 class="font-weight-black text-uppercase my-4">
						THANK YOU FOR SIGNING UP 
						WITH THIS COMMUNITY
					</h2>
					<p class="lead">
						Thank you for caring about others! The world needs more people who care enough about their fellow human
						beings to take a few minutes out of their time and share something that can tremendously help them in
						achieveing better health!
					</p>

				</div>
			</div> <!-- END col-12 -->
			<div class="col-lg-6 mx-auto mt-4">
				<div class="alert alert-danger" id="err_msg" style="display: none;"><a href="javascript:void(0)" class="close close-alert" aria-label="close">&times;</a><span id="msg">All fields are required</span>
				</div>
				<form action="<?php echo base_url();?>save-data" method="POST">
					<div class="form-group row align-items-center">
						<label class="col-lg-2 col-md-3"> Email </label>
						<div class="col-md-8 xdr-select">
							 <input type="text" class="form-control" name="email" placeholder="Enter User Name" id="email" onkeyup="ValidateEmail();" autocomplete="off" required >
                              &nbsp;&nbsp;<span id="error_email" style="color: red;"></span>
						</div>
					</div>

					<div class="form-group row align-items-center">
						<label class="col-lg-2 col-md-3"> Pasword </label>
						<div class="col-md-8 xdr-select">
							<input type="password" id="password" name="password" class="form-control" placeholder="Pasword here" required>
								</div>
							</div>


							<div class="row space-5">
								<div class="col-12 text-center">
									<input class="btn btn-primary px-5" type="submit" value="SUBMIT" id="submit">  
								</div>
							</div>

						</form>
					</div><!-- END col-lg-6 -->

					<div class="col-12 mt-4">
						<ul class="list-inline text-center">
							<li class="list-inline-item m-2 mx-md-4">
								<a href="#" class="btn-sign-up-with btn-fb">
									<img src="assets/img/fb.svg" height="28" alt="">
									<span>Connect via Facebook</span>
								</a>
							</li>
							<li class="list-inline-item m-2 mx-md-4">
								<a href="#" class="btn-sign-up-with btn-google">
									<img src="assets/img/google.svg" height="28" alt="">
									<span>Connect via Google</span>
								</a>
							</li>
							<li class="list-inline-item m-2 mx-md-4">
								<a href="#" class="btn-sign-up-with btn-mail">
									<img src="assets/img/mail.svg" height="21" alt="">
									<span>Connect via Email</span>
								</a>
							</li>
						</ul>
					</div><!-- END col-12 -->
				</div> <!-- END row -->

			</div>
		</section>
		<!--  end of sickness section -->

		<!-- footer menu -->
		<?php  $this->load->view('includes/footer_menu.php');?>
<script type="text/javascript">  
	$('.close-alert').click(function(){
		$('#err_msg').hide();
	})
</script> 