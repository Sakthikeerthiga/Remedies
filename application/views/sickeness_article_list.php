<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>

<?php
$dataPoints = array();
foreach($remedy_chart as $remedychart) {
  array_push($dataPoints, array("y"=> $remedychart['testimony_count'],"label"=>$remedychart['remedy_name']));
}


$dataPoints1 = array();
foreach($relief_chart as $reliefchart) {
  array_push($dataPoints1, array("y"=> $reliefchart['relief_count'],"label"=>$reliefchart['relief_name']));
}

?>




<script>

  window.onload = function() {

    CanvasJS.addColorSet("greenShades",
[//colorSet Array

"#2B60DE",
"#B161ED",
"#ED61B5",
"#ED616F",
"#ED6B61",
"#ED8261",
"#EDDF61",
"#FFFD7F",
"#ACFF80",
"#66B93A"          
]);

    var chart = new CanvasJS.Chart("chartContainer", {
      colorSet: "greenShades",
      animationEnabled: true,
      exportEnabled: true,
theme: "light1", // "light1", "light2", "dark1", "dark2"
title:{
  text: "Remedies for this sickness",
  fontColor: "#66B93A",
  fontFamily: "tahoma",
  fontSize: 30
},
axisY: {
  title: "Testimonial Count",
  labelFontColor: "#3ABA8D",
  titleFontColor: "#3ABA8D"

},
axisX:{
  labelFontColor: "#151B8D",
},
data: [{
  type: "bar",
  yValueFormatString: "",
  indexLabel: "{y}",
  indexLabelPlacement: "inside",
  indexLabelFontWeight: "bolder",
  indexLabelFontColor: "white",
  dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
}]
});
    chart.render();




    var chart = new CanvasJS.Chart("chartContainer1", {
      animationEnabled: true,
      exportEnabled: true,
theme: "light1", // "light1", "light2", "dark1", "dark2"
title:{
  text: "Relief for this sickness",
  fontColor: "#66B93A",
  fontFamily: "tahoma",

},
axisY: {
  title: "User's vote Count",
  labelFontColor: "#3ABA8D",
  titleFontColor: "#3ABA8D"

},
axisX:{
  labelFontColor: "#151B8D",
},
data: [{
  type: "bar",
  yValueFormatString: "",
  indexLabel: "{y}",
  indexLabelPlacement: "inside",
  indexLabelFontWeight: "bolder",
  indexLabelFontColor: "white",
  dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
}]
});
    chart.render();


  }

</script>



<!-- breadcrumb section -->
<div class="container">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
      <li class="breadcrumb-item" ><a href="<?php echo base_url();?>condition-list">Conditions</a></li>
      <li class="breadcrumb-item" ><a href="#" style="color: #93909c;">Article</a></li>
    </ol>
  </nav>
</div>

<!--End of breadcrumb section -->

<section class="section pt-0">

  <div class="container">

    <div class="row">

      <div class="col-12">
        <h2 class="text-uppercase space-mb-4">
          <?php echo strtoupper($sickness_name); ?>
        </h2>
<?php if(!empty($article_details)){ ?>
        <h4>ARTICLE WRITTEN BY <b class="text-secondary"><?php echo strtoupper($author_name[0]->username); ?> </b></h4>
        <?php if(!empty($reviwer_name[0]->username)) { ?>
          <p>ARTICLE REVIEWED BY <b class="text-secondary"><?php echo strtoupper($reviwer_name[0]->username); ?> </b></p>
        <?php } }?>
<!--  <h4>
RESULT BY TESTIMONIES
</h4> -->

