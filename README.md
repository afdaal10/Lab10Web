# PRAKTIKUM 10 – PEMROGRAMAN BERORIENTASI OBJEK (OOP PHP)

Praktikum ini bertujuan mengenalkan konsep dasar Object Oriented Programming (OOP) dalam PHP melalui contoh kelas Mobil, form input, dan pemrosesan data menggunakan object.

## 📂 STRUKTUR FOLDER

Pastikan folder berada di:

C:\xampp\htdocs\lab10_php_oop\


**Dengan isi:**

lab10_php_oop/
├── config.php
├── mobil.php
├── form.php
├── form_input.php
└── README.md

## 📄 1. FILE: config.php

Berisi kelas Mobil yang digunakan di seluruh file lain.
```php
✔ Kode:
<?php
// config.php
class Mobil {
    private $merk;
    private $warna;

    public function __construct($merk, $warna) {
        $this->merk = $merk;
        $this->warna = $warna;
    }

    public function info() {
        return "Mobil merk: {$this->merk}, warna: {$this->warna}";
    }
}
```

### ✔ Penjelasan:

- private $merk, $warna;
→ property mobil, hanya dapat diakses dari dalam class.

- construct()
→ dijalankan otomatis saat object dibuat.

- info()
→ mengembalikan teks deskripsi mobil.

## 📄 2. FILE: mobil.php

Menampilkan data mobil menggunakan class dari config.php.

```php
✔ Kode:
<?php
include "config.php";

$mobil1 = new Mobil("Toyota", "Hitam");
$mobil2 = new Mobil("Honda", "Putih");

echo "<h1>Daftar Mobil</h1>";
echo "<p>" . $mobil1->info() . "</p>";
echo "<p>" . $mobil2->info() . "</p>";
```

### ✔ Penjelasan:

- include "config.php";
→ mengimpor class Mobil.

- new Mobil()
→ membuat object mobil.

- $mobil1->info()
→ mengambil informasi dari object.

## 📄 3. FILE: form.php

Halaman yang menampilkan form input data mobil.

```php
<?php include "config.php"; ?>
<!DOCTYPE html>
<html>
<head><title>Form Input Mobil</title></head>
<body>
    <h1>Input Data Mobil</h1>

    <form action="form_input.php" method="POST">
        <label>Merk Mobil:</label><br>
        <input type="text" name="merk" required><br><br>

        <label>Warna Mobil:</label><br>
        <input type="text" name="warna" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
```

### ✔ Penjelasan:

Form dikirim ke form_input.php

Method: POST

Input: merk & warna

## 📄 4. FILE: form_input.php

Memproses input dari form dan membuat object baru.

```php
<?php
include "config.php";

$merk = $_POST['merk'];
$warna = $_POST['warna'];

$mobil = new Mobil($merk, $warna);
?>
<!DOCTYPE html>
<html>
<head><title>Hasil Input</title></head>
<body>
    <h1>Data Mobil</h1>
    <p><?php echo $mobil->info(); ?></p>

    <a href="form.php">Kembali ke Form</a>
</body>
</html>
```

### ✔ Penjelasan:

Menerima data POST dari form.

Membuat object $mobil.

Menampilkan info menggunakan ->info().



Menampilkan hasil input.
