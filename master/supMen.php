<?php
require("../login/koneksi.php");
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
    $id=$_REQUEST['txt_idSupp'];
    $namaSupplier=$_REQUEST['spinner_supplier'];
    $namaMenu_supMen=$_REQUEST['spinner_menu'];
    $hargaBeli_supMen=$_REQUEST['txt_hargaBeli_supMen'];
    $query="update supplier_menu set id_user='$namaSupplier', id_barang='$namaMenu_supMen', harga_beli='$hargaBeli_supMen' where id_suppmenu='$id'";
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Supplier Menu</title>
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
                <form action="supMen.php" method="post" >
                    <div class="first-cont">
                        <div class="form__group field">
                        <select class="form__field" id="spinner_supplier" name="spinner_supplier" >
                            <?php
                                $qry="select * from user where akses='supplier'";
                                $rslt=mysqli_query($koneksi, $qry);
                                while($rw=mysqli_fetch_array($rslt)){
                            ?>
                                <option value="<?php echo $rw['id_user']; ?>" ><?php echo $rw['nama']; ?></option>
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
                          <div class="form__group field">
                              <input type="hidden" id="txt_idSupp" name="txt_idSupp" class="form__field" placeholder="Name" required="" />
                          </div>
                      </div>
            </div>
        <div class="refresh" name="refresh" onclick="refreshsupMenu()">
            <button>
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
            <button type="submit" name="btn_ubah_supMen">Update</button>
        </div>
        <div class="save">
        <!-- <button><i class="fa-solid fa-rotate-right" style="color: #000000;"></i></button> -->
            <button type="submit" name="btn_save_supMen">Simpan</button>
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
                    $query="SELECT user.nama, barang.nama_barang, supplier_menu.harga_beli, supplier_menu.id_suppmenu 
                            FROM supplier_menu JOIN user ON user.id_user=supplier_menu.id_user JOIN barang ON barang.id_barang=supplier_menu.id_barang;";
                    $result=mysqli_query($koneksi, $query);
                    $no=1;
                    while($row=mysqli_fetch_array($result)){
                        $id=$row['id_suppmenu'];
                        $namaSupp=$row['nama'];
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
                        </td>
                    </tr>
                    <?php
                        $no++;
                        }
                    ?>
                </tbody>
            </table>
            <?php
                if (isset($_GET['edit_suppmenu'])) {
                    $id_edit=$_GET['edit_suppmenu'];
                    $query= "select * from supplier_menu where id_suppmenu=$id_edit";
                    $result=mysqli_query($koneksi, $query);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row=mysqli_fetch_array($result)) {
                                $id=$row['id_suppmenu'];
                                $id_karywn=$row['id_user'];
                                $id_brg=$row['id_barang'];
                                $hrgbeli=$row['harga_beli'];
            ?>
                <script>
                    document.getElementById('txt_idSupp').value = <?php echo $id; ?>;
                    document.getElementById('spinner_supplier').value = <?php echo $id_karywn; ?>;
                    document.getElementById('spinner_menu').value = <?php echo $id_brg; ?>;
                    document.getElementById('txt_hargaBeli_supMen').value = '<?php echo $hrgbeli; ?>';                        
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