<body class="hold-transition sidebar-mini layout-footer-fixed sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('Template/Navbar') ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('Template/Sidebar') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $title ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $title ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="col-md-12">
                        <div class="card">
                            <!-- <div class="card-header">

                            </div> -->

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Supplier</h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="formDatSupplier">
                                                    <div class="form-group">
                                                        <label for="kodeSupplier">Kode Supplier</label>
                                                        <input type="text" class="form-control" id="kodeSupplier" placeholder="Kode Supplier">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="namaSupplier">Nama Supplier</label>
                                                        <input type="text" class="form-control" id="namaSupplier" placeholder="Nama Supplier">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamatSupplier">Alamat Supplier</label>
                                                        <input type="text" class="form-control" id="alamatSupplier" placeholder="Alamat Supplier">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="deskripsiSupp">Deskripsi</label>
                                                        <textarea name="deskripsiSupp" id="deskripsiSupp" class="form-control" placeholder="Deskripsi Supplier"></textarea>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <a class="btn btn-md btn-primary " id="tmbhDataSupplier" style="float: left;"><i class="fas fa-save"></i> Simpan</a>
                                                <a class="btn btn-md btn-danger " href="<?= base_url() ?>Admin/Supplier/Supplier" id="btlTambahData" style="float: left; margin-left: 1%;"><i class="fas fa-times"></i> Batal</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view('Template/Footer') ?>
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('Template/Script') ?>

</body>

</html>