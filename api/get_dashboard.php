<?php
require 'config.php';
if (!isLoggedIn()) {
    http_response_code(401);
    die(json_encode(['error' => 'Unauthorized']));
}

$userId = $_SESSION['user_id'];
$role = $_SESSION['role'];
$response = [];

if ($role === 'admin' || $role === 'manager') {
    // Employee list with performance
    $stmt = $pdo->query("
        SELECT u.id, u.name, u.email,
               COUNT(l.id) as totalCalls,
               SUM(CASE WHEN l.status='interested' THEN 1 ELSE 0 END) as interested,
               SUM(CASE WHEN l.status='not_interested' THEN 1 ELSE 0 END) as notInterested,
               SUM(CASE WHEN l.status='call_later' THEN 1 ELSE 0 END) as callLater,
               SUM(CASE WHEN l.status='completed' THEN 1 ELSE 0 END) as completed
        FROM users u
        LEFT JOIN leads l ON u.id = l.assigned_to
        WHERE u.role='employee'
        GROUP BY u.id
    ");
    $response['employees'] = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Lead stats
    $stmt = $pdo->query("SELECT status, COUNT(*) as count FROM leads GROUP BY status");
    $stats = [];
    while ($row = $stmt->fetch()) {
        $stats[$row['status']] = $row['count'];
    }
    $response['leadStats'] = $stats;
}

if ($role === 'employee') {
    // Employee's own leads
    $stmt = $pdo->prepare("SELECT * FROM leads WHERE assigned_to = ? ORDER BY due_date");
    $stmt->execute([$userId]);
    $response['myLeads'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode($response);
?>