<?php 
include_once('conn/config.php');
include_once('inc/session.php');

$doctor_name = $_POST['doctor_name'];
$doctor_number = $_POST['doctor_number'];
$doctor_specification = $_POST['doctor_specification'];
$consult_fees = $_POST['consult_fees'];

$insert_doctor = $conn->prepare("INSERT INTO doctors(`doctor_name`, `doctor_number`, `doctor_specification`, `consult_fees`) VALUES(?,?,?,?) ");
$insert_doctor->bind_param('sisd',$doctor_name,$doctor_number,$doctor_specification,$consult_fees);
if($insert_doctor->execute())
				   	{
				   		echo "insert";
				   
				   	}
				   	else{
				   		echo"error";
				   	}
		   
?>