<?php 
include_once('conn/config.php');
include_once('inc/session.php');

$insert_doctor = $conn->prepare("UPDATE `doctors` SET `doctor_name`= ?,`doctor_number`=?,`doctor_specification`=?,`consult_fees`= ? WHERE id = ?");

$doctor_name = $_POST['doctor_name'];
$doctor_number = $_POST['doctor_number'];
$doctor_specification = $_POST['doctor_specification'];
$consult_fees = $_POST['consult_fees'];
$id = $_POST["id"];

$insert_doctor->bind_param('sisdi',$doctor_name,$doctor_number,$doctor_specification,$consult_fees,$id);
if($insert_doctor->execute())
				   	{
				   		echo "Update";
				   
				   	}
				   	else{
				   		echo"error";
				   	}
		   
?>