<?php
require("../login/koneksi.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password</title> 
    <link rel="stylesheet" href="lupaPasswordd.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
</head>
<body>
    <div class="open">
        <img src="../img/Group 175.png" alt="">
    </div>
    <header>
        <div class="head">
            <div class="nav">
                <a href="../login/login.html">Login</a>
                <img src="../img/Ellipse 1.png" alt="" />
            </div>
        </div>
    </header>
    <section>
        <div class="container">
            <div class="form">
                <h2>LUPA PASSWORD</h2>
                <p>Masukkan nomor telepon anda</p>
                <div class="wrapper">
                    <div class="input-container">
                        <input type="telp" id="txt_telp" name="txt_telp" placeholder="Masukkan No. Telephone"/>
                        <button type="submit" name="cekTelp" onclick="cekTelp()">CEK</button>
                        <script>
                            function cekTelp() {
                                var telp=document.getElementById('txt_telp').value;
                                var url="lupaPassword.php?no_telp=" + encodeURIComponent(telp);
                                window.location.href=url;
                            }
                        </script>
                    </div>
                    <div class="input-container1">
                            <input type="text" id="txt_pertanyaan" name="txt_pertanyaan" placeholder="Pertanyaan"/>
                    </div>
                    <div class="input-container">
                        <input type="text" id="txt_jawaban" name="txt_jawaban" placeholder="Masukkan Jawaban"/>
                        <button type="submit" name="cekJawaban" onclick="cekJawaban()">CEK</button>
                        <script>
                            function cekJawaban() {
                                var telp=document.getElementById('txt_telp').value;
                                var tanya=document.getElementById('txt_pertanyaan').value;
                                var jawab=document.getElementById('txt_jawaban').value;
                                var url="lupaPassword.php?no_telp=" + encodeURIComponent(telp) + "&jawaban=" + encodeURIComponent(jawab) + "&pertanyaan=" + encodeURIComponent(tanya);
                                window.location.href=url;
                            }
                        </script>
                    </div>
                    <div class="input-pw">
                        <input type="text" id="password" name="password" placeholder="Password"/>
                        <label for="password" class="label">Password kamu adalah</label>
                    </div>
                    <div class="button">
                        <button type="submit" name="backLogin" onclick="backToLogin()" >KEMBALI KE LOGIN</button>
                    </div>
                    <script>
                        function backToLogin() {
                            window.location.href="../login/login.php";
                        }
                    </script>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php
    if ($_GET['no_telp']) {
        $no=$_GET['no_telp'];
        $query="select * from user where no_telepon='$no'";
        $result=mysqli_query($koneksi, $query);
            if (mysqli_num_rows($result) != 0) {
                $row=mysqli_fetch_array($result);
                $noTelp=$row['no_telepon'];
                $pertanyaan=$row['pertanyaan'];
                ?>
                <script>
                    document.getElementById("txt_telp").value="<?php echo $noTelp; ?>";
                    document.getElementById("txt_pertanyaan").value="<?php echo $pertanyaan; ?>";
                </script>
                <?php
            }else {
                ?>
                     <script> alert("No. Telepon yang anda masukkan salah atau belum terdaftar") </script>
                <?php
            }   
    }
    if ($_GET['no_telp'] && $_GET['jawaban'] && $_GET['pertanyaan']) {
        $no=$_GET['no_telp'];
        $jwban=$_GET['jawaban'];
        $query="select * from user where no_telepon='$no' and jawaban='$jwban'";
        $result=mysqli_query($koneksi, $query);
        if (mysqli_num_rows($result) != 0) {
            $row=mysqli_fetch_array($result);
            $noTelp=$row['no_telepon'];
            $pertanyaan=$row['pertanyaan'];
            $jawaban=$row['jawaban'];
            $pass=$row['password'];
            ?>
            <script>
                document.getElementById("txt_telp").value="<?php echo $noTelp; ?>";
                document.getElementById("txt_pertanyaan").value="<?php echo $pertanyaan; ?>";
                document.getElementById("txt_jawaban").value="<?php echo $jawaban; ?>";
                document.getElementById("password").value="<?php echo $pass; ?>";
            </script>
            <?php
        }else {
            ?>
                <script> alert("akun anda tidak ditemukan") </script>
            <?php
        }
    }
?>