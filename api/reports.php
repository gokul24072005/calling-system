<?php
require 'config.php';
requireRole('manager'); // only manager and admin can export

if (isset($_GET['export']) && $_GET['export'] === 'csv') {
    // Fetch all leads with employee names
    $stmt = $pdo->query("
        SELECT 
            u.name as employee,
            l.client_name,
            l.client_phone,
            l.client_email,
            l.description,
            l.due_date,
            l.status,
            l.notes,
            l.created_at
        FROM leads l
        JOIN users u ON l.assigned_to = u.id
        ORDER BY l.due_date
    ");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="leads_report_'.date('Y-m-d').'.csv"');
    $output = fopen('php://output', 'w');
    // Add headers
    fputcsv($output, array_keys($rows[0]));
    foreach ($rows as $row) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit;
}

// If no export, return JSON (optional)
echo json_encode(['error' => 'Use ?export=csv']);
?>