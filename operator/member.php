<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php
include "../koneksi.php";

$data = db_query($conn,"SELECT * FROM member");
?>

<h2>Data Member</h2>

<a href="tambah_member.php">
Tambah Member
</a>


<br><br>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Nama</th>
    <th>Username</th>
    <th>Saldo</th>
    <th>Aksi</th>
</tr>

<?php while($d=db_fetch_assoc($data)){ ?>

<tr>

<td><?php echo $d['id_member']; ?></td>

<td><?php echo $d['nama']; ?></td>

<td><?php echo $d['username']; ?></td>

<td>Rp <?php echo number_format($d['saldo']); ?></td>

<td>

<a href="edit_member.php?id=<?php echo $d['id_member']; ?>">
Edit
</a>

|

<a href="hapus_member.php?id=<?php echo $d['id_member']; ?>">
Hapus
</a>

</td>

</tr>

<?php } ?>
<a href="dashboard.php">
Kembali ke Dashboard
</a>
</table>
