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
<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function () {
            let dataTableDiproses = $('#diproses').DataTable({
                processing: true,
                serverSide: true,
                stateSave: true,
                ajax: {
                    url     : '<?php echo URL::route("datatable.sppm"); ?>',
                    type    : 'GET',
                    dataType: 'json',
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
                    {data: 'nama_pembuat', name: 'nama_pembuat'},
                    {data: 'no_project', name: 'no_project'},
					{data: 'no_sppm', name: 'no_sppm'},
                    {data: 'tgl_sppm', name: 'tgl_sppm', searchable:false},
                    {data: 'no_spk', name: 'no_spk', searchable:false},
                    {data: 'uraian', name: 'uraian', searchable:false},
                    {data: 'kode_material', name: 'kode_material', searchable:false},
                    {data: 'spesifikasi', name: 'spesifikasi', searchable:false},
                    {data: 'satuan', name: 'satuan', searchable:false},
                    {data: 'qty_sppm', name: 'qty_sppm', searchable:false},
                    {data: 'hpp', name: 'hpp', searchable:false},
                    {data: 'qty_hpp', name: 'qty_hpp', searchable:false},
                    {data: 'target_kedatangan', name: 'target_kedatangan', searchable:false},
                    {data: 'file_teknis', name: 'file_teknis', searchable:false},
                    {data: 'status', name: 'status', searchable:false},
                    {data: 'action', name: 'action'},
                ],
                order : ['0','asc'],
                dom: '<"row"<"col-md-3"f><"#date-filter.col-md-3 filter-block"><"#order-status-filter.col-md-2 filter-block"><"#payment-method-filter.col-md-2 filter-block"><"#payment-status-filter.col-md-2 filter-block">>rt<"float-left"li><"float-right"p>',
                responsive: false,
                buttons: [
                    {
                        text: '<i class="fa fa-plus-circle"></i> Tambah DSM',
                        action: function ( e, dt, node, config ) {
                            window.location = '<?php echo e(route("dsm")); ?>';
                        }
                    }
                ],
            });
        });
        
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\webAdmin\resources\views\sppm\list-sppm-js-css.blade.php ENDPATH**/ ?>