<?php
require("../login/koneksi.php");
// session_start();
date_default_timezone_set("Asia/Jakarta");
function hari_ini(){
    $hari=date("D");
    switch ($hari) {
        case 'Sun':
            $hari_ini='Minggu';
            break;
        case 'Mon':
            $hari_ini='Senin';
            break;
        case 'Tue':
            $hari_ini='Selasa';
            break;
        case 'Wed':
            $hari_ini='Rabu';
            break;
        case 'Thu':
            $hari_ini='Kamis';
            break;
        case 'Fri':
            $hari_ini='Jumat';
            break;
        case 'Sat':
            $hari_ini='Sabtu';
            break;
        default:
            $hari_ini='Tidak diketahui';
            break;
    } return $hari_ini;
}

$now=new DateTime();
$hari_iniTGL=$now->format('d-m-Y');
    switch (date('m', strtotime($hari_iniTGL))) {
            case '01':
                $bulan='Januari';
                break;
            case '02':
                $bulan='Februari';
                break;
            case '03':
                $bulan='Maret';
                break;
            case '04':
                $bulan='April';
                break;
            case '05':
                $bulan='Mei';
                break;
            case '06':
                $bulan='Juni';
                break;
            case '07':
                $bulan='Julii';
                break;
            case '08':
                $bulan='Agustus';
                break;
            case '09':
                $bulan='September';
                break;
            case '010':
                $bulan='Oktober';
                break;
            case '11':
                $bulan='November';
                break;
            case '12':
                $bulan='Desember';
                break;
        default:
        $bulan='Tidak diketahui';
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendapatan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="pendapatan.css">
</head>
<script>
    window.onresize = function() {
        var c = document.getElementById("pieChart");
        c.resize();
    }
</script>
<style>
    #left-menu {
        display: none;
        position: absolute;
        background-color: black;
        color: white;
        left: 0;
        top:4.8%;
        height:100%;
        width:25%;
        max-width:270px;
    }
    .change .bar1 {
        -webkit-transform: rotate(-45deg) translate(-9px, 6px);
        transform: rotate(-45deg) translate(-9px, 6px);
    }

    .change .bar2 {opacity: 0;}

    .change .bar3 {
        -webkit-transform: rotate(45deg) translate(-8px, -8px);
        transform: rotate(45deg) translate(-8px, -8px);
    }

    #left-menu h1{
        border-bottom-style: solid;
    }

    #left-menu .inactive {
        font-size: 25px;
        color: white;
        text-decoration: none;
    }

    #left-menu .active {
        font-size: 25px;
        color: rgba(255, 255, 255, 0.5);
        text-decoration: none;
    }
    #left-menu .active:hover {
        color: white;
    }

    #main-content {
        position: fixed;
        color: black;
        left: 30%;
        top: 35%;
        height: 100%;
        width: 50%;
        animation: fadeIn 2s;
    }
