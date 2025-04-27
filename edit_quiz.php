<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && isset($data['title']) && isset($data['description']) && isset($data['user_id'])) {
    $quiz_id = $data['id'];
    $title = $data['title'];
    $description = $data['description'];
    $user_id = $data['user_id'];

    $sql = "UPDATE quizzes SET title = ?, description = ?, user_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt->execute([$title, $description, $user_id, $quiz_id])) {
        echo json_encode(["message" => "Quiz updated successfully"]);
    } else {
        echo json_encode(["message" => "Failed to update quiz"]);
    }
} else {
    echo json_encode(["message" => "Invalid input data"]);
}
?>
