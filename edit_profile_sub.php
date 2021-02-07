<?php 
session_start();
include_once('inc/session.php');
include_once('conn/config.php');


	//echo "hello";
$sql = $conn->prepare("UPDATE registration SET full_name=?,age=?, gender=?,address=?,city=?,blood_group=?,user_email=? WHERE id=?");
		$full_name=$_POST['full_name'];
		$age = $_POST['age'];
		$gender= $_POST['gender'];
		$address=$_POST['address'];
		$city = $_POST['city'];
		$blood_group= $_POST['blood_group'];
		$user_email= $_POST['user_email'];
		
		$sql->bind_param("sisssssi",$full_name, $age, $gender,$address,$city,$blood_group,$user_email,$_POST["id"]);	
		if($sql->execute()) {
			//$success_message = "Edited Successfully";
			echo "profile updated";
		} else {
			echo  "Problem in Editing Record";
		}




?>