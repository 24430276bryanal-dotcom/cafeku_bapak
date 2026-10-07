<?php

include('koneksi.php');

$id = $_POST['id'];

$query = "UPDATE pengguna SET del = 1, dtm = NOW() WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {

    mysqli_stmt_bind_param($stmt, "i", $id);

    if (mysqli_stmt_execute($stmt)) {

        // Kembali ke halaman data pengguna
        header("Location: selectpengguna.php");
        exit;

    } else {

        echo "Gagal menghapus data";

    }

} else {

    echo "Gagal menyiapkan query";

}

?>