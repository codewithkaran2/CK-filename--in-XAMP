<?php
header('Content-Type: application/json');
include 'connect.php';   // ← HERE

$result = $conn->query("
  SELECT player_name, health_remaining, score, waves_survived, time_survived
  FROM survival_leaderboard
  ORDER BY score DESC, waves_survived DESC, time_survived DESC
  LIMIT 10
");

$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}
echo json_encode($rows);
