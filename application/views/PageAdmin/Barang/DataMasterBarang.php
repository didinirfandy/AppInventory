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
                                <div class="card-header">
                                    <button type="button" class="btn btn-sm btn-primary" id="tambahDataMasterBarang" data-toggle="modal" data-target="#modal-barang" style="float: right; margin-left: 1%;"><i class="fas fa-plus-square"></i>&nbsp;&nbsp; Tambah Barang</button>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tableDataBarang" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th style="text-align: center;">Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="databarang">
                                        </tbody>
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

    <!-- Modal Kode Barang -->
    <div class="modal fade" id="modal-barang" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="overlay-wrapper">
                <span id="loadingSImpan"></span>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="formMstrBarang">
                            <div class="row">
                                <select name="optTambah" class="form-control col-lg-6" id="optTambah">
                                </select>
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="kodeHeader">Barang Header</label>
                                        <input type="hidden" class="form-control" id="idSupp" placeholder="idSupp" value="">
                                        <input type="text" class="form-control" id="kodeHeader" name="kodeHeader" placeholder="Kode Header Barang" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="namaHeader">&nbsp;</label>
                                        <input type="text" class="form-control" id="namaHeader" name="namaHeader" placeholder="Nama Header Barang" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="naikHeader">Persentase Barang</label>
                                        <input type="text" class="form-control" id="naikHeader" name="naikHeader" placeholder="Persentase Kenaikan Harga" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="turunHeader">&nbsp;</label>
                                        <input type="text" class="form-control" id="turunHeader" name="turunHeader" placeholder="Persentase Turun Harga" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row detailBrg">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kodeDetail">Barang Detail</label>
                                        <input type="text" class="form-control kodeDetail" name="kodeDetail[]" placeholder="Kode Detail Barang" value="" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="namaDetail">&nbsp;</label>
                                        <input type="text" class="form-control namaDetail" name="namaDetail[]" placeholder="Nama Detail Barang" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="hargaDetail">&nbsp;</label>
                                        <input type="text" class="form-control hargaDetail" name="hargaDetail[]" placeholder="Harga Detail Barang" value="">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <button class="btn btn-sm btn-success" id="multiDetail"><i class="fas fa-plus-square"></i>&nbsp;&nbsp; Tambah Detail</button>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" id="closeAddSupp" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                        <button type="submit" id="addSupp" class="btn btn-sm btn-primary addSupp" style="float: left;"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Modal Kode Barang -->
    <div class="modal fade" id="modal-editBarang" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="overlay-wrapper">
                <span id="loadingEdit"></span>
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Data Barang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" id="formEditBarang">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="kodeBrgEdit">Barang</label>
                                        <input type="text" class="form-control" id="kodeBrgEdit" name="kodeBrgEdit" placeholder="Kode Barang" value="" readonly>
                                        <input type="hidden" class="form-control" name="idBrgEdit" id="idBrgEdit" placeholder="idBrgEdit" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="namaBrgEdit">&nbsp;</label>
                                        <input type="text" class="form-control" id="namaBrgEdit" name="namaBrgEdit" placeholder="Nama Barang" value="">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success" style="    position: absolute; right: 15px;">
                                            <input type="checkbox" class="custom-control-input" id="customSwitch3" name="statusBrgEdit">
                                            <label class="custom-control-label" for="customSwitch3">Status</label>
                                        </div>
                                        <label for="hargaBrgEdit">&nbsp;</label>
                                        <input type="text" class="form-control" id="hargaBrgEdit" name="hargaBrgEdit" placeholder="Harga Barang" value="">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="rowPersenHeader">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="naikHeaderEdit">Persentase Turun</label>
                                        <input type="text" class="form-control" id="naikHeaderEdit" name="naikHeaderEdit" placeholder="Persentase Kenaikan Harga" value="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="turunHeaderEdit">Persentase Naik</label>
                                        <input type="text" class="form-control" id="turunHeaderEdit" name="turunHeaderEdit" placeholder="Persentase Turun Harga" value="">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" id="closeSupp" class="btn btn-sm btn-default" data-dismiss="modal" id="closeBtn">Close</button>
                        <button type="submit" id="editSupp" class="btn btn-sm btn-primary editSupp" style="float: left;"><i class="fas fa-save"></i> Simpan</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
        </div>
        <!-- /.modal-dialog -->
    </div>

    <?php $this->load->view('Template/DataTablesJS') ?>

    <script type="text/javascript">
        $(function() {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            displayData()

            $('#modal-barang').on('hidden.bs.modal', function() {
                $('.newDetailBrg').remove()
                $('#idSupp').val('')
                $('#optTambah').val('')
                $("#kodeHeader").val('')
                $("#namaHeader").val('')
                $(".kodeDetail").val('')
                $(".namaDetail").val('')
                $(".hargaDetail").val('')
            })

            $('#modal-editBarang').on('hidden.bs.modal', function() {
                $("#kodeBrgEdit").val('')
                $("#idBrgEdit").val('')
                $("#namaBrgEdit").val('')
                $("#HargaBrgEdit").val('')
                $("#naikHeaderEdit").val('')
                $("#turunHeaderEdit").val('')
            })

            $("#tableDataBarang").DataTable({
                "responsive": true,
                "autoWidth": false,
                "pageLength": 10,
                "lengthMenu": [5, 10, 15, 20, 30, 50, 100],
            });

            $("#tambahDataMasterBarang").click(function() {
                displayKodeHeader();
                getNewKodeBarang();
                $('.modal-title').text("Tambah Data Barang");
                $("#modal-barang #namaHeader").focus();
            })

            $("#multiDetail").click(function() {
                let indexForm = $(".detailBrg").length
                let newDetail = "newDetail-" + indexForm;
                let kodeDetail = $(".detailBrg .kodeDetail").val()
                console.log(kodeDetail);
                if (indexForm > 1) {
                    let indexDetail = indexForm - 1
                    kodeDetail = $(".newDetail-" + indexDetail + " .kodeDetail").val()
                }
                kodeDetail = kodeDetail.replace('.', '')
                kodeDetail = String(parseInt(kodeDetail) + 1).padStart(2, '0') + '.';

                let formDetail = `<div class="row detailBrg newDetailBrg ` + newDetail + `">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control kodeDetail" name="kodeDetail[]" placeholder="Kode Detail Barang" value="` + kodeDetail + `" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control namaDetail" name="namaDetail[]" placeholder="Nama Detail Barang" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control hargaDetail" name="hargaDetail[]" placeholder="Harga Detail Barang" value="">
                                                <div class="input-group-append">
                                                    <button type="button" class="btn btn-sm btn-default" onClick="removeDetail('` + newDetail + `')"><i class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                $("#formMstrBarang").append(formDetail)
            });

            $("#formMstrBarang").validate({
                rules: {
                    namaHeader: "required",
                    naikHeader: "required",
                    turunHeader: "required",
                    "namaDetail[]": "required",
                    "hargaDetail[]": "required",
                },
                messages: {
                    namaHeader: "Nama Header Tidak Boleh Kosong",
                    naikHeader: "Persentase Naik Tidak Boleh Kosong",
                    turunHeader: "Persentase Turun Tidak Boleh Kosong",
                    "namaDetail[]": "Nama Detail Tidak Boleh Kosong",
                    "hargaDetail[]": "Nama Detail Tidak Boleh Kosong",
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
                }
            });

            $("#addSupp").click(function() {
                let formValid = $("#formMstrBarang").valid();
                if (!formValid) return;
                let optBrg = $("#optTambah").val()
                let kodeHeadBrg = $("#kodeHeader").val()
                let namaHeadBrg = $("#namaHeader").val()
                let kodeDetailBrg = $(".kodeDetail").val()
                let namaDetailBrg = $(".namaDetail").val()
                let hargaDetailBrg = $(".hargaDetail").val()

                let data = $("#formMstrBarang").serialize();

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Admin/Barang/DataMasterBarang/insertMasterBarang') ?>",
                    data: data,
                    dataType: "json",
                    async: false,
                    beforeSend: function() {
                        $("#addSupp").prop("disabled", true);
                        $("#closeAddSupp").prop("disabled", true);

                        var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
                        $("#loadingSImpan").html(loading);
                    },
                    success: function(data) {
                        // console.log(data);
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Barang Berhasil Disimpan.'
                        })
                        // $("#modal-barang").modal('hide');
                        // $("#optTambah").val('')
                        // $("#kodeHeader").val('')
                        // $("#namaHeader").val('')
                        // $(".kodeDetail").val('')
                        // $(".namaDetail").val('')
                        // $(".hargaDetail").val('')
                        setTimeout(() => {
                            window.location.reload()
                        }, 3000);
                    }
                })
            })

            $("#editSupp").click(function() {
                let data = $("#formEditBarang").serialize()

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Admin/Barang/DataMasterBarang/editMasterBarang') ?>",
                    data: data,
                    dataType: "json",
                    async: false,
                    beforeSend: function() {
                        $("#editSupp").prop("disabled", true);
                        $("#closeSupp").prop("disabled", true);

                        var loading = '<div class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i><div class="text-bold pt-2">Loading...</div></div>';
                        $("#loadingEdit").html(loading);
                    },
                    success: function(data) {
                        // console.log(data);
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Barang Berhasil Disimpan.'
                        })
                        // $("#modal-editBarang").modal('hide');
                        // $("#modal-editBarang input").val('')
                        setTimeout(() => {
                            window.location.reload()
                        }, 1000);
                    }
                })
            })

            $("#optTambah").change(function() {
                let kodeHeadBrg = $("#optTambah").val()
                let textOptTambah = $("#optTambah option:selected").text()
                textOptTambah = textOptTambah.split(' ')
                // console.log(textOptTambah)
                let namaBarangHead = textOptTambah[1];
                $(".newDetailBrg").remove()

                if (kodeHeadBrg == '') {
                    getNewKodeBarang();
                    $('#namaHeader').val('')
                    $('#naikHeader').val('')
                    $('#turunHeader').val('')
                    $('#naikHeader').attr('readonly', false)
                    $('#turunHeader').attr('readonly', false)
                    $('#namaHeader').attr('readonly', false)
                } else {
                    getNewKodeBarang(kodeHeadBrg);
                    $('#namaHeader').attr('readonly', true)
                    $('#naikHeader').attr('readonly', true)
                    $('#turunHeader').attr('readonly', true)
                    $('#namaHeader').val(namaBarangHead)
                }
            });

            $(".hargaDetail").keyup(function() {
                angka = formatRupiah($(this).val(), '');
                $(this).val(angka);
            });

            $("#hargaBrgEdit").keyup(function() {
                angka = formatRupiah($(this).val(), '');
                $(this).val(angka);
            });

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

        function removeDetail() {
            let indexDetailBrg = $('.detailBrg').length - 1
            $(".newDetail-" + indexDetailBrg).remove()
        }

        function displayKodeHeader() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Barang/DataMasterBarang/getDataHeaderBarang') ?>",
                dataType: "json",
                async: false,
                success: function(data) {
                    // console.log(data);
                    let row = '<option value="" selected>Tambah Header Baru</option>';
                    for (let i = 0; i < data.length; i++) {

                        row += `<option value="` + data[i].kode + `">` + data[i].kode + ` ` + data[i].nama_barang + `</option>`;
                    }
                    $('#optTambah').html(row);
                }
            })
        }

        function getNewKodeBarang(kodeHead = '') {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Barang/DataMasterBarang/getNewKodeBrg') ?>",
                data: {
                    kode: kodeHead
                },
                dataType: "json",
                async: false,
                success: function(data) {
                    console.log(data);
                    $("#kodeHeader").val(data.kodeHeader);
                    $(".kodeDetail").val(data.kodeDetail);
                    $(".namaHeader").val(data.namaHead);
                    $('#naikHeader').val(data.persenNaik);
                    $('#turunHeader').val(data.persenTurun);
                }
            })

        }

        function displayData() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Admin/Barang/DataMasterBarang/getDataBarang') ?>",
                dataType: "json",
                async: false,
                success: function(data) {
                    // console.log(data);
                    let row = '';
                    for (let i = 0; i < data.length; i++) {
                        let kode = data[i].kode;
                        let subKode = data[i].sub_kode;
                        let idBrg = data[i].id_kd_barang;
                        let statusBrg = data[i].status;
                        let harga = data[i].harga;
                        let statusBrgChar = statusBrg == '1' ? '<span class="badge badge-info">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>';
                        let sttsharga = harga == '0' ? '-' : formatRupiah(harga, '');
                        let kdBrg = subKode == '*' ? kode : kode + subKode;

                        row += `<tr>
                                    <td>` + (i + 1) + `</td>                                    
                                    <td>` + kdBrg + `</td>
                                    <td>` + data[i].nama_barang + `</td>
                                    <td>` + sttsharga + `</td>
                                    <td align="center">` + statusBrgChar + `</td>
                                    <td>
                                        <button type="button" class="btn btn-xs btn-primary" onClick="editDataBarang('` + kode + `','` + subKode + `','` + data[i].nama_barang + `','` + idBrg + `','` + statusBrg + `','` + data[i].persen_naik + `','` + data[i].persen_turun + `','` + data[i].harga + `')"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-xs btn-danger" id="hapusData" onClick="validateHapus('` + data[i].id_kd_barang + `')"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </td>
                                </tr>`;
                    }
                    $('#databarang').html(row);
                }
            })
        }

        function editDataBarang(kode, subKode, namaBrg, idBrg, statusBrg, persen_naik, persen_turun, harga) {
            $("#modal-editBarang").modal('show');
            $("#kodeBrgEdit").val(kode + subKode)
            $("#namaBrgEdit").val(namaBrg)
            $("#idBrgEdit").val(idBrg)
            $("#hargaBrgEdit").val(formatRupiah(harga, ''))

            // console.log(harga)

            if (subKode != "*") {
                $("#rowPersenHeader").hide()
                $("#hargaBrgEdit").attr('readonly', false)
            } else {
                $("#rowPersenHeader").show()
                $("#naikHeaderEdit").val(persen_naik)
                $("#turunHeaderEdit").val(persen_turun)
                $("#hargaBrgEdit").attr('readonly', true)

            }

            if (statusBrg == '1') {
                $("#customSwitch3").prop('checked', true)
            } else {
                $("#customSwitch3").prop('checked', false)
            }
        }

        function validateHapus(a) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        url: "<?= base_url('Admin/Barang/DataMasterBarang/deleteMasterBarang') ?>",
                        data: {
                            id: a
                        },
                        dataType: "json",
                        async: false,
                        success: function(data) {
                            if (data) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                            setTimeout(() => {
                                window.location.reload()
                            }, 1000);
                        }
                    })
                }
            });
        }
    </script>

</body>

</html>