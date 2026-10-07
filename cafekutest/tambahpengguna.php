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

        .tombol {
            background-color: burlywood;
            padding: 10px 40px 10px 40px;
            border-radius: 10px;
            border-color: transparent;
            font-weight: bold;
        }

        .card {
            width: 500px;
            height: 400px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 1px 1px 20px grey;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .inputuser {
            padding: 10px 20px 10px 20px;
            border-radius: 10px;
            border-color: burlywood;
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
            <form action="api/pengguna/insertpengguna.php" method="post">
            <div class="card">
                <p class="judul">Form Tambah Pengguna</p>
                <input name='nama' class="inputuser" type="text" placeholder="Nama Pengguna" />
                <input name='username' class="inputuser" type="text" placeholder="Username" />
                <input name='password' class="inputuser" type="password" placeholder="Password" />
                <input name='alamat' class="inputuser" type="text" placeholder="Alamat" />
                <input name='nohp' class="inputuser" type="text" placeholder="Nomor HP" />
                <button class="tombol">Tambah Pengguna</button>
            </div>
            </form>
        </div>
    </div>
</body>
</html>