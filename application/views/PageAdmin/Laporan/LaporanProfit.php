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
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="far fa-calendar-alt"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control float-right" id="reservation">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-sm btn-primary" style="float: left;" id="cariByTgl"><i class="fas fa-search"></i> Proses</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" id="tableDataProvit">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Penjualan</th>
                                                <th>Tgl Penjualan</th>
                                                <th>Kode Gudang</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Satuan</th>
                                                <th>Qty</th>
                                                <th>Harga Beli</th>
                                                <th>Harga Jual</th>
                                                <th>Profit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dataProvit">
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
                </div>
                <!-- /.container-fluid -->
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
            if (sessionStorage.getItem("tglProDari") && sessionStorage.getItem("tglProSampai")) {
                displayData()
                $("#reservation").val(sessionStorage.getItem("tglProDari") + ' - ' + sessionStorage.getItem("tglProSampai"))

                sessionStorage.removeItem("tglProDari")
                sessionStorage.removeItem("tglProSampai")
            }
            let dateStart = moment();

            $("#tableDataProvit").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "order": [],
                "buttons": [{
                        extend: 'excelHtml5',
                        footer: true,
                        autoFilter: true
                    },
                    {
                        extend: 'pdfHtml5',
                        footer: true
                    }
                ],
                "pageLength": 30
            }).buttons().container().appendTo('#tableDataProvit_wrapper .col-md-6:eq(0)');

            $('#reservation').daterangepicker({
                "locale": {
                    format: 'DD/MM/YYYY',
                    cancelLabel: 'Clear'
                },
                "maxDate": dateStart
            });

            $("#cariByTgl").click(function() {
                let rangeTgl = $("#reservation").val()

                let tglAwal = rangeTgl.split(' - ')[0]
                let tglAkhir = rangeTgl.split(' - ')[1]

                sessionStorage.setItem("tglProDari", tglAwal)
                sessionStorage.setItem("tglProSampai", tglAkhir)

                window.location.reload()
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

        function displayData() {
            let tglAwal = sessionStorage.getItem("tglProDari")
            let tglAkhir = sessionStorage.getItem("tglProSampai")

            if (tglAwal == '' || tglAkhir == '') {
                Toast.fire({
                    icon: 'danger',
                    title: 'Berhasil Simpan Provit Barang!'
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Admin/Laporan/LaporanProfit/GetDataProfit') ?>",
                    data: {
                        awal: tglAwal,
                        akhir: tglAkhir
                    },
                    dataType: "json",
                    async: false,
                    success: function(data) {
                        var kdPenjualan = row = '';
                        let no = 1;
                        let indexTotal = [];
                        let sumQty = 0,
                            sumHrgBli = 0,
                            sumHrgJl = 0,
                            sumProvit = 0;
                        let totalQty = 0,
                            totHrgBli = 0,
                            totHrgJl = 0,
                            totProvit = 0;

                        // get sub total
                        arryTot = [];
                        data.forEach(function(a) {
                            if (!this[a.kodepen]) {
                                this[a.kodepen] = {
                                    kd_beli: a.kodepen,
                                    totalHrgBli: 0,
                                    totalHrgJl: 0,
                                    totalProvit: 0,
                                    totalQty: 0
                                };
                                arryTot.push(this[a.kodepen]);
                            }
                            this[a.kodepen].totalHrgBli += parseInt(a.harga_beli);
                            this[a.kodepen].totalHrgJl += parseInt(a.hrgjual);
                            this[a.kodepen].totalProvit += parseInt(a.provit);
                            this[a.kodepen].totalQty += parseInt(a.qty);
                        }, Object.create(null));

                        //get index total
                        for (let i = 0; i < data.length; i++) {
                            if (kdPenjualan != data[i].kodepen) {
                                if (i != 0) {
                                    indexTotal.push(i - 1)
                                }
                                if (i == data.length - 1) {
                                    indexTotal.push(i)
                                }
                                kdPenjualan = data[i].kodepen
                            } else {
                                if (i == data.length - 1) {
                                    indexTotal.push(i)
                                }
                                kdPenjualan = data[i].kodepen
                            }
                        }

                        kdPenjualan = '';

                        for (let i = 0; i < data.length; i++) {
                            let kodePen = data[i].kodepen
                            let date = new Date(data[i].tglpen);
                            let tglPen = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
                            let kodeGdg = data[i].kodegdg
                            let kd_barang = data[i].kd_barang
                            let namaBrg = data[i].namabrg
                            let satuan = data[i].satuan
                            let qty = data[i].qty
                            let total = data[i].total
                            let totQty = data[i].totqty
                            let harga_beli = data[i].harga_beli
                            let hrgJual = data[i].hrgjual
                            let provit = data[i].provit

                            for (let j = 0; j < arryTot.length; j++) {
                                if (arryTot[j].kd_beli == kodePen) {
                                    totHrgBli = parseInt(arryTot[j].totalHrgBli)
                                    totHrgJl = parseInt(arryTot[j].totalHrgJl)
                                    totProvit = parseInt(arryTot[j].totalProvit)

                                    rowTotal = `<tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td style="text-align:right"><b>Total</b></td>
                                                    <td><b>` + totQty + `</b></td>
                                                    <td><b>` + formatRupiah(totHrgBli.toString(), '') + `</b></td>
                                                    <td><b>` + formatRupiah(totHrgJl.toString(), '') + `</b></td>
                                                    <td><b>` + formatRupiah(totProvit.toString(), '') + `</b></td>
                                                </tr>`;
                                }
                            }

                            if (kdPenjualan != kodePen) {
                                //header Provit
                                row += `<tr>
                                            <td><b>` + no + `</b></td>
                                            <td><b>` + kodePen + `</b></td>
                                            <td><b>` + tglPen + `</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                  
                                            <td></td>                                  
                                            <td></td>                                  
                                        </tr>`;
                                no++;
                                kdPenjualan = kodePen;
                            }

                            //detailProvit
                            row += `<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>` + kodeGdg + `</td>
                                        <td>` + kd_barang + `</td>
                                        <td>` + namaBrg + `</td>
                                        <td>` + satuan + `</td>
                                        <td>` + formatRupiah(qty, '') + `</td>                                            
                                        <td>` + formatRupiah(harga_beli, '') + `</td>                                            
                                        <td>` + formatRupiah(hrgJual, '') + `</td>
                                        <td>` + formatRupiah(provit, '') + `</td>
                                    </tr>`;

                            sumHrgBli += parseInt(harga_beli)
                            sumHrgJl += parseInt(hrgJual)
                            sumProvit += parseInt(provit)

                            if (indexTotal.includes(i)) { //sub total
                                row += rowTotal;
                                sumQty += parseInt(totQty)
                                sumHrgBli = sumHrgBli
                                sumHrgJl = sumHrgJl
                                sumProvit = sumProvit
                            }
                        }
                        rowGrand = `<tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th style="text-align:right">Grand Total</th>
                                        <th>` + formatRupiah(sumQty.toString(), '') + `</th>
                                        <th>` + formatRupiah(sumHrgBli.toString(), '') + `</th>
                                        <th>` + formatRupiah(sumHrgJl.toString(), '') + `</th>
                                        <th>` + formatRupiah(sumProvit.toString(), '') + `</th>
                                    </tr>`;

                        $('#dataProvit').html(row);
                        $('#subTotal').html(rowGrand);
                    }
                })
            }
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