<?php
require("../login/koneksi.php");
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="laporan.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
 
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['', 'Penjualan', 'Pemesanan', 'Total'],
          <?php
            $pendapatan_total=0;
            $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=curdate() ORDER BY status_transaksi.jam";
            $result=mysqli_query($koneksi, $query);
            while ($row=mysqli_fetch_array($result)) {
                $no_nota=$row['no_nota'];
                $tanggal=$row['tanggal_pengambilan'];
                $jam=$row['jam'];
                $qty=$row['qty'];
                $total=$row['total'];
                $nama_barang=$row['nama_barang'];
                $nama=$row['nama'];
                $pendapatan_total += $total;
            }
            $penjualan_total=0;
                        $query="SELECT barang.nama_barang, barang.harga_jual, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli ) AS total, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) AS untung, (((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) - ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli )) AS bersih  FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE detail_suppmenu_etalase.tanggal_setor=curdate() GROUP BY detail_suppmenu_etalase.id_setorEtalase;";
                        $result=mysqli_query($koneksi, $query);
                        while ($row=mysqli_fetch_array($result)) { 
                            $nama_brg=$row['nama_barang'];
                            $nama_user=$row['nama'];
                            $harga_beli=$row['harga_beli'];
                            $jam=$row['jam'];
                            $jumlah_setor=$row['jumlah_setor'];
                            $sisa=$row['sisa'];
                            $laku=$row['laku'];
                            $hasil=$row['bersih'];
                            $penjualan_total += $hasil;
            }
            $pendapatan_kmrn=0;
            $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=DATE_SUB(CURDATE(), INTERVAL 1 DAY) ORDER BY status_transaksi.jam";
            $result=mysqli_query($koneksi, $query);
            while ($row=mysqli_fetch_array($result)) {
                $no_nota=$row['no_nota'];
                $tanggal=$row['tanggal_pengambilan'];
                $jam=$row['jam'];
                $qty=$row['qty'];
                $total=$row['total'];
                $nama_barang=$row['nama_barang'];
                $nama=$row['nama'];
                $pendapatan_kmrn += $total;
            }
            $penjualan_kmrn=0;
                        $query="SELECT barang.nama_barang, barang.harga_jual, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli ) AS total, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) AS untung, (((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) - ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual )) AS bersih  FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE detail_suppmenu_etalase.tanggal_setor=DATE_SUB(CURDATE(), INTERVAL 1 DAY) GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                        $result=mysqli_query($koneksi, $query);
                        while ($row=mysqli_fetch_array($result)) { 
                            $nama_brg=$row['nama_barang'];
                            $nama_user=$row['nama'];
                            $harga_beli=$row['harga_beli'];
                            $jam=$row['jam'];
                            $jumlah_setor=$row['jumlah_setor'];
                            $sisa=$row['sisa'];
                            $laku=$row['laku'];
                            $hasil=$row['bersih'];
                            $penjualan_kmrn += $hasil;
            }
            $pendapatan_kmrn2=0;
            $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=DATE_SUB(CURDATE(), INTERVAL 2 DAY) ORDER BY status_transaksi.jam";
            $result=mysqli_query($koneksi, $query);
            while ($row=mysqli_fetch_array($result)) {
                $no_nota=$row['no_nota'];
                $tanggal=$row['tanggal_pengambilan'];
                $jam=$row['jam'];
                $qty=$row['qty'];
                $total=$row['total'];
                $nama_barang=$row['nama_barang'];
                $nama=$row['nama'];
                $pendapatan_kmrn2 += $total;
            }
            $penjualan_kmrn2=0;
                        $query="SELECT barang.nama_barang, barang.harga_jual, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli ) AS total, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) AS untung, (((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) - ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual )) AS bersih  FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE detail_suppmenu_etalase.tanggal_setor=DATE_SUB(CURDATE(), INTERVAL 2 DAY) GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                        $result=mysqli_query($koneksi, $query);
                        while ($row=mysqli_fetch_array($result)) { 
                            $nama_brg=$row['nama_barang'];
                            $nama_user=$row['nama'];
                            $harga_beli=$row['harga_beli'];
                            $jam=$row['jam'];
                            $jumlah_setor=$row['jumlah_setor'];
                            $sisa=$row['sisa'];
                            $laku=$row['laku'];
                            $hasil=$row['bersih'];
                            $penjualan_kmrn2 += $hasil;
            }
            $pendapatan_kmrn3=0;
            $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=DATE_SUB(CURDATE(), INTERVAL 3 DAY) ORDER BY status_transaksi.jam";
            $result=mysqli_query($koneksi, $query);
            while ($row=mysqli_fetch_array($result)) {
                $no_nota=$row['no_nota'];
                $tanggal=$row['tanggal_pengambilan'];
                $jam=$row['jam'];
                $qty=$row['qty'];
                $total=$row['total'];
                $nama_barang=$row['nama_barang'];
                $nama=$row['nama'];
                $pendapatan_kmrn3 += $total;
            }
            $penjualan_kmrn3=0;
                        $query="SELECT barang.nama_barang, barang.harga_jual, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli ) AS total, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) AS untung, (((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) - ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual )) AS bersih  FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE detail_suppmenu_etalase.tanggal_setor=DATE_SUB(CURDATE(), INTERVAL 3 DAY) GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                        $result=mysqli_query($koneksi, $query);
                        while ($row=mysqli_fetch_array($result)) { 
                            $nama_brg=$row['nama_barang'];
                            $nama_user=$row['nama'];
                            $harga_beli=$row['harga_beli'];
                            $jam=$row['jam'];
                            $jumlah_setor=$row['jumlah_setor'];
                            $sisa=$row['sisa'];
                            $laku=$row['laku'];
                            $hasil=$row['bersih'];
                            $penjualan_kmrn3 += $hasil;
            }
            $pendapatan_kmrn4=0;
            $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=DATE_SUB(CURDATE(), INTERVAL 3 DAY) ORDER BY status_transaksi.jam";
            $result=mysqli_query($koneksi, $query);
            while ($row=mysqli_fetch_array($result)) {
                $no_nota=$row['no_nota'];
                $tanggal=$row['tanggal_pengambilan'];
                $jam=$row['jam'];
                $qty=$row['qty'];
                $total=$row['total'];
                $nama_barang=$row['nama_barang'];
                $nama=$row['nama'];
                $pendapatan_kmrn4 += $total;
            }
            $penjualan_kmrn4=0;
                        $query="SELECT barang.nama_barang, barang.harga_jual, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli ) AS total, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) AS untung, (((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) - ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual )) AS bersih  FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE detail_suppmenu_etalase.tanggal_setor=DATE_SUB(CURDATE(), INTERVAL 3 DAY) GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                        $result=mysqli_query($koneksi, $query);
                        while ($row=mysqli_fetch_array($result)) { 
                            $nama_brg=$row['nama_barang'];
                            $nama_user=$row['nama'];
                            $harga_beli=$row['harga_beli'];
                            $jam=$row['jam'];
                            $jumlah_setor=$row['jumlah_setor'];
                            $sisa=$row['sisa'];
                            $laku=$row['laku'];
                            $hasil=$row['bersih'];
                            $penjualan_kmrn4 += $hasil;
            }
          ?>
        //   ['4 days ago', <?php //$pendapatan_kmrn4;?>, <?php //$penjualan_kmrn4;?>, <?php //$pendapatan_kmrn4 += $penjualan_kmrn4;?>],
          //['3 days ago', <?php //$penjualan_kmrn3;?>, <?php //$pendapatan_kmrn3;?>, <?php //$penjualan_kmrn3 += $pendapatan_kmrn3;?>],
          ['2 days ago', <?php $pendapatan_kmrn2;?>, <?php $pendapatan_kmrn2;?>, <?php echo $penjualan_kmrn2 += $pendapatan_kmrn2;?>],
          ['Yesterday', <?php $pendapatan_kmrn;?>, <?php echo $penjualan_kmrn?>, <?php echo $pendapatan_kmrn += $penjualan_kmrn;?>],
          ['Today', <?php echo $pendapatan_total;?>, <?php echo $penjualan_total;?>, <?php echo $pendapatan_total += $penjualan_total;?>]
        ]);

        var options = {
          chart: {
           
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
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
            position: absolute;
            color: black;
            left: 25%;
            top: 158% ;
            height: 100%;
            width: 50%;
        }
    </style>
</head>
<body>
<form action="laporan.php" method="post">
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
    <!-- <div class="date">
        <div data-aos="fade-left" data-aos-duration="1200" class="datetime">
            <input type="date">
            <img src="../img/Group 9.png" alt="">
        </div>
    </div> -->
    <div data-aos="zoom-in" data-aos-duration="1200" class="grafik">
        <div id="columnchart_material" style="width: 1100px; height: 200px;"></div>
    </div>
    <section class="PenjualanPemesanan">
        <div class="container PenjualanPemesanan">
            <div data-aos="fade-up" data-aos-duration="1200" class="bersih">
                <h2><a href="#pendptn">Pendapatan Bersih</a></h2>
                <h3 id="bersih"></h3>
            </div>
            <div data-aos="fade-up" data-aos-duration="1400" class="setoran">
                <h2><a href="#setorn">Setoran Supplier</a></h2>
                <?php
                            $setoran_total=0;
                            $query="SELECT user.nama, SUM(detail_suppmenu_etalase.jumlah_setor) AS setoran, SUM(detail_suppmenu_etalase.sisa) AS sisa, barang.harga_jual, supplier_menu.harga_beli, (SUM(detail_suppmenu_etalase.jumlah_setor) * barang.harga_jual) AS total_nominal, (SUM(detail_suppmenu_etalase.jumlah_setor) * supplier_menu.harga_beli - SUM(detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli) AS pengeluaran, ((SUM(detail_suppmenu_etalase.jumlah_setor) * barang.harga_jual) - (SUM(detail_suppmenu_etalase.jumlah_setor) * supplier_menu.harga_beli - SUM(detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli)) AS pendapatan FROM barang JOIN supplier_menu ON barang.id_barang=supplier_menu.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE detail_suppmenu_etalase.tanggal_setor=curdate() GROUP BY user.nama, barang.harga_jual";
                            $result=mysqli_query($koneksi, $query);
                            while($row=mysqli_fetch_array($result)){
                                $nama=$row['nama'];
                                $setoran=$row['setoran'];
                                $sisa=$row['sisa'];
                                $harga_jual=$row['harga_jual'];
                                $total=$row['total_nominal'];
                                $pengeluaran=$row['pengeluaran'];
                                $pendapatan=$row['pendapatan'];
                                $setoran_total += $pengeluaran;
                            }
                        ?>
                <h3 id="setoran_supp"></h3>
            </div>
            <div data-aos="fade-up" data-aos-duration="1600" class="kotor">
                <h2><a href="#ktr">Pendapatan Kotor</a></h2>
                <h3 id="pendapatan_kotor"></h3>
            </div>
            <div data-aos="fade-up" data-aos-duration="1800" class="pesan">
                <h2><a href="#uang-pesan">Uang Pesanan</a></h2>
                        <?php
                            $uang_pesanan=0;
                            $query="SELECT user.nama, transaksi.no_nota, SUM(detail_transaksi.qty) AS total_qty, status_transaksi.tanggal_pengambilan, transaksi.grand_total, transaksi.status_bayar, user.penanda FROM user JOIN transaksi ON user.id_user=transaksi.id_customer JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota WHERE status_transaksi.tanggal_pengambilan BETWEEN curdate() AND DATE_ADD(CURDATE(), INTERVAL 1 DAY) GROUP BY transaksi.no_nota ORDER BY status_transaksi.tanggal_pengambilan ASC";
                            $result=mysqli_query($koneksi, $query);
                            while($row=mysqli_fetch_array($result)){
                                $nama=$row['nama'];
                                $no_nota=$row['no_nota'];
                                $total_qty=$row['total_qty'];
                                $tanggal=$row['tanggal_pengambilan'];
                                $total=$row['grand_total'];
                                $status=$row['status_bayar'];
                                $penanda=$row['penanda'];
                                $uang_pesanan += $total;
                            }
                        ?>
                <h3 id="uang_pesanan"></h3>
            </div>
        </div>
    </section>
    <div id="pendptn" class="p"></div>
    <div data-aos="fade-up" data-aos-duration="1200" class="pendapatan">
        <h1 ><a href="#">PENDAPATAN BERSIH</a></h1>
    </div>
    <section>
        <div class="container-pendapatan">
            <div data-aos="fade-up" data-aos-duration="1200" class="penjualan">
                <h2>Penjualan</h2>
                    <?php
                        $penjualan_total=0;
                        $query="SELECT barang.nama_barang, barang.harga_jual, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli ) AS total, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) AS untung, (((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) - ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli )) AS bersih  FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE detail_suppmenu_etalase.tanggal_setor=curdate() GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                        $result=mysqli_query($koneksi, $query);
                        while ($row=mysqli_fetch_array($result)) { 
                            $nama_brg=$row['nama_barang'];
                            $nama_user=$row['nama'];
                            $harga_beli=$row['harga_beli'];
                            $jam=$row['jam'];
                            $jumlah_setor=$row['jumlah_setor'];
                            $sisa=$row['sisa'];
                            $laku=$row['laku'];
                            $hasil=$row['bersih'];
                            $penjualan_total += $hasil;
                        }
                        ?>
                <h3 id="penjualan" ></h3>
            </div>
            <div data-aos="fade-up" data-aos-duration="1400" class="pesanan">
                <h2>Pesanan</h2>
                        <?php
                            $pendapatan_total=0;
                            $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=curdate() ORDER BY status_transaksi.jam";
                            $result=mysqli_query($koneksi, $query);
                            while ($row=mysqli_fetch_array($result)) {
                                $no_nota=$row['no_nota'];
                                $tanggal=$row['tanggal_pengambilan'];
                                $jam=$row['jam'];
                                $qty=$row['qty'];
                                $total=$row['total'];
                                $nama_barang=$row['nama_barang'];
                                $nama=$row['nama'];
                                $pendapatan_total += $total;
                            }
                        ?>
                <h3 id="pendapatan" ></h3>
            </div>
            <div data-aos="fade-up" data-aos-duration="1200" class="hasil">
                <h2>TOTAL PENDAPATAN</h2>
                <h3 id="total" ></h3>
                <script>
                var penjualanTotal = <?php echo $penjualan_total; ?>;
                document.getElementById('penjualan').innerHTML = penjualanTotal.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                var pendapatanTotal = <?php echo $pendapatan_total; ?>;
                document.getElementById('pendapatan').innerHTML = pendapatanTotal.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                var totalPendapatan = penjualanTotal + pendapatanTotal;
                document.getElementById('total').innerHTML = totalPendapatan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                document.getElementById('bersih').innerHTML = totalPendapatan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
                var setoran_total = <?php echo $setoran_total;?>;
                document.getElementById('setoran_supp').innerHTML = setoran_total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });  
                var uang_pesanan = <?php echo $uang_pesanan;?>;
                document.getElementById('uang_pesanan').innerHTML = uang_pesanan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            </script>
            </div>
        </div>
    </section>
    <div data-aos="fade-right" data-aos-duration="1200" class="table">
        <div class="title-penjualan">
            <h3>DETAIL PENJUALAN</h3>
        </div>
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
                        $query="SELECT barang.nama_barang, barang.harga_jual, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli ) AS total, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) AS untung, (((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) - ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual )) AS bersih  FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE detail_suppmenu_etalase.tanggal_setor=curdate() GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                        $result=mysqli_query($koneksi, $query);
                        while ($row=mysqli_fetch_array($result)) { 
                            $nama_brg=$row['nama_barang'];
                            $nama_user=$row['nama'];
                            $harga_beli=$row['harga_beli'];
                            $jam=$row['jam'];
                            $jumlah_setor=$row['jumlah_setor'];
                            $sisa=$row['sisa'];
                            $laku=$row['laku'];
                            $hasil=$row['bersih'];
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
    
    <div data-aos="fade-up" data-aos-duration="1600" id="main-content">
        <pie-chart id="pieChart" style="display:block;height:50%;width:100%;position:relative;">
        <?php
            $penjualan_total=0;
            $query="SELECT barang.nama_barang, barang.harga_jual, supplier_menu.harga_beli, user.nama, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa AS laku, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli ) AS total, ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) AS untung, (((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * barang.harga_jual ) - ((detail_suppmenu_etalase.jumlah_setor - detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli )) AS bersih  FROM barang JOIN supplier_menu ON supplier_menu.id_barang=barang.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu WHERE detail_suppmenu_etalase.tanggal_setor=curdate() GROUP BY detail_suppmenu_etalase.id_setorEtalase";
            $result=mysqli_query($koneksi, $query);
                while ($row=mysqli_fetch_array($result)) { 
                    $nama_brg=$row['nama_barang'];
                    $nama_user=$row['nama'];
                    $harga_beli=$row['harga_beli'];
                    $jam=$row['jam'];
                    $jumlah_setor=$row['jumlah_setor'];
                    $sisa=$row['sisa'];
                    $laku=$row['laku'];
                    $hasil=$row['bersih'];
                    $penjualan_total += $hasil;
                }
        ?>
            <pchart-element name="Penjualan" value="<?php echo $penjualan_total;?>" colour="#40A090">
            <?php
                $pendapatan_total=0;
                $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=curdate() ORDER BY status_transaksi.jam";
                $result=mysqli_query($koneksi, $query);
                    while ($row=mysqli_fetch_array($result)) {
                        $no_nota=$row['no_nota'];
                        $tanggal=$row['tanggal_pengambilan'];
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
<script src="pie-chart-js.js"></script> 
    <div data-aos="fade-left" data-aos-duration="1200" class="tabel">
        <div class="title-pesanan">
            <h3>DETAIL PESANAN</h3>
        </div>
        <div class="tabel-pesanan">
            <table>
                <thead>
                    <tr>
                        <th>No. Nota</th>
                        <th>Nama <br> Barang</th>
                        <th>Nama <br> Supplier</th>
                        <th>Jam Antar</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                    <tbody>
                        <?php
                            $query="SELECT transaksi.no_nota, status_transaksi.tanggal_pengambilan, status_transaksi.jam, detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, user.nama FROM transaksi JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN barang ON detail_transaksi.id_barang=barang.id_barang JOIN user ON detail_transaksi.id_suplier=user.id_user WHERE status_transaksi.tanggal_pengambilan=curdate() ORDER BY status_transaksi.jam";
                            $result=mysqli_query($koneksi, $query);
                            while ($row=mysqli_fetch_array($result)) {
                                $no_nota=$row['no_nota'];
                                $tanggal=$row['tanggal_pengambilan'];
                                $jam=$row['jam'];
                                $qty=$row['qty'];
                                $total=$row['total'];
                                $nama_barang=$row['nama_barang'];
                                $nama=$row['nama'];
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
                            }
                        ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
    <div id="setorn" class="s"></div>
    <div data-aos="fade-up" data-aos-duration="1200" class="pendapatan">
        <h1><a href="#">SETORAN SUPPLIER</a></h1>
    </div>
    <div data-aos="fade-right" data-aos-duration="1200" class="table-daftar-pesanan">
        <div class="title-daftar">
            <h3>DAFTAR PESANAN</h3>
        </div>
        <div class="table-daftar">
            <table>
                <thead>
                    <tr>
                        <th>Nama <br> Supplier</th>
                        <th>Total QTY</th>
                        <th>Sisa Stok</th>
                        <th>Total Nominal</th>
                        <th>Pengeluaran</th>
                        <th>Pendapatan</th>
                    </tr>
                    <tbody>
                        <?php
                            $query="SELECT user.nama, SUM(detail_suppmenu_etalase.jumlah_setor) AS setoran, SUM(detail_suppmenu_etalase.sisa) AS sisa, barang.harga_jual, supplier_menu.harga_beli, (SUM(detail_suppmenu_etalase.jumlah_setor) * barang.harga_jual) AS total_nominal, (SUM(detail_suppmenu_etalase.jumlah_setor) * supplier_menu.harga_beli - SUM(detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli) AS pengeluaran, ((SUM(detail_suppmenu_etalase.jumlah_setor) * barang.harga_jual) - (SUM(detail_suppmenu_etalase.jumlah_setor) * supplier_menu.harga_beli - SUM(detail_suppmenu_etalase.sisa) * supplier_menu.harga_beli)) AS pendapatan FROM barang JOIN supplier_menu ON barang.id_barang=supplier_menu.id_barang JOIN user ON user.id_user=supplier_menu.id_user JOIN detail_suppmenu_etalase ON supplier_menu.id_suppmenu=detail_suppmenu_etalase.id_suppmenu GROUP BY user.nama, barang.harga_jual";
                            $result=mysqli_query($koneksi, $query);
                            while($row=mysqli_fetch_array($result)){
                                $nama=$row['nama'];
                                $setoran=$row['setoran'];
                                $sisa=$row['sisa'];
                                $harga_jual=$row['harga_jual'];
                                $total=$row['total_nominal'];
                                $pengeluaran=$row['pengeluaran'];
                                $pendapatan=$row['pendapatan'];
                        ?>
                        <tr>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $setoran; ?></td>
                            <td><?php echo $sisa; ?></td>
                            <td>Rp <?php echo number_format($total, 0,',','.'); ?></td>
                            <td>Rp <?php echo number_format($pengeluaran, 0,',','.'); ?></td>
                            <td>Rp <?php echo number_format($pendapatan, 0,',','.'); ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
    <div data-aos="fade-left" data-aos-duration="1200" class="card">
        <div class="card-nota">
            <table>
                <thead>
                    <tr>
                        <td>
                            <div class="order">
                                <div class="img-nota"><img src="../img/Group (1).png" alt=""></div>
                                <div class="name">
                                    <div class="cus"><h4>ANANTA GHAISANI</h4></div>
                                    <div class="waktu"><p>08:00 - 09:00</p></div>
                                    <div class="no-nota"><p>ORD-1562792779615</p></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="multi-content"> 
                            <div class="col">
                                <div class="item">30x 
                                    <span class="nama">Korean Garlic Cheese</span> 
                                    <span class="harga-satuan">2.000 </span> 
                                    <span class="total">60.000</span>
                                </div>
                                <div class="item">30x 
                                    <span class="nama">Brownies Panggang</span> 
                                    <span class="harga-satuan"> 2.500 </span> 
                                    <span class="total">1.175.000</span>
                                </div>
                                <div class="item">30x 
                                    <span class="nama">Paket Mini 5</span> 
                                    <span class="harga-satuan">7.000</span>
                                    <span class="total">210.000</span>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="item2">Sus buah</div>
                                <div class="item2">Lemper</div>
                                <div class="item2">Sosis Solo</div>
                                <div class="item2">Putu</div>
                                <div class="item2">Pastel</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="multi-content2">
                            <div class="col3">
                                <div class="row1">
                                    <div class="gambar-container">
                                        <div class="ket-gambar"><img src="../img/Rectangle 58.png" alt="order"></div>
                                    </div>
                                </div>
                                <div class="row2">
                                    <div class="ket">Total<span class="harga">234.000</span></div>
                                    <div class="ket">Bayar<span class="harga">100.000</span></div>
                                    <div class="ket">Kurang<span class="harga">134.000</span></div>
                                    <div class="ket">Status<span class="harga">DP</span></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- <div class="wrapper">
                <div>
                    <button class="button1" type="submit1" name="proses">PROSES</button>
                    <button class="button2" type="submit2" name="tolak">TOLAK</button>
                </div>
            </div>  -->
        </div>
    </div>
    <div id="uang-pesan" class="u"></div>
    <div data-aos="fade-up" data-aos-duration="1200" class="pendapatan">
        <h1><a href="#">UANG PESANAN</a></h1>
    </div>
    <div data-aos="fade-left" data-aos-duration="1200" class="table-daftar-pesanan1">
        <div class="title-daftar1">
            <h3>DAFTAR PESANAN</h3>
        </div>
        <div class="table-daftar1">
            <table>
                <thead>
                    <tr>
                        <th>Nama <br> Customer</th>
                        <th>Total</th>
                        <th>Tanggal Ambil</th>
                        <th>Total Nominal</th>
                        <th>Status <br> Pembayaran</th>
                        <th>Tanda <br> Customer</th>
                    </tr>
                    <tbody>
                    <?php
                            $query="SELECT user.nama, transaksi.no_nota, SUM(detail_transaksi.qty) AS total_qty, status_transaksi.tanggal_pengambilan, transaksi.grand_total, transaksi.status_bayar, user.penanda FROM user JOIN transaksi ON user.id_user=transaksi.id_customer JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota WHERE status_transaksi.tanggal_pengambilan BETWEEN curdate() AND DATE_ADD(CURDATE(), INTERVAL 1 DAY) GROUP BY transaksi.no_nota ORDER BY status_transaksi.tanggal_pengambilan ASC";
                            $result=mysqli_query($koneksi, $query);
                            while($row=mysqli_fetch_array($result)){
                                $nama=$row['nama'];
                                $no_nota=$row['no_nota'];
                                $total_qty=$row['total_qty'];
                                $tanggal=$row['tanggal_pengambilan'];
                                $total=$row['grand_total'];
                                $status=$row['status_bayar'];
                                $penanda=$row['penanda'];
                        ?>
                        <tr>
                            <td><?php echo $nama;?></td>
                            <td><?php echo $total_qty;?></td>
                            <td><?php echo $tanggal;?></td>
                            <td><?php echo $total;?></td>
                            <td><?php echo $status;?></td>
                            <td onclick="tampilNota(<?php echo $no_nota; ?>)"><?php echo $penanda;?></td>
                            <script>
                            function tampilNota(no) {
                                window.location.href="laporan.php?id_setor="+no;
                            }
                            </script>
                        </tr>
                        <?php } ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
    <div data-aos="fade-right" data-aos-duration="1200" class="card1">
        <div class="card-nota1">
            <table>
                <thead>
                    <tr>
                        <td>
                            <div class="order1">
                                <div class="img-nota1"><img src="../img/Group (1).png" alt=""></div>
                                <div class="name1">
                                    <div class="cus1"><h4>ANANTA GHAISANI</h4></div>
                                    <div class="waktu1"><p>08:00 - 09:00</p></div>
                                    <div class="no-nota1"><p>ORD-1562792779615</p></div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="multi-content1"> 
                            <div class="col1">
                                <div class="item1">30x 
                                    <span class="nama1">Korean Garlic Cheese</span> 
                                    <span class="harga-satuan1">2.000 </span> 
                                    <span class="total1">60.000</span>
                                </div>
                                <div class="item1">30x 
                                    <span class="nama1">Brownies Panggang</span> 
                                    <span class="harga-satuan1"> 2.500 </span> 
                                    <span class="total1">1.175.000</span>
                                </div>
                                <div class="item1">30x 
                                    <span class="nama1">Paket Mini 5</span> 
                                    <span class="harga-satuan1">7.000</span>
                                    <span class="total1">210.000</span>
                                </div>
                            </div>
                            <div class="col21">
                                <div class="item21">Sus buah</div>
                                <div class="item21">Lemper</div>
                                <div class="item21">Sosis Solo</div>
                                <div class="item21">Putu</div>
                                <div class="item21">Pastel</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td class="multi-content21">
                            <div class="col31">
                                <div class="row11">
                                    <div class="gambar-container1">
                                        <div class="ket-gambar1"><img src="../img/Rectangle 58.png" alt="order"></div>
                                    </div>
                                </div>
                                <div class="row21">
                                    <div class="ket1">Total<span class="harga">234.000</span></div>
                                    <div class="ket1">Bayar<span class="harga">100.000</span></div>
                                    <div class="ket1">Kurang<span class="harga">134.000</span></div>
                                    <div class="ket1">Status<span class="harga">DP</span></div>
                                </div>
                            </div>
                        </td> 
                </tbody>
            </table>
    </div>
    </from>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</html>