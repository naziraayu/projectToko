<?php
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

    require ("../login/koneksi.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Etalase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="stokEtalase1.css" /> 
    <script src="stokEtalase.js" defer></script>
</head>
<body>
    <header>
    <?php
        $nama=$_GET['nama'];
        $id=$_GET['id_supplier'];
    ?>   
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
    <div class="table-content">
        <table>
            <thead>
                <tr>
                    <td>
                        <div class="table-header">
                            <div class="stok-header">
                                <h2>Stok Setoran</h2>
                            </div>
                            <div class="today">
                                <h3>| Hari Ini</h3>
                            </div>
                        </div>
                    </td>
                </tr>
            </thead>
            <tbody>
            <?php
                if (isset($_GET['id_supplier'])) {
                    $id_supp=$_GET['id_supplier'];
                    $nama_supp=$_GET['nama'];
                    $query="SELECT supplier_menu.id_suppmenu, SUM(detail_suppmenu_etalase.jumlah_setor) AS jumlah_setor, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.tanggal_setor, barang.nama_barang FROM detail_suppmenu_etalase JOIN supplier_menu ON detail_suppmenu_etalase.id_suppmenu=supplier_menu.id_suppmenu JOIN barang ON barang.id_barang=supplier_menu.id_barang WHERE supplier_menu.id_user='$id_supp' AND detail_suppmenu_etalase.tanggal_setor=curdate() GROUP BY detail_suppmenu_etalase.id_suppmenu";
                    $result=mysqli_query($koneksi, $query);
                    if ($num=mysqli_num_rows($result) != 0) {
                        while ($row=mysqli_fetch_array($result)) {
                            $id_suppmenu=$row['id_suppmenu'];
                            $jumlh_setor=$row['jumlah_setor'];
                            $jam=$row['jam'];
                            $tanggal=$row['tanggal_setor'];
                            $nama=$row['nama_barang'];
                ?>
                <tr>
                    <td>
                        <div class="menu">
                            <div class="first-menu">
                                <div class="nama-menu">
                                    <h4><?php echo $nama; ?></h4>
                                </div>
                                <div class="time">
                                    <img src="../img/clock.png" alt="">
                                    <p><?php echo $jam;?> WIB</p>
                                </div>
                            </div>
                            <div class="second-menu">
                                <div class="jumlah">
                                    <h3><?php echo $jumlh_setor;?></h3>
                                    <p>Pcs</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php }
                }else{ ?>
                <div class="gambar">
                    <img src="../img/Group 194.png" alt="">
                </div>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="caraousel">
            <div class="slider">
            <?php
                $qry_stokEtalase="SELECT barang.gambar_barang, barang.nama_barang, supplier_menu.harga_beli, user.id_user, supplier_menu.id_suppmenu FROM barang JOIN supplier_menu ON barang.id_barang=supplier_menu.id_barang JOIN user ON  user.id_user=supplier_menu.id_user WHERE supplier_menu.id_user='$id_supp'";
                $rslt_stokEtalase=mysqli_query($koneksi, $qry_stokEtalase);
                while ($row_stok=mysqli_fetch_array($rslt_stokEtalase)) {
                    $foto=$row_stok['gambar_barang'];
                    $nama=$row_stok['nama_barang'];
                    $id=$row_stok['id_suppmenu'];
            ?>
                <section>
                    <p><?php echo $nama; ?></p>
                    <img src="../gambar/<?php echo $foto; ?>" alt="">
                    <div class="add">
                        <span class="dec button"><button><i class="fa-solid fa-minus"></i></button></span>
                        <input type="text" name="angka_<?php echo $id; ?>" id=""  value="0">
                        <span class="inc button"><button><i class="fa-solid fa-plus"></i></button></span>
                    </div>
                    <div class="simpann">
                        <button type="submit" onclick="hitung(<?php echo $id; ?>)" >Simpan</button>
                        <script>
                            function hitung(id) {
                                var angka=document.getElementsByName('angka_' + id)[0].value;
                                window.location.href="stokEtalase.php?id_supplier=" + <?php echo $id_supp;?> + "&nama=" + "<?php echo $nama_supp;?>" + "&id_suppmenu="+id+"&angka="+angka;
                            }
                        </script>
                    </div>
                </section>
                <?php
                    }
                ?>
                <script>
                    var incrementButton=document.getElementsByClassName('inc');
                    var decrementButton=document.getElementsByClassName('dec');
                    for (var i =0; i < decrementButton.length; i++) {
                        var button = decrementButton[i];
                        button.addEventListener('click',function(event){
                            var buttonClicked=event.target;
                            var input=buttonClicked.parentElement;
                            var a=input.parentElement;
                            var b=a.parentElement.children[1];
                            var bValue=b.value;
                            var newValue=parseInt(bValue)-1;
                            b.value=newValue;
                        })
                        
                    }
                    for (var i =0; i < incrementButton.length; i++) {
                        var button = incrementButton[i];
                        button.addEventListener('click',function(event){
                            var buttonClicked=event.target;
                            var input=buttonClicked.parentElement;
                            var a=input.parentElement;
                            var b=a.parentElement.children[1];
                            var bValue=b.value;
                            var newValue=parseInt(bValue)+1;
                            b.value=newValue;
                        })
                        
                    }
                </script>
                <?php
                    $jam=date('H:i:s');
                    $tanggal=date('Y:m:d');
                    if (isset($_GET['angka'])) {
                        $id=$_GET['id_supplier'];
                        $nama=$_GET['nama'];   
                        $id_suppmenu=$_GET['id_suppmenu'];
                        $setor=$_GET['angka'];
                        $query="INSERT INTO `detail_suppmenu_etalase` (`id_setorEtalase`, `jumlah_setor`, `sisa`, `jam`, `tanggal_setor`, `id_suppmenu`) VALUES (NULL, '$setor', 0, '$jam', '$tanggal', '$id_suppmenu')";
                        $result=mysqli_query($koneksi, $query);
                        ?>
                        <script>
                            alert("Berhasil setor ke toko")
                            window.location.href="stokEtalase.php?id_supplier=<?php echo $id; ?>&nama=<?php echo $nama;?>";
                        </script>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="controls">
                <span class="arrow left"><i class="fa-solid fa-angle-left"></i></span>
                <span class="arrow right"><i class="fa-solid fa-angle-right"></i></span>
            </div>
        </div>
    </div>
    <div class="simpan">
        <button type="submit">Simpan</button>
    </div>
</body>
</html>