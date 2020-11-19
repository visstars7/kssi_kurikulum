@extends('Kurikulum.views.kurikulum')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button onclick="template()" class="btn btn-primary float-right" data-toggle="modal" data-target="#create"><i class="fa fa-download"></i> <strong>Templates</strong></button>
            <button class="btn btn-success float-right mr-5" style="color:white" data-toggle="modal" data-target="#import"><i class="fa fa-upload"></i> <strong>Import Nilai</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Mapel</th>
                        <th>Kelas</th>
                        <th>NISN</th>
                        <th>Siswa</th>
                        <th>NIP</th>
                        <th>Guru</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- template modal -->
<div class="modal fade" id="create" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generate Templates</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Daftar_nilai/templates') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="kelas">
                        <label>Kelas</label>
                        <select name="id_kelas" id="kelas"></select>
                    </div>
                    <div class="form-group" for="hari">
                        <label>Guru Mapel</label>
                        <select name="id_guru_mapel" id="guru"></select>
                    </div>
                    <div class="form-group" for="hari">
                        <label>Semester</label>
                        <select name="semester" id="smt">
                            <option value="1">Ganjil</option>
                            <option value="2">Genap</option>
                        </select>
                    </div>
                    <div class="form-group" for="jenis_uji" id="jenis_uji">
                        <label for="jenis_uji">Jenis Uji</label>
                        <div class="row mb-2">
                            <div class="col-md-10">
                                <input type="text" name="jenis_uji[]" id="0" class="form-control" required>
                            </div>
                            <div class="col-md-1">
                                <button type="button" onclick="addField()" class="btn btn-primary btn-md"><i class="fa fa-plus"></i></button>
                                <input type="hidden" name="jumlah_form" id="jumlah_field" class="form-control" value="1">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- import modal -->
<div class="modal fade" id="import" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Daftar_nilai/import') ?>" method="post" enctype="multipart/form-data">
                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="nilai_siswa">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> Kirim</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function addField() {
        var jumlah = parseInt($("#jumlah_field").val());
        var nextForm = $("#jumlah_field").val(jumlah + 1);
        var html = `<div class="row mb-2" id="${jumlah}">
                        <div class="col-md-10">
                            <input type="text" name="jenis_uji[]" class="form-control" required>
                        </div>
                        <div class="col-md-1">
                            <button type="button" onclick="delField(${jumlah})" class="btn btn-danger btn-md"><i class="fa fa-trash"></i></button>
                        </div>
                    </div>`;
        $("#jenis_uji").append(html);
    }

    function delField(id) {
        $(`#${id}`).remove();
    }

    function template() {

        // kelas
        $.ajax({
            data: `db=master&tb=kelas`,
            url: `<?= base_url('Kurikulum/Daftar_nilai/get') ?>`,
            type: `post`,
            dataType: `json`,
            success: (res) => {
                var optKelas = [];
                $.each(res, (idx, val) => {
                    optKelas += `<option value="${val.id}">${val.nama}</option>`;
                });
                $("#kelas").html(optKelas);
            }
        });

        // guru
        $.ajax({
            data: `db=db&tb=v_guru_mapel`,
            url: `<?= base_url('Kurikulum/Daftar_nilai/get') ?>`,
            type: `post`,
            dataType: `json`,
            success: (res) => {
                var optGuru = [];
                $.each(res, (idx, val) => {
                    optGuru += `<option value="${val.id_guru_mapel}">${val.nama_guru} - ${val.nama_mapel}</option>`;
                });
                $("#guru").html(optGuru);
            }

        });

        $("#smt").select2();
        $("#guru").select2();
        $("#kelas").select2();
    }

    $('#table').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= base_url('Kurikulum/Daftar_nilai/nilai_datatables') ?>",
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