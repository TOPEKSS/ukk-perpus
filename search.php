<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    
    
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<body>
<?php
include('koneksi.php');

// Periksa apakah parameter 'keyword' telah diset sebelum mengaksesnya
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

// Periksa apakah keyword tidak kosong
if (!empty($keyword)) {
    $query = mysqli_query($koneksi, "SELECT * FROM buku LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori LEFT JOIN ulasan ON buku.id_buku = ulasan.id_buku WHERE judul='$keyword'");

    // Periksa apakah query berhasil dijalankan
    if ($query) {
        // Menggunakan mysqli_fetch_assoc() untuk mengambil satu baris hasil query
        $data = mysqli_fetch_assoc($query);

        if ($data) {
?>
<h1 class="mt-4 text-center">Cari Buku</h1>

<div class="card">
    <div class="card-body">
    <div class="row container">
                    <div class="col-sm-3">
                        <img class="card-img-top" src="gambaran/<?php echo $data['gambar'];?>" alt="Card image"  width="200" heighth="200">
                    </div>
                        <div class="col-sm-8">
                            <table class="table">
                                <tbody>
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
                                    <tr>
                                    <td>Ulasan Orang</td>
                                    <td width="78%">:
                                        <?php
                                        if (!empty($data['ulasan'])) {
                                            echo $data['ulasan'];
                                        } else {
                                            echo "Tidak ada ulasan";
                                        }
                                        ?>
                                    </td>
                                </tr>

                                    <tr>
                                    <tr>
                                    <td>Rating</td>
                                    <td width="78%">:
                                        <?php 
                                        $rating = $data['rating'];
                                        for ($i = 0; $i < $rating; $i++) {
                                            echo '<i class="fas fa-star"></i>';
                                        }
                                        ?> / <?php echo $data['rating'];?>
                                    </td>
                                </tr>
                                <!-- <tr>
                                    <td>
                                        <a href="?page=home" class="btn btn-danger">Kembali</a> 
                                    </td>
                                    </td>
                                </tr> -->
                               

                                        

                                    

                                    <!-- Sisipkan bagian informasi buku lainnya di sini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
              
    </div>
</div>
<?php
        } else {
            echo "Buku tidak ditemukan.";
        }
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika parameter 'keyword' tidak diset, tampilkan pesan bahwa pencarian tidak valid
    echo "Pencarian tidak valid. Mohon masukkan kata kunci pencarian.";
}
?>


</body>
</html>


