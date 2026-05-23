<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-warning elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="<?= base_url('asset/AdminLTE/') ?>dist/img/boxed-bg.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Komponen Bangsa</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <?php
        $user_id = $this->session->userdata('id');
        $nama_user = '';
        if ($user_id) {
            $user_row = $this->db->get_where('user', ['id_user' => $user_id])->row();
            if ($user_row && !empty($user_row->nama_user)) {
                $nama_user = $user_row->nama_user;
            }
        }
        ?>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Selamat Datang,<br> <?= $nama_user ?></a>
                Anda Login Sebagai <strong>Admin</strong>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('Admin/cDashboard') ?>" class="nav-link   <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cDashboard') {
                                                                                        echo 'active';
                                                                                    }  ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php
                $data_master_routes = ['kategori', 'barang', 'lokasi', 'user', 'kodam', 'korem', 'kodim', 'koramil', 'babinsa'];
                $data_master_active = ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && in_array($this->uri->segment(3), $data_master_routes));
                ?>
                <li class="nav-item has-treeview <?= $data_master_active ? 'menu-open' : '' ?>">
                    <a href="<?= base_url('Admin/cKelolaData') ?>" class="nav-link <?= $data_master_active ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Data Master
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaData/kodam') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'kodam') {
                                                                                                        echo 'active';
                                                                                                    }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kodam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaData/korem') ?>"
                                class="nav-link <?= (
                                                    $this->uri->segment(2) == 'cKelolaData' &&
                                                    $this->uri->segment(3) == 'korem'
                                                ) ? 'active' : '' ?>">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Korem</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaData/kodim') ?>"
                                class="nav-link <?= (
                                                    $this->uri->segment(2) == 'cKelolaData' &&
                                                    $this->uri->segment(3) == 'kodim'
                                                ) ? 'active' : '' ?>">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Kodim</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaData/koramil') ?>"
                                class="nav-link <?= (
                                                    $this->uri->segment(2) == 'cKelolaData' &&
                                                    $this->uri->segment(3) == 'koramil'
                                                ) ? 'active' : '' ?>">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Koramil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaData/babinsa') ?>"
                                class="nav-link <?= (
                                                    $this->uri->segment(2) == 'cKelolaData' &&
                                                    $this->uri->segment(3) == 'babinsa'
                                                ) ? 'active' : '' ?>">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Babinsa</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaData/user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && $this->uri->segment(3) == 'user') {
                                                                                                    echo 'active';
                                                                                                }  ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
                $komponen_bangsa_routes = ['data_keluarga_besar_tni', 'data_para_tokoh', 'data_organisasi', 'organisasi_penggiat_hobi'];
                $komponen_bangsa_active = ($this->uri->segment(1) == 'Admin' && $this->uri->segment(2) == 'cKelolaData' && in_array($this->uri->segment(3), $komponen_bangsa_routes));
                ?>
                <li class="nav-item has-treeview <?= $komponen_bangsa_active ? 'menu-open' : '' ?>">
                    <a href="<?= base_url('Admin/cKelolaData') ?>" class="nav-link <?= $komponen_bangsa_active ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>
                            Komponen Bangsa
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaData/data_keluarga_besar_tni') ?>"
                                class="nav-link <?= (
                                                    $this->uri->segment(2) == 'cKelolaData' &&
                                                    $this->uri->segment(3) == 'data_keluarga_besar_tni'
                                                ) ? 'active' : '' ?>">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Keluarga Besar TNI</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaData/data_para_tokoh') ?>"
                                class="nav-link <?= (
                                                    $this->uri->segment(2) == 'cKelolaData' &&
                                                    $this->uri->segment(3) == 'data_para_tokoh'
                                                ) ? 'active' : '' ?>">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Para Tokoh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaData/data_organisasi') ?>"
                                class="nav-link <?= (
                                                    $this->uri->segment(2) == 'cKelolaData' &&
                                                    $this->uri->segment(3) == 'data_organisasi'
                                                ) ? 'active' : '' ?>">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Organisasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/cKelolaData/organisasi_penggiat_hobi') ?>"
                                class="nav-link <?= (
                                                    $this->uri->segment(2) == 'cKelolaData' &&
                                                    $this->uri->segment(3) == 'organisasi_penggiat_hobi'
                                                ) ? 'active' : '' ?>">

                                <i class="far fa-circle nav-icon"></i>
                                <p>Organisasi Penggiat Hobi</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('cAuth/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>SignOut</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>