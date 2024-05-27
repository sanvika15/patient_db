<!DOCTYPE html>
<html>

<head>
    <title>Search Patient</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .header {
            background-color: #333;
            overflow: hidden;
        }

        .header a {
            float: left;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
        }

        .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header div {
            display: inline-block;
        }

        .header input[type="text"] {
            padding: 6px;
            margin: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .header button {
            padding: 6px 10px;
            margin: 8px 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .header button:hover {
            background-color: #ddd;
            color: black;
        }


        .header button {
            padding: 6px 10px;
            margin-right: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .header button:hover {
            background-color: #ddd;
            color: black;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            text-align: center;
            margin: 20px 0;
        }

        form input[type="text"],
        form input[type="submit"] {
            padding: 10px;
            margin: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
            background-color: white;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        p {
            text-align: center;
            color: red;
        }
    </style>
</head>

<body>
<header class="header">
        <div>
            <a href="#home">Home</a>
            <a href="index.php">Register</a>
            <a href="view.php">View</a>
            <a href="search.php">Search</a>
        </div>
        
    </header>

    <h2>Search Patient</h2>
    <form method="get">
        <label for="searchName">Search by Name:</label>
        <input type="text" id="searchName" name="searchName">
        <input type="submit" value="Search">
    </form>

    <?php
    if (isset($_GET['searchName'])) {
        $searchName = $_GET['searchName'];

        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "patient_db");
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Prepare a select query with placeholders
        $sql = "SELECT * FROM patients WHERE firstname LIKE ? OR surname LIKE ?";

        // Initialize a statement and prepare the SQL query
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            $param = '%' . $searchName . '%';
            mysqli_stmt_bind_param($stmt, "ss", $param, $param);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                // Display the results in a table
                if (mysqli_num_rows($result) > 0) {
                    echo "<h3>Search Results:</h3>";
                    echo "<table>";
                    echo "<tr><th>ID</th><th>First Name</th><th>Surname</th><th>Mobile Number</th><th>Aadhaar Card Number</th><th>Date of Birth</th></tr>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['firstname'] . "</td>";
                        echo "<td>" . $row['surname'] . "</td>";
                        echo "<td>" . $row['mobile'] . "</td>";
                        echo "<td>" . $row['aadhar'] . "</td>";
                        echo "<td>" . $row['dob'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<p>No results found.</p>";
                }
            } else {
                echo "ERROR: Could not execute query: $sql. " . mysqli_error($conn);
            }
        } else {
            echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
        }

        // Close the statement and connection
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    ?>
</body>

</html>
