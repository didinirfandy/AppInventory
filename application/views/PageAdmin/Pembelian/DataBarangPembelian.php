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
                                    <div class="col-md-4">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Barang</h3>
                                            </div>
                                            <div class="card-body">
                                                <form action="" method="post" id="formDatBarang">
                                                    <div class="form-group">
                                                        <label for="kd_pembelian">Kode Pembelian</label>
                                                        <input type="text" class="form-control" id="kd_pembelian" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tglBeli">Tanggal Pembelian</label>
                                                        <input type="text" class="form-control" id="tglBeli" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nm_supplier">Supplier</label>
                                                        <input type="text" class="form-control" id="nm_supplier" disabled>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-sm btn-info" type="button" onclick="btnrRturn()"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Pembelian dan Supplier</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped" id="formDataDetail">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Barang</th>
                                                            <th>Satuan</th>
                                                            <th>Harga</th>
                                                            <th>Qty</th>
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

    <div class="modal fade" id="modal-kirimBarang">
        <div class="modal-dialog modal-md">
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
                            <input type="number" class="form-control" name="qtyBeli_to_gd" id="qtyBeli_to_gd" placeholder="Masukkan Quantity">
                        </div>
                        <div class="form-group">
                            <label for="tglGudangTerima">Tanggal</label>
                            <input type="text" class="form-control datetimepicker-input" name="tglGudangTerima" id="tglGudangTerima" data-toggle="datetimepicker" data-target="#datetimepicker5" placeholder="dd-mm-yyyy">
                        </div>
                        <div class="form-group">
                            <label for="remarkGudangTerima">Deskripsi</label>
                            <textarea class="form-control" name="remarkGudangTerima" id="remarkGudangTerima"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Close</button>
                        <button type="submit" class="btn btn-primary" id="sendBarang"><i class="fas fa-share"></i>&nbsp;&nbsp;Send</button>
                    </div>
                </form>
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
                <form method="post" id="formBatal">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="qtyBeli_btl">Quantity Pembelian</label>
                            <input type="text" class="form-control" name="qtyBeli_btl" id="qtyBeli_btl" disabled>
                            <input type="hidden" id="id_detail_btl">
                        </div>
                        <div class="form-group">
                            <label for="qtyBatal">Quantity Batal</label>
                            <input type="text" name="qtyBatal" class="form-control" id="qtyBatal">
                        </div>
                        <div class="form-group">
                            <label for="tglGudangBatal">Tanggal</label>
                            <input type="text" class="form-control datetimepicker-input" id="tglGudangBatal" data-toggle="datetimepicker" data-target="#datetimepicker5" />
                        </div>
                        <div class="form-group">
                            <label for="remarkBatal">Deskripsi</label>
                            <textarea class="form-control" name="remarkBatal" id="remarkBatal"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fas fa-times"></i>&nbsp;&nbsp;Close</button>
                        <button type="submit" class="btn btn-primary" id="btlBarang"><i class="fas fa-share"></i>&nbsp;&nbsp;Send</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
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

            $("#formMasuk").validate({
                rules: {
                    qtyBeli_to_gd: {
                        required: true,
                    },
                    tglGudangTerima: {
                        required: true,
                        date: true
                    },
                    remarkGudangTerima: {
                        required: true,
                    },
                },
                messages: {
                    qtyBeli_to_gd: {
                        required: "Quantity Masuk Gudang Tidak Boleh Kosong",
                    },
                    tglGudangTerima: {
                        required: "Tanggal Tidak Boleh Kosong",
                    },
                    remarkGudangTerima: {
                        required: "Deskripsi Tidak Boleh Kosong",
                    },
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
                            $("#simpanBarang").addClass('disabled');
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
                url: "<?= base_url('Admin/Pembelian/DataBarangPembelian/GetData') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt);
                    let row = rows = '';
                    let sum = 0;
                    for (let i = 0; i < dt.length; i++) {
                        row += `<tr>
                                    <td>` + (i + 1) + `</td>
                                    <td>` + dt[i].nama_barang + `</td>
                                    <td>` + dt[i].satuan + `</td>
                                    <td>` + formatRupiah(dt[i].harga_beli, '') + `</td>
                                    <td>` + dt[i].qty_sisa + `&nbsp;<button type="button" class="btn btn-xs btn-default" data-toggle="popover" title="Rincian Quantity" data-content="Qty Beli = ` + dt[i].qty + ` <br> Qty Gudang = ` + dt[i].qty_gudang + ` <br> Qty Batal = ` + dt[i].qty_batal + `" data-trigger="focus" onclick="showInfoQty(this)"><i class="fas fa-info-circle"></i></button></td>
                                    <td>`;
                        if (dt[i].status_pembelian == '0') {
                            row += `<span class="badge badge-info">Pembelian</span>`;
                        } else if (dt[i].status_pembelian == '1') {
                            row += `<span class="badge badge-warning">Masih Ada Sisa</span>`;
                        } else if (dt[i].status_pembelian == '2') {
                            row += `<span class="badge badge-success">Terpenuhi</span>`;
                        } else {
                            row += `<span class="badge badge-danger">Batal</span>`;
                        }
                        row += `</td>
                                    <td>` + formatRupiah(dt[i].total, '') + `</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-success" onclick="getQtyBeli('` + dt[i].id_detail + `')" data-toggle="modal" data-target="#modal-kirimBarang"><i class="fas fa-plus-square"></i>&nbsp;&nbsp;Terima</button>
                                        <button type="button" class="btn btn-xs btn-danger" onclick="getQtyBeli('` + dt[i].id_detail + `')" data-toggle="modal" data-target="#modal-batalBarang"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Batal</button>
                                    </td>
                                </tr>`;
                        sum += parseInt(dt[i].total);
                    }
                    rows += `<tr>
                                <th colspan="6" style="text-align: right;"><strong>Sub Total</strong></th>
                                <th colspan="2" style="text-align: left;"><strong>` + formatRupiah(sum.toString(), '') + `</strong></th>
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
                    console.log(dt);
                    $("#qtyBeli_br").val(dt[0].qty);
                    $("#id_detail_br").val(dt[0].id_detail);
                    $("#qtyBeli_btl").val(dt[0].qty);
                    $("#id_detail_btl").val(dt[0].id_detail);
                }
            })

        }
    </script>

</body>

</html>