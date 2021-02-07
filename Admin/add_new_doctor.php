<?php 
include_once('inc/session.php');
include_once('inc/header.php');
include_once('inc/navbar.php');
?>
<div class="container-fluid">
	<div class="conatainer" >
		<div class="col-md-3"></div>
  <div class="col-md-6 mt-5 mx-auto" id="alert_box">
    <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong>Patient Inserted Successfully.
</div>
  
</div>
<div class="col-md-3"></div>
		<div class="row">
			<div class="col-md-3"></div>

			<div class="col-md-6 mx-auto" id="add_doctor_form_container">
				<h3 class="text-center text-white">Add New Doctor</h3>
				<div class="form-group">
					<label>Doctor's Name:</label>
					<input type="text" name="doctor_name" id="doctor_name" placeholder="Enter Doctor Name" class="form-control">
				</div>
				<div class="form-group">
					<label>Doctor No.</label>
					<input type="text" name="doctor_number" id="doctor_number" class="form-control" placeholder="Enter Doctor Number">
				</div>
				<div class="form-group">
					<label>Doctor's Specification</label>
					<input type="text" name="doctor_specification" id="doctor_specification" class="form-control" placeholder="Enter Specification">
				</div>
				<div class="form-group">
					<label>Consult Fee</label>
					<input type="text" name="consult_fees" id="consult_fees" placeholder="Enter Consult Fee" class="form-control">
				</div>
				<button type="button" id="insert" class="btn btn-primary">Insert</button>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
</div>

<?php include_once('inc/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		 $("#alert_box").hide();
		$(document).on("click","#insert",function(){

			var doctor_name = $("#doctor_name").val();
			var doctor_number = $("#doctor_number").val();
			var doctor_specification = $("#doctor_specification").val();
			var consult_fees = $("#consult_fees").val();
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
				"consult_fees":consult_fees
			};
			$.ajax({
				url:"insert_doctor_sub.php",
				method:'POST',
				data:data,
				success : function(res){
      				
      					 $("#alert_box").show();
      					  $("#doctor_name").val("");
						 $("#doctor_number").val("");
			 			$("#doctor_specification").val("");
						 $("#consult_fees").val("");

      				
      				
         		
       			}

			});

		});
	});
</script>