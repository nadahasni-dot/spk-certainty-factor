<input type="hidden" name="id_penyakit" value="<?= $penyakit['id_penyakit']; ?>">
<div class="form-group">
    <label for="namaPenyakitAdd">Nama Penyakit</label>
    <input id="namaPenyakitAdd" type="text" class="form-control" name="nama_penyakit" placeholder="nama penyakit baru" value="<?= $penyakit['nama_penyakit']; ?>" required>
</div>
<!-- <div class="form-group">
    <label for="deskripsiAdd">Deskripsi</label>
    <textarea name="deskripsi_penyakit" id="deskripsiAdd" cols="30" rows="5" class="form-control" placeholder="masukkan deskripsi penyakit" vrequired><?= $penyakit['deskripsi_penyakit']; ?></textarea>
</div>
<div class="form-group">
    <label for="saranAdd">Saran</label>
    <textarea name="saran_penyakit" id="saranAdd" cols="30" rows="5" class="form-control" placeholder="masukkan saran penyakit" required><?= $penyakit['saran_penyakit']; ?></textarea>
</div> -->
<div class="form-group">
    <label for="deskripsiAdd">Deskripsi Penyakit</label>
    <textarea id="deskripsiAdd" cols="30" rows="5" class="form-control" name="deskripsi_penyakit" placeholder="masukkan deskripsi tentang penyakit disini" required><?= $penyakit['deskripsi_penyakit']; ?></textarea>
</div>
<div class="form-group">
    <label for="saranAdd">Saran Penyakit</label>
    <textarea id="saranAdd" cols="30" rows="5" class="form-control" name="saran_penyakit" placeholder="masukkan saran tentang penyakit disini" required><?= $penyakit['saran_penyakit']; ?></textarea>
</div>
<div class="form-group">
    <label for="customFile">Choose Image</label>
    <small class="text-info">biarkan kosong jika tidak ingin merubah gambar</small>
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="penyakitImageEdit" accept="image/x-png,image/gif,image/jpeg" name="gambar_penyakit">
        <label class="custom-file-label" for="customFile">Choose file</label>
        <img style="object-fit: cover; height: 100px; width: 150px;" width="150px" height="100px" src="" alt="penyakit" id="penyakitPreviewEdit" class="img-fluid mt-2 d-none">
    </div>
</div>

<script>
    $("#penyakitArtikel").summernote();
    $("#penyakitSaranArtikel").summernote();
</script>