<?php
include 'patient_header.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
    <link rel="stylesheet" href="assets/patient_pagee.css">

</head>
<body>
    
	<div class="main_container">
		<div class="container">
       <br>
        <table id="patient_table">
            <caption>A list of all doctors that have seen this patient</caption>
            <tr id="topList">
                <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Doctor Position</th>
                <th>Doctor Branch</th>
            </tr>
            <?php
                $patient_doctor_query=$db->prepare("SELECT DISTINCT d.doctorName,d.doctorSurname,d.doctorPosition,d.doctorBranch 
                FROM hospitalrelation hr
                JOIN patient p ON p.patientTRID=hr.patientTRID 
                AND p.patientTRID=:patientTRID
                JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                JOIN appointment a ON a.appointmentID=hr.appointmentID 
                AND a.appointmentStatus='approved'
                ");
                $patient_doctor_query->execute(array(
                    'patientTRID'=>$_SESSION['patientTRID']
                ));
                while ($value=$patient_doctor_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/patient_doctor_operation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><?php echo $value['doctorPosition'];?></td>
                        <td><?php echo $value['doctorBranch'];?></td>
                        
                    </tr>
                    </form>
            <?php }?> 
        </table>
        <br><br>
        <table id="patient_table">
        <caption>A list of all tests</caption>
            <tr id="topList">
                <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Test Name</th>
                <th>Test Date</th>
                <th>Test Result</th>
            </tr>
            <?php
                $patient_doctor_query=$db->prepare("SELECT d.doctorName, d.doctorSurname, t.testName, t.testDate, t.testResult
                                                    FROM hospitalrelation hr
                                                    JOIN patient p ON p.patientTRID=hr.patientTRID and p.patientTRID=:patientTRID
                                                    JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                                                    JOIN appointment a ON a.appointmentID=hr.appointmentID AND a.appointmentStatus='approved'
                                                    JOIN test t ON t.testID=hr.testID AND hr.testID!=0
                                                    ORDER BY d.doctorName
                
                    ");
                $patient_doctor_query->execute(array(
                    'patientTRID'=>$_SESSION['patientTRID']
                ));
                $x = 1;
                while ($value=$patient_doctor_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/patient_test_operation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><?php echo $value['testName'];?></td>
                        <td><?php echo $value['testDate'];?></td>
                        <td><?php echo $value['testResult'];?></td>
                           
                    </tr>
                    </form>
            <?php $x++; }?> 
        </table>

		</div>
	 </div>

</body>
</html>