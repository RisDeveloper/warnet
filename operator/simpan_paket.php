<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php

include "../koneksi.php";

$nama_paket = $_POST['nama_paket'];
$durasi_jam = $_POST['durasi_jam'];
$harga = $_POST['harga'];

db_query($conn,

"INSERT INTO paket
(nama_paket,durasi_jam,harga)

VALUES

('$nama_paket',
'$durasi_jam',
'$harga')

");

header("Location: paket.php");
