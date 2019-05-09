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
<table style="width:100%" bgcolor="#efefef" >  



<!-- Still need to list out schedule then allows option to submit final schedule -->
<form action= "" name = "myForm" method="POST">
<input type="submit" value="submit" name = "SubmitButton">
		  <td>
		  Student ID:<br>
		  <input type="text" name="studentID" >
		  <br>
		  </td>	
             <tr><th align="left">ID Number</th><th align="left">First Name</th><th align="left">Last Name</th><th align="left">Period 1</th><th align="left">Period 2 </th><th align="left">Period 3 </th></tr>
			<?php 
				error_reporting(E_ALL);
				ini_set('display_errors', 1);

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

						 $results1 = $db->prepare('SELECT c.studentID, c.studentFN, c.studentLN, p1.programName AS per1, p2.programName AS per2, p3.programName AS per3
FROM 
	(SELECT cadet.studentID, cadet.studentFN, cadet.studentLN
	FROM cadet) c,
    
    ( SELECT program.programName 
		FROM program inner JOIN finalSchedule
        ON finalSchedule.period1programID= program.programID
        WHERE finalSchedule.studentID = ?) p1,
       
	(SELECT program.programName 
	 	FROM program INNER JOIN finalSchedule
         ON finalSchedule.period2programID = program.programID
          WHERE finalSchedule.studentID = ?) p2,
         
	( SELECT program.programName 
	FROM program INNER JOIN finalSchedule
	ON finalSchedule.period3programID = program.programID
     WHERE finalSchedule.studentID = ?) p3,
    
    ( SELECT finalSchedule.studentID 
	FROM  finalSchedule
     WHERE finalSchedule.studentID = ?) temp
    
WHERE c.studentID = ?
AND c.studentID = temp.studentID;');

						 $results1->bind_param("iiiii", $input,$input,$input,$input,$input);
						 $results1->execute();
						 $result = $results1->get_result();

						 if($result->num_rows === 0){  
							exit('Enter your ID number to view your schedule');
						}
						else{

						 $num_results = $result->num_rows;

						 // loop through each row building the table rows and data columns

						 for ($i=0; $i < $num_results; $i++) 
						 {
						   $row= $result->fetch_assoc();
						   print '<tr><td>'.$row['studentID'].'</td><td>'.$row['studentFN'].'</td><td>'.$row['studentLN'].'</td><td>'.$row['per1'].'</td><td>'.$row['per2'].'</td><td>'.$row['per3'].'</td></tr>';
						 }

						 // deallocate memory for the results and close the database connection
						}
						 $result->free();
						 $db->close();
					   ?>
</table>

</body>
</html>