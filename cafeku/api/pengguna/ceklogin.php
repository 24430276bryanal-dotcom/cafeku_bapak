<?php
include('koneksi.php');

//saat menggunakan POST
//$data = json_decode(file_get_contents('php://input'), true);

$query="SELECT * FROM pengguna where del = 0 and username = ? and password = ?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    mysqli_stmt_bind_param($stmt,'ss',$username,$password);

    if (mysqli_stmt_execute($stmt)) {
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result)>0){
            //header("Location: ../../dashboard.php");
            echo "<script>
                  alert('Selamat datang');
                  window.location.href='../../dashboard.php';
            </script>";
            //echo "ada data";
        }else{
            //header("Location: ../../index.php");
            echo "<script>
                  alert('Username dan Password Salah');
                  window.location.href='../../index.php';
            </script>";
            //echo "data kosong";
        }
    } else {
        echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
    }

} else {
echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}
?>