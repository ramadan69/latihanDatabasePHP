<?php
require "koneksi.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>

    <title>Buku Tamu</title>
</head>
<body>
    <div class="container">
    <?php
    if (isset($_SESSION['login_status']) == 1) { ?>
    <h3><?php echo $_SESSION['username']; ?>/<a href="logout.php">logout</a></h3>
    <?php 
    } else {
        header ("location:login.php");

    }
    ?>
        <div class="card">
            <div class="card-header">
                <h1>Tabel Pesan</h1>
            </div>

            <?php
            if (isset($_SESSION['insert_status'])) { ?>
                <div class="<?= $_SESSION['warna_alert']; ?>" role="alert">
                    <?= $_SESSION['insert_message']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php }
            unset($_SESSION['insert_status']);
            ?>

            <div class="card-body">
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

                <?php
                if (isset($_SESSION['update_status']) || isset($_SESSION['delete_status'])) { ?>
                    <div class="<?= $_SESSION['warna_alert']; ?>" role="alert">
                        <?php
                        if (isset($_SESSION['update_status'])) {
                            echo $_SESSION['update_message'];
                        }
                        if (isset($_SESSION['delete_status'])) {
                            echo $_SESSION['delete_message'];
                        }
                        ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php }
                unset($_SESSION['update_status']);
                unset($_SESSION['delete_status']);
                ?>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h1>Tabel Pesan</h1>
            </div>
            <div class="card-body">
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
                        if ($result->num_rows > 0) {
                            $no = 1;
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['id_tamu']; ?></td>
                                    <td><?= $row['nama_tamu']; ?></td>
                                    <td><?= $row['email_tamu']; ?></td>
                                    <td><?= $row['pesan_tamu']; ?></td>
                                    <td align="center">
                                        <a href="halaman_edit_buku_tamu.php?idTamu=<?= $row['id_tamu']; ?>" class="btn btn-primary text-success"><i class="fas fa-edit"></i></a>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-id="<?= $row['id_tamu']; ?>" data-nama="<?= $row['nama_tamu']; ?>" data-email="<?= $row['email_tamu']; ?>" data-pesan="<?= $row['pesan_tamu']; ?>">
                                            <i class="fas fa-edit"></i></button>
                                        <a href="proses_delete_buku_tamu.php?idTamu=<?= $row['id_tamu']; ?>" class="btn btn-danger text-white" onclick="return confirm('Anda akan menghapus record ini?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                        <?php
                                $no++;
                            }
                        }
                        ?>
                    </tbody>
            </div>
        </div>

        </table>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class='form-group' action='proses_update_buku_tamu.php' method='post'>
                            <div class="form-group">
                                <label for="id">ID</label>
                                <input class='form-control edit-id' type='text' name='idTxt' readonly>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input class='form-control edit-nama' type='text' name='namaTxt' required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class='form-control edit-email' type='text' name='emailTxt' required>
                            </div>
                            <div class="form-group">
                                <label for="pesan">Pesan</label>
                                <textarea class='form-control edit-pesan' row='5' name='pesanTxtArea' required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" class='btn btn-primary btn-block' value='update'>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-primary">Simpan Perubaahan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('#exampleModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                var nama = button.data('nama') // Extract info from data-* attributes
                var email = button.data('email') // Extract info from data-* attributes
                var pesan = button.data('pesan') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                // modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body .edit-id').val(id)
                modal.find('.modal-body .edit-nama').val(nama)
                modal.find('.modal-body .edit-email').val(email)
                modal.find('.modal-body .edit-pesan').html(pesan)
            })
            $('.alert').delay(500).fadeOut(5000);
        });
    </script>

</body>
</html>