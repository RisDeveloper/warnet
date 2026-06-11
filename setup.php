<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "<h2>Debug</h2>";

echo "<b>pdo_pgsql:</b> " . (in_array("pgsql", PDO::getAvailableDrivers()) ? "YES" : "NO") . "<br>";

echo "<h2>Connection Test</h2>";
try {
    $conn = new PDO("pgsql:host=postgres;port=5432;dbname=railway", "postgres", "RGzZiWmvfZmUeEGlmupxebZTWOAfFTjH");
    echo "Connection: <span style='color:green'>OK</span><br>";
    $conn = null;
} catch (Exception $e) {
    echo "Connection: <span style='color:red'>FAILED</span> - " . $e->getMessage() . "<br>";
}

echo "<h2>Import Database</h2>";
echo "<form method='post'><button type='submit' name='import' style='padding:10px 20px;background:#000;color:#fff;border:none;cursor:pointer;'>Import Database</button></form>";

if ($_POST['import'] ?? null) {
    try {
        $conn = new PDO("pgsql:host=postgres;port=5432;dbname=railway", "postgres", "RGzZiWmvfZmUeEGlmupxebZTWOAfFTjH");
        $sql = file_get_contents("database_pgsql.sql");
        $conn->exec($sql);
        echo "<span style='color:green'>Database imported!</span>";
        $conn = null;
    } catch (Exception $e) {
        echo "<span style='color:red'>Error: " . $e->getMessage() . "</span>";
    }
}
?>
