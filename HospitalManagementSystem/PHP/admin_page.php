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
    <title>Document</title>
    <link rel="stylesheet" href="assets/admin_page.css">
</head>
<body>   
  
 <div class="main_container">   
                <div class="column">
                  <div class="card_content">
                  <br>
                        <h3>TOTAL DOCTOR</h3> 
                        <br>
                        <!--retrieve total doctor-->
                        <?php
                $admin_totaldoctorquery=$db->prepare("SELECT COUNT( DISTINCT doctorTRID) AS totalDoctor FROM 
                doctor d,admin c WHERE c.clinicName=d.clinicName AND c.adminTRID=:adminTRID
              ");
                $admin_totaldoctorquery->execute(array(
                  'adminTRID'=>$_SESSION['adminTRID']
              ));
                while ($value=$admin_totaldoctorquery->fetch(PDO::FETCH_ASSOC)){?>
                        <p><?php echo $value['totalDoctor'];?></p>
            <?php } ?> 
                  </div>
                </div>


               <div class="column">
                    <div class="card_content">
                    <br>
                        <h3>TOTAL PATIENT</h3>  
                        <br>
                        <!--retrieve total patient-->
                        <?php
                $admin_totalpatientquery=$db->prepare("SELECT COUNT( DISTINCT p.patientTRID) AS totalPatient FROM 
                hospitalrelation hr, patient p,admin c,doctor d WHERE d.doctorTRID=hr.doctorTRID AND d.clinicName=c.clinicName AND hr.patientTRID=p.patientTRID AND c.adminTRID=:adminTRID");
                $admin_totalpatientquery->execute(array(
                  'adminTRID'=>$_SESSION['adminTRID']
              ));
                while ($value=$admin_totalpatientquery->fetch(PDO::FETCH_ASSOC)){?>
                        <p><?php echo $value['totalPatient'];?></p>
            <?php } ?>      
                        </div>
                     </div>


                <div class="column">
                    <div class="card_content">
                    <br>
                         <h3>CURRENT APPOINTMENT</h3>
                         <br>
                        <!--retrieve total appointment-->
                        <?php
                $admin_totalappointmentquery=$db->prepare("SELECT COUNT(DISTINCT a.appointmentID) AS totalAppointment 
                FROM appointment a, admin ca, hospitalrelation hr,doctor d
                WHERE ca.clinicName=d.clinicName AND d.doctorTRID=hr.doctorTRID AND a.appointmentID=hr.appointmentID 
                AND d.clinicName=ca.clinicName AND ca.adminTRID=:adminTRID  AND a.appointmentDate 
                AND a.appointmentDate>=CURDATE()");
                $admin_totalappointmentquery->execute(array(
                  'adminTRID'=>$_SESSION['adminTRID']
              ));
                while ($value=$admin_totalappointmentquery->fetch(PDO::FETCH_ASSOC)){?>
                        <p><?php echo $value['totalAppointment'];?></p>
            <?php } ?>      
                    </div>
                    
                </div>
        
       <!--patients table-->
           <table id="patients"> 
           <caption>A list of all patients and the number of appointments they have had in the past year</caption>
  <tr id="topList">
    <th>Patient ID</th>
    <th>Patient Name</th>
    <th>Patient Surname</th>
    <th>Past Year Appointment Number</th>
  </tr>
  <!--retrieve past appointment-->
                <?php
                $admin_pastappointmentquery=$db->prepare("SELECT p.patientTRID, p.patientName , p.patientSurname,
                COUNT(DISTINCT hr.appointmentID) AS pastAppointmentNumber
                FROM patient p, hospitalrelation hr, appointment a, admin ca,doctor d
                WHERE p.patientTRID=hr.patientTRID AND ca.clinicName=d.clinicName
                AND ca.adminTRID=:adminTRID AND hr.appointmentID IN (SELECT a.appointmentID
                FROM appointment a
                WHERE YEAR(a.appointmentDate) = YEAR(CURDATE()) - 1 )
                GROUP BY hr.patientTRID
                UNION
                SELECT p.patientTRID, p.patientName , p.patientSurname,
                0 AS pastAppointmentNumber
                FROM patient p, hospitalrelation hr, appointment a, admin ca,doctor d
                WHERE p.patientTRID=hr.patientTRID AND ca.clinicName=d.clinicName
                AND ca.adminTRID=:adminTRID AND p.patientTRID NOT IN (SELECT p.patientTRID FROM patient p, appointment a, hospitalrelation hr WHERE hr.appointmentID=a.appointmentID and p.patientTRID=hr.patientTRID and a.appointmentID IN (SELECT a.appointmentID
                FROM appointment a
                WHERE YEAR(a.appointmentDate) = YEAR(CURDATE()) - 1 ))
                GROUP BY hr.patientTRID");
                $admin_pastappointmentquery->execute(array(
                  'adminTRID'=>$_SESSION['adminTRID']
                ));
                while ($value=$admin_pastappointmentquery->fetch(PDO::FETCH_ASSOC)){?>
                    <tr>
                        <td><?php echo $value['patientTRID'];?></td>
                        <td><?php echo $value['patientName'];?></td>
                        <td><?php echo $value['patientSurname'];?></td>
                        <td><?php echo $value['pastAppointmentNumber'];?></td>
                    </tr>
                <?php } ?>
  
        </table>  
        </div> 
   
      
</body>
</html>