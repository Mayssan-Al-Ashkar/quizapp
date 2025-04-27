<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$quiz_id = $data['quiz_id'];
$question = $data['question'];
$option_a = $data['option_a'];
$option_b = $data['option_b'];
$option_c = $data['option_c'];
$option_d = $data['option_d'];
$correct_option = $data['correct_option'];

$sql = "SELECT * FROM quizzes WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$quiz_id]);
$quiz = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$quiz) {
    echo json_encode(["message" => "Quiz with the given ID does not exist"]);
    exit;
}

$sql = "INSERT INTO questions (quiz_id, question, option_a, option_b, option_c, option_d, correct_option) 
        VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt->execute([$quiz_id, $question, $option_a, $option_b, $option_c, $option_d, $correct_option])) {
    echo json_encode(["message" => "Question created successfully"]);
} else {
    echo json_encode(["message" => "Failed to create question"]);
}
?>
