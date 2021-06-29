<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign In</title>
    <link rel="stylesheet" href="assets/signupp.css">
</head>
<body>
    <!--ADMIN SIGN IN-->
    <section class="admin_signin">
        <div id="signup" class="form-container">
    
            <div class="flex-title">
                <h2>ADMIN SIGN UP</h2>
            </div>
    
            <form action="operation/admin_signup_operation.php" method="POST" class="form">
               
               <div class="row">
               <div class="tablo">
                        <div class="form-group">
                      <label for="name">Clinic Name</label><br>
                      <input type="text" placeholder="Clinic Name" name="adminClinicName" id="clinicname">
                   </div>
                </div>
                <div class="tablo">
                        <div class="form-group">
                      <label for="name">Name</label><br>
                      <input type="text" placeholder="Name" name="adminName" id="name">
                   </div>
                </div>
                <div class="tablo">
                        <div class="form-group">
                      <label for="surname">Surname</label><br>
                      <input type="text" placeholder="Surname" name="adminSurname" id="surname">
                   </div>
                </div>
                
                <div class="tablo">
                        <div class="form-group">
                      <label for="mail">E-mail</label><br>
                      <input required type="email" placeholder="E-mail" name="adminEmail" id="mail">
                   </div>
                </div>
                
                <div class="tablo">
                        <div class="form-group">
                      <label for="TC">TC Identification Number</label><br>
                      <input type="text" placeholder="TR Identification Number" name="adminTRID" id="tc">
                   </div>
                </div>
    
                <div class="tablo">
                    <div class="form-group">
                  <label for="password">Password</label><br>
                  <input required type="password" placeholder="Password" name="adminPassword" id="password">
               </div>
            </div>
            </form> 
                <button type="submit" id="signin" name="adminsignup">Sign Up</button> <br><br>
                <a href="admin_login.php"><input name="adminlogin" type="button"value="Login" id="login" ></a>      
           
        </div>
    </section>
        <!--END OF ADMIN SIGN IN-->
</body>
</html>