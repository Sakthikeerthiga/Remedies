<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>

<!-- breadcrumb section -->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
      <li class="breadcrumb-item" ><a href="<?php echo base_url();?><?php echo $breadcrumb_url?>"><?php echo $breadcrumb; ?></a></li>
      <li class="breadcrumb-item" ><a href="#" style="color: #93909c;">Testimony</a></li>
    </ol>
  </nav>
</div>

<!--End of breadcrumb section -->

  <section class="section pt-0">
    <div class="container">
<?php if(!empty($testimonial_details)){ ?>

      <div class="row">
        <div class="col-12">
          <h2 class="text-uppercase space-mb-4">
            RESULT BY TESTIMONIES
          </h2>
<!--  <h4>
RESULT BY TESTIMONIES
</h4> -->
</div>
 <div class="col-lg-8 article-details">

          <img src="https://dummyimage.com/745x365/3c7800/ffffff.jpg&text=Image+Here" alt="">
          <img src="https://dummyimage.com/745x365/3c7800/ffffff.jpg&text=Image+Here" alt="">
          <p class="font-italic mt-4 mb-5">
           <!--  <a href="#">
              <u>
                See stories/testimonies/reliefs linked to this ailment
              </u>
            </a> -->
          </p>
          <img src="https://dummyimage.com/730x100/914E05/ffffff.jpg&text=adds+here" alt="">

          <ul class="list-unstyled testimonial-discussion-group">
            <li>
              <div class="testimonial-discussion">
                <div class="testimonial-discussion__header">
                  <h4 class="text-primary mb-2">
                    <span class="text-secondary">REMEDY:</span>
                    APPLY CIDER VINEGAR
                  </h4>
                  <div class="row no-gutters">
                    <div class="col-6 small">
                      <strong>Username:</strong>
                      John Doe
                      <br>
                      <strong>Status:</strong>
                      User
                      <small>(3 post)</small>
                    </div>
                    <div class="col-6 small">
                      <strong>
                        <span class="text-primary">Overall Experience:</span>
                        Positive
                      </strong>
                      <br>
                      <strong>
                        <span class="text-primary">Specific Experience:</span>
                        Complete and Permanent Relief
                      </strong>
                      <br>
                      <span class="text-primary">Date Posted:</span>
                      18-05-2020
                    </div>
                  </div>
                </div>
                <div class="testimonial-discussion__body">
                  Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                  labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                  et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
                  ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                  dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                  rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
                  dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                  dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea
                  rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                </div>
                <div class="testimonial-discussion__footer">
                  <div class="row no-gutters">
                    <div class="col-6">
                      <ul class="list-unstyled text-primary font-weight-semibold">
                        <li>
                          Remedy Administered by: SELF
                        </li>
                        <li>
                          Remedy Administered to: SELF
                        </li>
                      </ul>
                    </div>
                    <div class="col-6">
                      <ul class="list-unstyled">
                        <li class="text-danger font-weight-semibold">
                          <a href="#" class="d-flex">
                            <img src="assets/img/supplement_icon.svg" height="25" class="mr-1 mb-0" alt="">
                            <u>
                              Check this supplement near you!
                            </u>
                          </a>
                        </li>
                        <li>
                          Read more about:
                          <a href="#">
                            <u>Apple Cider Vinegar</u>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <ul class="list-unstyled text-secondary mt-3">
                <li>
                  <a href="#">
                    <u>
                      Reply to the post above post here....
                    </u>
                  </a>
                </li>
                <li>
                  <a href="#">
                    <u>
                      But if you had a similar experience please post a separate testimony here
                    </u>
                  </a>
                </li>
              </ul>

              <div class="testimonial-discussion-reply">
                <div class="testimonial-discussion">
                  <div class="testimonial-discussion__header">
                    <div class="row no-gutters">
                      <div class="col-6 small">
                        <strong>Username:</strong>
                        John Doe
                        <br>
                        <strong>Status:</strong>
                        User
                        <small>(3 post)</small>
                      </div>
                      <div class="col-6 small">
                        <span class="text-primary">Date Posted:</span>
                        18-05-2020
                      </div>
                    </div>
                  </div>
                  <div class="testimonial-discussion__body">
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                    labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
                    et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                  </div>
                </div>
                <!-- END testimonial-discussion -->
              </div>
              <!-- END testimonial-discussion-reply -->
            </li>

             

             

        </div>
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
        else{
        ?>

        <p> No related articles found </p>

      <?php } ?>

      </div><!-- END container-related-article -->
      <div class="xdr-adds-container mt-auto">
        <img class="rounded" src="https://dummyimage.com/300x600/914E05/ffffff.jpg&amp;text=adds+here" alt="">
      </div>

    </div><!-- END col-lg-4 -->
    <!-- End of related article -->
  </div> <!-- END row -->
<?php } ?>

</div>
</section>
<!-- footer menu -->
<?php  $this->load->view('includes/footer_menu.php');?>
