<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Babinsa</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Babinsa</li>
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
                        <i class="fas fa-plus"></i> Tambah Data Babinsa
                    </button>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Informasi Babinsa</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">NRP</th>
                                        <th class="text-center">Nama Babinsa</th>
                                        <th class="text-center">Pangkat</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Koramil</th>
                                        <th class="text-center">No HP</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($babinsa as $key => $value) {
                                    ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->nrp ?></td>
                                            <td class="text-center"><?= $value->nama_babinsa ?></td>
                                            <td class="text-center"><?= $value->pangkat ?></td>
                                            <td class="text-center"><?= $value->jabatan ?></td>
                                            <td class="text-center">
                                                <small class="text-muted"><?= $value->kode_koramil ?></small>
                                                <br>
                                                <span class="badge badge-warning"><?= $value->nama_koramil ?></span>
                                            </td>
                                            <td class="text-center"><?= $value->no_hp ?></td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="<?= base_url('Admin/cKelolaData/deletebabinsa/' . $value->id_babinsa) ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></a>
                                                    <button type="button" data-toggle="modal" data-target="#edit<?= $value->id_babinsa ?>" class="btn btn-warning"><i class="fas fa-edit"></i></button>
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
                                        <th class="text-center">NRP</th>
                                        <th class="text-center">Nama Babinsa</th>
                                        <th class="text-center">Pangkat</th>
                                        <th class="text-center">Jabatan</th>
                                        <th class="text-center">Koramil</th>
                                        <th class="text-center">No HP</th>
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

<div class="modal fade" id="modal-default" size="lg">
    <div class="modal-dialog modal-lg">
        <form action="<?= base_url('admin/ckeloladata/createbabinsa') ?>" method="POST">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Babinsa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="id_koramil">Pilih Koramil</label>
                        <select name="id_koramil" id="id_koramil" class="form-control" required>
                            <option value="">-- Pilih Koramil --</option>
                            <?php foreach ($koramil as $k) { ?>
                                <option value="<?= $k->id_koramil ?>"><?= $k->nama_koramil ?> (<?= $k->kode_koramil ?>)</option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nrp">NRP</label>
                                <input type="text" name="nrp" class="form-control" id="nrp" placeholder="Nomor Registrasi Personel" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama">Nama Babinsa</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Lengkap" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pangkat">Pangkat</label>
                                <input type="text" name="pangkat" class="form-control" id="pangkat" placeholder="Pangkat" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jabatan">Jabatan</label>
                                <input type="text" name="jabatan" class="form-control" id="jabatan" placeholder="Jabatan" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_hp">No HP</label>
                                <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="No HP" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" class="form-control" id="alamat" placeholder="Alamat Lengkap" rows="3"></textarea>
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
foreach ($babinsa as $key => $value) {
?>
    <div class="modal fade" id="edit<?= $value->id_babinsa ?>" size="lg">
        <div class="modal-dialog modal-lg">
            <form action="<?= base_url('admin/ckeloladata/updatebabinsa/' . $value->id_babinsa) ?>" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Data Babinsa</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="id_koramil<?= $value->id_babinsa ?>">Pilih Koramil</label>
                            <select name="id_koramil" id="id_koramil<?= $value->id_babinsa ?>" class="form-control" required>
                                <option value="">-- Pilih Koramil --</option>
                                <?php foreach ($koramil as $k) { ?>
                                    <option value="<?= $k->id_koramil ?>" <?= ($k->id_koramil == $value->id_koramil) ? 'selected' : '' ?>><?= $k->nama_koramil ?> (<?= $k->kode_koramil ?>)</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nrp<?= $value->id_babinsa ?>">NRP</label>
                                    <input type="text" name="nrp" value="<?= $value->nrp ?>" class="form-control" id="nrp<?= $value->id_babinsa ?>" placeholder="Nomor Registrasi Personel" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama<?= $value->id_babinsa ?>">Nama Babinsa</label>
                                    <input type="text" name="nama" value="<?= $value->nama_babinsa ?>" class="form-control" id="nama<?= $value->id_babinsa ?>" placeholder="Nama Lengkap" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pangkat<?= $value->id_babinsa ?>">Pangkat</label>
                                    <input type="text" name="pangkat" value="<?= $value->pangkat ?>" class="form-control" id="pangkat<?= $value->id_babinsa ?>" placeholder="Pangkat" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jabatan<?= $value->id_babinsa ?>">Jabatan</label>
                                    <input type="text" name="jabatan" value="<?= $value->jabatan ?>" class="form-control" id="jabatan<?= $value->id_babinsa ?>" placeholder="Jabatan" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="no_hp<?= $value->id_babinsa ?>">No HP</label>
                                    <input type="text" name="no_hp" value="<?= $value->no_hp ?>" class="form-control" id="no_hp<?= $value->id_babinsa ?>" placeholder="No HP" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat<?= $value->id_babinsa ?>">Alamat</label>
                            <textarea name="alamat" class="form-control" id="alamat<?= $value->id_babinsa ?>" placeholder="Alamat Lengkap" rows="3"><?= $value->alamat ?></textarea>
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