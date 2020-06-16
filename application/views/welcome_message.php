<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>


<!-- Trending search -->
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
		<div id="listsearch"></div>
	</form>
</div>
</div>
<section class="py-5">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<h2 class="font-weight-black text-uppercase">Trending searches</h2>
			</div>
		</div>
		<div class="row">

			<?php
            if(!empty($trending_result)){
			foreach($trending_result as $trending){ ?>
				<div class="col-lg-3 col-md-6">
					<div class="trending-search-item">
						<h4 class="trending-search-item__heading">
							<?php echo $trending['item_heading'] ?>
						</h4>
						<a href="<?php echo $trending['item_url'] ?>">
							<img class="trending-search-item__img" src="assets/img/home-thumb/<?php echo $trending['item_pic'] ?>" alt="" height="250">
						</a>
						<div class="trending-search-item__content">
							<p>
								Positive Testimonies: <?php echo $trending['item_count'] ?>
							</p>
						</div>
					</div>
				</div>
			<?php } 
		}
		?>

		</div>
	</div>
</section>

<!-- End of trending search -->

<!-- banner section -->
<section class="py-5 bg-warning">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-7">
				<h2 class="share-story-title text-white">
					People need to hear your story! Share your own experience and testimony.... every input counts!
				</h2>
				<a href="#" class="btn btn-danger">
				share now</a>
			</div>
			<div class="col-md-4 ml-auto mt-5 mt-md-0">
				<img src="assets/img/we_care_icon.svg" alt="">
			</div>
		</div>
	</div>
</section>
<!-- end of banner -->

<!-- feature article section -->
<section class="py-5">
	<div class="container">

		<div class="row">
			<div class="col-12">
				<h2 class="font-weight-black text-uppercase mb-4">Featured articles</h2>
				<h4 class="text-primary font-weight-normal">
					6 Health Benefits of Apple Cider Vinegar, Backed by Science
				</h4>
			</div>
		</div>
     <?php if(!empty($article_main_result)){ ?>
		<div class="row">
			<div class="col-lg-7">
				<article class="article article-featured">
					<a href="<?php echo $article_main_result[0]['articleUrl'] ?>" class="article__img">
						<img class="trending-search-item__img" src="assets/img/home-thumb/<?php echo $article_main_result[0]['thumbnailImage']?>" alt="">
					</a>
					<h4 class="article__heading">
						<a href="<?php echo $article_main_result[0]['articleUrl'] ?>" class="article__img">
							<?php echo $article_main_result[0]['seo_title']; ?>
						</a>
					</h4>
					<div class="article__content">
						<p>

							<?php $string = strip_tags($article_main_result[0]['seo_description']);
							if (strlen($string) > 200) {

// truncate string
								$stringCut = substr($string, 0, 200);
								$endPoint = strrpos($stringCut, ' ');

//if the string doesn't contain any space then it will cut without word basis.
								$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
							}
							echo $string;

							?>

						</p>
						<a href="<?php echo $article_main_result[0]['articleUrl']?>" class="link">
							Read more
						</a>
					</div>
				</article>
			</div><!-- END col-lg-7 -->
<?php } ?>

     <?php if(!empty($article_result)){ ?>

			<div class="col-lg-5">
				<?php foreach ($article_result as $key => $article_side) { ?>

					<article class="article row">
						<div class="col-4">
							<a href="<?php echo $article_side['articleUrl'] ?>" class="article__img">
								<img class="trending-search-item__img" src="assets/img/home-thumb/<?php echo $article_side['thumbnailImage'] ?>" alt="" height="160">
							</a>
						</div>

						<div class="col-8">
							<h4 class="article__heading">
								<?php echo $article_side['seo_title']; ?>
							</h4>
							<div class="article__content">
								<p>

									<?php $string = strip_tags($article_side['seo_description']);
									if (strlen($string) > 130) {

// truncate string
										$stringCut = substr($string, 0, 130);
										$endPoint = strrpos($stringCut, ' ');

//if the string doesn't contain any space then it will cut without word basis.
										$string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
									}
									echo $string;

									?>

								</p>
								<a href="<?php echo $article_side['articleUrl']?>" class="link">
									Read more
								</a>
							</div>
						</div>
					</article>
				<?php } ?>
			</div><!-- END col-lg-5 -->
<?php } ?>
		</div><!-- END row -->


	</div>
</section>
<!-- end of article section -->

<!-- mission section -->

  <section class="section pt-5">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <h2 class="font-weight-black text-uppercase mb-4 text-primary">
            Our Mission
          </h2>
        </div>
        <div class="col-12 mt-1">
        <?php if(!empty($mission_text)){ ?>
          <div class="ec-video-container">
            <iframe src="<?php echo $mission_text[0]['videoUrl'] ?>" frameborder="0"
              allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen="allowfullscreen"></iframe>
          </div>
          <div class="mt-4 lead">
            <p>
             <?php echo $mission_text[0]['qualityPromise']?>
            </p>
          </div>
      <?php } ?>
        </div>
      </div><!-- END row -->
    </div>
  </section>

  <!-- End of mission section -->



	<!-- footer menu -->
	<?php  $this->load->view('includes/footer_menu.php');?>
