<?php
include '../connection.php';
if(isset($_POST['updatebutton'])){
    $appointmentDate= $_POST['appointmentDate'];
    $appointmentID=$_POST['appointmentID'];
    $appointmentStatus=$_POST['appointmentStatus'];
    $patient_appt_query=$db->prepare("UPDATE appointment SET appointmentDate=? 
                                      AND appointmentStatus='Waiting...'  
                                      where appointmentID=?");
    $patient_appt_query->execute([$appointmentDate,$appointmentID]);
    header ("Location:../patient_appointment.php");
}
 
if(isset($_POST['deletebutton'])){
    $appointmentID=$_POST['appointmentID'];
    $delete=$db->prepare("DELETE from appointment where appointmentID=$appointmentID");
    $patient_appt_querycancel= $delete->execute();
header ("Location:../patient_appointment.php");
}
 
?>
