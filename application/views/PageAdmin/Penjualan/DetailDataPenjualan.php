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
                                                        <input type="text" class="form-control" id="kodePembelian" name="kodePembelian" disabled value="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tglBeli">Tanggal Penjualan</label>
                                                        <input type="text" class="form-control datetimepicker-input" id="tglBeli" name="tglBeli" data-toggle="datetimepicker" data-target="#datetimepicker5" placeholder="dd-mm-yyyy" autocomplete="off" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="namaPelanggan">Nama Pelanggan</label>
                                                        <input type="text" class="form-control" name="namaPelanggan" id="namaPelanggan" value="" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="alamatPelanggan">Alamat Pelanggan</label>
                                                        <textarea name="alamatPelanggan" class="form-control" id="alamatPelanggan" readonly></textarea>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <button class="btn btn-sm btn-info" type="button" onclick="btnrRturn()"><i class="fas fa-arrow-left"></i>&nbsp;&nbsp;Kembali</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card card-primary">
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
                                                            <th>Jumlah</th>
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
                                                            <input type="text" class="form-control" name="bayarBelanja" id="bayarBelanja" readonly>
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
                                                            <input type="text" class="form-control" name="kembalianBelanja" id="kembalianBelanja" readonly>
                                                        </div>
                                                     </div>                                                    
                                                </div> 
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

    <?php $this->load->view('Template/DataTablesJS') ?>

    <script type="text/javascript">
        $(function() {
            displayBeliBarang()
            displayKodeBarang()
            getDataSupplier()

            $("#formDataBarang").validate({
                rules: {
                    qtyBeli: {
                        required: true,
                        min: 1,
                        max: 1000
                    },
                    satuan: {
                        required: true,
                    },
                    hrgBeli: {
                        required: true,
                    },
                },
                messages: {
                    qtyBeli: {
                        required: "Quantity Tidak Boleh Kosong",
                    },
                    satuan: {
                        required: "Satuan Tidak Boleh Kosong",
                    },
                    hrgBeli: {
                        required: "Harga Tidak Boleh Kosong"
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
                    let kodePembelian = $("#kodePembelian").val();
                    let kdBarang = $("#kdBarang").val();
                    let nmBarang = $("#nmBarang").val();
                    let qtyBeli = $("#qtyBeli").val();
                    let satuan = $("#satuan").val();
                    let hrgBeli = $("#hrgBeli").val();

                    console.log("kdBarang : " + kdBarang);
                    console.log("nmBarang : " + nmBarang);

                    if (kdBarang == "" && nmBarang == "") {
                        toastr.error('Kode barang dan nama barang harus di pilih!')
                    } else {
                        $.ajax({
                            type: "POST",
                            data: {
                                kodePembelian: kodePembelian,
                                kdBarang: kdBarang,
                                nmBarang: nmBarang,
                                satuan: satuan,
                                qtyBeli: qtyBeli,
                                hrgBeli: hrgBeli,
                            },
                            url: "<?= base_url('Admin/Pembelian/TambahDataPembelian/insertDataDetail') ?>",
                            dataType: "JSON",
                            success: function(hasil) {
                                displayBeliBarang();
                                $('#kdBarang').val("");
                                $('#nmBarang').val("");
                                $('#qtyBeli').val("");
                                $('#satuan').val("");
                                $('#hrgBeli').val("");
                            }
                        });
                    }

                    return false;
                }
            });

            $("#formSimpanBarang").validate({
                rules: {
                    tglBeli: {
                        required: true,
                        date: true
                    },
                    kdSupplier: {
                        required: true,
                    },
                    remark: {
                        required: true,
                    },
                },
                messages: {
                    tglBeli: {
                        required: "Tanggal Tidak Boleh Kosong",
                    },
                    kdSupplier: {
                        required: "Supplier Tidak Boleh Kosong",
                    },
                    remark: {
                        required: "Remark Tidak Boleh Kosong",
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
                    let kodeBeli = "<?= $getKdBeli; ?>";
                    let tglBeli = $("#tglBeli").val();
                    let kdSupplier = $("#kdSupplier").val();
                    let remark = $("#remark").val();
                    let subTotal = $("#getSubTotal").val();

                    $.ajax({
                        type: "POST",
                        data: {
                            kodeBeli: kodeBeli,
                            tglBeli: tglBeli,
                            kdSupplier: kdSupplier,
                            remark: remark,
                            subTotal: subTotal
                        },
                        url: "<?= base_url('Admin/Pembelian/TambahDataPembelian/insertDataPembelian') ?>",
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

            let endDate = moment();

            //Date picker
            $('#tglBeli').datetimepicker({
                format: 'DD-MM-YYYY',
                maxDate: endDate
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

        function displayBeliBarang() {
            let kodeBeli = "<?= $getKdBeli; ?>";
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Pembelian/TambahDataPembelian/GetBeliBarang') ?>",
                data: {
                    kode_pembelian: kodeBeli
                },
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt);
                    if (!dt) {
                        $("#simpan").addClass("disabled");
                        $("#simpan").removeAttr("data-toggle");
                    } else {
                        $("#simpan").removeClass("disabled");
                        $("#simpan").attr("data-toggle", "modal");
                    }

                    let row = rows = '';
                    let sum = 0;
                    for (let i = 0; i < dt.length; i++) {

                        row += `<tr>
                                    <td>` + (i + 1) + `</td>
                                    <td>` + dt[i].nama + `</td>
                                    <td>` + dt[i].satuan + `</td>
                                    <td>` + formatRupiah(dt[i].harga, '') + `</td>
                                    <td>` + dt[i].qty + `</td>
                                    <td>` + formatRupiah(dt[i].total, '') + `</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-danger" onclick="delPembelian('` + dt[i].id_tem + `')"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Hapus</button>
                                    </td>
                                </tr>`;

                        sum += parseInt(dt[i].total);

                    }

                    $("#getSubTotal").val(sum);

                    rows += `<tr>
                                <th colspan="5" style="text-align: right;"><strong>Sub Total</strong></th>
                                <th colspan="2" style="text-align: left;"><strong>` + formatRupiah(sum.toString(), '') + `</strong></th>
                            </tr>`;
                    $('#bliBarang').html(row);
                    $('#subTotal').html(rows);
                }
            });
            return false;
        }

        function displayKodeBarang() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Pembelian/TambahDataPembelian/GetKodeBarang') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt);
                    let btnAdd = subKode = kode_barang = "";
                    let row = '';
                    for (let i = 0; i < dt.length; i++) {
                        if (dt[i].sub_kode != "*") {
                            subKode = dt[i].sub_kode;
                            kode_barang = dt[i].kode + subKode;
                            btnAdd = '<button type="submit" class="btn btn-sm btn-success" onclick="getDisplayData(\'' + kode_barang + '\', \'' + dt[i].nama_barang + '\')"><i class="fa fa-plus"></i></button>';
                        } else {
                            kode_barang = dt[i].kode;
                            subKode = " ";
                            btnAdd = " ";
                        }

                        row += '<tr>' +
                            '<td>' + (i + 1) + '</td>' +
                            '<td>' + kode_barang + '</td>' +
                            '<td>' + dt[i].nama_barang + '</td>' +
                            '<td style="text-align: center;">' + btnAdd + '</td>' +
                            '</tr>';
                    }
                    $('#datakode').html(row);
                }
            });
            return false;
        }

        function getDataSupplier() {
            $.ajax({
                type: "post",
                url: "<?= base_url('Admin/Pembelian/TambahDataPembelian/GetDataSupplier') ?>",
                async: false,
                dataType: "json",
                success: function(dt) {
                    // console.log(dt);
                    let row = '<option value="">-- PILIH --</option>';
                    for (let i = 0; i < dt.length; i++) {
                        row += '<option value="' + dt[i].kd_supplier + '">' + dt[i].nama_supplier + '</option>';
                    }
                    // console.log(row);
                    $("#kdSupplier").html(row);
                }
            });
            return false;
        }

        function delPembelian(id_tem) {
            $.ajax({
                type: "POST",
                data: "id_tem=" + id_tem,
                url: "<?= base_url('Admin/Pembelian/TambahDataPembelian/delDetailPembelian'); ?>",
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

        function getDisplayData(kode_barang, nama_barang) {
            $("#kdBarang").val(kode_barang);
            $("#nmBarang").val(nama_barang);

            $("#modal-kodeBarang").modal("hide");
        }
    </script>

</body>

</html>