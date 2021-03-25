<?php
require "koneksi.php";

$nama = $_POST['namaTxt'];
$email = $_POST['emailTxt'];
$pesan = $_POST['pesanTxtArea'];


$sql = "INSERT INTO tb_tamu VALUES('','$nama','$email','$pesan')";
if($conn->query($sql) === true){
    echo "
    <script>
    alert('Berhasil Tersimpan');
    location.assign('halaman_buku_tamu.php');
    </script>
    ";
}else{
    echo "
    <script>
    alert('Gagal Tersimpan');
    location.assign('halaman_buku_tamu.php');
    </script>
    ";
}
?>