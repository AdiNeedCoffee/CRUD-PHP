<?php  
if (isset($_POST['edit'])) {   
    include 'koneksi.php';  
 
    $id = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHp = $_POST['noHp'];  
  
    $query  = "UPDATE t_mahasiswa SET namaMhs = '$namaMhs', prodi = '$prodi', alamat = '$alamat', noHp = '$noHp' WHERE npm = '$id'";  
    $result = mysqli_query($link, $query);  

    if (!$result) {  
        die("Query gagal dijalankan: ".mysqli_errno($link) .  
            " - " . mysqli_error($link));  
    }  
}  
header("location:viewMahasiswa.php");  
?>  