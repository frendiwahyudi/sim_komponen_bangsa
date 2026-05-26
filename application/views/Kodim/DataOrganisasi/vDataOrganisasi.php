<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Organisasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Kodim/cDashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Organisasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <?php
        $kelompok_options = ['Angkatan Muda Siliwangi', 'Banser', 'Brotherhood', 'Buah Batu Corp', 'Garuda Manggala Putih', 'Gibas', 'GMBI', 'KNPI', 'Kokam Muhamadiyah', 'Komunitas ojol Gojek', 'Komunitas ojol Grab', 'Macan Siliwangi', 'Paguyuban Pasundan', 'Patriot Siliwangi', 'Pemuda Pancasila', 'Resimen Mahasiswa', 'Wanadri'];
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
                    <button type="button" class="btn btn-default mb-3" data-toggle="modal" data-target="#modal-default">
                        <i class="fas fa-plus"></i> Tambah Data Organisasi
                    </button>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                Data Organisasi
                                <?php if ($my_kodim) { ?>
                                    &mdash; <span class="badge badge-danger"><?= $my_kodim->nama_kodim ?> (<?= $my_kodim->kode_kodim ?>)</span>
                                <?php } ?>
                            </h3>
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
                                            <td><?= $value->alamat ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('Kodim/cKelolaData/deletedata_organisasi/' . $value->id_organisasi) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus?')"><i class="fas fa-trash"></i></a>
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
            </div>
        </div>
    </section>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('Kodim/cKelolaData/createdata_organisasi') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Organisasi</h4>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Kodim</label>
                        <input type="text" class="form-control" value="<?= $my_kodim ? $my_kodim->nama_kodim . ' (' . $my_kodim->kode_kodim . ')' : '-' ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Nama Organisasi</label>
                        <input type="text" name="nama_organisasi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Organisasi</label>
                        <input type="text" name="jenis_organisasi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Ketua/Pengurus Organisasi</label>
                        <input type="text" name="ketua_organisasi" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No HP</label>
                        <input type="text" name="no_hp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="alamat" class="form-control" rows="3"></textarea>
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
<?php foreach ($data_organisasi as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_organisasi ?>">
        <div class="modal-dialog modal-lg">
            <form action="<?= base_url('Kodim/cKelolaData/updatedata_organisasi/' . $value->id_organisasi) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Organisasi</h4>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kodim</label>
                            <input type="text" class="form-control" value="<?= $my_kodim ? $my_kodim->nama_kodim . ' (' . $my_kodim->kode_kodim . ')' : '-' ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nama Organisasi</label>
                            <input type="text" name="nama_organisasi" value="<?= $value->nama_organisasi ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Jenis Organisasi</label>
                            <input type="text" name="jenis_organisasi" value="<?= $value->jenis_organisasi ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Nama Ketua/Pengurus Organisasi</label>
                            <input type="text" name="ketua_organisasi" value="<?= $value->ketua_organisasi ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Pekerjaan</label>
                            <input type="text" name="pekerjaan" value="<?= $value->pekerjaan ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>No HP</label>
                            <input type="text" name="no_hp" value="<?= $value->no_hp ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3"><?= $value->alamat ?></textarea>
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