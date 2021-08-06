<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
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
                            <h1 class="m-0"><?= $title; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item">Pembelian</li>
                                <li class="breadcrumb-item active"><?= $title; ?></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="btn btn-sm btn-primary" href="<?= base_url('Admin/Penjualan/TambahDataPenjualan'); ?>" style="float: right; margin-left: 1%;"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Tambah Data</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableDataBarang" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Penjualan</th>
                                                <th>Tgl Penjualan</th>
                                                <th>Quantity</th>
                                                <th>Total Penjualan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="databarang">
                                            <tr> 
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a href="<?= base_url('Admin/Penjualan/DetailDataPenjualan')?>" class="btn btn-xs btn-primary"><i class="fas fa-folder"></i>&nbsp;&nbsp;Detail</a>
                                                </td> 
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Penjualan</th>
                                                <th>Tgl Penjualan</th>
                                                <th>Quantity</th>
                                                <th>Total Penjualan</th>
                                                <th>Aksi</th>
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
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view('Template/Footer') ?>
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('Template/DataTablesJS') ?>

    <script type="text/javascript">
        $(function() {
            displayData()
            $("#tableDataBarang").DataTable({
                "responsive": true,
                // "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf"],
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            }).buttons().container().appendTo('#tableDataBarang_wrapper .col-md-6:eq(0)');
        });

        function displayData() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/DataBarangPembelian/GetData') ?>",
                dataType: "json",
                async: false,
                success: function(data) {
                    console.log(data);
                    let row = '';
                    for (let i = 0; i < data.length; i++) {
                        row += `<tr> 
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Detail</a></td> 
                            </tr>`;
                    }
                    $('#databarang').html(row);
                }
            })
        }
    </script>

</body>

</html>