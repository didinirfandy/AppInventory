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
                                                        <label for="namaBarang">Nama Barang</label>
                                                        <input type="text" class="form-control" id="namaBarang" placeholder="Nama Barang">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="satuanBarang">Satuan Barang</label>
                                                        <input type="text" class="form-control" id="satuanBarang" placeholder="Satuan Barang">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="hargaBarang">Harga Beli</label>
                                                        <input type="number" class="form-control" id="hargaBarang" placeholder="Harga Beli">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlahBarang">Quantity</label>
                                                        <input type="number" class="form-control" id="jumlahBarang" placeholder="Quantity">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-md btn-primary col-md-3" type="button" id="tmbDataPembelian" ><i class="fas fa-plus-square"></i> Tambah Data</button> 
                                                <button class="btn btn-md btn-success col-md-3" type="button" data-toggle="modal" data-target="#modal-dataBarang"><i class="fas fa-clipboard"></i> Pilih Barang</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Pembelian dan Supplier</h3>
                                            </div>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="kodePembelian">Kode Pembelian</label>
                                                    <input type="text" class="form-control" id="kodePembelian" placeholder="Nama Barang" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tglPembelian">Tanggal Pembelian</label>
                                                    <input type="date" class="form-control" id="tglPembelian" placeholder="Tanggal Barang">
                                                </div>
                                                <div class="form-group">
                                                    <label for="supplierBarang">Supplier</label>
                                                    <select name="supplierBarang" class="form-control" id="supplierBarang">
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
                <table id="tableDataBarang" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="databarang">
                        
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga Jual</th>
                            <th>Harga Beli</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
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