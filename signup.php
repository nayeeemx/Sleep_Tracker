<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Store user information in the database
    // Connect to the database (replace with your database credentials)
    $conn = mysqli_connect("localhost", "root", "", "sleep");

    if ($conn) {
        // Escape special characters to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // Check if the username already exists in the database
        $query = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "Username already exists. Please choose a different username.";
        } else {
            // Insert the user into the database
            $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                echo "Signup successful!";
            } else {
                echo "Failed to signup. Please try again.";
            }
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Failed to connect to the database.";
    }
}
?>