<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = db_query($conn,
    "SELECT * FROM member WHERE username='$username' AND password='$password'"
);

$data = db_fetch_assoc($query);

if($data){
    $_SESSION['id_member'] = $data['id_member'];
    $_SESSION['nama'] = $data['nama'];
    header("Location: member/dashboard.php");
    exit;
}else{
    echo "Login Gagal";
}
?>
