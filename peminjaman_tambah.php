<h1 class="mt-4">Peminjaman Buku</h1><br>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            

            <?php
            if(isset($_POST['submit'])) {
                $id_buku = $_POST['id_buku'];
                $id_user = $_SESSION['user']['id_user'];
                $tanggal_peminjaman = $_POST['tanggal_peminjaman'];
                $tanggal_pengembalian = $_POST['tanggal_pengembalian'];
                $status_peminjaman = "dipinjam"; // Langsung meminjam

                // Periksa apakah tanggal pengembalian sudah lewat
                $tanggal_sekarang = date("Y-m-d");
                if ($tanggal_sekarang > $tanggal_pengembalian) {
                    echo '<script>alert("Pengembalian buku terlambat!");</script>';
                }

                $query = mysqli_query($koneksi, "INSERT INTO peminjaman(id_buku,id_user,tanggal_peminjaman,tanggal_pengembalian,status_peminjaman) values('$id_buku', '$id_user', '$tanggal_peminjaman', '$tanggal_pengembalian', '$status_peminjaman')");

                if($query) {
                    echo '<script>alert("Tambah Data Berhasil.");location.href = "index.php?page=peminjaman";</script>';
                } else {
                    echo '<script>alert("Tambah Data Gagal.");</script>';
                }
            }
            ?>

            <!-- Form untuk tambah peminjaman -->
            <form method="post">
                <div class="row mb-3">
                    <div class="col-md-2">Buku :</div>
                    <div class="col-md-6">
                        <select name="id_buku" class="form-control">
                            <?php
                            $buk = mysqli_query($koneksi, "SELECT * FROM buku");
                            while($buku = mysqli_fetch_array($buk)) {
                            ?>
                            <option value="<?php echo $buku['id_buku']; ?>"><?php echo $buku['judul'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                        
                <div class="row mb-3">
                    <div class="col-md-2">Tanggal Peminjaman :</div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="tanggal_peminjaman">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Tanggal Pengembalian :</div>
                    <div class="col-md-6">
                        <input type="date" class="form-control" name="tanggal_pengembalian">
                    </div>
                </div>
            
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <a href="?page=peminjaman" class="btn btn-danger">Kembali</a>
                    </div>
                </div>
            </form>
           
    </div>
</div>
    </div>
</div>