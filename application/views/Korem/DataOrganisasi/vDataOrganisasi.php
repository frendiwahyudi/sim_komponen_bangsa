<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Data Organisasi</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Korem/cDashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Organisasi</li>
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
                    <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-tambah">
                        <i class="fas fa-plus"></i> Tambah Data Organisasi
                    </button>
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Informasi Data Organisasi</h3></div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama Organisasi</th>
                                        <th class="text-center">Kelompok</th>
                                        <th class="text-center">Jenis</th>
                                        <th class="text-center">Nama Ketua/Pengurus</th>
                                        <th class="text-center">Pekerjaan</th>
                                        <th class="text-center">No HP</th>
                                        <th class="text-center">Kodim</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($data_organisasi as $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td><?= $value->nama_organisasi ?></td>
                                            <td><?= $value->kelompok_organisasi ?></td>
                                            <td><?= $value->jenis_organisasi ?></td>
                                            <td><?= $value->ketua_organisasi ?></td>
                                            <td><?= $value->pekerjaan ?></td>
                                            <td><?= $value->no_hp ?></td>
                                            <td class="text-center">
                                                <span class="badge badge-danger"><?= $value->nama_kodim ?> (<?= $value->kode_kodim ?>)</span>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_organisasi ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                    <a href="<?= base_url('Korem/cKelolaData/deletedata_organisasi/' . $value->id_organisasi) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
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
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Organisasi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url('Korem/cKelolaData/createdata_organisasi') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pilih Kodim</label>
                        <select class="form-control" name="id_kodim" required>
                            <option value="">-- Pilih Kodim --</option>
                            <?php foreach ($kodim as $k) { ?>
                                <option value="<?= $k->id_kodim ?>"><?= $k->nama_kodim ?> (<?= $k->kode_kodim ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Organisasi</label>
                        <input type="text" class="form-control" name="nama_organisasi" required>
                    </div>
                    <div class="form-group">
                        <label>Kelompok Organisasi</label>
                        <input type="text" class="form-control" name="kelompok_organisasi">
                    </div>
                    <div class="form-group">
                        <label>Jenis Organisasi</label>
                        <input type="text" class="form-control" name="jenis_organisasi">
                    </div>
                    <div class="form-group">
                        <label>Ketua / Pengurus</label>
                        <input type="text" class="form-control" name="ketua_organisasi">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan">
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" class="form-control" name="no_hp">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<?php foreach ($data_organisasi as $value) { ?>
<div class="modal fade" id="edit<?= $value->id_organisasi ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data Organisasi</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url('Korem/cKelolaData/updatedata_organisasi/' . $value->id_organisasi) ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pilih Kodim</label>
                        <select class="form-control" name="id_kodim" required>
                            <option value="">-- Pilih Kodim --</option>
                            <?php foreach ($kodim as $k) { ?>
                                <option value="<?= $k->id_kodim ?>" <?= ($k->id_kodim == $value->id_kodim) ? 'selected' : '' ?>><?= $k->nama_kodim ?> (<?= $k->kode_kodim ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Organisasi</label>
                        <input type="text" class="form-control" name="nama_organisasi" value="<?= $value->nama_organisasi ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Kelompok Organisasi</label>
                        <input type="text" class="form-control" name="kelompok_organisasi" value="<?= $value->kelompok_organisasi ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Organisasi</label>
                        <input type="text" class="form-control" name="jenis_organisasi" value="<?= $value->jenis_organisasi ?>">
                    </div>
                    <div class="form-group">
                        <label>Ketua / Pengurus</label>
                        <input type="text" class="form-control" name="ketua_organisasi" value="<?= $value->ketua_organisasi ?>">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" class="form-control" name="pekerjaan" value="<?= $value->pekerjaan ?>">
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" class="form-control" name="no_hp" value="<?= $value->no_hp ?>">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" name="alamat" rows="3"><?= $value->alamat ?></textarea>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php } ?>
