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
                                <div class="row mb-3" >
                                    <div class="col-12">                                        
                                        <button class="btn btn-sm btn-info" id="btnCetakNota" style="float: right;"><i class="fas fa-print"></i>&nbsp;&nbsp;&nbsp;Cetak Nota</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="card card-primary">
                                            <div class="card-header">
                                                <h3 class="card-title">Barang</h3>
                                            </div>
                                            <form method="post" id="formDataBarang">
                                                <div class="card-body">
                                                    <div class="form-group">
                                                        <label for="kodePenjualan">Kode Penjualan</label>
                                                        <input type="text" class="form-control" id="kodePenjualan" name="kodePenjualan" disabled value="">
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
                                                <table class="table table-bordered table-striped" id="tblJualBarang">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Barang</th>
                                                            <th>Satuan</th>
                                                            <th>Harga</th>
                                                            <th>Quantity</th>
                                                            <th>Total Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="barangJual">
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Barang</th>
                                                            <th>Satuan</th>
                                                            <th>Harga</th>
                                                            <th>Quantity</th>
                                                            <th>Total Harga</th>
                                                        </tr>
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
            masterDjual()
            displayDetail() 
            $("#tblJualBarang").DataTable({
                "responsive": true,
                "autoWidth": false,
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            });

            $("#btnCetakNota").click(function(){
                let kd_penjualan = sessionStorage.getItem("kd_penjualan");
                // window.open("<?= base_url()?>Admin/Penjualan/DetailDataPenjualan/cetakNotaPenjualan?kdJual="+kd_penjualan, "_blank");
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

        function btnrRturn() {
            sessionStorage.removeItem("kd_pembelian");
            sessionStorage.removeItem("kd_penjualan");
            location.href = "<?= base_url('Admin/Penjualan/DataPenjualan') ?>";
        }

        function masterDjual() {
            let kd_penjualan = sessionStorage.getItem("kd_penjualan");
            $.ajax({
                type: "post",
                data: {
                    kd_penjualan: kd_penjualan
                },
                url: "<?= base_url('Admin/Penjualan/DetailDataPenjualan/getMaster') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    var tgl_penjualan = "";

                    if (dt[0].tgl_penjualan != "") {
                        var date = new Date(dt[0].tgl_penjualan);
                        var tgl_penjualan = ("00" + date.getDate()).slice(-2) + "-" + ("00" + (date.getMonth() + 1)).slice(-2) + "-" + date.getFullYear();
                    }

                    let bayar     = dt[0].bayar
                    let totalPenj = dt[0].total_penjualan
                    let kembalian = bayar - totalPenj
                        kembalian = kembalian.toString()
                    $("#kembalianBelanja").val(formatRupiah(kembalian, ''))

                    $("#kodePenjualan").val(dt[0].kd_penjualan);
                    $("#tglBeli").val(tgl_penjualan);
                    $("#namaPelanggan").val(dt[0].nama_pelanggan);
                    $("#alamatPelanggan").val(dt[0].alamat_tujuan);
                    $("#hargaTot").val(formatRupiah(totalPenj, ''));
                    $("#bayarBelanja").val(formatRupiah(bayar, ''));
                }
            })
        }

        function displayDetail() {
            let kd_penjualan = sessionStorage.getItem("kd_penjualan");
            $.ajax({
                type: "post",
                data: {
                    kd_penjualan: kd_penjualan
                },
                url: "<?= base_url('Admin/Penjualan/DetailDataPenjualan/getDetailPenjualan') ?>",
                dataType: "json",
                async: false,
                success: function(dt) {
                    let row = ''
                    for (let i = 0; i < dt.length; i++) {
                        row += `
                            <tr>
                                <td>`+ (i + 1) +`</td>
                                <td>`+ dt[i].nama_barang +`</td>
                                <td>`+ dt[i].satuan +`</td>
                                <td>`+ dt[i].harga +`</td>
                                <td>`+ dt[i].qty +`</td>
                                <td>`+ dt[i].total +`</td>
                            </tr>
                        `;
                    }
                    $("#barangJual").html(row)
                }
            })
        }
    </script>

</body>

</html>