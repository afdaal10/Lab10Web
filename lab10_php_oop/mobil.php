<?php
include "config.php";  // HARUS ADA

$mobil1 = new Mobil("Toyota", "Hitam");
$mobil2 = new Mobil("Honda", "Putih");

echo "<h3>Daftar Mobil</h3>";
echo $mobil1->info() . "<br>";
echo $mobil2->info() . "<br>";
?>
