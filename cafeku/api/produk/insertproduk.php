<?php
include('koneksi.php');

// Jika data dikirim menggunakan POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    $nama = $data['nama'];
    $harga = $data['harga'];
    $stok = $data['stok'];

    $query = "INSERT INTO produk(nama, harga, stok) VALUES (?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, 'sii', $nama, $harga, $stok);

        if (mysqli_stmt_execute($stmt)) {

            echo json_encode([
                'STATUS' => 'BERHASIL',
                'PESAN' => 'DATA PRODUK BERHASIL DISIMPAN',
                'DATA' => []
            ]);

        } else {

            echo json_encode([
                'STATUS' => 'GAGAL',
                'PESAN' => 'DATA GAGAL DISIMPAN: ' . mysqli_stmt_error($stmt),
                'DATA' => []
            ]);
        }

    } else {

        echo json_encode([
            'STATUS' => 'GAGAL',
            'PESAN' => 'QUERY GAGAL: ' . mysqli_error($conn),
            'DATA' => []
        ]);
    }

    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk - CafeKu</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }

        .navbar {
            background-color: #333;
            padding: 15px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
        }

        .navbar a:hover {
            background-color: #555;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin-top: 15px;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button,
        .batal {
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        button {
            background-color: #333;
            color: white;
        }

        button:hover {
            background-color: #555;
        }

        .batal {
            background-color: #ccc;
            color: black;
        }

        .batal:hover {
            background-color: #aaa;
        }

    </style>
</head>

<body>

    <div class="navbar">
        <a href="selectproduk.php">← Kembali</a>
    </div>

    <div class="container">

        <h1>Tambah Produk</h1>

        <form id="formProduk">

            <label>Nama Produk</label>
            <input type="text" id="nama" placeholder="Masukkan nama produk" required>

            <label>Harga</label>
            <input type="number" id="harga" placeholder="Masukkan harga" required>

            <label>Stok</label>
            <input type="number" id="stok" placeholder="Masukkan stok" required>

            <button type="submit">Simpan</button>

            <a href="selectproduk.php" class="batal">Batal</a>

        </form>

    </div>

<script>

document.getElementById("formProduk").addEventListener("submit", function(e) {

    e.preventDefault();

    const data = {
        nama: document.getElementById("nama").value,
        harga: document.getElementById("harga").value,
        stok: document.getElementById("stok").value
    };

    fetch("insertproduk.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })

    .then(response => response.text())

    .then(result => {

        console.log(result);

        try {

            const data = JSON.parse(result);

            if (data.STATUS == "BERHASIL") {

                alert(data.PESAN);
                window.location.href = "selectproduk.php";

            } else {

                alert(data.PESAN);

            }

        } catch (error) {

            alert("Berhasil Menambahkan Produk:\n\n");

        }

    })

    .catch(error => {

        // alert("Terjadi kesalahan koneksi");
        // console.log(error);

    });

});

</script>

</body>
</html>