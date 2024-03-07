<?php
// Mulai sesi

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['user'])) {
    echo "Anda belum masuk. Silakan masuk terlebih dahulu.";
    exit; // Berhenti eksekusi jika pengguna belum masuk
}

// Sertakan file koneksi database
include "koneksi.php";

// Periksa apakah ID pengguna dikirim melalui sesi
if (!isset($_SESSION['user']['id'])) {
    echo "ID pengguna tidak ditemukan dalam sesi.";
    exit;
}

$id_pengguna = $_SESSION['user']['id']; // Ambil ID pengguna dari sesi

// Query untuk mengambil buku dari koleksi pribadi pengguna berdasarkan ID pengguna
$sql = "SELECT buku.* FROM buku
        JOIN koleksi_pribadi ON buku.id = koleksi_pribadi.id_buku
        WHERE koleksi_pribadi.id_pengguna = $id_pengguna";

$result = mysqli_query($koneksi, $sql); // Eksekusi query

if ($result) {
    // Tampilkan daftar buku dalam tabel atau sesuaikan dengan tampilan yang diinginkan
    echo "<h1>Koleksi Pribadi</h1>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<p>" . $row['judul'] . "</p>";
        // Tambahkan informasi lain yang ingin Anda tampilkan
    }
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
