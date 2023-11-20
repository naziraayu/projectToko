<?php
require('../login/koneksi.php');
$pic_uploaded=0;
if(isset($_REQUEST['btn_simpanSupp'])){
    $nama_supp=$_REQUEST['txt_namaSupp'];
    $notelepon_supp=$_REQUEST['txt_notelpSupp']; 
    $alamat_supp=$_REQUEST['txt_alamatSupp'];
    $pertanyaan_supp=$_REQUEST['pertanyaanSup'];        
    $jawaban_supp=$_REQUEST['jawabanSupp'];
    $password_supp=$_REQUEST['passwordSupp'];

    $foto_supp=time().$_FILES['input_foto_supp']['name'];
    if (move_uploaded_file($_FILES['input_foto_supp']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'
          .$foto_supp)) {
            $target_file=$_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'.$foto_supp;
            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picName=basename($_FILES['input_foto_supp']['name']);
            $photo=time().$picName;
            if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
                ?>
              <script>
                alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
              </script>
              <?php
            }elseif ($_FILES['input_foto_supp']['size'] > 2000000){
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
                    $query_supp="insert into user values('', '$foto_supp', '$nama_supp', '$alamat_supp', '$notelepon_supp', '$pertanyaan_supp',  '$jawaban_supp', '$password_supp', 'supplier', '')";
                    $result_supp=mysqli_query($koneksi, $query_supp);
                    $notif_supp='berhasil menambahkan';
                    header('location: supplier.php');
                    exit();
    }else{
        $error_supp='gagal menambahkan';
        header('location: supplier.php?error='.urlencode
        ($error_supp));
        exit;
    }
}

if(isset($_REQUEST['btn_updateSupp'])){
    $id=$_REQUEST['txt_idSupp'];
    $nama_supp=$_REQUEST['txt_namaSupp'];
    $notelepon_supp=$_REQUEST['txt_notelpSupp']; 
    $alamat_supp=$_REQUEST['txt_alamatSupp'];
    $pertanyaan_supp=$_REQUEST['pertanyaanSup'];        
    $jawaban_supp=$_REQUEST['jawabanSupp'];
    $password_supp=$_REQUEST['passwordSupp'];
    $foto_supp=time().$_FILES['input_foto_supp']['name'];
    if (move_uploaded_file($_FILES['input_foto_supp']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'
          .$foto_supp)) {
            $target_file=$_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'.$foto_supp;
            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picName=basename($_FILES['input_foto_supp']['name']);
            $photo=time().$picName;
            if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
                ?>
              <script>
                alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
              </script>
              <?php
            }elseif ($_FILES['input_foto_supp']['size'] > 2000000){
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
        $query="update user set nama='$nama_supp', alamat='$alamat_supp', no_telepon='$notelepon_supp', pertanyaan='$pertanyaan_supp', jawaban='$jawaban_supp', password='$password_supp', photo_profile='$foto_supp' where id_user='$id'";
        $result=mysqli_query($koneksi, $query);
        ?>
            <script>alert("berhasil mengubah supplier");</script>
        <?php
    } else if ($pic_uploaded == 0){
        $query="update user set nama='$nama_supp', alamat='$alamat_supp', no_telepon='$notelepon_supp', pertanyaan='$pertanyaan_supp', jawaban='$jawaban_supp', password='$password_supp' where id_user='$id'";
        $result=mysqli_query($koneksi, $query);
        ?>
            <script>alert("berhasil mengubah supplier");</script>
        <?php
    }else{
        ?>
            <script>alert("gagal menambahkan supplier");</script>
        <?php
    }
}

