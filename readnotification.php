<?php
require_once('conn/config.php'); 
$uid = $_POST['userID'];
echo "ID".$uid;

$change_status_query = mysqli_query($conn,"UPDATE `appointment` SET `msg_read`='1' WHERE `id`='".$_POST['userID']."' ");
 if($change_status_query){
 	echo "read";
 	

 }


?>