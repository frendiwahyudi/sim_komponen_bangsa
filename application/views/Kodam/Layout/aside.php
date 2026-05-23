<aside class="main-sidebar sidebar-light-danger elevation-4">
    <a href="#" class="brand-link">
        <img src="<?= base_url('asset/AdminLTE/') ?>dist/img/boxed-bg.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity:.8">
        <span class="brand-text font-weight-dark">Komponen Bangsa</span>
    </a>

    <div class="sidebar">
        <?php
        $user_id  = $this->session->userdata('id');
        $nama_user = '';
        if ($user_id) {
            $user_row = $this->db->get_where('user', ['id_user' => $user_id])->row();
            if ($user_row && !empty($user_row->nama_user)) {
                $nama_user = $user_row->nama_user;
            }
        }
        ?>
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block">Selamat Datang,<br> <?= $nama_user ?></a>
                Anda Login Sebagai <strong>Kodam</strong>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= base_url('Kodam/cDashboard') ?>"
                        class="nav-link <?= ($this->uri->segment(2) == 'cDashboard') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <?php
                $master_routes = ['korem', 'kodim', 'kodam'];
                $master_active = ($this->uri->segment(2) == 'cKelolaData' && in_array($this->uri->segment(3), $master_routes));
                ?>
                <li class="nav-item has-treeview <?= $master_active ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $master_active ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-sitemap"></i>
                        <p>Data Satuan <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Kodam/cKelolaData/kodam') ?>"
                                class="nav-link <?= ($this->uri->segment(3) == 'kodam') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kodam</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Kodam/cKelolaData/korem') ?>"
                                class="nav-link <?= ($this->uri->segment(3) == 'korem') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Korem</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Kodam/cKelolaData/kodim') ?>"
                                class="nav-link <?= ($this->uri->segment(3) == 'kodim') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kodim</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <?php
                $kb_routes = ['data_keluarga_besar_tni', 'data_para_tokoh', 'data_organisasi', 'organisasi_penggiat_hobi'];
                $kb_active = ($this->uri->segment(2) == 'cKelolaData' && in_array($this->uri->segment(3), $kb_routes));
                ?>
                <li class="nav-item has-treeview <?= $kb_active ? 'menu-open' : '' ?>">
                    <a href="#" class="nav-link <?= $kb_active ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-archive"></i>
                        <p>Komponen Bangsa <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Kodam/cKelolaData/data_keluarga_besar_tni') ?>"
                                class="nav-link <?= ($this->uri->segment(3) == 'data_keluarga_besar_tni') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Keluarga Besar TNI</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Kodam/cKelolaData/data_para_tokoh') ?>"
                                class="nav-link <?= ($this->uri->segment(3) == 'data_para_tokoh') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Para Tokoh</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Kodam/cKelolaData/data_organisasi') ?>"
                                class="nav-link <?= ($this->uri->segment(3) == 'data_organisasi') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Data Organisasi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Kodam/cKelolaData/organisasi_penggiat_hobi') ?>"
                                class="nav-link <?= ($this->uri->segment(3) == 'organisasi_penggiat_hobi') ? 'active' : '' ?>">
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
    </div>
</aside>