<?php 
include_once('inc/session.php');
include_once('inc/header.php');
include_once('inc/navbar.php');
?>
<?php 

$id = $_GET['id'];
$view_users_data= $conn->prepare("SELECT appointment.appointment_date, 
 		appointment.appointment_time, 
        appointment.doctor, 
         appointment.disease,
         appointment.full_name,
         appointment.age,
         appointment.gender,
         registration.address,
          registration.city,
          registration.blood_group,
          registration.user_email,
          registration.upload_image
           FROM `appointment`
  INNER JOIN `registration` ON appointment.user_id = registration.id
  WHERE appointment.id = ?");
$view_users_data->bind_param("i",$id);

$view_users_data->execute();
$view_users_data -> bind_result($appointment_date, $appointment_time,$doctor,$disease,$full_name, $age,$gender,$address,$city,$blood_group,$user_email,$upload_image);
$view_users_data ->fetch();

?>
<div class="conatiner">
	<div class="row">
	<div class="col-md-3"></div>
	<div class="mt-50 col-md-6 mx-auto bg-warning">
		
		<div class="row">
			<div class="col-md-2">
				<img src="../<?php echo $upload_image; ?>" height="100" width="100">
			</div>
			<div class="col-md-10 ">
				<table class="table table-striped table-responsive">
    <thead>
       <h4>Personal Profile</h4>
    </thead>
    <tbody>
      <tr>
      	<th>Name:</th>
        <td><?php echo $full_name; ?></td>
        <th>Age:</th>
        <td><?php echo $age; ?></td>
        <td></td>
        
      </tr>
       <tr>
       	 
      	<th>Email Address:</th>
        <td><?php echo $user_email; ?></td>
        <th>Gender:</th>
        <td><?php echo $gender; ?></td>
         <td></td>
        
      </tr>
      <tr>
      	<th>Address:</th>
        <td colspan="2"><?php echo $address; ?></td>
         <td></td>
        
        
      </tr>
      
       <tr>
      	<th>City:</th>
        <td><?php echo $city; ?></td>
        <th>Blood Group:</th>
        <td><?php echo $blood_group; ?></td>
        <td></td>
        
      </tr>
      
      <tr>
      	<th colspan="4" class="text-center bg-primary">Doctor And Disease</th>
      </tr>

      <tr>
      	<th>Doctor:</th>
        <td><?php echo $doctor; ?></td>
        <th>Disease:</th>
        <td><?php echo $disease; ?></td>
        <td></td>
        
      </tr>

       <tr>
      	<th colspan="4" class="text-center bg-success">Appontment History</th>
      </tr>

      <tr>
      	<th>Appointment Date:</th>
        <td><?php echo $appointment_date; ?></td>
        <th>Next Appointment Date:</th>
        <td><?php echo $appointment_date; ?></td>
        <th>Appointment Time:</th>
        <td><?php echo $appointment_time; ?></td>
        
      </tr>


      
    </tbody>
  </table>
			</div>

		</div>
	</div>
	<div class="col-md-3"></div>
</div>
</div>



<?php include_once('inc/footer.php'); ?>