<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NISN</th>
                        <th>ID Kelas</th>
                        <th>ID Ruang</th>
                        <th>ID Sesi</th>
                        <th>Status kehadiran</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#table').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],

        "ajax": {
            "url": "<?= base_url('Kurikulum/Absensi_siswa/datatables') ?>",
            "type": "POST"
        },


        "columnDefs": [{
            "targets": [0],
            "orderable": false,
            "width": 5
        }],

    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Kurikulum.views.kurikulum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kssi_kurikulum/application/modules/Kurikulum/views/absensi_siswa.blade.php ENDPATH**/ ?>