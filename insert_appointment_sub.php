<?php
session_start();
include_once('conn/config.php');
include_once('inc/session.php');
 $user_id = $_SESSION['userid'];  
   $full_name = $_POST['full_name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];

   $email = $_POST['email'];
 
   $blood_group = $_POST['blood_group'];
     $disease = $_POST['disease'];
   $doctor = $_POST['doctor'];
   $appointment_time = $_POST['appointment_time'];
   $appointment_date =  date('Y-m-d',strtotime($_POST['appointment_date']));
   $msg_read = 0;
   
   $insert_data = $conn->prepare("INSERT INTO  appointment(
		   			full_name,
		   			age,
		   			gender,
		   			email,
		   			blood_group,
		   			disease,
		   			doctor,
		   			appointment_time,
		   			appointment_date,
		   			user_id,
		   			msg_read
		   			
		   		) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
		    	$insert_data->bind_param("sisssssssii", $full_name, $age,$gender,$email,$blood_group,$disease,$doctor,$appointment_time,$appointment_date,$user_id,$msg_read);
		   	
				   	if($insert_data->execute())
				   	{
				   		echo "insert";
				   
				   	}
				   	else{
				   		echo"error";
				   	}
		   
		   
   
   
   ?>