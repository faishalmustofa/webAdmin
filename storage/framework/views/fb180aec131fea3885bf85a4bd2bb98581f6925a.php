<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function () {
            
            let tableDiproses = $('#diproses').DataTable({
                buttons: [ 'copy', 'csv', 'excel' ],
                order : ['0','asc'],
                search: {
                    return: true,
                },
            });
        });
        
    </script>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\webAdmin\resources\views\po\list-po-js-css.blade.php ENDPATH**/ ?>