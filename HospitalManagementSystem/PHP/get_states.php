<?php
require_once('db.php');
$country_id = $_POST['country_id'];
$state_id = $_POST['state_id'];
if($country_id!='')
{
	$states_result = $conn->query('SELECT DISTINCT d.doctorTRID, d.doctorBranch FROM doctor d, admin c WHERE d.clinicName = c.clinicName and c.adminTRID ='.$country_id.'');
	$options = "<option value=''>Select Branch</option>";
	while($row = $states_result->fetch_assoc()) {
	$options .= "<option value='".$row['doctorTRID']."'>".$row['doctorBranch']."</option>";
	}
	echo $options;
}
if($state_id!='')
{
	$name_result = $conn->query('SELECT DISTINCT d.doctorName, adminTRID,d.doctorSurname
	FROM doctor d, admin c
	WHERE d.clinicName = c.clinicName and d.doctorTRID ='.$state_id.'');
	 
	$optionss = "<option value=''>Select Doctor</option>";
	while($row = $name_result->fetch_assoc()) {
	$optionss .= "<option value='".$row['adminTRID']."'>".$row['doctorName']." ".$row['doctorSurname']."</option>";
	}
	echo $optionss;
}


?>