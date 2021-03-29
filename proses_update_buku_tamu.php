<?php
require "koneksi.php";
session_start();

$id = $_POST['idTxt'];
$nama = $_POST['namaTxt'];
$email = $_POST['emailTxt'];
$pesan = $_POST['pesanTxtArea'];


$sql = "UPDATE tb_tamu SET nama_tamu = '$nama', email_tamu = '$email', pesan_tamu = '$pesan' WHERE id_tamu='$id'";
if($conn->query($sql) === true){
    $_SESSION['update_status'] = 1;
    $_SESSION['warna_alert'] = 'alert alert-success alert-dismissible fade show';
    $_SESSION['update_message'] = '<strong>Berhasil!!</strong> Data berhasil di update';
    header("location:halaman_buku_tamu.php");
    // echo "
    // <script>
    // alert('Berhasil Terupdate');
    // location.assign('halaman_buku_tamu.php');
    // </script>
    // ";
}else{
    $_SESSION['update_status'] = 1;
    $_SESSION['warna_alert'] = 'alert alert-danger alert-dismissible fade show';
    $_SESSION['update_message'] = '<strong>Gagal!!</strong> Data gagal di update';
    header("location:halaman_buku_tamu.php");
    // echo "
    // <script>
    // alert('Gagal Terupdate');
    // location.assign('halaman_buku_tamu.php');
    // </script>
    // ";
}
?>