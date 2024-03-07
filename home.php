

        <!-- Content Row -->
                <div class="row">
                    
                            
                <!-- semua kategori ini muncul pada Dashboard admin saja -->
                <!-- dengan session din=bawah ini -->
                <?php
                    if($_SESSION['user']['level'] !='peminjam'){
                ?>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    <?php
                                                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM kategori"));
                                                    ?>&nbsp;
                                                Total Kategori</div>
                                                
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-table fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                <?php
                                                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM buku"));
                                                    ?>&nbsp;
                                                Total Buku</div>
                                                
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-book fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                <?php
                                                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM ulasan"));
                                                    ?>&nbsp;
                                                    Total Ulasan
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                    
                                                    </div>
                                                
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comment fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                <?php
                                                    echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM user"));
                                                    ?>&nbsp;
                                                    Total User</div>
                                            
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-user fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <?php
                }
                ?>
                   <div class="card col-xl-12 col-md-6 mb-4" style=" background-color: rgba(255, 255, 255, 0.5);">
    <div class="card-body">
        <h2 class="mt-4 text-center">Selamat Datang, <span style="color: #8eb30b;"><?php echo $_SESSION['user']['nama'];?></span><br> Perpustakaan Digital XII RPL 2 </h2>
        <div class="div text-right">Login pada : <?php echo date('d-m-Y'); ?></div>
    </div>
</div>





                     <div class="card col-xl-12 col-md-6 mb-4">
                        <div class="card-body">
                            <h2 class="mt-4">Daftar buku :</h2>
                            <hr>
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                        <?php

                        // Query untuk mendapatkan data-data buku dari tabel "buku"
                        $books_query = "SELECT * FROM buku 
                        LEFT JOIN kategori ON buku.id_kategori = kategori.id_kategori";
        
                        $books_result = mysqli_query($koneksi, $books_query);
                        

                          // Loop untuk menampilkan data-data buku dalam bentuk kartu
                        while ($data = mysqli_fetch_array($books_result)) {
                        ?>
                        
                        <div class="col">
                            <div class="card h-100">
                            <img src="gambaran/<?= isset($data['gambar']) && $data['gambar'] !== '' ? $data['gambar'] : 'default.jpg'; ?>" class="card-img-top" alt="..." height="350px">
                            <div class="card-body">
                                <h5 class="card-title text-center"><b><?= isset($data["judul"]) ? $data["judul"] : ''; ?></b></h5>
                                            
                        </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Kategori : <?= $data["kategori"]; ?></li>
                                <li class="list-group-item">Deskripsi : <?= $data["deskripsi"]; ?></li>


                            </ul>

                            <div class="card-body">
                                <a class="btn btn-success" href="?page=detail&id=<?php echo $data['id_buku']; ?>">Detail</a>
                                <!-- Tambahkan ikon tambah -->
                                <!-- <a class="btn btn-primary" href="?page=koleksi_tambah&id=< ?php echo $data['id_buku']; ?>">
                                    <i class="fas fa-plus"></i> Tambah ke Koleksi
                                </a> -->
                            </div>

                        </div>
                        </div>
                        <?php
                        }
                        ?>    
                        </div>
                    </div>
                </div>
        <br>

                        <div class="card col-xl-12 col-md-6 mb-4">  
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <td width="200">Nama</td>
                                        <td width="1">:</td>
                                        <td><?php echo $_SESSION['user']['nama']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200">Level User</td>
                                        <td width="1">:</td>
                                        <td><?php echo $_SESSION['user']['level']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="200">Tanggal Login</td>
                                        <td width="1">:</td>
                                        <td><?php echo date('d-m-Y'); ?></td>
                                    </tr>
                                    
                                </table>
                            </div>
                        </div>


    
