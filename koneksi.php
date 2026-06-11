<?php
$host = getenv("PGHOST") ?: "db.oaypsziqktajxtbrqlww.supabase.co";
$port = getenv("PGPORT") ?: "5432";
$dbname = getenv("PGDATABASE") ?: "postgres";
$user = getenv("PGUSER") ?: "postgres";
$password = getenv("PGPASSWORD") ?: "yOo780kiPnwvW9ok";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if(!$conn){
    die("Koneksi gagal: " . pg_last_error());
}

function db_query($conn, $query) {
    return pg_query($conn, $query);
}

function db_fetch_assoc($result) {
    return pg_fetch_assoc($result);
}

function db_fetch_array($result) {
    return pg_fetch_array($result);
}

function db_num_rows($result) {
    return pg_num_rows($result);
}

function db_affected_rows($conn) {
    return pg_affected_rows($conn);
}

function db_escape_string($conn, $str) {
    return pg_escape_string($conn, $str);
}

function db_error($conn) {
    return pg_last_error($conn);
}

function db_insert_id($conn, $sequence) {
    $res = pg_query($conn, "SELECT lastval()");
    $row = pg_fetch_row($res);
    return $row[0] ?? 0;
}

function db_connect($host, $user, $password, $dbname, $port = 5432) {
    return pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
}
?>
