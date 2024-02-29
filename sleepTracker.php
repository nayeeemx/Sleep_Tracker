<!DOCTYPE html>
<html>
<head>
    <title>Sleep Tracking</title>
    <!-- Include CSS and JavaScript libraries for the chart -->
    <link rel="stylesheet" type="text/css" href="chart.css">
</head>
<body>
    <h2>Sleep Tracking</h2>

    <!-- Display the sleep entries as a list -->
    <h3>Sleep Entries</h3>
    <ul>
        <?php
        // Retrieve the sleep entries from the database for the last 7 days or 1 month
        // Connect to the database (replace with your database credentials)
        $conn = mysqli_connect("localhost", "root", "", "sleep");
        
        if ($conn) {
            // Determine the date range based on the user's preference (last 7 days or 1 month)
            $startDate = date('Y-m-d', strtotime("-7 days"));
            $endDate = date('Y-m-d');
            // Or for 1 month: $startDate = date('Y-m-d', strtotime("-1 month"));

            // Query the database to retrieve sleep entries within the date range
            $query = "SELECT * FROM sleep_entries WHERE date BETWEEN '$startDate' AND '$endDate' ORDER BY date DESC";
            $result = mysqli_query($conn, $query);

            // Iterate over the sleep entries and display them as list items
            while ($row = mysqli_fetch_assoc($result)) {
                $date = $row['date'];
                $sleepTime = $row['sleep_time'];
                $wakeUpTime = $row['wake_up_time'];
                $sleepDuration = $row['sleep_duration'];

                echo "<li>Date: $date | Sleep Time: $sleepTime | Wake-up Time: $wakeUpTime | Sleep Duration: $sleepDuration</li>";
            }

            // Close the database connection
            mysqli_close($conn);
        } else {
            echo "Failed to connect to the database.";
        }
        ?>
    </ul>

    <!-- Display the chart -->
    <h3>Sleep Duration Chart</h3>
    <canvas id="chartContainer" style="height: 300px; width: 100%;"></canvas>
    <script src="chart.js"></script>
    <button onclick="location.href='sleepMain.php';">New Entry</button>
</body>
</html>