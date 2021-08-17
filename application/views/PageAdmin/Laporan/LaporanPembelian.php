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
                                                <button type="button" class="btn btn-sm btn-primary" id="cariByTgl"><i class="fas fa-search"></i> Proccess</button>
                                                <!-- <button type="button" class="btn btn-sm btn-success" id="cariSemua"><i class="fas fa-search"></i> Semua Data</button> -->
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
                                                <th>Kode Pembelian</th>
                                                <th>Tgl Pembelian</th>
                                                <th>Supplier</th>
                                                <th>Barang</th>
                                                <th width="100px">Satuan</th>
                                                <th>Qty</th>
                                                <th>Harga</th>
                                                <th>Total</th>
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
                displayData()
                $("#reservation").val(sessionStorage.getItem("tglPemDari") + ' - ' + sessionStorage.getItem("tglPemSampai"))

                sessionStorage.removeItem("tglPemDari")
                sessionStorage.removeItem("tglPemSampai")
            }
            let endDate = moment();

            $("#tableDataPembelian").DataTable({
                "responsive": true,
                // "lengthChange": false,
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
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            }).buttons().container().appendTo('#tableDataPembelian_wrapper .col-md-6:eq(0)');

            $('#reservation').daterangepicker({
                locale: {
                    format: 'DD/MM/YYYY'
                }
            })

            $("#cariByTgl").click(function() {
                let rangeTgl = $("#reservation").val()

                let tglAwal = rangeTgl.split(' - ')[0]
                let tglAkhir = rangeTgl.split(' - ')[1]

                sessionStorage.setItem("tglPemDari", tglAwal)
                sessionStorage.setItem("tglPemSampai", tglAkhir)

                window.location.reload()
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

        function displayData() {
            let tglAwal = sessionStorage.getItem("tglPemDari")
            let tglAkhir = sessionStorage.getItem("tglPemSampai")

            if (tglAwal == '' || tglAkhir == '') {
                Toast.fire({
                    icon: 'danger',
                    title: 'Berhasil Simpan Pembelian Barang!'
                });
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Admin/Laporan/LaporanPembelian/GetData') ?>",
                    data: {
                        awal: tglAwal,
                        akhir: tglAkhir
                    },
                    dataType: "json",
                    async: false,
                    success: function(data) {
                        console.log(data);
                        let row = '';
                        let kdPembelian = '';
                        let no = 1;
                        let indexTotal = [];
                        let sumQty = 0,
                            sumHarga = 0,
                            sumTotal = 0;

                        //get index total
                        for (let i = 0; i < data.length; i++) {
                            if (kdPembelian != data[i].kodepem) {
                                if (i != 0) {
                                    indexTotal.push(i - 1)
                                }
                                if (i == data.length - 1) {
                                    indexTotal.push(i)
                                }
                                kdPembelian = data[i].kodepem
                            }
                        }

                        kdPembelian = '';
                        for (let i = 0; i < data.length; i++) {
                            let kodePem = data[i].kodepem
                            let tglPem = data[i].tglpem
                            let supp = data[i].supp
                            let namaBrg = data[i].namabrg
                            let satuan = data[i].satuan
                            let qty = data[i].qty
                            let hrgBeli = data[i].hrgbeli
                            let total = data[i].total
                            let totQty = data[i].totqty
                            let totHarga = data[i].totharga
                            let totTotal = data[i].tottotal

                            rowTotal = `<tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="text-align:right"><b>Total</b></td>
                                                <td><b>` + formatRupiah(totQty, '') + `</b></td>
                                                <td><b>` + formatRupiah(totHarga, '') + `</b></td>
                                                <td><b>` + formatRupiah(totTotal, '') + `</b></td>
                                            </tr>`;

                            if (kdPembelian != kodePem) {

                                //header pembelian
                                row += `<tr>
                                            <td><b>` + no + `</b></td>
                                            <td><b>` + kodePem + `</b></td>
                                            <td><b>` + tglPem + `</b></td>
                                            <td><b>` + supp + `</b></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>                                            
                                        </tr>`;
                                no++;
                                kdPembelian = kodePem
                            }
                            //detailpembelian
                            row += `<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>` + namaBrg + `</td>
                                        <td>` + satuan + `</td>
                                        <td>` + formatRupiah(qty, '') + `</td>                                            
                                        <td>` + formatRupiah(hrgBeli, '') + `</td>
                                        <td>` + formatRupiah(total, '') + `</td>                                            
                                    </tr>`;

                            if (indexTotal.includes(i)) { //sub total
                                row += rowTotal;
                                sumQty += parseInt(totQty)
                                sumHarga += parseInt(totHarga)
                                sumTotal += parseInt(totTotal)
                            }
                        }
                        rowGrand = `<tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="text-align:right"><b>Grand Total</b></td>
                                        <td>` + formatRupiah(sumQty.toString(), '') + `</td>
                                        <td>` + formatRupiah(sumHarga.toString(), '') + `</td>
                                        <td>` + formatRupiah(sumTotal.toString(), '') + `</td>
                                    </tr>`;

                        $('#datapembelian').html(row);
                        $('#subTotal').html(rowGrand);
                        // tableData.ajax.reload()
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