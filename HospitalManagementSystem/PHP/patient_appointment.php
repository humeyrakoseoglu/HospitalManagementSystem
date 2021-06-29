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
    <title>Appointment</title>
    <link rel="stylesheet" href="assets/patient_page_appointment.css">
</head>
<body>
<div class="main_container">
    <div class="container">
    <div id="text_div">
        <p id="text">Upcoming Appointments</p>
        </div>
        <table id="patient_appointment_table">
            <caption>Change the date of an appointment - Remove an appointment from the system</caption>
            <tr id="topList">
                <th>Clinic Name</th>
                <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Appointment ID</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Appointment Status</th>

            </tr>
            <?php
                $patient_appointment_query=$db->prepare("SELECT DISTINCT ca.clinicName,d.doctorName,d.doctorSurname,a.appointmentID,a.appointmentDate,a.appointmentTime, a.appointmentStatus FROM hospitalrelation hr JOIN patient p ON p.patientTRID=hr.patientTRID AND p.patientTRID=:patientTRID 
                JOIN appointment a ON a.appointmentID=hr.appointmentID AND a.appointmentStatus!='Not approved' 
                AND a.appointmentDate>=CURDATE() JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                JOIN admin ca ON ca.clinicName=d.clinicName ORDER BY a.appointmentDate, a.appointmentTime");

                $patient_appointment_query->execute(array(
                    'patientTRID'=>$_SESSION['patientTRID']
                ));

                while ($value=$patient_appointment_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/patient_appointment_operation.php" method="POST"> 
                    <tr>
                        <td><?php echo $value['clinicName'];?></td>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><input type="text" id="appointmentID_input" name="appointmentID" value=<?php echo $value['appointmentID'];?>></td>
                        <td><input type="date" id="appointmentDate" name="appointmentDate" value=<?php echo $value['appointmentDate'];?>></td>
                        <td><?php echo $value['appointmentTime'];?></td>
                        <td name="appointmentStatus"><?php echo $value['appointmentStatus'];?></td>
                        <td><button id="appointmentbutton"type="submit" value="updatebutton" name="updatebutton" onclick="alert('Appointment has been updated.')">Update</button></td>
                        <td><input type="submit" id="appointmentbutton" VALUE="cancel" name="deletebutton" ></td>
                            
                    </tr>
                    </form>
            <?php }?> 
        </table>
       
    <br><br> 
            <a id="button" href="patient_create_appointment.php">
        <input id="createappointmentbutton" type="button" value="Create Appointment" id="createapt">
    </a>
    <br><br><br><br>

    <div id="text_div">
        <p id="text">Past Appointments</p>
        </div>
    <table id="patient_appointment_table">
            <tr id="topList">
                <th>Clinic Name</th>
                <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Diagnosis Name</th>
                <th>Prescription Serial No</th>
   
            </tr>
            <?php
                $patient_page_query=$db->prepare("SELECT DISTINCT c.clinicName, d.doctorBranch,d.doctorName,d.doctorSurname, a.appointmentID, a.`appointmentDate`,a.appointmentTime, di.diagnosisName, a.`prescriptionSerialNo` FROM hospitalrelation hr JOIN doctor d ON d.doctorTRID=hr.doctorTRID 
                JOIN patient p ON p.patientTRID=hr.patientTRID AND p.patientTRID=:patientTRID 
                JOIN admin c ON c.clinicName=d.clinicName 
                JOIN diagnosis di ON di.diagnosisID=hr.diagnosisID AND di.diagnosisID!=0
                JOIN appointment a ON a.appointmentID=hr.appointmentID WHERE a.appointmentDate<CURDATE() 
                ORDER BY a.appointmentDate,a.appointmentTime ASC");
                $patient_page_query->execute(array(
                    'patientTRID'=>$_SESSION['patientTRID']
                ));
                while ($value=$patient_page_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <tr>
                        <td><?php echo $value['clinicName'];?></td>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><?php echo $value['appointmentDate'];?></td>
                        <td><?php echo $value['appointmentTime'];?></td>
                        <td><?php echo $value['diagnosisName'];?></td>
                        <td><?php echo $value['prescriptionSerialNo'];?></td>
                          </tr>
            <?php }?> 
           
                </table>

    </div>
</div>
</body>
</html>