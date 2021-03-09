<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pengguna</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Pengguna</li>
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
                            <a class="text-info" href="<?= base_url('admin/pengguna') ?>">All (<?= count($allUsers); ?>)</a> |
                            <a class="text-info" href="<?= base_url('admin/pengguna?category=admin') ?>">Admin (<?= count($adminUsers); ?>)</a> |
                            <a class="text-info" href="<?= base_url('admin/pengguna?category=pakar') ?>">Pakar (<?= count($pakarUsers); ?>)</a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive">
                            <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>') ?>
                            <?= $this->session->flashdata('message'); ?>

                            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus mr-2"></i>Tambah Pengguna</button>

                            <table id="allPost" class="table table-bordered table-striped table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pengguna as $user) :
                                    ?>
                                        <tr>
                                            <td class="align-middle"><?= $no++; ?></td>
                                            <td class="align-middle">
                                                <p class="m-0"><a href="<?= $user['id_user']; ?>" class="h6 action-edit"><?= $user['username']; ?></a></p>
                                                <p class="m-0">
                                                    <a href="<?= $user['id_user']; ?>" class="text-small text-danger action-edit">Edit</a> |
                                                    <a href="<?= base_url('admin/deletepengguna/') . $user['id_user']; ?>" class="text-small text-danger action-delete">Hapus</a>
                                                </p>
                                            </td>
                                            <td class="align-middle"><?= $user['email'] ?></td>
                                            <td class="align-middle"><?= $user['role'] == 1 ? 'ADMIN' : 'PAKAR' ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Role</th>
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
                    <h4 class="modal-title">Tambah Pengguna</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="userNameAdd">Username</label>
                        <input id="userNameAdd" type="text" class="form-control" name="username" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label for="emailAdd">Email</label>
                        <input id="emailAdd" type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <label for="roleAdd">Role</label>
                        <select id="roleAdd" name="role" class="form-control select2" style="width: 100%;" required>
                            <option selected value="">Pilih Role</option>
                            <option value="1">ADMIN</option>
                            <option value="2">PAKAR</option>
                        </select>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="passwordAdd">Password</label>
                        <input id="passwordAdd" autocomplete="name" minlength="6" maxlength="20" type="password" class="form-control" name="password" required>
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
                    <h4 class="modal-title">Edit Pengguna</h4>
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