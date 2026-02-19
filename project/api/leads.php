<?php
require 'config.php';
if (!isLoggedIn()) {
    http_response_code(401);
    die(json_encode(['error' => 'Unauthorized']));
}

$method = $_SERVER['REQUEST_METHOD'];
$userId = $_SESSION['user_id'];
$role = $_SESSION['role'];

if ($method === 'GET') {
    if ($role === 'employee') {
        $stmt = $pdo->prepare("SELECT * FROM leads WHERE assigned_to = ? ORDER BY due_date");
        $stmt->execute([$userId]);
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } else {
        // admin/manager see all leads with assignee name
        $stmt = $pdo->query("
            SELECT l.*, u.name as assigned_name 
            FROM leads l 
            JOIN users u ON l.assigned_to = u.id 
            ORDER BY due_date
        ");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    }
}
elseif ($method === 'POST') {
    // Assign new lead (admin only)
    requireRole('admin');
    $data = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("
        INSERT INTO leads (assigned_to, client_name, client_phone, client_email, description, due_date) 
        VALUES (?, ?, ?, ?, ?, ?)
    ");
    $stmt->execute([
        $data['assigned_to'],
        $data['client_name'],
        $data['client_phone'],
        $data['client_email'],
        $data['description'],
        $data['due_date']
    ]);
    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId()]);
}
elseif ($method === 'PUT') {
    // Update lead status (employee only, with call log)
    $data = json_decode(file_get_contents('php://input'), true);
    $leadId = $data['id'];
    $status = $data['status'];
    $notes = $data['notes'] ?? '';

    // Verify employee owns this lead
    if ($role === 'employee') {
        $stmt = $pdo->prepare("SELECT assigned_to FROM leads WHERE id = ?");
        $stmt->execute([$leadId]);
        $lead = $stmt->fetch();
        if (!$lead || $lead['assigned_to'] != $userId) {
            http_response_code(403);
            die(json_encode(['error' => 'Forbidden']));
        }
    }

    $pdo->beginTransaction();
    try {
        // Update lead status and append notes
        $stmt = $pdo->prepare("UPDATE leads SET status = ?, notes = CONCAT(notes, ?) WHERE id = ?");
        $timestamp = "\n[" . date('Y-m-d H:i:s') . "] " . $notes;
        $stmt->execute([$status, $timestamp, $leadId]);

        // Log the call
        $stmt = $pdo->prepare("INSERT INTO call_logs (lead_id, user_id, status, notes) VALUES (?, ?, ?, ?)");
        $stmt->execute([$leadId, $userId, $status, $notes]);

        $pdo->commit();
        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        $pdo->rollBack();
        http_response_code(500);
        echo json_encode(['error' => 'Update failed']);
    }
}
?>