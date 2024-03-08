<?php
    // Pastikan sesi dimulai sebelum mengakses $_SESSION

    // Inisialisasi variabel $id_user
    $id_user = isset($_SESSION['user']['id_user']) ? $_SESSION['user']['id_user'] : null;

    // Periksa apakah ID buku sudah dikirim melalui GET
    $id_buku = isset($_GET["id"]) ? $_GET["id"] : null;

    // Jika $id_buku atau $id_user tidak ada, berhenti eksekusi
    if ($id_buku === null || $id_user === null) {   
        echo "ID buku atau ID pengguna tidak ditemukan dalam permintaan.";
        exit; // Berhenti eksekusi karena tidak ada ID buku atau ID pengguna yang valid
    }

    // Mendapatkan tanggal dan jam saat ini
    $tanggal_ditambahkan = date('Y-m-d');

    // Lakukan query untuk menambahkan buku ke dalam koleksi pengguna
    $query_add_to_collection = "INSERT INTO koleksi (id_user, id_buku, tanggal_ditambahkan) VALUES ('$id_user', '$id_buku', '$tanggal_ditambahkan')";
    $result_add_to_collection = mysqli_query($koneksi, $query_add_to_collection);

    if ($result_add_to_collection) {
        // Jika berhasil ditambahkan ke koleksi, simpan pesan sukses ke dalam sesi
        $_SESSION['success_message'] = "Buku berhasil ditambahkan ke dalam koleksi Anda.";
        // Redirect atau tampilkan halaman yang sesuai
        // Setelah berhasil menambahkan buku ke koleksi
        // Redirect kembali ke halaman detail buku dengan parameter success
        header("Location: ?page=detail&id=$id_buku&success=true");
        // Ganti halaman_koleksi.php dengan halaman yang sesuai
        exit;
    } else {
        // Jika gagal menambahkan ke koleksi, tampilkan pesan kesalahan
        echo "Gagal menambahkan buku ke dalam koleksi. Silakan coba lagi.";
    }
?>
