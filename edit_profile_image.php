<?php include_once('inc/header.php'); 
include_once('inc/session.php');
?>
<?php include_once('inc/navbar.php'); ?>
<div class="container">
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<form action="update_profile_img.php" method="POST">
			<div class="form-group">
				<label>Choose File:</label>
				<input type="file" name="upload_img" class="form-control">
			</div>
			
		</form>
	</div>
	<div class="col-md-2"></div>
</div>
<?php include_once('inc/footer.php'); ?>