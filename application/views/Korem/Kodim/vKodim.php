<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Kodim</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Korem/cDashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Kodim</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <?php if ($this->session->userdata('success')) { ?>
            <div class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?= $this->session->userdata('success') ?>
            </div>
        <?php } ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-plus"></i> Tambah Data Kodim
                    </button>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Informasi Kodim
                                <?php if ($my_korem) { ?>
                                    &mdash; <span class="badge badge-info"><?= $my_korem->nama_korem ?> (<?= $my_korem->kode_korem ?>)</span>
                                <?php } ?>
                            </h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Kodim</th>
                                        <th class="text-center">Nama Kodim</th>
                                        <th class="text-center">Korem</th>
                                        <th class="text-center">Wilayah</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($kodim as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->kode_kodim ?></td>
                                            <td class="text-center"><?= $value->nama_kodim ?></td>
                                            <td class="text-center">
                                                <small class="text-muted"><?= $value->kode_korem ?></small><br>
                                                <span class="badge badge-primary"><?= $value->nama_korem ?></span>
                                            </td>
                                            <td class="text-center"><?= $value->wilayah ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('Korem/cKelolaData/deletekodim/' . $value->id_kodim) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></a>
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_kodim ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('Korem/cKelolaData/createkodim') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Kodim</h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Korem</label>
                        <input type="text" class="form-control"
                            value="<?= $my_korem ? $my_korem->nama_korem . ' (' . $my_korem->kode_korem . ')' : '-' ?>"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label>Kode Kodim</label>
                        <input type="text" name="kode" class="form-control" placeholder="Kode Kodim" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Kodim</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Kodim" required>
                    </div>
                    <div class="form-group">
                        <label>Wilayah</label>
                        <input type="text" name="wilayah" class="form-control" placeholder="Wilayah" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($kodim as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_kodim ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('Korem/cKelolaData/updatekodim/' . $value->id_kodim) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Data Kodim</h4>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Korem</label>
                            <input type="text" class="form-control"
                                value="<?= $my_korem ? $my_korem->nama_korem . ' (' . $my_korem->kode_korem . ')' : '-' ?>"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label>Kode Kodim</label>
                            <input type="text" name="kode" value="<?= $value->kode_kodim ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Kodim</label>
                            <input type="text" name="nama" value="<?= $value->nama_kodim ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Wilayah</label>
                            <input type="text" name="wilayah" value="<?= $value->wilayah ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>
