@extends('Kurikulum.views.kurikulum')
@section('content')
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <button class="btn btn-success float-right" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i> <strong>Generate Jadwal</strong></button>
            <button onclick="ex()" class="btn btn-warning float-right mr-5" style="color:white" data-toggle="modal" data-target="#export"><i class="fa fa-file-export"></i> <strong>Export Jadwal</strong></button>
            <button onclick="reset()" class="btn btn-danger float-right mr-5" style="color:white"><i class="fa fa-trash-restore"></i> <strong>Reset Jadwal</strong></button>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama Guru</th>
                        <th>Mapel</th>
                        <th>Ruang</th>
                        <th>Sesi</th>
                        <th>Hari</th>
                        <th>Semester</th>
                        <th>Kelas</th>
                        <th>Edit</th>
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
                <h5 class="modal-title" id="exampleModalLabel">Generate Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/jadwal/generate') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="hari">
                        <label>Jumlah Populasi</label>
                        <input class="form-control" type="number" name="populasi" id="populasi" min="10" max="100"></input>
                        <small class="text-danger">*masukkan angka 10 - 100 *</small>
                    </div>
                    <div class="form-group" for="hari">
                        <label>Jumlah Generasi</label>
                        <input class="form-control" type="number" name="generasi" id="generasi" min="10" max="100"></input>
                        <small class="text-danger">*masukkan angka 10 - 100 *</small>
                    </div>
                    <div class="form-group" for="hari">
                        <label>Semester</label>
                        <input class="form-control" type="number" name="semester" id="semester" min="1" max="2"></input>
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

<!-- update modal -->
<div class="modal fade" id="edit" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Jadwal/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="sesi">
                        <label>Sesi</label>
                        <select name="id_sesi" id="sesi"></select>
                        <input type="hidden" name="id_jadwal" id="id_jadwal">
                    </div>
                    <div class="form-group" for="Kelas">
                        <label>Kelas</label>
                        <select name="id_kelas" id="kelas"></select>
                    </div>
                    <div class="form-group" for="Guru Mapel">
                        <label>Guru Mapel</label>
                        <select name="id_guru_mapel" id="gm"></select>
                    </div>
                    <div class="form-group" for="ruang">
                        <label>Ruang</label>
                        <select name="id_ruang" id="ruang"></select>
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

<!-- export modal -->
<div class="modal fade" id="export" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Export Jadwal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('Kurikulum/Jadwal/export') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group" for="nama_kelas-export">
                        <label>Nama Kelas</label>
                        <select name="nama_kelas" id="nama_kelas-export"></select>
                    </div>
                    <div class="form-group" for="kelas-export">
                        <label>Tingkat</label>
                        <select name="tingkat" id="kelas-export">
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
    function edit(id) {
        $.ajax({
            data: `id=${id}`,
            type: `post`,
            url: `<?= base_url('Kurikulum/Jadwal/edit') ?>`,
            dataType: `json`,
            success: (res) => {
                var guru_mapel = res.guru_mapel;
                var kelas = res.kelas;
                var ruang = res.ruang;
                var sesi = res.sesi;
                var jadwal = res.jadwal[0];

                var optMapel = [];
                var optKelas = [];
                var optRuang = [];
                var optSesi = [];

                $.each(guru_mapel, (idx, val) => {
                    if (jadwal.id_guru_mapel == val.id_guru_mapel) {
                        optMapel += `<option value="${val.id_guru_mapel}" selected>${val.nip}</option>`;
                    } else {
                        optMapel += `<option value="${val.id_guru_mapel}">${val.nip}</option>`;
                    }
                });

                $.each(kelas, (idx, val) => {
                    if (jadwal.id_kelas == val.id) {
                        optKelas += `<option value="${val.id}" selected>${val.nama}</option>`;
                    } else {
                        optKelas += `<option value="${val.id}">${val.nama}</option>`;
                    }
                });

                $.each(ruang, (idx, val) => {
                    if (jadwal.id_ruang == val.id_ruang) {
                        optRuang += `<option value="${val.id_ruang}" selected>${val.nama_ruang}</option>`;
                    } else {
                        optRuang += `<option value="${val.id_ruang}">${val.nama_ruang}</option>`;
                    }
                });

                $.each(sesi, (idx, val) => {
                    if (jadwal.id_sesi == val.id_sesi) {
                        optSesi += `<option value="${val.id_sesi}" selected>${val.sesi}</option>`;
                    } else {
                        optSesi += `<option value="${val.id_sesi}">${val.sesi}</option>`;
                    }
                });

                $("#ruang").html(optRuang);
                $("#kelas").html(optKelas);
                $("#gm").html(optMapel);
                $("#sesi").html(optSesi);
                $("#id_jadwal").val(jadwal.id_jadwal);
            }
        });
        $("#ruang").select2();
        $("#kelas").select2();
        $("#gm").select2();
        $("#sesi").select2();
    }

    function ex() {
        $.ajax({
            data: `db=master&tb=kelas`,
            url: `<?= base_url('Kurikulum/jadwal/get') ?>`,
            type: `post`,
            dataType: 'json',
            success: (res) => {
                var optKelas = [];
                $.each(res, (idx, val) => {
                    optKelas += `<option value="${val.id}">${val.nama}</option>`;
                });

                $("#nama_kelas-export").html(optKelas);
            }
        });
        $("#nama_kelas-export").select2();
        $("#kelas-export").select2();
    }

    function reset() {
        location.href = "<?= base_url('Kurikulum/Jadwal/reset') ?>";
    }

    $('#table').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= base_url('Kurikulum/jadwal/jadwal_datatables') ?>",
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