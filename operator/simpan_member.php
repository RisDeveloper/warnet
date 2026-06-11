<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php

include "../koneksi.php";

$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$saldo = $_POST['saldo'];

db_query($conn,

"INSERT INTO member
(nama,username,password,saldo)

VALUES

('$nama',
'$username',
'$password',
'$saldo')

");

header("Location: member.php");
