	<?php include_once('inc/header.php'); 
include_once('inc/session.php');
	?>
	<?php include_once('inc/navbar.php'); ?>
	<div class="container-fluid" id="dashboard_container">
	<div class="container">
		<h5>WELCOME <span><?php echo $_SESSION['username']; ?></span></h5>
		<div class="row" style="margin-top: 50px;">
		<div class="col-md-3 mb-2">
			<a href="my_appointments.php">
			<div class="card bg-primary text-white">
	    <div class="card-body text-center">My Appointment<?php
	    $count_query = "SELECT count(*) as total from appointment WHERE user_id ='".$_SESSION['userid']."'";
$result = mysqli_query($conn,$count_query);
$data = mysqli_fetch_assoc($result);
echo"<span class='badge badge-secondary'>".$data['total']."</span>";
?></div>
	    <div class="card-body"><img src="img/P.png" height="50" width="50" class="mx-auto d-block"></div>
	     </div>
	     </a>
		</div>
		<div class="col-md-3 mb-2">
			<a href="my_profile.php"><div class="card bg-info text-white">
	    <div class="card-body text-center">My Profile</div>
	   <div class="card-body"><img src="img/P.png" height="50" width="50" class="mx-auto d-block"></div>
	    
	  </div></a>
		</div>
		</div>
	</div>
</div>
	<?php include_once('inc/footer.php'); ?>