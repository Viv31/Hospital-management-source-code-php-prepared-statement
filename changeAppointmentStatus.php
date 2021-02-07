<?php 
require_once('conn/config.php');
 $_POST['val'];
 $_POST['apt_id'];

 $change_status_query=mysqli_query($conn,"UPDATE `appointment` SET `appointment_status`='". $_POST['val']."' WHERE `id`='".$_POST['apt_id']."' ");
 if($change_status_query){
 	//echo"Success";
 	$q = mysqli_query($conn,"SELECT * FROM `appointment` WHERE `id`='".$_POST['apt_id']."'");
 	$data = mysqli_fetch_assoc($q);
 	echo $data['appointment_status'];

 }

?>