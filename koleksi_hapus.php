<?php
    // Pastikan variabel $koneksi sudah terinisialisasi dan terhubung dengan database sebelum menjalankan query
    // ...

    // Periksa apakah ID koleksi sudah dikirim melalui GET
    $id = isset($_GET["id"]) ? $_GET["id"] : null;

    // Jika $id_koleksi tidak ada, berhenti eksekusi
    if ($id === null) {   
        echo "ID koleksi tidak ditemukan dalam permintaan.";
        exit; // Berhenti eksekusi karena tidak ada ID koleksi yang valid
    }

    // Lakukan query untuk menghapus koleksi dari database
    $query_delete = "DELETE FROM koleksi WHERE id = '$id'";
    $result_delete = mysqli_query($koneksi, $query_delete);

    if ($result_delete) {
        // Jika berhasil menghapus koleksi, simpan pesan sukses ke dalam sesi
        session_start();
        $_SESSION['success_message'] = "Koleksi berhasil dihapus.";
    } else {
        // Jika gagal menghapus koleksi, simpan pesan error ke dalam sesi
        session_start();
        $_SESSION['error_message'] = "Gagal menghapus koleksi. Silakan coba lagi.";
    }

    // Redirect kembali ke halaman koleksi
    header("Location: ?page=koleksi");
    exit;
?>
