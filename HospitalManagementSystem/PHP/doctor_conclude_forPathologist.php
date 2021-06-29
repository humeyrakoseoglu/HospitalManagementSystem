<?php
include 'doctor_header_forPathologist.php';
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalize</title>
    <link rel="stylesheet" href="assets/doctor_conclude.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
      $(function(){
     $("#test-list").change(function(){
         var displaycourse=$("#test-list option:selected").text();
         $("#txtresults").val(displaycourse);
     })
 })

$(function(){
    $("#test-list").change(function(){
    var e = document.getElementById("test-list");
    var strUser = e.value;
    $("#txtresults2").val(strUser);
})
})
    </script>
  
</head>
<body>
    <!--kaydet butonu-->
   <!--SAVE BUTTON-->
    <!--SAVE BUTTON-->
<div class="main_container">
    <div class="container">
    <?php 
    $country_result = $db->prepare("SELECT DISTINCT t.testID,t.testName from hospitalrelation h,test t,appointment a where h.testID=t.testID and h.diagnosisID=0 and h.appointmentID=:appointmentID");
    $country_result->execute(array(
        'appointmentID'=>$_SESSION['appointmentId_patients_of_pathologist_ForTest']
      ));
?>
<h2>CONCLUDE AN APPOINTMENT <h2>
<br>

<form action="operation/doctor_conclude_forPathologist_operation.php" method="post">
<label for="testResult">Test Name</label><br>
<select name="country" id="test-list">
		<option value="">Select Test</option>
		<?php
    // output data of each row
    while($row= $country_result->fetch(PDO::FETCH_ASSOC)) { 
        echo '<option value="'.$row['testID'].'">'.$row['testName'].'</option>';
    
    }
    ?>
</select>
		<input type = "text" name="test_name" redonly="redonly" id="txtresults"/>
        <input type = "text" name="test_ID_get" redonly="redonly" id="txtresults2"/>
 
        <div class="tablo">
                    <div class="form-group">
                        <label for="testResult">Prescription Serial No</label><br>
                        <input type="text" placeholder="Prescription Serial No" name="prescription_serial_number" id="test_name_input"width="50" height="50">
                   </div>
                </div>

        
                <div class="tablo">
                    <div class="form-group">
                        <label for="testResult">Diagnosis</label><br>
                        <input type="text" placeholder="Diagnosis" name="diagnosis" id="test_name_input"width="50" height="50">
                   </div>
                </div>
                <button type="submit" id="conclude_button" name="conclude">conclude</button>   

            </form>
		</div>
	 </div>
    <!--SAVE BUTTON-->
    <!--SAVE BUTTON-->
    
</body>
</html>