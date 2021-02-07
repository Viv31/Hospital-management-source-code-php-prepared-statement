<?php include_once('inc/header.php');
include_once('inc/session.php');
 ?>
<?php include_once('inc/navbar.php'); ?>
<div class="container-fluid" id="appointment_container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 mx-auto p-5" id="formdiv">
			<h5 class="text-center text-white">New Appointment</h5>
			<form>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Patient's Name:</label>
					<input type="text" name="full_name" id="full_name" value="" placeholder="Enter Full Name" class="form-control">
				</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Patient's Age:</label>
					<input type="number" id="age" name="age" class="form-control">
					
				</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Patient's Gender:</label>
					<input type="radio" name="gender" value="male">Male
					<input type="radio" name="gender" value="female">Female
				</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Patient's Email:</label>
					<input type="email" name="email" id="email" class="form-control">
					
				</div>
					</div>
				</div>

				<div class="row">
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
					<div class="col-md-6">
						<div class="form-group">
							<label>Disease:</label>
					<select class="form-control" name="disease" id="disease">
						<option value="">--Select Disease --</option>
						<option value="Cancer">Cancer</option>
						<option value="TB">TB</option>
						<option value="Dengue">Dengue</option>
						<option value="Other_Flu">Other Flu</option>
						<option value="Cough_cold">Cough & Cold</option>
						<option value="A-">A-</option>
						<option value="O+">O+</option>
						<option value="Other">Other</option>

					</select>
					
				</div>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
					<label>Doctor:</label>
					<select class="form-control" name="doctor" id="doctor">
						<option value="">--Select Doctor --</option>
					<?php
//geeting all doctors from database

$view_apt_data = $conn->prepare("SELECT `id`, `doctor_name`, `doctor_number`, `doctor_specification`, `consult_fees` FROM `doctors`");
//$view_apt_data->bind_param("i",$uid);
$view_apt_data->execute();
$view_apt_data->bind_result($id,$doctor_name, $doctor_number,$doctor_specification,$consult_fees);

while ($view_apt_data ->fetch()) {
    //echo "$first_name: $last_name : $mobile<br>";
  ?>
					
						<option value="<?php echo $doctor_name; ?>"><?php echo $doctor_name; ?></option>
						

					
					<?php
  }

 

?>
</select>
					
				</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
					<label>Appointment Time:</label>
					
					<input type="time" name="appointment_time" id="appointment_time" class="form-control">
					
				</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
						<label>Appointment Date</label>
						<input type="date" name="appointment_date" id="appointment_date" class="form-control">
					</div>
					</div>
				</div>
				
				<button type="button" id="make_appointment" name="make_appointment" value="Apply" class="btn btn-info">Apply</button>
			</form>

			
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<?php include_once('inc/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).on("click","#make_appointment",function(){

			var full_name = $("#full_name").val();
			var age = $("#age").val();
			var gender = $('input[type="radio"]').val();
			var email = $("#email").val();
			var blood_group = $("#blood_group").val();
			var disease = $("#disease").val();
			
			var doctor = $("#doctor").val();
			var appointment_time = $("#appointment_time").val();
			var appointment_date = $('#appointment_date').val();
		

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
			if(disease == ""){
				$("#disease").css("border","3px solid red");
				$("#disease").focus();
				setTimeout("$('#disease').css('border','')",3000);
				return false;
			}
			if(doctor == ""){
				$("#doctor").css("border","3px solid red");
				$("#doctor").focus();
				setTimeout("$('#doctor').css('border','')",3000);
				return false;
			}
			if(appointment_time == ""){
				$("#appointment_time").css("border","3px solid red");
				$("#appointment_time").focus();
				setTimeout("$('#appointment_time').css('border','')",3000);
				return false;
			}
			if(appointment_date == ""){
				$("#appointment_date").css("border","3px solid red");
				$("#appointment_date").focus();
				setTimeout("$('#appointment_date').css('border','')",3000);
				return false;
			}

			var data = { 
				"full_name":full_name,
				"age":age,
				"gender":gender,
				"email":email,
				"blood_group":blood_group,
				"disease":disease,
				"doctor":doctor,
				"appointment_time":appointment_time,
				"appointment_date":appointment_date

			};

			$.ajax({

				url:'insert_appointment_sub.php',
				method:'POST',
				data:data,
				 success : function(res){
      				alert(res);
      				
         		
       			}
			});


		});


	});
</script>