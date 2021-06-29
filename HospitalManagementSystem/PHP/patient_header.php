<?php
ob_start();
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient</title>
    <link rel="stylesheet" href="assets\header.css">
</head>
<body>
<!--NAVBAR-->
    <!--NAVBAR-->

    <div class="wrapper">
		<div class="wrapper_inner">
			<div class="vertical_wrap">
			<div class="backdrop"></div>
			<div class="vertical_bar">
				<div class="profile_info">
					<div class="img_holder">
						<img src="images/patient.jpeg" alt="profile_pic">
					</div>
                    <h2 >PATIENT</h2>
                    <br>
					<?php
					$name_surname=$db->prepare("SELECT p.patientName,p.patientSurname From patient p where p.patientTRID=:patientTRID ");
                    $name_surname->execute(array(
                   'patientTRID'=>$_SESSION['patientTRID']));
                    while ($value= $name_surname->fetch(PDO::FETCH_ASSOC)){   ?>
						 <td><?php echo $value['patientName'];?></td>
                         <td><?php echo $value['patientSurname'];?></td>
						
						 <?php } ?>
				</div>
				<ul class="menu">
					
					<li><a href="patient_page.php">
						<span class="text">HOME</span>
					</a></li>
                    <li><a href="patient_appointment.php">
						<span class="text">APPOINTMENT</span>
					</a></li>

					<li><a href="home_page.php">
						<span class="text">LOG OUT</span>
					</a></li>
				
				</ul>

			
			</div>
		</div>

    

    <!--NAVBAR-->
    <!--NAVBAR-->
        
</body>
</html>