if (isset($_REQUEST['hapus_supp'])) {
    $id_menu=$_GET['hapus_supp'];
    $query="delete from user where id_user='$id_menu'";
    if (mysqli_query($koneksi, $query)) {
        ?>
        <script>alert("berhasil menghapus");</script>
        <?php
        header("Location: supplier.php");
    }else{
        ?>
        <script>alert("gagal menghapus");</script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="adminn.css">
</head>
<body>
    <div class="sidebar">
        <div class="content">
            <ul>
                <li class="ad"><a href="../master/admin.html">Admin</a></li>
                <li class="sup"><a href="../master/supplier.html">Supplier</a></li>
                <li class="cus"><a href="../master/customer.html">Customer</a></li>
                <li class="men"><a href="../master/menu.html">Menu</a></li>
                <li class="pac"><a href="../master/paket.html">Paket</a></li>
                <li class="kem"><a href="../master/kemasan.html">Kemasan</a></li>
                <li class="supmen"><a href="../master/supMen.html">Supplier Menu</a></li>
            </ul>
        </div>
    </div>
    <header>        
        <div class="head">
            <div class="nav">
                <img src="../img/Ellipse 1.png" alt="logo" />
                <ul>
                    <li class="mas"><a href="#">MASTER</a></li>
                    <li class="pes"><a href="#">PESANAN MASUK</a></li>
                    <li class="eta"><a href="#">ETALASE</a></li>
                    <li class="lap"><a href="#">LAPORAN</a></li>
                    <li class="log"><a href="../login/login.html">LOG OUT</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="form">
            <form action="supplier.php" method="post" enctype="multipart/form-data">
            <div class="first-cont">
                <div class="form__group field">
                    <input type="input" id="txt_namaSupp" name="txt_namaSupp" id="txt_nama" class="form__field" placeholder="Name" required="">
                    <label for="name" class="form__label">Nama Admin</label>
                </div>
                <div class="form__group field">
                    <input type="input" id="txt_notelpSupp" name="txt_notelpSupp" class="form__field" placeholder="Name" required="">
                    <label for="name" class="form__label">Telephone</label>
                </div>
                <div class="form__group field">
                    <input type="input" id="txt_alamatSupp" name="txt_alamatSupp" class="form__field" placeholder="Name" required="">
                    <label for="name" class="form__label">Alamat</label>
                </div>
            </div>
            <div class="second-cont">
                <div class="form__group field">
                <label for="name" class="form__label">Pertanyaan</label>
                    <select class="form__field" id="pertanyaanSup" name="pertanyaanSup">
                            <option >Apa nama hewan peliharaan pertama Anda?</option>
                            <option >Di mana Anda bertemu pasangan Anda?</option>
                            <option >Siapa nama guru favorit Anda di sekolah?  </option>
                            <option >Apa nama jalan tempat Anda tinggal saat ini?</option>
                            <option >Siapa nama sahabat karib Anda?</option>
                            <option >Apa judul film favorit Anda?</option>
                            <option >Di kota apa Anda lahir?</option>
                            <option >Apa nama panggilan atau julukan Anda?</option> 
                            <option >Apa nama sekolah dasar pertama Anda?</option> 
                            <option >Di negara apa orang tua Anda bertemu dan menikah?</option> 
                    </select>
                </div>
                <div class="form__group field">
                    <input type="input" id="jawabanSupp" name="jawabanSupp" class="form__field" placeholder="Name" required="">
                    <label for="name" class="form__label">Jawaban</label>
                </div>
                <div class="form__group field">
                    <input type="password" id="passwordSupp" name="passwordSupp" class="form__field" placeholder="Name" required="">
                    <label for="name" class="form__label">Password</label>
                </div>
                <div class="form__group field">
                    <input type="hidden" id="txt_idSupp" name="txt_idSupp" class="form__field" placeholder="Name" required="">
                </div>
            </div>
        </div>
                <div class="photo">
                    <input type="file" id="input_foto_supp" name="input_foto_supp" class="form__field" required="">
                </div>
        <div class="refresh">
            <button type="submit" name="refresh" onclick="refreshSupplier()">
            <i class="fa-solid fa-rotate-right" style="color: #000000;"></i>
            </button>
            <script>
                function refreshSupplier() {
                    document.getElementById('txt_namaSupp').value='';
                    document.getElementById('txt_notelpSupp').value='';
                    document.getElementById('txt_alamatSupp').value='';
                    document.getElementById('input_foto_supp').value='';
                    document.getElementById('pertanyaanSup').selectedIndex=0;
                    document.getElementById('jawabanSupp').value='';
                    document.getElementById('passwordSupp').value='';
                }
            </script>
        </div>
        <div class="update">
            <!-- <button><i class="fa-solid fa-rotate-right" style="color: #000000;"></i></button> -->
            <button type="submit" name="btn_updateSupp" >Update</button>
        </div>
        <div class="save">
            <!-- <button><i class="fa-solid fa-rotate-right" style="color: #000000;"></i></button> -->
            <button type="submit" name="btn_simpanSupp" >Simpan</button>
        </div>
        </form>
    </div>
    <div class="table">
        <div class="table-header">
            <div class="container-input">
                <input type="text" placeholder="Search" name="text" class="input">
                <svg fill="#000000" width="20px" height="20px" viewBox="0 0 1920 1920" xmlns="http://www.w3.org/2000/svg">
                  <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
                </svg>
            </div>              
        </div>
        <div class="table-section">
            <table> 
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Supplier</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Pertanyaan Keamanan</th>
                        <th>Jawaban</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="select * from user where akses='supplier'";
                    $result=mysqli_query($koneksi, $query);
                    $no=1;
                    while($row=mysqli_fetch_array($result)){
                        $id=$row['id_user'];
                        $nama_karyawan=$row['nama'];
                        $alamat_karyawan=$row['alamat'];
                        $noTelepon_karyawan=$row['no_telepon'];
                        $pertanyaan_karyawan=$row['pertanyaan'];
                        $jawaban_karyawan=$row['jawaban'];
                        $akses=$row['akses'];
                        //$password_karyawan=$row['password'];
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>    
                        <td><?php echo $nama_karyawan; ?></td>
                        <td><?php echo $alamat_karyawan; ?></td>
                        <td><?php echo $noTelepon_karyawan; ?></td>
                        <td><?php echo $pertanyaan_karyawan; ?></td>
                        <td><?php echo $jawaban_karyawan; ?></td>
                        <td><?php echo $akses; ?></td>
                        <td>
                            <button><a href="supplier.php?edit_supp=<?php echo $id; ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                            <button><a href="supplier.php?hapus_supp=<?php echo $id; ?>" onclick="return confirm('apakah kamu yakin akan menghapus data ini?');" ><i class="fa-solid fa-trash"></i></a></button>
                            <?php
                            if (isset($_GET['edit_supp'])) {   
                            $id_edit=$_GET['edit_supp'];
                            $query="select * from user where id_user='$id_edit'";
                            $result=mysqli_query($koneksi, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row=mysqli_fetch_array($result)) {
                                    $id_karywn=$row['id_user'];
                                    $nama=$row['nama'];
                                    $telepon=$row['no_telepon'];
                                    $alamat=$row['alamat'];
                                    $pertanyaann=$row['pertanyaan'];
                                    $jawabann=$row['jawaban'];
                                    $passwordd=$row['password'];
                                    $fotoo=$row['photo_profile'];
                                    ?>
                                    <script>
                                        document.getElementById('txt_idSupp').value='<?php echo $id;?>';
                                        document.getElementById('txt_namaSupp').value='<?php echo $nama;?>';
                                        document.getElementById('txt_notelpSupp').value='<?php echo $telepon;?>';
                                        document.getElementById('txt_alamatSupp').value='<?php echo $alamat;?>';
                                        document.getElementById('input_foto_supp').value='<?php echo $pertanyaann;?>';
                                        document.getElementById('pertanyaanSup').value='<?php echo $jawabann;?>';
                                        document.getElementById('jawabanSupp').value='<?php echo $passwordd;?>';
                                        document.getElementById('passwordSupp').value='<?php echo $fotoo;?>';
                                    </script>
                                    <?php
                                }
                            }
                        }
                    ?>
                        </td>
                    <tr>
                    <?php
                $no++;
            }
            ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>