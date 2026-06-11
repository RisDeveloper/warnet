<?php
include "../koneksi.php";

$id = $_GET['id'];

$data = db_query($conn,
    "SELECT t.id_transaksi, t.tanggal, t.metode_bayar,
            m.nama, p.nama_paket, p.durasi_jam, p.harga, k.nama_pc
     FROM transaksi t
     JOIN member m ON t.id_member=m.id_member
     JOIN paket p ON t.id_paket=p.id_paket
     JOIN komputer k ON t.id_pc=k.id_pc
     WHERE t.id_transaksi='$id'"
);

$d = db_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
<title>Nota Pembayaran</title>
<style>
body{font-family:Arial;width:300px;margin:auto;}
hr{border:1px dashed black;}
</style>
</head>
<body>

<center>
<h2>WARNET AKU GW</h2>
Jl. Contoh No. 1
<hr>
</center>

<table>
<tr><td>Tanggal</td><td>: <?= $d['tanggal']; ?></td></tr>
<tr><td>Member</td><td>: <?= $d['nama']; ?></td></tr>
<tr><td>Komputer</td><td>: <?= $d['nama_pc']; ?></td></tr>
<tr><td>Paket</td><td>: <?= $d['nama_paket']; ?></td></tr>
<tr><td>Durasi</td><td>: <?= $d['durasi_jam']; ?> Jam</td></tr>
<tr><td>Bayar</td><td>: <?= $d['metode_bayar']; ?></td></tr>
</table>

<hr>

<h3>Total : Rp <?= number_format($d['harga']); ?></h3>

<hr>

<center>
Terima Kasih<br>
Selamat Bermain
</center>

<a href="transaksi.php">Kembali</a>

</body>
</html>
