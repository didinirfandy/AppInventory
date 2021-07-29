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
                                                <form method="post" id="formDataBarang">
                                                    <div class="form-group">
                                                        <label for="kodePembelian">Kode Pembelian</label>
                                                        <input type="text" class="form-control" id="kodePembelian" name="kodePembelian" disabled value="<?= $getKdBeli; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="kdBarang">Kode Barang</label>
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" id="kdBarang" name="kdBarang" placeholder="Kode Barang" autocomplete="off" disabled required>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-sm btn-default" type="button" data-toggle="modal" data-target="#modal-kodeBarang" style="float: left;"><i class="fas fa-ellipsis-v"></i></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nmBarang">Nama Barang</label>
                                                        <textarea class="form-control" id="nmBarang" name="nmBarang" rows="2" placeholder="Nama Barang" disabled required></textarea>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="qtyBeli">Quantity</label>
                                                                <input type="text" class="form-control" id="qtyBeli" name="qtyBeli" placeholder="Masukkan Quantity" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="satuan">Satuan</label>
                                                                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Masukkan Satuan" autocomplete="off" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="hrgBeli">Harga</label>
                                                        <input type="text" class="form-control" id="hrgBeli" name="hrgBeli" placeholder="Masukkan Harga" autocomplete="off">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="card-footer">
                                                <button class="btn btn-sm btn-primary" type="submit" id="tmbDataPembelian"><i class="fas fa-plus"></i>&nbsp;&nbsp;Tambah</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Pembelian Barang</h3>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-striped" id="beliBarang">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Barang</th>
                                                            <th>Satuan</th>
                                                            <th>Harga</th>
                                                            <th>Qty Beli</th>
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
                                                <button type="button" class="btn btn-sm btn-success" id="simpan" data-toggle="modal" data-target="#modal-simpan"><i class="fas fa-save"></i>&nbsp;&nbsp;Simpan</button>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Daftar Kode Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped" id="kodeBarang">
                        <thead>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Action</th>
                        </thead>
                        <tbody id="datakode">
                        </tbody>
                        <tfoot>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Action</th>
                        </tfoot>
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
    <div class="modal fade" id="modal-simpan">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Daftar Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" id="formSimpanBarang">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="tglBeli">Tanggal</label>
                            <input type="text" class="form-control datetimepicker-input" id="tglBeli" name="tglBeli" data-toggle="datetimepicker" data-target="#datetimepicker5" placeholder="dd-mm-yyyy" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="kdSupplier">Supplier</label>
                            <select class="form-control" id="kdSupplier" name="kdSupplier" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="remark">Remark</label>
                            <textarea class="form-control" id="remark" name="remark" rows="2" required></textarea>
                        </div>
                        <input type="text" style="display: none;" name="kdPembelian" value="<?= $getKdBeli; ?>">
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Close</button>
                        <button type="button" class="btn btn-primary" id="simpanBarang"><i class="fa fa-save"></i> Ok</button>
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
            displayBeliBarang()
            displayKodeBarang()
            getDataSupplier()

            endDate = moment();

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
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            });

            $("#hrgBeli").keyup(function() {
                angka = formatRupiah($(this).val(), '');
                $(this).val(angka);
            })

            $("#tmbDataPembelian").click(function() {
                let kodePembelian = $("#kodePembelian").val();
                let kdBarang = $("#kdBarang").val();
                let nmBarang = $("#nmBarang").val();
                let qtyBeli = $("#qtyBeli").val();
                let satuan = $("#satuan").val();
                let hrgBeli = $("#hrgBeli").val();

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
                return false;
            });

            $("#simpanBarang").click(function() {
                let kodeBeli = "<?= $getKdBeli; ?>";
                let tglBeli = $("#tglBeli").val();
                let kdSupplier = $("#kdSupplier").val();
                let remark = $("#remark").val();
                let subTotal = $("#getSubTotal").val();

                // console.log("kodeBeli : " + kodeBeli);
                // console.log("tglBeli : " + tglBeli);
                // console.log("kdSupplier : " + kdSupplier);
                // console.log("remark : " + remark);
                // console.log("subTotal : " + subTotal);

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
                    success: function(hasil) {
                        // console.log(hasil);
                        Toast.fire({
                            icon: 'success',
                            title: 'Berhasil Simpan Pembelian Barang!'
                        });
                        setInterval(function() {
                            location.reload("<?= base_url('Admin/Pembelian/TambahDataPembelian') ?>");
                        }, 5000);
                    }
                });
            });

        });

        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 4000,
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
                    } else {
                        $("#simpan").removeClass("disabled");
                    }

                    let row = rows = '';
                    let sum = 0;
                    for (let i = 0; i < dt.length; i++) {

                        row += `<tr>
                                    <td>` + (i + 1) + `</td>
                                    <td>` + dt[i].nama + `</td>
                                    <td>` + dt[i].satuan + `</td>
                                    <td>` + formatRupiah(dt[i].harga, '') + `</td>
                                    <td>` + dt[i].item + `</td>
                                    <td>` + formatRupiah(dt[i].total, '') + `</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;Hapus</button>
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
                    let subKode = kode_barang = "";
                    let row = '';
                    for (let i = 0; i < dt.length; i++) {
                        if (dt[i].sub_kode != "*") {
                            subKode = dt[i].sub_kode;
                        } else {
                            subKode = " ";
                        }
                        kode_barang = dt[i].kode + subKode;

                        row += '<tr>' +
                            '<td>' + (i + 1) + '</td>' +
                            '<td>' + kode_barang + '</td>' +
                            '<td>' + dt[i].nama_barang + '</td>' +
                            '<td style="text-align: center;">' +
                            '<button type="submit" class="btn btn-sm btn-success" onclick="getDisplayData(\'' + kode_barang + '\', \'' + dt[i].nama_barang + '\')"><i class="fa fa-plus"></i></button>' +
                            '</td>' +
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

        function getDisplayData(kode_barang, nama_barang) {
            $("#kdBarang").val(kode_barang);
            $("#nmBarang").val(nama_barang);

            $("#modal-kodeBarang").modal("hide");
        }
    </script>

</body>

</html>