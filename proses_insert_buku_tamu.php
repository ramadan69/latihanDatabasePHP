<?php
require "koneksi.php";
session_start();

$nama = $_POST['namaTxt'];
$email = $_POST['emailTxt'];
$pesan = $_POST['pesanTxtArea'];

$sql = "INSERT INTO tb_tamu VALUES('','$nama','$email','$pesan')";
if($conn->query($sql) === true){
    $_SESSION['insert_status'] = 1;
    $_SESSION['warna_alert'] = 'alert alert-success alert-dismissible fade show';
    $_SESSION['insert_message'] = '<strong>Berhasil!!</strong> Data Berhasil disimpan';
    header("location:halaman_buku_tamu.php");
    // echo "
    // <script>
    // alert('Berhasil Tersimpan');
    // location.assign('halaman_buku_tamu.php');
    // </script>
    // ";
}else{
    $_SESSION['insert_status'] = 1;
    $_SESSION['warna_alert'] = 'alert alert-danger alert-dismissible fade show';
    $_SESSION['insert_message'] = '<strong>Gagal!!</strong> Data gagal disimpan';
    header("location:halaman_buku_tamu.php");
    
    // echo "
    // <script>
    // alert('Gagal Tersimpan');
    // location.assign('halaman_buku_tamu.php');
    // </script>
    // ";
}
?>