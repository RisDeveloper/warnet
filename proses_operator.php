<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = db_query($conn,
    "SELECT * FROM operator WHERE username='$username' AND password='$password'"
);

$data = db_fetch_assoc($query);

if($data){
    $_SESSION['id_operator'] = $data['id_operator'];
    $_SESSION['nama'] = $data['nama'];
    header("Location: operator/dashboard.php");
    exit;
}else{
    echo "Login Gagal";
}
?>
