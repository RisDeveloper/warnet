<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php
include "../koneksi.php";

$data = db_query($conn,"SELECT * FROM komputer");
?>

<h2>Data Komputer</h2>

<a href="tambah_komputer.php">
Tambah Komputer
</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nama PC</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>

<?php while($d=db_fetch_assoc($data)){ ?>

<tr>

<td><?php echo $d['id_pc']; ?></td>

<td><?php echo $d['nama_pc']; ?></td>

<td><?php echo $d['status']; ?></td>

<td>

<a href="edit_komputer.php?id=<?php echo $d['id_pc']; ?>">
Edit
</a>

|

<a href="hapus_komputer.php?id=<?php echo $d['id_pc']; ?>">
Hapus
</a>

</td>

</tr>

<?php } ?>
<a href="dashboard.php">
Kembali ke Dashboard
</a>
</table>
