@extends('Kurikulum.views.kurikulum')
@section('content')
<div class="container-fluid">
    <form id="form" action="<?= base_url('Kurikulum/E_rapot/store') ?>" method="post">
        <div class="row mt-5">
            <div class="col-md-12">
                <button onclick="cetak()" class="btn btn-primary float-right" data-toggle="modal" data-target="#create"><i class="fa fa-file"></i> <strong>Cetak</strong></button>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="siswa">Kelas</label>
                            <select class="form-control" name="kelas" id="kelas"></select>
                        </div>
                        <input type="hidden" name="db" value="db"></input>
                        <input type="hidden" name="tb" value="v_penilaian"></input>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="siswa">Semester</label>
                            <select class="form-control" name="semester" id="smt">
                                <option value="1">Ganjil</option>
                                <option value="2">Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="siswa">Tahun ajaran</label>
                            <select class="form-control" name="tahun_ajaran" id="tahun"></select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script>
    $(document).ready(() => {
        // kelas
        $.ajax({
            data: `db=master&tb=kelas`,
            url: `<?= base_url('Kurikulum/E_rapot/get') ?>`,
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

        // tahun
        var date = new Date();
        var year = date.getFullYear();
        var optTahun = [];
        for (var i = year; i > 2001; i--) {
            optTahun += `<option value="${i}">${i}</option>`;
        }
        $("#tahun").html(optTahun);
    })

    $("#kelas").select2();
    $("#smt").select2();
    $("#tahun").select2();
</script>
@endsection