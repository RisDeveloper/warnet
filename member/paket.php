<?php
session_start();
include "../koneksi.php";

$data = db_query($conn,"SELECT * FROM paket");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../style.css">
</head>
<body>

<h2>Pilih Paket Warnet</h2>

<form action="proses_bayar.php" method="POST">

Pilih Paket :

<select name="id_paket">

<?php while($d=db_fetch_array($data)){ ?>

<option value="<?php echo $d['id_paket']; ?>">
<?php echo $d['nama_paket']; ?> - Rp <?php echo number_format($d['harga']); ?>
</option>

<?php } ?>

</select>

<br><br>

Metode Pembayaran :

<select name="metode_bayar" id="metode">
<option value="Cash">Cash</option>
<option value="QRIS">QRIS</option>
<option value="DANA">DANA</option>
</select>

<div id="info"></div>

<script>
document.getElementById("metode").onchange=function(){
let m=this.value;
if(m=="QRIS"){
document.getElementById("info").innerHTML='<h3>Scan QRIS</h3><img src="/warnet/img/qris.png" width="250">';
}else if(m=="DANA"){
document.getElementById("info").innerHTML='<h3>DANA</h3>081234567890';
}else{
document.getElementById("info").innerHTML="";
}
}
</script>

<br><br>

Pilih Komputer :

<select name="id_pc">

<?php
$komputer = db_query($conn, "SELECT * FROM komputer");
while($pc = db_fetch_array($komputer)){
?>
<option value="<?php echo $pc['id_pc']; ?>">
<?php echo $pc['nama_pc']; ?> - <?php echo $pc['status']; ?>
</option>
<?php } ?>

</select>

<br><br>

<button type="submit">Bayar</button>
<a href="dashboard.php">Kembali</a>
</form>

</body>
</html>
