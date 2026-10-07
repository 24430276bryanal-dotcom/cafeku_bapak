<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            flex-direction:row;
            justify-content:center;
            align-items:center;
            gap:50px;
        }
        .card{
            width: 400px;
            height: 300px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 1px 1px 20px grey;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size:30px;
        }

        .linkcard{
            text-decoration:none;
            color:black;
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
            
            <a class='linkcard' href='pengguna.php'><div class='card'>Atur Pengguna</div></a>
            <a class='linkcard' href='produk.php'><div class='card'>Atur Produk</div></a>
        </div>
    </div>
</body>
</html>