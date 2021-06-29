<?php
include 'connection.php';
include 'doctor_header_forPathologist.php';
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
        <form action="operation/doctor_page_test_forPathologist_operation.php" method="post" class="form">
               <div class="row">
                    <div class="col-25">
                        <label for="testname">Test Name</label><br>
                   </div>
                   <div class="col-75">
                       <input type="text" placeholder="Test Name" name="test_name_input" id="test_name_input"width="50" height="50">
                   </div>
                   
                </div>
                <div class="row">
                    <div  class="col-25">
                        <label for="testdate">Test Date</label><br>
                </div>
                <div class="col-75">
                <input type="date" placeholder="Test Date" name ="test_date_input"id="test_date_input" width="15" height="50">
                </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="testResult">Test Result</label><br>
                        
                   </div>
                   <div class="col-75">
                   <textarea type="text" placeholder="Test Result" name="test_result_input" id="test_result_input" cols="25" rows="5"></textarea>
                   </div>
                </div>
                <div class="row">
                    <button type="submit" id="test_button_forPathologist" name="test_button_forPathologist">Test</button>     
                </div>
           
            </form>
        </div>
    </div>
       
</body>
</html>