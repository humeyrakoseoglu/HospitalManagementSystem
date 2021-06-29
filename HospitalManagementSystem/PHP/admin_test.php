<?php
include 'admin_header.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets\admin_page_test.css">
   
    <title>Test</title>
</head>
<body>
		<div class="main_container">
            <div class="container">
                <br>
            <table id="admin_test_table">
            <caption>CONCLUDE TEST</caption>
            <tr id="topList">
                <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Test ID</th>
                <th>Test Name</th>
                <th>Test Date</th>
                <th>Test Result</th>
            </tr>
            <?php
                $admin_test_query=$db->prepare("SELECT DISTINCT d.doctorName, d.doctorSurname, p.patientName, p.patientSurname, t.testID, t.`testName`, t.`testDate`, t.`testResult` 
                FROM hospitalrelation hr JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                JOIN patient p ON p.patientTRID=hr.patientTRID JOIN admin c ON c.clinicName=d.clinicName AND c.adminTRID=:adminTRID 
                JOIN test t ON t.`testID`=hr.`testID` and t.`testResult`='Not_Entered' AND t.testDate<=CURDATE() ORDER BY t.testDate ASC");
                $admin_test_query->execute(array(
                    'adminTRID'=>$_SESSION['adminTRID']
                ));
                while ($value=$admin_test_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/admin_test_operation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><?php echo $value['patientName'];?></td>
                        <td><?php echo $value['patientSurname'];?></td>
                        <td ><input type="text" id="testID" name="testID" value=<?php echo $value['testID'];?>></td>
                        <td><?php echo $value['testName'];?></td>
                        <td><?php echo $value['testDate'];?></td>
                        <td><input type="text" id="testResult" name="testResult" value=<?php echo $value['testResult'] ;?>></td>                       
                        <!--<td><button type="submit" class="sub" id="giris" name="submit">disapproved</button></td>-->
                        <td><a href ="admin_test.php"> <button id="testButton" value="ok" name="testButton">ok</button></a></td>

                    </tr>
                    </form>
            <?php  }?> 
        </table>
        <br>
        <table id="admin_test_table">
        <caption>TESTS</caption>
            <tr id="topList">
                <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Test ID</th>
                <th>Test Name</th>
                <th>Test Date</th>
                <th>Test Result</th>
            </tr>
            <?php
                $admin_test_query=$db->prepare("SELECT DISTINCT d.doctorName, d.doctorSurname, p.patientName, p.patientSurname, t.testID, t.`testName`, t.`testDate`, t.`testResult` 
                FROM hospitalrelation hr JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                JOIN patient p ON p.patientTRID=hr.patientTRID 
                JOIN admin c ON c.clinicName=d.clinicName AND c.adminTRID=:adminTRID 
                JOIN test t ON t.`testID`=hr.`testID` and t.`testResult`!='Not Entered' AND t.testDate<=CURDATE() ORDER BY t.testDate ASC");
                $admin_test_query->execute(array(
                    'adminTRID'=>$_SESSION['adminTRID']
                ));
                while ($value=$admin_test_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/admin_test_operation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><?php echo $value['patientName'];?></td>
                        <td><?php echo $value['patientSurname'];?></td>
                        <td><?php echo $value['testID'];?></td>
                        <td><?php echo $value['testName'];?></td>
                        <td><?php echo $value['testDate'];?></td>
                        <td><?php echo $value['testResult'];?></td>
                    </tr>
                    </form>
            <?php  }?> 
        </table>


</div></div>
</body>
</html>