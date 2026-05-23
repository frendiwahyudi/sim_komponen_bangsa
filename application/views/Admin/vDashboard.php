<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <!-- Baris 1: Kodam, Korem, Kodim -->
            <div class="row">
                <div class="col-12 col-sm-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-shield-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kodam</span>
                            <span class="info-box-number"><?= $jml['kodam']->jml ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shield-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Korem</span>
                            <span class="info-box-number"><?= $jml['korem']->jml ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-shield-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Kodim</span>
                            <span class="info-box-number"><?= $jml['kodim']->jml ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <!-- Baris 2: Data Keluarga Besar TNI, Para Tokoh, Organisasi, Penggiat Hobi -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Keluarga Besar TNI</span>
                            <span class="info-box-number"><?= $jml['keluarga_besar_tni']->jml ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user-tie"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Para Tokoh</span>
                            <span class="info-box-number"><?= $jml['para_tokoh']->jml ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Data Organisasi</span>
                            <span class="info-box-number"><?= $jml['organisasi']->jml ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-purple elevation-1"><i class="fas fa-star"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Organisasi Penggiat Hobi</span>
                            <span class="info-box-number"><?= $jml['penggiat_hobi']->jml ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="text-center">
                <img src="<?= base_url('asset/AdminLTE/') ?>dist/img/dashboard.png"
                    alt="Logo"
                    class="brand-image elevation-2"
                    style="width:100%; height:auto;">
            </div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->