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
      <li class="breadcrumb-item" ><a href="<?php echo base_url();?>"></a></li>
      <li class="breadcrumb-item" ><a href="#" style="color: #93909c;">Testimony</a></li>
    </ol>
  </nav>
</div>

<!--End of breadcrumb section -->

<!-- section start -->
<section class="section pt-0">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="mb-5">
          <h4>
            SHARE YOUR STORY/REMEDY:
          </h4>
          <h2 class="font-weight-black text-uppercase my-4"> THANK YOU FOR SHARING </h2>
          <p class="lead">
            Thank you for caring about others! The world needs more people who care enough about their fellow human
            beings to take a few minutes out of their time and share something that can tremendously help them in
            achieveing better health!
          </p>

        </div>
        <form action="<?php echo base_url();?>update-testimony" method="POST">
          <?php foreach($testimonial_details as $testimony){?>
            <input type="hidden" name="testimonial_id" value="<?php echo $testimony['idtestimony']; ?>" >
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">Select Sickness</label>
            <div class="col-md-5 xdr-select">
              <select class="sickness_search form-control" name="sickness_idsickness"  required>
                <option selected="selected">Select Sickness name</option>
                <?php foreach ($sickness as $key => $sick) { ?>
                <option value="<?php echo $sick['idsickness']?>" <?php echo ($testimony['sickness_idsickness'] == $sick['idsickness']) ? 'selected' : '' ?>><?php echo $sick['commonName']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3">Select Remedy </label>
          <div class="col-md-5 xdr-select">
            <select class="remedy_search form-control" name="remedy_idremedy" required>
              <option selected="selected"> Select Remedy name </option>
              <?php foreach ($remedies as $key => $remedy) { ?>
                <option value="<?php echo $remedy['idremedy'] ?>" <?php echo ($testimony['remedy_idremedy'] == $remedy['idremedy']) ? 'selected' : '' ?>><?php echo $remedy['name']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> Administered By </label>
          <div class="col-md-8 xdr-select">
            <select class="selectpicker" name="administeredBy" data-live-search="true" required>
              <option selected="selected"> Select Administered By </option>
              <option value="1" <?php echo ($testimony['administeredBy'] == 1) ? 'selected' : '' ?>>Self</option>
              <option value="2" <?php echo ($testimony['administeredBy'] == 2) ? 'selected' : '' ?>>Medical Doctor</option>
              <option value="3" <?php echo ($testimony['administeredBy'] == 3) ? 'selected' : '' ?>>Other</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> Compose </label>
          <div class="col-md-8 xdr-select">
            <textarea class="form-control texteditor" name="story" rows="7" placeholder="Text formating here"><?php echo $testimony['story'] ?></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> Dosage </label>
          <div class="col-md-8 xdr-select">
             <select class="selectpicker" name="dosage" data-live-search="true" required>
              <option selected="selected"> Select dosage</option>
              <?php foreach ($dosage_unit as $key => $dosage) { ?>
                <option value="<?php echo $dosage['iddosageUnit'] ?>"  <?php echo ($testimony['dosage'] == $dosage['iddosageUnit']) ? 'selected' : '' ?> ><?php echo $dosage['unitName'].' '.$dosage['unitShortName']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> select Relief</label>
          <div class="col-md-8 xdr-select">
            <select class="relief_type form-group" name="relief_idrelief" required>
              <option selected="selected"> Select Relief Id Relief</option>
              <?php foreach ($relief_type as $key => $relief) { ?>
                <option value="<?php echo $relief['idrelief'] ?>" <?php echo ($testimony['relief_idrelief'] == $relief['idrelief']) ? 'selected' : '' ?>><?php echo $relief['type']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> Administered To </label>
          <div class="col-md-8 xdr-select">
            <select class="selectpicker" name="administeredTo" data-live-search="true" required>
              <option selected="selected"> Select Administered To </option>
              <option value="1"  <?php echo ($testimony['administeredTo'] == 1) ? 'selected' : '' ?>>Self</option>
              <option value="2"  <?php echo ($testimony['administeredTo'] == 2) ? 'selected' : '' ?>>Patient</option>
              <option value="3"  <?php echo ($testimony['administeredTo'] == 3) ? 'selected' : '' ?>>Other</option>
            </select>
          </div>
        </div>


        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> OverallExperience </label>
          <div class="col-md-8 xdr-select">
            <select class="selectpicker" name="overallExperience" data-live-search="true" required>
              <option selected="selected"> Select OverallExperience </option>
              <option value="1" <?php echo ($testimony['overallExperience'] == 1) ? 'selected' : '' ?> >Positive</option>
              <option value="2" <?php echo ($testimony['overallExperience'] == 2) ? 'selected' : '' ?> >Negative</option>
              <option value="3" <?php echo ($testimony['overallExperience'] == 3) ? 'selected' : '' ?> >No Effect</option>
            </select>
          </div>
        </div>
        

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> Text formating here </label>
          <div class="col-md-8 xdr-select">
            <textarea class="form-control texteditor" name="warnings" rows="3" placeholder="Text formating here"><?php echo $testimony['warnings'] ?></textarea>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-12 text-center">
            <button class="btn btn-primary px-5">Update</button>
          </div>
        </div>

     <?php } ?>
      </form>


    </div> <!-- END col-12 -->

  </div> <!-- END row -->

  <div class="row">

  </div><!-- END row -->
</div>
</section>
<!-- section End -->

<!-- footer menu -->
<?php  $this->load->view('includes/footer_menu.php');?>
<script type="text/javascript">
$(".sickness_search").select2({
    minimumInputLength: 2,
    tags: true,
    ajax: {
        url: URL,
        dataType: 'json',
        type: "GET",
        quietMillis: 50,
        data: function (term) {
            return {
                term: term
            };
        },
        results: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        text: item.completeName,
                        slug: item.slug,
                        id: item.id
                    }
                })
            };
        }
    }
});

$(".sickness_search").select2({
  tags: true
});

$(".remedy_search").select2({
  tags: true
});


$(".relief_type").select2({
});
</script>