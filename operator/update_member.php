<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php

include "../koneksi.php";

$id = $_POST['id_member'];
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$saldo = $_POST['saldo'];

db_query($conn,

"UPDATE member SET

nama='$nama',
username='$username',
password='$password',
saldo='$saldo'

WHERE id_member='$id'"

);

header("Location: member.php");
