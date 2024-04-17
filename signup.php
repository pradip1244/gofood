<?php
include('index.php') ;
// Establish connection to MySQL database
$servername = "localhost:3307"; // Change if necessary
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "gofood"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,'3307');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$password = $_POST['password'];

// Prepare SQL statement to insert data into the table
$sql = "INSERT INTO signup (username, email, phonenumber, password) VALUES ('$username', '$email', '$phonenumber', '$password')";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sign-In</title>
    <link rel="stylesheet" href="signup.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="brand-logo">
                <img class="logo-img" src="brandlogo.jpg" alt="Brand Logo">
                <span class="go-food"><span class="logo-g">G</span>o Food</span>
            </div>
            <div>
                <a href="homepage.html" style="text-decoration: none;color: rgb(255, 255, 255);">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                        class="bi bi-house" viewBox="0 0 16 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg>
                </a>
            </div>
        </div>
    </header>

    <main>

        <div class="signup-form">
            <h2>Sign Up</h2>
            <form  method="post">
                <label for="username">Name:</label>
                <input type="text" id="name" name="username" required>
                <label for="phonenumber">Mobile Number:</label>
                <input type="tel" id="mobile" pattern="[0-9]{10}" name="phonenumber" title="Enter 10 digit number">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit">Sign Up</button>
            </form>
            <p>By continuing, you agree our Terms of Use and Privacy Policy.</p>
            <p>Already have an account? <a href="signin.php">Click here</a> to sign in.</p>
        </div>
    </main>

    <footer class="footer">

        <div class="contactDetails">
            <h3>Contact Details</h3>
            <p>Phone: +1234567890</p>
            <p>Email: gofood.org@gmail.com</p>
        </div>

        <!-- Address -->
        <div class="address">
            <h3>Address</h3>
            <p>No - 188, Raja Subodh Chandra Mullick Road</p>
            <p>Jadavpur, Kolkata, West Bengal 700032 ·</p>
        </div>
    </footer>
</body>

</html>
