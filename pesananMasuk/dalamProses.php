<?php
require("../login/koneksi.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dalam Proses</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="dalamProses.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
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
    <div class="table_responsive_pesanan">
        <table class="table_dtl_pesanan">
       <?php
            $query="SELECT SUM(detail_transaksi.qty) as total_qty, barang.id_barang, barang.nama_barang FROM barang JOIN detail_transaksi ON detail_transaksi.id_barang=barang.id_barang GROUP BY barang.id_barang";
            $result=mysqli_query($koneksi, $query);
            while ($row=mysqli_fetch_array($result)) {
              $total=$row['total_qty'];
              $id=$row['id_barang'];
              $nama=$row['nama_barang'];
        ?>
        <tr>
          <td class="multi-content2">

              <div class="nama"><?php echo $nama; ?></div>
              <a href="dalamProses.php?id_barang=<?php echo $id; ?>"><div class="icon"><img src="../img/salin.png" alt="order"></div></a>
              <div class="kode">BRG<?php echo $id; ?></div>
              <div class="text-qty"> Total-QTY <br> <small1><?php echo $total; ?></small1></div>
              </div>
          </td>
       </tr>
       <?php
            }
          ?>
        </table>
    </div>
    <div class="row">
        <div class="row-pesanan-masuk">
            <div class="col=12">
                <h3 class="text-judul-halaman">Detail Pesanan</h3>
            </div>
        </div>
        <div class="table_responsive_detailpesanan">
            <table class="table_detail_pesanan">
            <?php
                if (isset($_GET['id_barang'])) {
                    $id_brg=$_GET['id_barang'];
                    $query="SELECT user.nama, status_transaksi.jam, SUM(detail_transaksi.qty) as total_qty, detail_transaksi.id_barang, transaksi.no_nota FROM user JOIN transaksi ON transaksi.id_customer=user.id_user JOIN status_transaksi ON transaksi.no_nota=status_transaksi.no_nota JOIN detail_transaksi ON transaksi.no_nota=detail_transaksi.no_nota WHERE detail_transaksi.id_barang='$id_brg' GROUP BY transaksi.no_nota";
                    $result=mysqli_query($koneksi, $query);
                    while ($row=mysqli_fetch_array($result)) {
                        $nama=$row['nama'];
                        $jam=$row['jam'];
                        $total_qty=$row['total_qty'];
                        $id=$row['id_barang'];
                        $nota=$row['no_nota'];
                ?>
                <tr>
                    <td class="multi-content3">
                        <div class="top"><?php echo $nama;?></div>
                        <div class="bottom"><img src="../img/Group.svg" alt="order"></div>
                        <div class="right"><?php echo $total_qty; ?><small>pcs</small></div>
                        <div class="left"><?php echo $jam;?></div>
                        <label class="container">
                            <input type="checkbox" >
                            <div class="checkmark"></div>
                        </label>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <div class="dropdown">
            <div class="dropdown-select" onclick="toggleDropdown()">
                <span class="select">Pilih Supplier</span>
                <i class="fa fa-caret-down icon"></i>
            </div>
            <div class="dropdown-list">
                <?php
                $query="SELECT user.nama, user.no_telepon, supplier_menu.id_user FROM user JOIN supplier_menu ON user.id_user=supplier_menu.id_user WHERE supplier_menu.id_barang='$id_brg'";
                $result=mysqli_query($koneksi, $query);
                while ($row=mysqli_fetch_array($result)) {
                    $nama=$row['nama'];
                    $no_telp=$row['no_telepon'];
                    $id_user=$row['id_user'];
                ?>
                    <div class="dropdown-list_item" onclick="selectOption(this)"><?php echo $nama; ?></div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
    <div class="wrapper">
        <textarea placeholder="Template kalimat ..." ></textarea>
        <div>
            <button class="button1"type="submit" name="submit">Kirim Pesan</button>
            <button class="button2"type="submit2" name="submit">SIMPAN</button>
        </div>
    </div>
    <?php
        }else {
            ?>
            <div class="gambar">
                <img src="../img/Group 193.png" alt=""> 
            </div>
            <?php
        }
        ?>
    <script src="script.js"></script>
</body>
</html>