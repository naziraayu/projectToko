<?php 
require("../login/koneksi.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <title>Profil</title>
    <link rel="stylesheet" href="lihatProfil.css"/>
</head>
<body>
</head>
<body>
    <header>
        <?php
            $nama=$_GET['nama'];
            $id=$_GET['id_supplier'];
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
                    <p><?php echo $nama;?><br> <span class="Keterangan">Supplier</span></p>
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
                                $alamat=$row['alamat'];
                                $no_telp=$row['no_telepon'];
                                $foto=$row['photo_profile'];
                                $id=$row['id_user'];
                                $akses=$row['akses'];
                                $foto=$row['photo_profile'];
                                ?>
    <div class="wrapper">
        <div class="img"><img src="../gambar/<?php echo $foto; ?>" width="100" height="150" alt=""></div>
        <div class="teks"><?php echo $nama; ?> <span class="ket"><?php echo $akses; ?></span></div>
    </div>
    <header2>
        <div class="head2">
          <div class="nav2"> 
                <ul>
                    <li class="stok"><a href="../editProfil/lihatProfil.php?id_supplier=<?php echo $id; ?>&nama=<?php echo $nama;?>">Lihat Profil</a></li>
                    <li class="pes"><a href="../editProfil/editProfil.php?id_supplier=<?php echo $id; ?>&nama=<?php echo $nama;?>">Edit Profile</a></li>
                    <li class="pen"><a href="../editProfil/gantiPassword.php?id_supplier=<?php echo $id; ?>&nama=<?php echo $nama;?>">Ganti Password</a></li>
                </ul>
            </div> 
            <div class="container">
                <div class="title">Detail Profile</div>
                <div class="content">
                    <form action="lihatProfile.php" action="post" enctype="multipart/form-data">
                        <div class="box">
                            <span class="details"> Nama </span>
                            <input type="text" name="txt_nama" id="txt_nama" required="" readonly>
                        </div>
                        <div class="box">
                            <span class="details"> Alamat </span>
                            <input type="text" name="txt_alamat" id="txt_alamat" required="" readonly>
                        </div>
                        <div class="box">
                            <span class="details"> No. Telephone </span>
                            <input type="text" name="txt_noTelp" id="txt_noTelp" required="" readonly>
                        </div>
                        <div class="box">
                            <input type="hidden" name="txt_id" id="txt_id" placeholder="Id" >
                        </div>
                                <script>
                                    document.getElementById('txt_nama').value="<?php echo $nama;?>";
                                    document.getElementById('txt_alamat').value="<?php echo $alamat;?>";
                                    document.getElementById('txt_noTelp').value="<?php echo $no_telp;?>";
                                    document.getElementById('txt_id').value="<?php echo $id;?>";
                                </script>
                        <?php
                            }
                        }
                    ?>           
                    </form>
                </div>
            </div>
            <!-- <div class="wrapper1">
                <div>
                <button class="button1"type="submit1" name="proses">Simpan Profile</button>
                </div> -->
        </div>
</header2>
</body>
</html>