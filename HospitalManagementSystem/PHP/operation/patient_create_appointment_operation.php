<?php
ob_start();
session_start();
include '../connection.php';

if(isset($_POST['createapt'])){
    $clinicName = $_POST['clinicName'];
    $doctorBranch = $_POST['doctorBranch'];
    $doctorUsername = $_POST['doctorUsername'];
    $appointmentDate = $_POST['appointmentDate'];
    $appointmentTime = $_POST['appointmentTime'];   
    $x=rand(10,100000000);
    $appointmentID= $x;
    $appointmentStatus = 'Waiting...';
    $prescriptionSerialNo='Not Entered';
    if(!empty( $clinicName )&&!empty($doctorBranch)&&!empty($doctorUsername )&&!empty( $appointmentDate)&&!empty($appointmentTime)){
    //veri tabanı ekleme işlemi
    $sorgu = $db->prepare("INSERT INTO appointment SET
    appointmentID=?,
    appointmentDate = ?,
    appointmentTime = ?,
    appointmentStatus = ?,
    prescriptionSerialNo = ?
    ");

    $ekle = $sorgu->execute([$appointmentID,$appointmentDate, $appointmentTime, 
    $appointmentStatus, $prescriptionSerialNo
    ]);
    
    $array=explode(" ",$doctorUsername);
    $firstname = $array['0'];
    echo $firstname;
    $surname = $array['1'];
    echo $surname;
/*
    $spacePos = strpos($doctorUsername,' ');
    $firstname = substr ($doctorUsername,0,$first);
    $length = strlen($doctorUsername);
    $surnamelength = $length-$spacePos;
    $surname = substr($doctorUsername,$spacePos,$surnamelength);
*/
    $sorguu = $db->prepare("INSERT INTO hospitalrelation SET
    doctorTRID = ?,
    patientTRID = ?,
    appointmentID = ?,
    testID = ?, 
    diagnosisID = ?
    ");


    $get_doctorTRID=$db->prepare("SELECT doctorTRID from doctor where doctorName=? and doctorSurname =?");
    $get_doctorTRID->execute([$firstname,$surname]);
    $doctorTRID="";
   while ($value= $get_doctorTRID->fetch(PDO::FETCH_ASSOC)){   
        $doctorTRID=$value['doctorTRID'];
    }
    
    
    $patientTRID =$_SESSION['patientTRID'];
    $appointmentID= $x;
    $testID = 0; 
    $diagnosisID = 0;
    $ekle = $sorguu->execute([$doctorTRID, $patientTRID, $appointmentID, $testID, $diagnosisID]);

    if($ekle){
        header('location:../patient_appointment.php?durum=basarili');
    }
    else{
      
    }
}
else{
    $message="<script>alert('Missing Information')</script>";
    echo $message;      
}
}

?>