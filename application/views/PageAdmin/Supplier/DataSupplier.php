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
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modal-supplier" id="tambahSuppBtn" style="float: right; margin-left: 1%;"><i class="fas fa-plus-square"></i>&nbsp;&nbsp; Tambah Supplier</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableDataSupplier" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Supplier</th>
                                                <th>Nama Supplier</th>
                                                <th>Alamat</th>
                                                <th>Deksripsi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="datasuplier">
                                        </tbody>
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

    <!-- Modal Kode Barang -->
    <div class="modal fade" id="modal-supplier">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Supplier</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formDatSupplier">
                        <div class="form-group" id="kodeSuppCont">
                            <label for="kodeSupplier">Kode Supplier</label>
                            <input type="hidden" class="form-control" id="idSupp" placeholder="idSupp" value="">
                            <input type="text" class="form-control" id="kodeSupplier" placeholder="Kode Supplier" value="">
                        </div>
                        <div class="form-group">
                            <label for="namaSupplier">Nama Supplier</label>
                            <input type="text" class="form-control" id="namaSupplier" placeholder="Nama Supplier" value="">
                        </div>
                        <div class="form-group">
                            <label for="alamatSupplier">Alamat Supplier</label>
                            <input type="text" class="form-control" id="alamatSupplier" placeholder="Alamat Supplier" value="">
                        </div>
                        <div class="form-group">
                            <label for="deskripsiSupp">Deskripsi</label>
                            <textarea name="deskripsiSupp" id="deskripsiSupp" class="form-control" placeholder="Deskripsi Supplier" value=""></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="addSupp" class="btn btn-primary addSupp" style="float: left;"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php $this->load->view('Template/DataTablesJS') ?>

    <script type="text/javascript">
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            displayData()
            $("#tableDataSupplier").DataTable({
                "responsive": true,
                "autoWidth": false,
                "pageLength": 10,
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            }).buttons().container().appendTo('#tableDataSupplier_wrapper .col-md-6:eq(0)');

            $("#tambahSuppBtn").click(function() {
                $("#kodeSuppCont").hide();
                $('.modal-title').text("Tambah Data Supplier");
            })

            $("#addSupp").click(function() {
                let idSupp = $("#idSupp").val();
                let kodeSupp = $("#kodeSupplier").val();
                let namaSupp = $("#namaSupplier").val();
                let alamatSupp = $("#alamatSupplier").val();
                let deskSupp = $("#deskripsiSupp").val();

                if (idSupp == '') { // UNTUK ADD                    
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Admin/Supplier/DataSupplier/tambahSupplier') ?>",
                        data: {
                            namaSupp,
                            alamatSupp,
                            deskSupp
                        },
                        dataType: "json",
                        async: false,
                        success: function(data) {
                            if (data) {
                                $("#kodeSupplier").val('')
                                $("#namaSupplier").val('')
                                $("#alamatSupplier").val('')
                                $("#deskripsiSupp").val('')
                                $("#modal-supplier").modal("hide")
                                displayData()

                                Toast.fire({
                                    icon: 'success',
                                    title: 'Data Supplier Berhasil Disimpan.'
                                })
                            }
                        }
                    })
                } else {
                    //UNTUK EDIT
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Admin/Supplier/DataSupplier/updateSupplier') ?>",
                        data: {
                            kodeSupp,
                            namaSupp,
                            alamatSupp,
                            deskSupp
                        },
                        dataType: "json",
                        async: false,
                        success: function(data) {
                            if (data) {
                                $("#idSupp").val('')
                                $("#kodeSupplier").val('')
                                $("#namaSupplier").val('')
                                $("#alamatSupplier").val('')
                                $("#deskripsiSupp").val('')
                                $("#modal-supplier").modal("hide")
                                displayData()

                                Toast.fire({
                                    icon: 'success',
                                    title: 'Data Supplier Berhasil Disimpan.'
                                })
                            }
                        }
                    })
                }
            });
        });

        function displayData() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Supplier/DataSupplier/getDataSupplier') ?>",
                dataType: "json",
                async: false,
                success: function(data) {
                    // console.log(data);                    
                    let row = '';
                    for (let i = 0; i < data.length; i++) {
                        let deskripsi = data[i].deskripsi == null ? '' : data[i].deskripsi;
                        row += `<tr>
                                    <td>` + (i + 1) + `</td>                                    
                                    <td style="width: 10%">` + data[i].kd_supplier + `</td>
                                    <td>` + data[i].nama_supplier + `</td>
                                    <td>` + data[i].alamat + `</td>
                                    <td>` + deskripsi + `</td>
                                    <td style="width: 10%">
                                        <button class="btn btn-xs btn-primary" name="updateSupp" id="updateSupp" onClick="editSupp('` + data[i].kd_supplier + `')"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-xs btn-danger" type="button" id="hapusData" onClick="validateHapus('` + data[i].kd_supplier + `')"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </td>
                                </tr>`;
                    }
                    $('#datasuplier').html(row);
                }
            })
        }

        function editSupp(a) {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Supplier/DataSupplier/getDataSupplierKode') ?>",
                data: {
                    kode: a
                },
                dataType: "json",
                async: false,
                success: function(data) {
                    // console.log(data.kd_supplier)
                    $("#modal-supplier").modal("show")
                    $('.modal-title').text("Edit Data Supplier");
                    $("#kodeSupplier").prop('readonly', true);
                    $("#idSupp").val(data.id_supplier);
                    $("#kodeSupplier").val(data.kd_supplier)
                    $("#namaSupplier").val(data.nama_supplier)
                    $("#alamatSupplier").val(data.alamat)
                    $("#deskripsiSupp").val(data.deskripsi)
                }
            })
        }

        function validateHapus(a) {
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
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Admin/Supplier/DataSupplier/deleteDataSupplier') ?>",
                        data: {
                            kode: a
                        },
                        dataType: "json",
                        async: false,
                        success: function(data) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            displayData()
                        }
                    })
                }
            });
        }
    </script>

</body>

</html>