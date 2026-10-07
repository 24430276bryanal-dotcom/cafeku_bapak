<?php
include('koneksi.php');

$query="UPDATE pengguna SET nama =? , username=?, password=?, alamat =? , nohp =? WHERE id =? ";

$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $nama=$_POST['nama'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $alamat=$_POST['alamat'];
    $nohp=$_POST['nohp'];
    $id=$_POST['id'];

    mysqli_stmt_bind_param($stmt,'sssssi',$nama, $username, $password, $alamat, $nohp, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "<script>
                    alert('Data berhasil diupdate');
                    window.location.href = '../../pengguna.php';
                </script>";
    } else {
        echo "<script>
                    alert('Data gagal ditambahkan');
                    window.location.href = '../../editpengguna.php?id=$id';
                </script>";
    }

} else {
    echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}

?>