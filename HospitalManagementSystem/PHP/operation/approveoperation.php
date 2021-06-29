<?php
include '../connection.php';
if(isset($_POST['disapproved'])){
    $appointmentID=$_POST['appointmentID'];
    $admin_appointment_query=$db->prepare("UPDATE appointment SET appointmentStatus='Not Approved' where appointmentID=$appointmentID");
    $admin_appointment_query->execute();
header ("Location:../admin_appointment.php");

}
if(isset($_POST['approved'])){
    $appointmentID=$_POST['appointmentID'];
    $admin_appointment_query=$db->prepare("UPDATE appointment SET appointmentStatus='Approved' where appointmentID=$appointmentID");
    $admin_appointment_query->execute();
header ("Location:../admin_appointment.php");

}


?>