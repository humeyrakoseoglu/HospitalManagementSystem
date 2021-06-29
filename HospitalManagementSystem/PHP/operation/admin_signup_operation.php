<?php
ob_start();
session_start();
include '../connection.php';

if(isset($_POST['adminsignup'])){
    $clinicName = isset($_POST['adminClinicName']) ? $_POST['adminClinicName']:null;
    $adminTRID = isset($_POST['adminTRID']) ? $_POST['adminTRID']:null;
    $adminName = isset($_POST['adminName']) ? $_POST['adminName']:null;
    $adminSurname = isset($_POST['adminSurname']) ? $_POST['adminSurname']:null;
    $adminEmail = isset($_POST['adminEmail']) ? $_POST['adminEmail']:null;
    $adminPassword = isset($_POST['adminPassword']) ? $_POST['adminPassword']:null;
    

    $sorgu = $db -> prepare("INSERT into admin SET
    adminTRID = ?,
    clinicName=?,
    adminName = ?,
    adminSurname = ?,
    adminEmail = ?,
    adminPassword = ?
    ");

    $ekle = $sorgu->execute([
        $adminTRID, $clinicName,$adminName,$adminSurname,$adminEmail,$adminPassword
    ]);



    if($ekle) {
        header('location:../admin_login.php?durum-basarili');

    } else{

        $hata = $sorgu->errorInfo();

        echo 'mysql hatası' .$hata[2];

    }



    

        




}





?>