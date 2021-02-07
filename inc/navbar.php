<?php 
include_once("conn/config.php");
?>
<nav class="navbar navbar-expand-md bg-info navbar-dark">
  <a class="navbar-brand" href="dashboard.php">HMS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      
      
      <?php 
     //error_reporting(0);
if(@$_SESSION['username'] == ""){ ?>

  

 <li class="nav-item pull-right">
        <a class="nav-link" href="login.php">Login</a>
      </li> 

  <?php

}
else{
  ?>
<li class="nav-item">
        <a class="nav-link" href="my_appointments.php">My Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" ></a>

      </li>
<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
       My Profile
      </a>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="my_profile.php">Profile</a>
        <a class="dropdown-item" href="change_password.php">Change Password</a>
       
      </div>
      
    </li>
    <li class="nav-item dropdown">
      
      <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
<?php 

$count_notification = "SELECT count(*) as total from appointment WHERE appointment_status!= 0 AND  msg_read!= 1 AND user_id ='".$_SESSION['userid']."'";
$result=mysqli_query($conn,$count_notification);
$data = mysqli_fetch_assoc($result);
echo "Notification(".$data['total'].")";

?>
      </a>
      <div class="dropdown-menu">
<?php 
$get_msg = "SELECT * FROM appointment WHERE appointment_status!= 0 AND  msg_read!=1 AND user_id ='".$_SESSION['userid']."'";
$res = mysqli_query($conn,$get_msg);
if(mysqli_num_rows($res) > 0){
  while($rs = mysqli_fetch_assoc($res)){
    //echo $rs['appointment_status'];
    //echo $rs['id'];
    ?>

  <?php 
  $id = $rs['id'];
echo "<a href='#' class = 'dropdown-item' onclick='change_msg_status($id)'><b>Appoint status changed to"." ";if($rs['appointment_status'] == 2){echo "<span style='color:red'>Cancled by Patient</span></a></b>";}if($rs['appointment_status'] == 1){echo "<span style='color:green'>Apoorved by Admin</span>";}if($rs['appointment_status'] == 3){echo "<span style='color:red'>Cancled by Admin</span>";}
 }
}
?>
        
        
       
      </div>
      
    </li>


 <li class="nav-item pull-right">
        <a href="logout.php" class="nav-link" >Logout</a>
      </li> 

      

  <?php
}

      ?>
        
    </ul>
  </div>  
</nav>
<script type="text/javascript">
  function change_msg_status(userID){
//alert(userID);
$.ajax({
      type:'post',
      url:'readnotification.php',
      data:{userID:userID},
       success:function(result){
        //alert(result);
        if(result == "read"){
          alert(read);

        }
       }

});
  }
</script>