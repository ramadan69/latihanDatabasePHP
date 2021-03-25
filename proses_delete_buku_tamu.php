<?php
require "koneksi.php";

$id = $_GET['idTamu'];

$sql = "DELETE FROM tb_tamu WHERE id_tamu='$id'";
if($conn->query($sql) === true){
    echo "
    <script>
    alert('Berhasil Terhapus');
    location.assign('halaman_buku_tamu.php');
    </script>
    ";
    
}else{
    echo "
    <script>
    alert('Gagal Terhapus');
    location.assign('halaman_buku_tamu.php');
    </script>
    ";
}
?>