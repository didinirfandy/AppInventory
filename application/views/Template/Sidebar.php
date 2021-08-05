<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('Admin/indexAdmin'); ?>" class="brand-link">
        <img src="<?= base_url(); ?>assetsApp/dist/img/clipart.png" alt="Admin" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Inventory</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assetsApp/dist/img/avatar2.png'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php $str = $this->session->userdata('nama');
                                            echo wordwrap($str, 30, "<br>\n"); ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('Admin/IndexAdmin'); ?>" class="nav-link <?= $this->uri->segment(2) == "IndexAdmin" ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item <?= $this->uri->segment(2) == "Pembelian" ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>
                            Pembelian
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Pembelian/DataPembelian') ?>" class="nav-link <?= $this->uri->segment(3) == "DataPembelian" ? 'active' : ''; ?> <?= $this->uri->segment(3) == "DataBarangPembelian" ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Histori Pembelian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Pembelian/TambahDataPembelian') ?>" class="nav-link <?= $this->uri->segment(3) == "TambahDataPembelian" ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= $this->uri->segment(2) == "Penjualan" ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>
                            Penjualan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Penjualan/DataPelanggan') ?>" class="nav-link <?= $this->uri->segment(3) == "DataPelanggan" ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pelanggan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Penjualan/DataPenjualan') ?>" class="nav-link <?= $this->uri->segment(3) == "DataPenjualan" ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penjualan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Penjualan/TambahDataPenjualan') ?>" class="nav-link <?= $this->uri->segment(3) == "TambahDataPenjualan" ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tambah</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= $this->uri->segment(2) == "Barang" ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-qrcode"></i>
                        <p>
                            Barang
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Barang/DataMasterBarang') ?>" class="nav-link <?= $this->uri->segment(3) == "DataMasterBarang" ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Master Barang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Barang/DataBarang') ?>" class="nav-link <?= $this->uri->segment(3) == "DataBarang" ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stock Barang</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('Admin/Supplier/DataSupplier') ?>" class="nav-link <?= $this->uri->segment(3) == "DataSupplier" ? 'active' : ''; ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                <li class="nav-item <?= $this->uri->segment(2) == "Laporan" ? 'menu-open' : ''; ?>">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Laporan/LaporanPenjualan') ?>" class="nav-link <?= $this->uri->segment(3) == "LaporanPenjualan" ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penjualan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Laporan/LaporanPembelian') ?>" class="nav-link <?= $this->uri->segment(3) == "LaporanPembelian" ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pembelian</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('Admin/Laporan/LaporanProfit') ?>" class="nav-link <?= $this->uri->segment(3) == "LaporanProfit" ? 'active' : ''; ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profit</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>