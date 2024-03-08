
<h1 class="mt-4">Informasi Detail Buku</h1>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
            <?php
                // Inisialisasi variabel $data

                // Periksa apakah ID buku sudah dikirim melalui GET
                $id_buku = isset($_GET["id"]) ? $_GET["id"] : null;

                // Jika $id_buku tidak ada, berhenti eksekusi
                if ($id_buku === null) {
                    echo "ID buku tidak ditemukan dalam permintaan.";
                    exit; // Berhenti eksekusi karena tidak ada ID buku yang valid
                }

                // Lanjutkan dengan query dan pemrosesan data

                $sql = "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori 
                        WHERE buku.id_buku = '$id_buku'";

        

                $hasil = mysqli_query($koneksi, $sql);

                if ($hasil === false) {
                    // Query gagal dieksekusi, cetak pesan kesalahan
                    echo "Query gagal dieksekusi: " . mysqli_error($koneksi);
                } else {
                    // Query berhasil dieksekusi, lanjutkan pemrosesan data
                    $data = mysqli_fetch_array($hasil);
                    // ...
                }
                ?>

                <!-- Card Body -->
                <div class="card-body">
                        <div class="row container">
                        <div class="col-sm-3">
                            <img class="card-img-top" src="gambaran/<?php echo $data['gambar'];?>" alt="Card image"  width="200" heighth="200">
                        </div>
                            <div class="col-sm-8">
                                <table class="table">
                                    <tbody>
                                    <?php
                                             // Pastikan sesi dimulai sebelum mengakses $_SESSION

                                            // Periksa apakah ada pesan sukses dalam sesi
                                            if (isset($_SESSION['success_message'])) {
                                                // Tampilkan pesan sukses
                                                echo '<div class="alert alert-success" role="alert">' . $_SESSION['success_message'] . '</div>';
                                                // Hapus pesan sukses dari sesi agar tidak ditampilkan lagi
                                                unset($_SESSION['success_message']);
                                            }

                                            // Lanjutkan dengan menampilkan konten koleksi seperti biasa
                                            // ...
                                        ?>
                                        <tr>
                                            <td>Id Buku</td>
                                            <td width="78%">: <?php echo $data['id_buku'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Judul</td>
                                            <td width="78%">: <?php echo $data['judul'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Kategori buku</td>
                                            <td width="78%">: <?php echo $data['kategori'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Penulis</td>
                                            <td width="78%">: <?php echo $data['penulis'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Penerbit</td>
                                            <td width="78%">: <?php echo $data['penerbit'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Terbit</td>
                                            <td width="78%">: <?php echo $data['tahun_terbit'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Deskripsi</td>
                                            <td width="78%">: <?php echo $data['deskripsi'];?></td>
                                        </tr>
                                        

                                        <!-- Inside the table -->
                                      
                                        <tr>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Rating</th>
                                                    <th>Ulasan Pembaca</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Fetch all reviews from the database
                                                $sql_reviews = "SELECT * FROM ulasan WHERE id_buku = '$id_buku'";
                                                $result_reviews = mysqli_query($koneksi, $sql_reviews);

                                                if (mysqli_num_rows($result_reviews) > 0) {
                                                    while ($review = mysqli_fetch_assoc($result_reviews)) {
                                                        echo "<tr>";
                                                        // Display stars representing the rating
                                                        echo "<td>";
                                                        for ($i = 0; $i < $review['rating']; $i++) {
                                                            echo '<i class="fas fa-star"></i>';
                                                        }
                                                        echo "</td>";
                                                        // Display the review text
                                                        echo "<td>" . $review['ulasan'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    // Display a message if there are no reviews
                                                    echo "<tr><td colspan='2'>Belum ada rating dan ulasan untuk buku ini</td></tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>

                                        </tr>

   


                                    <tr>
                                        <td>
                                            <a href="?page=home" class="btn btn-danger col-md-3  ">Kembali</a>
                                            <a href="?page=peminjaman_tambah&id=<?php echo $id_buku; ?>" class="btn btn-primary col-md-3">Pinjam</a>
                                            <a href="?page=koleksi_tambah&id=<?php echo $data['id_buku']; ?>" class="btn btn-success col-md-3">Tambah ke Koleksi</a>
                                        </td>


                                        <!-- Sisipkan bagian informasi buku lainnya di sini -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</div>
