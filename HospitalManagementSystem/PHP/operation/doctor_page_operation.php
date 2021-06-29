<?php
ob_start();
session_start();
include '../connection.php';
if(isset($_POST['testbutton'])){
    $appointmentIdForTest=$_POST['appointmentIDforDoctorPage'];
    $_SESSION['appointmentId_ForTest']=$appointmentIdForTest;
    header('location:../doctor_page_test_forOtherDoctors.php');

}
if(isset($_POST['concludebutton'])){
    /*appointmentIDLERDEN SSESSİON EKLEMEK YANLIŞ OLABİLİR*/ 
    $appointmentId_patients_of_pathologist=$_POST['appointmentIDforDoctorPage'];
    $_SESSION['appointmentId_patients_of_pathologist_ForTest']=$appointmentId_patients_of_pathologist;
    header('location:../doctor_conclude.php');
}
?>