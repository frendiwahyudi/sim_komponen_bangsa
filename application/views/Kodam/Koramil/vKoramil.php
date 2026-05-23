<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h1>Koramil</h1></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Kodam/cDashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Koramil</li>
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
                        <div class="card-header"><h3 class="card-title">Informasi Koramil</h3></div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Kode Koramil</th>
                                        <th class="text-center">Nama Koramil</th>
                                        <th class="text-center">Kodim</th>
                                        <th class="text-center">Wilayah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; foreach ($koramil as $key => $value) { ?>
                                        <tr>
                                            <td class="text-center"><?= $no++ ?></td>
                                            <td class="text-center"><?= $value->kode_koramil ?></td>
                                            <td class="text-center"><?= $value->nama_koramil ?></td>
                                            <td class="text-center">
                                                <small class="text-muted"><?= $value->kode_kodim ?></small><br>
                                                <span class="badge badge-success"><?= $value->nama_kodim ?></span>
                                            </td>
                                            <td class="text-center"><?= $value->wilayah ?></td>
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
