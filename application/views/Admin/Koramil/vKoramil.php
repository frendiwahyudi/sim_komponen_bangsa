<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Koramil</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Koramil</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->userdata('success')) {
        ?>
            <div class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?= $this->session->userdata('success') ?>
            </div>
        <?php
        } ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-plus"></i> Tambah Data Koramil
                    </button>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Koramil</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Koramil</th>
                                        <th class="text-center">Nama Koramil</th>
                                        <th class="text-center">Satuan</th>
                                        <th class="text-center">Wilayah</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($koramil as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->kode_koramil ?></td>
                                            <td class="text-center"><?= $value->nama_koramil ?></td>
                                            <td class="text-center">
                                                <small class="text-muted"><?= $value->kode_kodim ?></small>
                                                <br>
                                                <span class="badge badge-success"><?= $value->nama_kodim ?></span>
                                            </td>
                                            <td class="text-center"><?= $value->wilayah ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('Admin/cKelolaData/deletekoramil/' . $value->id_koramil) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_koramil ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>

                                </tbody>

                                <tfoot>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Koramil</th>
                                        <th class="text-center">Nama Koramil</th>
                                        <th class="text-center">Satuan</th>
                                        <th class="text-center">Wilayah</th>
                                        <th class="text-center">Action</th>
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

<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/ckeloladata/createkoramil') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Koramil</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_kodim">Pilih Kodim</label>
                        <select name="id_kodim" id="id_kodim" class="form-control" required>
                            <option value="">-- Pilih Kodim --</option>
                            <?php foreach ($kodim as $k) { ?>
                                <option value="<?= $k->id_kodim ?>"><?= $k->nama_kodim ?> (<?= $k->kode_kodim ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kode">Kode Koramil</label>
                        <input type="text" name="kode" class="form-control" id="kode" placeholder="Kode Koramil" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Koramil</label>
                        <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Koramil" required>
                    </div>
                    <div class="form-group">
                        <label for="wilayah">Wilayah</label>
                        <input type="text" name="wilayah" class="form-control" id="wilayah" placeholder="Wilayah" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php
foreach ($koramil as $key => $value) {
?>
    <div class="modal fade" id="edit<?= $value->id_koramil ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('admin/ckeloladata/updatekoramil/' . $value->id_koramil) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Data Koramil</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_kodim<?= $value->id_koramil ?>">Pilih Kodim</label>
                            <select name="id_kodim" id="id_kodim<?= $value->id_koramil ?>" class="form-control" required>
                                <option value="">-- Pilih Kodim --</option>
                                <?php foreach ($kodim as $k) { ?>
                                    <option value="<?= $k->id_kodim ?>" <?= ($k->id_kodim == $value->id_kodim) ? 'selected' : '' ?>><?= $k->nama_kodim ?> (<?= $k->kode_kodim ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kode<?= $value->id_koramil ?>">Kode Koramil</label>
                            <input type="text" name="kode" value="<?= $value->kode_koramil ?>" class="form-control" id="kode<?= $value->id_koramil ?>" placeholder="Kode Koramil" required>
                        </div>
                        <div class="form-group">
                            <label for="nama<?= $value->id_koramil ?>">Nama Koramil</label>
                            <input type="text" name="nama" value="<?= $value->nama_koramil ?>" class="form-control" id="nama<?= $value->id_koramil ?>" placeholder="Nama Koramil" required>
                        </div>
                        <div class="form-group">
                            <label for="wilayah<?= $value->id_koramil ?>">Wilayah</label>
                            <input type="text" name="wilayah" value="<?= $value->wilayah ?>" class="form-control" id="wilayah<?= $value->id_koramil ?>" placeholder="Wilayah" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php
}
?>