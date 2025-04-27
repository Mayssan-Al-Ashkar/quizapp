<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$question_id = $data['id'];

$sql = "DELETE FROM questions WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt->execute([$question_id])) {
    echo json_encode(["message" => "Question deleted successfully"]);
} else {
    echo json_encode(["message" => "Failed to delete question"]);
}
?>
