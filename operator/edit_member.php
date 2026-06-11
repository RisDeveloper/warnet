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
"SELECT * FROM member
WHERE id_member='$id'"
);

$d = db_fetch_assoc($data);

?>

<h2>Edit Member</h2>

<form action="update_member.php" method="POST">

<input
type="hidden"
name="id_member"
value="<?php echo $d['id_member']; ?>"
>

Nama :

<input
type="text"
name="nama"
value="<?php echo $d['nama']; ?>"
>

<br><br>

Username :

<input
type="text"
name="username"
value="<?php echo $d['username']; ?>"
>

<br><br>

Password :

<input
type="text"
name="password"
value="<?php echo $d['password']; ?>"
>

<br><br>

Saldo :

<input
type="number"
name="saldo"
value="<?php echo $d['saldo']; ?>"
>

<br><br>

<button type="submit">
Update
</button>
<a href="member.php">
Kembali
</a>
</form>
