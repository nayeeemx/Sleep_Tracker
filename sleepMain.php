<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST["date"];
    $sleepHour = $_POST["sleep-hour"];
    $sleepMinute = $_POST["sleep-minute"];
    $wakeupHour = $_POST["wakeup-hour"];
    $wakeupMinute = $_POST["wakeup-minute"];

    // Calculate sleep duration
    $sleepTime = $sleepHour * 60 + $sleepMinute;
    $wakeupTime = $wakeupHour * 60 + $wakeupMinute;
    $duration = ($wakeupTime - $sleepTime + 1440) % 1440; // Handle time crossing midnight

    // Store the sleep entry in the database
    // Connect to the database (replace with your database credentials)
    $conn = mysqli_connect("localhost", "root", "", "sleep");

    if ($conn) {
        // Escape special characters to prevent SQL injection
        $date = mysqli_real_escape_string($conn, $date);
        $sleepTime = mysqli_real_escape_string($conn, $sleepTime);
        $wakeupTime = mysqli_real_escape_string($conn, $wakeupTime);
        $duration = mysqli_real_escape_string($conn, $duration);

        // Insert the sleep entry into the database
        $query = "INSERT INTO sleep_entries (user_id, date, sleep_time, wakeup_time, duration)
                  VALUES ('$user_id', '$date', '$sleepTime', '$wakeupTime', '$duration')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo "Sleep entry added successfully!";
        } else {
            echo "Failed to add sleep entry. Please try again.";
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Failed to connect to the database.";
    }
}
?>