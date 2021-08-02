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
                                    <a class="btn btn-sm btn-primary" href="<?= base_url('Admin/Pembelian/TambahDataPembelian'); ?>" style="float: right; margin-left: 1%;"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah Data</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableDataBarang" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pembelian</th>
                                                <th>Tgl Pembelian</th>
                                                <th>Nama Supplier</th>
                                                <th>Quantity</th>
                                                <th>Total Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="databarang">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pembelian</th>
                                                <th>Tgl Pembelian</th>
                                                <th>Nama Supplier</th>
                                                <th>Quantity</th>
                                                <th>Total Harga</th>
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
                "autoWidth": false,
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            });
        });

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
        }

        function displayData() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Pembelian/DataPembelian/GetData') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt);
                    let row = '';
                    for (let i = 0; i < dt.length; i++) {

                        if (dt[i].tgl_pembelian != "") {
                            var date = new Date(dt[i].tgl_pembelian);
                            var tgl_pembelian = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
                        } else {
                            tgl_pembelian = "";
                        }

                        row += `<tr> 
                                <td>` + (i + 1) + `</td>
                                <td>` + dt[i].kd_pembelian + `</td>
                                <td>` + tgl_pembelian + `</td>
                                <td>` + dt[i].nama_supplier + `</td>
                                <td>` + dt[i].qty + `</td>
                                <td>` + formatRupiah(dt[i].total_pembelian, '') + `</td>
                                <td>
                                    <button class="btn btn-sm btn-primary" onclick="openDetail('` + dt[i].kd_pembelian + `')"><i class="fas fa-search"></i>&nbsp;&nbsp;Detail</button>&nbsp;&nbsp;
                                    <button class="btn btn-sm btn-danger" onclick=""><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Hapus</button>
                                </td>
                            </tr>`;
                    }
                    $('#databarang').html(row);
                }
            })
        }

        function openDetail(kd_pembelian) {
            if (kd_pembelian) {
                sessionStorage.setItem("kd_pembelian", kd_pembelian);
                location.href = "<?= base_url("Admin/Pembelian/DataBarangPembelian/index") ?>";
            }
        }
    </script>

</body>

</html>