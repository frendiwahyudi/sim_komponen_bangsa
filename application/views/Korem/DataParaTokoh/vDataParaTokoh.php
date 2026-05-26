<?php
$kategori_options = ['Tokoh Agama', 'Tokoh Masyarakat', 'Tokoh Pemuda', 'Tokoh Adat'];
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Para Tokoh</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Korem/cDashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Para Tokoh</li>
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
                    <ul class="nav nav-tabs mb-3" id="tokohTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-kodim" role="tab">
                                <i class="fas fa-user-tie"></i> Data Para Tokoh (Kodim)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-korem" role="tab">
                                <i class="fas fa-user-tie"></i> Data Para Tokoh (Korem)
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" id="tokohTabContent">

                        <!-- TAB KODIM (CRUD) -->
                        <div class="tab-pane fade show active" id="tab-kodim" role="tabpanel">
                            <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-tambah">
                                <i class="fas fa-plus"></i> Tambah Data Tokoh (Kodim)
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Data Para Tokoh - Kodim</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Tokoh</th>
                                                <th class="text-center">Pekerjaan</th>
                                                <th class="text-center">No HP</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Satuan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($data_para_tokoh as $value) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td><?= $value->nama_tokoh ?></td>
                                                    <td><?= $value->pekerjaan ?></td>
                                                    <td><?= $value->no_hp ?></td>
                                                    <td><?= $value->alamat ?></td>
                                                    <td class="text-center"><?= $value->kategori_tokoh ?></td>
                                                    <td><?= $value->keterangan ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-danger"><?= $value->nama_kodim ?> (<?= $value->kode_kodim ?>)</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_tokoh ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                            <a href="<?= base_url('Korem/cKelolaData/deletedata_para_tokoh/' . $value->id_tokoh) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- TAB KOREM (CRUD) -->
                        <div class="tab-pane fade" id="tab-korem" role="tabpanel">
                            <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-tambah-korem">
                                <i class="fas fa-plus"></i> Tambah Data Tokoh (Korem)
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Data Para Tokoh
                                        &mdash; <span class="badge badge-primary"><?= isset($korem[0]) ? $korem[0]->nama_korem : '' ?> (<?= isset($korem[0]) ? $korem[0]->kode_korem : '' ?>)</span>
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Tokoh</th>
                                                <th class="text-center">Pekerjaan</th>
                                                <th class="text-center">No HP</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Kategori</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Satuan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($data_para_tokoh_korem as $value) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td><?= $value->nama_tokoh ?></td>
                                                    <td><?= $value->pekerjaan ?></td>
                                                    <td><?= $value->no_hp ?></td>
                                                    <td><?= $value->alamat ?></td>
                                                    <td class="text-center"><?= $value->kategori_tokoh ?></td>
                                                    <td><?= $value->keterangan ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-primary"><?= $value->nama_korem ?> (<?= $value->kode_korem ?>)</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button type="button" data-toggle="modal" data-target="#editkorem<?= $value->id_tokoh_korem ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                                            <a href="<?= base_url('Korem/cKelolaData/deletedata_para_tokoh_korem/' . $value->id_tokoh_korem) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></a>
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
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah Kodim -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Para Tokoh (Kodim)</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url('Korem/cKelolaData/createdata_para_tokoh') ?>" method="post">
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
                        <label>Kategori Tokoh</label>
                        <input type="text" class="form-control" name="kategori_tokoh">
                    </div>
                    <div class="form-group">
                        <label>Nama Tokoh</label>
                        <input type="text" class="form-control" name="nama_tokoh" required>
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
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3"></textarea>
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

<!-- Modal Tambah Korem -->
<div class="modal fade" id="modal-tambah-korem">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Para Tokoh (Korem)</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="<?= base_url('Korem/cKelolaData/createdata_para_tokoh_korem') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kategori Tokoh</label>
                        <input type="text" class="form-control" name="kategori_tokoh">
                    </div>
                    <div class="form-group">
                        <label>Nama Tokoh</label>
                        <input type="text" class="form-control" name="nama_tokoh" required>
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
                    <div class="form-group">
                        <label>Keterangan</label>
                        <textarea class="form-control" name="keterangan" rows="3"></textarea>
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

<!-- Modal Edit Kodim -->
<?php foreach ($data_para_tokoh as $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_tokoh ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Para Tokoh (Kodim)</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url('Korem/cKelolaData/updatedata_para_tokoh/' . $value->id_tokoh) ?>" method="post">
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
                            <label>Kategori Tokoh</label>
                            <input type="text" class="form-control" name="kategori_tokoh" value="<?= $value->kategori_tokoh ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Tokoh</label>
                            <input type="text" class="form-control" name="nama_tokoh" value="<?= $value->nama_tokoh ?>" required>
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
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="3"><?= $value->keterangan ?></textarea>
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

<!-- Modal Edit Korem -->
<?php foreach ($data_para_tokoh_korem as $value) { ?>
    <div class="modal fade" id="editkorem<?= $value->id_tokoh_korem ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Para Tokoh (Korem)</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="<?= base_url('Korem/cKelolaData/updatedata_para_tokoh_korem/' . $value->id_tokoh_korem) ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kategori Tokoh</label>
                            <input type="text" class="form-control" name="kategori_tokoh" value="<?= $value->kategori_tokoh ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Tokoh</label>
                            <input type="text" class="form-control" name="nama_tokoh" value="<?= $value->nama_tokoh ?>" required>
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
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan" rows="3"><?= $value->keterangan ?></textarea>
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

<script>
    $(function() {
        var table2 = null;
        $('a[href="#tab-korem"]').on('shown.bs.tab', function() {
            if (!table2) {
                table2 = $('#example2').DataTable({
                    "responsive": true,
                    "autoWidth": false
                });
            } else {
                table2.columns.adjust().responsive.recalc();
            }
        });
    });
</script>