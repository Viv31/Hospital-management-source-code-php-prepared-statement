<?php
include_once('inc/header.php');
?>
<div class="container-fluid" id="foreget_password_container">
<div class="container">
	<div class="row">
		<div class="col-md-6 mx-auto" id="forget_password_div">
			<div class="form-group">
				<label>Enter Registered Email</label>
				<input type="email" name="user_email"  id="email" placeholder="Enter Your Email" class="form-control" onkeyup = "return checkemail();" autocomplete="off">
				<div id="chkemail"></div>
				<div id="email_error_msg"></div>

			</div>
			<div class="form-group">
				<label>New Password </label>
				<input type="password" name="userpassword"  id="userpassword" placeholder="Enter Your Password" class="form-control" autocomplete="off">
				<div id="password_error_msg"></div>

			</div>
			<div class="form-group">
				<label>Confirm Password</label>
				<input type="password" name="confuserpassword"  id="confuserpassword" placeholder="Enter Your Password Again" class="form-control">
				<div id="confirmpassword_error_msg"></div>

			</div>
			<button type="button" class="btn btn-info" id="reset_password">Update Password</button>
		</div>
	</div>

	<div class="col-md-3"></div>
  <div class="col-md-6 mt-5 mx-auto" id="alert_box">
    <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong>Password Updated Successfully.
</div>
  
</div>
<div class="col-md-3"></div>
</div>
</div>

<?php include_once('inc/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#alert_box").hide();

		$("#userpassword").prop("disabled",true);
		$("#confuserpassword").prop("disabled",true);
		$("#reset_password").prop("disabled",true);


		$("#reset_password").click(function(){
			var new_pawd = $("#userpassword").val();
			var confirm_pawd = $("#confuserpassword").val();
			var email = $("#email").val();

			if(email == ""){
				$("#email").css("border","3px solid red");
				$("#email").focus();
				setTimeout("$('#email').css('border','')",3000);
				return false;
			}

			if(new_pawd == ""){
				$("#new_pawd").css("border","3px solid red");
				$("#new_pawd").focus();
				setTimeout("$('#new_pawd').css('border','')",3000);
				return false;
			}

			if(confirm_pawd == ""){
				$("#confirm_pawd").css("border","3px solid red");
				$("#confirm_pawd").focus();
				setTimeout("$('#confirm_pawd').css('border','')",3000);
				return false;
			}



			var data = { 
				"new_pawd":new_pawd,
				"confirm_pawd":confirm_pawd,
				"email":email

			};

			$.ajax({
				type:"POST",
				url:"reset_password.php",
				data:data,

				success:function(res){
					//alert(res);
					$("#alert_box").show();
					
				}


			});

		});

	});


	function checkemail()
{
	//alert("hello");
 var email=document.getElementById( "email" ).value;

 if(email == ""){

 		$("#email_error_msg").show();
 		$("#email").focus();
		$("#email_error_msg").css("color","#CC0000");
		$("#email_error_msg").text("Please Enter registerd email");
		setTimeout("$('#email_error_msg').fadeOut(); ", 3000);
		
		$("#userpassword").prop("disabled",true);
		$("#confuserpassword").prop("disabled",true);
		$("#reset_password").prop("disabled",true);
		return false;
 }
    
 if(email)
 {
  $.ajax({
  type: 'post',
  url: 'checkemail.php',
  data: {
   	email:email,
  },
  success: function (response) {
   $( '#chkemail' ).html(response);
   if(response=="OK")   
   {
    return true; 

   }
   else
   {
    return false;   
   }
  }
  });
 }
 else
 {
  $( '#chkemail' ).html("");
  return false;
 }
}
</script>
