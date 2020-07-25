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
    <!-- Image loader -->

    <!-- Image loader -->
    <?php if($this->session->flashdata('testimonial_add_msg')){ ?>
      <div class="alert alert-success">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong><?php echo $this->session->flashdata('testimonial_add_msg'); ?></strong>
      </div>
    <?php } ?>

    <?php if(!empty($testimonial_details)){ ?>

      <div class="row">
        <div class="col-12">
          <h2 class="text-uppercase space-mb-4">
            RESULT BY TESTIMONIES FOR <?php echo $testimonial_heading;?>
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
  <?php foreach ($testimonial_details as $key => $testimonial_detail) {
    $post_count =$this->db->get_where('testimony', array('user_iduser' => $testimonial_detail['user_iduser']))->num_rows();
    ?>
    <li>
      <div class="testimonial-discussion">
        <div class="testimonial-discussion__header">
          <h4 class="text-primary mb-2">
            <span class="text-secondary">REMEDY:</span>
            <?php echo $testimonial_detail['name'];?>
          </h4>
          <div class="row no-gutters">
            <div class="col-6 small">
              <strong>Username:</strong>
              <?php echo $testimonial_detail['firstName'] .' '.$testimonial_detail['lastName'] ;?>
              <br>
              <strong>Status:</strong>
              <?php if($testimonial_detail['status'] == 1){?>
                Approved
              <?php }elseif($testimonial_detail['status'] == 2){ ?>
                Pending
              <?php }else{ ?>
                Closed
              <?php } ?>
              <small>( <?php echo $post_count ?> post)</small>
            </div>
            <div class="col-6 small">
              <strong>
                <span class="text-primary">Overall Experience:</span>
                <?php if($testimonial_detail['overallExperience'] == 1){?>
                  Positive
                <?php }elseif($testimonial_detail['overallExperience'] == 2){ ?>
                  Negative
                <?php }else{ ?>
                  No Effect
                <?php } ?>
              </strong>
              <br>
              <strong>
                <span class="text-primary">Specific Experience:</span>
                <?php echo $testimonial_detail['type'];?>
              </strong>
              <br>
              <span class="text-primary">Date Posted:</span>
              <?php echo $testimonial_detail['date'];?>
            </div>
          </div>
        </div>
        <?php if($testimonial_detail['user_iduser'] == $this->session->userdata('logged_user')['user_id']){ ?>
        <div style="float: right;"> <a href="<?php echo base_url().'edit-testimony/'.$testimonial_detail['user_iduser']  ?>"><img src="<?php echo base_url();?>assets/img/edit.svg" height="25" class="mr-1 mb-0" alt=""></a></div>
      <?php } ?>
        <div class="testimonial-discussion__body">
          <?php echo $testimonial_detail['story'];?>
        </div>
        <div class="testimonial-discussion__footer">
          <div class="row no-gutters">
            <div class="col-6">
              <ul class="list-unstyled text-primary font-weight-semibold">
                <li>
                  <?php 
                  if($testimonial_detail['administeredBy'] == 1){
                    $Administered_by = 'Self';
                  }elseif($testimonial_detail['administeredBy'] == 2){
                    $Administered_by = 'Medical Doctor';
                  }elseif($testimonial_detail['administeredBy'] == 3){
                    $Administered_by = 'Other';
                  }
                  ?>
                  Remedy Administered by: <?php echo $Administered_by; ?>
                </li>
                <li>
                  <?php 
                  if($testimonial_detail['administeredTo'] == 1){
                    $Administered_to = 'Self';
                  }elseif($testimonial_detail['administeredTo'] == 2){
                    $Administered_to = 'Patient';
                  }elseif($testimonial_detail['administeredTo'] == 3){
                    $Administered_to = 'Other';
                  }
                  ?>
                  Remedy Administered to: <?php echo $Administered_to; ?>
                </li>
              </ul>
            </div>
            <div class="col-6">
              <ul class="list-unstyled">
                <li class="text-danger font-weight-semibold">
                  <?php if(!empty($testimonial_detail['sellerLink'])) { ?>
                    <a href="<?php echo $testimonial_detail['sellerLink'];?>" target="_blank" class="d-flex">
                    <?php }else{ ?>
                      <a href="JavaScript:Void(0);"  class="d-flex">
                      <?php } ?>
                      <img src="<?php echo base_url();?>assets/img/supplement_icon.svg" height="25" class="mr-1 mb-0" alt="">
                      <u>
                        Check this supplement near you!
                      </u>
                    </a>
                  </li>
                  <li>
                    Read more about:
                    <a href="<?php echo base_url().'remedy-articles/'.$testimonial_detail['link']?>">
                      <u><?php echo $testimonial_detail['name'];?></u>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <ul class="list-unstyled text-secondary mt-3" class="reply_post">
          <div id='loader' style='display: none;'>
            <img src='<?php echo base_url(); ?>assets/img/loader.gif' width='32px' height='32px'>
          </div>
          <li>
            <a href="javascript:void(0);" onclick="add_comment('<?php echo $testimonial_detail['idtestimony'];?>')">
              <u>
                Reply to the post above post here....
              </u>
            </a>
            <div class="tab-pane" id="display_comment_section_<?php echo $testimonial_detail['idtestimony'];?>" style="display: none;">
              <form action="javascript:void(0);" method="post" class="form-horizontal" id="commentForm" role="form"> 
                <div class="form-group"> <span id='close_comment' onclick="close_comment('<?php echo $testimonial_detail['idtestimony'];?>')">x</span></div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Comment</label>
                  <div class="col-sm-10">
                    <textarea class="form-control" name="addComment" id="addComment_<?php echo $testimonial_detail['idtestimony'];?>" rows="5" required=""></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">                    
                    <button class="btn btn-success btn-circle text-uppercase" type="submit" onclick="submitComment('<?php echo $testimonial_detail['idtestimony'];?>')"><span class="glyphicon glyphicon-send"></span> Submit comment</button>
                  </div>
                </div>            
              </form>
            </div>
          </li>
          <li>
            <a href="<?php echo base_url();?>testimonial">
              But if you had a similar experience please post a separate testimony here
            </u>
          </a>
        </li>
      </ul>



      <div class="testimonial_main_comment_<?php echo $testimonial_detail['idtestimony'];?>">
        <?php if(!empty($related_comment)){ 
          foreach($related_comment as $main_comment){ 
            if($testimonial_detail['idtestimony'] ==  $main_comment['testimony_idtestimony']){
              $user_post_count = $this->db->get_where('testimony', array('user_iduser' => $main_comment['user_iduser']))->num_rows();

              ?>
              <div class="testimonial-discussion-reply">
                <div class="testimonial-discussion"><div class="row no-gutters">
                  <div class="col-6 small">
                    <strong>Username:</strong>
                    <?php echo $main_comment['screenName']; ?>
                    <br>
                    <strong>Status:</strong>
                    <?php if($main_comment['status'] == 1){?>
                      Approved
                    <?php }elseif($main_comment['status'] == 2){ ?>
                      Pending
                    <?php }else{ ?>
                      Closed
                    <?php } ?>
                    <small>(<?php echo $user_post_count ?> post)</small>
                  </div>
                  <div class="col-6 small">
                    <span class="text-primary">Date Posted:</span>
                    <?php echo $main_comment['datePosted']; ?>
                  </div>
                </div>
                <div class="testimonial-discussion__body">
                  <?php echo $main_comment['comment']; ?>
                </div> <a class="btn btn-success btn-circle text-uppercase" href="javascript:void(0);" id="reply" onclick="reply_to_comment('<?php echo $main_comment['idcomment'];?>')"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                <!-- reply to comment -->
                <div class="tab-pane" id="reply_to_comment_section_<?php echo $main_comment['idcomment'];?>" style="display: none;">
                  <form action="javascript:void(0);" method="post" class="form-horizontal" id="commentForm" role="form"> 
                    <div class="form-group"> <span id='close_comment' onclick="close_reply('<?php echo $main_comment['idcomment'];?>')">x</span></div>
                    <div class="form-group">
                      <label for="email" class="col-sm-2 control-label">Comment</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" name="replyComment" id="replyComment_<?php echo $main_comment['idcomment'];?>" rows="5" required=""></textarea>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">                    
                        <button class="btn btn-success btn-circle text-uppercase" type="submit" onclick="submitReplyComment('<?php echo $testimonial_detail['idtestimony'];?>','<?php echo  $main_comment['idcomment'];?>')"><span class="glyphicon glyphicon-send"></span> Submit comment</button>
                      </div>
                    </div>            
                  </form>
                </div>
                <!-- end to reply to comment -->
              </div>
            </div>

            <!-- reply commands listing section -->
            <div class="testimonial_reply_comment_<?php echo $main_comment['idcomment'] ;?>">
              <?php if(!empty($additional_reply_comment)){ 
                foreach($additional_reply_comment as $add_comment){  
                  if($main_comment['idcomment'] ==  $add_comment['comment_idcomment']){ 
                    $add_post_count = $this->db->get_where('testimony', array('user_iduser' => $add_comment['user_iduser']))->num_rows();
                    ?>
                    <div class="testimonial-comment-reply">
                      <div class="testimonial-discussion"><div class="row no-gutters">
                        <div class="col-6 small">
                          <strong>Username:</strong>
                          <?php echo $add_comment['screenName']; ?>
                          <br>
                          <strong>Status:</strong>
                          <?php if($add_comment['status'] == 1){?>
                            Approved
                          <?php }elseif($add_comment['status'] == 2){ ?>
                            Pending
                          <?php }else{ ?>
                            Closed
                          <?php } ?>
                          <small>(<?php echo $add_post_count ?> post)</small>
                        </div>
                        <div class="col-6 small">
                          <span class="text-primary">Date Posted:</span>
                          <?php echo $add_comment['datePosted']; ?>
                        </div>
                      </div>
                      <div class="testimonial-discussion__body">
                        <?php echo $add_comment['comment']; ?>
                      </div> 
                      <!-- end to reply to comment -->
                    </div>
                  </div>
                <?php  } } } ?>
              </div>
              <!-- end for listing reply command section -->
            <?php } } }?>
            <!-- END testimonial-discussion -->
          </div>



          <!-- END testimonial-discussion-reply -->
        </li>
      <?php } ?>




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
              <img class="rounded my-3" src="<?php echo base_url();?>assets/uploads/article/<?php echo $article['thumbnailImage'] ?>"
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
              <a href="<?php echo base_url().'article-detail/'.$article['articleUrl'] ?>" class="link">
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