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
                            <div class="card">
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
                            <!-- /.card -->
                            <div class="card" id="timeLineBrg">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-sm btn-default" style="float: right; margin-left: 1%;" id="closeTimeline"><i class="fas fa-times"></i>&nbsp;&nbsp;&nbsp;Close</button>
                                            <h2>Timeline Barang</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <!-- Timelime example  -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <!-- The time line -->
                                            <div class="timeline" id="isiTimeLine">
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </div>
                            </div>
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
            displayData()
            $("#timeLineBrg").hide();

            $("#tableDataBarang").DataTable({
                "responsive": true,
                "autoWidth": false,
                "pageLength": 10,
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            });

            // $("#tableDataBarang tbody td").on("click", function() {
            //     $("#timeLineBrg").show()
            // });

            $("#closeTimeline").on("click", function() {
                $("#timeLineBrg").hide();
            })
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

        function displayData() {
            $.ajax({
                type: "post",
                url: "<?= base_url('Admin/Barang/DataBarang/getDataStokBarang') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt);

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
                                    <td><a style="color: #0470db; cursor: pointer;" onclick="getkode('` + dt[i].kd_pembelian + `', '` + dt[i].kd_barang + `');">` + dt[i].kd_pembelian + `</a></td>
                                    <td>` + dt[i].kd_gudang + `</td>
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
                    console.log(dt);

                    let row = '';
                    for (let i = 0; i < dt.length; i++) {
                        if (dt[i].date_log != "") {
                            var date = new Date(dt[i].date_log);
                            var tgl = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
                            var waktu = ("00" + date.getHours()).slice(-2) + ":" + ("00" + date.getMinutes()).slice(-2) + ":" + ("00" + date.getSeconds()).slice(-2);
                        } else {
                            tgl = "";
                            waktu = "";
                        }

                        let warnaTgl = "bg-gray";
                        let iconList = '<i class="fas fa-thumbs-up bg-gray"></i>';
                        let header = "&nbsp;&nbsp;&nbsp;";

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
                        }

                        remark = (dt[i].remark) ? dt[i].remark : "Menunggu Pengiriman .....";

                        row += `<div class="time-label col-md-8">
                                    <span class="` + warnaTgl + `">` + tgl + `</span>
                                </div>
                                <div>
                                    ` + iconList + `
                                    <div class="timeline-item">
                                        <span class="time"><i class="fas fa-clock"></i> ` + waktu + `</span>
                                        <h3 class="timeline-header no-border"><strong>` + header + `</strong></h3>
                                        <div class="timeline-body">` + remark + `</div>
                                    </div>
                                </div>`;
                    }

                    row += `<div>
                                <i class="fas fa-thumbs-up bg-gray"></i>
                            </div>`;


                    $("#isiTimeLine").html(row);
                    $("#timeLineBrg").show();
                },
                error: function(jqXHR, textStatus, e) {
                    console.log('fail');
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(e);
                }
            });
            // $("#timeLineBrg").show();
        }
    </script>

</body>

</html>