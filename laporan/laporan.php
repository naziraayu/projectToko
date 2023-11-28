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
    <link rel="stylesheet" href="laporann.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
          ['2017', 1030000, 5400000, 3500000],
          ['2018', 1000000, 5000000, 3000000]
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
            left: 30%;
            top: 158% ;
            height: 80%;
            width: 50%;
        }
    </style>
</head>
<body>
    <header>
        <div class="head"> 
            <div class="nav">
                <img src="../img/Ellipse 1.png" alt="logo" />
                <ul>
                    <li class="mas"><a href="../master/admin.html">MASTER</a></li>
                    <li class="pes"><a href="../pesananMasuk/pesananBaru1.html">PESANAN MASUK</a></li>
                    <li class="eta"><a href="../etalase/etalase.html">ETALASE</a></li>
                    <li class="lap"><a href="../laporan/laporan.html">LAPORAN</a></li>
                    <li class="log"><a href="../login/login.html">LOG OUT</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="date">
        <div data-aos="fade-left" data-aos-duration="1200" class="datetime">
            <input type="date">
            <!-- <img src="../img/Group 9.png" alt=""> -->
        </div>
    </div>
    <div data-aos="zoom-in" data-aos-duration="1200" class="grafik">
        <div id="columnchart_material" style="width: 1100px; height: 200px;"></div>
    </div>
    <section class="PenjualanPemesanan">
        <div class="container PenjualanPemesanan">
            <div data-aos="fade-up" data-aos-duration="1200" class="bersih">
                <h2><a href="#pendptn">Pendapatan Bersih</a></h2>
                <h3>2.135.000</h3>
            </div>
            <div data-aos="fade-up" data-aos-duration="1400" class="setoran">
                <h2><a href="#setorn">Setoran Supplier</a></h2>
                <h3>2.135.000</h3>
            </div>
            <div data-aos="fade-up" data-aos-duration="1600" class="kotor">
                <h2><a href="#ktr">Pendapatan Kotor</a></h2>
                <h3>3.005.000</h3>
            </div>
            <div data-aos="fade-up" data-aos-duration="1800" class="pesan">
                <h2><a href="#uang-pesan">Uang Pesanan</a></h2>
                <h3>3.005.000</h3>
            </div>
        </div>
    </section>
    <div id="pendptn" class="p"></div>
    <div data-aos="fade-up" data-aos-duration="1200" class="pendapatan">
        <h1 ><a href="#">PENDAPATAN BERSIH</a></h1>
    </div>
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
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
    <section>
        <div class="container-pendapatan">
            <div data-aos="fade-up" data-aos-duration="1200" class="penjualan">
                <h2>Penjualan</h2>
                <h3>700.000 </h3>
            </div>
            <div data-aos="fade-up" data-aos-duration="1400" class="pesanan">
                <h2>Pesanan</h2>
                <h3>300.000</h3>
            </div>
            <div data-aos="fade-up" data-aos-duration="1200" class="hasil">
                <h2>TOTAL PENDAPATAN</h2>
                <h3>1.000.000</h3>
            </div>
        </div>
    </section>
    <div data-aos="fade-up" data-aos-duration="1600" id="main-content">
        <pie-chart id="pieChart" style="display:block;height:50%;width:100%;position:relative;">
            <pchart-element name="Penjualan" value="700.000" colour="#40A090">
            <pchart-element name="Pesanan" value="300.000" colour="#BE7A74">
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
    <div data-aos="fade-up" data-aos-duration="1200" class="tabel">
        <div class="title-pesanan">
            <h3>DETAIL PESANAN</h3>
        </div>
        <div class="tabel-pesanan">
            <table>
                <thead>
                    <tr>
                        <th>Nama <br> Barang</th>
                        <th>Mana <br> Supplier</th>
                        <th>Jam Antar</th>
                        <th>Jumlah</th>
                        <th>Total</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>Nazira Ayu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
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
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
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
            <div class="wrapper">
                <div>
                    <button class="button1" type="submit1" name="proses">PROSES</button>
                    <button class="button2" type="submit2" name="tolak">TOLAK</button>
                </div>
            </div> 
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
                        <th>Total Stok</th>
                        <th>Sisa Stok</th>
                        <th>Total Nominal</th>
                        <th>Status <br> Pembayaran</th>
                        <th>Tanda <br> Customer</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>                        
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                            <td>450</td>
                            <td>500.000</td>
                        </tr>
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
            <div class="wrapper1">
                <div>
                    <button class="button11" type="submit1" name="proses">PROSES</button>
                    <button class="button21" type="submit2" name="tolak">TOLAK</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</html>