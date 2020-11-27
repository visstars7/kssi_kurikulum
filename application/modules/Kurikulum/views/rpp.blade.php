@extends('Kurikulum.views.kurikulum')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button onclick="read()" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> <strong>Tambah Rpp</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table-perpus" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nip</th>
                        <th>Guru</th>
                        <th>Nama mapel</th>
                        <th>Tingkat kelas</th>
                        <th>Semester</th>
                        <th>tgl dibuat</th>
                        <th>tgl diubah</th>
                        <th>Detail</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- create modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rpp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Rpp/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="mapel" class="col-form-label">Nama guru</label>
                        <select name="guru" id="guru" class="custom-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="mapel" class="col-form-label">Mapel</label>
                        <select name="mapel" id="mapel" class="custom-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="kelas" class="col-form-label">Tingat kelas</label>
                        <select name="tingkat_kelas" id="tingkat_kelas" class="custom-select">
                            <option value="" selected>pilih tingkat kelas</option>
                            <option value="1">X</option>
                            <option value="2">XI</option>
                            <option value="3">XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester" class="col-form-label">Semester</label>
                        <select name="semester" id="semester" class="custom-select">
                            <option value="" selected>pilih semester</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <label class="col-form-label">Upload file rpp </label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="file_rpp">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <small style="color:red">*file diharuskan bertipe pdf*</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- update modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Rpp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Rpp/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" id="id-rpp" name="id_rpp">
                    </div>
                    <div class="form-group">
                        <label for="mapel" class="col-form-label">Nama guru</label>
                        <select name="nip" id="guru-update" class="custom-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="mapel" class="col-form-label">Mapel</label>
                        <select name="id_mapel" id="mapel-update" class="custom-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="kelas" class="col-form-label">Tingat kelas</label>
                        <select name="tingkat_kelas" id="tingkat-kelas-update" class="custom-select">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="semester" class="col-form-label">Semester</label>
                        <select name="semester" id="semester-update" class="custom-select">
                        </select>
                    </div>
                    <label class="col-form-label">Upload file rpp </label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file-rpp-update" name="file-rpp-update">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <small style="color:red">*file diharuskan bertipe pdf*</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- detail modal -->
<div class="modal fade" id="detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail E-book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="#" enctype="#">
                    <div class="form-group">
                        <input type="hidden" name="id_ebook" id="id-ebook-detail" readonly>
                    </div>
                    <div class="form-group">
                        <label for="mapel" class="col-form-label">Mapel: </label>
                        <select name="mapel" id="mapel-detail" class="custom-select" disabled></select>
                    </div>
                    <div class="form-group">
                        <label for="kelas" class="col-form-label">Kelas: </label>
                        <select name="kelas" id="kelas-detail" class="custom-select" disabled></select>
                    </div>
                    <div class="form-group">
                        <label for="judul-buku" class="col-form-label">Tingkat Kelas: </label>
                        <select name="tingkat_kelas" id="tingkat-kelas-detail" class="custom-select" disabled>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul-buku" class="col-form-label">Judul Buku: </label>
                        <input type="text" class="form-control" id="judul-buku-detail" name="judul_buku" readonly>
                    </div>
                    <div class="form-group">
                        <label for="semester" class="col-form-label">Semester: </label>
                        <select name="semester" id="semester-detail" class="custom-select" name="semester" disabled>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul-buku" class="col-form-label">Dibuat: </label>
                        <input type="text" class="form-control" id="create-at-detail" name="create_at" readonly>
                    </div>
                    <div class="form-group">
                        <label for="judul-buku" class="col-form-label">Diupdate: </label>
                        <input type="text" class="form-control" id="update-detail" name="update_at" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-toggle="modal" data-dismiss="modal" data-target="#pdf-modal">Tampilkan Pdf</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- show pdf modal -->
<div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tampilan Rpp</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="show-rpp"></div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    function read() {
        $.ajax({
            data: `db=master&tb=guru`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Rpp/get_data') ?>`,
            dataType: `json`,
            success: (res) => {
                var opt = [];
                $.each(res, (index, value) => {
                    opt += `<option value='${value.nip}'>${value.nama}</option>`
                });

                $("#guru").html(opt);
            }
        });

        $.ajax({
            data: `db=db&tb=tb_mapel`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Rpp/get_data') ?>`,
            dataType: `json`,
            success: (res) => {
                var opt = [];
                $.each(res, (index, value) => {
                    opt += `<option value='${value.id_mapel}'>${value.nama_mapel}</option>`
                });

                $("#mapel").html(opt);
            }
        });
    }

    function edit(id) {
        $.ajax({
            data: `id=${id}`,
            type: 'post',
            url: `<?= base_url('Kurikulum/Rpp/edit_data') ?>`,
            dataType: 'json',
            success: (res) => {
                guru = res.guru;
                mapel = res.mapel;
                rpp = res.rpp[0];
                var tingkat = ['X', 'XI', 'XII'];
                var smt = ['1', '2'];
                var optSmt = [];
                var optTingkat = [];
                var optGuru = [];
                var optMapel = [];

                $.each(guru, (index, value) => {
                    if (value.nip == rpp.nip) {
                        optGuru += `<option value='${value.nip}' selected>${value.nama}</option>`;
                    } else {
                        optGuru += `<option value='${value.nip}'>${value.nama}</option>`;
                    }
                });

                $.each(mapel, (index, value) => {
                    if (value.id_mapel == rpp.id_mapel) {
                        optMapel += `<option value='${value.id_mapel}' selected>${value.nama_mapel}</option>`;
                    } else {
                        optMapel += `<option value='${value.id_mapel}'>${value.nama_mapel}</option>`;
                    }
                });

                $.each(tingkat, (index, value) => {
                    if ((index + 1) == rpp.tingkat_kelas) {
                        optTingkat += `<option value='${index+1}' selected>${value}</option>`;
                    } else {
                        optTingkat += `<option value='${index+1}'>${value}</option>`;
                    }
                });
                $.each(smt, (index, value) => {
                    if (index + 1 == rpp.semester) {
                        optSmt += `<option value='${index+1}' selected>${value}</option>`;
                    } else {
                        optSmt += `<option value='${index+1}'>${value}</option>`;
                    }
                });

                $("#semester-update").append(optSmt);
                $("#tingkat-kelas-update").append(optTingkat);
                $("#guru-update").html(optGuru);
                $("#mapel-update").html(optMapel);
                $("#id-rpp").val(rpp.id_rpp);
            }
        });
    }

    function show(id) {
        $.ajax({
            data: `id=${id}&tb=tb_rpp&column=id_rpp&db=db`,
            type: 'post',
            url: "<?= base_url('Kurikulum/rpp/get_data') ?>",
            dataType: 'json',
            success: (res) => {
                var rpp = res[0];
                $("#show-rpp").html(`<object type="application/pdf" data="${rpp.file}" id="pdf-object" style="width:100%" height="700"></object>`);
            }
        });
    }

    $('#guru').select2();
    $('#mapel').select2();
    $('#table-perpus').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= base_url('Kurikulum/Rpp/rpp_datatables') ?>",
            "type": "POST"
        },


        "columnDefs": [{
            "targets": [0],
            "orderable": false,
            "width": 5
        }],

    });
</script>
@endsection