<link rel="stylesheet" href="css/bootstrap.min.css">
<div class="container">
    <div class="col-4 mx-auto">
        <div class="card">
            <div class="card-header">
                <h1>Login</h1>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="usrnm">Username</label>
                            <input class="form-control" type="text" name="usrnm" required>    
                        </div>
                        <div class="form-group">
                            <label for="psw">password</label>
                            <input class="form-control" type="password" name="psw" required>
                        </div>
                        <input class="btn btn-primary" type="submit" name="Login" value="Login"> 
                    </form>
                </div>    
            </div>
        </div>
        <?php
            require "koneksi.php";
            session_start();
            

            if(isset($_POST['Login'])){
                $usrnm = $_POST['usrnm'];
                $psw = $_POST['psw'];
                $sql = "SELECT * FROM tb_user WHERE (username='$usrnm' OR email='$usrnm') AND password='$psw' ";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    $_SESSION['login_status'] = 1;
                    $_SESSION['username'] = $usrnm;
                    header("location:halaman_buku_tamu.php");    
                }else{?>
                    <div class="alert alert-danger mt-2" role="alert">
                        <b>Gagal !! </b> Username atau password yang anda masukan salah 
                    </div>
                    <?php
                }
            }
        ?>
    </div>
</div>

<script src="js/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $('.alert').delay(500).fadeOut(5000);
});

</script>