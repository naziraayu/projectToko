<?php
require("../login/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dibatalkan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="pesananBaru1.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
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
        <div class="navbar">
            <div class="content"> 
                <ul>
                    <li class="baru" id="baruItem">
                        <a href="../pesananMasuk/pesananBaru1.php" onclick="togglePesanan('baru')">Pesanan Baru</a>
                        <div class="img2">
                            <img src="../img/Frame(4).png" alt="" class="gambar-pesanan" id="baruImage" style="display: inline;" />
                        </div> 
                    </li>
                </ul>
            </div>
            <div class="content1">
                <ul>
                    <li class="proses" id="prosesItem">
                        <a href="../pesananMasuk/dalamProses.php" onclick="togglePesanan('proses')">Dalam Proses</a>
                        <div class="img3">
                            <img src="../img/proses.png" alt="" class="gambar-pesanan" id="prosesImage" style="display: inline;" />
                        </div>
                    </li>
                </ul>
            </div>
            <div class="content3">
                <ul>
                    <li class="ajukanBatal" id="ajukanbatalItem">
                        <!-- Update href sesuai dengan tujuan yang diinginkan -->
                        <a href="../pesananMasuk/ajuanBatal.php" onclick="togglePesanan('ajukan')">Ajukan Batal</a>
                        <div class="img3">
                            <img src="../img/Ajukan-batal.png" alt="" class="gambar-pesanan" id="prosesImage" style="display: inline;" />
                        </div>
                    </li>
                </ul>
            </div>
            <div class="content2">
                <ul>
                    <li class="batal" id="batalItem">
                        <a href="../pesananMasuk/dibatalkan.php" onclick="togglePesanan('batal')">Dibatalkan</a>
                        <div class="img4">
                            <img src="../img/batal.png" alt="" class="gambar-pesanan" id="batalImage" style="display: inline;" />
                        </div>
                    </li>
                    <!-- Item lain di sini -->
                </ul>
            </div>
        </div>
      
      <script>
        function togglePesanan(item) {
            var textElement = document.getElementById(item + 'Item').querySelector('a');
            var imageElement = document.getElementById(item + 'Image');
    
            if (textElement.style.display !== 'none') {
                // Sembunyikan teks dan tampilkan gambar/icon 
                textElement.style.display = 'none';
                imageElement.style.display = 'inline';
    
                // Ubah warna teks menjadi beda setelah diklik
                textElement.style.color = '#AC0000';
            } else {
                // Tampilkan teks dan sembunyikan gambar/icon
                textElement.style.display = 'inline';
                imageElement.style.display = 'none';
    
                // Kembalikan warna teks ke warna awal
                textElement.style.color = '#231210';
            }
    
            // Hapus semua kelas "active" pada elemen navbar
            var navbarLinks = document.querySelectorAll('.navbar a');
            navbarLinks.forEach(function (link) {
                link.classList.remove('active');
            });
    
            // Tambahkan kelas "active" pada tautan yang diklik
            textElement.classList.add('active');
    
            // Redirect ke halaman yang diinginkan ketika "Ajukan Batal" diklik
            if (item === 'ajukan') {
                window.location.href = textElement.getAttribute('href');
            }
        }
    </script>
        <div class="table-daftar-pesanan">
            <div class="title-penjualan">
                <h3>DAFTAR PESANAN</h3>
            </div>
            <div class="table-penjualan">
                <table>
                    <thead>
                        <tr>
                            <th>Nama <br> Customer</th>
                            <th>Tanggal <br> Bayar</th>
                            <th>Grand <br> Total</th>
                            <th>Total <br> Bayar</th>
                            <th>Kurang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        <tbody>
                        <?php
                            $query="SELECT user.nama, transaksi.grand_total, transaksi.dibayarkan, transaksi.tgl_transaksi, transaksi.kurang_bayar, transaksi.no_nota, status_transaksi.status, status_transaksi.tgl_pengambilan FROM user JOIN transaksi ON user.id_user=transaksi.id_customer JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota WHERE status_transaksi.status='ajukan pembatalan' ORDER BY status_transaksi.tgl_pengambilan ASC";
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
                                <td><?php echo $nama; ?></td>
                                <td><?php echo $tanggal; ?></td>
                                <td><?php echo $grandTotal; ?></td>
                                <td><?php echo $total_bayar; ?></td>
                                <td><?php echo $kurang; ?></td>
                                <td><?php echo $status; ?></td>
                                <td>
                                    <button><a href="ajuanBatal.php?tampil_ajukan=<?php echo $noNota; ?>"><i class="fa-solid fa-arrow-right"></i></a></button>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
          <div class="card">
            <div class="card-nota">
            <?php
                    if (isset($_GET['tampil_ajukan'])) {
                        $no=$_GET['tampil_ajukan'];
                        $query="SELECT user.nama, transaksi.no_nota, status_transaksi.jam FROM user JOIN transaksi ON user.id_user=transaksi.id_customer JOIN status_transaksi ON status_transaksi.no_nota=transaksi.no_nota WHERE transaksi.no_nota='$no'";
                        $result=mysqli_query($koneksi, $query);
                        while ($row=mysqli_fetch_array($result)) {
                            $nama=$row['nama'];
                            $jam=$row['jam'];
                            $no_nota=$row['no_nota'];
                ?>
                <table>
                    <thead>
                        <tr>
                            <td>
                                <div class="order">
                                    <div class="img-nota"><img src="../img/Group (1).png" alt=""></div>
                                    <div class="name">
                                        <div class="cus"><h4><?php echo $nama;?></h4></div>
                                        <div class="waktu"><p><?php echo $jam;?></p></div>
                                        <div class="no-nota"><p><?php echo $no_nota;?></p></div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </thead>
                <?php }?>
                    <tbody>
                        <tr>
                            <td class="multi-content"> 
                                <div class="col">
                                    <?php
                                        $query="SELECT detail_transaksi.qty, detail_transaksi.total, barang.nama_barang, barang.harga_jual, transaksi.no_nota FROM barang JOIN detail_transaksi ON barang.id_barang=detail_transaksi.id_barang JOIN transaksi ON detail_transaksi.no_nota=transaksi.no_nota WHERE transaksi.no_nota='$no'";
                                        $result=mysqli_query($koneksi, $query);
                                        while ($row1=mysqli_fetch_array($result)) {
                                            $nama_brg=$row1['nama_barang'];
                                            $harga_jual=$row1['harga_jual'];
                                            $total=$row1['total'];
                                            $qty=$row1['qty'];
                                    ?>
                                    <div class="item"><?php echo $qty;?>x 
                                        <span class="nama"><?php echo $nama_brg;?></span> 
                                        <span class="harga-satuan"><?php echo $harga_jual;?></span> 
                                        <span class="total"><?php echo $total;?></span>
                                    </div>
                                    <?php }?>
                                </div>
                                <div class="col4">
                                    <div class="item">30x 
                                        <span class="nama">Korean Garlic Cheese</span> 
                                        <span class="harga-satuan">2.000 </span> 
                                        <span class="total">60.000</span>
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
                                    <?php
                                        $query="SELECT transaksi.grand_total, transaksi.dibayarkan, transaksi.kurang_bayar, transaksi.status_bayar, transaksi.bukti_bayar FROM transaksi WHERE transaksi.no_nota='$no'";
                                        $result=mysqli_query($koneksi, $query);
                                        while ($row2=mysqli_fetch_array($result)) {
                                            $grand_total=$row2['grand_total'];
                                            $dibayarkan=$row2['dibayarkan'];
                                            $kurang_bayar=$row2['kurang_bayar'];
                                            $status_bayar=$row2['status_bayar'];
                                    ?>
                                    <div class="row2">
                                        <div class="ket">Total<span class="harga"><?php echo $grand_total;?></span></div>
                                        <div class="ket">Bayar<span class="harga"><?php echo $dibayarkan;?></span></div>
                                        <div class="ket">Kurang<span class="harga"><?php echo $kurang_bayar;?></span></div>
                                        <div class="ket">Status<span class="harga"><?php echo $status_bayar;?></span></div>
                                    </div>
                                    <?php }?>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="wrapper">
                    <div>
                        <button class="button1" type="submit" name="proses" onclick="prosespesanan()">PROSES</button>
                        <script>
                            function prosespesanan() {
                                <?php
                                    $no1=$_GET['tampil_ajukan'];
                                    $query="UPDATE status_transaksi set status='pesanan dibatalkan' where no_nota='$no1'";
                                    $result=mysqli_query($koneksi, $query);
                                    if ($result) {
                                        ?>
                                        alert("Ajuan batal diterima");
                                        window.location.href="ajuanBatal.php";
                                        <?php
                                    }
                                ?>

                            }
                        </script>
                        <button class="button2" type="submit" name="tolak" onclick="tolakpesanan()">TOLAK</button>
                        <script>
                            function tolakpesanan() {
                                <?php
                                    $noo=$_GET['tampil_ajukan'];
                                    $query="UPDATE status_transaksi set status='pesanan diproses' where no_nota='$noo'";
                                    $result=mysqli_query($koneksi, $query);
                                    if ($result) {
                                        ?>
                                        alert("Ajuan batal ditolak");
                                        window.location.href="ajuanBatal.php";
                                        <?php
                                    }
                                ?>
                            }
                        </script>
                    </div>
                </div>
                <?php
                    }else{
                ?>
                    <div class="gambar">
                        <img src="../img/Group 194.png" alt="">
                    </div>
                <?php }?>
            </div>
        </div>
</body>
</html>