<?php
include 'navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/home_pagee.css">
</head>
<body>
    <div class="users">
        <div class="user">
            <a href="admin_login.php">
                <img class="image" src="images/admin.jpeg" width="250" height="250">
            </a>
            <p>ADMIN</p>
        </div>
        <div class="user">
            <a href="doctor_login.php">
                <img class="image" src="images/doctor.jpeg" width="250" height="250">
            </a>
            <p>DOCTOR</p>
        </div>
        <div class="user">
            <a href="patient_login.php">
                <img class="image" src="images/patient.jpeg" width="250" height="250">
            </a>
            <p>PATIENT</p>
        </div>
    </div>
</body>
</html>