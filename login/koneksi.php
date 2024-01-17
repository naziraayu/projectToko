<?php
// $server="localhost";
// $username="root";
// $password="";
// $db="toko_browniesnfriend";
$server="sibrownies.tifa.myhost.id";
$username="tifamyho_sibrownies";
$password="@JTIpolije2023";
$db="tifamyho_sibrownies";
$koneksi=mysqli_connect($server, $username, $password, $db);

if(mysqli_connect_error()){
echo "koneksi gagal: ".mysqli_connect_error();
}
?>