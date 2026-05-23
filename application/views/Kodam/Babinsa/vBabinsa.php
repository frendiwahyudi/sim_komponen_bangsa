<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Babinsa</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Kodam/cDashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Babinsa</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header"><h3 class="card-title">Informasi Babinsa</h3></div>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($babinsa as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->nrp ?></td>
                                            <td class="text-center"><?= $value->nama_babinsa ?></td>
                                            <td class="text-center"><?= $value->pangkat ?></td>
                                            <td class="text-center"><?= $value->jabatan ?></td>
                                            <td class="text-center">
                                                <small class="text-muted"><?= $value->kode_koramil ?></small><br>
                                                <span class="badge badge-warning"><?= $value->nama_koramil ?></span>
                                            </td>
                                            <td class="text-center"><?= $value->no_hp ?></td>
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