<!-- barchart -->
<?php if(!empty($remedy_chart) || !empty($relief_chart) ){ ?>
  <div id="chartContainer" style="height: 370px; width: 100%;"></div><br>
  <div id="chartContainer1" style="height: 370px; width: 100%;"></div>

      <p class="font-italic mt-4 mb-5">
      <a href="<?php if($sickness_slug !=''){ ?><?php echo base_url();?>condition/<?php echo  $sickness_slug?><?php } ?>">
        <u>
          See stories/testimonies/reliefs linked to this ailment
        </u>
      </a>
    </p>
<?php }else{ ?>
  <p class="info_mark">"We are still gathering data on this item and will display at a later
time. But you still can get good information in this page below".</p>
<?php } ?>

<br>
</div>
<?php if(!empty($article_details)){ ?>

  <div class="col-lg-8 article-details">

    <h4 class="text-secondary">
      <center><?php echo strtoupper($article_details[0]['seo_title']); ?></center>
    </h4>
    <img class="rounded my-3" src="<?php echo base_url().'assets/uploads/article/'.$article_details[0]['thumbnailImage'] ?>"
    alt="<?php echo $article_details[0]['imageAltText'] ?>">


    <article style="background-color: #eae6e6;padding:10px;">

      <h4>
        <?php echo $article_details[0]['seo_keywords']; ?>
      </h4>
      <p>

        <?php $string = strip_tags($article_details[0]['seo_description']);
        if (strlen($string) > 100) {

// truncate string
          $stringCut = substr($string, 0, 100);
          $endPoint = strrpos($stringCut, ' ');

//if the string doesn't contain any space then it will cut without word basis.
          $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
        }
        echo '<b class="text-secondary">Description</b> : &nbsp;&nbsp;'.$string;

        ?>

      </p>


      <p>

        <?php $string = $article_details[0]['articlepart'];
        if (strlen($string) > 100) {

// truncate string
          $stringCut = substr($string, 0, 6000);
          $endPoint = strrpos($stringCut, ' ');

//if the string doesn't contain any space then it will cut without word basis.
          $article_part = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
          echo '<b class="text-secondary article_part">Article Details  &nbsp;&nbsp;</b> :'.$article_part;

          echo '&nbsp;&nbsp;&nbsp;<a href="'. base_url().'article-detail/'.$article_details[0]['articleUrl'].'" class="link"> Read more</a>';

        }else{

          echo '<b class="text-secondary article_part">Article Details  &nbsp;&nbsp;</b> :'.$article_details[0]['articlepart'];
        }

        ?>

      </p>
    </article>
    <?php if(isset($get_related_article) && !empty($get_related_article)){ ?>
      <div class="space-5 mb-0">
        <h4 class="text-primary">
          Other articles on this particular condition:
        </h4>
        <ul class="list-unstyled text-secondary link-list-blurb">
          <?php  foreach($get_related_article as $article){ ?>
            <li> <a href="<?php echo base_url().'sickness-articles/'.$article['articleUrl'].'/'.$sickness_name ?>">  <?php echo $article['seo_title']; ?> </a></li>
          <?php } ?>
        </ul>
      </div>
    <?php } ?>
    <?php if($get_article_vote == 0 || $get_article_vote == ''){ ?>
      <div class="article-feedback mt-5 text-center vote-article">
        <h4>
          was this article helpful?
        </h4>
        <button class="btn btn-outline-primary" onclick="rateArticle(<?php echo $article_details[0]['idarticle']; ?> ,'1');"> Yes </button>
        <button class="btn btn-outline-secondary" onclick="rateArticle(<?php echo $article_details[0]['idarticle']; ?> ,'0');"> No </button>
      </div>
    <?php } ?>
    <div class="article-feedback mt-5 text-center article-success-message">

    </div>
  </div><!-- END col-lg-8 -->
<?php }else{ ?>

  <div class="col-lg-8 article-details">

    <h3> <center>No related articles found  </center></h3>

  </div>
<?php } ?>

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
          <img class="rounded my-3" src="<?php echo base_url().'assets/uploads/article/'.$article['thumbnailImage'] ?>"
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

</div>
</section>
<!-- footer menu -->
<?php  $this->load->view('includes/footer_menu.php');?>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
