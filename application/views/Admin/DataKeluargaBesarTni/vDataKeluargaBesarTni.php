<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Keluarga Besar TNI</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Keluarga Besar TNI</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php
        $kelompok_options = [
            'PEPABRI',
            'LVRI',
            'PPAD',
            'PERIP',
            'PIVERI',
            'Keluarga Besar FKPPI',
            'Generasi Muda FKPPI',
            'Pemuda Panca Marga',
            'HIPAKAD',
            'Dharma Pertiwi',
            'Warakawuri',
            'Korpti Unit TNI',
            'PP Kowad'
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
                    <ul class="nav nav-tabs mb-3" id="kbtTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tab-kodim-link" data-toggle="tab" href="#tab-kodim" role="tab">
                                <i class="fas fa-users"></i> Data KBT (Kodim)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tab-korem-link" data-toggle="tab" href="#tab-korem" role="tab">
                                <i class="fas fa-users"></i> Data KBT (Korem)
                            </a>
                        </li>
                    </ul>

                    <div class="tab-content" id="kbtTabContent">

                        <!-- ===== TAB KODIM ===== -->
                        <div class="tab-pane fade show active" id="tab-kodim" role="tabpanel">
                            <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
                                <i class="fas fa-plus"></i> Tambah Data Keluarga (Kodim)
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Data Keluarga Besar TNI - Kodim</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Pekerjaan</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">No HP</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Kelompok KBT</th>
                                                <th class="text-center">Satuan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($data_keluarga_besar_tni as $key => $value) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td class="text-center"><?= $value->nama ?></td>
                                                    <td class="text-center"><?= $value->pekerjaan ?></td>
                                                    <td class="text-center"><?= $value->alamat ?></td>
                                                    <td class="text-center"><?= $value->no_hp ?></td>
                                                    <td class="text-center"><?= $value->keterangan ?></td>
                                                    <td class="text-center"><?= $value->kelompok_kbt ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-danger"><?= $value->nama_kodim ?> (<?= $value->kode_kodim ?>)</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('Admin/cKelolaData/deletedata_keluarga_besar_tni/' . $value->id_kbt) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                            <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_kbt ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
                                <i class="fas fa-plus"></i> Tambah Data Keluarga (Korem)
                            </button>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Informasi Data Keluarga Besar TNI - Korem</h3>
                                </div>
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Nama</th>
                                                <th class="text-center">Pekerjaan</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">No HP</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Kelompok KBT</th>
                                                <th class="text-center">Satuan</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            foreach ($data_keluarga_besar_tni_korem as $value) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $no++ ?></td>
                                                    <td class="text-center"><?= $value->nama ?></td>
                                                    <td class="text-center"><?= $value->pekerjaan ?></td>
                                                    <td class="text-center"><?= $value->alamat ?></td>
                                                    <td class="text-center"><?= $value->no_hp ?></td>
                                                    <td class="text-center"><?= $value->keterangan ?></td>
                                                    <td class="text-center"><?= $value->kelompok_kbt ?></td>
                                                    <td class="text-center">
                                                        <span class="badge badge-info"><?= $value->nama_korem ?> (<?= $value->kode_korem ?>)</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <a href="<?= base_url('Admin/cKelolaData/deletedata_keluarga_besar_tni_korem/' . $value->id_kbt_korem) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                            <button type="button" data-toggle="modal" data-target="#editkorem<?= $value->id_kbt_korem ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
                <h4 class="modal-title">Tambah Data Keluarga Besar TNI (Kodim)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/cKelolaData/createdata_keluarga_besar_tni') ?>" method="post">
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
                        <label>Kelompok KBT</label>
                        <select class="form-control" name="kelompok_kbt" required>
                            <option value="">-- Pilih Kelompok --</option>
                            <?php foreach ($kelompok_options as $option) : ?>
                                <option value="<?= $option ?>"><?= $option ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
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
<?php foreach ($data_keluarga_besar_tni as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_kbt ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Keluarga Besar TNI (Kodim)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/cKelolaData/updatedata_keluarga_besar_tni/' . $value->id_kbt) ?>" method="post">
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
                            <label>Kelompok KBT</label>
                            <select class="form-control" name="kelompok_kbt" required>
                                <option value="">-- Pilih Kelompok --</option>
                                <?php foreach ($kelompok_options as $option) : ?>
                                    <option value="<?= $option ?>" <?= ($value->kelompok_kbt == $option) ? 'selected' : '' ?>><?= $option ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $value->nama ?>" required>
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
                <h4 class="modal-title">Tambah Data Keluarga Besar TNI (Korem)</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('Admin/cKelolaData/createdata_keluarga_besar_tni_korem') ?>" method="post">
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
                        <label>Kelompok KBT</label>
                        <select class="form-control" name="kelompok_kbt" required>
                            <option value="">-- Pilih Kelompok --</option>
                            <?php foreach ($kelompok_options as $option) : ?>
                                <option value="<?= $option ?>"><?= $option ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
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
<?php foreach ($data_keluarga_besar_tni_korem as $value) { ?>
    <div class="modal fade" id="editkorem<?= $value->id_kbt_korem ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Keluarga Besar TNI (Korem)</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/cKelolaData/updatedata_keluarga_besar_tni_korem/' . $value->id_kbt_korem) ?>" method="post">
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
                            <label>Kelompok KBT</label>
                            <select class="form-control" name="kelompok_kbt" required>
                                <option value="">-- Pilih Kelompok --</option>
                                <?php foreach ($kelompok_options as $option) : ?>
                                    <option value="<?= $option ?>" <?= ($value->kelompok_kbt == $option) ? 'selected' : '' ?>><?= $option ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?= $value->nama ?>" required>
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
<?php if ($this->session->flashdata('active_tab') == 'korem') { ?>
    <script>
        $(document).ready(function() {
            $('#tab-korem-link').tab('show');
        });
    </script>
<?php } ?>