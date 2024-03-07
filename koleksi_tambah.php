<?php
session_start(); // Mulai sesi

// Periksa apakah pengguna sudah masuk atau belum
if (!isset($_SESSION['user'])) {
    echo "Anda belum masuk. Silakan masuk terlebih dahulu.";
    exit; // Berhenti eksekusi jika pengguna belum masuk
}

// Periksa apakah ID buku dikirim melalui GET
$id_buku = isset($_GET["id"]) ? $_GET["id"] : null;

// Jika $id_buku tidak ada, berhenti eksekusi
if ($id_buku === null) {
    echo "ID buku tidak ditemukan dalam permintaan.";
    exit; // Berhenti eksekusi karena tidak ada ID buku yang valid
}

// Di sini, Anda dapat menambahkan logika untuk menambahkan buku ke koleksi pribadi pengguna, misalnya, dengan menambahkannya ke database koleksi pribadi.

// Setelah menambahkan buku ke koleksi pribadi, atur pesan sukses
$_SESSION['success_message'] = "Buku berhasil ditambahkan ke koleksi pribadi Anda!";

// Arahkan pengguna kembali ke halaman detail buku dengan parameter 'added_to_collection'
header("Location: ?page=detail&id=$id_buku");
exit; // Berhenti eksekusi setelah mengalihkan pengguna
?>
