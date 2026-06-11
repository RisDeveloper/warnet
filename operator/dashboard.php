<?php
session_start();
include "../koneksi.php";

if(!isset($_SESSION['id_operator'])){
    header("Location: ../login_operator.php");
    exit;
}

$total_member = db_num_rows(
    db_query($conn,"SELECT * FROM member")
);

$total_pc = db_num_rows(
    db_query($conn,"SELECT * FROM komputer")
);

$pc_dipakai = db_num_rows(
    db_query($conn,"SELECT * FROM komputer WHERE status='Tersedia'")
);

$pendapatan = db_fetch_assoc(
    db_query($conn, "SELECT SUM(harga) as total FROM transaksi")
);
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>Dashboard Operator</h1>

<p>
Selamat Datang,
<b><?php echo $_SESSION['nama']; ?></b>
</p>

<br>

<div class="menu">

<a href="member.php">Member</a>
<a href="komputer.php">Komputer</a>
<a href="paket.php">Paket</a>
<a href="transaksi.php">Transaksi</a>
<a href="laporan.php">Laporan</a>
<a href="../logout.php">Logout</a>

</div>

<div class="statistik">

<div class="box">
<h3>Total Member</h3>
<h1><?php echo $total_member; ?></h1>
</div>

<div class="box">
<h3>Total Komputer</h3>
<h1><?php echo $total_pc; ?></h1>
</div>

<div class="box">
<h3>Komputer Dipakai</h3>
<h1><?php echo $pc_dipakai; ?></h1>
</div>

<div class="box">
<h3>Pendapatan</h3>
<h1>Rp <?php echo number_format($pendapatan['total']); ?></h1>
</div>

</div>

</body>
</html>
