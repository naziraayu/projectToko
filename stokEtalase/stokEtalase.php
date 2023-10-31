<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stok Etalase</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="stokEtalase.css" />
    <script src="stokEtalase.js" ></script>
</head>
<body>
    <header>
        <div class="head">
          <div class="nav">
            <img src="../img/Ellipse 1.png" alt="logo" />
                <ul>
                    <li class="stok"><a href="#">STOK ETALASE</a></li>
                    <li class="pes"><a href="#">PESANAN MASUK</a></li>
                    <li class="pen"><a href="#">PENDAPATAN</a></li>
                    <li class="log"><a href="../login/login.html">LOG OUT</a></li>
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
    <div class="content">
    </div>
    <section class="menu">
        <!-- <button class="card-btn"><img src="../img/plus.png" alt=""></button> -->
        <div class="container">
            <div class="slide-wrapper">
                <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
                <ul class="image-list"> 
                    <img src="../img/Rectangle 64.png" alt="" class="image-item">
                    <img src="../img/Rectangle 65.png" alt="" class="image-item">
                    <img src="../img/Rectangle 66.png" alt="" class="image-item">
                    <img src="../img/Rectangle 64.png" alt="" class="image-item">
                    <img src="../img/Rectangle 65.png" alt="" class="image-item">
                    <img src="../img/Rectangle 66.png" alt="" class="image-item">
                </ul>
                <button id="next-slide" class="slide-button material-symbols-rounded">chevron_right</button>
            </div>
            <div class="slider-scrollbar">
                <div class="scrollbar-track">
                    <div class="scrollbar-thumb"></div>
                </div>
            </div>
        </div>
        <div class="simpan">
            <button type="submit">Simpan</button>
        </div>
    </section>
</body>
</html>