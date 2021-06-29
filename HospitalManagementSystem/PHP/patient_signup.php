<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Sign In</title>
    <link rel="stylesheet" href="assets/signupp.css">
</head>
<body>
    <!--PATIENT SIGN IN-->

    <section class="patient_signin">
        <div id="signin" class="form-container">
    
            <div class="flex-title">
                <h2>PATIENT SIGN IN</h2>
            </div>
    
            <form action="operation/patient_signup_operation.php" method="POST" class="form">
            
               <div class="row">
                
                <div class="tablo">
                        <div class="form-group">
                      <label for="name">Name</label><br>
                      <input type="text" placeholder="Name" name = "patientName"id="name">
                   </div>
                </div>

                <div class="tablo">
                        <div class="form-group">
                      <label for="surname">Surname</label><br>
                      <input type="text" placeholder="Surname" name = "patientSurname"id="surname">
                   </div>
                </div>
                <div class="tablo">
                        <div class="form-group">
                      <label for="TC">TC Identification Number</label><br>
                      <input type="TC" placeholder="TR Identification Number"name = "patientTRID" id="tc">
                   </div>
                </div>

                <div class="tablo">
                    <div class="form-group">
                  <label for="birthdate">Birth Date</label><br>
                  <input type="date" placeholder="Birth Date" name = "patientDOB"id="date">
               </div>
            </div>
                <div class="tablo">
                    <div class="form-group">
                  <label for="tel">Phone</label><br>
                  <input type="tel" placeholder="Phone" id="tel" name = "patientPhone">
               </div>
            </div>
            
            <div class="tablo">
            <div class="form-group">
          <label for="address">Address</label><br>
          <input required type="address" placeholder="Address" name = "patientAddress" id="address">
       </div>
    </div>
    <div class="tablo">
            <div class="form-group">
          <label for="gender">Gender</label><br>
          <input required type="gender" placeholder="Gender" name = "patientGender" id="gender">
       </div>
    </div>
             

                <div class="tablo">
                        <div class="form-group">
                      <label for="mail">E-mail</label><br>
                      <input required type="email" placeholder="E-mail"name = "patientEmail" id="mail">
                   </div>
                </div>
                
                
    
                <div class="tablo">
                    <div class="form-group">
                  <label for="password">Password</label><br>
                  <input required type="password" placeholder="Password" name = "patientPassword"id="password">
               </div>
            </div>
            
            <button type="submit" id="signin" name="patient_signup">Sign Up</button>
                <a href="patient_login.php"><input type="button"value="Login" name="patient_login" id="login" ></a>         
    
            </form> 
        </div>
    </section>
  
        <!--END OF PATIENT SIGN IN-->  
</body>
</html>