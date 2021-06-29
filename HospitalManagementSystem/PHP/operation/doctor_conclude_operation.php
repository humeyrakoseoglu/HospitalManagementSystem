<?php
ob_start();
session_start();
include '../connection.php';
if(isset($_POST['conclude'])){
    $test_name = $_POST['test_name'];
    $prescription =isset($_POST['prescription_serial_number']) ? $_POST['prescription_serial_number']:null;
    $diagnosis = isset($_POST['diagnosis']) ? $_POST['diagnosis']:null;
    $x=rand(10,100000000);
    $diagnosisID= $x;
    $testID=$_POST['test_ID_get'];
    if(!empty($test_name) && !empty($diagnosis)){
    $sorgu = $db -> prepare("INSERT INTO diagnosis SET
        diagnosisID=?,
        diagnosisName = ?
    ");
$ekle = $sorgu->execute([
    $diagnosisID,$diagnosis
]);


$doctor_conclude_query=$db->prepare("UPDATE hospitalrelation SET diagnosisID=? where testID=?");
$doctor_conclude_query->execute([$diagnosisID,$testID]);

$doctor_conclude_query2=$db->prepare("UPDATE appointment SET prescriptionSerialNo='$prescription' where appointmentID=:appointmentID");
$doctor_conclude_query2->execute(array(
    'appointmentID'=>$_SESSION['appointmentId_patients_of_pathologist_ForTest']    
));
if($doctor_conclude_query2){
    header('location:../doctor_page.php?durum-girisbasarili');
    exit;
}

}
else{
    $message="<script>alert('Missing Information')</script>";
    echo $message;  

}
}



?>

