<?php
include('koneksi.php');

/* 
   Jika menerima POST, berarti proses update
*/
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $data = json_decode(file_get_contents('php://input'), true);

    $query = "UPDATE pengguna SET nama = ?, alamat = ?, nohp = ? WHERE id = ?";

    $stmt = mysqli_prepare($conn, $query);

    if ($stmt) {

        $nama = $data['nama'];
        $alamat = $data['alamat'];
        $nohp = $data['nohp'];
        $id = $data['id'];

        mysqli_stmt_bind_param($stmt, 'sssi', $nama, $alamat, $nohp, $id);

        if (mysqli_stmt_execute($stmt)) {

            echo json_encode([
                'STATUS' => 'BERHASIL',
                'PESAN' => 'DATA PENGGUNA BERHASIL DIUPDATE',
                'DATA' => []
            ]);

        } else {

            echo json_encode([
                'STATUS' => 'GAGAL',
                'PESAN' => 'DATA PENGGUNA GAGAL DIUPDATE',
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


/*
   Jika GET, ambil data pengguna berdasarkan ID
*/
$id = $_GET['id'];

$query = "SELECT * FROM pengguna WHERE id = ? AND del = 0";

$stmt = mysqli_prepare($conn, $query);

mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);


/*
   Jika data tidak ditemukan
*/
if (!$data) {
    echo "Data pengguna tidak ditemukan.";
    exit;
}

?>


<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Pengguna - CafeKu</title>


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

        <h1>Edit Pengguna</h1>


        <form id="formEdit">


            <input
                type="hidden"
                id="id"
                value="<?php echo $data['id']; ?>"
            >


            <label>Nama</label>

            <input
                type="text"
                id="nama"
                value="<?php echo htmlspecialchars($data['nama']); ?>"
                required
            >


            <label>Alamat</label>

            <input
                type="text"
                id="alamat"
                value="<?php echo htmlspecialchars($data['alamat']); ?>"
                required
            >


            <label>No. HP</label>

            <input
                type="text"
                id="nohp"
                value="<?php echo htmlspecialchars($data['nohp']); ?>"
                required
            >


            <button type="submit">
                Simpan Perubahan
            </button>


        </form>


        <a href="selectpengguna.php" class="batal">
            Batal
        </a>

    </div>



<script>

document.getElementById("formEdit").addEventListener("submit", function(e) {

    e.preventDefault();


    const data = {

        id: document.getElementById("id").value,

        nama: document.getElementById("nama").value,

        alamat: document.getElementById("alamat").value,

        nohp: document.getElementById("nohp").value

    };


    fetch("updatepengguna.php", {

        method: "POST",

        headers: {
            "Content-Type": "application/json"
        },

        body: JSON.stringify(data)

    })


    .then(response => response.json())


    .then(result => {

        if (result.STATUS === "BERHASIL") {

            alert("Data pengguna berhasil diupdate!");

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