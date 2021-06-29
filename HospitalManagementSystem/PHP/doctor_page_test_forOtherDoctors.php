<?php
include 'connection.php';
include 'doctor_header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request TEST </title>
    <link rel="stylesheet" href="assets/doctor_page_test_forPathologistt.css">
    
</head>
<body>
<div class="main_container">
        <div class="container">
        <h3>REQUEST A TEST<h3>
<br>
        <form action="operation/doctor_page_test_forOtherDoctors_opearation.php" method="post" class="form">
               <div class="row">
                    <div class="form-group">
                        <label for="testname">Test Name</label><br>
                        <input type="text" placeholder="Test Name" name="test_name_input" id="test_name_input">
                   </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-75">
                        <label for="testdate">Test Date</label><br>
                        <input type="date" placeholder="Test Date" name ="test_date_input"id="test_date_input"> <br> <br>
                </div>
                </div>
                <div class="row">
                <button type="submit" id="test_button_forPathologist" name="test_button_forOtherDoctors">Test</button>     
                </div>
            
        </form>
        </div>
    </div>   
</body>
</html>