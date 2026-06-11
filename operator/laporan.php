<?php
include "../koneksi.php";

$data = db_query($conn,
    "SELECT t.tanggal, t.metode_bayar,
            m.nama, p.nama_paket, p.durasi_jam, p.harga
     FROM transaksi t
     JOIN member m ON t.id_member=m.id_member
     JOIN paket p ON t.id_paket=p.id_paket
     ORDER BY t.tanggal DESC"
);

$total = db_fetch_assoc(db_query($conn,
    "SELECT SUM(p.harga) AS total
     FROM transaksi t
     JOIN paket p ON t.id_paket=p.id_paket"
));
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Laporan Pendapatan Warnet</h2>

<h3>Total Pendapatan : Rp <?= number_format($total['total'] ?? 0); ?></h3>

<table border="1" cellpadding="10">
<tr>
    <th>Tanggal</th>
    <th>Member</th>
    <th>Paket</th>
    <th>Durasi</th>
    <th>Harga</th>
    <th>Pembayaran</th>
</tr>

<?php while($d=db_fetch_assoc($data)){ ?>
<tr>
    <td><?= $d['tanggal']; ?></td>
    <td><?= $d['nama']; ?></td>
    <td><?= $d['nama_paket']; ?></td>
    <td><?= $d['durasi_jam']; ?> Jam</td>
    <td>Rp <?= number_format($d['harga']); ?></td>
    <td><?= $d['metode_bayar']; ?></td>
</tr>
<?php } ?>
<a href="dashboard.php">Kembali ke Dashboard</a>
</table>

</body>
</html>
