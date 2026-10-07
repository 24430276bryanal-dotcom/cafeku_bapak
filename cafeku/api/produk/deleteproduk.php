<?php
include('koneksi.php');

$id = $_POST['id'];

$query = "UPDATE produk 
          SET del = 1, dtm = NOW()
          WHERE id = ?";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {

    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {

        header("Location: selectproduk.php");
        exit;

    } else {

        echo "Gagal menghapus produk";

    }

} else {

    echo "Gagal menyiapkan query";

}
?>