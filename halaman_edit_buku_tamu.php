<?php
require "koneksi.php";

$id = $_GET['idTamu'];
$sql = "SELECT * FROM tb_tamu WHERE id_tamu=$id";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()){
    $nama = $row['nama_tamu'];  
    $email = $row['email_tamu'];  
    $pesan = $row['pesan_tamu'];
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="your-path-to-fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"> <!--load all styles -->
    
    <title>Buku Tamu</title>
</head>
<body>
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h1>Tabel Pesan</h1>
            </div>
            <div class="card-body">
                <form class='form-group' action='proses_update_buku_tamu.php' method='post'>
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input class='form-control' type='text' name='idTxt' readonly value="<?=$_GET['idTamu'];?>">
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class='form-control' type='text' name='namaTxt' value="<?=$nama;?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class='form-control' type='text' name='emailTxt' value="<?=$email;?>" required>
                    </div>
                        <div class="form-group">
                        <label for="pesan">Pesan</label>
                    <textarea class='form-control' row='5' name='pesanTxtArea' required><?=$pesan;?></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class='btn btn-primary btn-block' value='kirim'>
                    </div>     
                </form>
            </div>
        </div>
    </div>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> 
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>