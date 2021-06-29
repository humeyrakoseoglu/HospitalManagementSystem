<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
    <link rel="stylesheet" href="assets/loginn.css">
</head>
<body>


    <!--PATIENT LOGIN-->

    <section class="patient_login">
        <div id="login" class="form-container">
    
            <div class="flex-title">
                <h2>PATIENT LOGIN</h2>
            </div>
    
            <form action="operation/patient_login_operation.php" method="post" class="form">

               <div class="row">
                
                <div class="tablo">
                    <div class="form-group">
                  <label for="TC">TC Identification Number</label><br>
                  <input type="TC" placeholder="TR Identification Number" name="patientTRID" id="tc">
               </div>
            </div>
                
    
                <div class="tablo">
                    <div class="form-group">
                  <label for="password">Password</label><br>
                  <input required type="password" placeholder="Password" name="patientPassword" id="password">
               </div>
            </div>
                <button type="submit" id="login" name="patient_Login">Login</button>
                <a href="patient_signup.php"><input name="signin" type="button"value="Sign Up" id="signin" ></a>      
            </form>

            
        </div>
        
    </section>

    
        <!--END OF PATIENT LOGIN-->
    
</body>
</html>