<h1 class="mt-4">Buku</h1><br>
<div class="card">
    <div class="card-body">
    <div class="row">
        <div class="col-md-12">
            <form method="post"  enctype="multipart/form-data">
            <?php
          
           $id = $_GET['id'];
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
               // Perbaikan sintaks SQL di sini:
               $query = mysqli_query($koneksi, "UPDATE buku SET id_kategori='$id_kategori', judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit',gambar='$gambar', deskripsi='$deskripsi' WHERE id_buku=$id");
           
               if($query) {
                   echo '<script>alert("Ubah Data Berhasil.");location.href = "index.php?page=buku";</script>';
               }else{
                   echo '<script>alert("Ubah Data Gagal.");</script>';
               }
           }
           $query = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");
           $data = mysqli_fetch_array($query);
           ?>
           

                <div class="row mb-3">
                    <div class="col-md-2">Nama Kategori :</div>
                    <div class="col-md-6">
                        <select name="id_kategori" class="form-control">
                            <?php
                            $kat = mysqli_query($koneksi, "SELECT*FROM kategori");
                            while($kategori = mysqli_fetch_array($kat)) {
                                ?>
                                <option <?php if($kategori['id_kategori'] == $data['id_kategori']) echo 'selected';?> value="<?php echo $kategori['id_kategori']; ?>"><?php echo $kategori['kategori'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Judul :</div>
                    <div class="col-md-6"><input class="form-control" type="text" value="<?php echo $data['judul']; ?>" name="judul"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Penulis :</div>
                    <div class="col-md-6"><input class="form-control" type="text"  value="<?php echo $data['penulis']; ?>" name="penulis"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Penerbit :</div>
                    <div class="col-md-6"><input class="form-control" type="text"  value="<?php echo $data['penerbit']; ?>"  name="penerbit"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Tahun Terbit :</div>
                    <div class="col-md-6"><input class="form-control" type="number"  value="<?php echo $data['tahun_terbit']; ?>"  name="tahun_terbit"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Foto :</div>
                    
                    <img src="gambaran/<?php echo $data['gambar']; ?>" width="80px" height="80px" required>
                 <div class="col-md-8"><input class="form-control" type="file"  value="<?php echo $data['gambar']; ?>"  name="gambar"></div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-2">Deskripsi :</div>
                    <div class="col-md-6">
                        <textarea name="deskripsi" rows="3"  class="form-control"><?php echo $data['deskripsi']; ?></textarea>
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