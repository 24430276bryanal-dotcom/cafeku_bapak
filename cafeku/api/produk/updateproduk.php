<?php
include('koneksi.php');

// Jika data dikirim menggunakan POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    $id = $data['id'];
    $nama = $data['nama'];
    $harga = $data['harga'];
    $stok = $data['stok'];

    $query = "UPDATE produk 
              SET nama = ?, harga = ?, stok = ?
              WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {

        mysqli_stmt_bind_param($stmt, 'siii', $nama, $harga, $stok, $id);

        if (mysqli_stmt_execute($stmt)) {
            echo json_encode([
                'STATUS' => 'BERHASIL',
                'PESAN' => 'DATA PRODUK BERHASIL DIUPDATE',
                'DATA' => []
            ]);
        } else {
            echo json_encode([
                'STATUS' => 'GAGAL',
                'PESAN' => 'DATA PRODUK GAGAL DIUPDATE',
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


// Jika membuka halaman menggunakan GET
$id = $_GET['id'];

$query = "SELECT * FROM produk WHERE id = ? AND del = 0";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data produk tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - CafeKu</title>

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
        }

        button, .batal {
            margin-top: 20px;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        button {
            background-color: #333;
            color: white;
        }

        .batal {
            background-color: #ccc;
            color: black;
        }
    </style>
</head>

<body>

<div class="navbar">
    <a href="selectproduk.php">← Kembali</a>
</div>

<div class="container">

    <h1>Edit Produk</h1>

    <form id="formProduk">

        <input type="hidden" id="id" value="<?php echo $data['id']; ?>">

        <label>Nama Produk</label>
        <input type="text" id="nama"
               value="<?php echo htmlspecialchars($data['nama']); ?>"
               required>

        <label>Harga</label>
        <input type="number" id="harga"
               value="<?php echo $data['harga']; ?>"
               required>

        <label>Stok</label>
        <input type="number" id="stok"
               value="<?php echo $data['stok']; ?>"
               required>

        <button type="submit">Update</button>

        <a href="selectproduk.php" class="batal">Batal</a>

    </form>

</div>

<script>

document.getElementById("formProduk").addEventListener("submit", function(e) {

    e.preventDefault();

    const data = {
        id: document.getElementById("id").value,
        nama: document.getElementById("nama").value,
        harga: document.getElementById("harga").value,
        stok: document.getElementById("stok").value
    };

    fetch("updateproduk.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {

        if (result.STATUS == "BERHASIL") {
            alert(result.PESAN);
            window.location.href = "selectproduk.php";
        } else {
            alert(result.PESAN);
        }

    })
    .catch(error => {
        alert("Terjadi kesalahan");
        console.log(error);
    });

});

</script>

</body>
</html>