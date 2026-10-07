<?php
include('koneksi.php');

$query = "SELECT * FROM pengguna WHERE del = 0";
$stmt = mysqli_prepare($conn, $query);

$data = [];

if ($stmt) {
    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Pengguna - CafeKu</title>

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
            width: 90%;
            margin: 40px auto;
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h1 {
            margin-top: 0;
        }

        .btn-tambah {
            display: inline-block;
            background-color: #333;
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .btn-tambah:hover {
            background-color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .btn-edit {
            background-color: #3498db;
            color: white;
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 4px;
        }

        .btn-hapus {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 6px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-edit:hover {
            background-color: #2980b9;
        }

        .btn-hapus:hover {
            background-color: #c0392b;
        }

        .kosong {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <a href="../../dashboard.php">← Dashboard</a>
    </div>

    <div class="container">

        <h1>Data Pengguna</h1>

        <a href="insertpengguna.php" class="btn-tambah">
            + Tambah Pengguna
        </a>

        <?php if (count($data) > 0) { ?>

            <table>

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th>Alamat</th>
                        <th>No. HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($data as $row) { ?>

                        <tr>

                            <td>
                                <?php echo htmlspecialchars($row['id']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['nama']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['username']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['alamat']); ?>
                            </td>

                            <td>
                                <?php echo htmlspecialchars($row['nohp']); ?>
                            </td>

                            <td>

                                <a
                                    href="updatepengguna.php?id=<?php echo $row['id']; ?>"
                                    class="btn-edit"
                                >
                                    Edit
                                </a>

                                <form
                                    action="deletepengguna.php"
                                    method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Yakin ingin menghapus pengguna ini?');"
                                >

                                    <input
                                        type="hidden"
                                        name="id"
                                        value="<?php echo $row['id']; ?>"
                                    >

                                    <button
                                        type="submit"
                                        class="btn-hapus"
                                    >
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>

        <?php } else { ?>

            <div class="kosong">
                Data pengguna masih kosong.
            </div>

        <?php } ?>

    </div>

</body>
</html>