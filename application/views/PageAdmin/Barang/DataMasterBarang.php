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
                                                <th style="text-align: center;">Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="databarang">
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th style="text-align: center;">Status</th>
                                                <th>Aksi</th>
                                            </tr>
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

    <!-- Modal Kode Barang -->
    <div class="modal fade" id="modal-barang" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
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
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="kodeDetail">Barang Detail</label>
                                    <input type="text" class="form-control kodeDetail" name="kodeDetail[]" placeholder="Kode Detail Barang" value="" readonly>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="namaDetail">&nbsp;</label>
                                    <input type="text" class="form-control namaDetail" name="namaDetail[]" placeholder="Nama Detail Barang" value="">
                                </div>
                            </div>
                        </div>
                    </form>
                    <button class="btn btn-sm btn-success" id="multiDetail"><i class="fas fa-plus-square"></i>&nbsp;&nbsp; Tambah Detail</button>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>
                    <button type="submit" id="addSupp" class="btn btn-sm btn-primary addSupp" style="float: left;"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <!-- Modal Kode Barang -->
    <div class="modal fade" id="modal-editBarang" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Data Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="formEditBarang">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-8">
                                    <label for="kodeBrgEdit">Barang</label>
                                </div>
                                <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success col-lg-2" style="    position: absolute; right: 15px;">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch3" name="statusBrgEdit">
                                    <label class="custom-control-label" for="customSwitch3">Status</label>
                                </div>
                            </div>
                            <input type="hidden" class="form-control" name="idBrgEdit" id="idBrgEdit" placeholder="idBrgEdit" value="">
                            <div class="row">
                                <input type="text" class="form-control col-lg-5" id="kodeBrgEdit" name="kodeBrgEdit" placeholder="Kode Barang" value="" readonly>
                                &nbsp;&nbsp;&nbsp;
                                <input type="text" class="form-control col-lg-6" id="namaBrgEdit" name="namaBrgEdit" placeholder="Nama Barang" value="">
                            </div>
                        </div>
                        <div class="row" id="rowPersenHeader">
                            <div class="form-group col-lg-5">
                                <label for="naikHeaderEdit">Persentase Turun</label>
                                <input type="text" class="form-control" id="naikHeaderEdit" name="naikHeaderEdit" placeholder="Persentase Kenaikan Harga" value="">
                            </div>
                            &nbsp;&nbsp;&nbsp;
                            <div class="form-group col-lg-6">
                                <label for="turunHeaderEdit">Persentase Naik</label>
                                <input type="text" class="form-control" id="turunHeaderEdit" name="turunHeaderEdit" placeholder="Persentase Turun Harga" value="">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" id="editSupp" class="btn btn-sm btn-primary editSupp" style="float: left;"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
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
            })


            $("#tableDataBarang").DataTable({
                "responsive": true,
                "autoWidth": false,
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
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control kodeDetail" name="kodeDetail[]" placeholder="Kode Detail Barang" value="` + kodeDetail + `" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control namaDetail" name="namaDetail[]" placeholder="Nama Detail Barang" value="">
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
                },
                messages: {
                    namaHeader: "Nama Header Tidak Boleh Kosong",
                    naikHeader: "Persentase Naik Tidak Boleh Kosong",
                    turunHeader: "Persentase Turun Tidak Boleh Kosong",
                    "namaDetail[]": "Nama Detail Tidak Boleh Kosong",
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

                let data = $("#formMstrBarang").serialize();

                $.ajax({
                    type: "POST",
                    url: "<?= base_url('Admin/Barang/DataMasterBarang/insertMasterBarang') ?>",
                    data: data,
                    dataType: "json",
                    async: false,
                    success: function(data) {
                        // console.log(data);
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Barang Berhasil Disimpan.'
                        })
                        $("#modal-barang").modal('hide');
                        $("#optTambah").val('')
                        $("#kodeHeader").val('')
                        $("#namaHeader").val('')
                        $(".kodeDetail").val('')
                        $(".namaDetail").val('')
                        setTimeout(() => {
                            window.location.reload()
                        }, 1000);
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
                    success: function(data) {
                        // console.log(data);
                        Toast.fire({
                            icon: 'success',
                            title: 'Data Barang Berhasil Disimpan.'
                        })
                        $("#modal-editBarang").modal('hide');
                        $("#modal-editBarang input").val('')
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
            })
        });

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
                        let subKode = data[i].sub_kode
                        let idBrg = data[i].id_kd_barang
                        let statusBrg = data[i].status
                        let statusBrgChar = statusBrg == '1' ? '<span class="badge badge-info">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>'
                        row += `<tr>
                                    <td>` + (i + 1) + `</td>                                    
                                    <td>` + kode + `` + subKode + `</td>
                                    <td>` + data[i].nama_barang + `</td>
                                    <td align="center">` + statusBrgChar + `</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" onClick="editDataBarang('` + kode + `','` + subKode + `','` + data[i].nama_barang + `','` + idBrg + `','` + statusBrg + `','` + data[i].persen_naik + `','` + data[i].persen_turun + `')"><i class="fas fa-edit"></i> Edit</button>
                                        <button class="btn btn-sm btn-danger" id="hapusData" onClick="validateHapus('` + data[i].id_kd_barang + `')"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </td>
                                </tr>`;
                    }
                    $('#databarang').html(row);
                }
            })
        }

        function editDataBarang(kode, subKode, namaBrg, idBrg, statusBrg, persen_naik, persen_turun) {
            $("#modal-editBarang").modal('show');
            $("#kodeBrgEdit").val(kode + subKode)
            $("#namaBrgEdit").val(namaBrg)
            $("#idBrgEdit").val(idBrg)

            console.log(persen_naik)

            if (subKode != "*") {
                $("#rowPersenHeader").hide()
            } else {
                $("#rowPersenHeader").show()
                $("#naikHeaderEdit").val(persen_naik)
                $("#turunHeaderEdit").val(persen_turun)
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