<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Para Tokoh</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Para Tokoh</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        $kategori_tokoh_options = [
            'Tokoh Agama',
            'Tokoh Masyarakat',
            'Tokoh Pemuda',
            'Tokoh Adat'
        ];
        if ($this->session->userdata('success')) { ?>
            <div class="alert alert-success alert-dismissible mt-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-check"></i> Alert!</h5>
                <?= $this->session->userdata('success') ?>
            </div>
        <?php } ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Nav Tabs -->
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

                        <!-- ===== TAB KODIM ===== -->
                        <div class="tab-pane fade show active" id="tab-kodim" role="tabpanel">
                            <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
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
                                            foreach ($data_para_tokoh as $key => $value) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td class="text-center"><?= $value->nama_tokoh ?></td>
                                                    <td class="text-center"><?= $value->pekerjaan ?></td>
                                                    <td class="text-center"><?= $value->no_hp ?></td>
                                                    <td class="text-center"><?= $value->alamat ?></td>
                                                    <td class="text-center"><?= $value->kategori_tokoh ?></td>
                                                    <td class="text-center"><?= $value->keterangan ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-danger"><?= $value->nama_kodim ?> (<?= $value->kode_kodim ?>)</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('Admin/cKelolaData/deletedata_para_tokoh/' . $value->id_tokoh) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                            <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_tokoh ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane kodim -->

                        <!-- ===== TAB KOREM ===== -->
                        <div class="tab-pane fade" id="tab-korem" role="tabpanel">
                            <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-tambah-korem">
                                <i class="fas fa-plus"></i> Tambah Data Tokoh (Korem)
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Data Para Tokoh - Korem</h3>
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
                                                    <td class="text-center"><?= $value->nama_tokoh ?></td>
                                                    <td class="text-center"><?= $value->pekerjaan ?></td>
                                                    <td class="text-center"><?= $value->no_hp ?></td>
                                                    <td class="text-center"><?= $value->alamat ?></td>
                                                    <td class="text-center"><?= $value->kategori_tokoh ?></td>
                                                    <td class="text-center"><?= $value->keterangan ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-info"><?= $value->nama_korem ?> (<?= $value->kode_korem ?>)</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('Admin/cKelolaData/deletedata_para_tokoh_korem/' . $value->id_tokoh_korem) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                            <button type="button" data-toggle="modal" data-target="#editkorem<?= $value->id_tokoh_korem ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane korem -->

                    </div>
                    <!-- /.tab-content -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- ===== MODAL TAMBAH KODIM ===== -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Para Tokoh (Kodim)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/cKelolaData/createdata_para_tokoh') ?>" method="post">
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

<!-- ===== MODAL EDIT KODIM ===== -->
<?php foreach ($data_para_tokoh as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_tokoh ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Para Tokoh (Kodim)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/cKelolaData/updatedata_para_tokoh/' . $value->id_tokoh) ?>" method="post">
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

<!-- ===== MODAL TAMBAH KOREM ===== -->
<div class="modal fade" id="modal-tambah-korem">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Para Tokoh (Korem)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/cKelolaData/createdata_para_tokoh_korem') ?>" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Pilih Korem</label>
                        <select class="form-control" name="id_korem" required>
                            <option value="">-- Pilih Korem --</option>
                            <?php foreach ($korem as $k) { ?>
                                <option value="<?= $k->id_korem ?>"><?= $k->nama_korem ?> (<?= $k->kode_korem ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Kategori Tokoh</label>
                        <input type="text" class="form-control" name="kategori_tokoh" required>
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

<!-- ===== MODAL EDIT KOREM ===== -->
<?php foreach ($data_para_tokoh_korem as $value) { ?>
    <div class="modal fade" id="editkorem<?= $value->id_tokoh_korem ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Para Tokoh (Korem)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/cKelolaData/updatedata_para_tokoh_korem/' . $value->id_tokoh_korem) ?>" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Pilih Korem</label>
                            <select class="form-control" name="id_korem" required>
                                <option value="">-- Pilih Korem --</option>
                                <?php foreach ($korem as $k) { ?>
                                    <option value="<?= $k->id_korem ?>" <?= ($k->id_korem == $value->id_korem) ? 'selected' : '' ?>><?= $k->nama_korem ?> (<?= $k->kode_korem ?>)</option>
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