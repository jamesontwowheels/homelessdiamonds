<?php
include '../dbconnect.php';

if (strcasecmp($_POST['auth'] ?? '', 'gasan') !== 0) {
    http_response_code(403);
    exit('Authorisation failed');
}

$edition = (int)$_POST['edition'];
$names = $_POST['name'];

$conn->beginTransaction();

/* Get next Unique ID */
$maxStmt = $conn->query("SELECT ISNULL(MAX(UniqueID), 0) FROM contributors_all");
$nextId = (int)$maxStmt->fetchColumn() + 1;

$sql = "
INSERT INTO contributors_all
(UniqueID, Name, MagazineEdition, _26_1, _26_2, _26_3, _26_4, _26_5, _26_6, _26_7, _26_8, _26_9)
VALUES
(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
";

$stmt = $conn->prepare($sql);

for ($i = 0; $i < count($names); $i++) {
    if (trim($names[$i]) === '') continue;

    $values = [
        $nextId++,
        trim($names[$i]),
        $edition
    ];

    for ($c = 1; $c <= 9; $c++) {
        $val = $_POST["_26_$c"][$i] ?? 0;
        $values[] = ($val == 0) ? null : (int)$val;
    }

    $stmt->execute($values);
}

$conn->commit();
echo "Import successful";
