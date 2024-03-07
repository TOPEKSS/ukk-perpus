<h1 class="mt-4">Peminjaman Buku</h1>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <?php
                // Cek apakah pengguna adalah peminjam atau petugas
                if ($_SESSION['user']['level'] == 'peminjam' || $_SESSION['user']['level'] == 'petugas') {
                    // Jika pengguna adalah peminjam atau petugas, tampilkan tombol tambah peminjaman
                    ?>
                    <a href="?page=peminjaman_tambah" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah Peminjaman</a>
                    <?php
                }
                ?>
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Buku</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Status Peminjaman</th> 
                        <?php
                        // Cek apakah pengguna adalah petugas atau admin
                        if ($_SESSION['user']['level'] == 'petugas' || $_SESSION['user']['level'] == 'admin') {
                            // Jika pengguna adalah petugas atau admin, tampilkan kolom Aksi
                            ?>
                            <th>Aksi</th>
                            <?php
                        }
                        ?>
                    </tr>
                    <?php
                    $i = 1;
                    // Sesuaikan query untuk menampilkan semua data peminjaman jika pengguna adalah petugas
                    if ($_SESSION['user']['level'] == 'petugas' || $_SESSION['user']['level'] == 'admin') {
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku");
                    } else {
                        // Jika pengguna adalah peminjam, maka query akan dibatasi berdasarkan id pengguna saat ini
                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.id_user = peminjaman.id_user LEFT JOIN buku ON buku.id_buku = peminjaman.id_buku WHERE peminjaman.id_user=" . $_SESSION['user']['id_user']);
                    }
                    
                    while($data = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo $i++;?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['tanggal_peminjaman']; ?></td>
                            <td><?php echo $data['tanggal_pengembalian']; ?></td>
                            <td><?php echo $data['status_peminjaman']; ?></td>
                            <?php
                            // Cek apakah pengguna adalah petugas atau admin
                            if ($_SESSION['user']['level'] == 'petugas' || $_SESSION['user']['level'] == 'admin') {
                                // Jika pengguna adalah petugas atau admin, tampilkan tombol ubah dan hapus
                                // Tambahkan logika untuk mematikan tombol ubah jika status peminjaman adalah 'dikembalikan'
                                if($data['status_peminjaman'] == 'dikembalikan') {
                                    ?>
                                    <td>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                    <?php
                                } else {
                                    ?>
                                    <td>
                                        <a href="?page=peminjaman_ubah&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-info">Ubah</a>
                                        <a onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="?page=peminjaman_hapus&&id=<?php echo $data['id_peminjaman']; ?>" class="btn btn-danger">Hapus</a>
                                    </td>
                                    <?php
                                }
                            }
                            ?>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>
