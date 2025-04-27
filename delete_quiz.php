<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$quiz_id = $data['id'];

$sql = "DELETE FROM quizzes WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt->execute([$quiz_id])) {
    echo json_encode(["message" => "Quiz deleted successfully"]);
} else {
    echo json_encode(["message" => "Failed to delete quiz"]);
}
?>
