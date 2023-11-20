<?php
require('../login/koneksi.php');
$pic_uploaded=0;
if(isset($_REQUEST['btn_simpan'])){
    $nama=$_REQUEST['txt_nama'];
    $notelepon=$_REQUEST['txt_notelp'];
    $alamat=$_REQUEST['txt_alamat'];
    $pertanyaan=$_REQUEST['spinner_pertanyaan'];        
    $jawaban=$_REQUEST['txt_jawaban'];
    $password=$_REQUEST['txt_password'];
    
    $foto_supp=time().$_FILES['input_foto_admin']['name'];
    if (move_uploaded_file($_FILES['input_foto_admin']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'
          .$foto_supp)) {
            $target_file=$_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'.$foto_supp;
            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picName=basename($_FILES['input_foto_admin']['name']);
            $photo=time().$picName;
            if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
                ?>
              <script>
                alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
              </script>
              <?php
            }elseif ($_FILES['input_foto_admin']['size'] > 2000000){
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
                    $query="insert into user values(' ', '$foto_supp', '$nama', '$alamat', '$notelepon', '$pertanyaan',  '$jawaban', '$password', 'admin', '')";
                    $result=mysqli_query($koneksi, $query);
                    ?>
                        <script>
                        alert("Berhasil menambahkan admin");
                        </script>
                    <?php
    }else{
        ?>
              <script>
              alert("Gagal menambahkan admin");
              </script>
            <?php
    }
}

if(isset($_REQUEST['btn_update'])){
    $id=$_REQUEST['txt_id'];
    $nama=$_REQUEST['txt_nama'];
    $notelepon=$_REQUEST['txt_notelp'];
    $alamat=$_REQUEST['txt_alamat'];
    $pertanyaan=$_REQUEST['spinner_pertanyaan'];        
    $jawaban=$_REQUEST['txt_jawaban'];
    $password=$_REQUEST['txt_password'];

    $foto_supp=time().$_FILES['input_foto_admin']['name'];
    if (move_uploaded_file($_FILES['input_foto_admin']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'
          .$foto_supp)) {
            $target_file=$_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'.$foto_supp;
            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picName=basename($_FILES['input_foto_admin']['name']);
            $photo=time().$picName;
            if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
                ?>
              <script>
                alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
              </script>
              <?php
            }elseif ($_FILES['input_foto_admin']['size'] > 2000000){
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
        $query="update user set photo_profile='$foto_supp', nama='$nama', alamat='$alamat', no_telepon='$notelepon', pertanyaan='$pertanyaan', jawaban='$jawaban', password='$password' where id_user='$id'";
        $result=mysqli_query($koneksi, $query);
        ?>
            <script>
            alert("Berhasil mengubah admin");
            </script>
        <?php
    }else if ($pic_uploaded == 0) {   
        $query="update user set nama='$nama', alamat='$alamat', no_telepon='$notelepon', pertanyaan='$pertanyaan', jawaban='$jawaban', password='$password' where id_user='$id'";
        $result=mysqli_query($koneksi, $query);
        ?>
            <script>
            alert("Berhasil mengubah admin");
            </script>
        <?php
    }else{
        ?>
            <script>
            alert("Gagal mengubah admin");
            </script>
            <?php
    }
}

