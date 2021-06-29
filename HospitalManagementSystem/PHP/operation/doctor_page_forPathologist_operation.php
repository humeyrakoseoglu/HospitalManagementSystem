<?php
ob_start();
session_start();

include '../connection.php';
if(isset($_POST['testButton'])){
    $testID=$_POST['testID'];
    $testResult= $_POST['testResult'];
    $admin_test_query=$db->prepare("UPDATE test SET testResult=?  where testID=?");
    $admin_test_query->execute([$testResult,$testID]);
header ("Location:../doctor_page_forPathologist.php");
}

if(isset($_POST['patients_of_pathologist_testButton'])){
    $appointmentId_patients_of_pathologist=$_POST['appointmentID2'];
    $_SESSION['appointmentId_patients_of_pathologist_ForTest']=$appointmentId_patients_of_pathologist;
    header('location:../doctor_page_test_forPathologist.php');

}
if(isset($_POST['concludebutton'])){
    /*appointmentIDLERDEN SSESSİON EKLEMEK YANLIŞ OLABİLİR*/ 
    $appointmentId_patients_of_pathologist=$_POST['appointmentID2'];
    $_SESSION['appointmentId_patients_of_pathologist_ForTest']=$appointmentId_patients_of_pathologist;
    header('location:../doctor_conclude_forPathologist.php');
}
?>
