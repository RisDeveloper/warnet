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
"DELETE FROM komputer
WHERE id_pc='$id'"
);

header("Location: komputer.php");
