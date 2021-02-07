<?php include_once('inc/header.php'); ?>
<?php include_once('inc/navbar.php'); ?>
<?php include_once('inc/session.php'); ?>
<div class="container">
	<div class="row" style="margin-top: 50px;">
	<div class="col-md-3 mb-2">
		<a href="doctorlist.php">
		<div class="card bg-primary text-white">
    <div class="card-body text-center">All Doctors<?php
	    $count_query = "SELECT count(*) as total from doctors";
$result = mysqli_query($conn,$count_query);
$data = mysqli_fetch_assoc($result);
echo"<span class='badge badge-secondary'>".$data['total']."</span>";
?></div>
    <div class="card-body"><img src="img/P.png" height="50" width="50" class="mx-auto d-block"></div>
     </div>
 </a>
	</div>
	<div class="col-md-3 mb-2">
		<a href="patientslist.php">
		<div class="card bg-info text-white">
    <div class="card-body text-center">All Patients<?php
	    $count_query = "SELECT count(*) as total from registration";
$result = mysqli_query($conn,$count_query);
$data = mysqli_fetch_assoc($result);
echo"<span class='badge badge-secondary'>".$data['total']."</span>";
?></div>
   <div class="card-body"><img src="img/P.png" height="50" width="50" class="mx-auto d-block"></div>
    
  </div>
</a>
	</div>
	<div class="col-md-3 mb-2">
		<a href="appointmentslist.php">
		<div class="card bg-dark text-white">
    <div class="card-body text-center">All Appointments<?php
	    $count_query = "SELECT count(*) as total from appointment";
$result = mysqli_query($conn,$count_query);
$data = mysqli_fetch_assoc($result);
echo"<span class='badge badge-secondary'>".$data['total']."</span>";
?></div>
    <div class="card-body"><img src="img/P.png" height="50" width="50" class="mx-auto d-block"></div>
     </div>
 </a>
	</div>
	<div class="col-md-3 mb-2">
		<a href="report.php">
		<div class="card bg-dark text-white">
    <div class="card-body text-center">Reports

</div>
    <div class="card-body"><img src="img/P.png" height="50" width="50" class="mx-auto d-block"></div>
    </div>
</a>
	</div>
</div>
</div>
<?php include_once('inc/footer.php'); ?>