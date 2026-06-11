<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php

include "../koneksi.php";

$nama_pc = $_POST['nama_pc'];

db_query($conn,

"INSERT INTO komputer
(nama_pc,status)

VALUES

('$nama_pc','Tersedia')"

);

header("Location: komputer.php");
