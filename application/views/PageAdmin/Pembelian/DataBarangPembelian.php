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
                                <li class="breadcrumb-item">Pembelian</li>
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
                                    <div class="col-md-3">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Pembelian</h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="formDatBarang">
                                                    <div class="form-group">
                                                        <label for="kd_pembelian">Kode Pembelian</label>
                                                        <input type="text" class="form-control" id="kd_pembelian" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tglBeli">Tanggal Pembelian</label>
                                                        <input type="text" class="form-control" id="tglBeli" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nm_supplier">Supplier</label>
                                                        <input type="text" class="form-control" id="nm_supplier" readonly>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-sm btn-info" type="button" onclick="btnrRturn()"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">Daftar Barang</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped" id="formDataDetail">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Barang</th>
                                                            <th>Satuan</th>
                                                            <th>Harga</th>
                                                            <th>Status</th>
                                                            <th>Total Harga</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="dataDetail">
                                                    </tbody>
                                                    <tfoot id="dataTotal">
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
    <!-- ./wrapper -->

    <div class="modal fade" id="modal-kirimBarang" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="overlay-wrapper">
                <span id="loadingKirim"></span>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Kirim Barang Ke Gudang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="formMasuk">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="qtyBeli_br">Quantity Pembelian</label>
                                <input type="number" class="form-control" name="qtyBeli_br" id="qtyBeli_br" disabled>
                                <input type="hidden" id="id_detail_br">
                            </div>
                            <div class="form-group">
                                <label for="qtyBeli_to_gd">Quantity Masuk Gudang</label>
                                <input type="number" class="form-control" name="qtyBeli_to_gd" id="qtyBeli_to_gd" autocomplete="off" placeholder="Masukkan Quantity">
                            </div>
                            <div class="form-group">
                                <label for="tglGudangTerima">Tanggal</label>
                                <input type="text" class="form-control datetimepicker-input" name="tglGudangTerima" id="tglGudangTerima" data-toggle="datetimepicker" data-target="#datetimepicker5" placeholder="dd-mm-yyyy">
                            </div>
                            <div class="form-group">
                                <label for="remarkGudangTerima">Deskripsi <span style="font-size: 11px;">(Opsional)</span></label>
                                <textarea class="form-control" name="remarkGudangTerima" id="remarkGudangTerima" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" id="closeSendBarang" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Close</button>
                            <button type="submit" class="btn btn-sm btn-primary" id="sendBarang"><i class="fas fa-share"></i>&nbsp;&nbsp;Send</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-batalBarang" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-md">
            <div class="overlay-wrapper">
                <span id="loadingBatal"></span>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Barang Batal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" id="formBatal">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="qtyBeli_btl">Quantity Pembelian</label>
                                <input type="number" class="form-control" name="qtyBeli_btl" id="qtyBeli_btl" readonly>
                                <input type="hidden" id="id_detail_btl">
                            </div>
                            <div class="form-group">
                                <label for="qtyBatal">Quantity Batal</label>
                                <input type="number" class="form-control" name="qtyBatal" id="qtyBatal" autocomplete="off" placeholder="Masukkan Quantity" required>
                            </div>
                            <div class="form-group">
                                <label for="tglGudangBatal">Tanggal</label>
                                <input type="text" class="form-control datetimepicker-input" id="tglGudangBatal" data-toggle="datetimepicker" data-target="#datetimepicker5" />
                            </div>
                            <div class="form-group">
                                <label for="remarkBatal">Deskripsi <span style="font-size: 11px;">(Opsional)</span></label>
                                <textarea class="form-control" name="remarkBatal" id="remarkBatal" placeholder="Masukkan Deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-sm btn-default" id="closeBtlBarang" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Close</button>
                            <button type="submit" class="btn btn-sm btn-primary" id="btlBarang"><i class="fas fa-share"></i>&nbsp;&nbsp;Send</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('Template/DataTablesJS') ?>

    <script type="text/javascript">
        $(function() {
            displayData()
            masterDbeli()

            let dateStart = moment();

            $('#tglGudangTerima').datetimepicker({
                format: 'DD-MM-YYYY',
                maxDate: dateStart
            });

            $('#tglGudangBatal').datetimepicker({
                format: 'DD-MM-YYYY',
                maxDate: dateStart
            });

            $("#formDataDetail").DataTable({
                "responsive": true,
                "autoWidth": false,
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            });

        });

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

        function btnrRturn() {
            sessionStorage.removeItem("kd_pembelian");
            location.href = "<?= base_url('Admin/Pembelian/DataPembelian') ?>";
        }

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

        function masterDbeli() {
            let kd_pembelian = sessionStorage.getItem("kd_pembelian");
            $.ajax({
                type: "post",
                data: {
                    kd_pembelian: kd_pembelian
                },
                url: "<?= base_url('Admin/Pembelian/DataBarangPembelian/getMaster') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    var tgl_pembelian = "";

                    if (dt[0].tgl_pembelian != "") {
                        var date = new Date(dt[0].tgl_pembelian);
                        var tgl_pembelian = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
                    }

                    $("#kd_pembelian").val(dt[0].kd_pembelian);
                    $("#tglBeli").val(tgl_pembelian);
                    $("#nm_supplier").val(dt[0].nama_supplier);
                }
            })
        }

        function displayData() {
            let kd_pembelian = sessionStorage.getItem("kd_pembelian");
            $.ajax({
                type: "POST",
                data: {
                    kd_pembelian: kd_pembelian
                },
                url: "<?= base_url('Admin/Pembelian/DataBarangPembelian/GetDetailPembelian') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt);
                    let row = rows = "";
                    let sum = 0;
                    for (let i = 0; i < dt.length; i++) {
                        if (dt[i].qty_sisa == '0') {
                            btnHide = "disabled";
                        } else {
                            btnHide = "";
                        }

                        row += `<tr>
                                    <td>` + (i + 1) + `</td>
                                    <td>` + dt[i].nama_barang + `</td>
                                    <td>` + dt[i].satuan + `</td>
                                    <td>` + formatRupiah(dt[i].harga_beli, '') + `</td>
                                    <td style="width: 30%;">`;
                        if (dt[i].status_beli == '0') {
                            row += `<span class="badge badge-info">Pengiriman</span>`;
                        }
                        if (dt[i].status_beli == '1') {
                            row += `<span class="badge badge-warning">Masih ada sisa</span>`;
                        }
                        if (dt[i].status_beli == '2') {
                            row += `<span class="badge badge-success">Terpenuhi</span>`;
                        }
                        if (dt[i].status_beli == '3') {
                            row += `<span class="badge badge-warning">Cancel sebagian</span>`;
                        }
                        if (dt[i].status_beli == '4') {
                            row += `<span class="badge badge-danger">Cancel</span>`;
                        }
                        if (dt[i].status_beli == '5') {
                            row += `<span class="badge badge-warning">Masih ada sisa dan cancel sebagian</span>`;
                        }

                        row += `&nbsp;[` + dt[i].qty + `/` + dt[i].qty_gudang + `/` + dt[i].qty_batal + `/` + dt[i].qty_sisa + `]&nbsp;<button type="button" class="btn btn-xs btn-default" data-toggle="popover" title="Rincian Quantity" data-content="Qty Beli = ` + dt[i].qty + `<br> Qty Gudang = ` + dt[i].qty_gudang + `<br> Qty Batal = ` + dt[i].qty_batal + `<br> Qty Sisa = ` + dt[i].qty_sisa + `" data-trigger="focus" onclick="showInfoQty(this)"><i class="fas fa-info-circle"></i></button>`;

                        row += `</td>
                                    <td>Rp.` + formatRupiah(dt[i].total, '') + `</td>
                                    <td style="width: 15%; text-align: center;">
                                        <button type="button" class="btn btn-xs btn-success" ` + btnHide + ` onclick="getQtyBeli('` + dt[i].id_detail + `')" data-toggle="modal" data-target="#modal-kirimBarang"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Terima</button>&nbsp;
                                        <button type="button" class="btn btn-xs btn-danger" ` + btnHide + ` onclick="getQtyBeli('` + dt[i].id_detail + `')" data-toggle="modal" data-target="#modal-batalBarang"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Cancel</button>
                                    </td>
                                </tr>`;
                        sum += parseInt(dt[i].total);
                    }
                    rows += `<tr>
                                <th colspan="5" style="text-align: right;"><strong>Sub Total</strong></th>
                                <th colspan="2" style="text-align: left;"><strong>Rp.` + formatRupiah(sum.toString(), '') + `</strong></th>
                            </tr>`;
                    $('#dataDetail').html(row);
                    $('#dataTotal').html(rows);
                }
            });
        }

        function getQtyBeli(id_detail) {
            $.ajax({
                type: "post",
                data: {
                    id_detail: id_detail
                },
                url: "<?= base_url('Admin/Pembelian/DataBarangPembelian/GetQtyBli') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt[0].qty_sisa);
                    $("#qtyBeli_br").val(dt[0].qty_sisa);
                    $("#id_detail_br").val(dt[0].id_detail);
                    $("#qtyBeli_btl").val(dt[0].qty_sisa);
                    $("#id_detail_btl").val(dt[0].id_detail);

                    let qtySisa = parseInt(dt[0].qty_sisa);

                    $("#formMasuk").validate({
                        rules: {
                            qtyBeli_to_gd: {
                                required: true,
                                min: 1,
                                max: qtySisa
                            },
                            tglGudangTerima: {
                                required: true,
                                date: true
                            },
                            remarkGudangTerima: "required",
                        },
                        messages: {
                            qtyBeli_to_gd: {
                                required: "Quantity Masuk Gudang Tidak Boleh Kosong",
                                min: "Harus Mengisi Mulai dari Angka 1",
                                max: "Jangan Melebihi Quantity Pembelian " + qtySisa
                            },
                            tglGudangTerima: {
                                required: "Tanggal Tidak Boleh Kosong",
                                date: "Harus menginputkan tanggal"
                            },
                            remarkGudangTerima: "Deskripsi Tidak Boleh Kosong",
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
                            let id_detail_br = $("#id_detail_br").val();
                            let qtyBeli_to_gd = $("#qtyBeli_to_gd").val();
                            let tglGudangTerima = $("#tglGudangTerima").val();
                            let remarkGudangTerima = $("#remarkGudangTerima").val();

                            $.ajax({
                                type: "POST",
                                data: {
                                    id_detail_br: id_detail_br,
                                    qtyBeli_to_gd: qtyBeli_to_gd,
                                    tglGudangTerima: tglGudangTerima,
                                    remarkGudangTerima: remarkGudangTerima
                                },
                                url: "<?= base_url('Admin/Pembelian/DataBarangPembelian/insertGudang') ?>",
                                dataType: "JSON",
                                beforeSend: function() {
                                    $("#sendBarang").prop("disabled", true);
                                    $("#closeSendBarang").prop("disabled", true);

                                    var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
                                    $("#loadingKirim").html(loading);
                                },
                                success: function(hasil) {
                                    console.log(hasil);
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Berhasil Simpan Pembelian Barang!'
                                    });
                                    setInterval(function() {
                                        location.reload();
                                    }, 3000);
                                }
                            });
                        }
                    });

                    $("#formBatal").validate({
                        rules: {
                            qtyBatal: {
                                required: true,
                                min: 1,
                                max: qtySisa
                            },
                            tglGudangBatal: "required",
                            remarkBatal: "required",
                        },
                        messages: {
                            qtyBatal: {
                                required: "Quantity Masuk Gudang Tidak Boleh Kosong",
                                min: "Harus Mengisi Mulai dari Angka 1",
                                max: "Jangan Melebihi Quantity Pembelian " + qtySisa
                            },
                            tglGudangBatal: "Tanggal Tidak Boleh Kosong",
                            remarkBatal: "Deskripsi Tidak Boleh Kosong",
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
                            let id_detail_btl = $("#id_detail_btl").val();
                            let qtyBatal = $("#qtyBatal").val();
                            let tglGudangBatal = $("#tglGudangBatal").val();
                            let remarkBatal = $("#remarkBatal").val();

                            $.ajax({
                                type: "POST",
                                data: {
                                    id_detail_btl: id_detail_btl,
                                    qtyBatal: qtyBatal,
                                    tglGudangBatal: tglGudangBatal,
                                    remarkBatal: remarkBatal
                                },
                                url: "<?= base_url('Admin/Pembelian/DataBarangPembelian/batalGudang') ?>",
                                dataType: "JSON",
                                beforeSend: function() {
                                    $("#btlBarang").prop("disabled", true);
                                    $("#closeBtlBarang").prop("disabled", true);

                                    var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
                                    $("#loadingBatal").html(loading);
                                },
                                success: function(hasil) {
                                    console.log(hasil);
                                    Toast.fire({
                                        icon: 'success',
                                        title: 'Berhasil Cencel Pembelian Barang!'
                                    });
                                    setInterval(function() {
                                        location.reload();
                                    }, 3000);
                                }
                            });
                        }
                    });
                }
            })

        }
    </script>

</body>

</html>