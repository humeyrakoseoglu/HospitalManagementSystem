<?php
ob_start();
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Doctor</title>
	<link rel="stylesheet" href="assets\header.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
						<img src="images/doctor.jpeg" alt="profile_pic">
					</div>
                    <h2 >DOCTOR</h2>
                    <br>
					<?php
					$name_surname=$db->prepare("SELECT d.doctorName,d.doctorSurname,d.doctorBranch From doctor d where d.doctorTRID=:doctorTRID ");
                    $name_surname->execute(array(
                    'doctorTRID'=>$_SESSION['doctorTRID']));
                    while ($value= $name_surname->fetch(PDO::FETCH_ASSOC)){   ?>
					
						 <td><h3><?php echo $value['doctorBranch'];?></h3></td>
						 <br>
						 <td><?php echo $value['doctorName'];?></td>
                         <td><?php echo $value['doctorSurname'];?></td>
						 
						 <?php } ?>
				</div>
				<ul class="menu">
					
                    <li><a href="doctor_page.php">
						<span class="text">HOME</span>
					</a></li>
					<li><a href="doctor_test.php">
						<span class="text">TEST</span>
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