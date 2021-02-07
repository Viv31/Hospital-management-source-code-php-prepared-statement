<?php
   include_once('conn/config.php');
   
   $full_name = $_POST['full_name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $address = $_POST['address'];
   $city = $_POST['city'];
   $blood_group = $_POST['blood_group'];
   $user_email = $_POST['user_email'];
   $user_password = md5($_POST['user_password']);
   $profile_img = $_FILES['upload_image']['name'];
   $temp_profile = $_FILES['upload_image']['tmp_name']; 
   echo $profile_img; //die;
   //extract($_POST);
   

$todays_date=date('Ymd').time();
$profile_folder = "uploads/".$todays_date.$profile_img;

	$checking_exist_email  = "SELECT user_email FROM registration WHERE user_email = ?";
   	$fire_query = $conn->prepare($checking_exist_email);
   	$fire_query->bind_param("s", $user_email);
   	$fire_query->execute();
   	$fire_query->bind_result($found);
   	$fire_query->fetch();
   	if($found)
   	{
   		echo "email exists";
   	}
   	else{
   				
		   		$insert_data = $conn->prepare("INSERT INTO  registration(
		   			full_name,
		   			age,
		   			gender,
		   			address,
		   			city,
		   			blood_group,
		   			user_email,
		   			user_password,
		   			upload_image
		   			
		   		) VALUES (?,?,?,?,?,?,?,?,?)");
		    	$insert_data->bind_param("sissssssb", $full_name, $age,$gender,$address,$city,$blood_group,$user_email,$user_password,$profile_folder);
		   	
				   	if($insert_data->execute())
				   	{
				   		move_uploaded_file($temp_profile, $profile_folder);//file name and destination
				   		echo "insert";
				   
				   	}
				   	else{
				   		echo"error";
				   	}
		   
		   	}
   
   
   ?>