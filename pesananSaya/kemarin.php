<?php
require("../login/koneksi.php");
session_start();
date_default_timezone_set("Asia/Jakarta");

function hari_ini() {
    $hari = date("D");
    switch ($hari) {
        case 'Sun':
            $hari_ini = 'Minggu';
            break;
        case 'Mon':
            $hari_ini = 'Senin';
            break;
        case 'Tue':
            $hari_ini = 'Selasa';
            break;
        case 'Wed':
            $hari_ini = 'Rabu';
            break;
        case 'Thu':
            $hari_ini = 'Kamis';
            break;
        case 'Fri':
            $hari_ini = 'Jumat';
            break;
        case 'Sat':
            $hari_ini = 'Sabtu';
            break;
        default:
            $hari_ini = 'Tidak diketahui';
            break;
    } 
    return $hari_ini;
}

$now = new DateTime();
$hari_ini_tgl = $now->format('d-m-Y');
$hari_ini = hari_ini();

$kemarin = clone $now;
$kemarin->modify('-1 day');
$kemarin_tgl = $kemarin->format('d-m-Y');
$kemarin_hari = hari_ini($kemarin);

// Tanggal besok
$besok = clone $now;
$besok->modify('+1 day');
$besok_tgl = $besok->format('d-m-Y');
$besok_hari = hari_ini($besok);

