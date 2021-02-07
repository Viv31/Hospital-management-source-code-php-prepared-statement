<?php include_once('inc/header.php'); ?>
<div class="container-fluid" id="formcontainer">
	<div class="col-md-3"></div>
	<div class="col-md-6 mx-auto p-5" id="formdiv">
		<form >
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label>Full Name:</label>
					<input type="text" name="full_name" id = "full_name" class="form-control" placeholder="Enter Fullname">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Age</label>
						<input type="number" name="age" id="age" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Gender:</label>
					<input type="radio" name="gender" id="male" value="Male">Male
					
						<input type="radio" name="gender" id="female" value="Female">Female
				
						</div>
						<div class="form-group">
							<label>Address:</label>
							<textarea name="address" id="address" placeholder="Enter address here" class="form-control"></textarea>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>City:</label>
									<select class="form-control" name="city" id="city">
										<option value="">--Select City--</option>
										<option value="Ujjain">Ujjain</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label>Blood Group:</label>
									<select class="form-control" name="blood_group" id="blood_group">
										<option value="">--Select Blood Group--</option>
										<option value="A+">A+</option>
										<option value="B+">B+</option>
										<option value="B-">B-</option>
										<option value="AB+">AB+</option>
										<option value="AB-">AB-</option>
										<option value="A-">A-</option>
										<option value="O+">O+</option>
										<option value="O-">O-</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label>Email:</label>
									<input type="email" name="user_email" id="user_email"  placeholder="Enter Email" class="form-control" onblur="validateEmail(this);">
									<label id="email_error_msg" style="color: red;"></label>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Password:</label>
										<input type="password" name="user_password" id="user_password"  placeholder="Enter Password" class="form-control">
										<input type="checkbox"  onclick="ShowPass();"><span style="color: white;">Show Password</span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<input type="file" name = "upload_image" id = "upload_image" value="" class="form-control" accept="image/x-png,image/jpeg">
								</div>
									<button type="button" name="submit" id="register" class="btn btn-info btn-block">Register</button>
									<a href="login.php">Back to Login</a>
									</form> 
								</div>
								<div class="col-md-3"></div>
							</div>
							<?php include_once('inc/footer.php'); ?>
							<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click","#register",function(){

			var full_name = $("#full_name").val();
			var age = $("#age").val();
			var gender = $('input[type="radio"]').val();
			var address = $("#address").val();
			var city = $("#city").val();
			var blood_group = $("#blood_group").val();
			var user_email = $("#user_email").val();
			var user_password = $("#user_password").val();
			var upload_image = $('#upload_image')[0].files[0].name;
			//alert(upload_image);

			if(full_name == ""){
				$("#full_name").css("border","3px solid red");
				$("#full_name").focus();
				setTimeout("$('#full_name').css('border','')",3000);
				return false;
			}
			if(age == ""){
				$("#age").css("border","3px solid red");
				$("#age").focus();
				setTimeout("$('#age').css('border','')",3000);
				return false;
			}
			if(gender == ""){
				$("#gender").css("border","3px solid red");
				$("#gender").focus();
				setTimeout("$('#gender').css('border','')",3000);
				return false;
			}
			if(address == ""){
				$("#address").css("border","3px solid red");
				$("#address").focus();
				setTimeout("$('#address').css('border','')",3000);
				return false;
			}
			if(city == ""){
				$("#city").css("border","3px solid red");
				$("#city").focus();
				setTimeout("$('#city').css('border','')",3000);
				return false;
			}
			/*if(user_email == ""){
				$("#user_email").css("border","3px solid red");
				$("#user_email").focus();
				setTimeout("$('#user_email').css('border','')",3000);
				return false;
			}*/
			if(user_password == ""){
				$("#user_password").css("border","3px solid red");
				$("#user_password").focus();
				setTimeout("$('#user_password').css('border','')",3000);
				return false;
			}

			var data = { 
				"full_name":full_name,
				"age":age,
				"gender":gender,
				"address":address,
				"city":city,
				"blood_group":blood_group,
				"user_email":user_email,
				"user_password":user_password,
				"upload_image":upload_image

			};

			$.ajax({

				url:'register_sub.php',
				method:'POST',
				data:data,
				mimeType:'multipart/from-data',
				success : function(res){
      				alert(res);
      				
         		
       			}
			});


		});


	});


	function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
        	$("#email_error_msg").text("Please Enter Valid Email Address");
           	$("#user_email").focus();
           	$("#user_email").css("border","3px solid red");
			setTimeout("$('#user_email').css('border','')",3000);
			setTimeout("$('#email_error_msg').text('')",3000);
			return false;
           
        }

        

}

function ShowPass(){
    var x = document.getElementById("user_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>