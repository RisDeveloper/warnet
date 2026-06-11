<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php

session_start();
include "../koneksi.php";

$id = $_GET['id'];

$data = db_query($conn,"
SELECT t.id_transaksi, t.tanggal, t.metode_bayar,
       p.nama_paket, p.durasi_jam, p.harga,
       k.nama_pc, m.nama
FROM transaksi t
JOIN paket p ON t.id_paket=p.id_paket
JOIN komputer k ON t.id_pc=k.id_pc
JOIN member m ON t.id_member=m.id_member
WHERE t.id_transaksi='$id'
");

$d = db_fetch_assoc($data);

if(!$d){
    echo "Transaksi tidak ditemukan";
    exit;
}

?>

<h1>Transaksi Berhasil</h1>

<hr>

<p>Nama : <?php echo $d['nama']; ?></p>

<p>Paket : <?php echo $d['nama_paket']; ?></p>

<p>Durasi : <?php echo $d['durasi_jam']; ?> Jam</p>

<p>Komputer : <?php echo $d['nama_pc']; ?></p>

<p>Pembayaran : <?php echo $d['metode_bayar']; ?></p>

<p>
Total :
Rp <?php echo number_format($d['harga']); ?>
</p>

<hr>

<a href="history.php">
Lihat History
</a>

<br><br>

<a href="dashboard.php">
Kembali ke Dashboard
</a>
