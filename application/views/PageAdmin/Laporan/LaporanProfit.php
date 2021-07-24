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
                                <li class="breadcrumb-item">Laporan</li>
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
                                    <div class="row col-12">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <!-- <label for="tglPenjualanDari">Dari</label> -->
                                                <input type="date" class="form-control" id="tglPenjualanDari" placeholder="Dari">
                                            </div>
                                        </div>
                                        <p><b>Sampai</b></p>
                                        <div class="col-2">                                            
                                            <div class="form-group">
                                                <!-- <label for="tglPenjualanSampai">Sampai</label> -->
                                                <input type="date" class="form-control" id="tglPenjualanSampai" placeholder="Sampai">
                                            </div>
                                        </div>
                                        <div class="col-3" style="margin-right: auto;">
                                            <div>
                                                <a href="#" class="btn btn-sm btn-primary" id="cariByTgl"><i class="fas fa-search"></i> Proccess</a>
                                                <a href="#" class="btn btn-sm btn-success" id="cariSemua"><i class="fas fa-search"></i> Semua Data</a>
                                            </div>
                                        </div>
                                        <div class="col-4" style="margin-left: auto;">
                                            <div>
                                                <a href="" class="btn btn-sm btn-primary" style="float: right;"><i class="fas fa-print"></i> Cetak</a>
                                            </div> 
                                        </div>
                                    </div>                                    
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableDataSupplier" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Penjualan</th>
                                                <th>Tgl Penjualan</th>
                                                <th>Barang</th>
                                                <th>Satuan</th>
                                                <th>Jumlah</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Profit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="datasuplier">
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="8">Total</th>
                                                <th></th>
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
            $("#tableDataSupplier").DataTable({
                "responsive": true,
                // "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf"],
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            }).buttons().container().appendTo('#tableDataSupplier_wrapper .col-md-6:eq(0)');
        });

        function displayData() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Pembelian/DataBarangPembelian/GetData') ?>",
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
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>`;
                    }
                    $('#databarang').html(row);
                }
            })
        }
    </script>

</body>

</html>