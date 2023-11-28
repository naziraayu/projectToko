<?php
require("../login/koneksi.php");
$pic_uploaded=0;
if (isset($_REQUEST['btn_save_paket'])) {
    $nama_paket=$_REQUEST['txt_nama_paket'];
    $isi_paket=$_REQUEST['txt_isi_paket'];
    $jumlahMacam_paket=$_REQUEST['txt_jumlahMacam_paket'];
    $kemasan_paket=$_REQUEST['spinner_kemasan_paket'];
    $hargaJual_paket=$_REQUEST['txt_hargaJual_paket'];
    $deskripsi_paket=$_REQUEST['txt_deskripsi_paket'];

    $foto_paket=time().$_FILES["input_foto_paket"]['name'];
    if (move_uploaded_file($_FILES['input_foto_paket']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'
          .$foto_paket)) {
            $target_file=$_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'.$foto_paket;
            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picName=basename($_FILES['input_foto_paket']['name']);
            $photo=time().$picName;
            if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
                ?>
              <script>
                alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
              </script>
              <?php
            }elseif ($_FILES['input_foto_paket']['size'] > 2000000){
                ?>
                <script>
                  alert("Foto yang diupload tidak boleh lebih dari 2 mb");
                </script>
                <?php
              }else{
                $pic_uploaded=1;
              }
        }
        if ($pic_uploaded == 1) {
            $query="insert into paket values ('', '$nama_paket', '$isi_paket', '$jumlahMacam_paket', '$hargaJual_paket', '$deskripsi_paket', '$foto_paket', '$kemasan_paket')";
            $result=mysqli_query($koneksi, $query);
            ?>
              <script>
              alert("Berhasil menambahkan paket");
              </script>
            <?php
          }else{
            ?>
              <script>
              alert("gagal menambahkan paket");
              </script>
              <?php
        }
}
if (isset($_REQUEST['btn_ubah_paket'])) {
    $id=$_REQUEST['txt_idPaket'];
    $nama_paket=$_REQUEST['txt_nama_paket'];
    $isi_paket=$_REQUEST['txt_isi_paket'];
    $jumlahMacam_paket=$_REQUEST['txt_jumlahMacam_paket'];
    $kemasan_paket=$_REQUEST['spinner_kemasan_paket'];
    $hargaJual_paket=$_REQUEST['txt_hargaJual_paket'];
    $deskripsi_paket=$_REQUEST['txt_deskripsi_paket'];

    $foto_paket=time().$_FILES["input_foto_paket"]['name'];
    if (move_uploaded_file($_FILES['input_foto_paket']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'
          .$foto_paket)) {
            $target_file=$_SERVER['DOCUMENT_ROOT'].'/toko/projectToko/projectToko/gambar/'.$foto_paket;
            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picName=basename($_FILES['input_foto_paket']['name']);
            $photo=time().$picName;
            if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
                ?>
              <script>
                alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
              </script>
              <?php
            }elseif ($_FILES['input_foto_paket']['size'] > 2000000){
                ?>
                <script>
                  alert("Foto yang diupload tidak boleh lebih dari 2 mb");
                </script>
                <?php
              }else{
                $pic_uploaded=1;
              }
        }
        if ($pic_uploaded == 1) {
            $query="update paket set nama_paket='$nama_paket', jumlah_kue='$isi_paket', macam='$jumlahMacam_paket', harga_jual='$hargaJual_paket', deskripsi='$deskripsi_paket', gambar_paket='$foto_paket', id_kemasan='$kemasan_paket' where id_paket='$id'";
            $result=mysqli_query($koneksi, $query);
            ?>
              <script>
              alert("Berhasil mengubah paket");
              </script>
            <?php
        }else if ($pic_uploaded == 0){
            $query="update paket set nama_paket='$nama_paket', jumlah_kue='$isi_paket', macam='$jumlahMacam_paket', harga_jual='$hargaJual_paket', deskripsi='$deskripsi_paket', id_kemasan='$kemasan_paket' where id_paket='$id'";
            $result=mysqli_query($koneksi, $query);
            ?>
              <script>
              alert("Berhasil mengubah paket");
              </script>
            <?php
          }else{
            ?>
              <script>
              alert("Gagal mengubah foto");
              </script>
              <?php
        }
}
if (isset($_REQUEST['hapus_paket'])) {
    $id_menu=$_GET['hapus_paket'];
    $query="delete from paket where id_paket='$id_menu'";
    if (mysqli_query($koneksi, $query)) {
        ?>
        <script>alert("berhasil menghapus");</script>
        <?php
        header("Location: paket.php");
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
    <title>Paket</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <li class="ad"><a href="../master/admin.php">Admin</a></li>
                <li class="sup"><a href="../master/supplier.php">Supplier</a></li>
                <li class="cus"><a href="../master/customer.php">Customer</a></li>
                <li class="men"><a href="../master/menu.php">Menu</a></li>
                <li class="pac"><a href="../master/paket.php">Paket</a></li>
                <li class="kem"><a href="../master/kemasan.php">Kemasan</a></li>
                <li class="supmen"></li><a href="../master/supMen.php">Supplier Menu</a>
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
                <form action="paket.php" method="post" enctype="multipart/form-data">
                    <div class="first-cont">
                        <div class="form__group field">
                            <input type="input" id="txt_nama_paket" name="txt_nama_paket" class="form__field" placeholder="Name" required="">
                            <label for="name" class="form__label">Nama Paket</label>
                        </div>
                        <div class="form__group field">
                            <input type="input" id="txt_isi_paket" name="txt_isi_paket" class="form__field" placeholder="Name" required="">
                            <label for="name" class="form__label">Isi Paket</label>
                        </div>
                        <div class="form__group field">
                            <input type="input" id="txt_jumlahMacam_paket" name="txt_jumlahMacam_paket" class="form__field" placeholder="Name" required="">
                            <label for="name" class="form__label">Jumlah Macam</label>
                        </div>
                        <div class="form__group field">
                            <input type="hidden" id="txt_idPaket" name="txt_idPaket" class="form__field" placeholder="Name" required="">
                        </div>
                    </div>
                    <div class="second-cont">
                        <div class="form__group field">
                            <select class="form__field" id="spinner_kemasan_paket" name="spinner_kemasan_paket">
                            <?php
                                $qry="select * from kemasan";
                                $rslt=mysqli_query($koneksi, $qry);
                                while($rw=mysqli_fetch_array($rslt)){
                                ?>
                                <option value="<?php echo $rw['id_kemasan']; ?>" ><?php echo $rw['nama_kemasan']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form__group field">
                            <input type="input" id="txt_hargaJual_paket" name="txt_hargaJual_paket" class="form__field" placeholder="Name" required="">
                            <label for="name" class="form__label">Harga Jual</label>
                        </div>
                        <div class="form__group field">
                            <input type="input" id="txt_deskripsi_paket" name="txt_deskripsi_paket" class="form__field" placeholder="Name" required="">
                            <label for="name" class="form__label">Deskripsi</label>
                        </div>
                    </div>
            </div>
        <div class="photo">
            <input type="file" id="input_foto_paket" name="input_foto_paket">
            <!-- <button><img src="../img/add.png" alt="" />Tambahkan Foto</button> -->
        </div>
        <div type="submit" name="refresh" class="refresh">
            <button>
                <i class="fa-solid fa-rotate-right" style="color: #000000"></i>
            </button>
            <script>
                function refreshPaket() {
                    document.getElementById('txt_nama_paket').value = '';
                    document.getElementById('txt_isi_paket').value = '';
                    document.getElementById('txt_jumlahMacam_paket').value = '';
                    document.getElementById('input_foto_paket').value = '';
                    document.getElementById('spinner_kemasan_paket').selectedIndex = 0;
                    document.getElementById('txt_hargaJual_paket').value = '';
                    document.getElementById('txt_deskripsi_paket').value = '';
                }
            </script>
        </div>
        <div class="update">
            <button type="submit" name="btn_ubah_paket">Update</button>
        </div>
        <div class="save">
        <!-- <button><i class="fa-solid fa-rotate-right" style="color: #000000;"></i></button> -->
            <button type="submit" name="btn_save_paket">Simpan</button>
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
                        <th>No</th>
                        <th>Nama Paket</th>
                        <th>Isi Paket</th>
                        <th>Jumlah Macam</th>
                        <th>Kemasan</th>
                        <th>Harga Jual</th>
                        <th>Deskripsi</th>
                        <th>Foto Paket</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="SELECT paket.id_paket, paket.nama_paket, paket.jumlah_kue, paket.macam, paket.harga_jual, paket.deskripsi, paket.gambar_paket, 
                            kemasan.nama_kemasan FROM paket JOIN kemasan ON kemasan.id_kemasan=paket.id_kemasan";
                    $result=mysqli_query($koneksi, $query);
                    $no=1;
                    while($row=mysqli_fetch_array($result)){
                        $id=$row['id_paket'];
                        $namaPaket=$row['nama_paket'];
                        $isiPaket=$row['jumlah_kue'];
                        $macamPaket=$row['macam'];
                        $hargaJualPaket=$row['harga_jual'];
                        $deskripsiPaket=$row['deskripsi'];
                        $gambarPaket=$row['gambar_paket'];   
                        $namaKemasanPaket=$row['nama_kemasan'];           
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $namaPaket; ?></td>
                        <td><?php echo $isiPaket; ?></td>
                        <td><?php echo $macamPaket; ?></td>
                        <td><?php echo $namaKemasanPaket; ?></td>
                        <td>Rp <?php echo number_format($hargaJualPaket, 0,',','.'); ?></td>
                        <td><?php echo $deskripsiPaket; ?></td>
                        <td><img src="../gambar/<?php echo $gambarPaket; ?>" width="100" height="120" ></td>
                        <td>
                            <button><a href="paket.php?ubah_paket=<?php echo $id; ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                            <button><a href="paket.php?hapus_paket=<?php echo $id; ?>"><i class="fa-solid fa-trash"></a></i></button>
                        </td>
                    </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
                            if (isset($_GET['ubah_paket'])) {   
                            $id_edit=$_GET['ubah_paket'];
                            $query="select * from paket where id_paket='$id_edit'";
                            $result=mysqli_query($koneksi, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row=mysqli_fetch_array($result)) {
                                    $id_karywn=$row['id_paket'];
                                    $nama=$row['nama_paket'];
                                    $jmlkue=$row['jumlah_kue'];
                                    $macam=$row['macam'];
                                    $hrgjual=$row['harga_jual'];
                                    $deskripsi=$row['deskripsi'];
                                    $kemasan=$row['id_kemasan'];
                                    $fotoo=$row['gambar_paket'];
                                    ?>
                                    <script>
                                        document.getElementById('txt_idPaket').value="<?php echo $id_karywn; ?>";
                                        document.getElementById('txt_nama_paket').value="<?php echo $nama; ?>";
                                        document.getElementById('txt_isi_paket').value="<?php echo $jmlkue; ?>";
                                        document.getElementById('txt_jumlahMacam_paket').value="<?php echo $macam; ?>";
                                        document.getElementById('txt_hargaJual_paket').value="<?php echo $hrgjual; ?>";
                                        document.getElementById('txt_deskripsi_paket').value="<?php echo $deskripsi; ?>";
                                        document.getElementById('spinner_kemasan_paket').value="<?php echo $kemasan; ?>";
                                        document.getElementById('input_foto_paket').value="<?php echo $fotoo; ?>";
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