<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->database();
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>


<!-- Trending search -->
<div class="container">
	<div class="col-lg-5 ml-auto">
		<form action="#" method="POST" autocomplete="off">
			<div class="input-group input-group__search">
				<input type="text" class="form-control" placeholder="Search for specific conditions/sicknesses" id="sample_search" autocomplete="off">
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
		<div id="listsearch"></div>
	</form>
</div>
</div>

<!-- bread crumbs section -->
<div class="container">
	<nav aria-label="breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
			<li class="breadcrumb-item" ><a href="<?php echo base_url();?>condition-list" style="color: #93909c;">Conditions</a></li>
		</ol>
	</nav>
</div>
<!-- end of breadcrumb section -->


<!-- sickness section -->
<section class="section-lg pt-0">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<div class="space-5 mt-0">
					<h2 class="font-weight-black text-uppercase mb-4">
						LIST OF SICKNESS / CONDITIONS
					</h2>
				</div>
			</div>
			<div class="col-lg-8">
				<ul class="list-unstyled link-clouds">
					<?php if(isset($sicknesslist) && $sicknesslist!=''){ 
						foreach ($sicknesslist as $key => $list) { 
							$slugname = str_replace("-", "_", $list['commonName']);
							$sickness_slug = url_title($slugname, 'dash', true);?>
							<li><a href="<?php echo base_url();?>sickness-articles/<?php echo $sickness_slug ?>"> <?php echo $list['commonName'] ?></a><span><?php $Testimoniescnt = $this->db->get_where('testimony', array('sickness_idsickness' => $list['idsickness']))->num_rows();

							if($Testimoniescnt > 0){ ?><a href="<?php echo base_url();?>sickness-testimony/<?php echo $sickness_slug ?>">(<?php echo $Testimoniescnt ?> user stories)</a><?php } ?></span></li>
						<?php } } ?>
						<div class="xdr-adds-container my-4">
							<img class="rounded" src="https://dummyimage.com/730x100/914E05/ffffff.jpg&text=adds+here" alt="">
						</div>
						</ul>

						<?php echo $links; ?>
						<p style="text-align: center;"><?php echo $current; ?></p>
					</div>
					<div class="col-lg-4 d-flex flex-column">
						<div class="xdr-adds-container my-4">
							<img class="rounded" src="https://dummyimage.com/300x200/914E05/ffffff.jpg&text=adds+here" alt="">
						</div>

						<div class="xdr-adds-container mt-auto">
							<img class="rounded" src="https://dummyimage.com/300x600/914E05/ffffff.jpg&text=adds+here" alt="">
						</div>
					</div>
				</div> <!-- END row -->

			</div>
		</section>
		<!--  end of sickness section -->

		<!-- footer menu -->
		<?php  $this->load->view('includes/footer_menu.php');?>
