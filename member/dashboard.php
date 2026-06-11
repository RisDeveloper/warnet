<?php
session_start();
include "../koneksi.php";

if(!isset($_SESSION['id_member'])){
    header("Location: ../login_member.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard Member</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<h1>Dashboard Member</h1>

<p>
Selamat Datang
<?php echo $_SESSION['nama']; ?>
</p>

<hr>

<div class="menu">

<a href="paket.php">Pilih Paket</a>
<a href="history.php">History</a>
<a href="../logout.php">Logout</a>

</div>

</body>
</html>
