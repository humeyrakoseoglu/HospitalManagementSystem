<?php
include 'doctor_header_forPathologist.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
    <link rel="stylesheet" href="assets/doctor_pagee.css">
</head>
<body>
    <div class="main_container">
        <div class="container">
        <div id="text_div">
            <p id="text">CONCLUDE TEST FOR PATIENT OF OTHER DOCTORS</p>
        </div>
        <table id="doctor_page_table">
            <tr id="topList">
                <th>Patient TRID</th>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Test ID</th>
                <th>Test Name</th>
                <th>Test Date</th>
                <th>Test Result</th>
            </tr>
            <?php
                $doctor_page_query=$db->prepare("SELECT DISTINCT p.patientTRID,p.patientName,p.patientSurname,t.testID,t.testName,t.testDate,t.testResult
                FROM hospitalrelation hr 
                JOIN test t ON hr.testID=t.testID AND t.testResult='Not_Entered' AND t.testDate<=CURDATE()
                JOIN doctor d ON d.doctorTRID=hr.doctorTRID AND hr.diagnosisID=0 AND hr.testID!=0 AND d.doctorTRID!=:doctorTRID
                JOIN patient p ON p.patientTRID=hr.patientTRID 
                JOIN appointment a ON a.appointmentID=hr.appointmentID AND a.appointmentStatus='approved' AND a.appointmentDate<=CURDATE() ORDER BY a.appointmentDate, a.appointmentTime");
               $doctor_page_query->execute(array(
                'doctorTRID'=>$_SESSION['doctorTRID']
                ));
                while ($value=$doctor_page_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/doctor_page_forPathologist_operation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['patientTRID'];?></td>
                        <td><?php echo $value['patientName'];?></td>
                        <td><?php echo $value['patientSurname'];?></td>
                        <td><input type="text" id="appointmentIDforDoctorPage_input" name="testID" value=<?php echo $value['testID'];?>></td>
                        <td><?php echo $value['testName'];?></td>
                        <td><?php echo $value['testDate'];?></td>
                        <td><input type="text" id="testResult" name="testResult" value=<?php echo $value['testResult'] ;?>></td>                       
                        <!--<td><button type="submit" class="sub" id="giris" name="submit">disapproved</button></td>-->
                        <td><button id="testbutton"type="submit" value="test" name="testButton" >test</button></td>
                        
                    </tr>
                    </form>
            <?php }?> 
            </table>
            <br>
            <div id="text_div">
                <p id="text">UNCONCLUDED APPOINTMENTS</p>
            </div>
            <table id="doctor_page_table">
            <tr id="topList">
                <th>Patient TRID</th>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Appointment ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>
            <?php
                $doctor_page_query=$db->prepare("SELECT DISTINCT p.patientTRID,p.patientName,p.patientSurname,a.appointmentID,a.appointmentDate,a.appointmentTime 
                FROM hospitalrelation hr 
                JOIN doctor d ON d.doctorTRID=hr.doctorTRID AND hr.diagnosisID=0 AND d.doctorTRID=:doctorTRID
                JOIN patient p ON p.patientTRID=hr.patientTRID 
                JOIN appointment a ON a.appointmentID=hr.appointmentID AND a.appointmentStatus='approved' AND a.appointmentDate<=CURDATE() ORDER BY a.appointmentDate, a.appointmentTime");
               $doctor_page_query->execute(array(
                'doctorTRID'=>$_SESSION['doctorTRID']
                ));
                while ($value=$doctor_page_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/doctor_page_forPathologist_operation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['patientTRID'];?></td>
                        <td><?php echo $value['patientName'];?></td>
                        <td><?php echo $value['patientSurname'];?></td>
                        <td><input type="text" id="appointmentIDforDoctorPage_input" name="appointmentID2" value=<?php echo $value['appointmentID'];?>></td>
                        <td><?php echo $value['appointmentDate'];?></td>
                        <td><?php echo $value['appointmentTime'];?></td>
                        <!--<td><button type="submit" class="sub" id="giris" name="submit">disapproved</button></td>-->
                        <td><button id="testbutton"type="submit" value="test" name="patients_of_pathologist_testButton" >test</button></td>
                        <td><button id="doctor_page_button"type="submit" value="conclude" name="concludebutton" >conclude</button></td>
                    </tr>
                    </form>
            <?php }?>
            </table>
           <br>
        <div id="text_div">
        <p id="text">UPCOMING APPOINTMENTS</p>
        </div>
       
        <table id="doctor_page_table">
            <tr id="topList">
                <th>Patient TRID</th>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Appointment ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
            </tr>
            <?php
                $doctor_page_query=$db->prepare("SELECT DISTINCT p.patientTRID,p.patientName,p.patientSurname,a.appointmentID,a.appointmentDate,a.appointmentTime
                FROM hospitalrelation hr JOIN doctor d ON d.doctorTRID=hr.doctorTRID AND d.doctorTRID=:doctorTRID
                JOIN patient p ON p.patientTRID=hr.patientTRID 
                JOIN appointment a ON a.appointmentID=hr.appointmentID AND a.appointmentStatus='approved' AND a.appointmentDate>CURDATE()
                ORDER BY a.appointmentDate, a.appointmentTime");
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
                        <td><input type="text" id="appointmentIDforDoctorPage_input" name="appointmentIDforDoctorPage" value=<?php echo $value['appointmentID'];?>></td>
                        <td><?php echo $value['appointmentDate'];?></td>
                        <td><?php echo $value['appointmentTime'];?></td>
                        <!--<td><button type="submit" class="sub" id="giris" name="submit">disapproved</button></td>-->
                    </tr>
                    </form>
            <?php }?> 
        </table>
        <br>
         <div id="text_div">
                <p id="text">PAST APPOINTMENTS</p>
            </div>
       <table id="doctor_page_table">
            <tr id="topList">
                <th>Patient TRID</th>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Appointment ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Diagnosis</th>
            </tr>
            <?php
                $doctor_page_query=$db->prepare("SELECT DISTINCT p.patientTRID,p.patientName,p.patientSurname,a.appointmentID,a.appointmentDate,a.appointmentTime,di.diagnosisName
                FROM hospitalrelation hr JOIN doctor d ON d.doctorTRID=hr.doctorTRID AND d.doctorTRID=:doctorTRID
                JOIN patient p ON p.patientTRID=hr.patientTRID 
                JOIN diagnosis di ON di.diagnosisID=hr.diagnosisID AND hr.diagnosisID!=0
                JOIN appointment a ON a.appointmentID=hr.appointmentID AND a.appointmentStatus='approved' AND a.appointmentDate<=CURDATE()
                ORDER BY a.appointmentDate, a.appointmentTime");
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
                        <td><input type="text" id="appointmentIDforDoctorPage_input" name="appointmentIDforDoctorPage" value=<?php echo $value['appointmentID'];?>></td>
                        <td><?php echo $value['appointmentDate'];?></td>
                        <td><?php echo $value['appointmentTime'];?></td>
                        <td><?php echo $value['diagnosisName'];?></td>
                        <!--<td><button type="submit" class="sub" id="giris" name="submit">disapproved</button></td>-->
                    </tr>
                    </form>
            <?php }?> 
        </table>
        </div>
     </div>       
</body>
</html>