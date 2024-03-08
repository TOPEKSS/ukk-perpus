<?php
    // Pastikan sesi dimulai sebelum mengakses $_SESSION
    

    // Inisialisasi variabel $id_user
    $id_user = isset($_SESSION['user']['id_user']) ? $_SESSION['user']['id_user'] : null;

    // Periksa apakah ID buku sudah dikirim melalui GET
?>

<div class="card col-xl-12 col-md-6 mb-4">
    <div class="card-body">
        <h2 class="mt-4">Daftar Buku Koleksi Anda :</h2>
        <hr>
        <?php
            // Pastikan sesi dimulai sebelum mengakses $_SESSION

            // Tampilkan pesan sukses jika ada
            if (isset($_SESSION['success_message'])) {
                echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
                unset($_SESSION['success_message']); // Hapus pesan sukses dari session agar tidak ditampilkan lagi
            }

            // Tampilkan pesan error jika ada
            if (isset($_SESSION['error_message'])) {
                echo '<div class="alert alert-danger" role="alert">' . $_SESSION['error_message'] . '</div>';
                unset($_SESSION['error_message']); // Hapus pesan error dari session agar tidak ditampilkan lagi
            }

            // Lanjutkan dengan kode lainnya...
        ?>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
                // Periksa apakah $id_user sudah terdefinisi
                if ($id_user !== null) {
                    // Query untuk mendapatkan daftar buku dalam koleksi pengguna
                    $collection_query = "SELECT * FROM koleksi 
                                        LEFT JOIN buku ON koleksi.id_buku = buku.id_buku 
                                        LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori
                                        WHERE koleksi.id_user = '$id_user'";
                    $collection_result = mysqli_query($koneksi, $collection_query);

                    // Periksa apakah ada buku dalam koleksi pengguna
                    if (mysqli_num_rows($collection_result) > 0) {
                        // Loop untuk menampilkan daftar buku dalam koleksi
                        while ($collection_data = mysqli_fetch_array($collection_result)) {
            ?>
                <div class="col">
                    <div class="card h-100">
                        <img src="gambaran/<?= isset($collection_data['gambar']) && $collection_data['gambar'] !== '' ? $collection_data['gambar'] : 'default.jpg'; ?>" class="card-img-top" alt="..." height="350px">
                        <div class="card-body">
                            <h5 class="card-title text-center"><b><?= isset($collection_data["judul"]) ? $collection_data["judul"] : ''; ?></b></h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Kategori : <?= $collection_data["kategori"]; ?></li>
                            <li class="list-group-item">Deskripsi : <?= $collection_data["deskripsi"]; ?></li>
                            <li class="list-group-item">Tanggal Ditambahkan : <?= $collection_data["tanggal_ditambahkan"]; ?></li>
                        </ul>
                        <div class="card-body">
                            <a href="?page=koleksi_hapus&id=<?= $collection_data['id']; ?>" class="btn btn-danger">Hapus Koleksi</a>
                            <a href="?page=peminjaman_tambah&id=<?= $collection_data['id']; ?>" class="btn btn-primary">Pinjam</a>
                        </div>
                    </div>
                </div>
            <?php
                        }
                    } else {
                        // Tampilkan pesan jika koleksi buku kosong
                        echo '<div class="alert alert-info" role="alert">Koleksi buku Anda kosong.</div>';
                    }
                } else {
                    // Tampilkan pesan jika pengguna belum masuk atau sesi tidak aktif
                    echo '<div class="alert alert-warning" role="alert">Anda harus masuk untuk melihat koleksi buku Anda.</div>';
                }
            ?>    
        </div>
    </div>
</div>
