<?php
ob_start();
session_start();
include '../connection.php';
if(isset($_POST['test_button_forOtherDoctors'])){
    $test_name = isset($_POST['test_name_input']) ? $_POST['test_name_input']:null;
    $test_date = isset($_POST['test_date_input']) ? $_POST['test_date_input']:null;
    $test_result="Not_Entered";
    $x=rand(10,100000000);
    $testID= $x;
    if(!empty( $test_name)&&!empty($test_date)){

$sorgu = $db -> prepare("INSERT INTO test SET
testID=?,
testName = ?,
testDate = ?,
testResult = ?
");
$ekle = $sorgu->execute([
    $testID,$test_name,$test_date,$test_result
]);

$testID_query=$db->prepare("SELECT h.testID From hospitalrelation h where h.appointmentID=:appointmentID ");
$testID_query->execute(array(
    'appointmentID'=>$_SESSION['appointmentId_ForTest']    
));
$testID_hospitalRelation=0;
while ($value= $testID_query->fetch(PDO::FETCH_ASSOC)){   
    $testID_hospitalRelation=$value['testID'];
}
if($testID_hospitalRelation==0){
    $doctor_test_query=$db->prepare("UPDATE hospitalrelation SET testID=$testID where appointmentID=:appointmentID");
    $doctor_test_query->execute(array(
        'appointmentID'=>$_SESSION['appointmentId_ForTest']    
    ));
    if($ekle){
        header('location:../doctor_test.php?durum=basarili');
    }
    else{
        
    }
}
else{
    $doctor_test_query2=$db->prepare("SELECT doctorTRID,patientTRID,appointmentID From hospitalrelation where appointmentID=:appointmentID ");
    $doctor_test_query2->execute(array(
        'appointmentID'=>$_SESSION['appointmentId_ForTest'] 
    ));
    $doctorTRID=0;
    $patientTRID=0;
    $appointmentID=0;
   while ($value= $doctor_test_query2->fetch(PDO::FETCH_ASSOC)){   
        $doctorTRID=$value['doctorTRID'];
        $patientTRID=$value['patientTRID'];
        $appointmentID=$value['appointmentID'];

    }
    $diagnosisID=0; 
    $sorgu = $db -> prepare("INSERT INTO hospitalrelation SET
    doctorTRID=?,
    patientTRID = ?,
    appointmentID = ?,
    testID = ?,
    diagnosisID=?
");
$ekle = $sorgu->execute([
    $doctorTRID,$patientTRID,$appointmentID,$testID,$diagnosisID
]);
if($ekle){
    header('location:../doctor_test.php?durum=basarili');
}
else{
    
}
}
}
else{
    $message="<script>alert('Missing Information')</script>";
    echo $message;
}
}
?>

