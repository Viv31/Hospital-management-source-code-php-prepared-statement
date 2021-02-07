<?php 
include_once('inc/session.php');
include_once('inc/header.php');
include_once('inc/navbar.php');
?>
<div class="container">
  
    
	<h3 class="text-center text-info">All Doctors</h3>
	<a href="add_new_doctor.php" class="btn btn-info mb-2 pull-right">Add New Doctor</a>
	<table class="table table-dark table-hover ">
    <thead>
      <tr>
        <th>Sno<?php $sno='1'; ?></th>
        <th>Doctor Name</th>
        <th>Contact no.</th>
        <th>Specification</th>
        <th>Consult Fee</th>
        <th>Action</th>
      </tr>
    </thead>
   
      <?php
//$uid = $_SESSION['userid'];

$view_apt_data = $conn->prepare("SELECT `id`, `doctor_name`, `doctor_number`, `doctor_specification`, `consult_fees` FROM `doctors`");
//$view_apt_data->bind_param("i",$uid);
$view_apt_data->execute();
$view_apt_data->bind_result($id,$doctor_name, $doctor_number,$doctor_specification,$consult_fees);

while ($view_apt_data ->fetch()) {
    //echo "$first_name: $last_name : $mobile<br>";
  ?>
  <tbody>
      <tr>
        <td><?php echo $sno++;?></td>
        <td><?php echo $doctor_name; ?></td>
        <td><?php echo $doctor_number;?></td>
        <td><?php echo $doctor_specification;?></td>
        <td><?php echo $consult_fees;?></td>
        <td>
        	<a href="edit_doctors.php?id=<?php echo $id;?>"><button class="btn btn-info">Edit</button></a>
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
  <strong>Success!</strong>Doctor Deleted Successfully.
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
                url:'delete_doctors.php',
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