<?php
require "koneksi.php";
session_start();

$id = $_GET['idTamu'];

$sql = "DELETE FROM tb_tamu WHERE id_tamu='$id'";
if($conn->query($sql) === true){
    $_SESSION['delete_status'] = 1;
    $_SESSION['delete_message'] = '<strong>Berhasil!!</strong> Data Berhasil dihapus';
    header("location:halaman_buku_tamu.php");
    // echo "
    // <script>
    // alert('Berhasil Terhapus');
    // location.assign('halaman_buku_tamu.php');
    // </script>
    // ";
    
}else{
    echo "
    <script>
    alert('Gagal Terhapus');
    location.assign('halaman_buku_tamu.php');
    </script>
    ";
}
?>