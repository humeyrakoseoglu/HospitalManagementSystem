<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Login</title>
    <link rel="stylesheet" href="assets/loginn.css">
</head>
<body>
    <!--DOCTOR LOGIN-->
    <section class="doctor_login">
        <div id="login" class="form-container">
    
            <div class="flex-title">
                <h2>DOCTOR LOGIN</h2>
            </div>
    
            <form action="operation/doctor_login_operation.php" method="post" class="form">
               
               <div class="row">
                
                <div class="tablo">
                    <div class="form-group">
                  <label for="TC">TC Identification Number</label><br>
                  <input type="text" placeholder="TR Identification Number" name="doctorTRID" id="tc">
               </div>
            </div>
                
    
                <div class="tablo">
                    <div class="form-group">
                  <label for="password">Password</label><br>
                  <input required type="password" placeholder="Password" name="doctorPassword" id="password">
               </div>
            </div>
            
             
            <button type="submit" id="login" name="doctor_Login">Login</button>     
            </form>
    
            
        </div>
        
    </section>
    
        <!--END OF DOCTOR LOGIN-->
</body>
</html>