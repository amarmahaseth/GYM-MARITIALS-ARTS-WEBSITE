<?php
$servername = "localhost";  // Change this to your MySQL server hostname
$username = "root";  // Change this to your MySQL username
$password = "";  // Change this to your MySQL password
$database = "burnumartialarts";  // Change this to the name of your MySQL database

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Perform database operations here, such as inserting the data into a table
    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Message sent successfully";
        echo "<script>
            setTimeout(function() {
                window.location.href = 'index.html';
            }, 3000); // Redirect after 2 seconds
          </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
