<?php

// Set your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the login form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $username = sanitize_input($_POST["username"]);
    $password = sanitize_input($_POST["password"]);

    // SQL query to check if the username and password match
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login successful
        echo "Login successful!";
   // header(/*html page*/);
    } else {
        // Login failed
        echo "Invalid username or password";
   // header(/*same html page*/);
    }
}

// Close the database connection
$conn->close();

?>