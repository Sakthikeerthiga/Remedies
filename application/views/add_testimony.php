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
        <form action="<?php echo base_url();?>save-testimony" method="POST">
          <?php if(empty($this->session->userdata('logged_user'))){ ?>
            <div class="form-group row align-items-center">
              <label class="col-lg-2 col-md-3"> Name </label>
              <div class="col-md-4 xdr-select">
                <input type="text" class="form-control" name="firstName" placeholder="Enter First Name" required="required" value="">
              </div>
              <div class="col-md-4 xdr-select">
                <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" required="required" value="">
              </div>
            </div>

            <div class="form-group row align-items-center">
              <label class="col-lg-2 col-md-3"> User Name </label>
              <div class="col-md-8 xdr-select">
                <input type="text" class="form-control" name="screenName" placeholder="Enter User Name" id="username" onkeyup="ValidateUsername();" autocomplete="off" required value="">
                <span id="error_username" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group row align-items-center">
              <label class="col-lg-2 col-md-3"> Email </label>
              <div class="col-md-8 xdr-select">
                <input type="text" id="email" name="email" class="form-control" placeholder="E-mail here" onkeyup="ValidateEmail();" autocomplete="off" value="" required>
                <span id="error_email" style="color: red;"></span>
              </div>
            </div>

            <div class="form-group row align-items-center">
              <label class="col-lg-2 col-md-3"> Pasword </label>
              <div class="col-md-8 xdr-select">
                <input type="password" id="password" name="password" class="form-control" placeholder="Pasword here" required>
              </div>
            </div>
        <?php  } ?>
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">Select Sickness</label>
            <div class="col-md-5 xdr-select">
              <select class="sickness_search form-control" name="sickness_idsickness"  required>
                <option selected="selected">Select Sickness name</option>
                <?php foreach ($sickness as $key => $sick) { ?>
                <option value="<?php echo $sick['idsickness']?>"><?php echo $sick['commonName']?></option>
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
                <option value="<?php echo $remedy['idremedy'] ?>"><?php echo $remedy['name']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> Administered By </label>
          <div class="col-md-8 xdr-select">
            <select class="selectpicker" name="administeredBy" data-live-search="true" required>
              <option selected="selected"> Select Administered By </option>
              <option value="1">Self</option>
              <option value="2">Medical Doctor</option>
              <option value="3">Other</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> Compose </label>
          <div class="col-md-8 xdr-select">
            <textarea class="form-control texteditor" name="story" rows="7" placeholder="Text formating here"></textarea>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> Dosage </label>
          <div class="col-md-8 xdr-select">
            <input type="text" class="form-control" name="dosage" required>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> select Relief</label>
          <div class="col-md-8 xdr-select">
            <select class="relief_type form-group" name="relief_idrelief" required>
              <option selected="selected"> Select Relief Id Relief</option>
              <?php foreach ($relief_type as $key => $relief) { ?>
                <option value="<?php echo $relief['idrelief'] ?>"><?php echo $relief['type']?></option>
              <?php } ?>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> Administered To </label>
          <div class="col-md-8 xdr-select">
            <select class="selectpicker" name="administeredTo" data-live-search="true" required>
              <option selected="selected"> Select Administered To </option>
              <option value="1">Self</option>
              <option value="2">Patient</option>
              <option value="3">Other</option>
            </select>
          </div>
        </div>


        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> OverallExperience </label>
          <div class="col-md-8 xdr-select">
            <select class="selectpicker" name="overallExperience" data-live-search="true" required>
              <option selected="selected"> Select OverallExperience </option>
              <option value="1">Positive</option>
              <option value="2">Negative</option>
              <option value="3">No Effect</option>
            </select>
          </div>
        </div>
        

        <div class="form-group row">
          <label class="col-lg-2 col-md-3"> Text formating here </label>
          <div class="col-md-8 xdr-select">
            <textarea class="form-control texteditor" name="warnings" rows="3" placeholder="Text formating here"></textarea>
          </div>
        </div>

        <div class="row mt-5">
          <div class="col-12 text-center">
            <button class="btn btn-primary px-5">SUBMIT</button>
          </div>
        </div>
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