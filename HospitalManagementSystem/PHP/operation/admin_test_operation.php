<?php
include '../connection.php';
if(isset($_POST['testButton'])){
    $testID=$_POST['testID'];
    $testResult= $_POST['testResult'];
    $admin_test_query=$db->prepare("UPDATE test SET testResult=?  where testID=?");
    $admin_test_query->execute([$testResult,$testID]);
header ("Location:../admin_test.php");
}


?>