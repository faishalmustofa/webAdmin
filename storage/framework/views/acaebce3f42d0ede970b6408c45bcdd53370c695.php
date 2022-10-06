

<?php $__env->startSection('plugins.Datatables', true); ?>
<?php $__env->startSection('plugins.DatatablesPlugins', true); ?>

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">DSM Table</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus" style="display: none;"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <table id="diproses" class="table responsive striped hoverable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pemasok</th>
                            <th>Supplier</th>
                            <th>Nama Barang</th>
                            <th>Alamat</th>
                            <th>PIC</th>
                            <th>No. Telepon</th>
                            <th>No. Kantor</th>
                            <th>Email</th>
                            <th>File Prakualifikasi</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dsm.list-dsm-js-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webAdmin\resources\views/dsm/list-dsm.blade.php ENDPATH**/ ?>