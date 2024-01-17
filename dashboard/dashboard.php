<?php
require("../login/koneksi.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboard.css"/>
    <style></style>
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
            // title: 'Company Performance',
            // subtitle: 'Sales, Expenses, and Profit: 2014-2017',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
</head>
<body>
    <header>
        <div class="head">
            <div class="nav">
                <img src="../img/Ellipse 2_1.svg" alt="logo" />
                <ul >
                    <li class="mas"><a href="../master/admin.php">MASTER</a></li>
                    <li class="pes"><a href="../pesananMasuk/dalamProses.php">PESANAN MASUK</a></li>
                    <li class="eta"><a href="../etalase/etalase.php">ETALASE</a></li>
                    <li class="lap"><a href="../laporan/laporan.php">LAPORAN</a></li>
                    <li class="log"><a href="../login/login.php">LOG OUT</a></li>
                </ul>
            </div>
        </div>
    </header>
    <header2>
        <?php 
        $nama=$_GET['nama'];
        ?>
        <div class="Welcome">
            <div class="text-hero">
                <h1>Selamat Datang, Owner <?php echo $nama;?>!</h1>
            </div>
    </header2>
    <!-- Penjualan Pemesanan -->
    <section class="PenjualanPemesanan">
        <div class="container PenjualanPemesanan">
            <div class="Penjualan">
                <h2> Penjualan</h2>
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
                                $setoran_total += $pendapatan;
                            }
                        ?>
                <h3 id="penjualan"></h3>
            </div>
            <div class="Pemesanan">
                <h2>Pemesanan</h2>
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
                <h3 id="pemesanan" ></h3>
            </div>
            <div class="Total">
                <h2>Total</h2>
                <h3 id="total" ></h3>
            </div>
        </div>
        <script>
            var penjualan=<?php echo $setoran_total;?>;
            document.getElementById('penjualan').innerHTML = penjualan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            var pemesanan=<?php echo $pendapatan_total;?>;
            document.getElementById('pemesanan').innerHTML =pemesanan.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            var total=pemesanan +penjualan;
            document.getElementById('total').innerHTML = total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' }); 
        </script>
    </section>
        <div class="Kue terjual">
            <div class="jual">
                <header class="kue Terjual-header">
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
                                $penjualan_total += $laku;
                            }
                            ?>
                    <h4><?php echo number_format($penjualan_total, 0,',','.');?></h4>
                    <h5>Kue Terjual Hari Ini</h5>
                </header>
                <footer class="Detail">
                    <div class="lihatdetail">
                        <h6>Lihat Detail
                        <a href="../laporan/laporan.php">
                            <img src="../img/Arrow.png" alt="Continue">
                        </a>
                        </h6>
                    </div>
                </footer>
            </div>
            <div class="tunggu">
                <header class="PesananMenunggu-header">
                    <?php
                        $query="SELECT * FROM status_transaksi WHERE status='pesanan diproses';";
                        $result=mysqli_query($koneksi, $query);
                        $num=mysqli_num_rows($result);
                    ?>
                    <h7><?php echo $num;?></h7>
                    <h8>Pesanan Menunggu</h8>
                </header>
                <footer class="Pesanan">
                    <div class="Pesanan Menunggu">
                        <h6>Lihat Detail
                        <a href="../pesananMasuk/pesananBaru1.php">
                            <img src="../img/Arrow.png" alt="Continue">
                        </a>
                        </h6>
                    </div>
                </footer> 
            </div>
        </div>
        <!-- <div class="row">
            <div class="col=12">
                <p3 class="text-judul-halaman">PESANAN TERBARU</p3>
            </div> -->
                <div class="table-responsive">
                    <div class="content">
                        <table>
                            <thead>
                                <tr>
                                    <div class="title">
                                        <p>PESANAN MASUK</p>
                                    </div>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query="SELECT user.nama, transaksi.grand_total, transaksi.dibayarkan, transaksi.tgl_transaksi, transaksi.kurang_bayar, transaksi.no_nota, status_transaksi.status, status_transaksi.tanggal_pengambilan FROM user JOIN transaksi ON user.id_user=transaksi.id_customer JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota WHERE status_transaksi.status='pesanan masuk' AND transaksi.tgl_transaksi=curdate() ORDER BY status_transaksi.tanggal_pengambilan ASC";
                            $result=mysqli_query($koneksi, $query);
                            while ($row=mysqli_fetch_array($result)) {
                                $nama=$row['nama'];
                                $tanggal=$row['tgl_transaksi'];
                                $grandTotal=$row['grand_total'];
                                $total_bayar=$row['dibayarkan'];
                                $kurang=$row['kurang_bayar'];
                                $status=$row['status'];
                                $noNota=$row['no_nota'];
                        ?>
                                <tr>
                                    <td>
                                        <div class="menu">
                                            <div class="first-menu">
                                                <div class="nama">
                                                    <h4><?php echo $nama;?></h4>
                                                </div>
                                                <div class="kode">
                                                    <img src="../img/Group (1).png" alt="">
                                                    <p><?php echo $noNota;?></p>
                                                </div>
                                            </div>
                                            <div class="second-menu">
                                                <div class="price">
                                                    <p>Rp <?php echo $grandTotal;?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="columnchart_material" style="width: 700px; height: 350px;"></div>
</body>
</html>