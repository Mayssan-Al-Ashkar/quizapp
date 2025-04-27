<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'];
$password = password_hash($data['password'], PASSWORD_DEFAULT);

$sql = "INSERT INTO users ( email, password) VALUES ( ?, ?)";
$stmt = $conn->prepare($sql);

if($stmt->execute([ $email, $password])) {
    echo json_encode(["message" => "User registered successfully"]);
} else {
    echo json_encode(["message" => "Registration failed"]);
}
?>
