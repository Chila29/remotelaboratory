<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:motorlab.database.windows.net,1433; Database = motorlab", "admin_remlab", "Remote12");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "admin_remlab", "pwd" => "Remote12", "Database" => "motorlab", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:motorlab.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>