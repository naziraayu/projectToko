<?php
require ("koneksi.php");
session_start();

if (isset($_POST['btnlogin'])) {
    $notelp=$_POST['txt_telp'];
    $pass=$_POST['txt_pass'];
    if (!empty(trim($notelp))) {
        if (!empty(trim($pass))) {
          $query="select * from user where no_telepon='$notelp' and password='$pass'";
          $result=mysqli_query($koneksi, $query);
          $num=mysqli_num_rows($result);
          if ($num != 0) {
            $row=mysqli_fetch_assoc($result);
            $id_user= $row['id_user'];
            $akses=$row['akses'];
            $telp=$row['no_telepon'];
            $pw=$row['password'];
            if ($notelp == $telp) {
              if ($pw == $pass) {
                if ($akses=='supplier') {
                  ?>
                    <script>
                      alert("Berhasil login sebagai Supplier");
                    </script>
                  <?php
                  header('location: ../stokEtalase/stokEtalase.php?id_supplier='.urlencode($id_user));
                  exit();
                } else if ($akses=='owner') {
                  ?>
                    <script>
                      alert("Berhasil login sebagai Owner");
                    </script>
                  <?php
                  header('location:../dashboard/dashboard.php');
                  exit;
                }
              }else {
                ?>
                  <script>alert("Password yang and masukkan salah");</script>
                <?php
              }
            }else {
              ?>
                <script>alert("No. Telepon yang anda masukkan salah");</script>
              <?php
            }
          }else {
            ?>
              <script>alert("Akun anda belum terdaftar");</script>
            <?php
          }
        }else {
          ?>
            <script>alert("Kolom Password harus terisi");</script>
          <?php
        }
    }else {
      ?>
        <script>alert("Kolom No. Telepon harus terisi");</script>
      <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link 
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <div class="open">
      <img src="../img/Group 175.png" alt="">
    </div>
    <header>
      <div class="head">
        <div class="nav">
          <a href="../login/login.php">Login</a>
          <img src="../img/Ellipse 1.png" alt="" />
        </div>
      </div>
    </header>
    <section>
      <div class="container">
        <div class="form">
          <form action="login.php" method="post" >
            <h2>SELAMAT DATANG</h2>
            <p>Masukkan nomor telepon dan password anda</p>
            <div class="input-container">
              <input
                type="telp" name="txt_telp" placeholder="No. Telephone"/>
            </div>
            <div class="input-container">
              <input type="password" name="txt_pass" placeholder="Password" />
            </div>
            <div class="forgot">
              <span>Lupa Password? Klik <a href="../lupaPassword/lupaPassword.php">di sini</a></span>
            </div>
            <div>
              <button type="submit" name="btnlogin">Login</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <!-- <div class="footer">
      <div class="contact-us">
        <img src="../img/Ellipse 1.png" alt="logo" />
      </div>
      <div class="content">
        <h3 class="ctc">Kontak Kami</h3>
        <div class="wa">
          <img src="../img/whatsapp_5968841.png" alt="wa" width="30px" />
          <p>+62 810-00557-22/ +62 851-5629-6848</p>
        </div>
        <div class="ig">
          <img src="../img/instagram_2111463.png" alt="ig" width="30px" />
          <p>@brownies_nfriends</p>
        </div>
        <div class="fb">
          <img src="../img/facebook_5968764.png" alt="fb" width="30px" />
          <p>brownies_nfriends</p>
        </div>
      </div>
    </div> -->
  </body>
</html>
