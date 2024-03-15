<?php
// MySQL database configuration
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "sensordata"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get sensor value, user ID, and sensor ID from POST request
$value = $_POST['value'];
$sensor_id = $_POST['sensor_id'];

// Insert sensor reading into database
$sql = "INSERT INTO sensor_readings (sensor_id, value) VALUES ('$sensor_id', '$value')";

if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
