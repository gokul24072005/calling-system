<?php
require 'config.php';

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    // List all employees (admin/manager only)
    requireRole('admin');
    $stmt = $pdo->query("SELECT id, name, username, email, role FROM users WHERE role='employee'");
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
}
elseif ($method === 'POST') {
    // Add new employee (admin only)
    requireRole('admin');
    $data = json_decode(file_get_contents('php://input'), true);
    $name = $data['name'];
    $username = $data['username'];
    $email = $data['email'];
    $plainPassword = bin2hex(random_bytes(4)); // auto-generate 8-char password
    $hash = password_hash($plainPassword, PASSWORD_DEFAULT);

    // Check if username exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
    $stmt->execute([$username]);
    if ($stmt->fetch()) {
        http_response_code(400);
        echo json_encode(['error' => 'Username already exists']);
        exit;
    }

    $stmt = $pdo->prepare("INSERT INTO users (name, username, password, email, role) VALUES (?, ?, ?, ?, 'employee')");
    $stmt->execute([$name, $username, $hash, $email]);
    echo json_encode(['success' => true, 'id' => $pdo->lastInsertId(), 'generated_password' => $plainPassword]);
}
elseif ($method === 'DELETE') {
    // Remove employee (admin only)
    requireRole('admin');
    $id = $_GET['id'] ?? null;
    if (!$id) {
        http_response_code(400);
        echo json_encode(['error' => 'Missing ID']);
        exit;
    }
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ? AND role='employee'");
    $stmt->execute([$id]);
    echo json_encode(['success' => true]);
}
?>