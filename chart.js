    // Generate the chart using the chart library (replace with your chart library code)
    // Make sure to pass the sleep duration data and dates to the chart library

    // Assuming you have retrieved the sleep duration data and dates from the database
    var sleepDurations = [6, 7, 8, 7, 6, 7, 8]; // Example sleep duration data
    var dates = ['2024-02-21', '2024-02-22', '2024-02-23', '2024-02-24', '2024-02-25', '2024-02-26', '2024-02-27']; // Example dates

    // Replace the following code with the actual code for your chart library

    // Assuming you have a canvas element in your HTML where you want to render the chart
    var ctx = document.getElementById('chartContainer').getContext('2d');

    // Create the chart using Chart.js
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: dates, // Use the dates array for the X-axis labels
            datasets: [{
                label: 'Sleep Duration',
                data: sleepDurations, // Use the sleep durations array for the Y-axis data
                backgroundColor: 'rgba(0, 123, 255, 0.5)', // Example background color
                borderColor: 'rgba(0, 123, 255, 1)', // Example border color
                borderWidth: 1 // Example border width
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true // Start the Y-axis from zero
                }
            }
        }
    });
