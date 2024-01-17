<?php
  require ("koneksi.php");
  session_start();
  $max_attempt=3;
  if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}
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
              $nama=$row['nama'];

              if ($notelp == $telp) {
                if ($pw == $pass) {
                  if ($akses=='supplier') {
                    $_SESSION['login_attempts'] = 0;
                    ?>
                      <script>
                        alert("Berhasil login sebagai Supplier");
                        window.location.href="../stokEtalase/stokEtalase.php?id_supplier=<?php echo $id_user;?>&nama=<?php echo $nama;?>";
                      </script>
                    <?php
                    exit();
                  } else if ($akses=='owner') {
                    $_SESSION['login_attempts'] = 0;
                    ?>
                      <script>
                        alert("Berhasil login sebagai Owner");
                        window.location.href="../dashboard/dashboard.php?nama=<?php echo $nama;?>";
                      </script>
                    <?php
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
              $_SESSION['login_attempts']++;
              if ($_SESSION['login_attempts'] >= $max_attempt) {
                header("location: ../lupaPassword/lupaPassword.php");
                exit();
              }
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
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      <link rel="stylesheet" href="loginn.css" />
    </head>
    <body>
      <div class="open">
        <img src="../img/Group 175.png" alt="" />
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
      </body>
  </html>