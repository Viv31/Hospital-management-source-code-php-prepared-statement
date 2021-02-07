<?php 
	include_once('conn/config.php');
	//echo $_SESSION['username'];
	$uid = $_POST['del_id'];
	$sql = $conn->prepare("DELETE  FROM doctors WHERE id = ?");  
	$sql->bind_param("i", $uid); 
	$sql->execute();
	if($sql->execute()){
				   		echo "YES";
				   	}
				   	else{
				   		echo "NO";
				   	}
	
		
?>