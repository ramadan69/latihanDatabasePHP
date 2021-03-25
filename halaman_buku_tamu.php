<?php
require "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link href="your-path-to-fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="your-path-to-fontawesome/css/all.css" rel="stylesheet"> <!--load all styles -->
    <link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" rel="stylesheet"> <!--load all styles -->

    <title>Buku Tamu</title>
</head>
<body>
    <div class="container">
        <h1>Tabel Pesan</h1>
        <form class='form-group' action='proses_insert_buku_tamu.php' method='post'>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input class='form-control' type='text' name=namaTxt required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input class='form-control' type='text' name=emailTxt required>
            </div>
                <div class="form-group">
                <label for="pesan">Pesan</label>
            <textarea class='form-control' row='5' name=pesanTxtArea required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class='btn btn-primary btn-block' value='kirim'>
            </div>     
        </form>

        <table class='table table-bordered' id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "SELECT * FROM tb_tamu ORDER BY id_tamu DESC";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $no = 1;
                    while($row = $result->fetch_assoc()){?>
                <tr>
                    <td><?=$no;?></td>
                    <td><?=$row['id_tamu'];?></td>
                    <td><?=$row['nama_tamu'];?></td>
                    <td><?=$row['email_tamu'];?></td>
                    <td><?=$row['pesan_tamu'];?></td>
                    <td align="center">
                        <a href="halaman_edit_buku_tamu.php?idTamu=<?=$row['id_tamu'];?>" class="text-success" ><i class="fas fa-edit"></i></a>
                        <a href="proses_delete_buku_tamu.php?idTamu=<?=$row['id_tamu'];?>" class="text-danger" onclick="return confirm('Anda akan menghapus record ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
            <?php
            $no++;
                    }
                }
            ?>
            </tbody>
        
        </table>
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