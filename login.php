<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$email = $data['email'];
$password = $data['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if($user && password_verify($password, $user['password'])) {
    echo json_encode([
        "message" => "Login successful",
        "user_id" => $user['id'],
        "username" => $user['username']  
    ]);
} else {
    echo json_encode(["message" => "Invalid email or password"]);
}
?>
