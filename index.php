<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHC Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7fafc;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header a, .header button {
            color: white;
            padding: 10px;
            text-decoration: none;
            border: none;
            background: none;
            cursor: pointer;
        }
        .header a:hover, .header button:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: calc(100vh - 50px);
            padding: 20px;
        }
        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-container label {
            margin-top: 10px;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Navigation Header -->
    <header class="header">
        <div>
            <a href="#home">Home</a>
            <a href="#registration">Register</a>
			<a href="view.php">View</a>
			<a href="search.php">Search</a>
        </div>
        <div>
            <input type="text" placeholder="Search.." style="padding: 6px; margin-right: 10px; border-radius: 4px; border: 1px solid #ccc;">
            <button type="submit">Search</button>
        </div>
    </header>

    <!-- Home Section 
    <section id="home" class="container">
        <div class="form-container">
            <h1>Welcome to Home Page</h1>
            <p>Navigate to the registration form using the Register link in the navigation bar.</p>
        </div>
    </section>-->

    <!-- Registration Form Section -->
    <section id="registration" class="container">
        <div class="form-container">
            <h1>Patient Infomation Form</h1>
            <form action="insert.php" method="post">
                <label for="firstName">First Name:</label>
                <input type="text" name="first_name" id="firstName">
                <label for="surname">Surname:</label>
                <input type="text" name="surname" id="surname">
                <label for="mobileNumber">Mobile Number:</label>
                <input type="text" name="mobile_number" id="mobileNumber">
                <label for="aadhaarCardNumber">Aadhaar Card Number:</label>
                <input type="text" name="aadhaar_card_number" id="aadhaarCardNumber">
                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" id="dob">
                <input type="submit" value="Submit">
            </form>
        </div>
    </section>
</body>
</html>
