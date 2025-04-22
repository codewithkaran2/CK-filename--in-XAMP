<?php
header('Content-Type: application/json');
include 'connect.php';   // ← HERE

// read JSON payload
$data = json_decode(file_get_contents('php://input'), true);
if (!$data) {
    http_response_code(400);
    exit;
}

// prepare & execute
$stmt = $conn->prepare("
  INSERT INTO survival_leaderboard
    (player_name, health_remaining, score, waves_survived, time_survived)
  VALUES (?, ?, ?, ?, ?)
");
$stmt->bind_param(
    "siiii",
    $data['player_name'],
    $data['health_remaining'],
    $data['score'],
    $data['waves_survived'],
    $data['time_survived']
);
$stmt->execute();
$stmt->close();

echo json_encode(['status'=>'ok']);
