<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Organisasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Organisasi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        $kelompok_options = [
            'Angkatan Muda Siliwangi',
            'Banser',
            'Brotherhood',
            'Buah Batu Corp',
            'Garuda Manggala Putih',
            'Gibas',
            'GMBI',
            'KNPI',
            'Kokam Muhamadiyah',
            'Komunitas ojol Gojek',
            'Komunitas ojol Grab',
            'Macan Siliwangi',
            'Paguyuban Pasundan',
            'Patriot Siliwangi',
            'Pemuda Pancasila',
            'Resimen Mahasiswa',
            'Wanadri',
            'Patriot Sejati'
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
                    <ul class="nav nav-tabs mb-3" id="organisasiTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab-kodim" role="tab">
                                <i class="fas fa-sitemap"></i> Data Organisasi (Kodim)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab-korem" role="tab">
                                <i class="fas fa-sitemap"></i> Data Organisasi (Korem)
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="organisasiTabContent">

                        <!-- ===== TAB KODIM ===== -->
                        <div class="tab-pane fade show active" id="tab-kodim" role="tabpanel">
                            <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus"></i> Tambah Data Organisasi (Kodim)
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Data Organisasi - Level Kodim</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Organisasi</th>
                                                <th class="text-center">Jenis Organisasi</th>
                                                <th class="text-center">Nama Ketua/Pengurus</th>
                                                <th class="text-center">Pekerjaan</th>
                                                <th class="text-center">No HP</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Satuan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($data_organisasi as $key => $value) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td class="text-center"><?= $value->nama_organisasi ?></td>
                                                    <td class="text-center"><?= $value->jenis_organisasi ?></td>
                                                    <td class="text-center"><?= $value->ketua_organisasi ?></td>
                                                    <td class="text-center"><?= $value->pekerjaan ?></td>
                                                    <td class="text-center"><?= $value->no_hp ?></td>
                                                    <td class="text-center"><?= $value->alamat ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-danger"><?= $value->nama_kodim ?> (<?= $value->kode_kodim ?>)</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('Admin/cKelolaData/deletedata_organisasi/' . $value->id_organisasi) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                            <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_organisasi ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
                                <i class="fas fa-plus"></i> Tambah Data Organisasi (Korem)
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Data Organisasi - Level Korem</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama Organisasi</th>
                                                <th class="text-center">Jenis Organisasi</th>
                                                <th class="text-center">Nama Ketua/Pengurus</th>
                                                <th class="text-center">Pekerjaan</th>
                                                <th class="text-center">No HP</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Satuan (Korem)</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($data_organisasi_korem as $value) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td class="text-center"><?= $value->nama_organisasi ?></td>
                                                    <td class="text-center"><?= $value->jenis_organisasi ?></td>
                                                    <td class="text-center"><?= $value->ketua_organisasi ?></td>
                                                    <td class="text-center"><?= $value->pekerjaan ?></td>
                                                    <td class="text-center"><?= $value->no_hp ?></td>
                                                    <td class="text-center"><?= $value->alamat ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-primary"><?= $value->nama_korem ?> (<?= $value->kode_korem ?>)</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('Admin/cKelolaData/deletedata_organisasi_korem/' . $value->id_organisasi_korem) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                            <button type="button" data-toggle="modal" data-target="#editkorem<?= $value->id_organisasi_korem ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
                <h4 class="modal-title">Tambah Data Organisasi (Kodim)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/cKelolaData/createdata_organisasi') ?>" method="post">
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
                        <label>Jenis Organisasi</label>
                        <input type="text" class="form-control" name="jenis_organisasi">
                    </div>
                    <div class="form-group">
                        <label>Nama Ketua/Pengurus Organisasi</label>
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

<!-- ===== MODAL EDIT KODIM ===== -->
<?php foreach ($data_organisasi as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_organisasi ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Organisasi (Kodim)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/cKelolaData/updatedata_organisasi/' . $value->id_organisasi) ?>" method="post">
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
                            <label>Jenis Organisasi</label>
                            <input type="text" class="form-control" name="jenis_organisasi" value="<?= $value->jenis_organisasi ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Ketua/Pengurus Organisasi</label>
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

<!-- ===== MODAL TAMBAH KOREM ===== -->
<div class="modal fade" id="modal-tambah-korem">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Data Organisasi (Korem)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/cKelolaData/createdata_organisasi_korem') ?>" method="post">
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
                        <label>Nama Organisasi</label>
                        <input type="text" class="form-control" name="nama_organisasi" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Organisasi</label>
                        <input type="text" class="form-control" name="jenis_organisasi">
                    </div>
                    <div class="form-group">
                        <label>Nama Ketua/Pengurus Organisasi</label>
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

<!-- ===== MODAL EDIT KOREM ===== -->
<?php foreach ($data_organisasi_korem as $value) { ?>
    <div class="modal fade" id="editkorem<?= $value->id_organisasi_korem ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Organisasi (Korem)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/cKelolaData/updatedata_organisasi_korem/' . $value->id_organisasi_korem) ?>" method="post">
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
                            <label>Nama Organisasi</label>
                            <input type="text" class="form-control" name="nama_organisasi" value="<?= $value->nama_organisasi ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Organisasi</label>
                            <input type="text" class="form-control" name="jenis_organisasi" value="<?= $value->jenis_organisasi ?>">
                        </div>
                        <div class="form-group">
                            <label>Nama Ketua/Pengurus Organisasi</label>
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