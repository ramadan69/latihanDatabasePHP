<?php
require "koneksi.php";

$id = $_POST['idTxt'];
$nama = $_POST['namaTxt'];
$email = $_POST['emailTxt'];
$pesan = $_POST['pesanTxtArea'];


$sql = "UPDATE tb_tamu SET nama_tamu = '$nama', email_tamu = '$email', pesan_tamu = '$pesan' WHERE id_tamu='$id'";
if($conn->query($sql) === true){
    echo "
    <script>
    alert('Berhasil Terupdate');
    location.assign('halaman_buku_tamu.php');
    </script>
    ";
}else{
    echo "
    <script>
    alert('Gagal Terupdate');
    location.assign('halaman_buku_tamu.php');
    </script>
    ";
}
?>