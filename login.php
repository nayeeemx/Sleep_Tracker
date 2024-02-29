<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate user credentials
    // Connect to the database (replace with your database credentials)
    $conn = mysqli_connect("localhost", "root", "", "sleep");

    if ($conn) {
        // Escape special characters to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // Query the database to check if user credentials are valid
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            // User credentials are valid
            session_start();
            $_SESSION["username"] = $username;
            // Redirect to the sleep tracking page or any other desired location
            header("Location: sleep_tracking.php");
            exit();
        } else {
            // User credentials are invalid
            echo "Invalid username or password.";
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Failed to connect to the database.";
    }
}
?>