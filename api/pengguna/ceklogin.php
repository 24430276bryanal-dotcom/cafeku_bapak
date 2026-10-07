<?php
include('koneksi.php');

$query="SELECT * FROM pengguna where del = 0 and username = ? and password = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    mysqli_stmt_bind_param($stmt,'ss',$username, $password);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result)>0){
            echo "<script>
                    alert('Selamat Datang');
                    window.location.href = '../../dashboard.php';
                </script>";
        }else{
            echo "<script>
                    alert('Username dan password salah');
                    window.location.href = '../..';
                </script>";
        }
    } else {
        echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
    }

} else {
echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}
?>