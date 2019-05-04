<!-- This html file displays the page allowing students to view their final summer schedules by entering their unique ID.-->

<html>
<head>
<link rel="stylesheet" href="csl.css">

<script>
function openCity(evt, cityName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>

</head>
<body >
<div id="header">
<h1><div><span>Cadet Summer Program Portal</span></div></h1>
</div>
<ul class="links">

  <li><a href="index.html">Home</a></li>
  <li><a href="final.php">Final Schedule</a></li>
  <li><a href="request.html">Make Requests</a></li>
</ul>
<br>


<h2>Final Summer Schedule </h2>

<form action= "" name = "myForm" method="POST">
   
  Input Your Student ID:<br>
  <input type="text" name="ID">
  <br>
  <input type="submit" value="Submit" name = "SubmitButton">
</form>
<table border="1" cellpadding="4">
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
							 $input = $_POST['ID'];
						 }
						 // run the SQL query to retrieve the service partner info

						 $results = $db->prepare('SELECT c.studentID, c.studentFN, c.studentLN, s.periodNum, p.programName FROM cadet c INNER JOIN schedule s ON c.studentID = s.studentID INNER JOIN program p ON s.programID = p.programID WHERE c.studentID = ? ORDER BY s.periodNum ASC;');
						 $results->bind_param("i", $input);
						 $results->execute();
						 $result = $results->get_result();

						 // determine how many rows were returned
						if($result->num_rows === 0){ 
							exit('No rows');
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
</table>

</body>
</html>