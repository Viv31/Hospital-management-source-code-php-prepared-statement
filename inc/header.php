<?php 
session_start(); 
$db_host = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "hospital_management_system";
$conn = mysqli_connect($db_host,$db_user,$db_password,$db_name);
if($conn){
//echo "Connected";
}
else{
  //echo "Failed";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>HMS</title>
	<!-- Latest compiled and minified CSS -->
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

 <style>

  
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    /*height: 100%;*/
  }
  #formcontainer{
    background-image: url('img/7.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: repeat-x;
  }



  #formdiv{
    background-color: rgba(0,0,0,0.7);
  }

   #editformcontainer{
    background-image: url('img/hms2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: repeat-x;
  }

  


  label,form{
    color: white;
  }

  #appointment_container{
     background-image: url('img/hms2.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: repeat-x;
    height: 100vh;
  }

  #Loginformdiv{
     background-image: url('img/3.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: repeat-x;
    height: 100vh;

  }

  #UserLoginformdiv{
     background-color: rgba(0,0,0,0.7);
     padding: 15px;
     border-radius: 2px;

  }

  #my_appointment_container{
     background-image: url('img/6.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: repeat-x;
    height: 100vh;

  }

  #profile_container{
     background-image: url('img/6.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: repeat-x;
    height: 100vh;

  }

  /* For Making Profile Card Transparent and change font color to white */

  .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    color: white;
    background-color: rgba(0,0,0,0.7);
    background-clip: border-box;
    border: 6px solid rgba(0,0,0,.125);
    border-radius: .25rem;
    text-align: center;
}

#forget_password_div{
   background-color: rgba(0,0,0,0.7);
   padding: 15px;

}

#foreget_password_container{
  background-image: url('img/6.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: repeat-x;
    height: 100vh;
}

#view_appointment_details_section{
  background-image: url('img/6.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: repeat-x;
    height: 100vh;
}

#dashboard_container{
  background-image: url('img/hs1.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: repeat-x;
    height: 100vh;
}

 


  </style>
</head>
<body>