<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php
include "../koneksi.php";

$data = db_query($conn,"SELECT * FROM paket");
?>

<h2>Data Paket Warnet</h2>

<a href="tambah_paket.php">
Tambah Paket
</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nama Paket</th>
    <th>Durasi</th>
    <th>Harga</th>
    <th>Aksi</th>
</tr>

<?php while($d=db_fetch_assoc($data)){ ?>

<tr>

<td><?= $d['id_paket']; ?></td>
<td><?= $d['nama_paket']; ?></td>
<td><?= $d['durasi_jam']; ?> Jam</td>
<td>Rp <?= number_format($d['harga']); ?></td>

<td>

<a href="edit_paket.php?id=<?= $d['id_paket']; ?>">
Edit
</a>

|

<a href="hapus_paket.php?id=<?= $d['id_paket']; ?>">
Hapus
</a>

</td>

</tr>

<?php } ?>
<a href="dashboard.php">
Kembali ke Dashboard
</a>
</table>
