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
                                <!-- <div class="card-header">
                                    <button type="button" id="kirimGudang" class="btn btn-sm btn-success" style="float: right; margin-left: 1%;" disabled><i class="fas fa-arrow-right"></i>&nbsp;&nbsp; Kirim Ke Gudang</button>      
                                </div> -->
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableDataBarang" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pembelian</th>
                                                <th>Nama Barang</th>
                                                <th>Satuan</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Quantity</th>
                                                <th>Tgk Beli</th>
                                                <th>Tgk Jual</th>
                                            </tr>
                                        </thead>
                                        <tbody id="databarang">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pembelian</th>
                                                <th>Nama Barang</th>
                                                <th>Satuan</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Quantity</th>
                                                <th>Tgk Beli</th>
                                                <th>Tgk Jual</th>
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
                url: "<?= base_url('Admin/Pembelian/DataBarangPembelian/GetData') ?>",
                dataType: "json",
                async: false,
                success: function(data) {
                    console.log(data);
                    let row = '';
                    for (let i = 0; i < data.length; i++) {
                        row += `<tr> 
                                    <td>` + (i + 1) + `</td> 
                                    <td>` + data[i].kd_pembelian + `</td>
                                    <td>` + data[i].nama_barang_beli + `</td>
                                    <td>` + data[i].satuan + `</td>
                                    <td>` + data[i].harga_beli + `</td>
                                    <td>` + data[i].item + `</td>
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