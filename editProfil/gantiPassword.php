<?php
require("../login/koneksi.php");
if (isset($_POST['proses'])) {
    $pwLama=$_POST['Pass_baru'];
    $konfirmPW=$_POST['konfirm_pass'];
    $id=$_POST['txt_id'];
    if ($pwLama == $konfirmPW) {
        $query="update user set password='$konfirmPW' where id_user='$id'";
        $result=mysqli_query($koneksi, $query);
        ?>
        <script>
            alert("berhasil mengubah password");
            window.location.href="gantiPassword.php?id_supplier=<?php echo $id; ?>";
        </script>
        <?php
    }else {?>
        <script>
            alert("gagal mengubah password");
            window.location.href="gantiPassword.php?id_supplier=<?php echo $id; ?>";
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
        <div class="head">
          <div class="nav">
            <img src="../img/Ellipse 1.png" alt="logo" />
                <ul>
                    <li class="stok"><a href="../stokEtalase/stokEtalase.html">STOK ETALASE</a></li>
                    <li class="pes"><a href="../pesananSaya/kemarin.html">PESANAN SAYA</a></li>
                    <li class="pen"><a href="../pendapatan/pendapatan.html">PENDAPATAN</a></li>
                </ul>
            </div> 
        </div>
    </header>
    <div class="selector">
        <div id="selectetField">
          <p id="selectText">NURUL HIDAYAH</p>
          <img src="../img/Vector.svg" alt="profile">
          <img src="../img/Vector1.png" alt="profile">
        </div>
        <div class="selector-list">
        <ul id="list" class="hide">
          <li class="options1">
            <p>Nurul Hidayah <br> <span class="Keterangan">Supplier</span></p>
          </li>
          <li class="options">
            <img src="../img/Vector(3).png" alt="profile2">
            <p>Profil Saya</p>
          </li>
          <li class="options">
            <img src="../img/Pengaturan.png" alt="pengaturan">
            <p>Edit Profile</p>
          </li>
          <li class="options">
            <img src="../img/logout.png" alt="logout">
            <p>Logout</p>
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
                    <li class="stok"><a href="../editProfil/lihatProfile.php?id_supplier=<?php echo $id; ?>">Lihat Profil</a></li>
                    <li class="pes"><a href="../editProfil/editProfil.php?id_supplier=<?php echo $id; ?>">Edit Profile</a></li>
                    <li class="pen"><a href="../editProfil/gantiPassword.php?id_supplier=<?php echo $id; ?>">Ganti Password</a></li>
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