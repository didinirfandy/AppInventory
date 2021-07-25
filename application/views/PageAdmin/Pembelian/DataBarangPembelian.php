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
                                    <div class="col-md-4">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Pembelian</h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="formDatBarang">
                                                    <div class="form-group">
                                                        <label for="kodePembelian">Kode Pembelian</label>
                                                        <input type="text" class="form-control" id="kodePembelian" placeholder="Kode Pembelian" autocapitalize="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tglBeli">Tanggal Pembelian</label>
                                                        <input type="text" class="form-control" id="tglBeli" placeholder="Tanggal Beli">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="supplierBarang">Supplier</label>
                                                        <input type="text" class="form-control" id="supplierBarang" placeholder="Supplier">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <a href="<?= base_url('Admin/Pembelian/DataPembelian')?>" class="btn btn-sm btn-block btn-warning" type="button" id="tmbDataPembelian" style="float: left;"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Daftar Barang</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered" style="overflow-x: auto;" id="tableDataBarang">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Barang</th>
                                                            <th>Satuan</th>
                                                            <th>Harga</th>
                                                            <th>Qty Beli</th>
                                                            <th>Total Harga</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody style="overflow-y: auto;">
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><button class="btn btn-sm btn-transparant" rel="popover"><i class="fas fa-info-circle"></i></button></td>
                                                            <td></td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-dataBarang"> Kirim Gudang</button>
                                                                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modal-batalBarang"> Batal</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th></th>
                                                            <th colspan="4" align="center"><strong>Sub Total</strong></th>
                                                            <th colspan="1" align="right"><strong>0000000</strong></th>
                                                            <th></th>
                                                        </tr>
                                                    </tfoot>
                                                </table>
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

    <div class="modal fade" id="modal-dataBarang">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Kirim Barang Ke Gudang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="qtyBeli">Quantity Pembelian</label>
                            <input type="text" name="qtyBeli" class="form-control" id="qtyBeli" readonly>
                        </div>
                        <div class="form-group">
                            <label for="qtyKirim">Quantity Kirim</label>
                            <input type="text" name="qtyKirim" class="form-control" id="qtyKirim">
                        </div>
                        <div class="form-group">
                            <label for="remark">Deskripsi</label>
                            <textarea name="remark" class="form-control" id="remark"></textarea>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Close</button>
                        <button type="submit" class="btn btn-primary" id="sendBarang"><i class="fas fa-share"></i>&nbsp;&nbsp;Send</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-batalBarang">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Barang Batal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="qtyBeli">Quantity Pembelian</label>
                            <input type="text" name="qtyBeli" class="form-control" id="qtyBeli" readonly>
                        </div>
                        <div class="form-group">
                            <label for="qtyKirim">Quantity Batal</label>
                            <input type="text" name="qtyKirim" class="form-control" id="qtyKirim">
                        </div>
                        <div class="form-group">
                            <label for="remark">Deskripsi</label>
                            <textarea name="remark" class="form-control" id="remark"></textarea>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Close</button>
                        <button type="submit" class="btn btn-primary" id="sendBarang"><i class="fas fa-share"></i>&nbsp;&nbsp;Send</button>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('Template/DataTablesJS') ?>

    <script>
        $(function() {
            displayData()
            $("#tableDataBarang").DataTable({
                "responsive": true,
                // "lengthChange": false,
                "autoWidth": false,
                // "buttons": ["excel", "pdf"],
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            }).buttons().container().appendTo('#tableDataBarang_wrapper .col-md-6:eq(0)');

            $('#infoQty').popover({
                placement : 'right',
                html : true,
                delay: { 
                        show: 500, 
                        hide: 500
                },
                title:'old_title',
                content: 'QTY Beli: 0'
            });
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
                                    <td>
                                        <button class="btn bt-sm btn-primary" id="hapusData" onClick="validateHapus(this)"><i class="fas fa-plus-square"></i></button>
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