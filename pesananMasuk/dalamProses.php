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
            <li class="mas"><a href="../master/admin.html">MASTER</a></li>
            <li class="pes"><a href="../pesananMasuk/dalamProses.html">PESANAN MASUK</a></li>
            <li class="eta"><a href="../etalase/etalase.html">ETALASE</a></li>
            <li class="lap"><a href="../laporan/laporan.html">LAPORAN</a></li>
            <li class="log"><a href="../login/login.html">LOG OUT</a></li>
          </ul>
        </div>
      </div>
    </header>
    <div class="navbar">
      <div class="content">
          <ul>
              <li class="baru" id="baruItem">
                  <a href="../pesananMasuk/pesananBaru1.html" onclick="togglePesanan('baru')">Pesanan Baru</a>
                  <div class="img2">
                      <img src="../img/Frame(4).png" alt="" class="gambar-pesanan" id="baruImage" style="display: inline;" />
                  </div>
              </li>
          </ul>
      </div>
      <div class="content1">
          <ul>
              <li class="proses" id="prosesItem">
                  <a href="../pesananMasuk/dalamProses.html" onclick="togglePesanan('proses')">Dalam Proses</a>
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
                  <a href="../pesananMasuk/ajuanBatal.html" onclick="togglePesanan('ajukan')">Ajukan Batal</a>
                  <div class="img3">
                      <img src="../img/Ajukan-batal.png" alt="" class="gambar-pesanan" id="prosesImage" style="display: inline;" />
                  </div>
              </li>
          </ul>
      </div>
      <div class="content2">
          <ul>
              <li class="batal" id="batalItem">
                  <a href="../pesananMasuk/dibatalkan.html" onclick="togglePesanan('batal')">Dibatalkan</a>
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
            <tr>
                <td class="multi-content2">
                    <div class="nama">SUS BUAH</div>
                    <div class="icon"><img src="../img/salin.png"alt="order"></div>
                    <div class="kode"> A0031</div>
                    <div class="text-qty"> Total-QTY <br> <small1>540</small1></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="multi-content2">
                    <div class="nama">SUS BUAH</div>
                    <div class="icon"><img src="../img/salin.png"alt="order"></div>
                    <div class="kode"> A0031</div>
                    <div class="text-qty"> Total-QTY <br> <small1>40</small1></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="multi-content2">
                    <div class="nama">SUS BUAH</div>
                    <div class="icon"><img src="../img/salin.png"alt="order"></div>
                    <div class="kode"> A0031</div>
                    <div class="text-qty"> Total-QTY <br> <small1>540</small1></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="multi-content2">
                    <div class="nama">SUS BUAH</div>
                    <div class="icon"><img src="../img/salin.png"alt="order"></div>
                    <div class="kode"> A0031</div>
                    <div class="text-qty"> Total-QTY <br> <small1>540</small1></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="multi-content2">
                    <div class="nama">SUS BUAH</div>
                    <div class="icon"><img src="../img/salin.png"alt="order"></div>
                    <div class="kode"> A0031</div>
                    <div class="text-qty"> Total-QTY <br> <small1>540</small1></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="multi-content2">
                    <div class="nama">SUS BUAH</div>
                    <div class="icon"><img src="../img/salin.png"alt="order"></div>
                    <div class="kode"> A0031</div>
                    <div class="text-qty"> Total-QTY <br> <small1>540</small1></div>
                    </div>
                </td>
            </tr>
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
                <tr>
                    <td class="multi-content3">
                        <div class="top">Ananta Ghaisani</div>
                        <div class="bottom"><img src="../img/Group.svg" alt="order"></div>
                        <div class="right"> 45 <small>pcs</small></div>
                        <div class="left">08:00-09:00</div>
                        <label class="container">
                            <input type="checkbox" checked="checked">
                            <div class="checkmark"></div>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="multi-content3">
                        <div class="top">Ananta Ghaisani</div>
                        <div class="bottom"><img src="../img/Group.svg" alt="order"></div>
                        <div class="right"> 45 <small>pcs</small></div>
                        <div class="left">08:00-09:00</div>
                        <label class="container">
                            <input type="checkbox" checked="checked">
                            <div class="checkmark"></div>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="multi-content3">
                        <div class="top">Ananta Ghaisani</div>
                        <div class="bottom"><img src="../img/Group.svg" alt="order"></div>
                        <div class="right"> 45 <small>pcs</small></div>
                        <div class="left">08:00-09:00</div>
                        <label class="container">
                            <input type="checkbox" checked="checked">
                            <div class="checkmark"></div>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="multi-content3">
                        <div class="top">Ananta Ghaisani</div>
                        <div class="bottom"><img src="../img/Group.svg" alt="order"></div>
                        <div class="right"> 45 <small>pcs</small></div>
                        <div class="left">08:00-09:00</div>
                        <label class="container">
                            <input type="checkbox" checked="checked">
                            <div class="checkmark"></div>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="multi-content3">
                        <div class="top">Ananta Ghaisani</div>
                        <div class="bottom"><img src="../img/Group.svg" alt="order"></div>
                        <div class="right"> 45 <small>pcs</small></div>
                        <div class="left">08:00-09:00</div>
                        <label class="container">
                            <input type="checkbox" checked="checked">
                            <div class="checkmark"></div>
                        </label>
                    </td>
                </tr>
                <tr>
                    <td class="multi-content3">
                        <div class="top">Ananta Ghaisani</div>
                        <div class="bottom"><img src="../img/Group.svg" alt="order"></div>
                        <div class="right"> 45 <small>pcs</small></div>
                        <div class="left">08:00-09:00</div>
                        <label class="container">
                            <input type="checkbox" checked="checked">
                            <div class="checkmark"></div>
                        </label>
                    </td>
                </tr>
            </table>
        </div>
        <div class="dropdown">
            <div class="dropdown-select" onclick="toggleDropdown()">
                <span class="select">Pilih Supplier</span>
                <i class="fa fa-caret-down icon"></i>
            </div>
            <div class="dropdown-list">
                <div class="dropdown-list_item" onclick="selectOption(this)">Akila</div>
                <div class="dropdown-list_item" onclick="selectOption(this)">Revan</div>
                <div class="dropdown-list_item" onclick="selectOption(this)">Syakila</div>
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
    <script src="script.js"></script>
</body>
</html>