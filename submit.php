<?php 
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "jobportal"; 

$conn = new mysqli($servername, $username, $password, $dbname); 

if ($conn->connect_error) { 
    die("Connection failed: " . $conn->connect_error); 
}

$email = $_POST['email'];
$number = $_POST['contact_number'];
$comment = $_POST['comments'];

$stmt = $conn->prepare("INSERT INTO contact (email, `number`, comment) VALUES (?, ?, ?)");
$stmt->bind_param("sis", $email, $number, $comment);

if ($stmt->execute()) { 
    echo "Thank you! Your contact details have been submitted."; 
} else { 
    echo "Error: " . $stmt->error; 
} 

$stmt->close();
$conn->close(); 
?>
