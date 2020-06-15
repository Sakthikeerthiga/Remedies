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
           <?php echo $article_details[0]['seo_title'] ?>
          </h2>
          <h4>
            ARTICLE WRITTEN BY JOHN DOE
          </h4>
          <p>
            Article reviewed by Jane Doe
          </p>
        </div>
        <div class="col-lg-8 article-details">
          <img src="https://dummyimage.com/745x365/3c7800/ffffff.jpg&text=GRAPH+HERE" alt="">
          <p class="font-italic mt-4 mb-5">
            <a href="#">
              <u>
                Cited Supplements by testimonies
              </u>
            </a>
          </p>
          <img src="https://dummyimage.com/730x100/914E05/ffffff.jpg&text=adds+here" alt="">
          <h2>
            HEADING 2
          </h2>
          <p>
           <?php echo $article_details[0]['seo_description']; ?>
          </p>
          <img src="https://dummyimage.com/745x365/3c7800/ffffff.jpg&text=GRAPH+HERE" alt="">
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
            <ul class="list-unstyled text-secondary">
              <li> <a href="#"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, </a></li>
              <li> <a href="#"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, </a></li>
              <li> <a href="#"> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, </a></li>
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

        <div class="col-lg-4 d-flex flex-column mt-5 mt-lg-0">
          <div class="xdr-adds-container space-5 mt-0 text-center">
            <img class="rounded ml-auto" src="https://dummyimage.com/300x300/914E05/ffffff.jpg&amp;text=adds+here"
              alt="">
          </div>
          <div class="container-related-article">
            <h4>
              RELATED ARTICLES
            </h4>

            <article class="article-related mb-5">
              <h4 class="text-secondary">
                HAY FEVER
              </h4>
              <img class="rounded my-3" src="https://dummyimage.com/300x200/3c7800/ffffff.jpg&amp;text=adds+here"
                alt="">
              <h4>
                LOREM IPSUM
              </h4>
              <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat.
              </p>
              <a href="#" class="link">
                Read more
              </a>
            </article>

            <article class="article-related mb-5">
              <h4 class="text-secondary">
                HAY FEVER
              </h4>
              <img class="rounded my-3" src="https://dummyimage.com/300x200/3c7800/ffffff.jpg&amp;text=adds+here"
                alt="">
              <h4>
                LOREM IPSUM
              </h4>
              <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat.
              </p>
              <a href="#" class="link">
                Read more
              </a>
            </article>

            <article class="article-related mb-5">
              <h4 class="text-secondary">
                HAY FEVER
              </h4>
              <img class="rounded my-3" src="https://dummyimage.com/300x200/3c7800/ffffff.jpg&amp;text=adds+here"
                alt="">
              <h4>
                LOREM IPSUM
              </h4>
              <p>
                Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut
                labore et dolore magna aliquyam erat.
              </p>
              <a href="#" class="link">
                Read more
              </a>
            </article>

          </div><!-- END container-related-article -->
          <div class="xdr-adds-container mt-auto">
            <img class="rounded" src="https://dummyimage.com/300x600/914E05/ffffff.jpg&amp;text=adds+here" alt="">
          </div>

        </div><!-- END col-lg-4 -->


      </div> <!-- END row -->

      </>
  </section>
<?php } ?>
	<!-- footer menu -->
	<?php  $this->load->view('includes/footer_menu.php');?>
