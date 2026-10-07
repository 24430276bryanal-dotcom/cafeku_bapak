<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <style>
      body {
        margin: 0;
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

      .judul {
        font-size: 20px;
        font-weight: bold;
      }

      .promo {
        height: 20dvh;
        width: 80dvw;

        display: flex;
        flex-direction: row;
        justify-content: space-around;
        align-items: center;
      }
      .section {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        gap: 10px;
        font-weight: bold;
      }

      .tombol {
        background-color: burlywood;
        padding: 10px 80px 10px 80px;
        border-radius: 10px;
        border-color: transparent;
        font-weight: bold;
      }
    </style>
  </head>
  <body>
    <div class="body">
      <form action="api/pengguna/ceklogin.php" method="post">
      <div class="card">
        <img src="assets/logo.png" width="150px" />
        <p class="judul">My Son Coffee</p>
          <input name='username' class="inputuser" type="text" placeholder="Username" />
          <input name='password' class="inputuser" type="password" placeholder="Password" />
          <button class="tombol">LOGIN</button>
      </div>
      </form>
      <div class="promo">
        <div class="section">
          <img src="assets/whatsapp.png" width="60px" />
          <p>08565xxxxxxx</p>
        </div>
        <div class="section">
          <img src="assets/instagram.png" width="60px" />
          <p>My Son Coffee</p>
        </div>
        <div class="section">
          <img src="assets/tik-tok.png" width="60px" />
          <p>My Son Coffee</p>
        </div>
      </div>
    </div>
  </body>
</html>
