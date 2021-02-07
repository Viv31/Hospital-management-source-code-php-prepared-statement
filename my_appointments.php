<?php include_once('inc/header.php');
include_once('inc/session.php');
 ?>
<?php include_once('inc/navbar.php');?>
<div class="container-fluid" id="my_appointment_container">
<div class="container" >
	<h3 class="text-center text-white">My Appointments</h3>
	<a href="add_new_appointment.php" class="btn btn-info mb-2 pull-right">Add New Appointment</a>
	<table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>Sno<?php $sno='1'; ?></th>
        <th>Appointment Date</th>
        <th>Consulting Doctor</th>
        <th>Appointment Status</th>
        <th>Action</th>
      </tr>
    </thead>
   

  <tbody>
     <?php
$uid = $_SESSION['userid'];
// $uid;

 $view_apt_data = $conn->prepare("SELECT `id`,`full_name`,`age`,`gender`,`email`,`blood_group`,`disease`,`doctor`,`appointment_time`,`appointment_date`,`appointment_status`,`user_id`
  FROM `appointment` WHERE user_id = ?");
$view_apt_data->bind_param("i",$uid);
$view_apt_data->execute();
$result = $view_apt_data->bind_result($id,$full_name, $age,$gender,$email,$blood_group,$disease,$doctor,$appointment_time,$appointment_date,$appointment_status,$user_id);
while($view_apt_data ->fetch()) {
    //echo "$first_name: $last_name : $mobile<br>";
  ?>
      <tr>
        <td><?php echo $sno++;?></td>
        <td><?php echo $appointment_date; ?></td>
        <td><?php echo $doctor;?></td>
        <td><?php 
        if($appointment_status == 0){
          
          echo "<p id=sts".$id." class='badge badge-info'>Pending</p>";
        }
        if($appointment_status == 1){
           echo "<p id=sts".$id." class='badge badge-info'>Confirmed</p>";
        }
        if($appointment_status == 2){
           echo "<p id=sts".$id." class='badge badge-info'>Cancled by Patient</p>";
        }
        if($appointment_status == 3){
           echo "<p id=sts".$id." class='badge badge-info'>Cancled By Admin</p>";
        }

        ?></td>
        
        <td>
          <a href="view_appointment_details.php?id=<?php echo $id;?>"> View</a>
          <?php
          if($appointment_status == 0){ ?>
                <button class="btn btn-danger btn-xs" id="mybtn" value="2" onclick = "return cancle_appointment(this.value,<?php echo $id;?>);">Cancle</button>

          <?php } ?>
          
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>
</div>
<?php include_once('inc/footer.php'); ?>
<script type="text/javascript">
  function cancle_appointment(val,apt_id){
 
 var conf = confirm("Do You Really want to cancle Appointment?");
 if(conf){
$.ajax({
      type:'post',
      url:'changeAppointmentStatus.php',
      data:{val:val,apt_id:apt_id},
      success:function(result){
        //console.log(result);
        if(result == 1){
          $('#sts'+apt_id).html('Active');
          $("#mybtn").hide();

        }

        else if(result == 0){
           $('#sts'+apt_id).html('Pending');
        }
        else if(result == 2){
          $('#sts'+apt_id).html('Cancled by Patient');
          $("#mybtn").hide();

        }

        else{
          $('#sts'+apt_id).html('Dactive');
          $("#mybtn").hide();

        }

      }


    });
 }




}
</script>