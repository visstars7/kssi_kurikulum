@extends('Perpustakaan.views.perpustakaan')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus-circle"></i> <strong>Tambah E-book</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table-perpus" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul buku</th>
                        <th>Kelas</th>
                        <th>Semester</th>
                        <th>Tingkat Kelas</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah E-book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Perpustakaan/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="mapel" class="col-form-label">Mapel: </label>
                        <select name="mapel" id="mapel" class="custom-select">
                            <?php foreach ($mapel as $item) : ?>
                                <option value="<?= $item['id_mapel'] ?>"><?= $item['nama_mapel'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas" class="col-form-label">Kelas: </label>
                        <select name="kelas" id="kelas" class="custom-select">
                            <?php foreach ($kelas as $item) : ?>
                                <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul-buku" class="col-form-label">Tingkat Kelas: </label>
                        <select name="tingkat_kelas" id="tingkat_kelas" class="custom-select">
                            <option value="1">X</option>
                            <option value="2">XI</option>
                            <option value="3">XII</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul-buku" class="col-form-label">Judul Buku: </label>
                        <input type="text" class="form-control" id="judul-buku" name="judul_buku">
                    </div>
                    <div class="form-group">
                        <label for="semester" class="col-form-label">Semester: </label>
                        <select name="semester" id="semester" class="custom-select" name="semester">
                            <option value="1">1</option>
                            <option value="2">2</option>
                        </select>
                    </div>
                    <label class="col-form-label">Upload file buku: </label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="file_buku">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <small style="color:red">*file diharuskan bertipe pdf*</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Tambah</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Update E-book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Perpustakaan/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_ebook" id="id-ebook-update">
                    </div>
                    <div class="form-group">
                        <label for="mapel" class="col-form-label">Mapel: </label>
                        <select name="mapel" id="mapel-update" class="custom-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="kelas" class="col-form-label">Kelas: </label>
                        <select name="kelas" id="kelas-update" class="custom-select"></select>
                    </div>
                    <div class="form-group">
                        <label for="judul-buku" class="col-form-label">Tingkat Kelas: </label>
                        <select name="tingkat_kelas" id="tingkat-kelas-update" class="custom-select">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="judul-buku" class="col-form-label">Judul Buku: </label>
                        <input type="text" class="form-control" id="judul-buku-update" name="judul_buku">
                    </div>
                    <div class="form-group">
                        <label for="semester" class="col-form-label">Semester: </label>
                        <select name="semester" id="semester-update" class="custom-select" name="semester">
                        </select>
                    </div>
                    <label class="col-form-label">Upload file buku: </label>
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="file-update" name="cover_buku">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
                    <small style="color:red">*file diharuskan bertipe pdf*</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i>Update</button>
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
<div class="modal fade" id="pdf-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tampilan E-book</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="pdf-object">

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function edit(id) {
        $.ajax({
            data: 'id_ebook=' + id,
            type: 'post',
            url: "<?= base_url('Perpustakaan/get_edit') ?>",
            success: (res) => {
                obj = JSON.parse(res);
                var ebook = obj.ebook[0];
                var kelas = obj.kelas;
                var mapel = obj.mapel;
                var optKelas = [];
                var optMapel = [];
                var optSmt = [];
                var optTingkat = [];
                $.each(kelas, (index, value) => {
                    if (value.id === ebook.id_kelas) {
                        optKelas += `<option value=${value.id} selected>${value.nama}</option>`
                    } else {
                        optKelas += `<option value=${value.id}>${value.nama}</option>`
                    }
                });
                $.each(mapel, (index, value) => {
                    if (value.id_mapel === ebook.id_mapel) {
                        optMapel += `<option value=${value.id_mapel} selected>${value.nama_mapel}</option>`
                    } else {
                        optMapel += `<option value=${value.id_mapel}>${value.nama_mapel}</option>`
                    }
                });
                for (let index = 1; index <= 2; index++) {
                    if (ebook.semester == index) {
                        optSmt += `<option value=${index} selected>${index}</option>`
                    } else {
                        optSmt += `<option value=${index}>${index}</option>`
                    }
                }
                for (let index = 1; index <= 3; index++) {
                    if (ebook.tingkat_kelas == index) {
                        optTingkat += `<option value=${index} selected>${index}</option>`
                    } else {
                        optTingkat += `<option value=${index}>${index}</option>`
                    }
                }

                $("#kelas-update").html(optKelas);
                $("#mapel-update").html(optMapel);
                $("#judul-buku-update").val(ebook.judul_buku);
                $("#tingkat-kelas-update").html(optTingkat);
                $("#semester-update").html(optSmt);
                $("#id-ebook-update").val(ebook.id_ebook);
            }
        });
    }

    function detail(id) {
        $.ajax({
            data: 'id_ebook=' + id,
            type: 'post',
            url: '<?= base_url("Perpustakaan/get_edit") ?>',
            success: (res) => {
                var obj = JSON.parse(res);
                var ebook = obj.ebook[0];
                $("#mapel-detail").html(`<option>${ebook.nama_mapel}</option>`);
                $("#kelas-detail").html(`<option>${ebook.nama_kelas}</option>`);
                $("#tingkat-kelas-detail").html(`<option>${ebook.tingkat_kelas}</option>`);
                $("#judul-buku-detail").val(ebook.judul_buku);
                $("#semester-detail").html(`<option>${ebook.semester}</option>`);
                $("#create-at-detail").val(ebook.create_at);
                $("#update-detail").val(ebook.update_at);
                $("#pdf-object").html(` <object type="application/pdf" data="${ebook.file}" id="pdf-object" style="width:100%" height="700">
                </object>`);
            }

        });
    }

    $('#kelas').select2();
    $('#table-perpus').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= base_url('Perpustakaan/ebook_datatable') ?>",
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