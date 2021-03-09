<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengetahuan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('pakar'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Pengetahuan</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h2 class="card-title">Daftar Pengetahuan</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>') ?>
                            <?= $this->session->flashdata('message'); ?>

                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus mr-2"></i>Tambah Pengetahuan</button>

                            <table id="allPost" class="table table-bordered table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penyakit</th>
                                        <th>Nama Gejala</th>
                                        <th>MB</th>
                                        <th>MD</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengetahuan as $row) :
                                    ?>
                                        <tr>
                                            <td class="align-middle"><?= $no++; ?></td>
                                            <td class="align-middle">
                                                <p class="m-0"><a href="<?= $row['id_basis_pengetahuan']; ?>" class="h6 action-edit"><?= $row['nama_penyakit']; ?></a></p>
                                                <p class="m-0">
                                                    <a href="<?= $row['id_basis_pengetahuan']; ?>" class="text-small text-danger action-edit">Edit</a> |
                                                    <a href="<?= base_url('pakar/deletepengetahuan/') . $row['id_basis_pengetahuan']; ?>" class="text-small text-danger action-delete">Hapus</a>
                                                </p>
                                            </td>
                                            <td class="align-middle"><?= $row['nama_gejala']; ?></td>
                                            <td class="align-middle"><?= $row['mb']; ?></td>
                                            <td class="align-middle"><?= $row['md']; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penyakit</th>
                                        <th>Nama Gejala</th>
                                        <th>MB</th>
                                        <th>MD</th>
                                    </tr>
                                </tfoot>
                            </table>
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

<div class="modal fade" id="modal-tambah">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengetahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaPenyakitAdd">Nama Penyakit</label>
                        <select id="namaPenyakitAdd" name="id_penyakit" class="form-control select2" style="width: 100%;" required>
                            <option selected value="">Pilih Penyakit</option>
                            <?php foreach($penyakit as $row) : ?>
                                <option value="<?= $row['id_penyakit'] ?>"><?= $row['nama_penyakit'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="namaGejalaAdd">Gejala Gejala</label>
                        <select id="namaGejalaAdd" name="id_gejala" class="form-control select2" style="width: 100%;" required>
                            <option selected value="">Pilih Gejala</option>
                            <?php foreach($gejala as $row) : ?>
                                <option value="<?= $row['id_gejala'] ?>"><?= $row['nama_gejala'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mbAdd">MB</label>
                        <input id="mbAdd" type="number" step="0.1" class="form-control" name="mb" placeholder="mb dalam decimal (contoh: 1.0, 0.4, dst)" required>
                    </div>
                    <div class="form-group">
                        <label for="mdAdd">MD</label>
                        <input id="mdAdd" type="number" step="0.1" class="form-control" name="md" placeholder="md dalam decimal (contoh: 1.0, 0.4, dst)" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit-type" class="btn btn-primary" value="Tambah">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>

<div class="modal fade" id="edit-modal">
    <form action="" method="post" autocomplete="off" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pengetahuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="editBody"></div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" name="submit-type" class="btn btn-primary" value="Save">
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </form>
</div>