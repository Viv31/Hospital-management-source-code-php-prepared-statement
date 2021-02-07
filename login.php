<?php 
include_once('inc/header.php'); 
if(isset($_SESSION['username'])){
	header('location:index.php');

}
?>
<div class="container-fluid" id="Loginformdiv">
  <div class="row">
     <div class="col-md-4 mx-auto" id="UserLoginformdiv" style="margin-top: 200px;">
      
       
      <div class="form-group">
        <label>Username:</label>
        <input type="email" name="username" id="username" placeholder="Enter Username" class="form-control">
        </div>
        <div class="form-group">
          <label>Password:</label>
        <input type="password" name="user_password" id="user_password" placeholder="Enter Password" class="form-control">
         <input type="checkbox"  onclick="ShowPass();"><span style="color: white;">Show Password</span>
        </div>
        <button type="button" id="login" name="submit" value="Login" class="btn btn-dark">Login</button>
        <a href="register.php" class = "btn btn-warning">Register</a>
        <a href="forget_password.php">Forget Password</a>
    </div>
     
    

    
  </div>
  <div class="col-md-4 mx-auto mt-5" id="alert_box">
    <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Failed!</strong>Please Provide Correct Login Details.
</div>
  </div>
	</div>
<?php include_once('inc/footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
//hiding alert box
$("#alert_box").hide();

		$(document).on("click","#login",function(){
			 var username = $("#username").val();
    		var user_password = $("#user_password").val();
    		if(username == ""){
    			$("#username").css("border","3px solid red");
        $("#username").focus();
        setTimeout("$('#username').css('border','')",3000);
        return false;

    		}
    		if(user_password == ""){
    			$("#user_password").css("border","3px solid red");
        $("#user_password").focus();
        setTimeout("$('#user_password').css('border','')",3000);
        return false;

    		}
    		var data = {"username":username,"user_password":user_password}

    		$.ajax({

    			 type : 'POST',
      			url  : 'login_sub.php',
      			data : data,
      			success : function(res){
      				if(res == "Login"){
      					window.location.href = "dashboard.php";
      				}
      				else{
      					//showing alertbox
      					$("#alert_box").show();
      				}
      				
         		
       			}
    		});

	});
});

  function ShowPass(){
    var x = document.getElementById("user_password");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>