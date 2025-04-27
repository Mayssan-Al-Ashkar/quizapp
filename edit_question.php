<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$question_id = $data['id'];
$question = $data['question'];
$option_a = $data['option_a'];
$option_b = $data['option_b'];
$option_c = $data['option_c'];
$option_d = $data['option_d'];
$correct_option = $data['correct_option'];

$sql = "UPDATE questions SET question = ?, option_a = ?, option_b = ?, option_c = ?, option_d = ?, correct_option = ? 
        WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt->execute([$question, $option_a, $option_b, $option_c, $option_d, $correct_option, $question_id])) {
    echo json_encode(["message" => "Question updated successfully"]);
} else {
    echo json_encode(["message" => "Failed to update question"]);
}
?>
