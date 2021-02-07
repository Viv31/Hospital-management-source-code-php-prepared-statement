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
<div class="container-fluid" id="profile_container">
<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<div class="card">
  <div class="card-header">
  	<img src="<?php echo $upload_image; ?>" class="rounded-circle mx-auto d-block" height="200" width="200">
  	<a href="edit_profile_image.php?id=<?php echo $id; ?>" class="mt-2 btn btn-primary text-center">Change Profile Photo</a>
  </div>
  <div class="card-body">Personal Details:
	<h6>Name: <?php echo $full_name; ?></h6>
	<h6>Age:<?php echo $age; ?></h6>
	<h6>Blood Group:<?php echo $blood_group; ?></h6>
	<h6>Address:<?php echo $address; ?></h6>
	<h6>Email:<?php echo $user_email; ?></h6>
  </div>
  <div class="card-footer"><a href="edit_profile.php?id=<?php echo $id; ?>" class="btn btn-primary">Edit Profile</a></div>
</div>
	</div>
	<div class="col-md-2"></div>
</div>
</div>
<?php include_once('inc/footer.php'); ?>