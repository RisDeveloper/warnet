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
"SELECT * FROM komputer
WHERE id_pc='$id'"
);

$d = db_fetch_assoc($data);

?>

<h2>Edit Komputer</h2>

<form action="update_komputer.php" method="POST">

<input
type="hidden"
name="id_pc"
value="<?php echo $d['id_pc']; ?>"
>

Nama PC :

<input
type="text"
name="nama_pc"
value="<?php echo $d['nama_pc']; ?>"
>

<br><br>

Status :

<select name="status">

<option value="Tersedia">Tersedia</option>

<option value="Dipakai">Dipakai</option>

</select>

<br><br>

<button type="submit">
Update
</button>
<a href="komputer.php">
Kembali
</a>
</form>
