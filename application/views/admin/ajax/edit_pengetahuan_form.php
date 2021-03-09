<input type="hidden" name="id_basis_pengetahuan" value="<?= $pengetahuan['id_basis_pengetahuan']; ?>">
<div class="form-group">
    <label for="namaPenyakit">Nama Penyakit</label>
    <select id="namaPenyakit" name="id_penyakit" class="form-control select2" style="width: 100%;" required>
        <option <?= $pengetahuan['id_penyakit'] == NULL ? 'selected' : '' ?> value="">Pilih Penyakit</option>
        <?php foreach ($penyakit as $row) : ?>
            <option <?= $row['id_penyakit'] == $pengetahuan['id_penyakit'] ? 'selected' : '' ?> value="<?= $row['id_penyakit'] ?>"><?= $row['nama_penyakit'] ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="namaGejala">Gejala Gejala</label>
    <select id="namaGejala" name="id_gejala" class="form-control select2" style="width: 100%;" required>
        <option <?= $pengetahuan['id_gejala'] == NULL ? 'selected' : '' ?> value="">Pilih Gejala</option>
        <?php foreach ($gejala as $row) : ?>
            <option <?= $row['id_gejala'] == $pengetahuan['id_gejala'] ? 'selected' : '' ?> value="<?= $row['id_gejala'] ?>"><?= $row['nama_gejala'] ?></option>
        <?php endforeach; ?>
    </select>
</div>
<div class="form-group">
    <label for="mb">MB</label>
    <input value="<?= $pengetahuan['mb'] ?>" id="mb" type="number" step="0.1" class="form-control" name="mb" placeholder="mb dalam decimal (contoh: 1.0, 0.4, dst)" required>
</div>
<div class="form-group">
    <label for="md">MD</label>
    <input value="<?= $pengetahuan['md'] ?>" id="md" type="number" step="0.1" class="form-control" name="md" placeholder="md dalam decimal (contoh: 1.0, 0.4, dst)" required>
</div>