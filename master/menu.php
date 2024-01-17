<?php
require("../login/koneksi.php");
// session_start();
$pic_uploaded=0;
  if (isset($_REQUEST['btn_save_menu'])) {
      $nama_menu=$_REQUEST['txt_nama_menu'];
      $deskripsi_menu=$_REQUEST['txt_deskripsi_menu'];
      $hargaJual_menu=$_REQUEST['txt_hargaJual_menu'];
      $keterangan_menu=$_REQUEST['spinner_keterangan'];
      $jenis_menu=$_REQUEST['spinner_jenis'];

      $foto_menu=time().$_FILES["input_foto_menu"]['name'];
      if (move_uploaded_file($_FILES['input_foto_menu']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/sibrownies/projectToko/gambar/'
          .$foto_menu)) {
            $target_file=$_SERVER['DOCUMENT_ROOT'].'/sibrownies/projectToko/gambar/'.$foto_menu;
            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picName=basename($_FILES['input_foto_menu']['name']);
            $photo=time().$picName;
            if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
              ?>
              <script>
                alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
              </script>
              <?php
            }elseif ($_FILES['input_foto_menu']['size'] > 2000000){
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
        $query="insert into barang values ('', '$foto_menu', '$nama_menu', '$hargaJual_menu', '$keterangan_menu', '$jenis_menu', '$deskripsi_menu')";
        $result=mysqli_query($koneksi, $query);
        ?>
          <script>
          alert("Berhasil menambahkan menu");
          </script>
        <?php
      }else if($pic_uploaded == 0){
        $query="insert into barang values ('', '', '$nama_menu', '$hargaJual_menu', '$keterangan_menu', '$jenis_menu', '$deskripsi_menu')";
        $result=mysqli_query($koneksi, $query);
        ?>
          <script>
          alert("Berhasil menambahkan menu");
          </script>
        <?php
      }else{
        ?>
          <script>
          alert("gagal menambahkan menu");
          </script>
          <?php
      }
}
if(isset($_REQUEST['btn_ubah_menu'])){
    $id=$_REQUEST['txt_idMenu'];
    $nama_menu=$_REQUEST['txt_nama_menu'];
    $deskripsi_menu=$_REQUEST['txt_deskripsi_menu'];
    $hargaJual_menu=$_REQUEST['txt_hargaJual_menu'];
    $keterangan_menu=$_REQUEST['spinner_keterangan'];
    $jenis_menu=$_REQUEST['spinner_jenis'];

      $foto_menu=time().$_FILES["input_foto_menu"]['name'];
      if (move_uploaded_file($_FILES['input_foto_menu']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/sibrownies/projectToko/gambar/'
          .$foto_menu)) {
            $target_file=$_SERVER['DOCUMENT_ROOT'].'/sibrownies/projectToko/gambar/'.$foto_menu;
            $imgFileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $picName=basename($_FILES['input_foto_menu']['name']);
            $photo=time().$picName;
            if ($imgFileType !='jpg' && $imgFileType != 'jpeg' && $imgFileType != 'png') {
              ?>
              <script>
                alert("Foto yang diupload harus .jpg atau .jpeg atau .png");
              </script>
              <?php
            }elseif ($_FILES['input_foto_menu']['size'] > 2000000){
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
        $query="update barang set nama_barang='$nama_menu', harga_jual='$hargaJual_menu', keterangan='$keterangan_menu', jenis_kue='$jenis_menu', deskripsi='$deskripsi_menu', gambar_barang='$foto_menu' where id_barang=$id";
        $result=mysqli_query($koneksi, $query);
        ?>
          <script>
          alert("Berhasil mengubah menu");
          </script>
        <?php
      }else if ($pic_uploaded == 0) {  
        $query="update barang set nama_barang='$nama_menu', harga_jual='$hargaJual_menu', keterangan='$keterangan_menu', jenis_kue='$jenis_menu', deskripsi='$deskripsi_menu' where id_barang=$id";
        $result=mysqli_query($koneksi, $query);
        ?>
          <script>
          alert("Berhasil mengubah menu");
          </script>
        <?php
    }else{
        ?>
          <script>
          alert("kolom foto harus terisi");
          </script>
          <?php
      }
    }
if (isset($_REQUEST['hapus_menu'])) {
  $id_menu=$_GET['hapus_menu'];
  $query="delete from barang where id_barang='$id_menu'";
  if (mysqli_query($koneksi, $query)) {
      ?>
      <script>alert("berhasil menghapus");</script>
      <?php
      header("Location: menu.php");
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
    <title>Menu</title>
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
            <li class="pes"><a href="../pesananMasuk/dalamProses.php">PESANAN MASUK</a></li>
            <li class="eta"><a href="../etalase/etalase.php">ETALASE</a></li>
            <li class="lap"><a href="../laporan/laporan.php">LAPORAN</a></li>
            <li class="log"><a href="../login/login.php">LOG OUT</a></li>
          </ul>
        </div>
      </div>
    </header>
    <div class="container">
      <div class="form">
        <form action="menu.php" method="post" enctype="multipart/form-data">
          <div class="first-cont">
            <div class="form__group field">
              <input type="input" name="txt_nama_menu" id="txt_nama_menu" class="form__field" placeholder="Name" required="" />
              <label for="name" class="form__label">Nama Menu</label>
            </div>
            <div class="form__group field">
              <input type="input" name="txt_deskripsi_menu" id="txt_deskripsi_menu" class="form__field" placeholder="Name" required="" />
              <label for="name" class="form__label">Deskripsi</label>
            </div>
            <div class="form__group field">
              <input type="input" name="txt_hargaJual_menu" id="txt_hargaJual_menu" class="form__field" placeholder="Name" required="" />
              <label for="name" class="form__label">Harga Jual</label>
            </div>
          </div>
          <div class="second-cont">
            <div class="form__group field">
            <label for="name" class="form__label">Keterangan</label>
              <select class="form__field" id="spinner_keterangan" name="spinner_keterangan">
                <option >Paket</option>
                <option >Non Paket</option>
              </select>
            </div>
            <div class="form__group field">
            <label for="name" class="form__label">Jenis</label>
              <select class="form__field" id="spinner_jenis" name="spinner_jenis">
                <option >Manis</option>
                <option >Asin</option>
              </select>
            </div> 
            <div class="form__group field">
              <input type="hidden" name="txt_idMenu" id="txt_idMenu" class="form__field" placeholder="Name" required="" />
            </div>
      </div>
      </div>
      <div class="photo">
          <input type="file" id="input_foto_menu" name="input_foto_menu">
        </div>
        <div class="refresh">
          <button type="submit" name="refresh" onclick="refreshMenu()">
            <i class="fa-solid fa-rotate-right" style="color: #000000"></i>
          </button>
          <script>
            function refreshMenu() {
              document.getElementById('txt_nama_menu').value = '';
              document.getElementById('txt_deskripsi_menu').value = '';
              document.getElementById('txt_hargaJual_menu').value = '';
              document.getElementById('spinner_keterangan').selectedIndex = 0;
              document.getElementById('spinner_jenis').selectedIndex = 0;
              document.getElementById('input_foto_menu').value = '';
              document.getElementById('txt_idMenu').value = '';
            }
          </script>
        </div>
        <div class="update">
          <button type="submit" name="btn_ubah_menu">Update</button>
        </div>
        <div class="save" id="btn_save_menu">
          <!-- <button><i class="fa-solid fa-rotate-right" style="color: #000000;"></i></button> -->
          <button type="submit" name="btn_save_menu" id="btn_save_menu">Simpan</button>
        </div>
      </div>
      </form>
    </div>
    <div class="table">
      <div class="table-header">
      <div class="container-input">
          <input type="text" placeholder="Search" name="text" id="searchInput" class="input" />
          <svg
              fill="#000000"
              width="20px"
              height="20px"
              viewBox="0 0 1920 1920"
              xmlns="http://www.w3.org/2000/svg"
              onclick="cari()">
              <path d="M790.588 1468.235c-373.722 0-677.647-303.924-677.647-677.647 0-373.722 303.925-677.647 677.647-677.647 373.723 0 677.647 303.925 677.647 677.647 0 373.723-303.924 677.647-677.647 677.647Zm596.781-160.715c120.396-138.692 193.807-319.285 193.807-516.932C1581.176 354.748 1226.428 0 790.588 0S0 354.748 0 790.588s354.748 790.588 790.588 790.588c197.647 0 378.24-73.411 516.932-193.807l516.028 516.142 79.963-79.963-516.142-516.028Z" fill-rule="evenodd"></path>
          </svg>
      </div>
<script>
    function cari() {
        var searchInputValue = document.getElementById("searchInput").value;
        window.location.href="menu.php?cari="+searchInputValue;
    }
</script>

      </div>
      <div class="table-section">
        <table>
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Menu</th>
              <th>Deskripsi</th>
              <th>Harga Jual</th>
              <th>Keterangan</th>
              <th>Jenis</th>
              <th>Foto Menu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <?php
          if (isset($_GET['cari'])) {
            $cari=$_GET['cari'];
            ?>
            <tbody>
          <?php
              $query="SELECT * FROM barang WHERE LOWER(nama_barang) LIKE LOWER('%$cari%');";
              $result=mysqli_query($koneksi, $query);
              $no=1;
              while($row=mysqli_fetch_array($result)){
                $id=$row['id_barang'];
                $namaMenu=$row['nama_barang'];
                $deskripsiMenu=$row['deskripsi'];
                $hargaJual=$row['harga_jual'];
                $keteranganMenu=$row['keterangan'];
                $jenisMenu=$row['jenis_kue'];
                $gambarMenu=$row['gambar_barang'];              
          ?>
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $namaMenu;?></td>
              <td><?php echo $deskripsiMenu;?></td>
              <td>Rp. <?php echo number_format($hargaJual, 0,',','.'); ?></td>
              <td><?php echo $keteranganMenu;?></td>
              <td><?php echo $jenisMenu;?></td>
              <td><img src="../gambar/<?php echo $gambarMenu; ?>" width="100" height="120" ></td>
              <td>
                <button id="tampil" onclick="editMenu(<?php echo $id; ?>)"><a href="menu.php?edit_menu=<?php echo $id; ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                <button><a href="menu.php?hapus_menu=<?php echo $id; ?>" onclick="return confirm('apakah kamu yakin akan menghapus data ini?');" ><i class="fa-solid fa-trash"></i></a></button>
              </td>
              <script>
                function editMenu(id) {
                document.getElementById('btn_save_menu').style.display = 'none';
                window.addEventListener('DOMContentLoaded', function () {
                  var urlParams = new URLSearchParams(window.location.search);
                  var editAdminId = urlParams.get('edit_menu');
                  if (editAdminId !== null) {
                    document.getElementById('btn_save_menu').style.display = 'none';
                  } else {
                    document.getElementById('btn_save_menu').style.display = 'block';
                  }
                });
              }
              </script>
            </tr>
            <?php
                $no++;
            }
            ?>
          </tbody>
            <?php
          }else {
            ?>
            <tbody>
          <?php
              $query="select * from barang";
              $result=mysqli_query($koneksi, $query);
              $no=1;
              while($row=mysqli_fetch_array($result)){
                $id=$row['id_barang'];
                $namaMenu=$row['nama_barang'];
                $deskripsiMenu=$row['deskripsi'];
                $hargaJual=$row['harga_jual'];
                $keteranganMenu=$row['keterangan'];
                $jenisMenu=$row['jenis_kue'];
                $gambarMenu=$row['gambar_barang'];              
          ?>
            <tr>
              <td><?php echo $no;?></td>
              <td><?php echo $namaMenu;?></td>
              <td><?php echo $deskripsiMenu;?></td>
              <td>Rp. <?php echo number_format($hargaJual, 0,',','.'); ?></td>
              <td><?php echo $keteranganMenu;?></td>
              <td><?php echo $jenisMenu;?></td>
              <td><img src="../gambar/<?php echo $gambarMenu; ?>" width="100" height="120" ></td>
              <td>
                <button id="tampil" onclick="editMenu(<?php echo $id; ?>)"><a href="menu.php?edit_menu=<?php echo $id; ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                <button><a href="menu.php?hapus_menu=<?php echo $id; ?>" onclick="return confirm('apakah kamu yakin akan menghapus data ini?');" ><i class="fa-solid fa-trash"></i></a></button>
              </td>
              <script>
                function editMenu(id) {
                document.getElementById('btn_save_menu').style.display = 'none';
                window.addEventListener('DOMContentLoaded', function () {
                  var urlParams = new URLSearchParams(window.location.search);
                  var editAdminId = urlParams.get('edit_menu');
                  if (editAdminId !== null) {
                    document.getElementById('btn_save_menu').style.display = 'none';
                  } else {
                    document.getElementById('btn_save_menu').style.display = 'block';
                  }
                });
              }
              </script>
            </tr>
            <?php
                $no++;
            }
            ?>
          </tbody>
            <?php
          }
          ?>
        </table>
        <?php
                            if (isset($_GET['edit_menu'])) {   
                            $id_edit=$_GET['edit_menu'];
                            $query="select * from barang where id_barang='$id_edit'";
                            $result=mysqli_query($koneksi, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row=mysqli_fetch_array($result)) {
                                    $id_karywn=$row['id_barang'];
                                    $nama=$row['nama_barang'];
                                    $hrgjual=$row['harga_jual'];
                                    $keterangan=$row['keterangan'];
                                    $jenis=$row['jenis_kue'];
                                    $deskripsi=$row['deskripsi'];
                                    $fotoo=$row['gambar_barang'];
                                    ?>
                                    <script>
                                        document.getElementById('txt_idMenu').value="<?php echo $id_karywn; ?>";
                                        document.getElementById('txt_nama_menu').value="<?php echo $nama; ?>";
                                        document.getElementById('txt_hargaJual_menu').value="<?php echo $hrgjual; ?>";
                                        document.getElementById('spinner_keterangan').value="<?php echo $keterangan; ?>";
                                        document.getElementById('spinner_jenis').value="<?php echo $jenis; ?>";
                                        document.getElementById('txt_deskripsi_menu').value="<?php echo $deskripsi; ?>";
                                        document.getElementById('input_foto_menu').value="<?php echo $fotoo; ?>";
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