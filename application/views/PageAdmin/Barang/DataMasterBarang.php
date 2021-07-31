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
                                    <button type="button" class="btn btn-sm btn-primary" id="tambahDataMasterBarang" data-toggle="modal" data-target="#modal-barang" style="float: right; margin-left: 1%;"><i class="fas fa-plus-square"></i>&nbsp;&nbsp; Tambah Barang</button>      
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableDataBarang" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
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

    <!-- Modal Kode Barang -->
    <div class="modal fade" id="modal-barang">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formDatSupplier">
                        <div class="row">
                            <select name="optTambah" class="form-control col-lg-5" id="optTambah">
                                <!-- <option value="pcs">PCS</option>
                                <option value="lsn">Lusin</option>
                                <option value="dus">Dus</option> -->
                            </select>
                        </div><br>
                        <div class="form-group">
                            <label for="kodeHeader">Barang Header</label>
                            <input type="hidden" class="form-control" id="idSupp" placeholder="idSupp" value="">
                            <div class="row">
                                <input type="text" class="form-control col-lg-5" id="kodeHeader" name="kodeHeader" placeholder="Kode Header Barang" value="" readonly>
                                &nbsp;&nbsp;&nbsp;
                                <input type="text" class="form-control col-lg-6" id="namaHeader" name="namaHeader" placeholder="Nama Header Barang" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="kodeDetail">Barang Detail</label>
                            <input type="hidden" class="form-control" id="idSupp" placeholder="idSupp" value="">
                            <div class="row">
                                <input type="text" class="form-control col-lg-5" id="kodeDetail" name="kodeDetail[]" placeholder="Kode Detail Barang" value="" readonly> &nbsp;&nbsp;&nbsp;
                                <input type="text" class="form-control col-lg-6" id="namaDetail" name="namaDetail[]" placeholder="Nama Detail Barang" value="">
                            </div>
                        </div>
                        <button class="btn btn-sm btn-success">Tambah Detail</button>
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
            displayData()
            $("#tableDataBarang").DataTable({
                "responsive": true,
                // "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "pdf"],
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            }).buttons().container().appendTo('#tableDataBarang_wrapper .col-md-6:eq(0)');

            $("#tambahDataMasterBarang").click(function(){
                displayKodeHeader();
                getNewKodeBarang();
                $('.modal-title').text("Tambah Data Barang");
                $("#modal-barang #namaHeader").focus(); 
            })

            $("#optTambah").change(function(){
                let kodeHeadBrg = $("#optTambah").val()

                if (kodeHeadBrg == '') {
                    getNewKodeBarang();
                }else{
                    getNewKodeBarang(kodeHeadBrg);
                }
            })
        });

        function displayKodeHeader()
        {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Barang/DataMasterBarang/getDataHeaderBarang') ?>",
                dataType: "json",
                async: false,
                success: function(data) {
                    // console.log(data);
                    let row = '<option value="" selected>Tambah Header Baru</option>';
                    for (let i = 0; i < data.length; i++) {

                        row += `<option value="`+ data[i].kode +`">`+ data[i].kode +` `+ data[i].nama_barang +`</option>`;
                    }
                    $('#optTambah').html(row);
                }
            })
        }

        function getNewKodeBarang(kodeHead = '')
        {  
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Barang/DataMasterBarang/getNewKodeBrg') ?>",
                data: {kode : kodeHead},
                dataType: "json",
                async: false,
                success: function(data) {
                    // console.log(data);
                    $("#kodeHeader").val(data.kodeHeader);
                    $("#kodeDetail").val(data.kodeDetail);
                }
            })
            
        }

        function displayData() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Barang/DataMasterBarang/getDataBarang') ?>",
                dataType: "json",
                async: false,
                success: function(data) {
                    // console.log(data);
                    let row = '';
                    for (let i = 0; i < data.length; i++) {
                        let kode = data[i].kode;
                        let subKode = data[i].sub_kode
                        row += `<tr>
                                    <td>`+ (i + 1) +`</td>                                    
                                    <td>`+ kode +``+ subKode +`</td>
                                    <td>`+ data[i].nama_barang +`</td>
                                    <td>
                                        <a href="#" class="btn bt-sm btn-primary"><i class="fas fa-edit"></i> Edit</a>
                                        <button class="btn bt-sm btn-danger" id="hapusData" onClick="validateHapus('`+ data[i].id_kd_barang +`')"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </td>
                                </tr>`;
                    }
                    $('#databarang').html(row);
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
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Admin/Barang/DataMasterBarang/deleteMasterBarang') ?>",
                        data: {id : a},
                        dataType: "json",
                        async: false,
                        success: function(data) {
                            if (data) {                                
                                Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                                )
                            }
                            displayData()
                        }
                    })
                }
            });
        }
    </script>

</body>

</html>