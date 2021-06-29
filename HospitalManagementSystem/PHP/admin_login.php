<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/loginn.css">
</head>
<body>
    <!--ADMIN LOGIN-->
    <section class="admin_login">
        <div id="login" class="form-container">
    
            <div class="flex-title">
                <h2>ADMIN LOGIN</h2>
            </div>
    
            <form action="operation/admin_login_operation.php" method="post" class="form">
               
               <div class="row">
                <div class="tablo">
                    <div class="form-group">
                  <label for="TC">TC Identification Number</label><br>
                  <input type="text" placeholder="TC Identification Number" name="adminTRID" id="tc">
               </div>
            </div>
                
    
                <div class="tablo">
                    <div class="form-group">
                  <label for="password">Password</label><br>
                  <input type="password" placeholder="Admin Password" name="adminPassword" id="password">
               </div>
            </div>
                <button type="submit" id="login" name="adminlogin">Login</button>
                <a href="admin_signup.php"><input name="signin" type="button"value="Sign Up" id="signin" ></a>      
            </form>
            
        </div>
        
    </section>
        <!--END OF ADMIN LOGIN-->
</body>
</html>