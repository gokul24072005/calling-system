<?php
require 'config.php';
if (!isLoggedIn()) {
    http_response_code(401);
    die(json_encode(['error' => 'Unauthorized']));
}

$leadId = $_GET['lead_id'] ?? null;
if (!$leadId) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing lead_id']);
    exit;
}

// Employee can see only their own leads' logs
$userId = $_SESSION['user_id'];
$role = $_SESSION['role'];

if ($role === 'employee') {
    $stmt = $pdo->prepare("
        SELECT l.* FROM call_logs l
        JOIN leads ld ON l.lead_id = ld.id
        WHERE l.lead_id = ? AND ld.assigned_to = ?
        ORDER BY called_at DESC
    ");
    $stmt->execute([$leadId, $userId]);
} else {
    // admin/manager see all
    $stmt = $pdo->prepare("SELECT * FROM call_logs WHERE lead_id = ? ORDER BY called_at DESC");
    $stmt->execute([$leadId]);
}

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>