if (isset($_REQUEST['hapus_admin'])) {
    $id_menu=$_GET['hapus_admin'];
    $query="delete from user where id_user='$id_menu'";
    if (mysqli_query($koneksi, $query)) {
        ?>
        <script>alert("berhasil menghapus");</script>
        <?php
        header("Location: admin.php");
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="adminn.css" />
  </head>
<body>
    <div class="sidebar">
        <div class="content">
        <ul>
          <li class="ad"><a href="../master/admin.php">Admin</a></li>
          <li class="sup"><a href="../master/supplier.php">Supplier</a></li>
          <li class="cus"><a href="../master/customer.php">Customer</a></li>
          <li class="men"><a href="../master/menu.php">Menu</a></li>
          <li class="pac"><a href="../master/paket.php">Paket</a></li>
          <li class="kem"><a href="../master/kemasan.php">Kemasan</a></li>
          <li class="supmen">
            <a href="../master/supMen.php">Supplier Menu</a>
          </li>
        </ul>
        </div>
    </div>
    <header>
      <div class="head">
        <div class="nav">
          <img src="../img/Ellipse 1.png" alt="logo" />
          <ul>
            <li class="mas"><a href="../master/admin.php">MASTER</a></li>
            <li class="pes"><a href="../pesananMasuk/pesananBaru1.php">PESANAN MASUK</a></li>
            <li class="eta"><a href="../etalase/etalase.php">ETALASE</a></li>
            <li class="lap"><a href="../laporan/laporan.php">LAPORAN</a></li>
            <li class="log"><a href="../login/login.php">LOG OUT</a></li>
          </ul>
        </div>
      </div>
    </header>
    <div class="container">
        <div class="form">
            <form action="admin.php" method="post" enctype="multipart/form-data">
            <div class="first-cont">
                <div class="form__group field">
                    <input type="input" name="txt_nama" id="txt_nama" class="form__field" placeholder="Name" required="">
                    <label for="name" class="form__label">Nama Admin</label>
                </div>
                <div class="form__group field">
                    <input type="input" id="txt_notelp" name="txt_notelp" class="form__field" placeholder="Name" required="">
                    <label for="name" class="form__label">Telephone</label>
                </div>
                <div class="form__group field">
                    <input type="input" id="txt_alamat" name="txt_alamat" class="form__field" placeholder="Name" required="">
                    <label for="name" class="form__label">Alamat</label>
                </div>
                <div class="form__group field">
                    <input type="hidden" id="txt_id" name="txt_id" class="form__field" placeholder="Name" required="">
                    <!-- <label for="name" class="form__label">Alamat</label> -->
                </div>
            </div>
            <div class="second-cont">
                <div class="form__group field">
                <label for="name" class="form__label">Pertanyaan</label>
                    <select class="form__field" id="spinner_pertanyaan" name="spinner_pertanyaan">
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
                    <input type="input" id="txt_jawaban" name="txt_jawaban" class="form__field" placeholder="Name" required="">
                    <label for="name" class="form__label">Jawaban</label>
                </div>
                <div class="form__group field">
                    <input type="password" id="txt_password" name="txt_password" class="form__field" placeholder="Name" required="">
                    <label for="name" class="form__label">Password</label>
                </div>
            </div>
        </div>
        <div class="photo">
            <input type="file" id="input_foto_admin" name="input_foto_admin">
            </div>  
        <div class="refresh">
            <button type="submit" name="refresh" onclick="refreshAdmin()">
            <i class="fa-solid fa-rotate-right" style="color: #000000;"></i>
        </button>
            <script>
                function refreshAdmin() {
                    document.getElementById('txt_nama').value = '';
                    document.getElementById('txt_notelp').value = '';
                    document.getElementById('txt_alamat').value = '';
                    document.getElementById('spinner_pertanyaan').selectedIndex = 0;
                    document.getElementById('txt_jawaban').value = '';
                    document.getElementById('txt_password').value = '';
                }
            </script>
        </div>
        <div class="update">
            <!-- <button><i class="fa-solid fa-rotate-right" style="color: #000000;"></i></button> -->
            <button type="submit" name="btn_update" >Update</button>
        </div>
        <div class="save">
            <!-- <button><i class="fa-solid fa-rotate-right" style="color: #000000;"></i></button> -->
            <button type="submit" name="btn_simpan" >Simpan</button>
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
                        <th>Nama Admin</th>
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
                    $query="select * from user where akses='admin'";
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
                            <button><a href="admin.php?edit_admin=<?php echo $id; ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                            <button><a href="admin.php?hapus_admin=<?php echo $id; ?>" onclick="return confirm('apakah kamu yakin akan menghapus data ini?');" ><i class="fa-solid fa-trash"></i></a></button>
                        </td>
                    <tr>
                    <?php
                $no++;
            }
            ?>
                </tbody>
            </table>
            <?php
                            if (isset($_GET['edit_admin'])) {   
                            $id_edit=$_GET['edit_admin'];
                            $query="select * from user where id_user='$id_edit'";
                            $result=mysqli_query($koneksi, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row=mysqli_fetch_array($result)) {
                                    $id_karywn=$row['id_user'];
                                    $nama=$row['nama'];
                                    $telepon=$row['no_telepon'];
                                    $alamat=$row['alamat'];
                                    $pertanyaan=$row['pertanyaan'];
                                    $jawaban=$row['jawaban'];
                                    $password=$row['password'];
                                    ?>
                                    <script>
                                        document.getElementById('txt_id').value="<?php echo $id_karywn; ?>";
                                        document.getElementById('txt_nama').value="<?php echo $nama; ?>";
                                        document.getElementById('txt_notelp').value="<?php echo $telepon; ?>";
                                        document.getElementById('txt_alamat').value="<?php echo $alamat; ?>";
                                        document.getElementById('spinner_pertanyaan').value="<?php echo $pertanyaan; ?>";
                                        document.getElementById('txt_jawaban').value="<?php echo $jawaban; ?>";
                                        document.getElementById('txt_password').value="<?php echo $password; ?>";
                                    </script>
                                    <?php
                                }
                            }
                        }
                    ?>
        </div>
    </div>
</body>
</html>