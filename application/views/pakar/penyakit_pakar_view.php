<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Penyakit</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('pakar'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Penyakit</li>
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
                            <h2 class="card-title">Daftar Penyakit</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>') ?>
                            <?= $this->session->flashdata('message'); ?>

                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus mr-2"></i>Tambah Penyakit</button>

                            <table id="allPost" class="table table-bordered table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penyakit</th>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($penyakit as $row) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td class="align-middle">
                                                <p class="m-0"><a href="<?= $row['id_penyakit']; ?>" class="h6 action-edit"><?= $row['nama_penyakit']; ?></a></p>
                                                <p class="m-0">
                                                    <a href="<?= $row['id_penyakit']; ?>" class="text-small text-danger action-edit">Edit</a> |
                                                    <!-- <a href="<? // base_url('pakar/artikelpenyakit/') . $row['id_penyakit']; ?>" class="text-small text-danger">Artikel</a> | -->
                                                    <a href="<?= base_url('pakar/deletepenyakit/') . $row['id_penyakit']; ?>" class="text-small text-danger action-delete">Hapus</a>
                                                </p>
                                            </td>
                                            <!-- <td class="align-middle"><? // $row['deskripsi_penyakit'] ?></td>
                                            <td class="align-middle"><? // $row['saran_penyakit'] ?></td> -->
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>                                        
                                        <th>Nama Penyakit</th>                                        
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Penyakit</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaPenyakitAdd">Nama Penyakit</label>
                        <input id="namaPenyakitAdd" type="text" class="form-control" name="nama_penyakit" placeholder="nama penyakit baru" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="deskripsiAdd">Deskripsi</label>
                        <textarea name="deskripsi_penyakit" id="deskripsiAdd" cols="30" rows="5" class="form-control" placeholder="masukkan deskripsi penyakit" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="saranAdd">Saran</label>
                        <textarea name="saran_penyakit" id="saranAdd" cols="30" rows="5" class="form-control" placeholder="masukkan saran penyakit" required></textarea>
                    </div> -->
                    <div class="form-group">
                        <label for="penyakitArtikel">Deskripsi Penyakit</label>
                        <textarea id="penyakitArtikel" cols="30" rows="5" class="form-control" name="deskripsi_penyakit" placeholder="masukkan deskripsi tentang penyakit disini"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="penyakitSaranArtikel">Saran Penyakit</label>
                        <textarea id="penyakitSaranArtikel" cols="30" rows="5" class="form-control" name="saran_penyakit" placeholder="masukkan artikel tentang penyakit disini"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="customFile">Choose Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="penyakitImage" accept="image/x-png,image/gif,image/jpeg" name="gambar_penyakit" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <img style="object-fit: cover; height: 100px; width: 150px;" width="150px" height="100px" src="" alt="penyakit" id="penyakitPreview" class="img-fluid mt-2 d-none">
                        </div>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Penyakit</h4>
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