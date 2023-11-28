<?php
require("../login/koneksi.php");
if (isset($_POST['btn_edit'])) {
    $id=$_POST['Input_Stok'];
    $sisa_s=$_POST['Sisa_Stok'];
    $query="update detail_suppmenu_etalase set sisa='$sisa_s' where id_setorEtalase='$id'";
    $result=mysqli_query($koneksi, $query);
    ?><script>
        alert("berhasil menginputkan sisa stok");
    </script><?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etalase</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.css" integrity="sha512-phGxLIsvHFArdI7IyLjv14dchvbVkEDaH95efvAae/y2exeWBQCQDpNFbOTdV1p4/pIa/XtbuDCnfhDEIXhvGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="etalase.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet"  type="text/css" href="css/jquery-ui.css">
</head>
<body>
    <header>
        <div class="head"> 
            <div class="nav">
                <form action="etalase.php" method="post">
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
    <div class="title">
        <h1>DAFTAR SETORAN KUE</h1>
    </div>
    <div class="date">
        <div class="datetime">
            <input type="date" name="Hari_ini" placeholder="Hari Ini">
        </div>
    </div>
    <div class="button">
        <div class="simpan">
            <input type="text" name="Sisa_Stok" id="Sisa_Stok" placeholder="Sisa Stok">
        </div>
        <div class="edit">
            <button type="submit" name="btn_edit" ><img src="../img/edit.png" alt=""> Edit Sisa</button>
        </div>
    </div>
    <div class="setor">
        <input type="hidden" name="Input_Stok" id="Input_Stok" placeholder="Input Stok">
    </div>
    <?php
                if (isset($_GET['id_setor'])) {
                    $id=$_GET['id_setor'];
                    $query="select sisa, id_setorEtalase from detail_suppmenu_etalase where id_setorEtalase='$id'";
                    $result=mysqli_query($koneksi, $query);
                    while ($row=mysqli_fetch_array($result)) {
                        $id_setorEtalase=$row['id_setorEtalase'];
                        $sisa=$row['sisa'];
                    }
                    ?>
                    <script>
                        document.getElementById('Sisa_Stok').value="<?php echo $sisa;?>";
                        document.getElementById('Input_Stok').value="<?php echo $id_setorEtalase;?>";
                    </script>
                    <?php   
                }
            ?>
    <div class="table">
        <div class="table-pesanan">
            <table>
                <thead>
                    <tr>
                        <th>Nama Barang</th>
                        <th>Jam Antar</th>
                        <th>Jumlah<br>Setor</th>
                        <th>Sisa Setor</th>
                    </tr>
                    <?php
                    if (isset($_REQUEST['Hari_ini'])) {
                        $tanggal=$_REQUEST['Hari_ini'];
                        //     $query="SELECT supplier_menu.id_suppmenu, detail_suppmenu_etalase.id_setorEtalase, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.tanggal_setor, barang.nama_barang FROM detail_suppmenu_etalase JOIN supplier_menu ON detail_suppmenu_etalase.id_suppmenu=supplier_menu.id_suppmenu JOIN barang ON barang.id_barang=supplier_menu.id_barang WHERE detail_suppmenu_etalase.tanggal_setor='$tanggal' GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                        //     $result=mysqli_query($koneksi, $query);
                        //     while ($row=mysqli_fetch_array($result)) {
                        //         $id_suppmenu=$row['id_suppmenu'];
                        //         $id_setorEtalase=$row['id_setorEtalase'];
                        //         $jumlah_setor=$row['jumlah_setor'];
                        //         $sisa=$row['sisa'];
                        //         $jam=$row['jam'];
                        //         $tanggal_setor=$row['tanggal_setor'];
                        //         $nama=$row['nama_barang'];
                        ?>
                        <!-- // <tr>
                        // </tr> -->
                        <script>
                            alert("<?php echo $tanggal;?>")
                        </script>
                        <?php }   
                    //}
                    ?>
                    <tbody>
                        <?php
                            $query="SELECT supplier_menu.id_suppmenu, detail_suppmenu_etalase.id_setorEtalase, detail_suppmenu_etalase.jumlah_setor, detail_suppmenu_etalase.sisa, detail_suppmenu_etalase.jam, detail_suppmenu_etalase.tanggal_setor, barang.nama_barang FROM detail_suppmenu_etalase JOIN supplier_menu ON detail_suppmenu_etalase.id_suppmenu=supplier_menu.id_suppmenu JOIN barang ON barang.id_barang=supplier_menu.id_barang WHERE detail_suppmenu_etalase.tanggal_setor=curdate() GROUP BY detail_suppmenu_etalase.id_setorEtalase";
                            $result=mysqli_query($koneksi, $query);
                            while ($row=mysqli_fetch_array($result)) {
                                $id_suppmenu=$row['id_suppmenu'];
                                $id_setorEtalase=$row['id_setorEtalase'];
                                $jumlah_setor=$row['jumlah_setor'];
                                $sisa=$row['sisa'];
                                $jam=$row['jam'];
                                $tanggal_setor=$row['tanggal_setor'];
                                $nama=$row['nama_barang'];
                        ?>
                        <tr>
                            <td><?php echo $nama; ?></td>
                            <td><?php echo $jam; ?></td>
                            <td><?php echo $jumlah_setor; ?></td>
                            <td onclick="tampilSisa(<?php echo $id_setorEtalase; ?>)"><?php echo $sisa; ?></td>
                            <script>
                            function tampilSisa(id) {
                                window.location.href="etalase.php?id_setor="+id;
                            }
                        </script>
                        </tr>
                        <?php } ?>
                    </tbody>
                </thead>
            </table>
        </div>
    </div>
    </form>
    <div class="footer"></div>
</body>
</html>