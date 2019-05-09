<!-- This html file displays the page allowing students to submit summer preference requests.-->

<html>
<head>
<link rel="stylesheet" href="csl.css">
</head>
<body >
<div id="header">
<h1><div><span>Cadet Summer Program Portal</span></div></h1>
</div>
<ul class="links">

  <li><a href="index.html">Home</a></li>
  <li><a href="final.php">Final Schedule</a></li>
  <li><a href="request.php">Make Requests</a></li>
  <li><a href="admin.php">View Requested Schedule</a></li>
  <li><a href="admin2.php">Admin Scheduler</a></li>

</ul>
<br>

<h2>Admin Final Schedule Change Form</h2>
<form action= "" name = "myForm2" method="POST">
 

<td>
		  Student ID:<br>
		  <input type="text" name="studentID" >
		  <br>
		  </td>	
		  
<td >
  <h4>First Period Assignment</h4>
		<div class="tab1" >
			  <div class="select-style" >
			 	
			  <select name = "firstPeriod">
			  <option value="0">CSRP</option>
			  <option value="1">Leave</option>
			  <option value="2">Academics</option>
			  <option value="3">Cyber</option>
			  <option value="4">Space</option>
			  <option value="5">Jump</option>
			  <option value="6">RPA</option>
			  <option value="7">Soaring</option>
			  <option value="8">BCT</option>
			  <option value="9">EST</option>
			  <option value="10">Operations AF</option>
			  <option value="11">Ops Group</option>
			  <option value="12">Summer Camp</option>
				</select>
				</div>
				</div>
  		
	</td>
	<td >
	<h4>Second Period Assignment</h4>
		<div class="tab1" >
			  <div class="select-style" >
			 	
			  <select name = "secondPeriod">
			  <option value="0">CSRP</option>
			  <option value="1">Leave</option>
			  <option value="2">Academics</option>
			  <option value="3">Cyber</option>
			  <option value="4">Space</option>
			  <option value="5">Jump</option>
			  <option value="6">RPA</option>
			  <option value="7">Soaring</option>
			  <option value="8">BCT</option>
			  <option value="9">EST</option>
			  <option value="10">Operations AF</option>
			  <option value="11">Ops Group</option>
			  <option value="12">Summer Camp</option>

				</select>
				</div>
				</div>
	</td>
	<td>
	<h4>Third Period Assignment</h4>
		<div class="tab1" >
			  <div class="select-style" >
			  <select name = "thirdPeriod">
			  <option value="0">CSRP</option>
			  <option value="1">Leave</option>
			  <option value="2">Academics</option>
			  <option value="3">Cyber</option>
			  <option value="4">Space</option>
			  <option value="5">Jump</option>
			  <option value="6">RPA</option>
			  <option value="7">Soaring</option>
			  <option value="8">BCT</option>
			  <option value="9">EST</option>
			  <option value="10">Operations AF</option>
			  <option value="11">Ops Group</option>
			  <option value="12">Summer Camp</option>

				</select>
				</div>
				</div>
			
	</td>
		
	<?php 

						 // open connection to the database on LOCALHOST with 
						 // userid of 'root', password '', and database 'csl'

						 @ $db = new mysqli('LOCALHOST', 'root', '', 'summer_portal');

						 // Check if there were error and if so, report and exit

						 if (mysqli_connect_errno()) 
						 { 
						   echo 'ERROR: Could not connect to database.  Error is '.mysqli_connect_error();
						   exit;
						 }

						 if (isset($_POST['SubmitButton'])){
							 $inputID = $_POST['studentID'];
							 $inputFirstPeriod = (int)$_POST['firstPeriod'];
							 $inputSecondPeriod = (int)$_POST['secondPeriod'];
							 $inputThirdPeriod = (int)$_POST['thirdPeriod'];
						 }
						 // run the SQL query to retrieve the service partner info
						 $studentIDexists = $db->prepare('SELECT * FROM cadet WHERE studentID = ?;');
						 $studentIDexists->bind_param("i", $inputID);
						 $studentIDexists->execute();
						 $studentID = $studentIDexists->get_result();
						 
						 if($studentID->num_rows>0)
						 {
							 echo 'in if';
							 $results = $db->prepare('REPLACE INTO finalSchedule (studentID, period1programID, period2programID, period3programID) VALUES(?,?,?,?);');
							 $results->bind_param("iiii", $inputID,$inputFirstPeriod, $inputSecondPeriod,$inputThirdPeriod);
							 $results->execute();
							
							 
						 }


						 // close the database connection
						 $db->close();

					   ?>
					   	<input type="submit" value="Submit Final Schedule" name = "SubmitButton">
	
		  
  </form>  
</div>            
</body>









		  