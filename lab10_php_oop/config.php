<?php
class Mobil {
    public $merk;
    public $warna;

    public function __construct($merk, $warna) {
        $this->merk = $merk;
        $this->warna = $warna;
    }

    public function info() {
        return "Mobil merk: $this->merk, warna: $this->warna";
    }
}
?>
