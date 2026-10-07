<?php
include('koneksi.php');

// Jika menerima POST, proses simpan data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    $query = "INSERT INTO pengguna(nama, alamat, nohp) VALUES (?,?,?)";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {

        $nama = $data['nama'];
        $alamat = $data['alamat'];
        $nohp = $data['nohp'];

        mysqli_stmt_bind_param($stmt, 'sss', $nama, $alamat, $nohp);

        if (mysqli_stmt_execute($stmt)) {

            echo json_encode([
                'STATUS' => 'BERHASIL',
                'PESAN' => 'DATA BERHASIL DISIMPAN',
                'DATA' => []
            ]);

        } else {

            echo json_encode([
                'STATUS' => 'GAGAL',
                'PESAN' => 'DATA GAGAL DISIMPAN',
                'DATA' => []
            ]);
        }

    } else {

        echo json_encode([
            'STATUS' => 'GAGAL',
            'PESAN' => 'MASALAH KONEKSI',
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

    <title>Tambah Pengguna - CafeKu</title>

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
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #555;
        }

        .batal {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #333;
            text-decoration: none;
        }

    </style>

</head>


<body>

    <div class="navbar">

        <a href="selectpengguna.php">
            ← Kembali
        </a>

    </div>


    <div class="container">

        <h1>Tambah Pengguna</h1>


        <form id="formTambah">

            <label>Nama</label>

            <input
                type="text"
                id="nama"
                placeholder="Masukkan nama"
                required
            >


            <label>Alamat</label>

            <input
                type="text"
                id="alamat"
                placeholder="Masukkan alamat"
                required
            >


            <label>No. HP</label>

            <input
                type="text"
                id="nohp"
                placeholder="Masukkan nomor HP"
                required
            >


            <button type="submit">
                Simpan Pengguna
            </button>

        </form>


        <a href="selectpengguna.php" class="batal">
            Batal
        </a>

    </div>


    <script>

        document.getElementById("formTambah").addEventListener("submit", function(e) {

            e.preventDefault();


            const data = {

                nama: document.getElementById("nama").value,

                alamat: document.getElementById("alamat").value,

                nohp: document.getElementById("nohp").value

            };


            fetch("insertpengguna.php", {

                method: "POST",

                headers: {
                    "Content-Type": "application/json"
                },

                body: JSON.stringify(data)

            })


            .then(response => response.json())


            .then(result => {

                if (result.STATUS === "BERHASIL") {

                    alert("Data pengguna berhasil disimpan!");

                    window.location.href = "selectpengguna.php";

                } else {

                    alert(result.PESAN);

                }

            })


            .catch(error => {

                alert("Terjadi kesalahan.");

                console.error(error);

            });

        });

    </script>

</body>

</html>