<?php
include "../koneksi.php";

$data = db_query($conn,
    "SELECT t.id_transaksi, t.tanggal, t.metode_bayar,
            m.nama, p.nama_paket, p.durasi_jam, p.harga, k.nama_pc
     FROM transaksi t
     JOIN member m ON t.id_member=m.id_member
     JOIN paket p ON t.id_paket=p.id_paket
     JOIN komputer k ON t.id_pc=k.id_pc
     ORDER BY t.id_transaksi DESC"
);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Data Transaksi Warnet</h2>

<table border="1">
<tr>
<th>ID Transaksi</th>
<th>Tanggal</th>
<th>Member</th>
<th>Paket</th>
<th>Durasi</th>
<th>Harga</th>
<th>Komputer</th>
<th>Pembayaran</th>
<th>Nota</th>
</tr>

<?php while($d=db_fetch_array($data)){ ?>
<tr>
<td><?php echo $d['id_transaksi']; ?></td>
<td><?php echo $d['tanggal']; ?></td>
<td><?php echo $d['nama']; ?></td>
<td><?php echo $d['nama_paket']; ?></td>
<td><?php echo $d['durasi_jam']; ?> Jam</td>
<td>Rp <?php echo number_format($d['harga']); ?></td>
<td><?php echo $d['nama_pc']; ?></td>
<td><?php echo $d['metode_bayar']; ?></td>
<td><a href="nota.php?id=<?php echo $d['id_transaksi']; ?>">lihat nota</a></td>
</tr>
<?php } ?>
<a href="dashboard.php">Kembali ke Dashboard</a>
</table>

</body>
</html>
