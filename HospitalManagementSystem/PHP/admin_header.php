<?php
ob_start();
session_start();
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="assets\header.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="wrapper">
		<div class="wrapper_inner">
			<div class="vertical_wrap">
			<div class="backdrop"></div>
			<div class="vertical_bar">
				<div class="profile_info">
					<div class="img_holder">
						<img src="images/admin.jpeg" alt="profile_pic">
					</div>
                    <h2 >ADMIN</h2>
                    <br>
					<?php
					$name_surname=$db->prepare("SELECT a.adminName,a.adminSurname From admin a where a.adminTRID=:adminTRID ");
                    $name_surname->execute(array(
                    'adminTRID'=>$_SESSION['adminTRID']));
                    while ($value= $name_surname->fetch(PDO::FETCH_ASSOC)){   ?>
						 <td><?php echo $value['adminName'];?></td>
                         <td><?php echo $value['adminSurname'];?></td>
						 <?php } ?>
				</div>
				<ul class="menu">
				    <li><a href="admin_page.php">
						<span class="text" >HOME</span>
					</a></li>
					<li><a href="admin_doctor.php">
						<span class="text" >DOCTOR</span>
					</a></li>
					<li><a href="admin_appointment.php" >
						<span class="text">APPOINTMENT</span>
					</a></li>
					<li><a href="admin_test.php">
						<span class="text">TEST</span>
					</a></li>
					<li><a href="home_page.php">
						<span class="text">LOG OUT</span>
					</a></li>
				
				</ul>
			</div>
		</div>
</body>
</html>