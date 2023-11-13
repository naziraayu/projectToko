<?php
require ("../login/koneksi.php");
if(isset($_REQUEST['btn_save_cust'])){
$nama_cust=$_REQUEST['txt_nama_cust'];
$notelp_cust=$_REQUEST['txt_telp_cust'];
$alamat_cust=$_REQUEST['txt_alamat_cust'];
$penanda_cust=$_REQUEST['spinner_penanda_cust'];
    if(!empty(trim($nama_cust)) && !empty(trim($alamat_cust)) && !empty(trim($notelp_cust))){
        $query_cust="insert into user values ('', '', '$nama_cust', '$alamat_cust', '$notelp_cust', '', '', '', 'customer', '$penanda_cust')";
        $result_cust=mysqli_query($koneksi, $query_cust);
        $notif_cust="berhasil menambahkan";
        header('location:customer.php?error='.urlencode($notif_cust));
        exit();
    }else{
        $error_cust="semua kolom harus terisi";
        header('location:customer.php?error='.urlencode($error_cust));
        exit();
    }
}

if(isset($_REQUEST['btn_update'])){
    $id=$_REQUEST['txt_id_cust'];
    $nama_cust=$_REQUEST['txt_nama_cust'];
    $notelp_cust=$_REQUEST['txt_telp_cust'];
    $alamat_cust=$_REQUEST['txt_alamat_cust'];
    $penanda_cust=$_REQUEST['spinner_penanda_cust'];        
    if(!empty(trim($nama_cust)) && !empty(trim($alamat_cust)) && !empty(trim($notelp_cust))){
                    $query="update user set nama='$nama_cust', alamat='$alamat_cust', no_telepon='$notelp_cust', penanda='$penanda_cust' where id_user='$id'";
                    $result=mysqli_query($koneksi, $query);
                    $notif='berhasil menambahkan';
                    header('location: customer.php');
                    exit();
    }else{
        $error='gagal menambahkan';
        header('location: customer.php?error='.urlencode
        ($error));
        exit;
    }
}

if (isset($_REQUEST['hapus_cust'])) {
    $id_menu=$_GET['hapus_cust'];
    $query="delete from user where id_user='$id_menu'";
    if (mysqli_query($koneksi, $query)) {
        ?>
        <script>alert("berhasil menghapus");</script>
        <?php
        header("Location: customer.php");
    }else{
        ?>
        <script>alert("gagal menghapus");</script>
        <?php
    }
}
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Customer</title>
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
                <form action="customer.php" method="post">
                    <div class="first-cont">
                        <div class="form__group field">
                            <input type="input" id="txt_nama_cust" name="txt_nama_cust" class="form__field" placeholder="Name" required="" />
                            <label for="name" class="form__label">Nama Customer</label>
                        </div>
                        <div class="form__group field">
                            <input type="input" id="txt_telp_cust" name="txt_telp_cust" class="form__field" placeholder="Name" required="" />
                            <label for="name" class="form__label">Telephone</label>
                        </div>
                        <div class="form__group field">
                            <input type="hidden" id="txt_id_cust" name="txt_id_cust" class="form__field" placeholder="Name" required="" />
                        </div>
                    </div>
                    <div class="second-cont">
                        <div class="form__group field">
                            <input type="input" id="txt_alamat_cust" name="txt_alamat_cust" class="form__field" placeholder="Name" required="" />
                            <label for="name" class="form__label">Alamat</label>
                        </div>
                        <div class="form__group field">
                        <label for="name" class="form__label">Penanda</label>
                            <select class="form__field" id="spinner_penanda_cust" name="spinner_penanda_cust">
                                <option >Normal</option>
                                <option >Blacklist</option>
                                <option >Warning</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="refresh">
                <button type="submit" name="refresh" onclick="refreshCustomer()">
                    <i class="fa-solid fa-rotate-right" style="color: #000000"></i>
                </button>
                <script>
                    function refreshCustomer() {
                        document.getElementById('txt_nama_cust').value = '';
                        document.getElementById('txt_telp_cust').value = '';
                        document.getElementById('txt_alamat_cust').value = '';
                        document.getElementById('spinner_penanda_cust').selectedIndex = 0;
                    }
                </script>
            </div>
            <div class="update">
                <button type="submit" name="btn_update" >Update</button>
            </div>
            <div class="save">
            <!-- <button><i class="fa-solid fa-rotate-right" style="color: #000000;"></i></button> -->
                <button type="submit" name="btn_save_cust" >Simpan</button>
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
                        <th>Nama Customer</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Penanda</th>
                        <th>Akses</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $query="select * from user where akses='customer'";
                    $result=mysqli_query($koneksi, $query);
                    $no=1;
                    while($row=mysqli_fetch_array($result)){
                        $id_karyawan=$row['id_user'];
                        $nama_karyawan=$row['nama'];
                        $alamat_karyawan=$row['alamat'];
                        $noTelepon_karyawan=$row['no_telepon'];
                        $penanda=$row['penanda'];
                        $akses=$row['akses'];
                        //$password_karyawan=$row['password'];
                ?>
                    <tr>
                        <td><?php echo $no; ?></td>    
                        <td><?php echo $nama_karyawan; ?></td>
                        <td><?php echo $noTelepon_karyawan; ?></td>
                        <td><?php echo $alamat_karyawan; ?></td>
                        <td><?php echo $penanda; ?></td>
                        <td><?php echo $akses; ?></td>
                        <td>
                            <button><a href="customer.php?edit_cust=<?php echo $id_karyawan; ?>"><i class="fa-solid fa-pen-to-square"></i></a></button>
                            <button><a href="customer.php?hapus_cust=<?php echo $id_karyawan; ?>" onclick="return confirm('apakah kamu yakin akan menghapus data ini?');" ><i class="fa-solid fa-trash"></i></a></button>
                            <?php
                            if (isset($_GET['edit_cust'])) {   
                            $id_edit=$_GET['edit_cust'];
                            $query="select * from user where id_user='$id_edit'";
                            $result=mysqli_query($koneksi, $query);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row=mysqli_fetch_array($result)) {
                                    $id_karywn=$row['id_user'];
                                    $nama=$row['nama'];
                                    $telepon=$row['no_telepon'];
                                    $alamat=$row['alamat'];
                                    $penanda=$row['penanda'];
                                    ?>
                                    <script>
                                        document.getElementById('txt_id_cust').value="<?php echo $id_karywn; ?>";
                                        document.getElementById('txt_nama_cust').value="<?php echo $nama; ?>";
                                        document.getElementById('txt_telp_cust').value="<?php echo $telepon; ?>";
                                        document.getElementById('txt_alamat_cust').value="<?php echo $alamat; ?>";
                                        document.getElementById('spinner_penanda_cust').value="<?php echo $penanda; ?>";
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