<?php

ob_start();
session_start();


include '../connection.php';

if(isset($_POST['doctorTRID']) && isset($_POST['doctorPassword']) ) {
    $doctorTRID = $_POST['doctorTRID'];
    $doctorPassword =$_POST['doctorPassword'];

    if(empty($doctorTRID)){
        header("Location:../doctor_login.php?error=Email is required");    
    }
    else if(empty($doctorPassword)){
        header("Location:../doctor_login.php?error=Password is required"); 

    }
    else{
        $doctorsor = $db->prepare("SELECT * FROM doctor WHERE doctorTRID=? and doctorPassword=?"); 
        $doctorsor->execute([$doctorTRID,$doctorPassword]);

    if($doctorsor->rowCount()==1){
    $_SESSION['doctorTRID']=$doctorTRID;
    $doctor_page_test_query=$db->prepare("SELECT * FROM doctor d where d.doctorTRID=$doctorTRID and d.doctorBranch='Pathologist'");
    $doctor_page_test_query->execute();
        if($doctor_page_test_query->rowCount()==1){
            header('location:../doctor_page_forPathologist.php');
        }
        else{
            header('location:../doctor_page.php?durum-girisbasarili');
        }
        
        }

        else{
           /*alert eklenecek*/
            header('location:../doctor_login.php?durum-girisbasarisiz');

        }

    }



}

?>