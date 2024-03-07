
<div class="card">
    <div class="card-body">     
<div class="row">
<h1 class="mt-4">Profil Anda</h1>
    <div class="col-md-12">
    <table class="table table-bordered">
                                <tr>
                                    <td width="200">ID</td>
                                    <td width="1">:</td>
                                    <td><?php echo $_SESSION['user']['id_user']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Nama</td>
                                    <td width="1">:</td>
                                    <td><?php echo $_SESSION['user']['nama']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Email</td>
                                    <td width="1">:</td>
                                    <td><?php echo $_SESSION['user']['email']; ?><td>
                                </tr>
                                <tr>
                                    <td width="200">Alamat</td>
                                    <td width="1">:</td>
                                    <td><?php echo $_SESSION['user']['alamat']; ?><td>
                                </tr>
                                <tr>
                                    <td width="200">No Telepon</td>
                                    <td width="1">:</td>
                                    <td><?php echo $_SESSION['user']['no_telepon']; ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Level</td>
                                    <td width="1">:</td>
                                    <td><?php echo $_SESSION['user']['level']; ?></td>
                                </tr>
                                <tr>
                                     <td width="200">Tanggal Login</td>
                                    <td width="1">:</td>
                                    <td><?php echo date('d-m-Y'); ?></td>
                                </tr>
                                
                            </table> 
  <div>
  <a href="index.php" class="btn btn-danger">Kembali</a>
  </div>
    </div>
</div>
    </div>
</div>
