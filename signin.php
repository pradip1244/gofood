<?php
// Initialize variables to null
$username = $password = "";
$errorMessage = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming your MySQL server is on localhost:3307 with username 'root' and without a password
    $servername = "localhost:3307";
    $dbUsername = "root";
    $dbPassword = ""; 
    $dbname = "gofood";

    // Create connection
    $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname,"3307");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = $_POST['email'];
    $password = $_POST['password'];

    // Prepare a select statement
    $sql = $conn->prepare("SELECT * FROM signup WHERE email=? AND password=?");
    $sql->bind_param("ss", $username, $password); // 'sss' means three strings
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        // Login success
        echo "<script>alert('You are now signed in!'); window.location.href='welcome.php';</script>";
    } else {
        // Login fail
        $errorMessage = "Invalid username or password!";
    }

    $sql->close();
    $conn->close();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Sign-In</title>
    <link rel="stylesheet" href="signin.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="brand-logo">
                <img class="logo-img" src="brandlogo.jpg" alt="Brand Logo">
                <span class="go-food"><span class="logo-g">G</span>o Food</span>
                <!-- <img class="logofont-img" src="brandfontlogo.png" alt="Brand"> -->
            </div>
            <div>
                <a href="homepage.html" style="text-decoration: none;color: rgb(255, 255, 255);">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                    <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                  </svg>
                </a>
            </div>
        </div>
    </header>

    <main>

        <div class="signin-form">
            <h2>Sign In</h2>
            <?php if($errorMessage): ?>
                 <p style="color: red;"><?php echo $errorMessage; ?></p>
            <?php endif; ?>
            <form method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required >
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <!-- <input type="checkbox" onclick="togglePassword()"> Show Password<br><br> -->
                <button type="submit">Sign In</button>
            </form>
            <!-- <input type="checkbox" onclick="si">By continuing, you agree our Terms of Use and Privacy Policy.<br><br> -->
            <p>By continuing, you agree our Terms of Use and Privacy Policy.</p>
            <p>Don't have an account? <a href="signup.html">Click here</a> to sign up.</p>
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