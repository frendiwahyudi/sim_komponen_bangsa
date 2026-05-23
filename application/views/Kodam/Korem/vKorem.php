<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Korem</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Kodam/cDashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Korem</li>
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
                        <i class="fas fa-plus"></i> Tambah Data Korem
                    </button>
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Informasi Korem</h3></div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Korem</th>
                                        <th class="text-center">Nama Korem</th>
                                        <th class="text-center">Kodam</th>
                                        <th class="text-center">Wilayah</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($korem as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->kode_korem ?></td>
                                            <td class="text-center"><?= $value->nama_korem ?></td>
                                            <td class="text-center">
                                                <small class="text-muted"><?= $value->kode_kodam ?></small><br>
                                                <span class="badge badge-info"><?= $value->nama_kodam ?></span>
                                            </td>
                                            <td class="text-center"><?= $value->wilayah ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('Kodam/cKelolaData/deletekorem/' . $value->id_korem) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></a>
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_korem ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
        <form action="<?= base_url('Kodam/cKelolaData/createkorem') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Korem</h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pilih Kodam</label>
                        <select name="id_kodam" class="form-control" required>
                            <option value="">-- Pilih Kodam --</option>
                            <?php foreach ($kodam as $k) { ?>
                                <option value="<?= $k->id_kodam ?>"><?= $k->nama_kodam ?> (<?= $k->kode_kodam ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kode Korem</label>
                        <input type="text" name="kode" class="form-control" placeholder="Kode Korem" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Korem</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Korem" required>
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
<?php foreach ($korem as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_korem ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('Kodam/cKelolaData/updatekorem/' . $value->id_korem) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Data Korem</h4>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pilih Kodam</label>
                            <select name="id_kodam" class="form-control" required>
                                <option value="">-- Pilih Kodam --</option>
                                <?php foreach ($kodam as $k) { ?>
                                    <option value="<?= $k->id_kodam ?>" <?= ($k->id_kodam == $value->id_kodam) ? 'selected' : '' ?>><?= $k->nama_kodam ?> (<?= $k->kode_kodam ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kode Korem</label>
                            <input type="text" name="kode" value="<?= $value->kode_korem ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Korem</label>
                            <input type="text" name="nama" value="<?= $value->nama_korem ?>" class="form-control" required>
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
