<?php
include 'patient_header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Appointment</title>
    <link rel="stylesheet" href="assets/patient_create_an_appointment.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
	<script>
 $(function(){
     $("#countries-list").change(function(){
         var displaycourse=$("#countries-list option:selected").text();
         $("#txtresults").val(displaycourse);

     })
 })
 $(function(){
     $("#states-list").change(function(){
         var displaycourse=$("#states-list option:selected").text();
         $("#txtresults1").val(displaycourse);

     })
 })
 $(function(){
     $("#name-list").change(function(){
         var displaycourse=$("#name-list option:selected").text();
         $("#txtresults2").val(displaycourse);
     })
 })
 </script> 
</head>
<body>

    <!--randevu ekle butonu oluştur.-->

	<div class="main_container">
		<div class="container">

        <?php
require_once('db.php');
$country_result = $conn->query('select * from admin');
?>
<br>
<h3>CREATE AN APPOINTMENT<h3>
<br> <br>
<form action="operation/patient_create_appointment_operation.php" method="post">

<select name="country" id="countries-list" style="height: 30px;">
		<option value="">Select Clinic</option>
		<?php
		if ($country_result->num_rows > 0) {
    // output data of each row
    while($row = $country_result->fetch_assoc()) {
    	?>
        <option value="<?php echo $row["adminTRID"]; ?>"><?php echo $row["clinicName"]; ?></option>
        <?php
    }
}
?>
		</select>
		<input type = "text" name="clinicName" redonly="redonly" id="txtresults"/>

</br></br></br>
		<select name="state" id="states-list" style="height: 30px;" >
			<option value=''>Select Clinic First</option>
		</select>
		<input type = "text" name="doctorBranch" redonly="redonly" id="txtresults1"/>

		</br></br></br>
		<select name="name" id="name-list" style="height: 30px;">
			<option value=''>Select Branch First</option>
		</select>
		<input type = "text" name="doctorUsername" redonly="redonly" id="txtresults2"/>

		</br></br></br>

		<input type="date" id="appointmentDate" name="appointmentDate" value="appointmentDate"></input>
		</br></br></br>
		<input type="time" id="appointmentTime" name="appointmentTime" value="appointmentTime"></input>
		</br></br></br>
		<a href="patient_create_appointment.php">
                    <button type="submit" class="sub" value="Create Appointment" id="createapt" name="createapt">Create an appointment</button>
                    </a>


</form>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
		<script>
$('#countries-list').on('change', function(){
    var country_id = this.value;
    $.ajax({
	type: "POST",
	url: "get_states.php",
	data:'country_id='+country_id,
	success: function(result){
		$("#states-list").html(result);
	}
	});
});

$('#states-list').on('change', function(){
    var state_id = this.value;
    $.ajax({
	type: "POST",
	url: "get_states.php",
	data:'state_id='+state_id,
	success: function(result){
		$("#name-list").html(result);
	}
	});
});

</script>

		</div>
	 </div>
    
</body>
</html>