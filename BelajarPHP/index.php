<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

<?php
    
    $nama = "budi";
    $umur = 25;
    $sudahmenikah = false;


    if ($sudahmenikah == true){
        echo "sudah menikah";
    } else {
        echo "belum menikah";
    }

    for ($i = 1; $i <= 10; $i+=2){
        echo "<br>";
        echo "Putaran ke- " . $i;
    }

    echo "<br>";
    echo "<br>";

    $totalbelanja = 100000;
    $diskon = 0.10;

    if ($totalbelanja >= 100000) {
       $hargadiskon =  $totalbelanja * $diskon;
       $hargasetelahdiskon = $totalbelanja - $hargadiskon;
       echo "total belanja anda " . $totalbelanja;
        echo "<br>";
       echo " anda mendapatkan diskon " . $diskon;
        echo "<br>";
        echo "anda mendapatkan potongan sebesar " . $hargadiskon;
         echo "<br>";
       echo "total belanja anda adalah " . $hargasetelahdiskon;
    }else {
       echo $totalbelanja;
    }

    $userasli = "admin";
    $passasli = "rahasia123";

    $inputuser = "admin";
    $inputpass = "rahasia123";

    echo "<br>";
    echo "<br>";
    
    $mhs=['deni', 'sindi', 'deka'];
    $datamhs=["nama" => "Merry", "umur" => 20, "kelas" =>"A", "prodi" =>"BD"];
    // echo "nama saya" , $datamhs[nama];
    echo $mhs[1];

    echo "<br>";
    echo "<br>";
    function perkalian ($angka1, $angka2){
        return $angka1 * $angka2;
    }

    $hasil = perkalian(20,10);
        echo  $hasil;

    ?>

</body>

</html>