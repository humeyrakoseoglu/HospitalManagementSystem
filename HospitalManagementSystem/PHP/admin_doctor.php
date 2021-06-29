<?php
include 'admin_header.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor List</title>
    <link rel="stylesheet" href="assets/admin_page_doctor.css">
</head>
<body>

<div class="main_container">
    <div class="container">
        <table id="admin_doctor_table">
        <caption>REMOVE DOCTOR</caption>
            <tr id="topList">
                <th>Doctor TR ID</th>
                <th>Doctor Name</th>
                <th>Doctor Surname</th>
                <th>Doctor Gender</th>
                <th>Doctor Branch</th>
                <th>Doctor Position</th>
                <th>Doctor Phone</th>
                
            </tr>
            <?php
                $admin_doctor_query=$db->prepare("SELECT DISTINCT d.doctorTRID, d.clinicName, d.doctorName, d.doctorSurname, d.doctorGender, d.doctorBranch, d.doctorPosition, d.doctorPhone FROM doctor d JOIN admin ca ON d.clinicName=ca.clinicName AND ca.adminTRID=:adminTRID");
                $admin_doctor_query->execute(array(
                    'adminTRID'=>$_SESSION['adminTRID']   
                ));
                while ($value=$admin_doctor_query->fetch(PDO::FETCH_ASSOC)){   
                    ?>
                    <form action="operation/delete_doctor_operation.php" method="POST"> 
                    <tr>

                        <td><input type="text" id="doctorTRID" name="doctorTRID" value=<?php echo $value['doctorTRID'];?>></td>
                        <td><?php echo $value['doctorName'];?></td>
                        <td><?php echo $value['doctorSurname'];?></td>
                        <td><?php echo $value['doctorGender'];?></td>
                        <td><?php echo $value['doctorBranch'];?></td>
                        <td><?php echo $value['doctorPosition'];?></td>
                        <td><?php echo $value['doctorPhone'];?></td>
                    
                            
                            <td><button type="submit" class="sub" id="deletebutton" name="deleteDoctor">Delete</button></td>
                            <!--<td><a href="admin_doctor_operation.php=&delete=ok"><button>X Delete </button></a></td>-->
                    </tr>
                    </form>
            <?php }?> 
        </table>
        <div class="center" id="add_btn_div">
            <a href="admin_add_doctor.php">
                <input type="button" value="Add a new doctor" id="add_btn">
            </a>
		</div>
    </div>
</div>

           
	
</body>
</html>