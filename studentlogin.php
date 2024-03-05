<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_db";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = sanitize_input($_POST["email"]);
    $password = $_POST["password"];
    
    $sql = "SELECT id, password FROM students WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row["password"];

       
        if (password_verify($password, $hashed_password)) {
            
            echo "Login successful!";
        header(localhost/session.php);
        } else {
            
            echo "Invalid email or password";
        //header(/*home page*/);
        }
    } else {
       
        echo "Invalid email or password";
         //header(/*home page*/);
    }
}

// Close the database connection
$conn->close();

?>
