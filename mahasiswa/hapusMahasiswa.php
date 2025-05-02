<?php    
include('koneksi.php');  
 
if (isset($_GET['npm'])) {  
    $id = $_GET['npm'];  
    
    $query = "DELETE FROM t_mahasiswa WHERE npm='$id' ";  
    $result = mysqli_query($link, $query);  

    if (!$result) {  
        die("Gagal menghapus data: " . mysqli_error($link));  
    }  
}  
header("location:viewMahasiswa.php");  
?>