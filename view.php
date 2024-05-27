<!DOCTYPE html>
<html>

<head>
    <title>View Patients</title>
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

        h2 {
            text-align: center;
            margin-top: 20px;
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

    <h2>Patients Information</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>Mobile Number</th>
            <th>Aadhaar Card Number</th>
            <th>Date of Birth</th>
        </tr>
        <?php
        // Connect to the database
        $conn = mysqli_connect("localhost", "root", "", "patient_db");
        if ($conn === false) {
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Fetch data from the database
        $sql = "SELECT * FROM patients";
        $result = mysqli_query($conn, $sql);

        // Display data in a tabular form
        if (mysqli_num_rows($result) > 0) {
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
        } else {
            echo "<tr><td colspan='6'>No records found</td></tr>";
        }

        // Close connection
        mysqli_close($conn);
        ?>
    </table>
</body>

</html>
