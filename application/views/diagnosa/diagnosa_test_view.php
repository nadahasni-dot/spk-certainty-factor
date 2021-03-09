<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="card card-outline card-info mt-3">
                        <div class="card-header">
                            <h2 class="card-title">Diagnosa</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="alert alert-info">
                                <h5><i class="icon fas fa-info"></i> Perhatian!</h5>
                                Silahkan memilih gejala sesuai dengan kondisi anda, anda dapat memilih kepastian kondisi dari pasti tidak sampai pasti ya, jika sudah tekan tombol proses (diagnosa) di bawah untuk melihat hasil.
                            </div>
                            <form action="" method="post">
                                <div class="col-12 table-responsive p-0">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">No</th>
                                                <th>Gejala</th>
                                                <th style="width: 200px;">Pilih Kondisi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($gejala as $row_gejala) :
                                            ?>
                                                <tr>
                                                    <td class="align-middle"><?= $no++; ?></td>
                                                    <td class="align-middle"><?= $row_gejala['nama_gejala']; ?></td>
                                                    <td class="align-middle">
                                                        <select class="form-control select2" name="kondisi[]" id="">
                                                            <option value="0">Pilih Kondisi</option>
                                                            <?php foreach ($kondisi as $row_kondisi) : ?>
                                                                <option value="<?= $row_gejala['id_gejala'] . '_' . $row_kondisi['id_kondisi']; ?>"><?= $row_kondisi['nama_kondisi']; ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary float-right"><i class="fas fa-search mr-3"></i>Diagnosa</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->