<body class="hold-transition sidebar-mini layout-footer-fixed sidebar-collapse">
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
                                <a href="<?= base_url('Admin/Pembelian/DataPembelian') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <a href="<?= base_url('Admin/Penjualan/DataPenjualan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                <a href="<?= base_url('Admin/Supplier/DataSupplier') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-md-3 col-5">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3><Span id="totBarang"></Span></h3>

                                    <p>Barang</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="<?= base_url('Admin/Barang/DataBarang') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
                                    <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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
                                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
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

            let status = "<?= $this->session->flashdata('notif'); ?>";
            if (status) {
                toastr.success(status);
            }

            $('#calendar').datetimepicker({
                format: 'L',
                inline: true
            });

            //-------------
            //- PIE CHART -
            //-------------

            var donutData = {
                labels: [
                    'Pembelian',
                    'Masuk Gudang',
                    'Cencel Barang',
                    'Penjualan'
                ],
                datasets: [{
                    data: [700, 500, 400, 600],
                    backgroundColor: ['#f39c12', '#00a65a', '#f56954', '#00c0ef'],
                }]
            }
            var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
            var pieData = donutData;
            var pieOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }

            new Chart(pieChartCanvas, {
                type: 'pie',
                data: pieData,
                options: pieOptions
            });


            //-------------
            //- BAR CHART -
            //-------------
            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Pembelian',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Penjualan',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            });
        });

        function listPembelian() {
            $.ajax({
                type: "get",
                url: "<?= base_url('Admin/IndexAdmin/getListPembelian') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    console.log(dt.totBeli);
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
                    console.log(dt.totJual);
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
                    console.log(dt.totSupp);
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
                    console.log(dt.totBarang);
                    $("#totBarang").html(dt.totBarang);
                }
            });
        }
    </script>

</body>

</html>