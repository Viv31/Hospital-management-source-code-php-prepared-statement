<?php
include_once("conn/config.php");

$year = $_POST['year'];

$start_date = $year."-"."01"."-"."01";
$end_date = $year."-"."12"."-"."31";

$get_reports = "SELECT count(*) as total_patient FROM `appointment` WHERE appointment_date BETWEEN '".$start_date."' AND '".$end_date."'";
$res = mysqli_query($conn,$get_reports);
$data = mysqli_fetch_assoc($res);

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
        <td>January-December</td>
        <td>".$data['total_patient']."</td>
        </tr>
    </tbody>
    </table>";


?>