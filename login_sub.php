<?php 
session_start();
include_once('conn/config.php');
$username = $_POST['username'];
$user_password = md5($_POST['user_password']);

    $stmt = $conn->prepare("SELECT id,user_email, user_password FROM registration WHERE  user_email=? AND user_password = ? ");
    $stmt->bind_param('ss',$username, $user_password);
    $stmt->execute();
    $stmt->bind_result($id, $username, $user_password);
    $stmt->store_result();
    if($stmt->num_rows > 0)  //To check if the row exists
        {
        $stmt->fetch();
        echo 'Login'; //for sending response in ajax field so redirect to dashboard
         $_SESSION['username'] = $username;
         $_SESSION['userid'] = $id;

            //header("location:dashboard.php");
           

    }
    else {
        $_SESSION['invalid_details'] = "INVALID USERNAME/PASSWORD Combination!";
        header('location:login.php');
        
    }
    $stmt->close();


?>