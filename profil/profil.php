<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <title>Profil</title>
    <link rel="stylesheet" href="profil.css"/>
</head>
<body>
</head>
<body>
    <header>
        <div class="head">
          <div class="nav">
            <img src="../img/Ellipse 1.png" alt="logo" />
                <ul>
                    <li class="stok"><a href="../stokEtalase/stokEtalase.html">STOK ETALASE</a></li>
                    <li class="pes"><a href="../pesananSaya/kemarin.html">PESANAN SAYA</a></li>
                    <li class="pen"><a href="../pendapatan/pendapatan.html">PENDAPATAN</a></li>
                </ul>
            </div> 
        </div>
    </header>
    <div class="selector">
        <div id="selectetField">
          <p id="selectText">NURUL HIDAYAH</p>
          <img src="../img/Vector.svg" alt="profile">
          <img src="../img/Vector1.png" alt="profile">
        </div>
        <div class="selector-list">
        <ul id="list" class="hide">
          <li class="options1">
            <p>Nurul Hidayah <br> <span class="Keterangan">Supplier</span></p>
          </li>
          <li class="options">
            <img src="../img/Vector(3).png" alt="profile2">
            <p>Profil Saya</p>
          </li>
          <li class="options">
            <img src="../img/Pengaturan.png" alt="pengaturan">
            <p>Edit Profile</p>
          </li>
          <li class="options">
            <img src="../img/logout.png" alt="logout">
            <p>Logout</p>
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
    <div class="wrapper">
        <div class="img"><img src="../img/Ellipse 8.png" alt=""></div>
        <div class="teks">Nurul Hidayah <span class="ket">Supplier</span></div>
    </div>
<header2>
        <div class="head2">
          <div class="nav2">
                <ul>
                    <li class="stok"><a href="../profil/profil.php">Lihat Profil</a></li>
                    <li class="pes"><a href="../editProfil/editProfil.php">Edit Profile</a></li>
                    <li class="pen"><a href="../gantiPassword/gantiPassword.php">Ganti Password</a></li>
                </ul>
            </div> 
            <div class="container">
                <div class="title">Detail Profile</div>
                <div class="content">
                    <form action="#">
                        <div class="box">
                            <span class="details"> Nama </span>
                            <input type="text" value="Nurul Hidayah" readonly>
                            
                        </div>
                        <div class="box">
                            <span class="details"> Alamat </span>
                            <input type="text" value="Jalan Hayam Wuruk Gang 6" readonly>
                        </div>
                        <div class="box">
                            <span class="details"> No. Telephone </span>
                            <input type="text" value="085654356278" readonly>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="wrapper1">
                <div>
                <button class="button1"type="submit1" name="proses">Simpan Profile</button>
                </div> -->
        </div>
</header2>
</body>
</html>