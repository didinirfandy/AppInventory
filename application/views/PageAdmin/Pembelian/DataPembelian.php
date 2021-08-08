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

    <div class="modal fade" id="modal-cencel" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="overlay-wrapper">
                <span id="loadingCencel"></span>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Barang Cencel</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="formCencelMaster">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="tglcencel">Tanggal</label>
                                <input type="text" class="form-control datetimepicker-input" name="tglcencel" id="tglcencel" data-toggle="datetimepicker" data-target="#datetimepicker5" placeholder="dd-mm-yyyy">
                            </div>
                            <div class="form-group">
                                <label for="remarkCencel">Deskripsi <span style="font-size: 11px;">(Opsional)</span></label>
                                <textarea class="form-control" name="remarkCencel" id="remarkCencel" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" id="closeCencel" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Close</button>
                            <button type="submit" class="btn btn-primary" id="btnCencelSend"><i class="fas fa-share"></i>&nbsp;&nbsp;Send</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php $this->load->view('Template/DataTablesJS') ?>

    <script type="text/javascript">
        $(function() {
            displayData()

            let dateStart = moment();

            $('#tglcencel').datetimepicker({
                format: 'DD-MM-YYYY',
                maxDate: dateStart
            });

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

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        function showInfoQty(obj) {
            $(obj).popover({
                html: true
            });
            $(obj).popover('show');
        }

        function displayData() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Pembelian/DataPembelian/GetData') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt);
                    let row = "";
                    for (let i = 0; i < dt.length; i++) {

                        if (dt[i].tgl_pembelian != "") {
                            var date = new Date(dt[i].tgl_pembelian);
                            var tgl_pembelian = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
                        } else {
                            tgl_pembelian = "";
                        }

                        if (dt[i].qty != dt[i].qty_sisa) {
                            btnHide = "disabled";
                        } else {
                            btnHide = "";
                        }

                        row += `<tr> 
                                <td>` + (i + 1) + `</td>
                                <td>` + dt[i].kd_pembelian + `</td>
                                <td>` + tgl_pembelian + `</td>
                                <td>` + dt[i].nama_supplier + `</td>
                                <td>` + dt[i].qty_sisa + `&nbsp;<button type="button" class="btn btn-xs btn-default" data-toggle="popover" title="Rincian Quantity" data-content="Total Beli = ` + dt[i].qty + ` <br> Total Sisa = ` + dt[i].qty_sisa + `" data-trigger="focus" onclick="showInfoQty(this)"><i class="fas fa-info-circle"></i></button></td>
                                <td>` + formatRupiah(dt[i].total_pembelian, '') + `</td>
                                <td>
                                    <button class="btn btn-xs btn-primary" onclick="openDetail('` + dt[i].kd_pembelian + `')"><i class="fas fa-folder"></i>&nbsp;&nbsp;Detail</button>&nbsp;&nbsp;
                                    <button class="btn btn-xs btn-danger" ` + btnHide + ` onclick="cencelAll('` + dt[i].kd_pembelian + `')" data-toggle="modal" data-target="#modal-cencel"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Cencel</button>
                                </td>
                            </tr>`;
                    }
                    $('#databarang').html(row);
                },
                error: function(jqXHR, textStatus, e) {
                    console.log('fail');
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(e);
                }
            })
        }

        function openDetail(kd_pembelian) {
            if (kd_pembelian) {
                sessionStorage.setItem("kd_pembelian", kd_pembelian);
                location.href = "<?= base_url("Admin/Pembelian/DataBarangPembelian/index") ?>";
            }
        }

        function cencelAll(kd_pembelian) {

            $("#formCencelMaster").validate({
                rules: {
                    tglcencel: "required",
                    remarkCencel: "required",
                },
                messages: {
                    tglcencel: "Tanggal Tidak Boleh Kosong",
                    remarkCencel: "Deskripsi Tidak Boleh Kosong",
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
                submitHandler: function(form) {
                    let tglcencel = $("#tglcencel").val();
                    let remarkCencel = $("#remarkCencel").val();

                    console.log(kd_pembelian);

                    $.ajax({
                        type: "post",
                        data: {
                            kd_pembelian: kd_pembelian,
                            tglcencel: tglcencel,
                            remarkCencel: remarkCencel
                        },
                        url: "<?= base_url('Admin/Pembelian/DataPembelian/CencelPembelian') ?>",
                        dataType: "json",
                        async: false,
                        beforeSend: function() {
                            $("#btnCencelSend").prop("disabled", true);
                            $("#closeCencel").prop("disabled", true);

                            var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
                            $("#loadingCencel").html(loading);
                        },
                        success: function(hasil) {
                            // console.log(hasil);
                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil Cencel Pembelian Barang!'
                            });
                            setInterval(function() {
                                location.reload();
                            }, 3000);
                        },
                        error: function(jqXHR, textStatus, e) {
                            console.log('fail');
                            console.log(jqXHR);
                            console.log(textStatus);
                            console.log(e);
                            $("#btnCencel").prop("disabled", true);
                            $("#closeCencel").prop("disabled", true);

                            var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
                            $("#loadingCencel").html(loading);
                        }
                    });
                }
            });
        }
    </script>

</body>

</html>