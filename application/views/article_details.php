<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>

<!-- breadcrumb section -->
<div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item"><a href="#">Library</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data</li>
      </ol>
    </nav>
  </div>

<!--End of breadcrumb section -->

<?php if(!empty($article_details)){ ?>
 <section class="section pt-0">
    <div class="container">

      <div class="row">
        <div class="col-12">
          <h2 class="text-uppercase space-mb-4">
            HEADING 2
          </h2>
          <h4>
            RESULT BY TESTIMONIES
          </h4>
        </div>

        <div class="col-lg-8 article-details">
          <img src="https://dummyimage.com/745x365/3c7800/ffffff.jpg&text=Image+Here" alt="">
          <img src="https://dummyimage.com/745x365/3c7800/ffffff.jpg&text=Image+Here" alt="">
          <p class="font-italic mt-4 mb-5">
            <a href="#">
              <u>
                See stories/testimonies/reliefs linked to this ailment
              </u>
            </a>
          </p>
          <img src="https://dummyimage.com/730x100/914E05/ffffff.jpg&text=adds+here" alt="">
          <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
            sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
            sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
            vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
            Lorem ipsum dolor sit amet.
          </p>
          <img src="https://dummyimage.com/745x365/3c7800/ffffff.jpg&text=Image+Here" alt="">
          <h2>
            HEADING 2
          </h2>
          <p>
            Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
            dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet
            clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet,
            consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat,
            sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
            sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing
            elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
            vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
            Lorem ipsum dolor sit amet.
          </p>

          <div class="space-5 mb-0">
            <h4 class="text-primary">
              Other articles on this particular condition:
            </h4>
            <ul class="list-unstyled text-secondary link-list-blurb">
               <?php if(isset($get_related_article) && !empty($get_related_article)){ 

            foreach($get_related_article as $article){ ?>
              <li> <a href="<?php echo base_url().''.$article['articleUrl'] ?>">  <?php echo $article['seo_title']; ?> </a></li>
            <?php } } ?>
            </ul>
          </div>
          <div class="article-feedback mt-5 text-center">
            <h4>
              was this article helpful?
            </h4>
            <button class="btn btn-outline-primary"> Yes </button>
            <button class="btn btn-outline-secondary"> No </button>
          </div>
        </div><!-- END col-lg-8 -->

        <!-- Related article section -->
         <div class="col-lg-4 d-flex flex-column mt-5 mt-lg-0">
          <div class="xdr-adds-container space-5 mt-0 text-center">
            <img class="rounded ml-auto" src="https://dummyimage.com/300x300/914E05/ffffff.jpg&amp;text=adds+here"
              alt="">
          </div>
          <div class="container-related-article">
            <h4>
              RELATED ARTICLES
            </h4>
           <?php if(isset($get_related_article) && !empty($get_related_article)){ 

            foreach($get_related_article as $article){ ?>
            <article class="article-related mb-5">
              <h4 class="text-secondary">
                <?php echo $article['seo_title']; ?>
              </h4>
              <img class="rounded my-3" src="<?php echo base_url();?>assets/img/home-thumb/<?php echo $article['thumbnailImage'] ?>"
                alt="<?php echo $article['imageAltText'] ?>">
              <h4>
                <?php echo $article['seo_keywords']; ?>
              </h4>
              <p>
                <p>

              <?php $string = strip_tags($article['seo_description']);
              if (strlen($string) > 100) {

// truncate string
                $stringCut = substr($string, 0, 100);
                $endPoint = strrpos($stringCut, ' ');

//if the string doesn't contain any space then it will cut without word basis.
                $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
              }
              echo $string;

              ?>

            </p>
              </p>
              <a href="<?php echo base_url().''.$article['articleUrl'] ?>" class="link">
                Read more
              </a>
            </article>
            <?php } }
            ?>
           

          </div><!-- END container-related-article -->
          <div class="xdr-adds-container mt-auto">
            <img class="rounded" src="https://dummyimage.com/300x600/914E05/ffffff.jpg&amp;text=adds+here" alt="">
          </div>

        </div><!-- END col-lg-4 -->
        <!-- End of related article -->
      </div> <!-- END row -->

    </div>
  </section>
<?php } ?>
	<!-- footer menu -->
	<?php  $this->load->view('includes/footer_menu.php');?>
