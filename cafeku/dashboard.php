<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - CafeKu</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }

        .navbar {
            background-color: #333;
            padding: 15px;
            display: flex;
            justify-content: space-between;
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
            text-align: center;
            margin-top: 100px;
        }

        .menu {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 30px;
        }

        .menu a {
            display: block;
            width: 150px;
            padding: 30px 20px;
            background-color: white;
            color: #333;
            text-decoration: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .menu a:hover {
            background-color: #eee;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <!-- Tombol keluar -->
        <a href="index.php">Keluar</a>

        <!-- Tombol logout -->
        <a href="index.php">Logout</a>
    </div>


    <div class="container">

        <h1>Dashboard CafeKu</h1>
        <p>Selamat datang di Dashboard CafeKu</p>

        <div class="menu">

            <!-- Menu Pengguna -->
            <a href="api/pengguna/selectpengguna.php">
                <h2>Pengguna</h2>
                <p>Kelola data pengguna</p>
            </a>

            <!-- Menu Produk -->
            <a href="api/produk/selectproduk.php">
                <h2>Produk</h2>
                <p>Kelola data produk</p>
            </a>

        </div>

    </div>

</body>

</html>