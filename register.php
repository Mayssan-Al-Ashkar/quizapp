<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$username = $data['username'];
$email = $data['email'];
$password = $data['password'];

$hashed_password = password_hash($password, PASSWORD_DEFAULT); 

$sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt->execute([$username, $email, $hashed_password])) {
    echo json_encode(["message" => "User registered successfully"]);
} else {
    echo json_encode(["message" => "Failed to register user"]);
}
?>
