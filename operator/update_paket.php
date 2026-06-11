<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php

include "../koneksi.php";

$id = $_POST['id_paket'];

$nama_paket = $_POST['nama_paket'];
$durasi_jam = $_POST['durasi_jam'];
$harga = $_POST['harga'];

db_query($conn,

"UPDATE paket SET

nama_paket='$nama_paket',
durasi_jam='$durasi_jam',
harga='$harga'

WHERE id_paket='$id'"

);

header("Location: paket.php");
