<?php
// Fungsi untuk menampilkan icon bintang berdasarkan rating
function tampilkanRating($rating) {
    $stars = '';
    // Bulatkan rating ke angka terdekat
    $rating = round($rating);
    // Batasi rating antara 1 dan 10
    $rating = max(1, min(10, $rating));
    
    // Tambahkan bintang sesuai dengan rating
    for ($i = 0; $i < $rating; $i++) {
        $stars .= '<i class="fas fa-star"></i>';
    }
    
    return $stars;
}

// Identifikasi pengguna, misalnya dari sesi atau cookie
$current_user_id = isset($_SESSION['user']['id_user']) ? $_SESSION['user']['id_user'] : null;

?>

<div class="card col-xl-12 col-md-6 mb-4">
    <div class="card-body">
        <h2 class="mt-4">Ulasan Buku :</h2>
        <hr>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php
            // Query untuk mendapatkan data ulasan dari tabel "ulasan" dan informasi pengguna dari tabel "user"
            $ulasan_query = "SELECT ulasan.*, user.nama, buku.judul, buku.gambar FROM ulasan 
                            LEFT JOIN user ON ulasan.id_user = user.id_user 
                            LEFT JOIN buku ON ulasan.id_buku = buku.id_buku";
            $ulasan_result = mysqli_query($koneksi, $ulasan_query);

            // Loop untuk menampilkan data ulasan buku dalam bentuk kartu
            while ($data = mysqli_fetch_array($ulasan_result)) {
            ?>
            <div class="col">
                <div class="card h-100">
                    <img src="gambaran/<?= isset($data['gambar']) && $data['gambar'] !== '' ? $data['gambar'] : 'default.jpg'; ?>" class="card-img-top" alt="..." height="350px">
                    <div class="card-body">
                        <h5 class="card-title text-center"><b><?php echo $data["judul"]; ?></b></h5>
                       
                    </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">User : <?php echo $data["nama"]; ?></li>
                        <li class="list-group-item">Rating : <?php echo tampilkanRating($data["rating"]); ?> (<?php echo $data["rating"]; ?>)</li>
                       <li  class="list-group-item">Ulasan Orang : <?php echo $data["ulasan"]; ?></li>
                       
                    </ul>
                    <div class="card-body">
                        <!-- Tambahkan tombol untuk mengubah ulasan jika pengguna yang sedang login adalah pemilik ulasan -->
                        <?php if ($data['id_user'] == $current_user_id): ?>
                            <a class="btn btn-info" href="?page=ulasan_ubah&id=<?php echo $data['id_ulasan']; ?>">Ubah Ulasan</a>
                        <?php endif; ?>
                        <!-- Tambahkan tombol untuk menghapus ulasan jika pengguna yang sedang login adalah pemilik ulasan -->
                        <?php if ($data['id_user'] == $current_user_id): ?>
                            <a class="btn btn-danger" href="?page=ulasan_hapus&id=<?php echo $data['id_ulasan']; ?>" onclick="return confirm('Apakah anda yakin ingin menghapus ulasan ini?')">Hapus Ulasan</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
