<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="dashboardd.css"/>
    <style></style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['', 'Penjualan', 'Pemesanan', 'Total'],
          ['2014', 1500000, 1000000, 2000000],
          ['2015', 1170000, 4600000, 2500000],
          ['2016', 6600000, 1120000, 3000000],
          ['2017', 1030000, 5400000, 3500000]
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
                    <li class="pes"><a href="../pesananMasuk/dalamProses.html">PESANAN MASUK</a></li>
                    <li class="eta"><a href="../etalase/etalase.html">ETALASE</a></li>
                    <li class="lap"><a href="../laporan/laporan.html">LAPORAN</a></li>
                    <li class="log"><a href="../login/login.php">LOG OUT</a></li>
                </ul>
            </div>
        </div>
    </header>
    <header2>
        <div class="Welcome">
            <div class="text-hero">
                <h1>Selamat Datang, Owner Asti Ghaliyah!</h1>
            </div>
    </header2>
    <!-- Penjualan Pemesanan -->
    <section class="PenjualanPemesanan">
        <div class="container PenjualanPemesanan">
            <div class="Penjualan">
                <h2> Penjualan</h2>
                <h3> 2.135.000 </h3>
            </div>
            <div class="Pemesanan">
                <h2>Pemesanan</h2>
                <h3>3.005.000</h3>
            </div>
            <div class="Total">
                <h2>Total</h2>
                <h3>3.005.000</h3>
            </div>
        </div>
    </section>
        <div class="Kue terjual">
            <header class="kue Terjual-header">
                <h4>2.978</h4>
                <h5>Kue Terjual Hari Ini</h5>
            </header>
            <footer class="Detail">
                <div class="lihatdetail">
                    <h6>Lihat Detail
                    <a href="https://tujuan-link.com">
                        <img src="../img/Arrow.png" alt="Continue">
                      </a>
                      </h6>
                </div>
            </footer>
            <header class="PesananMenunggu-header">
                <h7>23</h7>
                <h8>Pesanan Menunggu</h8>
            </header>
            <footer class="Pesanan">
                <div class="Pesanan Menunggu">
                    <h6>Lihat Detail
                    <a href="https://tujuan-link.com">
                        <img src="../img/Arrow.png" alt="Continue">
                      </a>
                      </h6>
                </div>
            </footer> 
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
                                <tr>
                                    <td>
                                        <div class="menu">
                                            <div class="first-menu">
                                                <div class="nama">
                                                    <h4>Leslie Alexander</h4>
                                                </div>
                                                <div class="kode">
                                                    <img src="../img/Group (1).png" alt="">
                                                    <p>ORD-1562792778679</p>
                                                </div>
                                            </div>
                                            <div class="second-menu">
                                                <div class="price">
                                                    <p>Rp 700.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="menu">
                                            <div class="first-menu">
                                                <div class="nama">
                                                    <h4>Leslie Alexander</h4>
                                                </div>
                                                <div class="kode">
                                                    <img src="../img/Group (1).png" alt="">
                                                    <p>ORD-1562792778679</p>
                                                </div>
                                            </div>
                                            <div class="second-menu">
                                                <div class="price">
                                                    <p>Rp 700.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="menu">
                                            <div class="first-menu">
                                                <div class="nama">
                                                    <h4>Leslie Alexander</h4>
                                                </div>
                                                <div class="kode">
                                                    <img src="../img/Group (1).png" alt="">
                                                    <p>ORD-1562792778679</p>
                                                </div>
                                            </div>
                                            <div class="second-menu">
                                                <div class="price">
                                                    <p>Rp 700.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="menu">
                                            <div class="first-menu">
                                                <div class="nama">
                                                    <h4>Leslie Alexander</h4>
                                                </div>
                                                <div class="kode">
                                                    <img src="../img/Group (1).png" alt="">
                                                    <p>ORD-1562792778679</p>
                                                </div>
                                            </div>
                                            <div class="second-menu">
                                                <div class="price">
                                                    <p>Rp 700.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="menu">
                                            <div class="first-menu">
                                                <div class="nama">
                                                    <h4>Leslie Alexander</h4>
                                                </div>
                                                <div class="kode">
                                                    <img src="../img/Group (1).png" alt="">
                                                    <p>ORD-1562792778679</p>
                                                </div>
                                            </div>
                                            <div class="second-menu">
                                                <div class="price">
                                                    <p>Rp 700.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="menu">
                                            <div class="first-menu">
                                                <div class="nama">
                                                    <h4>Leslie Alexander</h4>
                                                </div>
                                                <div class="kode">
                                                    <img src="../img/Group (1).png" alt="">
                                                    <p>ORD-1562792778679</p>
                                                </div>
                                            </div>
                                            <div class="second-menu">
                                                <div class="price">
                                                    <p>Rp 700.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="menu">
                                            <div class="first-menu">
                                                <div class="nama">
                                                    <h4>Leslie Alexander</h4>
                                                </div>
                                                <div class="kode">
                                                    <img src="../img/Group (1).png" alt="">
                                                    <p>ORD-1562792778679</p>
                                                </div>
                                            </div>
                                            <div class="second-menu">
                                                <div class="price">
                                                    <p>Rp 700.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="menu">
                                            <div class="first-menu">
                                                <div class="nama">
                                                    <h4>Leslie Alexander</h4>
                                                </div>
                                                <div class="kode">
                                                    <img src="../img/Group (1).png" alt="">
                                                    <p>ORD-1562792778679</p>
                                                </div>
                                            </div>
                                            <div class="second-menu">
                                                <div class="price">
                                                    <p>Rp 700.000</p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="ContainerGrafik">
            <div class="d1"></div>
            <div class="d2"></div>
            <div class="d3"></div>
            <div class="d4"></div>
            <div class="d5"></div>
        <ul class="containtsamping">
            <li><div>6000000</div></li>
            <li><div>4500000</div></li>
            <li><div>3000000</div></li>
            <li><div>1500000</div></li>
            <li><div>0</div></li>
        </ul> -->
    </div>
    <div id="columnchart_material" style="width: 700px; height: 350px;"></div>
</body>
</html>