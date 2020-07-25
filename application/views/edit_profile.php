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
      <li class="breadcrumb-item" ><a href="#" style="color: #93909c;">Edit Profile</a></li>
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
            Edit  Profile
          </h4>
        </div>
        <form action="update-user" method="post">
          <input type="hidden" class="form-control" name="user_id" placeholder="Enter First Name" value="<?php echo $this->session->userdata('logged_user')['user_id']?>">
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">First Name</label>
            <div class="col-md-8 xdr-select">
              <input type="text" class="form-control" name="firstName" placeholder="Enter First Name" required="required" value="<?php echo (!empty($userdata)) ?  ($userdata[0]->firstName) : ''?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">Last Name</label>
            <div class="col-md-8 xdr-select">
              <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" required="required" value="<?php echo (!empty($userdata)) ? $userdata[0]->lastName : ''?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">User Name</label>
            <div class="col-md-8 xdr-select">
              <input type="text" class="form-control" name="screenName" placeholder="Enter User Name" id="username" onkeyup="ValidateUsername();" autocomplete="off" value="<?php echo (!empty($userdata)) ? $userdata[0]->screenName : '' ?>" >
              <span id="error_username" style="color: red;"></span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">Email</label>
            <div class="col-md-8 xdr-select">
              <input type="text" id="email" name="email" class="form-control" placeholder="E-mail here" onkeyup="ValidateEmail();" autocomplete="off" value="<?php echo (!empty($userdata)) ? $userdata[0]->email : '' ?>" readonly>
              <span id="error_email" style="color: red;"></span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">Address</label>
            <div class="col-md-8 xdr-select">
              <textarea class="form-control" name="Address" placeholder="Enter Address" required="required"><?php echo (!empty($userdata)) ? $userdata[0]->Address : ''?></textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">Country</label>
            <div class="col-md-8 xdr-select">
              <select class="form-control  selectpicker" name="Country" id="country" data-live-search="true" onchange="selectState();" required>
                <option selected="selected">Select Country</option>
                <?php foreach ($countries as $key => $county) { ?>
                  <option value="<?php echo $county['id']?>"  <?php if(!empty($userdata[0])){ echo ($userdata[0]->Country == $county['id'])?"selected":""; }?> ><?php echo $county['countryName']?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">State</label>
            <div class="col-md-8 xdr-select">
              
             <!--   <input type="text" id="selectedState" class="form-control"  value="<?php echo (!empty($userdata[0]->City)) ? $userdata[0]->City : '' ?>" readonly> -->
                <select class="form-control selectpicker" name="City" id="state" data-live-search="true" required style="display: none;">
                  <option selected="selected">Select State</option>
                   <?php foreach ($states as $key => $state) { ?>
                  <option value="<?php echo $state['state_id']?>"  <?php if(!empty($userdata[0])){ echo ($userdata[0]->City == $state['state_id'])?"selected":""; }?> ><?php echo $state['state_name']?></option>
                <?php  } ?>
                </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">Mobile Number</label>
            <div class="col-md-8 xdr-select">
              <input type="text" class="form-control" name="mobileNo" placeholder="Enter Mobile Number" id="user_mobile" required="required"  autocomplete="off" value="<?php echo (!empty($userdata)) ? $userdata[0]->mobileNo : ''?>"><span id="error_mobileno" style="color: red;"></span>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">Date Of Birth</label>
            <div class="col-md-8 xdr-select">
              <input type="text" class="form-control datepicker" name="dob" placeholder="Enter Date of Birth" id="user_dob" required="required" autocomplete="off"  value="<?php echo (!empty($userdata)) ? $userdata[0]->dob : ''?>">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-lg-2 col-md-3">Gender</label>
            <div class="col-md-8 xdr-select">
              <select class="form-control gender-dropdown" name="gender" required>
                <option value=""> -- Select gender-- </option>
                <option value="1" <?php if(!empty($userdata[0])){ echo ($userdata[0]->gender == '1')?"selected":""; }?> >Male</option>
                <option value="2" <?php if(!empty($userdata[0])){  echo ($userdata[0]->gender == '2')?"selected":""; }?> >Female</option>
                <option value="3" <?php if(!empty($userdata[0])){  echo ($userdata[0]->gender == '3')?"selected":""; }?> >Undisclosed</option>
              </select>
              <!-- <input type="text" class="form-control" placeholder="Enter Gender" required="required"> -->
            </div>
          </div>
          <div style="text-align:center"> 
            <input class="btn btn-primary px-5" type="submit" id="update_user" value="UPDATE" > 
          </div>
        </form>

      </div>
    </div>

  </div>
</section>


<!-- footer menu -->
<?php  $this->load->view('includes/footer_menu.php');?>
<script>

  function selectState() {
    var country = $('#country option:selected').text();
    var selectedState = $('#selectedState').val();
    $.ajax({
      url : base_url + 'search_state',
      data: {country:country},
      cache : false,
      type: 'POST',
      success : function(response){
        $('#state').empty();

        var html = '';
        var mySelect = $('#state');
        var dataObj = jQuery.parseJSON(response);
        $.each(dataObj, function(i, v) {
          var ul = document.getElementById("state");
          var li = document.createElement("option");
          li.value = v.state_id;
          li.text = v.state_name;
           ul.appendChild(li);
        })
        if(selectedState !=''){
          $('#state').val(selectedState);
        }
// Example call of 'refresh'
$('#state').selectpicker('refresh');
}
})
  }
</script>