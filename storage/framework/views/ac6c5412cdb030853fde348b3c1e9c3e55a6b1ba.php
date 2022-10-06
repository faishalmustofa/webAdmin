

<?php $__env->startSection('plugins.Datatables', true); ?>
<?php $__env->startSection('plugins.DatatablesPlugins', true); ?>

<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('css'); ?>
 <style>
    .table thead th {
        vertical-align: middle;
        text-align: center;
    }
    /* .table tbody td {
        vertical-align: middle;
        text-align: center;
    } */
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
            <h3 class="card-title">KPI Table</h3>
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
                            <th>No. PO</th>
                            <th>Tahun</th>
                            <th>Bulan</th>
                            <th>Supplier</th>
                            <th>ID Supplier</th>
                            <th>% OK/NG</th>
                            <th>% Ked</th>
                            <th>% Biaya</th>
                            <th>% Pelayanan</th>
                            <th>% Daya Saing</th>
                            <th>% SMT</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>1192848</td>
                            <td>2015</td>
                            <td>Januari</td>
                            <td>Tiger Nixon</td>
                            <td>20110425</td>
                            <td>32</td>
                            <td>65</td>
                            <td>80</td>
                            <td>44</td>
                            <td>53</td>
                            <td>52</td>
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

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webAdmin\resources\views\kpi\list-kpi.blade.php ENDPATH**/ ?>