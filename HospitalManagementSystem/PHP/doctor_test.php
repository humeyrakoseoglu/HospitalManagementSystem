<?php
include 'connection.php';
include 'doctor_header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/doctor_test.css">
    <title>Doctor Test Page </title>   
</head>
<body>
<div class="main_container">
        <div class="container">
            <div id="text_div">
            <p id="test_of_patients_table_text">Test of Patients Table</p>
            </div>
        
        <table id="doctor_test_table">
            <tr id="topList">
                <th>Patient TRID</th>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Test Name</th>
                <th>Test Date</th>
                <th>Test Result</th>
            </tr>
            <?php
                $doctor_page_query=$db->prepare("SELECT DISTINCT p.patientTRID,p.patientName,p.patientSurname,t.testName,t.testDate,t.testResult FROM hospitalrelation hr JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                AND d.doctorTRID=:doctorTRID JOIN patient p ON p.patientTRID=hr.patientTRID 
                JOIN test t ON t.testID=hr.testID AND hr.testID!=0 ORDER BY testDate asc");
                $doctor_page_query->execute(array(
                    'doctorTRID'=>$_SESSION['doctorTRID']
                ));
                while ($value=$doctor_page_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/doctor_page_operation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['patientTRID'];?></td>
                        <td><?php echo $value['patientName'];?></td>
                        <td><?php echo $value['patientSurname'];?></td>
                        <td><?php echo $value['testName'];?></td>
                        <td><?php echo $value['testDate'];?></td>
                        <td><?php echo $value['testResult'];?></td>
                        <!--<td><button type="submit" class="sub" id="giris" name="submit">disapproved</button></td>-->
                    </tr>
                    </form>
            <?php }?> 
        </table>
        </div>
    </div>   
</body>
</html>