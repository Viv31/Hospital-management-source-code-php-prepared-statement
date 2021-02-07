<?php
session_start();
/*include_once('conn/config.php');
 $user_password = md5($_POST['old_password']);
 $new_password = md5($_POST['new_password']);
   		$confirm_password = $_POST['confirm_password'];
   		$user_id = $_SESSION['userid']; 
   

   $check_old_password = "SELECT user_password FROM registration WHERE user_password = ? AND id = ? ";
   $fire_query = $conn->prepare($check_old_password);
   	$fire_query->bind_param("si", $user_password,$user_id );
   	$fire_query->execute();
   	$fire_query->bind_result($found);
   	$fire_query->fetch();
   	if($found)
   	{
         echo "password Matched";
        echo  $update_password = "UPDATE registration SET user_password = $new_password WHERE id = $user_id";
          $res = mysqli_query($conn,$update_password);
          

   		

   		
   	}
   	else{
   		echo "Password not matched";
   	}*/



  include_once("conn/config.php");
      
      $user_password = md5($_POST['old_password']);
      $new_password = md5($_POST['new_password']);
      $confirm_password = $_POST['confirm_password'];
      $user_id = $_SESSION['userid'];

      $chk_pass = "SELECT `id`,`user_password` FROM `registration` WHERE `user_password`= '".$user_password."' AND `id`= $user_id ";
      $fire = mysqli_query($conn,$chk_pass);
      //die;
      if(mysqli_num_rows($fire)>0){
        
        $update_user_password = "UPDATE registration SET user_password = '".$new_password."' WHERE id = '".$user_id."'";
      $res = mysqli_query($conn,$update_user_password);
        if($res){

          echo "Password Updated";

        }
        else{
          echo "Failed";
        }

      }
      else{
         echo "Password not matched";

      }

?>