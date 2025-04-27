<?php
include 'db.php';

$sql = "SELECT * FROM quizzes";
$stmt = $conn->prepare($sql);
$stmt->execute();

$quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($quizzes);
?>
