<?php

include '../connection.php';

if(isset($_POST['deleteDoctor'])){
    $doctorTRID=$_POST['doctorTRID'];
    $admin_doctor_query=$db->prepare("DELETE FROM doctor WHERE doctorTRID=$doctorTRID");
    $control=$admin_doctor_query->execute();

if($control) {
    header ("Location:../admin_doctor.php?durum=ok");
} else {
    header ("Location:../admin_doctor.php?durum=no");
}

}
?>
