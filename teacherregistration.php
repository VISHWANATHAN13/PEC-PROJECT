<?php

// Set your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $firstname = sanitize_input($_POST["firstname"]);
    $lastname = sanitize_input($_POST["lastname"]);
    $university_id = sanitize_input($_POST["university_id"]);
    $institute_name = sanitize_input($_POST["institute_name"]);
    $phone_number = sanitize_input($_POST["phone_number"]);
    $email = sanitize_input($_POST["email"]);
    $address = sanitize_input($_POST["address"]);
    $dob = sanitize_input($_POST["dob"]);
    $dept = sanitize_input($_POST["dept"]);
    $gradelevel = sanitize_input($_POST["gradelevel"]);
    $subjects_known = sanitize_input($_POST["subjects_known"]);
    $subject_names = sanitize_input($_POST["subject_names"]);

    // SQL query to insert data into the database
    $sql = "INSERT INTO your_table_name (firstname, lastname, university_id, institute_name, phone_number, email, address, dob, dept, gradelevel, subjects_known, subject_names)
            VALUES ('$firstname', '$lastname', '$university_id', '$institute_name', '$phone_number', '$email', '$address', '$dob', '$dept', '$gradelevel', '$subjects_known', '$subject_names')";

    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

?>