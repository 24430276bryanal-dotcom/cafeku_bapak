<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna</title>
    <style>
        body{
            margin:0;
        }
        .body {
            height: 100dvh;
            width: 100dvw;
            background-color: antiquewhite;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .navbar{
            height:10dvh;
            background-color:white;
            width: 96dvw;
            display:flex;
            flex-direction:row;
            align-items:center;
            justify-content:space-between;
            padding-left:20px;
            padding-right:20px;
        }

        .nav1{
            display:flex;
            flex-direction:row;
            align-items:center;
            gap:30px;
        }

        .judul{
            font-weight:bold;
        }

        .logout{
            text-decoration:none;
            padding:5px 20px 5px 20px;
            border-radius: 10px;
            background-color:red;
            color:white;
            box-shadow: 1px 1px 3px grey;
        }

        .main{
            height:90dvh;
            width: 100dvw;
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
            gap:10px;
        }

        .tabel {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow-x: auto;
        }

        .tabel th {
            background-color: #fbca60;
            color: black;
            padding: 14px 16px;
            text-align: left;
            font-size: 14px;
        }

        .tabel td {
            padding: 13px 16px;
            border-bottom: 1px solid #e5e7eb;
            color: #374151;
            font-size: 14px;
        }
        .judultabel{
            font-weight:bold;
            font-size:20px;
        }

        .linktambah{
            display:flex;
            flex-direction:row;
            width: 650px;
            text-decoration:none;
            padding:5px 20px 5px 20px;
        }

        a{
            text-decoration:none;
            padding:5px 20px 5px 20px;
            background-color:#fbca60;
            color:black;
            border-radius:10px;
        }

    </style>
</head>
<body>
    <div class='body'>
        <div class='navbar'>
            <div class='nav1'>
                <img src="assets/logo.png" alt="" width='50px'>
                <div class='judul'>CAFEKU INDONESIA</div>
            </div>
            <div class='nav2'>
                <a class='logout' href="index.php">keluar</a>
            </div>
        </div>
        <div class='main'>
            <p class='judultabel'>Daftar Pengguna</p>
            <p class='linktambah'><a href='tambahpengguna.php'>Tambah Data Pengguna</a></p>
            <?php
                include("api/pengguna/selectpengguna.php");
            ?>
            
            <table class='tabel'>
                
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Alamat</th>
                    <th>No Hp</th>
                    <th>Aksi</th>
                </tr>
                    <?php
                        for ($i=0; $i < count($datas); $i++) {     
                    ?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <td><?php echo $datas[$i]['nama'] ?></td>
                        <td><?php echo $datas[$i]['username'] ?></td>
                        <td><?php echo $datas[$i]['alamat'] ?></td>
                        <td><?php echo $datas[$i]['nohp'] ?></td>
                        <td>
                            <a href='editpengguna.php?id=<?php echo  $datas[$i]['id']; ?>'>Edit</a>
                            <a href="api/pengguna/deletepengguna.php?id=<?php echo  $datas[$i]['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
            </table>
        </div>
    </div>
</body>
</html>