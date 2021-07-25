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
                                                <h3 class="card-title">Barang</h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="formDatBarang">
                                                    <div class="form-group">
                                                        <label for="kodePembelian">Kode Pembelian</label>
                                                        <input type="text" class="form-control" id="kodePembelian" placeholder="Kode Pembelian" autocapitalize="off">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tglBeli">Tanggal Beli</label>
                                                        <input type="text" class="form-control" id="tglBeli" placeholder="Tanggal Beli">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="supplierBarang">Supplier</label>
                                                        <input type="text" class="form-control" id="supplierBarang" placeholder="Supplier">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-sm btn-block btn-warning" type="button" id="tmbDataPembelian" style="float: left;"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Pembelian dan Supplier</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered" style="overflow-x: auto;">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Barang</th>
                                                            <th>Satuan</th>
                                                            <th>Harga</th>
                                                            <th>Qty Beli</th>
                                                            <th>Qty Gd</th>
                                                            <th>Status</th>
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
                                                            <td></td>
                                                            <td></td>
                                                            <td>
                                                                <span class="badge badge-primary">Kirim</span>
                                                            </td>
                                                            <td></td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-danger" ><i class="fas fa-trash-alt"></i> Hapus</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th></th>
                                                            <th colspan="6" align="center"><strong>Sub Total</strong></th>
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
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Daftar Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="kodePembelian">Kode Pembelian</label>
                        <input type="text" class="form-control" id="kodePembelian" readonly>
                    </div>
                    <div class="form-group">
                        <label for="tglPembelian">Tanggal Pembelian</label>
                        <input type="date" class="form-control" id="tglPembelian">
                    </div>
                    <div class="form-group">
                        <label for="supplierBarang">Supplier</label>
                        <select name="supplierBarang" class="form-control" id="supplierBarang">
                            <option value="">-- PILIH --</option>
                            <?php
                            foreach ($supplierData as $data) {
                            ?>
                                <option value="<?= $data['kd_supplier']; ?>"><?= $data['nama_supplier']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
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