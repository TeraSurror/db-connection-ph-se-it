<?php
//  Start Session
session_start();

// Get data from the users
$email = $_POST["email"];
$password1 = $_POST["password"];

$servername = "localhost";
// Username and Password given below are the default values
$username = "root";
$password = "";
$dbname = "example1";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Write query (should be written in MySQL)
// Below query checks for credentials in the database
$sql = "SELECT * FROM users WHERE email='$email' AND password=$password1";

// Run the query using the mysqli_query function
// First parameter is the database connection
// Second parameter is the sql query 
$result = mysqli_query($conn, $sql);

// Convert the result from above into an array 
// id can be accessed as $row["id"]
// Similarly other attributes can be accessed
$row  = mysqli_fetch_array($result);
// Print result for debugging
print_r($row);


// Set the session variables
if (is_array($row)) {
    $_SESSION["id"] = $row['id'];
    $_SESSION["name"] = $row['name'];
    echo $_SESSION["name"];
} else {
    $message = "Invalid Username or Password!";
    echo $message;
}

// Redirect to dashboard
if (isset($_SESSION["name"])) {
    echo "Success";
    header("Location:index.php");
}
?>



<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Site | Login</title>
</head>
<body>
    <h1>My Site 🔥 🔥 </h1>
    <br>
    <!-- Form to input User data -->
    <!-- Add styles to make the UI better -->
    <form action="" method="post">
        <div>Email : <input type="email" name="email" placeholder="Enter your email"></div>
        <br>
        <div>Password : <input type="password" name="password" placeholder="Enter your password"></div>
        <br>
        <input type="submit">
        <input type="reset">
    </form>
</body>
</html>