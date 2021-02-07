<?php include_once('inc/header.php'); 
include_once('inc/session.php');
?>
<?php include_once('inc/navbar.php'); 
$id = $_SESSION['userid'];
$view_users_data= $conn->prepare("SELECT full_name, age, gender,address,city,blood_group,user_email,user_password,upload_image FROM registration WHERE id = ?");
$view_users_data->bind_param("i",$id);

$view_users_data->execute();
$view_users_data -> bind_result($full_name, $age,$gender,$address,$city, $blood_group,$user_email,$user_password,$upload_image);
$view_users_data ->fetch();

?>
<div class="container-fluid" id="editformcontainer">
<div class="col-md-3"></div>
	<div class="col-md-6 mx-auto p-5" id="formdiv">
<h3 class="text-center text-white">Edit Profile</h3>
		
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					<label>Full Name:</label>
					<input type="text" id="full_name" name="full_name" class="form-control" placeholder="Enter Fullname" value="<?php echo $full_name; ?>">
				</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					<label>Age</label>
					<input type="number" id="age" name="age" class="form-control" value="<?php echo $age; ?>">
				</div>
				</div>
			</div>
				
				
				<div class="form-group">
					<label>Gender:</label>
					<input type="radio" name="gender"  <?php if($gender =="Male"){echo "checked";}?> value="Male" >Male
					<input type="radio" name="gender"  <?php if($gender =="Female"){echo "checked";}?> value="Female">Female
				</div>
				<div class="form-group">
					<label>Address:</label>
					<textarea name="address" id="address" placeholder="Enter address here" class="form-control"><?php echo $address; ?></textarea>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
					<label>City:</label>
					<select class="form-control" name="city" id="city">
						<option value="">--Select City--</option>
						<option value="Ujjain" <?php if ($city == 'Ujjain') echo ' selected="selected"'; else { }; ?>>Ujjain</option>
						<option value="Bhopal" <?php if ($city == 'Bhopal') echo ' selected="selected"'; else { }; ?>>Bhopal</option>
					</select>
				</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
					<label>Blood Group:</label>
					<select class="form-control" name="blood_group" id="blood_group">
						<option value="">--Select Blood Group--</option>
						<option value="A+" <?php if ($blood_group == 'A+') echo ' selected="selected"'; else { }; ?>>A+</option>
						<option value="B+" <?php if ($blood_group == 'B+') echo ' selected="selected"'; else { }; ?>>B+</option>
						<option value="B-" <?php if ($blood_group == 'B-') echo ' selected="selected"'; else { }; ?>>B-</option>
						<option value="AB+" <?php if ($blood_group == 'AB+') echo ' selected="selected"'; else { }; ?>>AB+</option>
						<option value="AB-" <?php if ($blood_group == 'AB-') echo ' selected="selected"'; else { }; ?>>AB-</option>
						<option value="A-" <?php if ($blood_group == 'A-') echo ' selected="selected"'; else { }; ?>>A-</option>
						<option value="O+" <?php if ($blood_group == 'O+') echo ' selected="selected"'; else { }; ?>>O+</option>
						<option value="O-" <?php if ($blood_group == 'O-') echo ' selected="selected"'; else { }; ?>>O-</option>

					</select>
				</div>
					</div>
				</div>
				
						<div class="form-group">
					<label>Email:</label>
					<input type="email" name="user_email" id="user_email"  placeholder="Enter Email" class="form-control" value="<?php echo $user_email; ?>">
				</div>
					
				<input type="hidden" id="id" name="id" value="<?php echo $id;?>">
				<button type ="button" value="Update" id="update" name="update" class="btn btn-info btn-block">Update</button>
				

  <div class="col-md-12 mt-5 mx-auto" id="alert_box">
    <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong>Profile Updated Successfully.
</div>
  
</div>

			
		</div>

		<div class="col-md-3"></div>
	
</div>
<?php include_once('inc/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#alert_box").hide();

		$(document).on("click","#update",function(){

			var full_name = $("#full_name").val();
			var age = $("#age").val();
			var gender = $('input[type="radio"]').val();
			var address = $("#address").val();
			var city = $("#city").val();
			var blood_group = $("#blood_group").val();
			var user_email = $("#user_email").val();
			var id = $("#id").val(); 
			
			

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
			if(user_email == ""){
				$("#user_email").css("border","3px solid red");
				$("#user_email").focus();
				setTimeout("$('#user_email').css('border','')",3000);
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
				"id":id
				

			};

			$.ajax({

				url:'edit_profile_sub.php',
				method:'POST',
				data:data,
				success : function(res){
      				//alert(res);
      				$("#alert_box").show();
      				
         		
       			}
			});


		});


	});
</script>