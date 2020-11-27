@extends('Kurikulum.views.kurikulum')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button onclick="read()" class="btn btn-success float-right" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i> <strong>Tambah Mapel</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mapel</th>
                        <th>Kelompok</th>
                        <th>Sub kelompok</th>
                        <th>Produktif</th>
                        <th>Kurikulum</th>
                        <th>Tingkat</th>
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
<div class="modal fade" id="create" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Mapel/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Nama Mapel</label>
                        <input class="form-control" name="nama_mapel" type="text" required>
                    </div>
                    <div class="form-group" for="kurikulum">
                        <label>Kurikulum</label>
                        <select name="id_kurikulum" id="kurikulum" class="custom-select"></select>
                    </div>
                    <div class="form-group" for="waktu_mulai">
                        <label>Kelompok</label>
                        <select name="kelompok" id="kelompok" class="custom-select">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Sub kelompok</label>
                        <select name="sub_kelompok" id="sub_kelompok" class="custom-select"></select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Produktif</label>
                        <select name="produktif" id="produktif" class="custom-select">
                            <option value="C1">C1</option>
                            <option value="C2">C2</option>
                            <option value="C3">C3</option>
                        </select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Tingkat Kelas</label>
                        <select name="tingkat" id="tingkat" class="custom-select">
                            <option value="10">X</option>
                            <option value="11">XII</option>
                            <option value="12">XIII</option>
                        </select>
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

<!-- detail modal -->
<div class="modal fade" id="detail" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Mapel/store') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Nama Mapel</label>
                        <input class="form-control" id="nama-mapel-detail" name="nama_mapel" type="text" readonly>
                    </div>
                    <div class="form-group" for="kurikulum">
                        <label>Kurikulum</label>
                        <select name="id_kurikulum" id="kurikulum-detail" class="custom-select" disabled></select>
                    </div>
                    <div class="form-group" for="waktu_mulai">
                        <label>Kelompok</label>
                        <select name="kelompok" id="kelompok-detail" class="custom-select" disabled>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Sub kelompok</label>
                        <select name="sub_kelompok" id="sub_kelompok-detail" class="custom-select" disabled></select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Produktif</label>
                        <select name="produktif" id="produktif-detail" class="custom-select" disabled>
                            <option value="C1">C1</option>
                            <option value="C2">C2</option>
                            <option value="C3">C3</option>
                        </select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Tingkat Kelas</label>
                        <select name="tingkat" id="tingkat-detail" class="custom-select" disabled>
                            <option value="10">X</option>
                            <option value="11">XII</option>
                            <option value="12">XIII</option>
                        </select>
                    </div>
                    <div class="form-group" for="hari">
                        <label>Tgl Ditambah</label>
                        <input class="form-control" id="tgl-tambah-detail" name="create_at" type="text" readonly>
                    </div>
                    <div class="form-group" for="hari">
                        <label>Tgl Update</label>
                        <input class="form-control" id="tgl-update-detail" name="update_at" type="text" readonly>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- update modal -->
<div class="modal fade" id="edit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Mata Pelajaran</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Mapel/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Nama Mapel</label>
                        <input class="form-control" id="nama-mapel-update" name="nama_mapel" type="text">
                        <input class="form-control" id="id-mapel-update" name="id_mapel" type="hidden">
                    </div>
                    <div class="form-group" for="kurikulum">
                        <label>Kurikulum</label>
                        <select name="id_kurikulum" id="kurikulum-update" class="custom-select"></select>
                    </div>
                    <div class="form-group" for="waktu_mulai">
                        <label>Kelompok</label>
                        <select name="kelompok" id="kelompok-update" class="custom-select">
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                        </select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Sub kelompok</label>
                        <select name="sub_kelompok" id="sub_kelompok-update" class="custom-select"></select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Produktif</label>
                        <select name="produktif" id="produktif-update" class="custom-select">
                            <option value="C1">C1</option>
                            <option value="C2">C2</option>
                            <option value="C3">C3</option>
                        </select>
                    </div>
                    <div class="form-group" for="waktu_selesai">
                        <label>Tingkat Kelas</label>
                        <select name="tingkat" id="tingkat-update" class="custom-select">
                            <option value="10">X</option>
                            <option value="11">XII</option>
                            <option value="12">XIII</option>
                        </select>
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
    $(document).ready(() => {
        for (var i = 1; i <= 12; i++) {
            $("#sub_kelompok").append(`<option value="${i}">${i}</option>`);
        }

        $.ajax({
            data: `tb=tb_kurikulum`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Mapel/get') ?>`,
            dataType: `json`,
            success: (res) => {
                $.each(res, (idx, val) => {
                    $("#kurikulum").append(`<option value="${val.id_kurikulum}">${val.nama_kurikulum}</option>`);
                });
            }
        });

        $("#kurikulum").select2();
        $("#sub_kelompok").select2();
    });

    function detail(id) {
        $.ajax({
            data: `id=${id}&tipe=detail`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Mapel/get_where') ?>`,
            dataType: `json`,
            success: (res) => {
                console.log(res);
                $.each(res, (idx, val) => {
                    $("#nama-mapel-detail").val(val.nama_mapel);
                    $("#kurikulum-detail").html(`<option value="${val.id_kurikulum}">${val.nama_kurikulum}</option>`);
                    $("#kelompok-detail").html(`<option value="${val.kelompok}">${val.kelompok}</option>`);
                    $("#sub_kelompok-detail").html(`<option value="${val.sub_kelompok}">${val.sub_kelompok}</option>`);
                    $("#produktif").html(`<option value="${val.produktif}">${val.produktif}</option>`);
                    $("#tingkat").html(`<option value="${val.tingkat}">${val.tingkat}</option>`);
                    $("#tgl-tambah-detail").val(val.create_at);
                    $("#tgl-update-detail").val(val.update_at);
                });
            }
        });
    }

    function edit(id) {
        $.ajax({
            data: `id=${id}&tipe=edit`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Mapel/get_where') ?>`,
            dataType: `json`,
            success: (res) => {
                var kurikulum = res.kurikulum;
                var mapel = res.mapel[0];
                $("#nama-mapel-update").val(mapel.nama_mapel);
                $("#id-mapel-update").val(mapel.id_mapel);
                $.each(kurikulum, (idx, val) => {
                    if (val.id_kurikulum == mapel.id_kurikulum) {
                        $("#kurikulum-update").html(`<option value="${val.id_kurikulum}" selected>${val.nama_kurikulum}</option>`);
                    } else {
                        $("#kurikulum-update").html(`<option value="${val.id_kurikulum}">${val.nama_kurikulum}</option>`);
                    }
                });

                for (var i = 1; i <= 12; i++) {
                    if (mapel.sub_kelompok == i) {
                        $("#sub_kelompok-update").append(`<option value="${i}" selected>${i}</option>`);
                    } else {
                        $("#sub_kelompok-update").append(`<option value="${i}" selected>${i}</option>`);
                    }
                }
            }
        });

        $("#kurikulum-update").select2();
        $("#sub_kelompok-update").select2();
    }

    $('#table').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= base_url('Kurikulum/Mapel/mapel_datatables') ?>",
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