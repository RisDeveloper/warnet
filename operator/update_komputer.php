<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php

include "../koneksi.php";

$id = $_POST['id_pc'];

$nama_pc = $_POST['nama_pc'];

$status = $_POST['status'];

db_query($conn,

"UPDATE komputer SET

nama_pc='$nama_pc',
status='$status'

WHERE id_pc='$id'"

);

header("Location: komputer.php");
