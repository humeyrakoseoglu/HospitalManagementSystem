<?php
ob_start();
session_start();
include '../connection.php';

if(isset($_POST['patientTRID']) && isset($_POST['patientPassword']) ) {
    $patientTRID = $_POST['patientTRID'];
    $patientPassword =$_POST['patientPassword'];

    if(empty($patientTRID)){
        header("Location:../patient_login.php?error=Email is required");    
    }
    else if(empty($patientPassword)){
        header("Location:../patient_login.php?error=Password is required"); 

    }
    else{

        $patientsor = $db->prepare("SELECT * FROM patient WHERE patientTRID=? and patientPassword=?"); 

        $patientsor->execute([$patientTRID,$patientPassword]);

        if($patientsor->rowCount()==1){

            $_SESSION['patientTRID']=$patientTRID;

            header('location:../patient_page.php?durum-girisbasarili');
            exit;
        }

        else{
           /*alert eklenecek*/
            header('location:../patient_login.php?durum-girisbasarisiz');

        }

    }



}

?>