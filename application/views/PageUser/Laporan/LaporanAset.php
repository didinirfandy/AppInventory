<body class="hold-transition sidebar-mini layout-footer-fixed sidebar-collapse">
    <style>
        .buttons-excel {
            margin-right: 5px !important;
            border-radius: 5px !important;
        }

        .buttons-pdf {
            border-radius: 5px !important;
        }
    </style>
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
                                <li class="breadcrumb-item">Laporan</li>
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
                                    <div class="row col-12">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <!-- <label for="tglPenjualanDari">Dari</label> -->
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                    <input type="text" class="form-control float-right" id="reservation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3" style="margin-right: auto;">
                                            <div>
                                                <button type="button" class="btn btn-sm btn-primary" id="cariByTgl"><i class="fas fa-search"></i>&nbsp;&nbsp;Proccess</button>
                                                <button type="button" class="btn btn-sm btn-success" id="cariSemua"><i class="fas fa-search"></i>&nbsp;&nbsp;Semua Data</button>
                                            </div>
                                        </div>
                                        <div class="col-4" style="margin-left: auto;">
                                            <div>
                                                <!-- <a href="" class="btn btn-sm btn-primary" style="float: right;"><i class="fas fa-print"></i> Cetak</a> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableDataPembelian" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Gudang</th>
                                                <th>Kode Barang</th>
                                                <th>Barang</th>
                                                <th>Satuan</th>
                                                <th>Stok</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Aset</th>
                                            </tr>
                                        </thead>
                                        <tbody id="datapembelian">

                                        </tbody>
                                        <tfoot id="subTotal">

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
            if (sessionStorage.getItem("tglPemDari") && sessionStorage.getItem("tglPemSampai")) {
                displayData('')
                $("#reservation").val(sessionStorage.getItem("tglPemDari") + ' - ' + sessionStorage.getItem("tglPemSampai"))
                sessionStorage.removeItem("tglPemDari")
                sessionStorage.removeItem("tglPemSampai")
            }
            if (sessionStorage.getItem("typeBtn")) {
                displayData('all')
                sessionStorage.removeItem("typeBtn")
            }
            let endDate = moment();

            $("#tableDataPembelian").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [],
                "buttons": [{
                        extend: 'excelHtml5',
                        footer: true
                    },
                    {
                        extend: 'pdfHtml5',
                        footer: true
                    }
                ],
                "pageLength": 30,
                // "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            }).buttons().container().appendTo('#tableDataPembelian_wrapper .col-md-6:eq(0)');

            $('#reservation').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY',
                    cancelLabel: 'Clear'
                },
                maxDate: endDate
            })

            $("#cariByTgl").click(function() {
                let rangeTgl = $("#reservation").val()

                let tglAwal = rangeTgl.split(' - ')[0]
                let tglAkhir = rangeTgl.split(' - ')[1]

                sessionStorage.setItem("tglPemDari", tglAwal)
                sessionStorage.setItem("tglPemSampai", tglAkhir)

                window.location.reload()
            })

            $("#cariSemua").click(function() {
                window.location.reload()
                sessionStorage.setItem("typeBtn", "all")
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
        });

        function displayData(type) {
            let tglAwal = sessionStorage.getItem("tglPemDari")
            let tglAkhir = sessionStorage.getItem("tglPemSampai")
            let typeBtn = type

            $.ajax({
                type: "POST",
                url: "<?= base_url('User/Laporan/LaporanAset/GetData') ?>",
                data: {
                    awal: tglAwal,
                    akhir: tglAkhir,
                    typeBtn: typeBtn
                },
                dataType: "json",
                async: false,
                success: function(data) {
                    let row = '';
                    let no = 1;
                    let sumQty = 0,
                        sumHargaBeli = 0,
                        sumHargaJual = 0,
                        sumAset = 0;

                    for (let i = 0; i < data.length; i++) {
                        let kodeGdg = data[i].kd_gudang
                        let kodeBrg = data[i].kd_barang
                        let namaBrg = data[i].nama_barang
                        let satuan = data[i].satuan
                        let qty = data[i].qty
                        let hrgBeli = data[i].harga_beli
                        let hrgJual = data[i].harga_jual_now
                        let asetUser = data[i].aset

                        row += `<tr>
                                    <td>` + no + `</td>
                                    <td>` + kodeGdg + `</td>
                                    <td>` + kodeBrg + `</td>
                                    <td>` + namaBrg + `</td>
                                    <td>` + satuan + `</td>
                                    <td>` + qty + `</td>
                                    <td>` + formatRupiah(hrgBeli.toString(), '') + `</td>
                                    <td>` + formatRupiah(hrgJual.toString(), '') + `</td>
                                    <td>` + formatRupiah(asetUser.toString(), '') + `</td>                                            
                                </tr>`;
                        no++;

                        sumQty += parseInt(qty)
                        sumHargaBeli += parseInt(hrgBeli)
                        sumHargaJual += parseInt(hrgJual)
                        sumAset += parseInt(asetUser)
                    }
                    rowGrand = `<tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td style="text-align:right"><b>Grand Total</b></td>
                                    <td>` + formatRupiah(sumQty.toString(), '') + `</td>
                                    <td>` + formatRupiah(sumHargaBeli.toString(), '') + `</td>
                                    <td>` + formatRupiah(sumHargaJual.toString(), '') + `</td>
                                    <td>` + formatRupiah(sumAset.toString(), '') + `</td>
                                </tr>`;

                    $('#datapembelian').html(row);
                    $('#subTotal').html(rowGrand);
                }
            })
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
    </script>

</body>

</html>