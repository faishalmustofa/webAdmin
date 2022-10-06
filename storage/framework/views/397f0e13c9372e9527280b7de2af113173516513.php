

<?php $__env->startSection('plugins.Datatables', true); ?>
<?php $__env->startSection('plugins.DatatablesPlugins', true); ?>

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
 <style>
    .table thead th {
        vertical-align: middle;
        text-align: center;
    }
    .table tbody td {
        vertical-align: middle;
        text-align: center;
    }
    table.dataTable thead .sorting:before, 
    table.dataTable thead .sorting:after,
    table.dataTable thead .sorting_asc:before, 
    table.dataTable thead .sorting_asc:after {
        display: none;
    }
 </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">PO Table</h3>
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
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('po.list-po-js-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webAdmin\resources\views\po\list-po.blade.php ENDPATH**/ ?>