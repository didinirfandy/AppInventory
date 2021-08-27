<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
    <div class="wrapper">

        <!-- Navbar -->
        <?php $this->load->view('Template/Navbar'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php $this->load->view('Template/Sidebar'); ?>

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
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-3 col-5">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><Span id="totPembelian"></Span></h3>

                                    <p>Pembelian</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <a href="#" class="small-box-footer">Access info restricted <i class="fas fa-ban"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-5">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><Span id="totPenjualan"></Span></h3>

                                    <p>Penjualan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="#" class="small-box-footer">Access info restricted <i class="fas fa-ban"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-5">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3><Span id="totSupplier"></Span></h3>

                                    <p>Supplier</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="#" class="small-box-footer">Access info restricted <i class="fas fa-ban"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-5">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><Span id="totBarang"></Span></h3>

                                    <p>Persediaan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="<?= base_url('User/Barang/StockBarang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Grafik Barang
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="barChartBarang" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card -->
                        </section>
                        <!-- /.Left col -->

                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <i class="fas fa-chart-pie mr-1"></i>
                                        Grafik Penjualan
                                    </h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="barChartPenjualan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card -->

                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            <?php
            // echo '<h4 style="margin:0">Session Value</h4>';
            // print_r($this->session->userdata());
            ?>
        </div>
        <!-- /.content-wrapper -->
        <?php $this->load->view('Template/Footer'); ?>
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('Template/Script'); ?>

    <script type="text/javascript">
        $(function() {
            listPenjualan();
            listPembelian();
            listSupplier();
            listBarang();

            chartBarang();
            chartPenjualan();

            let status = "<?= $this->session->flashdata('notif'); ?>";
            if (status) {
                toastr.success(status);
            }

            $('#calendar').datetimepicker({
                format: 'L',
                inline: true
            });
        });

        function getTheMonth(num) {
            if (num == 1) return 'Januari';
            else if (num == 2) return 'Februari';
            else if (num == 3) return 'Maret';
            else if (num == 4) return 'April';
            else if (num == 5) return 'Mei';
            else if (num == 6) return 'Juni';
            else if (num == 7) return 'Juli';
            else if (num == 8) return 'Agustus';
            else if (num == 9) return 'September';
            else if (num == 10) return 'Oktober';
            else if (num == 11) return 'November';
            else if (num == 12) return 'Desember';
        }

        function chartBarang() {
            var getTotBrg = '<?= base_url('Admin/IndexAdmin/getTotBrg') ?>';
            $.getJSON(getTotBrg, function(dt) {
                var bulan = [],
                    dataGd = [],
                    dataGdCel = [];

                for (let i = 0; i < dt.length; i++) {
                    var totGd = dt[i].totGdg;
                    var totGdgCel = dt[i].totGdgCel;
                    var blnGd = getTheMonth(dt[i].mb_bulan);
                    var blnGdcel = getTheMonth(dt[i].mbc_bulan);
                    var mbThn = dt[i].mb_thn;
                    var mbvThn = dt[i].mbv_thn;

                    if (blnGd == blnGdcel) {
                        bulan.push(mbThn + ' / ' + blnGd);
                        dataGd.push(totGd);
                        dataGdCel.push(totGdgCel);
                    } else {
                        bulan.push(mbThn + ' / ' + blnGd);
                        dataGd.push(totGd);
                        dataGdCel.push(totGdgCel);
                    }
                }

                var areaChartDataBrg = {
                    labels: bulan,
                    datasets: [{
                        label: 'Cencel Barang',
                        backgroundColor: 'rgba(209, 105, 105, 1)',
                        borderColor: 'rgba(209, 40, 40, 0.8)',
                        pointRadius: false,
                        pointColor: 'rgba(209, 40, 40, 1)',
                        pointStrokeColor: 'rgb(209, 40, 40, 1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(209, 40, 40, 1)',
                        data: dataGd
                    }, {
                        label: 'Masuk Gudang',
                        backgroundColor: 'rgba(79, 189, 92, 1)',
                        borderColor: 'rgba(16, 201, 38,0.8)',
                        pointRadius: false,
                        pointColor: 'rgba(16, 201, 38,1)',
                        pointStrokeColor: 'rgba(16, 201, 38,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(16, 201, 38,1)',
                        data: dataGdCel
                    }]
                }

                var barChartCanvasBrg = $('#barChartBarang').get(0).getContext('2d')
                var barChartDataBrg = $.extend(true, {}, areaChartDataBrg)
                var temp0Brg = areaChartDataBrg.datasets[0]
                var temp1Brg = areaChartDataBrg.datasets[1]
                barChartDataBrg.datasets[0] = temp1Brg
                barChartDataBrg.datasets[1] = temp0Brg

                var barChartOptionsBrg = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }

                new Chart(barChartCanvasBrg, {
                    type: 'bar',
                    data: barChartDataBrg,
                    options: barChartOptionsBrg
                });
            });
        }

        function chartPenjualan() {
            var getTotBrgJual = '<?= base_url('Admin/IndexAdmin/getTotBrgJual') ?>';
            $.getJSON(getTotBrgJual, function(dt) {
                var bulan = [],
                    dataBeli = [],
                    dataJual = [];

                for (let i = 0; i < dt.length; i++) {
                    // console.log(dt[i])
                    var totBeli = dt[i].totBeli;
                    var totJual = dt[i].totJual;
                    var blBulan = getTheMonth(dt[i].bl_bulan);
                    var jlBulan = getTheMonth(dt[i].jl_bulan);
                    var blThn = dt[i].bl_thn;
                    var jlThn = dt[i].jl_thn;

                    if (blBulan == jlBulan) {
                        bulan.push(blThn + ' / ' + blBulan);
                        dataBeli.push(totBeli);
                        dataJual.push(totJual);
                    } else {
                        bulan.push(blThn + ' / ' + blBulan);
                        // bulan.unshift(jlThn + ' / ' + jlBulan);
                        dataBeli.push(totBeli);
                        dataJual.push(totJual);
                    }
                }

                // console.log(bulan)
                // console.log(dataBeli)
                // console.log(dataJual)

                var areaChartDataPen = {
                    labels: bulan,
                    datasets: [{
                        label: 'Penjualan',
                        backgroundColor: 'rgba(79, 189, 92, 1)',
                        borderColor: 'rgba(16, 201, 38,0.8)',
                        pointRadius: false,
                        pointColor: 'rgba(16, 201, 38,1)',
                        pointStrokeColor: 'rgba(16, 201, 38,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(16, 201, 38,1)',
                        data: dataJual
                    }, {
                        label: 'Pembelian',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: dataBeli
                    }]
                }

                var barChartCanvasPen = $('#barChartPenjualan').get(0).getContext('2d')
                var barChartDataPen = $.extend(true, {}, areaChartDataPen)
                var temp0Pen = areaChartDataPen.datasets[0]
                var temp1Pen = areaChartDataPen.datasets[1]
                barChartDataPen.datasets[0] = temp1Pen
                barChartDataPen.datasets[1] = temp0Pen

                var barChartOptionsPen = {
                    responsive: true,
                    maintainAspectRatio: false,
                    datasetFill: false
                }

                new Chart(barChartCanvasPen, {
                    type: 'bar',
                    data: barChartDataPen,
                    options: barChartOptionsPen
                });
            });
        }

        function listPembelian() {
            $.ajax({
                type: "get",
                url: "<?= base_url('Admin/IndexAdmin/getListPembelian') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt.totBeli);
                    $("#totPembelian").html(dt.totBeli);
                }
            });
        }

        function listPenjualan() {
            $.ajax({
                type: "get",
                url: "<?= base_url('Admin/IndexAdmin/getListPenjualan') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt.totJual);
                    $("#totPenjualan").html(dt.totJual);
                }
            });
        }

        function listSupplier() {
            $.ajax({
                type: "get",
                url: "<?= base_url('Admin/IndexAdmin/getListSupplier') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt.totSupp);
                    $("#totSupplier").html(dt.totSupp);
                }
            });
        }

        function listBarang() {
            $.ajax({
                type: "get",
                url: "<?= base_url('Admin/IndexAdmin/getListBarang') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    // console.log(dt.totBarang);
                    $("#totBarang").html(dt.totBarang);
                }
            });
        }
    </script>

</body>

</html>