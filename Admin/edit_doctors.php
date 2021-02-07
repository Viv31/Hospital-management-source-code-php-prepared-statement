<?php 
include_once('inc/session.php');
include_once('inc/header.php');
include_once('inc/navbar.php');



$view_users_data= $conn->prepare("SELECT `id`, `doctor_name`, `doctor_number`, `doctor_specification`, `consult_fees` FROM `doctors` WHERE id = ?");
$view_users_data->bind_param("i",$_GET["id"]);

$view_users_data->execute();
$view_users_data -> bind_result($id, $doctor_name, $doctor_number, $doctor_specification, $consult_fees);
$view_users_data ->fetch();
?>
<div class="container-fluid">
	<div class="conatainer" >
		<div class="col-md-3"></div>
  <div class="col-md-6 mt-5 mx-auto" id="alert_box">
    <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong>Doctor Updated Successfully.
</div>
  
</div>
<div class="col-md-3"></div>
		<div class="row">
			<div class="col-md-3"></div>

			<div class="col-md-6 mx-auto" id="add_doctor_form_container">
				<div class="form-group">
					<label>Doctor's Name:</label>
					<input type="text" name="doctor_name" id="doctor_name" placeholder="Enter Doctor Name" class="form-control" value="<?php echo $doctor_name; ?>">
				</div>
				<div class="form-group">
					<label>Doctor No.</label>
					<input type="text" name="doctor_number" id="doctor_number" class="form-control" placeholder="Enter Doctor Number" value="<?php echo $doctor_number; ?>">
				</div>
				<div class="form-group">
					<label>Doctor's Specification</label>
					<input type="text" name="doctor_specification" id="doctor_specification" class="form-control" placeholder="Enter Specification" value="<?php echo $doctor_specification; ?>">
				</div>
				<div class="form-group">
					<label>Consult Fee</label>
					<input type="text" name="consult_fees" id="consult_fees" placeholder="Enter Consult Fee" class="form-control" value="<?php echo $consult_fees; ?>">
				</div>
				<input type="hidden" id = "id" name="id" value="<?php echo $id; ?>">
				<button type="button" id="update" class="btn btn-primary">Update</button>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>

<?php include_once('inc/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		 $("#alert_box").hide();
		$(document).on("click","#update",function(){

			var doctor_name = $("#doctor_name").val();
			var doctor_number = $("#doctor_number").val();
			var doctor_specification = $("#doctor_specification").val();
			var consult_fees = $("#consult_fees").val();
			var id = $("#id").val();
			if(doctor_name==""){
				alert("Enter Doctor Name");
				return false;

			}
			if(doctor_number == ""){
				alert("Enter Doctor Number");
				return false;

			}
			if(doctor_specification==""){
				alert("Enter Doctor Specification");
				return false;

			}
			if(consult_fees==""){
				alert("Enter Consult Fee");
				return false;

			}
			var data = {
				"doctor_name":doctor_name,
				"doctor_number":doctor_number,
				"doctor_specification":doctor_specification,
				"consult_fees":consult_fees,
				"id":id
			};
			$.ajax({
				url:"update_doctor_data.php",
				method:'POST',
				data:data,
				success : function(res){
      				$("#alert_box").show();
      				
         		
       			}

			});

		});
	});
</script>