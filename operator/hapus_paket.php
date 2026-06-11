<!DOCTYPE html>
<html>
<head>


<link rel="stylesheet" href="../style.css">

</head>
<body>
<?php

include "../koneksi.php";

$id = $_GET['id'];

db_query(
$conn,
"DELETE FROM paket
WHERE id_paket='$id'"
);

header("Location: paket.php");
