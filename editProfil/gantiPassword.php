<?php
require("../login/koneksi.php");
session_start();
if (isset($_POST['proses'])) {
    $pwLama=$_POST['Pass_baru'];
    $konfirmPW=$_POST['konfirm_pass'];
    $id_txt=$_POST['txt_id'];
    $nama=$_POST['nama'];
    if ($pwLama == $konfirmPW) {
        $query="update user set password='$konfirmPW' where id_user='$id_txt'";
        $result=mysqli_query($koneksi, $query);
        ?>
        <script>
            alert("berhasil mengubah password");
            window.location.href="gantiPassword.php?id_supplier=<?php echo $id_txt; ?>&nama=<?php echo $nama;?>";
        </script>
        <?php
    }else {?>
        <script>
            alert("gagal mengubah password");
            window.location.href="gantiPassword.php?id_supplier=<?php echo $id_txt; ?>&nama=<?php echo $nama;?>";
        </script>
    <?php }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <title>gantiPassword</title>
    <link rel="stylesheet" href="gantiPassword.css"/>
</head>
<body>
</head>
<body>
    <header>
    <?php
    $id=$_GET['id_supplier'];
    $nama=$_GET['nama'];
    ?>
        <div class="head">
          <div class="nav">
            <img src="../img/Ellipse 1.png" alt="logo" />
                <ul>
                    <li class="stok"><a href="../stokEtalase/stokEtalase.php?id_supplier=<?php echo $id;?>&nama=<?php echo $nama;?>">STOK ETALASE</a></li>
                    <li class="pes"><a href="../pesananSaya/hariIni.php?id_supplier=<?php echo $id;?>&nama=<?php echo $nama;?>">PESANAN SAYA</a></li>
                    <li class="pen"><a href="../pendapatan/pendapatan.php?id_supplier=<?php echo $id;?>&nama=<?php echo $nama;?>">PENDAPATAN</a></li>
                </ul>
            </div> 
        </div>
    </header>
    <div class="selector">
        <div id="selectetField">
          <p id="selectText"><?php echo $nama;?></p>
          <img src="../img/Vector.svg" alt="profile">
          <img src="../img/Vector1.png" alt="profile">
        </div>
        <div class="selector-list">
            <ul id="list" class="hide">
                <li class="options1">
                    <p><?php echo $nama;?> <br> <span class="Keterangan">Supplier</span></p>
                </li>
                <li class="options">
                    <img src="../img/Vector(3).png" alt="profile2">
                    <a href="../editProfil/lihatProfil.php?id_supplier=<?php echo $id;?>&nama=<?php echo $nama;?>">Profil Saya</a>
                </li>
                <li class="options">
                    <img src="../img/Pengaturan.png" alt="pengaturan">
                    <a href="../editProfil/editProfil.php?id_supplier=<?php echo $id;?>&nama=<?php echo $nama;?>">Edit Profil</a>
                </li>
                <li class="options">
                    <img src="../img/logout.png" alt="logout">
                    <a href="../login/login.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    <script>
        var selectetField = document.getElementById("selectetField");
        var selectText = document.getElementById("selectText");
        var options = document.querySelectorAll(".options");
        var list = document.getElementById("list");
        
        selectetField.addEventListener("click", function() {
            list.classList.toggle("hide");
        });
        
        options.forEach(option => {
            option.addEventListener("click", function() {
                selectText.textContent = this.textContent;
                list.classList.toggle("hide");
            });
        });
        
        
        
        </script>
                    <?php
                        if(isset($_GET['id_supplier'])){
                            $id=$_GET['id_supplier'];
                            $query="select * from user where id_user='$id'";
                            $result=mysqli_query($koneksi, $query);
                            while($row=mysqli_fetch_array($result)){
                                $nama=$row['nama'];
                                $id=$row['id_user'];
                                $akses=$row['akses'];
                                $foto=$row['photo_profile'];
                                $password=$row['password'];
                            ?>
    <div class="wrapper">
        <div class="img"><img src="../gambar/<?php echo $foto; ?>" width="100" height="150" alt=""></div>
        <div class="teks"><?php echo $nama; ?> <span class="ket"><?php echo $akses; ?></span></div>
    </div>
    <header2>
        <form action="gantiPassword.php" method="post" enctype="multipart/form-data">
        <div class="head2">
            <div class="nav2"> 
                <ul>
                    <li class="stok"><a href="../editProfil/lihatProfil.php?id_supplier=<?php echo $id; ?>&nama=<?php echo $nama;?>">Lihat Profil</a></li>
                    <li class="pes"><a href="../editProfil/editProfil.php?id_supplier=<?php echo $id; ?>&nama=<?php echo $nama;?>">Edit Profile</a></li>
                    <li class="pen"><a href="../editProfil/gantiPassword.php?id_supplier=<?php echo $id; ?>&nama=<?php echo $nama;?>">Ganti Password</a></li>
                </ul>
            </div> 
            <div class="container">
                <div class="title">Ganti Password</div>
                <div class="content">
                        <div class="box">
                            <span class="details"> Password Lama  </span>
                            <input type="password" name="txt_PWLama" id="txt_PWLama">
                            <img src="../img/mata.png" alt="hide" onclick="togglePasswordVisibility('txt_PWLama')">                       
                        </div>
                        <div class="box">
                            <span class="details"> Password Baru  </span>
                            <input type="password" name="Pass_baru" id="Pass_baru">
                            <img src="../img/mata.png" alt="hide" onclick="togglePasswordVisibility('Pass_baru')">
                        </div>
                        <div class="box">
                            <span class="details"> Konfirmasi Password Baru </span>
                            <input type="text" name="konfirm_pass" id="konfirm_pass">
                            <img src="../img/mata.png" alt="hide" onclick="togglePasswordVisibility('konfirm_pass')">
                        </div>
                        <div class="box">
                            <input type="hidden" name="txt_id" id="txt_id" placeholder="Id" >
                        </div>
                        <div class="box">
                            <input type="hidden" name="nama" id="nama" placeholder="Id" >
                        </div>
                </div>
            </div>
            <div class="wrapper1">
                <div>
                <button class="button1" type="submit" name="proses">Simpan Password</button>
                </div>
        </div>
        <script>
            document.getElementById('txt_PWLama').value="<?php echo $password;?>";
            document.getElementById('txt_id').value="<?php echo $id;?>";
            document.getElementById('nama').value="<?php echo $nama;?>";
        </script>
            <?php
                    }
                }
            ?>           
        </form>
</header2>
<script>
    function togglePasswordVisibility(inputId) {
    const passwordInput = document.getElementById(inputId);
    const passwordIcon = document.querySelector(`#${inputId} + .details img`);

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordIcon.src = "../img/mata-slash.png"; // Ganti dengan ikon mata tersembunyi
    } else {
        passwordInput.type = "password";
        passwordIcon.src = "../img/mata.png"; // Ganti dengan ikon mata tampil
    }
}

</script>
</body>
</html>
