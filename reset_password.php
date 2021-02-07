<?php 
include_once("conn/config.php");

$email = $_POST['email'];
$userpassword = md5($_POST['new_pawd']);
$confuserpassword = $_POST['confirm_pawd'];

/*echo  $email;
echo $userpassword;
echo $confuserpassword;*/

 $update_password = "UPDATE `registration` set user_password ='".$userpassword."' WHERE user_email ='".$email."' ";

$result = mysqli_query($conn,$update_password);

if($result!=true){

echo "Failed to update password";
}

else{
	echo "update password";

	}

?>