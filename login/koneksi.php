<?php
$server="localhost";
$username="root";
$password="";
$db="toko_browniesnfriends";
$koneksi=mysqli_connect($server, $username, $password, $db);

if(mysqli_connect_error()){
echo "koneksi gagal: ".mysqli_connect_error();
}
?>