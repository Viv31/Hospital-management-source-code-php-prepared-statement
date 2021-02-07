<?php
include("Conn/config.php");
if(isset($_POST['email']))
{
 $emailId = $_POST['email'];

 $checkdata=" SELECT username FROM admin WHERE username like '%$emailId%' ";

 $query=mysqli_query($conn,$checkdata);

 if(mysqli_num_rows($query)>0)
 {
 	//echo"<p id='mail'>Email exist</p>";
 	?>
 	
<script type="text/javascript">
//	this code is used for making email exist error for particular time like 3000 ms 
		$("#userpassword").prop("disabled",false);
		$("#confuserpassword").prop("disabled",false);
		$("#reset_password").prop("disabled",false);


</script>
 
  <?php
 }
 else
 {
 	echo"<p id='chkemail'>Please Enter Registered Email</p>";
 	?>
  <!--<p id="mail"></p>-->
<script type="text/javascript">
		$("#userpassword").prop("disabled",true);
		$("#confuserpassword").prop("disabled",true);
		$("#reset_password").prop("disabled",true);
		
</script>
  <?php
 }
 //exit();
}
?>

<?php

?>
<script type="text/javascript">
	setTimeout("$('#mail').fadeOut(); ", 3000);
</script>
