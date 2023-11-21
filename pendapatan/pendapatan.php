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
    <header>
        <div class="head">
          <div class="nav">
            <img src="../img/Ellipse 1.png" alt="logo" />
                <ul>
                    <li class="stok"><a href="../stokEtalase/stokEtalase.html">STOK ETALASE</a></li>
                    <li class="pes"><a href="../pesananSaya/kemarin.html">PESANAN SAYA</a></li>
                    <li class="pen"><a href="../pendapatan/pendapatan.html">PENDAPATAN</a></li>
                    <select class="select-box">
                        <option value="1">Nurul Hidayah</option>disabled
                        <option value="2">Profile Saya</option>
                        <option value="3">Pengaturan Profile</option>
                        <option value="4">Log Out</option><a href="../login/login.html"></a>
                      </select>
                </ul>
            </div>
        </div>
    </header>
    <div class="date">
        <div class="datetime">
            <p>Senin, 2 November 2023</p>
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
                        <th>Jam Input</th>
                        <th>Stok</th>
                        <th>Sisa</th>
                        <th>Laku</th>
                        <th>Penghasilan</th>
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
    <section>
        <div class="container-pendapatan">
            <div class="penjualan">
                <h2> Penjualan</h2>
                <h3> 700.000 </h3>
            </div>
            <div class="pesanan">
                <h2>Pesanan</h2>
                <h3>300.000</h3>
            </div>
            <div class="total">
                <h2>TOTAL PENDAPATAN</h2>
                <h3>3.005.000</h3>
            </div>
        </div>
    </section>
    <div id="main-content">
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
<script src="pie-chart-js.js">
</script> 
    <div class="tabel">
        <h3>DETAIL PENJUALAN</h3>
        <div class="tabel-pesanan">
            <table>
                <thead>
                    <tr>
                        <th>Nama <br> Barang</th>
                        <th>Jam Antar</th>
                        <th>Jumlah</th>
                        <th>Penghasilan</th>
                    </tr>
                    <tbody>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>Kue Putu</td>
                            <td>09.00</td>
                            <td>500</td>
                            <td>50</td>
                        </tr>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
</body>
</html>