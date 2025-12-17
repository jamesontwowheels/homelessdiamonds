<?php
header('Content-Type: application/json');

include '../dbconnect.php';

$q = $_GET['q'] ?? '';

if (strlen($q) < 2) {
    echo json_encode([]);
    exit;
}

try {
    $stmt = $conn->prepare("
        SELECT DISTINCT TOP 10 Name
        FROM homeless_diamonds.dbo.contributors_all
        WHERE Name LIKE ?
        ORDER BY Name
    ");

    $stmt->execute([$q . '%']);
    echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));

} catch (PDOException $e) {
    // Log real error server-side
    error_log($e->getMessage());

    // Return valid JSON to browser
    echo json_encode([]);
}
