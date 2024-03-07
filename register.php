<?php
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REGISTER |  KE PERPUSTAKAAN DIGITAL</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-6">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <div class="col-lg-6 d-none d-lg-block">
                            <img src="img/logo.png" width="500" height="500" alt="">
                        </div>

                            <div class="col-lg-6">  
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Perpustakaan Digital</h1>
                                    </div>
                                    <?php
                                    if(isset($_POST['register'])) {
                                        $nama = $_POST['nama'];
                                        $email = $_POST['email'];
                                        $alamat = $_POST['alamat'];
                                        $no_telepon = $_POST['no_telepon'];
                                        $username = $_POST['username'];
                                        $level = $_POST['level'];
                                        $password = md5($_POST['password']);

                                        $insert = mysqli_query($koneksi, "INSERT INTO user(nama,email,alamat,no_telepon,username,password,level) VALUES('$nama','$email','$alamat','$no_telepon','$username','$password','$level')");

                                       if($insert){
                                        echo '<script>alert("Selamat, register berhasil. Silahkan Login"); location.href="login.php"</script>';
                                       }else{
                                        echo '<script>alert("Register gagal, Silahkan ulangi kembali.");</script>;';
                                       }
                                    }
                                    ?>
                                    <form method="post" class="user">
                                    <div class="form-group">
                                    <label>Nama</label>
                                            <input type="text" name="nama" class="form-control form-control-user" placeholder="Masukkan Nama Lengkap" required>
                                        </div>
                                        <label>Email</label>
                                        <div class="form-group">
                                            <input type="text" name="email" class="form-control form-control-user" placeholder="Masukkan Email" required>
                                        </div>
                                        <label>No. Telepon</label>
                                        <div class="form-group">
                                            <input type="text" name="no_telepon" class="form-control form-control-user" placeholder="Masukkan No. Telepon" required>
                                        </div>
                                        <label>Alamat</label>
                                        <div class="form-group">
                                            <textarea  name="alamat" rows="2" class="form-control form-control-user" placeholder="Masukkan Alamat" required></textarea>
                                        </div>
                                        <label>Username</label>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user"
                                                id="InputUsername" placeholder="Masukkan Username" required>
                                        </div>
                                        <label>Password</label>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="InputPassword" 
                                                placeholder="Masukkan Password" required>
                                        </div>
                                        <label>Level</label>
                                        <div class="form-group">    
                                           <select name="level" class="form-control" required>
                                            <option value="peminjam">Peminjam</option>
                                            <option value="admin">Admin</option>
                                           </select>
                                        </div>
                                        <br>
                                        <div class="form-group">

                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <button class="btn btn-primary" type="submit" name="register" value="register">Register</button>
                                        
                                        </div>
                                    </form>
                                    <hr>
                                    <span>Jika Anda sudah punya akun, <a href="login.php">klik disini</a>.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>