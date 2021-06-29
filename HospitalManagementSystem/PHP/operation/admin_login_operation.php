<?php
ob_start();
session_start();
include '../connection.php';
if(isset($_POST['adminTRID']) && isset($_POST['adminPassword']) ) {
    $adminTRID = $_POST['adminTRID'];
    $adminPassword =$_POST['adminPassword'];

    if(empty($adminTRID)){
        header("Location:../admin_login.php?error=Email is required");    
    }
    else if(empty($adminPassword)){
        header("Location:../admin_login.php?error=Password is required"); 
    }
    else{
        $adminsor = $db->prepare("SELECT * FROM admin WHERE adminTRID=? and adminPassword=?"); 
        $adminsor->execute([$adminTRID,$adminPassword]);
        if($adminsor->rowCount()==1){
            $_SESSION['adminTRID']=$adminTRID;
            header('location:../admin_page.php?durum-girisbasarili');
            exit;
        }
        else{
           /*alert eklenecek*/
            header('location:../admin_login.php?durum-girisbasarisiz');

        }

    }



}

?>