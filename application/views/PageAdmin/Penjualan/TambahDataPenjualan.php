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
                                    <div class="col-md-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Barang</h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="formDatBarang">
                                                    <div class="form-group">
                                                        <label for="kodeBarang">Kode Barang</label>
                                                        <select class="form-control" id="kodeBarang">
                                                            <option selected="selected">Pulpen</option>
                                                            <option>Buku</option>
                                                            <option>Pensil</option>
                                                            <option>Pengahpus</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="namaBarang">Nama Barang</label>
                                                        <input type="text" class="form-control" id="namaBarang" placeholder="Barang">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlahBarang">Quantity</label>
                                                        <input type="number" class="form-control" id="jumlahBarang" placeholder="Quantity">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-md btn-block btn-primary col-md-3" type="button" id="tmbDataPenjualan" style="float: left;"><i class="fas fa-plus-square"></i> Tambah Data</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Penjualan</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="kodePenjualan">Kode Penjualan</label>
                                                    <input type="text" class="form-control" id="kodePenjualan" placeholder="Kode Penjualan" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tglPenjualan">Tanggal Penjualan</label>
                                                    <input type="date" class="form-control" id="tglPenjualan" placeholder="Tanggal Penjualan">
                                                </div>
                                                <div class="form-group">
                                                    <label for="totalBayar">Total Bayar</label>
                                                    <input type="number" class="form-control" id="totalBayar" placeholder="Total Bayar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header bg-gray">
                                        <button class="btn btn-md btn-block btn-primary col-sm-1" style="float: right;" disabled><i class="fa fa-save"></i> Simpan</button>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Satuan</th>
                                                    <th>Harga</th>
                                                    <th>Jumlah</th>
                                                    <th>Total Harga</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" align="center"><strong>Sub Total</strong></td>
                                                    <td colspan="2" align="right"><strong>0000000</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header bg-gray">
                                        Data Barang
                                    </div>
                                    <div class="card-body">
                                        <table id="tableDataBarang" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Penjualan</th>
                                                <th>Tgl Penjualan</th>
                                                <th>Item</th>
                                                <th>Total Penjualan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="databarang">
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Penjualan</th>
                                                <th>Tgl Penjualan</th>
                                                <th>Item</th>
                                                <th>Total Penjualan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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

    <?php $this->load->view('Template/DataTablesJS') ?>

    <script type="text/javascript">

        $(function() {
            displayData()
            $("#tableDataBarang").DataTable({
                "responsive": true,
                // "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["excel", "pdf"],
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
                                    <a href="#" class="btn btn-sm btn-warning" style="color: white;"><i class="fas fa-download"></i> Proses</a>
                                </td>
                            </tr>`;
                    }
                    $('#databarang').html(row);
                }
            })
        }
    </script>
</body>

</html>