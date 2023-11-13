<?php
require("koneksi.php");
if (isset($_REQUEST['btn_save_supMen'])) {
    $namaSupplier=$_REQUEST['spinner_supplier'];
    $namaMenu_supMen=$_REQUEST['spinner_menu'];
    $hargaBeli_supMen=$_REQUEST['txt_hargaBeli_supMen'];
    $query="insert into supplier_menu values ('', '$hargaBeli_supMen', '$namaSupplier', '$namaMenu_supMen')";
    $result=mysqli_query($koneksi, $query);
    if ($result) {
        ?>
            <script>alert("Berhasil menambahkan harga beli setiap menu");</script>
        <?php
    }else{
        ?>
            <script>alert("Gagal menambahkan harga beli setiap menu");</script>
        <?php
    }
}

if (isset($_REQUEST['btn_ubah_supMen'])) {
    $namaSupplier=$_REQUEST['spinner_supplier'];
    $namaMenu_supMen=$_REQUEST['spinner_menu'];
    $hargaBeli_supMen=$_REQUEST['txt_hargaBeli_supMen'];
    $query="update supplier_menu set id_karyawan='$namaSupplier', id_barang='$namaMenu_supMen', harga_beli='$hargaBeli_supMen'";
    $result=mysqli_query($koneksi, $query);
    if ($result) {
        ?>
            <script>alert("Berhasil mengubah harga beli setiap menu");</script>
        <?php
    }else{
        ?>
            <script>alert("Gagal mengubah harga beli setiap menu");</script>
        <?php
    }
}

if (isset($_GET['hapus_suppmenu'])) {
    $id_hapus=$_GET['hapus_suppmenu'];
    $query="delete from supplier_menu where id_suppmenu=$id_hapus";
    if (mysqli_query($koneksi, $query) == TRUE) {
        ?>
            <script>alert("berhasil menghapus");</script>
        <?php
        header("location: supMen.php");
    }else{
        ?>
            <script>alert("Gagal menghapus");</script>
        <?php
    }
}

if (isset($_GET['edit_suppmenu'])) {
    $id_edit=$_GET['edit_suppmenu'];
    $query= "select * from supplier_menu where id_suppmenu=$id_edit";
    $result=mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) > 0) {
        while ($row=mysqli_fetch_array($result)) {
            $id_karywn=$row['id_karyawan'];
            $id_brg=$row['id_barang'];
            $hrgbeli=$row['harga_beli'];
            ?>
                <script>
                    document.getElementById('spinner_supplier').value = '<?php echo json_encode($id_karywn); ?>';
                    document.getElementById('spinner_menu').value = '<?php echo json_encode($id_brg); ?>';
                    document.getElementById('txt_hargaBeli_supMen').value = '<?php echo json_encode($hrgbeli); ?>';                        
                </script>
            <?php
        }     
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Supplier Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="admin.css" />
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
                <form action="supMen.php" method="post" enctype="multipart/form-data">
                    <div class="first-cont">
                        <div class="form__group field">
                          <select class="form__field" id="spinner_supplier" name="spinner_supplier" >
                            <?php
                                $qry="select * from karyawan where akses='supplier'";
                                $rslt=mysqli_query($koneksi, $qry);
                                while($rw=mysqli_fetch_array($rslt)){
                            ?>
                                <option value="<?php echo $rw['id_karyawan']; ?>" ><?php echo $rw['nama_karyawan']; ?></option>
                            <?php
                                }
                            ?>
                          </select>
                        </div>
                        <div class="form__group field">
                          <select class="form__field" id="spinner_menu" name="spinner_menu" >
                            <?php
                                $qry="select * from barang";
                                $rslt=mysqli_query($koneksi, $qry);
                                while($rw=mysqli_fetch_array($rslt)){
                            ?>
                                <option value="<?php echo $rw['id_barang']; ?>" ><?php echo $rw['nama_barang']; ?></option>
                            <?php
                                }
                            ?>
                          </select>
                      </div>
                      </div>
                      <div class="second-cont">
                          <div class="form__group field">
                              <input type="input" id="txt_hargaBeli_supMen" name="txt_hargaBeli_supMen" class="form__field" placeholder="Name" required="" />
                              <label for="name" class="form__label">Harga Beli</label>
                          </div>
                      </div>
            </div>
        <div class="refresh">
            <button type="submit" name="refresh" onclick="refreshsupMenu()">
              <i class="fa-solid fa-rotate-right" style="color: #000000"></i>
            </button>
            <Script>
                function refreshsupMenu() {
                    document.getElementById('spinner_supplier').selectedIndex = 0;
                    document.getElementById('spinner_menu').selectedIndex = 0;
                    document.getElementById('txt_hargaBeli_supMen').value = '';
                }
            </Script>
        </div>
        <div class="update">
            <button type="submit" name="btn_ubah_supMen" >Update</button>
        </div>
        <div class="save">
        <!-- <button><i class="fa-solid fa-rotate-right" style="color: #000000;"></i></button> -->
            <button type="submit" name="btn_save_supMen" >Simpan</button>
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
                        <th>Nama Supplier</th>
                        <th>Nama Barang</th>
                        <th>Harga Beli</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="SELECT karyawan.nama_karyawan, barang.nama_barang, supplier_menu.harga_beli, supplier_menu.id_suppmenu 
                            FROM supplier_menu JOIN karyawan ON karyawan.id_karyawan=supplier_menu.id_karyawan JOIN barang ON barang.id_barang=supplier_menu.id_barang;";
                    $result=mysqli_query($koneksi, $query);
                    $no=1;
                    while($row=mysqli_fetch_array($result)){
                        $id=$row['id_suppmenu'];
                        $namaSupp=$row['nama_karyawan'];
                        $namaMenu=$row['nama_barang'];
                        $hargaBeli=$row['harga_beli'];           
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $namaSupp; ?></td>
                        <td><?php echo $namaMenu; ?></td>
                        <td><?php echo $hargaBeli; ?></td>
                        <td>
                            <button><a href="supMen.php?edit_suppmenu=<?php echo $id; ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                            <button><a href="supMen.php?hapus_suppmenu=<?php echo $id; ?>" onclick="return confirm('apakah kamu yakin akan menghapus data ini?');" ><i class="fa-solid fa-trash"></i></a></button>
                            <?php
                                if (isset($_GET['edit_suppmenu'])) {
                                    $id_edit=$_GET['edit_suppmenu'];
                                    $query= "select * from supplier_menu where id_suppmenu=$id_edit";
                                    $result=mysqli_query($koneksi, $query);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row=mysqli_fetch_array($result)) {
                                            $id_karywn=$row['id_karyawan'];
                                            $id_brg=$row['id_barang'];
                                            $hrgbeli=$row['harga_beli'];
                                            ?>
                                                <script>
                                                    document.getElementById('spinner_supplier').value = <?php echo $id_karywn; ?>;
                                                    document.getElementById('spinner_menu').value = <?php echo $id_brg; ?>;
                                                    document.getElementById('txt_hargaBeli_supMen').value = '<?php echo $hrgbeli; ?>';                        
                                                </script>
                                            <?php
                                        }     
                                    }
                                }
                            ?>
                        </td>
                    </tr>
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