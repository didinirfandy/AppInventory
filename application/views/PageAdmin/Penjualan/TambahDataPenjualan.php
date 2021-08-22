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
                            <h1 class="m-0"><?= $title ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item">Penjualan</li>
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
                                            <form method="post" id="formDataBarang">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="kodePembelian">Kode Penjualan</label>
                                                        <input type="hidden" class="form-control" id="kodeGudang" name="kodeGudang" disabled value="">
                                                        <input type="text" class="form-control" id="kodePembelian" name="kodePembelian" disabled value="<?= $getKdJual; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tglJual">Tanggal Penjualan</label>
                                                        <input type="text" class="form-control datetimepicker-input" id="tglJual" name="tglJual" data-toggle="datetimepicker" data-target="#datetimepicker5" placeholder="dd-mm-yyyy" readonly required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kdBarang">Kode Barang</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="kdBarang" name="kdBarang" placeholder="Kode Barang" autocomplete="off" disabled required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-sm btn-default" type="button" data-toggle="modal" data-target="#modal-kodeBarang" id="modalStockBrg" style="float: left;"><i class="fas fa-ellipsis-v"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nmBarang">Nama Barang</label>
                                                        <textarea class="form-control" id="nmBarang" name="nmBarang" rows="2" placeholder="Nama Barang" disabled required></textarea>
                                                        <input type="hidden" class="form-control" id="hrgBeli" name="hrgBeli" placeholder="Masukkan Harga" autocomplete="off" required readonly>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="qtyBeli">Quantity</label>
                                                                <input type="number" class="form-control" id="qtyBeli" name="qtyBeli" placeholder="Masukkan Quantity" min="1" max="1000" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="satuan">Satuan</label>
                                                                <!-- <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan" autocomplete="off" required> -->
                                                                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" readonly required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="form-group">
                                                        <label for="hrgBeli">Harga</label>
                                                        <input type="text" class="form-control" id="hrgBeli" name="hrgBeli" placeholder="Masukkan Harga" autocomplete="off" required>
                                                    </div> -->
                                                </div>
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-sm btn-primary" id="tmbDataPembelian"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card card-secondary">
                                            <div class="card-header">
                                                <h3 class="card-title">Penjualan Barang</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped" id="beliBarang">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Barang</th>
                                                            <th>Satuan</th>
                                                            <th>Harga</th>
                                                            <th>Quantity</th>
                                                            <th>Total Harga</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="bliBarang">
                                                    </tbody>
                                                    <tfoot id="subTotal">
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="card-footer">
                                                <input type="hidden" id="getSubTotal">
                                                <div class="row">
                                                    <div class="col-6"></div>
                                                    <div class="col-3">
                                                        <label for="hargaTot">Harga Total</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="hargaTot" id="hargaTot" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"></div>
                                                    <div class="col-3">
                                                        <label for="bayarBelanja">Bayar</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="bayarBelanja" id="bayarBelanja" require>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6"></div>
                                                    <div class="col-3">
                                                        <label for="kembalianBelanja">Kembalian</label>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" name="kembalianBelanja" id="kembalianBelanja" readonly require>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-success" id="simpan" data-toggle="modal" data-target="#modal-simpan" style="float: right"><i class="fas fa-save"></i>&nbsp;&nbsp;Simpan</button>
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

    <!-- Modal Kode Barang -->
    <div class="modal fade" id="modal-kodeBarang">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Daftar Kode Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered table-striped" id="kodeBarang">
                        <thead>
                            <th>No</th>
                            <th>Kode Gudang</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="datakode">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal-simpan" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Simpan Daftar Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="formSimpanBarang">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="namaPelanggan">Nama Pelanggan</label>
                            <input type="text" class="form-control" name="namaPelanggan" id="namaPelanggan" value="" require>
                        </div>
                        <div class="form-group">
                            <label for="alamatPelanggan">Alamat Pelanggan</label>
                            <textarea name="alamatPelanggan" class="form-control" id="alamatPelanggan" require></textarea>
                        </div>
                        <input type="text" style="display: none;" name="kdPembelian" value="<?= $getKdJual; ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Close</button>
                        <button type="submit" class="btn btn-primary" id="simpanBarang"><i class="fa fa-save"></i> Ok</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php $this->load->view('Template/DataTablesJS') ?>

    <script type="text/javascript">
        $(function() {
            let dateStart = moment();

            $('#tglJual').datetimepicker({
                format: 'DD-MM-YYYY',
                maxDate: dateStart
            });

            $("#tglJual").attr('readonly', 'true');

            displayBeliBarang()
            displayKodeBarang()

            $("#formDataBarang").validate({
                rules: {
                    qtyBeli: {
                        required: true,
                        min: 1,
                        max: 1000
                    },
                    kdBarang: {
                        required: true
                    },
                    nmBarang: {
                        required: true
                    }
                    // ,
                    // satuan: {
                    //     required: true,
                    // },
                    // hrgBeli: {
                    //     required: true,
                    // },
                },
                messages: {
                    qtyBeli: {
                        required: "Quantity Tidak Boleh Kosong",
                    },
                    kdBarang: {
                        required: "Kode Barang Tidak Boleh Kosong"
                    },
                    nmBarang: {
                        required: "Nama Barang Tidak Boleh Kosong"
                    }
                    // ,
                    // satuan: {
                    //     required: "Satuan Tidak Boleh Kosong",
                    // },
                    // hrgBeli: {
                    //     required: "Harga Tidak Boleh Kosong"
                    // },
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
                    let kodeGudang = $("#kodeGudang").val();
                    let kodePembelian = $("#kodePembelian").val();
                    let kdBarang = $("#kdBarang").val();
                    let nmBarang = $("#nmBarang").val();
                    let qtyBeli = $("#qtyBeli").val();
                    let satuan = $("#satuan").val();
                    let hrgBeli = $("#hrgBeli").val();

                    console.log("kodeGudang : " + kodeGudang);
                    console.log("kodePembelian : " + kodePembelian);
                    // console.log("nmBarang : " + nmBarang);

                    if (kdBarang == "" && nmBarang == "") {
                        toastr.error('Kode barang dan nama barang harus di pilih!')
                    } else {
                        $.ajax({
                            type: "POST",
                            data: {
                                kodeGudang: kodeGudang,
                                kdBarang: kdBarang,
                                qtyBeli: qtyBeli,
                            },
                            url: "<?= base_url('Admin/Penjualan/TambahDataPenjualan/getStockGudang') ?>",
                            dataType: "JSON",
                            success: function(hasil) {
                                if (hasil < 0) {
                                    toastr.error('Quantity Melebihi Stock!')
                                } else {
                                    $.ajax({
                                        type: "POST",
                                        data: {
                                            kodeGudang: kodeGudang,
                                            kodePembelian: kodePembelian,
                                            kdBarang: kdBarang,
                                            nmBarang: nmBarang,
                                            satuan: satuan,
                                            qtyBeli: qtyBeli,
                                            hrgBeli: hrgBeli,
                                        },
                                        url: "<?= base_url('Admin/Penjualan/TambahDataPenjualan/insertDataDetail') ?>",
                                        dataType: "JSON",
                                        success: function(data) {
                                            displayBeliBarang();
                                            $('#kodeGudang').val("");
                                            $('#kdBarang').val("");
                                            $('#nmBarang').val("");
                                            $('#qtyBeli').val("");
                                            $('#satuan').val("");
                                            $('#hrgBeli').val("");
                                        }
                                    });
                                }
                            }
                        });
                    }

                    return false;
                }
            });

            $("#formSimpanBarang").validate({
                rules: {
                    namaPelanggan: {
                        required: true
                    },
                    alamatPelanggan: {
                        required: true,
                    }
                    // ,
                    // remark: {
                    //     required: true,
                    // },
                },
                messages: {
                    namaPelanggan: {
                        required: "Nama pelanggan Tidak Boleh Kosong",
                    },
                    alamatPelanggan: {
                        required: "Alamat pelanggan Tidak Boleh Kosong",
                    }
                    // ,
                    // remark: {
                    //     required: "Remark Tidak Boleh Kosong",
                    // },
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
                    let kodeBeli = "<?= $getKdJual; ?>";
                    let tglBeli = $("#tglJual").val();
                    let namaPelanggan = $("#namaPelanggan").val();
                    let alamatPelanggan = $("#alamatPelanggan").val();
                    let subTotal = $("#getSubTotal").val();
                    let bayar = $("#bayarBelanja").val();
                    bayar = bayar.replace(/\./g, '')
                    // console.log(tglBeli)
                    $.ajax({
                        type: "POST",
                        data: {
                            kodeBeli: kodeBeli,
                            tglBeli: tglBeli,
                            namaPelanggan: namaPelanggan,
                            alamatPelanggan: alamatPelanggan,
                            subTotal: subTotal,
                            bayar: bayar
                        },
                        url: "<?= base_url('Admin/Penjualan/TambahDataPenjualan/insertDataPenjualan') ?>",
                        dataType: "JSON",
                        beforeSend: function() {
                            $("#simpanBarang").addClass('disabled');
                        },
                        success: function(hasil) {
                            // console.log(hasil);
                            Toast.fire({
                                icon: 'success',
                                title: 'Berhasil Simpan Penjualan Barang!'
                            });
                            window.open("DetailDataPenjualan/cetakNotaPenjualan?kdJual=" + kodeBeli, "_blank");
                            setInterval(function() {
                                location.reload();
                            }, 3000);
                        }
                    });
                }
            });

            $("#beliBarang").DataTable({
                "responsive": true,
                "autoWidth": false,
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            });

            $("#kodeBarang").DataTable({
                "responsive": true,
                "autoWidth": false,
                "lengthMenu": [10, 15, 20, 30, 50, 100],
            });

            $("#hrgBeli").keyup(function() {
                angka = formatRupiah($(this).val(), '');
                $(this).val(angka);
            });

            $("#bayarBelanja").keyup(function() {
                let hargaTot = $("#getSubTotal").val() || '0'
                let bayar = $(this).val() || '0'
                bayar = bayar.replace(/\./g, '')
                let kembalian = bayar - hargaTot
                kembalian = kembalian.toString()
                $("#kembalianBelanja").val(formatRupiah(kembalian, ''))

                angka = formatRupiah($(this).val(), '');
                $(this).val(angka);

                if (kembalian >= 0) {
                    $("#simpan").removeClass("disabled");
                    $("#simpan").attr("data-toggle", "modal");
                } else {
                    $("#simpan").addClass("disabled");
                    $("#simpan").removeAttr("data-toggle");
                }
            });

            $("#modalStockBrg").click(function() {
                displayKodeBarang()
            })

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
        })

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/\./g, '').toString(),
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

        function displayBeliBarang() {
            let kodeJual = "<?= $getKdJual; ?>";
            let bayar = $("#bayarBelanja").val()
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Penjualan/TambahDataPenjualan/GetJualBarang') ?>",
                data: {
                    kode_penjualan: kodeJual
                },
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt);
                    if (!dt) {
                        $("#simpan").addClass("disabled");
                        $("#simpan").removeAttr("data-toggle");
                    } else {
                        if (bayar != "" || bayar > 0) {
                            $("#simpan").removeClass("disabled");
                            $("#simpan").attr("data-toggle", "modal");
                        } else {
                            $("#simpan").addClass("disabled");
                            $("#simpan").removeAttr("data-toggle");
                        }
                    }

                    let row = rows = '';
                    let sum = 0;
                    for (let i = 0; i < dt.length; i++) {

                        row += `<tr>
                                    <td>` + (i + 1) + `</td>
                                    <td>` + dt[i].nama_barang + `</td>
                                    <td>` + dt[i].satuan + `</td>
                                    <td>` + formatRupiah(dt[i].harga, '') + `</td>
                                    <td>` + dt[i].qty + `</td>
                                    <td>` + formatRupiah(dt[i].total, '') + `</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-danger" onclick="delPembelian('` + dt[i].id_tem_penjualan + `','` + dt[i].kd_gudang + `','` + dt[i].kd_barang + `','` + dt[i].qty + `')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Hapus</button>
                                    </td>
                                </tr>`;

                        sum += parseInt(dt[i].total);

                    }

                    $("#getSubTotal").val(sum);
                    $("#hargaTot").val(formatRupiah(sum.toString(), ''));

                    // rows += `<tr>
                    //             <th colspan="5" style="text-align: right;"><strong>Sub Total</strong></th>
                    //             <th colspan="2" style="text-align: left;"><strong>` + formatRupiah(sum.toString(), '') + `</strong></th>
                    //         </tr>`;
                    $('#bliBarang').html(row);
                    // $('#subTotal').html(rows);
                }
            });
            return false;
        }

        function displayKodeBarang() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Penjualan/TambahDataPenjualan/GetKodeBarang') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt);
                    let row = '';
                    for (let i = 0; i < dt.length; i++) {
                        let hargaNow = formatRupiah(dt[i].harga_jual_now);

                        row += '<tr>' +
                            '<td>' + (i + 1) + '</td>' +
                            '<td>' + dt[i].kd_gudang + '</td>' +
                            '<td>' + dt[i].kd_barang + '</td>' +
                            '<td>' + dt[i].nama_barang + '</td>' +
                            '<td>' + dt[i].qty + '</td>' +
                            '<td>' + dt[i].satuan + '</td>' +
                            '<td>' + hargaNow + '</td>' +
                            '<td style="text-align: center;"><button type="submit" class="btn btn-sm btn-success" onclick="getDisplayData(\'' + dt[i].kd_gudang + '\', \'' + dt[i].nama_barang + '\', \'' + dt[i].kd_barang + '\', \'' + dt[i].qty + '\', \'' + dt[i].satuan + '\', \'' + hargaNow + '\')"><i class="fa fa-plus"></i></button></td>' +
                            '</tr>';
                    }
                    $('#datakode').html(row);
                }
            });
            return false;
        }

        function delPembelian(id_tem, kd_gudang, kd_barang, qty) {
            $.ajax({
                type: "POST",
                data: {
                    id_tem: id_tem,
                    kd_gudang: kd_gudang,
                    kd_barang: kd_barang,
                    qtyTemp: qty
                },
                url: "<?= base_url('Admin/Penjualan/TambahDataPenjualan/delDetailPenjualan'); ?>",
                dataType: "JSON",
                success: function(a) {
                    Toast.fire({
                        icon: 'success',
                        title: 'Berhasil Hapus Pembelian Barang!'
                    });
                    displayBeliBarang()
                }
            });
        }

        function getDisplayData(kode_gudang, nama_barang, kode_barang, qty, satuan, hrgJual) {
            $("#kdBarang").val(kode_barang);
            $("#nmBarang").val(nama_barang);
            $("#kodeGudang").val(kode_gudang);
            $("#hrgBeli").val(hrgJual);
            $("#satuan").val(satuan);

            $("#modal-kodeBarang").modal("hide");
        }
    </script>

</body>

</html>