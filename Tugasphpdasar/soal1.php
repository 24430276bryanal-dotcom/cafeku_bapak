<?php 
    $produk = "Chitato";
    $hargaproduk = 10000;
    $kodepromo = "PROMO30";

    $kodepromo = str_replace("PROMO", "", "PROMO30");
    echo "Total Diskon " . $kodepromo . "%";
    $nilaipromo = $kodepromo / 100;

    $hargapromo = $hargaproduk * $nilaipromo;
    echo "<br>";
    echo "harga asli produk " . $hargaproduk;
    echo "<br>";
    echo "Potongan untuk anda " . $hargapromo;
    echo "<br>";
    $hargafinal = $hargaproduk - $hargapromo;
    echo "Harga Final" . $hargafinal; 

?>