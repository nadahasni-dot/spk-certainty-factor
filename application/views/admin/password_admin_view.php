<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ubah Password</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Beranda</a></li>
                        <li class="breadcrumb-item active">Ubah Password</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h2 class="card-title">Ubah Password</h2>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?= validation_errors('<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>') ?>
                            <?= $this->session->flashdata('message'); ?>
                            
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="passwordLama">Password Lama</label>
                                    <input id="passwordLama" type="password" class="form-control" name="password_lama" placeholder="password lama" required>
                                </div>
                                <div class="form-group">
                                    <label for="passwordBaru">Password Baru</label>
                                    <input id="passwordBaru" type="password" class="form-control" name="password_baru" placeholder="password baru" required>
                                </div>
                                <div class="form-group">
                                    <label for="passwordKonfirmasi">Password Konfirmasi</label>
                                    <input id="passwordKonfirmasi" type="password" class="form-control" name="password_baru_konfirmasi" placeholder="konfirmasi ulang password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Ubah Password</button>
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