<?php
include 'conn.php';//conn.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username = $_POST['username'];
$email = $_POST['emails'];
// Encrypt password
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO greencycle (username, emails, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $emails, $password);
if ($stmt->execute()) {
echo "Registration successful! <a href='login.php'>Login here</a>";
} else {
echo "Error: " . $stmt->error;
}
}