</style>
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
                    <p> <?php echo $nama;?><br> <span class="Keterangan">Supplier</span></p>
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
    <div class="date">
        <div class="datetime">
            <p><?php echo hari_ini().',  '.date('d', strtotime($hari_iniTGL)).' '.$bulan.' '.date('Y', strtotime($hari_iniTGL)); ?></p>
            <img src="../img/Group 9.png" alt="">
        </div>
    </div>
    <div class="table">
        <h3>DETAIL PENJUALAN</h3>
        <div class="table-penjualan">
            <table>
            <thead>
                    <tr>
                        <th>Nama <br> Barang</th>
                        <th>Nama <br> Supplier</th>
                        <th>Jam Input</th>
                        <th>Stok</th>
                        <th>Sisa</th>
                        <th>Laku</th>
                        <th>Total</th>
                    </tr>
                    <tbody>
                        <?php
                        if(isset($_GET['id_supplier'])){
                            $id=$_GET['id_supplier'];
                            $query="SELECT barang.nama_barang, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, detail_suppmenu_etalase.jumlah_setor * supplier_menu.harga_beli AS total FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE user.id_user='$id' AND detail_suppmenu_etalase.tanggal_setor=curdate() GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                            $result=mysqli_query($koneksi, $query);
                            while ($row=mysqli_fetch_array($result)) { 
                                $nama_brg=$row['nama_barang'];
                                $nama_user=$row['nama'];
                                $harga_beli=$row['harga_beli'];
                                $jam=$row['jam'];
                                $jumlah_setor=$row['jumlah_setor'];
                                $sisa=$row['sisa'];
                                $laku=$row['laku'];
                                $hasil=$row['total'];
                        ?>
                        <tr>
                            <td><?php echo $nama_brg; ?></td>
                            <td><?php echo $nama_user; ?></td>
                            <td><?php echo $jam; ?></td>
                            <td><?php echo $jumlah_setor; ?></td>
                            <td><?php echo $sisa; ?></td>
                            <td><?php echo $laku; ?></td>
                            <td>Rp <?php echo number_format($hasil, 0,',','.'); ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    </thead>
            </table>
        </div>
    </div>
    <section>
        <div class="container-pendapatan">
            <div class="penjualan">
                <h2> Penjualan</h2>
                <?php
                        $penjualan_total=0;
                        $query="SELECT barang.nama_barang, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, detail_suppmenu_etalase.jumlah_setor * supplier_menu.harga_beli AS total FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE user.id_user='$id' AND detail_suppmenu_etalase.tanggal_setor=curdate() GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                            $result=mysqli_query($koneksi, $query);
                            while ($row=mysqli_fetch_array($result)) { 
                                $nama_brg=$row['nama_barang'];
                                $nama_user=$row['nama'];
                                $harga_beli=$row['harga_beli'];
                                $jam=$row['jam'];
                                $jumlah_setor=$row['jumlah_setor'];
                                $sisa=$row['sisa'];
                                $laku=$row['laku'];
                                $hasil=$row['total'];
                        $penjualan_total += $hasil;
                    ?>
                    <?php } ?>
                    <h3 id="penjualan" >Rp.<?php echo number_format($penjualan_total, 0,',','.');?></h3>
            </div>
            <div class="pesanan">
                <h2>Pesanan</h2>
                <?php
                $pendapatan_total=0;
                $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=curdate() AND user.id_user='$id' ORDER BY status_transaksi.jam;";
                $result=mysqli_query($koneksi, $query);
                while ($row=mysqli_fetch_array($result)) {
                    $no_nota=$row['no_nota'];
                    $tanggal=$row['tgl_pengambilan'];
                    $jam=$row['jam'];
                    $qty=$row['qty'];
                    $total=$row['total'];
                    $nama_barang=$row['nama_barang'];
                    $nama=$row['nama'];
                    $pendapatan_total += $total;
                ?>
                <?php } ?>
                <h3 id="pendapatan" ><?php echo number_format($pendapatan_total, 0,',','.');?></h3>
            </div>
            <div class="total">
                <h2>TOTAL PENDAPATAN</h2>
                <h3 id="total"></h3>
            </div>
            <script>
                var penjualanTotal = <?php echo $penjualan_total; ?>;
                var pendapatanTotal = <?php echo $pendapatan_total; ?>;
                var totalPendapatan = penjualanTotal + pendapatanTotal;
                document.getElementById('total').innerHTML = totalPendapatan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            </script>
        </div>
    </section>
    <div id="main-content">
        <pie-chart id="pieChart" style="display:block;height:50%;width:100%;position:relative;">
                    <?php
                        $penjualan_total=0;
                        $query="SELECT barang.nama_barang, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, detail_suppmenu_etalase.jumlah_setor * supplier_menu.harga_beli AS total FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE user.id_user='$id' AND detail_suppmenu_etalase.tanggal_setor=curdate() GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                            $result=mysqli_query($koneksi, $query);
                            while ($row=mysqli_fetch_array($result)) { 
                                $nama_brg=$row['nama_barang'];
                                $nama_user=$row['nama'];
                                $harga_beli=$row['harga_beli'];
                                $jam=$row['jam'];
                                $jumlah_setor=$row['jumlah_setor'];
                                $sisa=$row['sisa'];
                                $laku=$row['laku'];
                                $hasil=$row['total'];
                        $penjualan_total += $hasil;
                    }
                    ?>
            <pchart-element name="Penjualan" value="<?php echo $penjualan_total;?>" colour="#40A090">
            <?php
                $pendapatan_total=0;
                $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=curdate() AND user.id_user='$id' ORDER BY status_transaksi.jam";
                $result=mysqli_query($koneksi, $query);
                while ($row=mysqli_fetch_array($result)) {
                    $no_nota=$row['no_nota'];
                    $tanggal=$row['tgl_pengambilan'];
                    $jam=$row['jam'];
                    $qty=$row['qty'];
                    $total=$row['total'];
                    $nama_barang=$row['nama_barang'];
                    $nama=$row['nama'];
                    $pendapatan_total += $total;
                }
                ?>
            <pchart-element name="Pesanan" value="<?php echo $pendapatan_total;?>" colour="#BE7A74">
        </pie-chart>
    </div>
</body>
<script type = "text/javascript">
    function myFunction(x) {
        if (document.getElementById("left-menu").style.display == "block")
        {
            document.getElementById("left-menu").style.display = "none";
            document.getElementById("main-content").style.left = "0";
            document.getElementById("main-content").style.width = "100%";
        } else {
            document.getElementById("left-menu").style.display = "block";
            document.getElementById("main-content").style.left = document.getElementById("left-menu").offsetWidth;
            document.getElementById("main-content").style.width = window.innerWidth - document.getElementById("left-menu").offsetWidth;
        }
        x.classList.toggle("change");
        var c = document.getElementById("pieChart");
        c.resize();
    }
</script>
<script src="pie-chart-js.js">
</script> 
    <div class="tabel">
        <h3>DETAIL PENJUALAN</h3>
        <div class="tabel-pesanan">
            <table>
                <thead>
                <tr>
                        <th>No. Nota</th>
                        <th>Nama <br> Barang</th>
                        <th>Mana <br> Supplier</th>
                        <th>Jam Antar</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                    <tbody>
                        <?php
                            $pendapatan_total=0;
                            $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=curdate() AND user.id_user='$id' ORDER BY status_transaksi.jam ";
                            $result=mysqli_query($koneksi, $query);
                            while ($row=mysqli_fetch_array($result)) {
                                $no_nota=$row['no_nota'];
                                $tanggal=$row['tgl_pengambilan'];
                                $jam=$row['jam'];
                                $qty=$row['qty'];
                                $total=$row['total'];
                                $nama_barang=$row['nama_barang'];
                                $nama=$row['nama'];
                                $pendapatan_total += $total;
                        ?>
                        <tr>
                            <td><?php echo $no_nota;?></td>
                            <td><?php echo $nama_barang;?></td>
                            <td><?php echo $nama;?></td>
                            <td><?php echo $jam;?></td>
                            <td><?php echo $qty;?></td>
                            <td>Rp <?php echo number_format($total, 0,',','.'); ?></td>
                        </tr>
                        <?php
                            } }
                        ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</body>
</html>