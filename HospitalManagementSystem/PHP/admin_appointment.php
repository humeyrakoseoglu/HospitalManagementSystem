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
    <title>Appointment</title>
    <link rel="stylesheet" href="assets/admin_appointmentt.css">
</head>
<body>
<div class="main_container">
    <div class="container">
        <table id="admin_appointment_table">
        <caption>PENDING APPOINTMENTS</caption>
            <tr id="topList">
             <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Appointment ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Appointment Status</th>
            </tr>
            <?php
                $admin_appointment_query=$db->prepare("SELECT DISTINCT d.doctorName, d.doctorSurname, p.patientName, p.patientSurname, a.appointmentID, a.appointmentDate, a.appointmentTime, a.appointmentStatus 
                FROM hospitalrelation hr 
                JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                JOIN admin ca ON ca.clinicName=d.clinicName AND ca.adminTRID=:adminTRID 
                JOIN patient p ON p.patientTRID=hr.patientTRID 
                JOIN appointment a ON a.appointmentID=hr.appointmentID 
                AND a.appointmentStatus='Waiting...' 
                AND a.appointmentTime>=CURDATE()
                ORDER BY a.appointmentDate, a.appointmentTime");
                $admin_appointment_query->execute(array(
                    'adminTRID'=>$_SESSION['adminTRID']   
                ));
                $x = 1;
                while ($value=$admin_appointment_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/approveoperation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><?php echo $value['patientName'];?></td>
                        <td><?php echo $value['patientSurname'];?></td>
                        <td><input type="text" id="appointmentID_input" name="appointmentID" value=<?php echo $value['appointmentID'];?>></td>
                        <td><?php echo $value['appointmentDate'];?></td>
                        <td><?php echo $value['appointmentTime'];?></td>
                        <td name="appointmentStatus"><?php echo $value['appointmentStatus'];?></td>
                            <!--<td><button type="submit" class="sub" id="giris" name="submit">disapproved</button></td>-->
                            <td><button id="appointmentbutton"type="submit" value="approved" name="approved">approved</button></td>
                            <td><button id="appointmentbutton"type="submit" value="disapproved" name="disapproved">disapproved</button></td>
                            
                    </tr>
                    </form>
            <?php $x++; }?> 
        </table>
        <table id="admin_appointment_table">
        <caption>APPOINTMENTS</caption>
            <tr id="topList">
             <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Patient Name</th>
                <th>Patient Surname</th>
                <th>Appointment ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Appointment Status</th>
            </tr>
            <?php
                $admin_appointment_query=$db->prepare("SELECT DISTINCT d.doctorName, d.doctorSurname, p.patientName, p.patientSurname, a.appointmentID, a.appointmentDate, a.appointmentTime, a.appointmentStatus 
                FROM hospitalrelation hr 
                JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                JOIN admin ca ON ca.clinicName=d.clinicName AND ca.adminTRID=:adminTRID 
                JOIN patient p ON p.patientTRID=hr.patientTRID 
                JOIN appointment a ON a.appointmentID=hr.appointmentID 
                AND a.appointmentStatus!='Waiting...' 
                ORDER BY a.appointmentDate DESC,a.appointmentTime");
                $admin_appointment_query->execute(array(
                    'adminTRID'=>$_SESSION['adminTRID']   
                ));
                $x = 1;
                while ($value=$admin_appointment_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/approveoperation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><?php echo $value['patientName'];?></td>
                        <td><?php echo $value['patientSurname'];?></td>
                        <td><input type="text" id="appointmentID_input" name="appointmentID" value=<?php echo $value['appointmentID'];?>></td>
                        <td><?php echo $value['appointmentDate'];?></td>
                        <td><?php echo $value['appointmentTime'];?></td>
                        <td name="appointmentStatus"><?php echo $value['appointmentStatus'];?></td>
                            <!--<td><button type="submit" class="sub" id="giris" name="submit">disapproved</button></td>-->
                            
                    </tr>
                    </form>
            <?php $x++; }?> 
        </table>


    </div>
</div>
</body>
</html>