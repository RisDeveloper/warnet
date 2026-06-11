<?php
$host = "postgres";
$port = "5432";
$dbname = "railway";
$user = "postgres";
$password = "RGzZiWmvfZmUeEGlmupxebZTWOAfFTjH";

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Koneksi gagal");
}

function db_query($conn, $query) {
    return $conn->query($query);
}

function db_fetch_assoc($result) {
    return $result->fetch(PDO::FETCH_ASSOC);
}

function db_fetch_array($result) {
    return $result->fetch(PDO::FETCH_BOTH);
}

function db_num_rows($result) {
    return $result->rowCount();
}

function db_affected_rows($conn) {
    $conn->exec("SELECT 1");
    return 0;
}

function db_escape_string($conn, $str) {
    return substr($conn->quote($str), 1, -1);
}

function db_error($conn) {
    $info = $conn->errorInfo();
    return $info[2] ?? "";
}

function db_insert_id($conn, $sequence) {
    return $conn->lastInsertId($sequence);
}

function db_connect($host, $user, $password, $dbname, $port = 5432) {
    try {
        return new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    } catch (PDOException $e) {
        return false;
    }
}
?>
