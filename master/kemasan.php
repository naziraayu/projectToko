<?php
require("../login/koneksi.php");
$pic_uploaded=0;
if (isset($_REQUEST['btn_save_kemasan'])) {
    $nama_kemasan=$_REQUEST['txt_nama_kemasan'];
    $hargaBeli_kemasan=$_REQUEST['txt_hargaBeli_kemasan'];
    $hargaJual_kemasan=$_REQUEST['txt_hargaJual_kemasan'];
    $deskripsi_kemasan=$_REQUEST['txt_deskripsi'];

    $foto_kemasan=time().$_FILES["input_foto_kemasan"]['name'];
        if (move_uploaded_file($_FILES['input_foto_kemasan']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/projectToko/gambar/'
          .$foto_kemasan)) {
            $target_file=$_SERVER['DOCUMENT_ROOT'].'/projectToko/gambar/'.$foto_kemasan;
            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picName=basename($_FILES['input_foto_kemasan']['name']);
            $photo=time().$picName;
            if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
                ?>
              <script>
                alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
              </script>
              <?php
            }elseif ($_FILES['input_foto_kemasan']['size'] > 2000000){
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
            $query="insert into kemasan values ('', '$nama_kemasan', '$hargaJual_kemasan', '$hargaBeli_kemasan', '$deskripsi_kemasan', '$foto_kemasan') ";
            $result=mysqli_query($koneksi, $query);
            ?>
              <script>
              alert("Berhasil menambahkan kemasan");
              </script>
            <?php
          }else{
            ?>
              <script>
              alert("gagal menambahkan kemasan");
              </script>
              <?php
        }
    }
    if (isset($_REQUEST['btn_ubah_kemasan'])) {
        $id=$_REQUEST['txt_idKMSN'];
        $nama_kemasan=$_REQUEST['txt_nama_kemasan'];
        $hargaBeli_kemasan=$_REQUEST['txt_hargaBeli_kemasan'];
        $hargaJual_kemasan=$_REQUEST['txt_hargaJual_kemasan'];
        $deskripsi_kemasan=$_REQUEST['txt_deskripsi'];
    
        $foto_kemasan=time().$_FILES["input_foto_kemasan"]['name'];
            if (move_uploaded_file($_FILES['input_foto_kemasan']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/projectToko/gambar/'
              .$foto_kemasan)) {
                $target_file=$_SERVER['DOCUMENT_ROOT'].'/projectToko/gambar/'.$foto_kemasan;
                $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                $picName=basename($_FILES['input_foto_kemasan']['name']);
                $photo=time().$picName;
                if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
                    ?>
                  <script>
                    alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
                  </script>
                  <?php
                }elseif ($_FILES['input_foto_kemasan']['size'] > 2000000){
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
                $query="update kemasan set nama_kemasan='$nama_kemasan', herga_jual='$hargaJual_kemasan', harga_beli='$hargaBeli_kemasan', deskripsi='$deskripsi_kemasan', gambar_kemasan='$foto_kemasan' where id_kemasan='$id'";
                $result=mysqli_query($koneksi, $query);
                ?>
                  <script>
                  alert("Berhasil mengubah kemasan");
                  </script>
                <?php
            }else if($pic_uploaded == 0){
                $query="update kemasan set nama_kemasan='$nama_kemasan', herga_jual='$hargaJual_kemasan', harga_beli='$hargaBeli_kemasan', deskripsi='$deskripsi_kemasan' where id_kemasan='$id'";
                $result=mysqli_query($koneksi, $query);
                ?>
                  <script>
                  alert("Berhasil mengubah kemasan");
                  </script>
                <?php
              }else{
                ?>
                  <script>
                  alert("Kolom foto harus terisi");
                  </script>
                  <?php
            }
        }
    if (isset($_REQUEST['hapus_kmsn'])) {
        $id_menu=$_GET['hapus_kmsn'];
        $query="delete from kemasan where id_kemasan='$id_menu'";
        if (mysqli_query($koneksi, $query)) {
            ?>
            <script>alert("berhasil menghapus");</script>
            <?php
            header("Location: kemasan.php");
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
    <title>Kemasan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
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
                <li class="supmen"><a href="../master/supMen.php">Supplier Menu</a>
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
                <form action="kemasan.php" method="post" enctype="multipart/form-data">
                    <div class="first-cont">
                        <div class="form__group field">
                            <input type="input" id="txt_nama_kemasan" name="txt_nama_kemasan" class="form__field" placeholder="Name" required="" />
                            <label for="name" class="form__label">Nama Kemasan</label>
                        </div>
                        <div class="form__group field">
                            <input type="input" id="txt_hargaBeli_kemasan" name="txt_hargaBeli_kemasan" class="form__field" placeholder="Name" required="" />
                            <label for="name" class="form__label">Harga Beli</label>
                        </div>
                        <div class="form__group field">
                            <input type="hidden" id="txt_idKMSN" name="txt_idKMSN" class="form__field" placeholder="Name" required="" />
                        </div>
                    </div>
                    <div class="second-cont">
                        <div class="form__group field">
                            <input type="input" id="txt_hargaJual_kemasan" name="txt_hargaJual_kemasan" class="form__field" placeholder="Name" required="" />
                            <label for="name" class="form__label">Harga Jual</label>
                        </div>
                        <div class="form__group field">
                            <label for="name" class="form__label">Deskripsi</label>
                            <input type="input" id="txt_deskripsi" name="txt_deskripsi" class="form__field" placeholder="Name" required="" />
                        </div>
                    </div>
            </div>
            <div class="photo">
            <input type="file" id="input_foto_kemasan" name="input_foto_kemasan">
            </div>    
        <div class="refresh">
            <button type="submit" name="refresh" onclick="refreshKemasan()">
                <i class="fa-solid fa-rotate-right" style="color: #000000"></i>
            </button>
            <script>
                function refreshKemasan() {
                    document.getElementById('txt_nama_kemasan').value = '';
                    document.getElementById('txt_hargaBeli_kemasan').value = '';
                    document.getElementById('input_foto_kemasan').value = '';
                    document.getElementById('txt_hargaJual_kemasan').value = '';
                    document.getElementById('txt_deskripsi').value = '';
                }
            </script>
        </div>
        <div class="update">
            <button type="submit" name="btn_ubah_kemasan">Update</button>
        </div>
        <div class="save">
        <!-- <button><i class="fa-solid fa-rotate-right" style="color: #000000;"></i></button> -->
            <button type="submit" name="btn_save_kemasan">Simpan</button>
        </div>
        </form>
    </div>
    <div class="table">
        <div class="table-header">
            <div class="container-input">
                <input type="text" placeholder="Search" name="text" class="input" />
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
                        <th>Nama <br> Kemasan</th>
                        <th>Harga Jual</th>
                        <th>Harga Beli</th>
                        <th>Deskripsi</th>
                        <th>Foto Kemasan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="select * from kemasan";
                    $result=mysqli_query($koneksi, $query);
                    $no=1;
                    while($row=mysqli_fetch_array($result)){
                        $id=$row['id_kemasan'];
                        $namaKemasan=$row['nama_kemasan'];
                        $hargaJualKemasan=$row['herga_jual'];
                        $hargaBeliKemasan=$row['harga_beli'];
                        $deskripsiKemasan=$row['deskripsi'];
                        $gambarKemasan=$row['gambar_kemasan'];              
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $namaKemasan; ?></td>
                        <td>Rp <?php echo number_format($hargaJualKemasan, 0,',','.'); ?></td>
                        <td>Rp <?php echo number_format($hargaBeliKemasan, 0,',','.'); ?></td>
                        <td><?php echo $deskripsiKemasan; ?></td>
                        <td><img src="../gambar/<?php echo $gambarKemasan; ?>" width="100" height="120" ></td>
                        <td>
                            <button><a href="kemasan.php?edit_kmsn=<?php echo $id; ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                            <button><a href="kemasan.php?hapus_kmsn=<?php echo $id; ?>" onclick="return confirm('apakah kamu yakin akan menghapus data ini?');" ><i class="fa-solid fa-trash"></i></a></button>
                        </td>
                    </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </tbody>
            </table>
            <?php
                            if (isset($_GET['edit_kmsn'])) {   
                            $id_edit=$_GET['edit_kmsn'];
                            $query="select * from kemasan where id_kemasan='$id_edit'";
                            $result=mysqli_query($koneksi, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row=mysqli_fetch_array($result)) {
                                    $id_karywn=$row['id_kemasan'];
                                    $nama=$row['nama_kemasan'];
                                    $hrgjual=$row['herga_jual'];
                                    $hrgbeli=$row['harga_beli'];
                                    $deskripsi=$row['deskripsi'];
                                    $fotoo=$row['gambar_kemasan'];
                                    ?>
                                    <script>
                                        document.getElementById('txt_idKMSN').value="<?php echo $id_karywn; ?>";
                                        document.getElementById('txt_nama_kemasan').value="<?php echo $nama; ?>";
                                        document.getElementById('txt_hargaJual_kemasan').value="<?php echo $hrgjual; ?>";
                                        document.getElementById('txt_hargaBeli_kemasan').value="<?php echo $hrgbeli; ?>";
                                        document.getElementById('txt_deskripsi').value="<?php echo $deskripsi; ?>";
                                        document.getElementById('input_foto_kemasan').value="<?php echo $fotoo; ?>";
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