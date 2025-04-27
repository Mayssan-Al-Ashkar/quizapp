<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$title = $data['title'];
$description = $data['description'];
$user_id = $data['user_id'];

$sql = "INSERT INTO quizzes (title, description, user_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if($stmt->execute([$title, $description, $user_id])) {
    echo json_encode(["message" => "Quiz created successfully"]);
} else {
    echo json_encode(["message" => "Failed to create quiz"]);
}
?>
