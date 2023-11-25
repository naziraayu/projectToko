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
        <div class="head">
          <div class="nav">
            <img src="../img/Ellipse 1.png" alt="logo" />
                <ul>
                    <li class="stok"><a href="../stokEtalase/stokEtalase.php">STOK ETALASE</a></li>
                    <li class="pes"><a href="../pesananSaya/hariIni.php">PESANAN SAYA</a></li>
                    <li class="pen"><a href="../pendapatan/pendapatan.php">PENDAPATAN</a></li>
                    <!-- <li class="log"><a href="../login/login.html">LOG OUT</a></li> -->
                    <!-- <select class="select-box"> -->
                        <!-- <option value="1">Nurul Hidayah img</option> -->
                        <!-- <option value="2">Profile Saya</option>
                        <option value="3">Pengaturan Profile</option>
                        <option value="4">Log Out</option><a href="../login/login.html"></a>
                    </select> -->
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
                    <p><a href="../profil/profil.php">Profil Saya</a></p>
                </li>
                <li class="options">
                    <img src="../img/Pengaturan.png" alt="pengaturan">
                    <p><a href="../editProfil/editProfil.php">Edit Profile</a></p>
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
            <p>Senin, 2 November 2023</p>
            <img src="../img/Group 9.png" alt="">
        </div>
    </div>
    <div class="table-content">
        <!-- <div class="gambar">
            <img src="../img/Group 194.png" alt="">
        </div> -->
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
                <tr>
                    <td>
                        <div class="menu">
                            <div class="first-menu">
                                <div class="nama-menu">
                                    <h4>Putu Ayu</h4>
                                </div>
                                <div class="time">
                                    <img src="../img/clock.png" alt="">
                                    <p>10.00 WIB</p>
                                </div>
                            </div>
                            <div class="second-menu">
                                <div class="jumlah">
                                    <h3>78</h3>
                                    <p>Pcs</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="menu">
                            <div class="first-menu">
                                <div class="nama-menu">
                                    <h4>Putu Ayu</h4>
                                </div>
                                <div class="time">
                                    <img src="../img/clock.png" alt="">
                                    <p>10.00 WIB</p>
                                </div>
                            </div>
                            <div class="second-menu">
                                <div class="jumlah">
                                    <h3>78</h3>
                                    <p>Pcs</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="menu">
                            <div class="first-menu">
                                <div class="nama-menu">
                                    <h4>Putu Ayu</h4>
                                </div>
                                <div class="time">
                                    <img src="../img/clock.png" alt="">
                                    <p>10.00 WIB</p>
                                </div>
                            </div>
                            <div class="second-menu">
                                <div class="jumlah">
                                    <h3>78</h3>
                                    <p>Pcs</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="menu">
                            <div class="first-menu">
                                <div class="nama-menu">
                                    <h4>Putu Ayu</h4>
                                </div>
                                <div class="time">
                                    <img src="../img/clock.png" alt="">
                                    <p>10.00 WIB</p>
                                </div>
                            </div>
                            <div class="second-menu">
                                <div class="jumlah">
                                    <h3>78</h3>
                                    <p>Pcs</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="menu">
                            <div class="first-menu">
                                <div class="nama-menu">
                                    <h4>Putu Ayu</h4>
                                </div>
                                <div class="time">
                                    <img src="../img/clock.png" alt="">
                                    <p>10.00 WIB</p>
                                </div>
                            </div>
                            <div class="second-menu">
                                <div class="jumlah">
                                    <h3>78</h3>
                                    <p>Pcs</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="menu">
                            <div class="first-menu">
                                <div class="nama-menu">
                                    <h4>Putu Ayu</h4>
                                </div>
                                <div class="time">
                                    <img src="../img/clock.png" alt="">
                                    <p>10.00 WIB</p>
                                </div>
                            </div>
                            <div class="second-menu">
                                <div class="jumlah">
                                    <h3>78</h3>
                                    <p>Pcs</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="menu">
                            <div class="first-menu">
                                <div class="nama-menu">
                                    <h4>Putu Ayu</h4>
                                </div>
                                <div class="time">
                                    <img src="../img/clock.png" alt="">
                                    <p>10.00 WIB</p>
                                </div>
                            </div>
                            <div class="second-menu">
                                <div class="jumlah">
                                    <h3>78</h3>
                                    <p>Pcs</p>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="caraousel">
            <div class="slider">
                <section>
                    <p>Kue</p>
                    <img src="../img/Rectangle 64.png" alt="">
                    <div class="add">
                        <span><button><i class="fa-solid fa-minus"></i></button></span>
                        <input type="text" name="angka" id="">
                        <span><button><i class="fa-solid fa-plus"></i></button></span>
                    </div>
                    <div class="simpann">
                        <button type="submit">Simpan</button>
                    </div>
                </section>
                <section>
                    <p>Putu</p>
                    <img src="../img/Rectangle 65.png" alt="">
                    <div class="add">
                        <span><button><i class="fa-solid fa-minus"></i></button></span>
                        <input type="text" name="angka" id="">
                        <span><button><i class="fa-solid fa-plus"></i></button></span>
                    </div>
                    <div class="simpann">
                        <button type="submit">Simpan</button>
                    </div>
                </section>
                <section>
                    <p>Talam</p>
                    <img src="../img/Rectangle 66.png" alt="">
                    <div class="add">
                        <span><button><i class="fa-solid fa-minus"></i></button></span>
                        <input type="text" name="angka" id="">
                        <span><button><i class="fa-solid fa-plus"></i></button></span>
                    </div>
                    <div class="simpann">
                        <button type="submit">Simpan</button>
                    </div>
                </section>
                <section>
                    <p>Brownies</p>
                    <img src="../img/Rectangle 64.png" alt="">
                    <div class="add">
                        <span><button><i class="fa-solid fa-minus"></i></button></span>
                        <input type="text" name="angka" id="">
                        <span><button><i class="fa-solid fa-plus"></i></button></span>
                    </div>
                    <div class="simpann">
                        <button type="submit">Simpan</button>
                    </div>
                </section>
                <section>
                    <p>Mochi</p>
                    <img src="../img/Rectangle 65.png" alt="">
                    <div class="add">
                        <span><button><i class="fa-solid fa-minus"></i></button></span>
                        <input type="text" name="angka" id="">
                        <span><button><i class="fa-solid fa-plus"></i></button></span>
                    </div>
                    <div class="simpann">
                        <button type="submit">Simpan</button>
                    </div>
                </section>
                <section>
                    <p>Sus</p>
                    <img src="../img/Rectangle 66.png" alt="">
                    <div class="add">
                        <span><button><i class="fa-solid fa-minus"></i></button></span>
                        <input type="text" name="angka" id="">
                        <span><button><i class="fa-solid fa-plus"></i></button></span>
                    </div>
                    <div class="simpann">
                        <button type="submit">Simpan</button>
                    </div>
                </section>
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
    <!-- <div class="wrapper">
        <i id="left" class="fa-solid fa-angle-left"></i>
        <ul class="carousel">
          <li class="card">
            <div class="img"><img src="../img/Rectangle 64.png" alt="img" draggable="false"></div>
            <h2>Putu</h2>
            <div class="add">
                <span><button><img src="../img/minus.png" alt=""></button></span>
                <input type="text" name="angka" id="">
                <span><button><img src="../img/plus.png" alt=""></button></span>
            </div>
          </li>
          <li class="card">
            <div class="img"><img src="../img/Rectangle 65.png" alt="img" draggable="false"></div>
            <h2>Talam</h2>
            <div class="add">
                <span><button><img src="../img/minus.png" alt=""></button></span>
                <input type="text" name="angka" id="">
                <span><button><img src="../img/plus.png" alt=""></button></span>
            </div>
          </li>
          <li class="card">
            <div class="img"><img src="../img/Rectangle 66.png" alt="img" draggable="false"></div>
            <h2>Talam</h2>
            <div class="add">
                <span><button><img src="../img/minus.png" alt=""></button></span>
                <input type="text" name="angka" id="">
                <span><button><img src="../img/plus.png" alt=""></button></span>
            </div>
          </li>
          <li class="card">
            <div class="img"><img src="../img/Rectangle 64.png" alt="img" draggable="false"></div>
            <h2>Talam</h2>
            <div class="add">
                <span><button><img src="../img/minus.png" alt=""></button></span>
                <input type="text" name="angka" id="">
                <span><button><img src="../img/plus.png" alt=""></button></span>
            </div>
          </li>
          <li class="card">
            <div class="img"><img src="../img/Rectangle 65.png" alt="img" draggable="false"></div>
            <h2>Talam</h2>
            <div class="add">
                <span><button><img src="../img/minus.png" alt=""></button></span>
                <input type="text" name="angka" id="">
                <span><button><img src="../img/plus.png" alt=""></button></span>
            </div>
          </li>
          <li class="card">
            <div class="img"><img src="../img/Rectangle 66.png" alt="img" draggable="false"></div>
            <h2>Talam</h2>
            <div class="add">
                <span><button><img src="../img/minus.png" alt=""></button></span>
                <input type="text" name="angka" id="">
                <span><button><img src="../img/plus.png" alt=""></button></span>
            </div>
          </li>
        </ul>
        <i id="right" class="fa-solid fa-angle-right"></i> -->
</body>
</html>