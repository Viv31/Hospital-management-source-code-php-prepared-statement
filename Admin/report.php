<?php 
include_once('inc/session.php');
include_once('inc/header.php');
include_once('inc/navbar.php');
?>
<div class="container">
	<div class="row">
<div class="col-md-6">
	<div class="form-group">
		<label>Select Months</label>
			<select class="form-control" name="month" id="month">
				<option value="">--Select Months--</option>
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			</select>
		</div>
</div>
<div class="col-md-6">
	<div class="form-group">
		<label>Select Year</label>
			<select class="form-control" name="year" id="year">
				<option value="">--Select Year--</option>
				<option value="2020">2020</option>
				<option value="2021">2021</option>
				<option value="2022">2022</option>
				<option value="2023">2023</option>
				<option value="2024">2024</option>
				<option value="2025">2025</option>
				<option value="2026">2026</option>
				<option value="2027">2027</option>
				<option value="2028">2028</option>
				<option value="2029">2029</option>
				<option value="2030">2030</option>
				
			</select>
		</div>
</div>
<button type="button" class="mb-10 btn btn-primary" id="Monthly_report">Get Monthly Rport</button>&nbsp;
<button type="button" class="mb-10 btn btn-primary" id="yearly_report">Get Yearly Rport</button>
</div>
<br>
<div class="row">
	<h3 class="text-center text-white">Reports</h3>
	<div class="col-md-12" id="tbl"></div>
	<div class="col-md-12" id="overall_report">
		<table class='table table-dark table-hover'>
    <thead>
      <tr>
        <th>Sno</th>
        
        <th>No. of Patients</th>
       </tr>
    </thead>
    <?php 
$get_Overallreports = "SELECT count(*) as total_patient FROM `appointment`";
$res = mysqli_query($conn,$get_Overallreports);
$data = mysqli_fetch_assoc($res);

    ?>
    <tbody>
    	<tr>
        <td><?php echo "1"; ?></td>
        
        <td><?php echo $data['total_patient']; ?></td>
        </tr>
    </tbody>
    </table>
	</div>
</div>
</div>
<?php include_once('inc/footer.php'); ?>
<script type="text/javascript">
	$("#Monthly_report").click(function(){
		var month = $("#month").val();
		var year = $("#year").val();

		//alert(month);
		//alert(year);

		if(month == ""){
			
			$("#month").css("border","2px solid red");
			$("#month").focus();
			setTimeout("$('#month').css('border','')",3000);
			return false;

		}

		if(year == ""){
			$("#year").css("border","2px solid red");
			$("#year").focus();
			setTimeout("$('#year').css('border','')",3000);
			return false;

		}

		$.ajax({
			type:"POST",
			url:"get_monthly_report.php",
			data:{
				month:month,
				year:year

			},

			beforeSend:function(){
				$("#tbl").html("<center><img src ='img/loading.gif'></center>");
			},
			success:function(res){
				//alert(res);
				$("#overall_report").hide();
				$("#tbl").html(res);


			}

		});
});

//////////////////////////////////Yearly Report////////////////////////////////////////

	$("#yearly_report").click(function(){
		//var month = $("#month").val();
		var year = $("#year").val();

		if(year == ""){
			$("#year").css("border","2px solid red");
			$("#year").focus();
			setTimeout("$('#year').css('border','')",3000);
			return false;

		}

		$.ajax({
			type:"POST",
			url:"overallreport.php",
			data:{
				year:year

			},

			beforeSend:function(){
				$("#overall_report").html("<center><img src ='img/loading.gif'></center>");
			},
			success:function(res){
				//alert(res);
				//$("#overall_report").hide();
				$("#tbl").show();
				$("#overall_report").html(res);


			}

		});
});

</script>