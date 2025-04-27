<?php
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$quiz_id = $data['quiz_id'];

$sql = "SELECT * FROM questions WHERE quiz_id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$quiz_id]);

$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($questions);
?>
