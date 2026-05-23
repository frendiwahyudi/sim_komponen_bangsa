<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Korem</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Korem/cDashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Korem</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row"><div class="col-12">
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
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div></div>
        </div>
    </section>
</div>
