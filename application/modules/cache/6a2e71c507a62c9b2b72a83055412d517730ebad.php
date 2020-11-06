
<?php $__env->startSection('content'); ?>;
<div class="container-fluid">
    <div class="subheader py-6 py-lg-8 subheader-transparent" id="kt_subheader">
        <div class="container d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Dashboard</h5>
                    <!--end::Page Title-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center flex-wrap">
                <!--begin::Daterange-->
                <a href="#" class="btn btn-fixed-height btn-bg-white btn-text-dark-50 btn-hover-text-primary btn-icon-primary font-weight-bolder font-size-sm px-1 my-1" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="" data-placement="top" data-original-title="Select dashboard daterange">
                    <span class="opacity-60 font-weight-bolder mr-2" id="kt_dashboard_daterangepicker_title">Today:</span>
                    <span class="font-weight-bolder" id="kt_dashboard_daterangepicker_date">Oct 30</span>
                </a>
                <!--end::Daterange-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <div class="row">
        <div class="card">

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Perpustakaan.views.perpustakaan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\kssi_kurikulum\application\modules/Perpustakaan/views/dashboard.blade.php ENDPATH**/ ?>