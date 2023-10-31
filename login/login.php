<?php
require('koneksi.php');
if(isset($_POST['submit'])){
    $noTelp=$_POST['no.telepon'];
    $password=$_POST['password'];
    if(!empty(trim($noTelp)) && !empty(trim($password))){
        $query="select * from karyawan where no_telepon='$noTelp'";
        $result=mysqli_query($koneksi, $query);
        if($result){
            $num=mysqli_num_rows($result);
            if($num!=0){
                $row=mysqli_fetch_assoc($result);
                $id=$row['id_karyawan'];
                $nama=$row['nama_karyawan'];
                $alamat=$row['alamat'];
                $no_telp=$row['no_telepon'];
                $pertanyaan=$row['pertanyaan'];
                $jawaban=$row['jawaban'];
                $pass=$row['password'];
                $error='berhasil login';
                header('location:landingPage.php');
                exit;
            }else{
                $error='No. Telepon salah';
                header('location:login.php?error='.urlencode($error));
                exit;
            }
        }else{
            $error= 'Eksekusi query error';
            header('location:login.php?error='.urlencode($error));
            exit;
        }
    }else{
        $error='No. telepon dan Password harus diisi';
        header('location:login.php?error='.urlencode($error));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="login.css" />
  </head>
  <body>
    <header>
      <div class="head">
        <div class="nav">
          <a href="#">Login</a>
          <img src="../img/Ellipse 1.png" alt="" />
        </div>
      </div>
    </header>
    <section>
      <div class="container">
        <div class="form">
          <form action="#">
            <h2>SELAMAT DATANG</h2>
            <p>Masukkan nomor telepon dan password anda</p>
            <div class="input-container">
              <input type="tel" name="no.telepon" placeholder="No. Telephone" />
            </div>
            <div class="input-container">
              <input type="password" name="password" placeholder="Password" />
            </div>
            <div class="forgot">
              <span>Lupa Password? Klik <a href="#">di sini</a></span>
            </div>
            <div>
              <button type="submit" name="submit">Login</button>
            </div>
          </form>
        </div>
      </div>
    </section>
    <div class="footer">
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
    </div>
  </body>
</html>