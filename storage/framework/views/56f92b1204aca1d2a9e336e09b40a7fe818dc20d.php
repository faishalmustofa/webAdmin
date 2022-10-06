

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
            <h3 class="card-title">Monitoring Table</h3>
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
                            <th rowspan="2">No</th>
                            <th rowspan="2">Deskripsi</th>
                            <th rowspan="2">No. PO</th>
                            <th rowspan="2">No. Project</th>
                            <th rowspan="2">Supplier</th>
                            <th rowspan="2">ID Supplier</th>
                            <th rowspan="2">Nilai Inv</th>
                            <th colspan="2">Cara Pembayaran</th>
                            <th rowspan="2">Koor Dan</th>
                            <th rowspan="2">Mdan</th>
                            <th rowspan="2">Proyek</th>
                            <th rowspan="2">AK-1</th>
                            <th rowspan="2">AK-2</th>
                            <th rowspan="2">MKU</th>
                            <th rowspan="2">DKHC</th>
                            <th colspan="4">Umur Hutang (hari)</th>
                            <th rowspan="2">Action</th>
                        </tr>
                        <tr>
                            <th>Metode</th>
                            <th>Tempo</th>
                            <th>30</th>
                            <th>60</th>
                            <th>90</th>
                            <th>>90</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                            <td>10</td>
                            <td>2</td>
                            <td>1</td>
                            <td>2</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>Edinburgh</td>
                            <td>2011-04-25</td>
                            <td>$320,800</td>
                            <td>10</td>
                            <td>2</td>
                            <td>1</td>
                            <td>2</td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('dsm.list-dsm-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webAdmin\resources\views\monitoring\list-monitoring.blade.php ENDPATH**/ ?>