setlocale(LC_TIME, 'id_ID');
$bulan_ini = strftime('%B', strtotime($hari_ini_tgl));
$bulan_kemarin = strftime('%B', strtotime($kemarin_tgl));
$bulan_besok = strftime('%B', strtotime($besok_tgl));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemarin</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="kemarin1.css" />
</head>
<body>
<?php
        $nama=$_GET['nama'];
        $id=$_GET['id_supplier'];
    ?>
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
                    <p> <?php echo $nama;?><br><span class="Keterangan">Supplier</span></p>
                </li>
                <li class="options">
                    <img src="../img/Vector(3).png" alt="profile2">
                    <p><a href="../editProfil/lihatProfil.php?id_supplier=<?php echo $id;?>&nama=<?php echo $nama;?>">Profil Saya</a></p>
                </li>
                <li class="options">
                    <img src="../img/Pengaturan.png" alt="pengaturan">
                    <p><a href="../editProfil/editProfil.php?id_supplier=<?php echo $id;?>&nama=<?php echo $nama;?>">Edit Profile</a></p>
                </li>
                <li class="options">
                    <img src="../img/logout.png" alt="logout">
                    <p><a href="../login/login.php">Logout</a></p>
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
    <div class="navbar">
        <div class="content">
            <ul>
                <li class="baru" id="baruItem">
                    <a href="../pesananSaya/kemarin.php?id_supplier=<?php echo $id;?>&nama=<?php echo $nama;?>" onclick="togglePesanan('baru')">Kemarin</a>
                    <div class="img2">
                        <img src="../img/proses.png" alt="" class="gambar-pesanan" id="baruImage" style="display: inline;" />
                    </div>
                </li>
            </ul>
        </div>
        <div class="content1">
            <ul>
                <li class="proses" id="prosesItem">
                    <a href="../pesananSaya/hariIni.php?id_supplier=<?php echo $id;?>&nama=<?php echo $nama;?>" onclick="togglePesanan('proses')">Hari Ini</a>
                    <div class="img3">
                        <img src="../img/Frame(4).png" alt="" class="gambar-pesanan" id="prosesImage" style="display: inline;" />
                    </div>
                </li>
            </ul>
        </div>
        <div class="content3">
            <ul>
                <li class="ajukanBatal" id="batalItem">
                    <a href="../pesananSaya/besok.php?id_supplier=<?php echo $id;?>&nama=<?php echo $nama;?>" onclick="togglePesanan('ajukan')">Besok</a>
                    <div class="img3">
                        <img src="../img/Ajukan-batal.png" alt="" class="gambar-pesanan" id="prosesImage" style="display: inline;" />
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-content">
        <div class="content-yesterday">
            <table>
                <thead> 
                    <tr>
                        <td>
                            <div class="table-header">
                                <div class="kemarin-header">
                                    <h2>Kemarin</h2>
                                </div>
                                <div class="tgl-kemarin">
                                    <h3>| <?php echo date('d', strtotime($kemarin_tgl)).' '.$bulan_kemarin .' '.date('Y', strtotime($kemarin_tgl)); ?></h3>
                                </div>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                <?php
                            if(isset($_GET['id_supplier'])){
                                $id=$_GET['id_supplier'];
                                $query="SELECT SUM(detail_transaksi.qty) as total_qty, barang.id_barang, barang.nama_barang, status_transaksi.tanggal_pengambilan, status_transaksi.jam FROM barang JOIN detail_transaksi ON detail_transaksi.id_barang=barang.id_barang JOIN transaksi ON detail_transaksi.no_nota=transaksi.no_nota JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota WHERE status_transaksi.tanggal_pengambilan=DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND detail_transaksi.id_suplier='$id' GROUP BY barang.id_barang";
                                $result=mysqli_query($koneksi, $query);
                                while ($row=mysqli_fetch_array($result)) {
                                    $total_qty=$row['total_qty'];
                                    $id_barang=$row['id_barang'];
                                    $nama_barang=$row['nama_barang'];
                                    $tanggal=$row['tanggal_pengambilan'];
                                    $jam=$row['jam'];
                            ?>
                    <tr>
                        <td>
                            <div class="menu">
                                <div class="first-menu">
                                    <div class="nama-menu">
                                        <h4><?php echo $nama_barang;?></h4>
                                    </div>
                                    <div class="time">
                                        <img src="../img/clock.png" alt="">
                                        <p><?php echo $jam; ?></p>
                                    </div>
                                </div>
                                <div class="second-menu">
                                    <div class="jumlah">
                                        <h3><?php echo $total_qty;?></h3>
                                        <p>Pcs</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="content-today">
            <table>
                <thead>
                    <tr>
                        <td>
                            <div class="table-header">
                                <div class="today-header">
                                    <h2>Hari Ini</h2>
                                </div>
                                <div class="tgl-today">
                                    <h3>| <?php echo $hari_ini.',  '.date('d', strtotime($hari_ini_tgl)).' '.$bulan_ini.' '.date('Y', strtotime($hari_ini_tgl)); ?></h3>
                                </div>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                                $query="SELECT SUM(detail_transaksi.qty) as total_qty, barang.id_barang, barang.nama_barang, status_transaksi.tanggal_pengambilan, status_transaksi.jam FROM barang JOIN detail_transaksi ON detail_transaksi.id_barang=barang.id_barang JOIN transaksi ON detail_transaksi.no_nota=transaksi.no_nota JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota WHERE status_transaksi.tanggal_pengambilan=curdate() AND detail_transaksi.id_suplier='$id' GROUP BY barang.id_barang";
                                $result=mysqli_query($koneksi, $query);
                                while ($row=mysqli_fetch_array($result)) {
                                    $total_qty=$row['total_qty'];
                                    $id_barang=$row['id_barang'];
                                    $nama_barang=$row['nama_barang'];
                                    $tanggal=$row['tanggal_pengambilan'];
                                    $jam=$row['jam'];
                            ?>
                        <td>
                            <div class="menu">
                                <label class="container">
                                    <input type="checkbox" checked="checked">
                                        <h4></h4>
                                </label>
                                <div class="first-menu">
                                    <div class="nama-menu">
                                        <h4><?php echo $nama_barang;?></h4>
                                    </div>
                                    <div class="time">
                                        <img src="../img/clock.png" alt="">
                                        <p><?php echo $jam; ?></p>
                                    </div>
                                </div>
                                <div class="second-menu">
                                    <div class="jumlah">
                                        <h3><?php echo $total_qty;?></h3>
                                        <p>Pcs</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="content-tomorrow">
            <table>
                <thead>
                    <tr>
                        <td>
                            <div class="table-header">
                                <div class="tomorrow-header">
                                    <h2>Besok</h2>
                                </div>
                                <div class="tgl-tomorrow">
                                    <h3>| <?php echo date('d', strtotime($besok_tgl )).' '.$bulan_besok  .' '.date('Y', strtotime($besok_tgl )); ?></h3>
                                </div>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <?php
                            $query="SELECT SUM(detail_transaksi.qty) as total_qty, barang.id_barang, barang.nama_barang, status_transaksi.tanggal_pengambilan, status_transaksi.jam FROM barang JOIN detail_transaksi ON detail_transaksi.id_barang=barang.id_barang JOIN transaksi ON detail_transaksi.no_nota=transaksi.no_nota JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota WHERE status_transaksi.tanggal_pengambilan=DATE_ADD(CURDATE(), INTERVAL 1 DAY) AND detail_transaksi.id_suplier='$id' GROUP BY barang.id_barang";
                            $result=mysqli_query($koneksi, $query);
                            while ($row=mysqli_fetch_array($result)) {
                                $total_qty=$row['total_qty'];
                                $id_barang=$row['id_barang'];
                                $nama_barang=$row['nama_barang'];
                                $tanggal=$row['tanggal_pengambilan'];
                                $jam=$row['jam'];
                        ?>
                        <td>
                            <div class="menu">
                                <div class="first-menu">
                                    <div class="nama-menu">
                                        <h4><?php echo $nama_barang;?></h4>
                                    </div>
                                    <div class="time">
                                        <img src="../img/clock.png" alt="">
                                        <p><?php echo $jam; ?></p>
                                    </div>
                                </div>
                                <div class="second-menu">
                                    <div class="jumlah">
                                        <h3><?php echo $total_qty;?></h3>
                                        <p>Pcs</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php } 
                    } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>