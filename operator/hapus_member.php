<?php
include "../koneksi.php";

$id = $_GET['id'];

db_query($conn,
    "DELETE FROM transaksi WHERE id_member='$id'"
);

db_query($conn,
    "DELETE FROM member WHERE id_member='$id'"
);

echo "
<script>
alert('Data berhasil dihapus');
window.location='member.php';
</script>
";
?>
