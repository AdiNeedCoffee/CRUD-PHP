<?php
$host = "localhost:3307";
$user = "root";
$paswd = "";
$name = "dbperkuliahan";

$link = mysqli_connect($host, $user, $paswd,$name);

if(!$link){
    die ("Koneksi dengan database gagal: ". mysqli_connect_errno(). " - ". mysqli_connect_error());
} 
?>