<?php
// Database connection parameters
// Database connection parameters
$host = getenv("mysql_host");
$username = getenv("username");
$password = getenv("password");
$database = getenv("database");

// Establish database connection
$connection = mysqli_connect($host, $username, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the login form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the user exists
    $query = "SELECT * FROM authentication WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $query);

    // Check if the query executed successfully
    if ($result && mysqli_num_rows($result) > 0) {
        // Make service-to-service request to productpage service
        $microserviceBHost = "product-service.test-project.svc.cluster.local";
        $microserviceBPort = "80";
        $redirectUrl = "http://$microserviceBHost:$microserviceBPort/api/v1/products";
        header('Location: ' . $redirectUrl);
        exit();
    } else {
        // Invalid credentials, show an error message
        $error = "Invalid username or password.";
    }
}

// Close the database connection
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="login-page-style.css">
</head>
<body>
    <h2>Login form</h2>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="#">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
