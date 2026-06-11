<?php
session_start();
include "../koneksi.php";

$id_member = $_SESSION['id_member'];
$id_paket = $_POST['id_paket'];
$id_pc = $_POST['id_pc'];
$metode_bayar = $_POST['metode_bayar'];

db_query($conn,
    "UPDATE komputer SET status='Dipakai' WHERE id_pc='$id_pc'"
);

db_query($conn,
    "INSERT INTO transaksi (id_member, id_pc, id_paket, metode_bayar)
     VALUES ('$id_member', '$id_pc', '$id_paket', '$metode_bayar')"
);

$id_transaksi = db_insert_id($conn, 'transaksi_id_transaksi_seq');

header("Location: hasil_transaksi.php?id=".$id_transaksi);
exit;
