<?php
include 'admin_header.php';
require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
    <link rel="stylesheet" href="assets/admin_add_doctor.css">
<script>
 $(function(){
     $("#selectbox").change(function(){
         var displaycourse=$("#selectbox option:selected").text();
         $("#txtresults").val(displaycourse);

     })
 })
 </script> 
</head>
<body>
		<div class="main_container">
            <div class="container">
            <div class="center">
            <h1>Add A New Doctor</h1>
                <form action="operation/adddoctoroperation.php" method="post">
                    <div class="txt_field">
                       <input placeholder="Doctor ID" type="text" name="doctorTRID" >  
                    </div>
        
                    <div class="txt_field">
                        <input placeholder="Doctor Name" type="text" name="doctorName" >
                       
                    </div>
        
                    <div class="txt_field">
                        <input placeholder="Doctor Surname" type="text"name="doctorSurname">
                        
                    </div>
                    
                    <div class="txt_field">
                        <input placeholder="Doctor Email" type="text" name="doctorEmail" >
                    </div>
                    <div class="txt_field">
                        <input placeholder="Doctor Gender" type="text" name="doctorGender" >
                    </div>
                    <div class="txt_field">
                        <input placeholder="Doctor Branch" type="text" name="doctorBranch" >
                        
                    </div>
                    <div class="txt_field">
                        <input placeholder="Doctor Position"type="text" name="doctorPosition" >
                    </div>
                    <div class="txt_field">
                        <input placeholder="Doctor Phone" type="tel" pattern="[0-9]{10}" name="doctorPhone">     
                    </div>
                    <div class="txt_field">
                        <input placeholder="Doctor Password" type="password" name="doctorPassword">                
                    </div>

                    <a id="add_btn_a" href="admin_add_doctor.php">
                    <button type="submit" class="sub" id="add_btn" name="addDoctor">Add doctor</button>
                    </a>

            
            </div>
		</div>
	</div>

</body>
</html>