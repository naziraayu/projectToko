<?php
require("../login/koneksi.php");
session_start();
$pic_uploaded=0;
if(isset($_POST['proses'])){
    $nama=$_POST['txt_nama'];
    $alamat=$_POST['txt_alamat'];
    $noTelp=$_POST['txt_noTelp'];
    $id=$_POST['txt_id'];

    $foto_supp=time().$_FILES['input_foto']['name'];
    if (move_uploaded_file($_FILES['input_foto']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/sibrownies/projectToko/gambar/'
          .$foto_supp)) {
            $target_file=$_SERVER['DOCUMENT_ROOT'].'/sibrownies/projectToko/gambar/'.$foto_supp;
            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picName=basename($_FILES['input_foto']['name']);
            $photo=time().$picName;
            if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
                ?>
              <script>
                alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
              </script>
              <?php
            }elseif ($_FILES['input_foto']['size'] > 2000000){
                ?>
                <script>
                  alert("Foto yang diupload tidak boleh lebih dari 2 mb");
                </script>
                <?php
              }else{
                $pic_uploaded=1;
              }
        }
        if($pic_uploaded == 1){
            $query="update user set photo_profile='$foto_supp', nama='$nama', alamat='$alamat', no_telepon='$noTelp' where id_user='$id'";
            $result=mysqli_query($koneksi, $query);
            ?>
                <script>
                alert("Berhasil mengubah profil");
                window.location.href="editProfil.php?id_supplier=<?php echo $id; ?>&nama=<?php echo $nama;?>";
                </script>
            <?php
        }else if ($pic_uploaded == 0) {   
            $query="update user set nama='$nama', alamat='$alamat', no_telepon='$noTelp' where id_user='$id'";
            $result=mysqli_query($koneksi, $query);
            ?>
                <script>
                alert("Berhasil mengubah profil");
                window.location.href="editProfil.php?id_supplier=<?php echo $id; ?>&nama=<?php echo $nama;?>";
                </script>
            <?php
        }else{
            ?>
                <script>
                alert("Gagal mengubah profil");
                </script>
                <?php
        }
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
    <title>Edit Profil</title>
    <link rel="stylesheet" href="editProfil.css"/>
</head>
<body>
</head>
<?php
    $nama=$_GET['nama'];
    $id=$_GET['id_supplier'];
?>
<body>
    <header>
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
                                $alamat=$row['alamat'];
                                $no_telp=$row['no_telepon'];
                                $foto=$row['photo_profile'];
                                $id=$row['id_user'];
                                $akses=$row['akses'];
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
                    <li class="pen"><a href="../editProfil/gantiPassword.php?id_supplier=<?php echo $id; ?>&nama=<?php echo $nama;?>    ">Ganti Password</a></li>
                </ul>
            </div> 
            <div class="container"> 
                <div class="title">Detail Profile</div>
                <form action="editProfil.php" method="post" enctype="multipart/form-data">
                <div class="content">
                        <div class="box">
                            <span class="details"> Nama </span>
                            <input type="input" name="txt_nama" id="txt_nama" required="">
                        </div>
                        <div class="box">
                            <span class="details"> Alamat </span>
                            <input type="input" name="txt_alamat" id="txt_alamat" required="">
                        </div>
                        <div class="box">
                            <span class="details">No. Telephone</span>
                            <input type="input" name="txt_noTelp" id="txt_noTelp" required="">
                        </div>
                        <div class="box">
                            <span class="details"> Upload Foto </span>
                            <input type="file" id="input_foto" name="input_foto"> 
                        </div>
                        <div class="box">
                            <input type="hidden" name="txt_id" id="txt_id" required="">
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
                </div>
            </div>
            <div class="wrapper1">
                <div>
                    <button class="button1"type="submit" name="proses">Simpan Profile</button>
                </div>
            </div>
            </form>
        </div>
    </header2>
</body>
</html>