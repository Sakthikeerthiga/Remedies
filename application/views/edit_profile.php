<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->database();
?>
<!-- header menu -->
<?php  $this->load->view('includes/header_menu.php');?>

<a class="btn" data-toggle="modal" href="#userModal" >Launch Modal</a>

<div class="modal fade" id="userModal" tabindex="-1" data-toggle="modal" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
    <!--     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
      </div>
      <div class="modal-body">
        <form action="update-user" method="post">
            <input type="text" class="form-control" name="user_id" placeholder="Enter First Name" value="<?php echo $this->session->userdata('logged_user')['user_id']?>">
          <div class="form-group">
            <input type="text" class="form-control" name="firstName" placeholder="Enter First Name" required="required">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="lastName" placeholder="Enter Last Name" required="required">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" name="screenName" placeholder="Enter User Name" onkeyup="ValidateUsername();" autocomplete="off" required>
          </div>
           <div class="form-group">
            <input type="text" class="form-control" placeholder="Enter Email" value="<?php echo $this->session->userdata('logged_user')['user_email']?>" readonly >
          </div>
           <div class="form-group">
           	<textarea class="form-control" name="Address" placeholder="Enter Address" required="required"></textarea>
          </div>
           <div class="form-group">
            <input type="text" class="form-control" name="City" placeholder="Enter City" required="required">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" name="Country" placeholder="Enter Country" required="required">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" name="mobileNo" placeholder="Enter Mobile Number" required="required">
          </div>
           <div class="form-group">
            <input type="text" class="form-control" name="status" placeholder="Enter Date of Birth" id="user_dob" required="required" autocomplete="off">
          </div>
          <div class="form-group">
          	<select class="form-control" name="gender" required>
          		<option value=""> -- Select gender-- </option>
          		<option value="male">Male</option>
          		<option value="female">Female</option>
          	</select>
            <!-- <input type="text" class="form-control" placeholder="Enter Gender" required="required"> -->
          </div>
         <div class="modal-footer">
		<input class="btn btn-primary px-5" type="submit" value="SUBMIT"  >  
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