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
  <li><a href="admin.php">Admin Schedule Approval</a></li>

</ul>
<br>
<table style="width:100%" bgcolor="#efefef" >  
<td>
  Student ID:<br>
  <input type="text" name="studentID" >
  <br>
</td>


<!-- Still need to list out schedule then allows option to submit final schedule -->
<form action= "" name = "myForm" method="POST">
  <input type="submit" value="Submit">

             <tr><th>ID Number</th><th>First Name</th><th>Last Name</th><th>Period</th><th>Program</th></tr>
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
							 $input = $_POST['studentID'];
						 }
						 // run the SQL query to retrieve the service partner info

						 $results = $db->prepare('SELECT c.studentID, c.studentFN, c.studentLN, s.periodNum, p.programName FROM cadet c INNER JOIN finalSchedule s ON c.studentID = s.studentID INNER JOIN program p ON s.programID = p.programID WHERE c.studentID = ? ORDER BY s.periodNum ASC;');
						 $results->bind_param("i", $input);
						 $results->execute();
						 $result = $results->get_result();

						 // determine how many rows were returned
						if($result->num_rows === 0){  
							exit('Enter your ID number to view your schedule');
						}
						else{
						 $num_results = $result->num_rows;

						 // loop through each row building the table rows and data columns

						 for ($i=0; $i < $num_results; $i++) 
						 {
						   $row= $result->fetch_assoc();
						   print '<tr><td>'.$row['studentID'].'</td><td>'.$row['studentFN'].'</td><td>'.$row['studentLN'].'</td><td>'.$row['periodNum'].'</td><td>'.$row['programName'].'</td></tr>';
						 }

						 // deallocate memory for the results and close the database connection
						}
						 $result->free();
						 $db->close();

					   ?>
</form>
<h2>Request Form</h2>
<form action= "" name = "myForm" method="POST">
   <table style="width:100%" bgcolor="#efefef" >    
  
<td >
  <h4>First Period Assignment</h4>
		<div class="tab1" >
  		First Period:
			  <div class="select-style" >
			 	
			  <select>
			  <option value="leave">Leave</option>
			  <option value="ac">Academics</option>
			  <option value="cyber">Cyber</option>
			  <option value="space">Space</option>
			  <option value="CSRP">CSRP</option>
			  <option value="jump">Jump</option>
			  <option value="rpa">RPA</option>
			  <option value="soaring">Soaring</option>
			  <option value="bct">BCT</option>
			  <option value="est">EST</option>
			  <option value="OpsAF">Operations AF</option>
			  <option value="OpsGroup">Ops Group</option>
			  <option value="SummerCamp">Summer Camp</option>
				</select>
				</div>
				</div>
  		
	</td>
	<td >
	<h4>Second Period Assignment</h4>
		<div class="tab1" >
  		First Period:
			  <div class="select-style" >
			 	
			  <select>
			  <option value="leave">Leave</option>
			  <option value="ac">Academics</option>
			  <option value="cyber">Cyber</option>
			  <option value="CSRP">CSRP</option>
			  <option value="space">Space</option>
			  <option value="jump">Jump</option>
			  <option value="rpa">RPA</option>
			  <option value="soaring">Soaring</option>
			  <option value="bct">BCT</option>
			  <option value="est">EST</option>
			  <option value="OpsAF">Operations AF</option>
			  <option value="OpsGroup">Ops Group</option>
			  <option value="SummerCamp">Summer Camp</option>

				</select>
				</div>
				</div>
	</td>
	<td>
	<h4>Third Period Assignment</h4>
		<div class="tab1" >
  		Third Period:
			  <div class="select-style" >
			 	
			  <select>
			  <option value="CSRP">CSRP</option>
			  <option value="leave">Leave</option>
			  <option value="ac">Academics</option>
			  <option value="cyber">Cyber</option>
			  <option value="space">Space</option>
			  <option value="jump">Jump</option>
			  <option value="rpa">RPA</option>
			  <option value="soaring">Soaring</option>
			  <option value="bct">BCT</option>
			  <option value="est">EST</option>
			  <option value="OpsAF">Operations AF</option>
			  <option value="OpsGroup">Ops Group</option>
			  <option value="SummerCamp">Summer Camp</option>

				</select>
				</div>
				</div>
			
	</td>
  </table>
  
  
  
  
  <br>
  </form>  
</div>            
</body>
