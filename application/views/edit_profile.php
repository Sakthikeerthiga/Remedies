<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->database();
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>

<a class="btn" data-toggle="modal" href="#userModal" ></a>

<div class="modal fade" id="userModal" tabindex="-1" data-toggle="modal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
  <form action="update-user" method="post">
    <input type="hidden" class="form-control" name="user_id" placeholder="Enter First Name" value="<?php echo $this->session->userdata('logged_user')['user_id']?>">
    <div class="form-group">
      <input type="text" class="form-control" name="firstName" placeholder="Enter First Name" required="required" value="<?php echo (!empty($userdata)) ?  ($userdata[0]->firstName) : ''?>">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" required="required" value="<?php echo (!empty($userdata)) ? $userdata[0]->lastName : ''?>">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="screenName" placeholder="Enter User Name" id="username" onkeyup="ValidateUsername();" autocomplete="off" required value="<?php echo (!empty($userdata)) ? $userdata[0]->screenName : '' ?>">
      <span id="error_username" style="color: red;"></span>
    </div>
    <div class="form-group">
      <input type="text" id="email" name="email" class="form-control" placeholder="E-mail here" onkeyup="ValidateEmail();" autocomplete="off" value="<?php echo (!empty($userdata)) ? $userdata[0]->email : '' ?>" required>
      <span id="error_email" style="color: red;"></span>
    </div>
    <div class="form-group">
      <textarea class="form-control" name="Address" placeholder="Enter Address" required="required"><?php echo (!empty($userdata)) ? $userdata[0]->Address : ''?></textarea>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="Country" placeholder="Enter Country" required="required" value="<?php echo (!empty($userdata)) ? $userdata[0]->Country : '' ?>">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="City" placeholder="Enter City" required="required" value="<?php echo (!empty($userdata)) ? $userdata[0]->City : ''?>">
    </div>
    <div class="form-group">
      <input type="text" class="form-control" name="mobileNo" placeholder="Enter Mobile Number" id="user_mobile" required="required"  autocomplete="off" value="<?php echo (!empty($userdata)) ? $userdata[0]->mobileNo : ''?>"><span id="error_mobileno" style="color: red;"></span>
    </div>
    <div class="form-group">
      <input type="text" class="form-control datepicker" name="dob" placeholder="Enter Date of Birth" id="user_dob" required="required" autocomplete="off"  value="<?php echo (!empty($userdata)) ? $userdata[0]->dob : ''?>">
    </div>
    <div class="form-group">
      <select class="form-control gender-dropdown" name="gender" required>
        <option value=""> -- Select gender-- </option>
        <option value="male" <?php if(!empty($userdata[0])){ echo ($userdata[0]->gender == 'male')?"selected":""; }?> >Male</option>
        <option value="female" <?php if(!empty($userdata[0])){  echo ($userdata[0]->gender == 'female')?"selected":""; }?> >Female</option>
      </select>
      <!-- <input type="text" class="form-control" placeholder="Enter Gender" required="required"> -->
    </div>
    <div class="modal-footer">
      <input class="btn btn-primary px-5" type="submit" id="update_user" value="SUBMIT"  >  
    </div>
  </form>

</div>

</div>
</div>
</div>



<!-- footer menu -->
<?php  $this->load->view('includes/footer_menu.php');?>
<script type="text/javascript">
  $(window).on('load',function(){
    $('#userModal').modal('show');
  });
</script>