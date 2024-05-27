<!DOCTYPE html>
<html>

<head>
	<title>Insert Page</title>
</head>

<body>
	<center>
		<?php

		$conn = mysqli_connect("localhost", "root", "", "patient_db");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$first_name = $_REQUEST['first_name'];
		$surname = $_REQUEST['surname'];
		$mobile_number = $_REQUEST['mobile_number'];
		$aadhaar_card_number = $_REQUEST['aadhaar_card_number'];
		$dob = $_REQUEST['dob'];
		
		// Prepare an insert query
        $sql = "INSERT INTO patients (firstname, surname, mobile, aadhar, dob) VALUES (?, ?, ?, ?, ?)";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $first_name, $surname, $mobile_number, $aadhaar_card_number, $dob);

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to index page with a success message
                header("Location: index.php?message=Successfully+added");
                exit();
            } else {
                echo "ERROR: Could not execute query: " . mysqli_error($conn);
            }

            // Close the statement
            mysqli_stmt_close($stmt);
        } else {
            echo "ERROR: Could not prepare query: " . mysqli_error($conn);
        }
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>
