<?php 
include 'koneksi.php';

if (isset($_POST['input'])) {
    $npm = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHp'];
    
    $query = "INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES ('$npm', '$namaMhs', '$prodi', '$alamat', '$noHp')";
    $result = mysqli_query($link, $query);
    
    if($result) {
        header("Location: viewMahasiswa.php");
        exit(); 
    } else {
        echo "Query gagal: " . mysqli_errno($link) . " - " . mysqli_error($link);
    }
}
?>