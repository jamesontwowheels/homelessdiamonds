<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:aarc-server.database.windows.net,1433; Database = homeless_diamonds", "aarc_admin", "aZ158Ja^tR9g6PA6LBj");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $debug_log["db"] = "db-connected ";
}
catch (PDOException $e) {
    $debug_log["db"] = 'broken';
    //print("Error connecting to SQL Server.");
    die($debug_log[] = $e);
}
