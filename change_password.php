<?php include_once('inc/header.php');
include_once('inc/session.php');
 ?>
 <?php include_once('inc/navbar.php'); ?>
 <div class="container-fluid" id="appointment_container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 mx-auto p-5" id="formdiv">
			
				
					
						<div class="form-group">
							<label>Old Password:</label>
					<input type="password" name="old_password" id="old_password" value="" placeholder="Enter Old Password" class="form-control">
				</div>
					
					
						<div class="form-group">
							<label>New Password:</label>
					<input type="password" id="new_password" placeholder="Enter New Password" name="new_password" class="form-control">
					
				</div>
				<div class="form-group">
							<label>Confirm Password:</label>
					<input type="password" id="confirm_password" name="confirm_password" placeholder="Enter Password Again" class="form-control">
					
				</div>
				<input type="hidden" id="id" name="id" value="<?php echo $_SESSION['userid'] ?>">
				
				 <button type="button" id="update_password" name="update_password" value="Update Password" class="btn btn-info">Update Password</button> 
				
			
		</div>
		<div class="col-md-2"></div>
	</div>
	<div class="col-md-4 mt-5 mx-auto" id="success_alert_box">
    <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong>Password Updated Successfully.
</div>
  
</div>

<div class="col-md-4 mt-5 mx-auto" id="warning_alert_box">
    <div class="alert alert-warning alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Failed!</strong>Password Not matched.
</div>
  
</div>
</div>

<?php include_once('inc/footer.php'); ?>
 <script type="text/javascript">
	$(document).ready(function(){

	$("#success_alert_box").hide();
	$("#warning_alert_box").hide();

		$(document).on("click","#update_password",function(){

			var old_password = $("#old_password").val();
			var new_password = $("#new_password").val();
			var confirm_password = $('#confirm_password').val();
			var id = $("#id").val();
			//alert(id);	

			if(old_password == ""){
				$("#old_password").css("border","3px solid red");
				$("#old_password").focus();
				setTimeout("$('#old_password').css('border','')",3000);
				return false;
			}
			if(new_password == ""){
				$("#new_password").css("border","3px solid red");
				$("#new_password").focus();
				setTimeout("$('#new_password').css('border','')",3000);
				return false;
			}
			if(confirm_password == ""){
				$("#confirm_password").css("border","3px solid red");
				$("#confirm_password").focus();
				setTimeout("$('#confirm_password').css('border','')",3000);
				return false;
			}
			

			var data = { 
				"old_password":old_password,
				"new_password":new_password,
				"confirm_password":confirm_password,
				"id":id
			};

			$.ajax({
				url:'update_password_sub.php',
				method:'POST',
				data:data,
				 success:function(res){
      				//alert(res);
      				if(res == "Password Updated"){
      					
      					$("#success_alert_box").show();
      					
      					return true;

      					$("#old_password").val("");
						 $("#new_password").val("");
			 			$('#confirm_password').val("");

      				}

      				if(res == "Password not matched"){
      					//alert("Password Not Matched");
      					$("#warning_alert_box").show();
      					$("#old_password").css("border","3px solid red");
						$("#old_password").focus();
						setTimeout("$('#old_password').css('border','')",3000);
						return false;

      				}
      				
       			}
			});


		});


	});
</script>
 