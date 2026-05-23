<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
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
                        <i class="fas fa-user-plus"></i> Tambah Data User
                    </button>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi User</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Nama User</th>
                                        <th class="text-center">No Telepon</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Username</th>
                                        <th class="text-center">Password</th>
                                        <th class="text-center">Level Akun</th>
                                        <th class="text-center">Satuan</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->nama_user ?></td>
                                            <td class="text-center"><?= $value->no_hp ?></td>
                                            <td class="text-center"><?= $value->alamat ?></td>
                                            <td class="text-center"><?= $value->username ?></td>
                                            <td class="text-center"><?= $value->password ?></td>
                                            <td class="text-center">
                                                <?php
                                                $badges = [
                                                    '1' => ['success', 'Admin'],
                                                    // '2' => ['warning', 'Kepala Desa'],
                                                    '3' => ['danger',  'Kodam'],
                                                    '4' => ['info',    'Korem'],
                                                    '5' => ['primary', 'Kodim'],
                                                ];
                                                $lvl = $value->level_user;
                                                if (isset($badges[$lvl])) {
                                                    echo '<span class="badge badge-' . $badges[$lvl][0] . '">' . $badges[$lvl][1] . '</span>';
                                                }
                                                ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($value->nama_wilayah)) { ?>
                                                    <small class="text-muted"><?= $value->kode_wilayah ?></small><br>
                                                    <span class="badge badge-secondary"><?= $value->nama_wilayah ?></span>
                                                <?php } else {
                                                    echo '-';
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('Admin/cKelolaData/deleteuser/' . $value->id_user) ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus user ini?')"><i class="fas fa-trash"></i></a>
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_user ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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

<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="<?= base_url('admin/ckeloladata/createuser') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama User" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="no_hp" class="form-control" maxlength="13" minlength="11" placeholder="No Telepon" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="text" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>Level User</label>
                        <select class="form-control" name="level" id="level_tambah" required onchange="toggleWilayah(this, 'wilayah_tambah')">
                            <option value="">-- Pilih Level User --</option>
                            <option value="1">Admin</option>
                            <!-- <option value="2">Kepala Desa</option> -->
                            <option value="3">Kodam</option>
                            <option value="4">Korem</option>
                            <option value="5">Kodim</option>
                        </select>
                    </div>
                    <div id="wilayah_tambah" style="display:none;">
                        <div id="wilayah_tambah_kodam" class="form-group" style="display:none;">
                            <label>Pilih Kodam</label>
                            <select class="form-control" name="id_wilayah" id="sel_kodam_tambah" disabled>
                                <option value="">-- Pilih Kodam --</option>
                                <?php foreach ($kodam as $k) { ?>
                                    <option value="<?= $k->id_kodam ?>"><?= $k->nama_kodam ?> (<?= $k->kode_kodam ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div id="wilayah_tambah_korem" class="form-group" style="display:none;">
                            <label>Pilih Korem</label>
                            <select class="form-control" name="id_wilayah" id="sel_korem_tambah" disabled>
                                <option value="">-- Pilih Korem --</option>
                                <?php foreach ($korem as $k) { ?>
                                    <option value="<?= $k->id_korem ?>"><?= $k->nama_korem ?> (<?= $k->kode_korem ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div id="wilayah_tambah_kodim" class="form-group" style="display:none;">
                            <label>Pilih Kodim</label>
                            <select class="form-control" name="id_wilayah" id="sel_kodim_tambah" disabled>
                                <option value="">-- Pilih Kodim --</option>
                                <?php foreach ($kodim as $k) { ?>
                                    <option value="<?= $k->id_kodim ?>"><?= $k->nama_kodim ?> (<?= $k->kode_kodim ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Edit Data -->
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_user ?>">
        <div class="modal-dialog">
            <form action="<?= base_url('admin/ckeloladata/updateuser/' . $value->id_user) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Data User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" name="nama" value="<?= $value->nama_user ?>" class="form-control" placeholder="Nama User" required>
                        </div>
                        <div class="form-group">
                            <label>No Telepon</label>
                            <input type="text" name="no_hp" value="<?= $value->no_hp ?>" class="form-control" maxlength="13" minlength="11" placeholder="No Telepon" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" name="alamat" value="<?= $value->alamat ?>" class="form-control" placeholder="Alamat" required>
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" value="<?= $value->username ?>" class="form-control" placeholder="Username" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" name="password" value="<?= $value->password ?>" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label>Level User</label>
                            <select class="form-control" name="level" id="level_edit<?= $value->id_user ?>" required
                                onchange="toggleWilayah(this, 'wilayah_edit<?= $value->id_user ?>')">
                                <option value="">-- Pilih Level User --</option>
                                <option value="1" <?= $value->level_user == 1 ? 'selected' : '' ?>>Admin</option>
                                <!-- <option value="2" <?= $value->level_user == 2 ? 'selected' : '' ?>>Kepala Desa</option> -->
                                <option value="3" <?= $value->level_user == 3 ? 'selected' : '' ?>>Kodam</option>
                                <option value="4" <?= $value->level_user == 4 ? 'selected' : '' ?>>Korem</option>
                                <option value="5" <?= $value->level_user == 5 ? 'selected' : '' ?>>Kodim</option>
                            </select>
                        </div>
                        <?php $showEdit = in_array($value->level_user, [3, 4, 5]); ?>
                        <div id="wilayah_edit<?= $value->id_user ?>" style="display:<?= $showEdit ? 'block' : 'none' ?>;">
                            <div id="wilayah_edit<?= $value->id_user ?>_kodam" class="form-group"
                                style="display:<?= $value->level_user == 3 ? 'block' : 'none' ?>;">
                                <label>Pilih Kodam</label>
                                <select class="form-control" name="id_wilayah" <?= $value->level_user != 3 ? 'disabled' : '' ?>>
                                    <option value="">-- Pilih Kodam --</option>
                                    <?php foreach ($kodam as $k) { ?>
                                        <option value="<?= $k->id_kodam ?>" <?= ($value->level_user == 3 && $value->id_wilayah == $k->id_kodam) ? 'selected' : '' ?>>
                                            <?= $k->nama_kodam ?> (<?= $k->kode_kodam ?>)
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div id="wilayah_edit<?= $value->id_user ?>_korem" class="form-group"
                                style="display:<?= $value->level_user == 4 ? 'block' : 'none' ?>;">
                                <label>Pilih Korem</label>
                                <select class="form-control" name="id_wilayah" <?= $value->level_user != 4 ? 'disabled' : '' ?>>
                                    <option value="">-- Pilih Korem --</option>
                                    <?php foreach ($korem as $k) { ?>
                                        <option value="<?= $k->id_korem ?>" <?= ($value->level_user == 4 && $value->id_wilayah == $k->id_korem) ? 'selected' : '' ?>>
                                            <?= $k->nama_korem ?> (<?= $k->kode_korem ?>)
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div id="wilayah_edit<?= $value->id_user ?>_kodim" class="form-group"
                                style="display:<?= $value->level_user == 5 ? 'block' : 'none' ?>;">
                                <label>Pilih Kodim</label>
                                <select class="form-control" name="id_wilayah" <?= $value->level_user != 5 ? 'disabled' : '' ?>>
                                    <option value="">-- Pilih Kodim --</option>
                                    <?php foreach ($kodim as $k) { ?>
                                        <option value="<?= $k->id_kodim ?>" <?= ($value->level_user == 5 && $value->id_wilayah == $k->id_kodim) ? 'selected' : '' ?>>
                                            <?= $k->nama_kodim ?> (<?= $k->kode_kodim ?>)
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php } ?>

<script>
    function toggleWilayah(sel, containerId) {
        var level = sel.value;
        var container = document.getElementById(containerId);
        var kodamDiv = document.getElementById(containerId + '_kodam');
        var koremDiv = document.getElementById(containerId + '_korem');
        var kodimDiv = document.getElementById(containerId + '_kodim');
        var kodamSel = kodamDiv.querySelector('select');
        var koremSel = koremDiv.querySelector('select');
        var kodimSel = kodimDiv.querySelector('select');

        if (level === '3' || level === '4' || level === '5') {
            container.style.display = 'block';
            kodamDiv.style.display = level === '3' ? 'block' : 'none';
            koremDiv.style.display = level === '4' ? 'block' : 'none';
            kodimDiv.style.display = level === '5' ? 'block' : 'none';
            kodamSel.disabled = level !== '3';
            koremSel.disabled = level !== '4';
            kodimSel.disabled = level !== '5';
        } else {
            container.style.display = 'none';
            kodamDiv.style.display = 'none';
            koremDiv.style.display = 'none';
            kodimDiv.style.display = 'none';
            kodamSel.disabled = true;
            koremSel.disabled = true;
            kodimSel.disabled = true;
        }
    }
</script>