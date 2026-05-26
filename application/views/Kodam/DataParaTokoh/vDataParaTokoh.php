<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Para Tokoh</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('Kodam/cDashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Data Para Tokoh</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
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

                        <!-- TAB KODIM (read-only) -->
                        <div class="tab-pane fade show active" id="tab-kodim" role="tabpanel">
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
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- TAB KOREM (read-only) -->
                        <div class="tab-pane fade" id="tab-korem" role="tabpanel">
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