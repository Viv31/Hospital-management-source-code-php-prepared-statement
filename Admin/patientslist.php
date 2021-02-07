<?php 
include_once('inc/session.php');
include_once('inc/header.php');
include_once('inc/navbar.php');
?>
<div class="container">
	<h3 class="text-center text-info">All Patients</h3>
	
	<table class="table table-dark table-hover ">
    <thead>
      <tr>
        <th>Sno<?php $sno='1'; ?></th>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Address</th>
        <th>City</th>
        <th>Bllod Group</th>
        <th>Email</th>
        <th>image</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
   
      <?php


$view_apt_data = $conn->prepare("SELECT `id`, `full_name`, `age`, `gender`, `address`, `city`, `blood_group`, `user_email`, `user_password`, `upload_image` FROM `registration`");
//$view_apt_data->bind_param("i",$uid);
$view_apt_data->execute();
$view_apt_data->bind_result($id,$full_name, $age,$gender,$address,$city, $blood_group,$user_email,$user_password,$upload_image);

while ($view_apt_data ->fetch()) {
    //echo "$first_name: $last_name : $mobile<br>";
  ?>
  <tbody>
      <tr>
        <td><?php echo $sno++;?></td>
        <td><?php echo $full_name; ?></td>
        <td><?php echo $age;?></td>
        <td><?php echo $gender; ?></td>
         <td><?php echo $address; ?></td>
        <td><?php echo $city;?></td>
        <td><?php echo $blood_group; ?></td>
         <td><?php echo $user_email; ?></td>
        <td><img src ="../<?php echo $upload_image; ?>" style='height: 50px; width: 50px;'></td>
        <td colspan="2">
        	<a href="view_patient_history.php?id=<?php echo $id; ?>"><button class="btn btn-info">View History</button></a>	
        </td>
        <td>
            <a href="#" class="btn btn-danger trash" id="<?php echo $id;?>">Delete</a>
        </td>
        
       
      </tr>
      <?php
  }

 

?>
    </tbody>
  </table>
  <div class="col-md-3"></div>
  <div class="col-md-6 mt-5 mx-auto" id="alert_box">
    <div class="alert alert-success alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong>Patient Deleted Successfully.
</div>
  
</div>
<div class="col-md-3"></div>
</div>
<?php include_once('inc/footer.php'); ?>
<script type="text/javascript"></script>
<script>
 $(document).ready(function(){

  $("#alert_box").hide();
$('.trash').click(function(){

 var del_id = $(this).attr('id');
//alert(del_id);
 var $ele = $(this).parent().parent();

var conf = confirm("Do You want to delete this");
if(conf){
        $.ajax({
                type:'POST',
                url:'delete_patient.php',
                 data:{del_id:del_id},
                success: function(data){
                   if(data == "YES"){
                    $ele.fadeOut().remove();
                    $("#alert_box").show();
                    
                 }
                 else{
                        alert("can't delete the row");
                        
                 }
                }

                });

}

});

});

</script>