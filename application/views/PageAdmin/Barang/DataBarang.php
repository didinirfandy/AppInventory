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
                            <h1 class="m-0"><?= $title; ?></h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item">Barang</li>
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
                                <div class="card-body">
                                    <table class="table table-bordered table-striped" id="tableDataBarang">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Pembelian</th>
                                                <th>Kode Gudang</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Satuan</th>
                                                <th>Tgl Masuk Gudang</th>
                                                <th>Harga Jual Awal</th>
                                                <th>Harga Jual Sekarang</th>
                                                <th>Harga Beli</th>
                                                <th>Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody id="dataBarang">
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
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

    <!-- Modal Kode Barang -->
    <div class="modal fade" id="modal-timeline">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span class="oi oi-graph"></span> Timeline Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline" id="isiTimeLine"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-timelineHarga">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><span class="oi oi-tags"></span> Timeline Harga Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- The time line -->
                            <div class="timeline" id="isiTimeLineHarga"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Close</button>
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
                "pageLength": 10
            }).buttons().container().appendTo('#tableDataBarang_wrapper .col-md-6:eq(0)');
        });

        function removeDetail() {
            let indexDetailBrg = $('.brgPersen').length - 1
            $(".newDetail-" + indexDetailBrg).remove()
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

        function getTheMonth(num) {
            if (num == 0) return 'Januari';
            else if (num == 1) return 'Februari';
            else if (num == 2) return 'Maret';
            else if (num == 3) return 'April';
            else if (num == 4) return 'Mei';
            else if (num == 5) return 'Juni';
            else if (num == 6) return 'Juli';
            else if (num == 7) return 'Agustus';
            else if (num == 8) return 'September';
            else if (num == 9) return 'Oktober';
            else if (num == 10) return 'November';
            else if (num == 11) return 'Desember';
        }

        function displayData() {
            $.ajax({
                type: "post",
                url: "<?= base_url('Admin/Barang/DataBarang/getDataStokBarang') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    let row = '';
                    for (let i = 0; i < dt.length; i++) {
                        if (dt[i].tgl_masuk_gudang != "") {
                            var date = new Date(dt[i].tgl_masuk_gudang);
                            var tgl_masuk_gudang = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear() + " " +
                                ("00" + date.getHours()).slice(-2) + ":" + ("00" + date.getMinutes()).slice(-2) + ":" + ("00" + date.getSeconds()).slice(-2);
                        } else {
                            tgl_masuk_gudang = "";
                        }

                        row += `<tr>
                                    <td>` + (i + 1) + `</td>                                    
                                    <td><a style="color: #0470db; cursor: pointer;" onclick="getkode('` + dt[i].kd_pembelian + `', '` + dt[i].kd_barang + `');" data-toggle="modal" data-target="#modal-timeline">` + dt[i].kd_pembelian + `</a></td>
                                    <td><a style="color: #0470db; cursor: pointer;" onclick="getHarga('` + dt[i].kd_gudang + `');" data-toggle="modal" data-target="#modal-timelineHarga">` + dt[i].kd_gudang + `</a>` + `</td>
                                    <td>` + dt[i].kd_barang + `</td>
                                    <td>` + dt[i].nama_barang + `</td>
                                    <td>` + dt[i].satuan + `</td>
                                    <td>` + tgl_masuk_gudang + `</td>
                                    <td>` + formatRupiah(dt[i].harga_jual_start, '') + `</td>                                    
                                    <td>` + formatRupiah(dt[i].harga_jual_now, '') + `</td>                                    
                                    <td>` + formatRupiah(dt[i].harga_beli, '') + `</td>                                    
                                    <td>` + dt[i].qty + `</td> 
                                    </tr>`;
                    }
                    $('#dataBarang').html(row);
                }
            })
        }

        function editPersenBrg(kdGudang, kdBarang) {
            $("#modal-editPersentase").modal('show');
        }

        function getkode(kd_pembelian, kd_barang) {
            $.ajax({
                type: "post",
                data: {
                    kd_pembelian: kd_pembelian,
                    kd_barang: kd_barang
                },
                url: "<?= base_url('Admin/Barang/DataBarang/getDataTimeline') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    let row = warnaTgl = iconList = header = '';
                    for (let i = 0; i < dt.length; i++) {
                        if (dt[i].date_log != "") {
                            var date = new Date(dt[i].date_log);
                            var tgl = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
                            var waktu = ("00" + date.getHours()).slice(-2) + ":" + ("00" + date.getMinutes()).slice(-2) + ":" + ("00" + date.getSeconds()).slice(-2);
                        } else {
                            tgl = "";
                            waktu = "";
                        }

                        if (dt[i].status_log == 0) {
                            warnaTgl = "bg-blue";
                            iconList = '<i class="fas fa-truck-moving bg-blue"></i>';
                            header = "PENGIRIMAN";
                        } else if (dt[i].status_log == 1) {
                            warnaTgl = "bg-yellow";
                            iconList = '<i class="fas fa-boxes bg-yellow"></i>';
                            header = "MASUK GUDANG SEBAGIAN";
                        } else if (dt[i].status_log == 2) {
                            warnaTgl = "bg-green";
                            iconList = '<i class="fas fa-thumbs-up bg-green"></i>';
                            header = "MASUK GUDANG";
                        } else if (dt[i].status_log == 3) {
                            warnaTgl = "bg-red";
                            iconList = '<i class="fas fa-ban bg-red"></i>';
                            header = "CENCEL SEBAGIAN";
                        } else if (dt[i].status_log == 4) {
                            warnaTgl = "bg-red";
                            iconList = '<i class="fas fa-ban bg-red"></i>';
                            header = "CENCEL";
                        } else if (dt[i].status_log == 5) {
                            warnaTgl = "bg-red";
                            iconList = '<i class="fas fa-boxes bg-red"></i>';
                            header = "MASUK GUDANG SEBAGIAN DAN CENCEL SEBAGIAN";
                        } else {
                            warnaTgl = "bg-gray";
                            iconList = '<i class="fas fa-star bg-gray"></i>';
                            header = "&nbsp;&nbsp;&nbsp;";
                        }

                        remark = (dt[i].remark) ? dt[i].remark : "Menunggu Pengiriman .....";

                        row += `<div class="time-label col-md-8">
                                    <span class="` + warnaTgl + `">` + tgl + `</span>
                                </div>
                                <div>
                                    ` + iconList + `
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> ` + waktu + `</span>
                                        <h3 class="timeline-header no-border"><strong>[` + dt[i].kd_pembelian + `]</strong> ` + header + `</h3>
                                        <div class="timeline-body">` + remark + `</div>
                                    </div>
                                </div>`;
                    }

                    row += `<div>
                                <i class="fas fa-play bg-gray"></i>
                            </div>`;


                    $("#isiTimeLine").html(row);
                },
                error: function(jqXHR, textStatus, e) {
                    console.log('fail');
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(e);
                }
            });
        }

        function getHarga(kd_gudang) {
            $.ajax({
                type: "post",
                data: {
                    kd_gudang: kd_gudang
                },
                url: "<?= base_url('Admin/Barang/DataBarang/getDataTimelineHarga') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    let row = warnaTgl = iconList = header = '';
                    var tahun, bulan, nomorBulan, tgl, waktu;
                    for (let i = 0; i < dt.length; i++) {
                        if (dt[i].date_log != "") {
                            var date = new Date(dt[i].date_log);
                            nomorBulan = date.getMonth();
                            tahun = date.getFullYear();
                            bulan = getTheMonth(nomorBulan);
                            // tgl = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
                            waktu = ("00" + date.getHours()).slice(-2) + ":" + ("00" + date.getMinutes()).slice(-2) + ":" + ("00" + date.getSeconds()).slice(-2);
                        }

                        if (dt[i].status_harga == 1) {
                            warnaTgl = "bg-green";
                            iconList = '<i class="fas fa-chart-line ' + warnaTgl + '"></i>';
                            header = "HARGA NAIK";
                        } else if (dt[i].status_harga == 2) {
                            warnaTgl = "bg-yellow";
                            iconList = '<i class="fas fa-percentage ' + warnaTgl + '"></i>';
                            header = "HARGA DISKON";
                        } else if (dt[i].status_harga == 3) {
                            warnaTgl = "bg-red";
                            iconList = '<i class="fas fa-bolt ' + warnaTgl + '"></i>';
                            header = "HARGA FLASH SALE";
                        } else {
                            warnaTgl = "bg-gray";
                            iconList = '<i class="fas fa-star bg-gray"></i>';
                            header = "&nbsp;&nbsp;&nbsp;";
                        }

                        // remark = (dt[i].remark) ? dt[i].remark : "Menunggu Pengiriman .....";

                        row += `<div class="time-label col-md-8">
                                    <span class="` + warnaTgl + `">` + bulan + ` ` + tahun + `</span>
                                </div>
                                <div>
                                    ` + iconList + `
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> ` + waktu + `</span>
                                        <h3 class="timeline-header no-border"><strong>[` + dt[i].kd_gudang + `]</strong> ` + header + `</h3>
                                        <div class="timeline-body"> Rp. ` + formatRupiah(dt[i].harga_now) + `</div>
                                    </div>
                                </div>`;
                    }

                    if (dt != '' || dt != false) {
                        row += `<div>
                                    <i class="fas fa-play bg-gray"></i>
                                </div>`;
                    }


                    $("#isiTimeLineHarga").html(row);
                },
                error: function(jqXHR, textStatus, e) {
                    console.log('fail');
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(e);
                }
            });
        }
    </script>

</body>

</html>