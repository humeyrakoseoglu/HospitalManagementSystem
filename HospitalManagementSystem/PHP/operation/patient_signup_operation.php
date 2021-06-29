<?php
ob_start();
session_start();
include '../connection.php';

if(isset($_POST['patient_signup'])){

    $patientTRID = isset($_POST['patientTRID']) ? $_POST['patientTRID']:null;
    $patientName = isset($_POST['patientName']) ? $_POST['patientName']:null;
    $patientSurname = isset($_POST['patientSurname']) ? $_POST['patientSurname']:null;
    $patientGender = isset($_POST['patientGender']) ? $_POST['patientGender']:null;
    $patientDOB = isset($_POST['patientDOB']) ? $_POST['patientDOB']:null;
    $patientEmail = isset($_POST['patientEmail']) ? $_POST['patientEmail']:null;
    $patientPhone = isset($_POST['patientPhone']) ? $_POST['patientPhone']:null;
    $patientAddress = isset($_POST['patientAddress']) ? $_POST['patientAddress']:null;
    $patientPassword = isset($_POST['patientPassword']) ? $_POST['patientPassword']:null;



    $sorgu = $db -> prepare("INSERT into patient SET
    patientTRID = ?,
    patientName = ?,
    patientSurname = ?,
    patientGender = ?,
    patientDOB = ?,
    patientEmail = ?,
    patientPhone = ?,
    patientAddress = ?,
    patientPassword = ?
    ");



    $ekle = $sorgu->execute([
        $patientTRID,$patientName,$patientSurname,$patientGender,$patientDOB, $patientEmail, $patientPhone ,$patientAddress ,$patientPassword
    ]);



    if($ekle) {
        header('location:../patient_login.php?durum-basarili');

    } else{

        $hata = $sorgu->errorInfo();

        echo 'mysql hatası' .$hata[2];

    }



    

        




}





?>