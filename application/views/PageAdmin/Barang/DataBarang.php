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
                                <li class="breadcrumb-item">Barang</li>
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
                                    <!-- <a href="<?= base_url()?>Admin/Barang/TambahDataBarang" class="btn btn-sm btn-primary" style="float: right; margin-left: 1%;"><i class="fas fa-plus-square"></i>&nbsp;&nbsp; Tambah Barang</a>       -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div style="overflow-y: auto;">
                                        <table id="tableDataBarang" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Pembelian</th>
                                                    <th>Kode Masuk</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Satuan</th>
                                                    <th>Tgl Masuk Gudang</th>
                                                    <th>Harga Jual Awal</th>
                                                    <th>Harga Jual Sekarang</th>
                                                    <th>Harga Beli</th>
                                                    <th>Stok</th>
                                                </tr>
                                            </thead>
                                            <tbody id="dataBarang">
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Pembelian</th>
                                                    <th>Kode Masuk</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Satuan</th>
                                                    <th>Tgl Masuk Gudang</th>
                                                    <th>Harga Jual Awal</th>
                                                    <th>Harga Jual Sekarang</th>
                                                    <th>Harga Beli</th>
                                                    <th>Stok</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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
                url: "<?= base_url('Admin/Barang/DataBarang/getDataStokBarang') ?>",
                dataType: "json",
                async: false,
                success: function(data) {
                    console.log(data);
                    let row = '';
                    for (let i = 0; i < data.length; i++) {
                        row += `<tr>
                                    <td>`+ (i + 1) +`</td>                                    
                                    <td>`+ data[i].kd_pembelian +`</td>
                                    <td>`+ data[i].kd_gudang +`</td>
                                    <td>`+ data[i].kd_barang +`</td>
                                    <td>`+ data[i].nama_barang +`</td>
                                    <td>`+ data[i].satuan +`</td>
                                    <td>`+ data[i].tgl_masuk_barang +`</td>
                                    <td>`+ data[i].harga_jual_start +`</td>                                    
                                    <td>`+ data[i].harga_jual_now +`</td>                                    
                                    <td>`+ data[i].harga_beli +`</td>                                    
                                    <td>`+ data[i].stok +`</td>                                    
                                </tr>`;
                    }
                    $('#dataBarang').html(row);
                }
            })
        }

        function validateHapus(a)
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
            });
        }
    </script>

</body>

</html>