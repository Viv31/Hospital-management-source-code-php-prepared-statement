<?php
include_once("conn/config.php");
$month = $_POST['month'];
$year = $_POST['year'];

$start_date = $year."-".$month."-"."01";
$end_date = $year."-".$month."-"."31";

$get_reports = "SELECT count(*) as total_patient FROM `appointment` WHERE appointment_date BETWEEN '".$start_date."' AND '".$end_date."'";
$res = mysqli_query($conn,$get_reports);
$data = mysqli_fetch_assoc($res);

if($month == "01"){
	echo $month_val = "January";

}
if($month == "02"){
	echo $month_val = "February";

}
if($month == "03"){
	echo $month_val = "March";

}
if($month == "04"){
	echo $month_val = "April";

}
if($month == "05"){
	echo $month_val = "May";

}
if($month == "06"){
	echo $month_val = "June";

}
if($month == "07"){
	echo $month_val = "July";

}
if($month == "08"){
	echo $month_val = "August";

}
if($month == "09"){
	echo $month_val = "September";

}
if($month == "10"){
	echo $month_val = "October";

}
if($month == "11"){
	echo $month_val = "November";

}
if($month == "12"){
	echo $month_val = "December";

}

echo "<table class='table table-dark table-hover'>
    <thead>
      <tr>
        <th>Sno</th>
        <th>Month</th>
        <th>No. of Patients</th>
       </tr>
    </thead>
    <tbody>
    	<tr>
        <td>01</td>
        <td>".$month_val."</td>
        <td>".$data['total_patient']."</td>
        </tr>
    </tbody>
    </table>";

?>