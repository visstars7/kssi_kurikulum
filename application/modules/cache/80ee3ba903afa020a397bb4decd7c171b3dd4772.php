<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-12">
            <table id="table" class="table table-hover table-striped table-borderless">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama guru</th>
                        <th>Nama mapel</th>
                        <th>Nama kelas</th>
                        <th>Kegiatan</th>
                        <th>Tgl Dibuat</th>
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
            "url": "<?= base_url('Kurikulum/Jurnal/jurnal_datatables') ?>",
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
<?php echo $__env->make('Kurikulum.views.kurikulum', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/kssi_kurikulum/application/modules/Kurikulum/views/jurnal.blade.php ENDPATH**/ ?>