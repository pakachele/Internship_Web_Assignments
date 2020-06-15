    <?php
    $firstname = filter_input(INPUT_POST, 'firstname');
	$lastname = filter_input(INPUT_POST, 'lastname');
    $date = filter_input(INPUT_POST, 'date');
	$email = filter_input(INPUT_POST, 'email');
	$mob = filter_input(INPUT_POST, 'mob');
	$course = filter_input(INPUT_POST, 'course');
	
 
				$host = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "studentadmission";
				// Create connection

				$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

				$query = "INSERT INTO Student_TB(firstname, lastname, date, email, mob, course) values ('$firstname','$lastname','$date','$email', '$mob','$course')';";

				if ($conn->query($query)==FALSE){
					echo "Unable to insert record ".$conn->error"<br><br>";
				}
				


	$query = "select * from Student_TB;";

	$result = $conn->query($query);

	if ($result -> num_rows > 0){

		echo "<html><head><title>Student Details</title></head><body>"

		echo "Registration information has been successfully submitted into Database. Following is the list of students registered till now:<br><br>";

		echo "<table>";

		echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Date</th><th>Email</th><th>Contact Number</th><th>Course</th></tr>";

		while ($row = $result->fetch_assoc()){
			$id = $row["id"];
			$firstname = $row["firstname"];
			$lastname = $row["lastname"];
			$date = $row["date"];
			$email= $row["email"];
			$mob = $row["mob"];
			$course = $row["course"];


			echo "<tr><td>"$id."</td><td>".$firstname."</td><td>".$lastname."</td><td>".$date."</td><td>".$email."</td><td>".$mob."</td><td>".$course."</td></tr>";

		}
		echo "</table></body></html>";
	}
	else{
		echo "Unable to retrieve record".$conn->error;
	}
	$conn->close();

    ?>