<?php
include('koneksi.php');

$query="SELECT * FROM pengguna where del = 0 AND id=?";
$stmt = mysqli_prepare($conn, $query);

if ($stmt) {
    $id=$_GET['id'];
    mysqli_stmt_bind_param($stmt,'i',$id);
    
    if (mysqli_stmt_execute($stmt)) {

        $result = mysqli_stmt_get_result($stmt);
        if(mysqli_num_rows($result)>0){
            $datas = array();
            while($row = mysqli_fetch_assoc($result)){
                $datas[] = $row;
            }
        }else{
            echo 'Data Kosong';
        }
    } else {
        echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
    }

} else {
echo json_encode(['STATUS'=>'GAGAL', 'PESAN'=>'MASALAH KONEKSI','DATA'=>[]]);
}
?>