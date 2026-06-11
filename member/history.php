<?php
session_start();
include "../koneksi.php";

$id_member = $_SESSION['id_member'];

$data = db_query($conn,
    "SELECT t.*, p.nama_paket, p.durasi_jam, p.harga, k.nama_pc
     FROM transaksi t
     JOIN paket p ON t.id_paket=p.id_paket
     JOIN komputer k ON t.id_pc=k.id_pc
     WHERE t.id_member='$id_member'
     ORDER BY t.id_transaksi DESC"
);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>History Bermain</h2>

<table border="1">
<tr>
<th>Tanggal</th>
<th>Paket</th>
<th>Durasi</th>
<th>Harga</th>
<th>Komputer</th>
<th>Pembayaran</th>
</tr>

<?php while($d=db_fetch_array($data)){ ?>
<tr>
<td><?php echo $d['tanggal']; ?></td>
<td><?php echo $d['nama_paket']; ?></td>
<td><?php echo $d['durasi_jam']; ?> Jam</td>
<td>Rp <?php echo number_format($d['harga']); ?></td>
<td><?php echo $d['nama_pc']; ?></td>
<td><?php echo $d['metode_bayar']; ?></td>
</tr>
<?php } ?>
</table>
<a href="dashboard.php">Kembali</a>
</body>
</html>
