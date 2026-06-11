<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h2>Environment Variables</h2>";
echo "<pre>";
echo "PGHOST: " . (getenv("PGHOST") ?: "NOT SET") . "\n";
echo "PGPORT: " . (getenv("PGPORT") ?: "NOT SET") . "\n";
echo "PGDATABASE: " . (getenv("PGDATABASE") ?: "NOT SET") . "\n";
echo "PGUSER: " . (getenv("PGUSER") ?: "NOT SET") . "\n";
echo "PGPASSWORD: " . (getenv("PGPASSWORD") ? "SET (hidden)" : "NOT SET") . "\n";
echo "</pre>";

echo "<h2>PHP Extensions</h2>";
echo "<pre>";
echo "pgsql: " . (extension_loaded("pgsql") ? "YES" : "NO") . "\n";
echo "pdo_pgsql: " . (extension_loaded("pdo_pgsql") ? "YES" : "NO") . "\n";
echo "pdo_mysql: " . (extension_loaded("pdo_mysql") ? "YES" : "NO") . "\n";
echo "</pre>";

$host = getenv("PGHOST") ?: "db.oaypsziqktajxtbrqlww.supabase.co";
$port = getenv("PGPORT") ?: "5432";
$dbname = getenv("PGDATABASE") ?: "postgres";
$user = getenv("PGUSER") ?: "postgres";
$password = getenv("PGPASSWORD") ?: "yOo780kiPnwvW9ok";

echo "<h2>Database Connection Test</h2>";
$conn = @pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if ($conn) {
    echo "Connection: <span style='color:green'>OK</span><br>";
    
    $result = pg_query($conn, "SELECT table_name FROM information_schema.tables WHERE table_schema='public'");
    if ($result) {
        echo "Tables: ";
        $tables = [];
        while ($row = pg_fetch_assoc($result)) {
            $tables[] = $row['table_name'];
        }
        if (count($tables) > 0) {
            echo implode(", ", $tables) . "<br>";
        } else {
            echo "NO TABLES - need to import SQL<br>";
        }
    }
    
    pg_close($conn);
} else {
    echo "Connection: <span style='color:red'>FAILED</span> - " . pg_last_error() . "<br>";
}

echo "<h2>Import Database Tables</h2>";
echo "<form method='post'>
<button type='submit' name='import' style='padding:10px 20px;background:#000;color:#fff;border:none;cursor:pointer;'>Import Database</button>
</form>";

if ($_POST['import'] ?? null) {
    $conn = @pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
    if ($conn) {
        $sql = "
DROP TABLE IF EXISTS transaksi;
DROP TABLE IF EXISTS komputer;
DROP TABLE IF EXISTS member;
DROP TABLE IF EXISTS operator;
DROP TABLE IF EXISTS paket;

CREATE TABLE komputer (
    id_pc SERIAL PRIMARY KEY,
    nama_pc VARCHAR(50),
    status VARCHAR(20) DEFAULT 'Tersedia'
);

CREATE TABLE member (
    id_member SERIAL PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    saldo INTEGER DEFAULT 0
);

CREATE TABLE operator (
    id_operator SERIAL PRIMARY KEY,
    nama VARCHAR(100),
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE paket (
    id_paket SERIAL PRIMARY KEY,
    nama_paket VARCHAR(50),
    durasi_jam INTEGER,
    harga INTEGER
);

CREATE TABLE transaksi (
    id_transaksi SERIAL PRIMARY KEY,
    id_member INTEGER REFERENCES member(id_member) ON DELETE CASCADE,
    id_pc INTEGER REFERENCES komputer(id_pc) ON DELETE CASCADE,
    id_paket INTEGER REFERENCES paket(id_paket) ON DELETE CASCADE,
    metode_bayar VARCHAR(50),
    tanggal TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO komputer (nama_pc, status) VALUES
('PC-01','Dipakai'),('PC-02','Dipakai'),('PC-03','Dipakai');

INSERT INTO member (nama, username, password, saldo) VALUES
('Fadil','fadil','1234',86000),('CAHYO','cahyo','CAHYO',90000);

INSERT INTO operator (nama, username, password) VALUES
('Administrator','admin','12345');

INSERT INTO paket (nama_paket, durasi_jam, harga) VALUES
('Paket 1 jam',1,12000),('Paket 2 jam',2,24000),('Paket hemat',1,10000);
";
        $result = pg_query($conn, $sql);
        if ($result) {
            echo "<span style='color:green'>Database imported successfully!</span>";
        } else {
            echo "<span style='color:red'>Error: " . pg_last_error($conn) . "</span>";
        }
        pg_close($conn);
    } else {
        echo "<span style='color:red'>Connection failed: " . pg_last_error() . "</span>";
    }
}
?>
