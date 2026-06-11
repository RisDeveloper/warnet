<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php

include "../koneksi.php";

$id = $_GET['id'];

$data = db_query(
$conn,
"SELECT * FROM paket
WHERE id_paket='$id'"
);

$d = db_fetch_assoc($data);

?>

<h2>Edit Paket</h2>

<form action="update_paket.php" method="POST">

<input
type="hidden"
name="id_paket"
value="<?= $d['id_paket']; ?>"
>

Nama Paket :

<input
type="text"
name="nama_paket"
value="<?= $d['nama_paket']; ?>"
>

<br><br>

Durasi :

<input
type="number"
name="durasi_jam"
value="<?= $d['durasi_jam']; ?>"
>

<br><br>

Harga :

<input
type="number"
name="harga"
value="<?= $d['harga']; ?>"
>

<br><br>

<button type="submit">
Update
</button>
<a href="paket.php">
Kembali
</a>
</form>
