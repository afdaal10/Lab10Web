<?php 
include "config.php";

$merk  = $_POST['merk'];
$warna = $_POST['warna'];

$mobil = new Mobil($merk, $warna);
?>

<h3>Data Mobil</h3>
<p><?= $mobil->info(); ?></p>

<a href="form.php">Kembali</a>
