<?php 
    // Start Session
    session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Site | Home Page</title>
</head>
<body>
    <?php 
        // check if session variable is set
        if(isset($_SESSION["name"])){
            $name = $_SESSION["name"];
            echo "<h1>Welcome ".$name."</h1>";
        }
        // Error message
        else{
            echo "<h1>Please Login First</h1>";
        }
        session_destroy();
    ?>
</body>
</html>