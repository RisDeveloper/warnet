<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
echo "<h2>Debug</h2>";

echo "<b>pgsql extension:</b> " . (extension_loaded("pgsql") ? "YES" : "NO") . "<br>";
echo "<b>pdo_pgsql extension:</b> " . (extension_loaded("pdo_pgsql") ? "YES" : "NO") . "<br>";

echo "<h2>Connection Test</h2>";
$conn = @pg_connect("host=postgres port=5432 dbname=railway user=postgres password=RGzZiWmvfZmUeEGlmupxebZTWOAfFTjH");
if ($conn) {
    echo "Connection: <span style='color:green'>OK</span><br>";
    pg_close($conn);
} else {
    echo "Connection: <span style='color:red'>FAILED</span><br>";
}

echo "<h2>Import Database</h2>";
echo "<form method='post'><button type='submit' name='import' style='padding:10px 20px;background:#000;color:#fff;border:none;cursor:pointer;'>Import Database</button></form>";

if ($_POST['import'] ?? null) {
    $conn = @pg_connect("host=postgres port=5432 dbname=railway user=postgres password=RGzZiWmvfZmUeEGlmupxebZTWOAfFTjH");
    if ($conn) {
        $sql = file_get_contents("database_pgsql.sql");
        $r = @pg_query($conn, $sql);
        if ($r) {
            echo "<span style='color:green'>Database imported!</span>";
        } else {
            echo "<span style='color:red'>Error</span>";
        }
        pg_close($conn);
    } else {
        echo "<span style='color:red'>Connection failed</span>";
    }
}
?>
