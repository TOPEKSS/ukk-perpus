<h1 class="mt-4">Buku</h1><br>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post" enctype="multipart/form-data">

            <?php
            if(isset($_POST['submit'])) {
                $id_kategori = $_POST['id_kategori'];
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $penerbit = $_POST['penerbit'];
                $tahun_terbit = $_POST['tahun_terbit'];
                $gambar = $_FILES['gambar']['name'];
                $image_tmp = $_FILES['gambar']['tmp_name'];
                $deskripsi = $_POST['deskripsi'];

                move_uploaded_file($image_tmp,"gambaran/$gambar");

                $query = mysqli_query($koneksi, "INSERT INTO buku(id_kategori,judul,penulis,penerbit,tahun_terbit,gambar,deskripsi) values('$id_kategori','$judul','$penulis','$penerbit','$tahun_terbit','$gambar','$deskripsi')");

                if($query) {
                    echo '<script>alert("Tambah Data Berhasil.");location.href = "index.php?page=buku";</script>';
                }else{
                    echo '<script>alert("Tambah Data Gagal.");</script>';
                }
            }

               
            ?>
                <div class="row mb-3">
                    <div class="col-md-2">Nama Kategori :</div>
                    <div class="col-md-6">
                        <select name="id_kategori" class="form-control">
                            <?php
                            $kat = mysqli_query($koneksi, "SELECT*FROM kategori");
                            while($kategori = mysqli_fetch_array($kat)) {
                                ?>
                                <option value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <div class="col-md-2">Judul :</div>
                    <div class="col-md-6"><input class="form-control" type="text" name="judul"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Penulis :</div>
                    <div class="col-md-6"><input class="form-control" type="text" name="penulis"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Penerbit :</div>
                    <div class="col-md-6"><input class="form-control" type="text" name="penerbit"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Tahun Terbit :</div>
                    <div class="col-md-6"><input class="form-control" type="number" name="tahun_terbit"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Foto :</div> 
                    <div class="col-md-6"><input type="file" id="formFileMultiple" name="gambar"><br><br></div>
                     
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Deskripsi :</div>
                    <div class="col-md-6">
                        <textarea name="deskripsi" rows="3" class="form-control"></textarea>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary" name="submit" value="submit">Simpan</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <a href="?page=buku" class="btn btn-danger">Kembali</a>
                </div>
            </div>
            </form>
    </div>
</div>
    </div>
</div>