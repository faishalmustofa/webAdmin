<?php $__env->startSection('input_group_item'); ?>

    
    <select id="<?php echo e($id); ?>" name="<?php echo e($name); ?>"
        <?php echo e($attributes->merge(['class' => $makeItemClass()])); ?>>
        <?php echo e($slot); ?>

    </select>

<?php $__env->stopSection(true); ?>



<?php $__env->startPush('js'); ?>
<script>

    $(() => {
        $('#<?php echo e($id); ?>').selectpicker( <?php echo json_encode($config, 15, 512) ?> );

        // Add support to auto select old submitted values in case of
        // validation errors.

        <?php if($errors->any() && $enableOldSupport): ?>
            let oldOptions = <?php echo json_encode(collect($getOldValue($errorKey)), 15, 512) ?>;
            $('#<?php echo e($id); ?>').selectpicker('val', oldOptions);
        <?php endif; ?>
    })

</script>
<?php $__env->stopPush(); ?>




<?php if (! $__env->hasRenderedOnce('57882661-17b9-474a-b954-754d41c31431')): $__env->markAsRenderedOnce('57882661-17b9-474a-b954-754d41c31431'); ?>
<?php $__env->startPush('css'); ?>
<style type="text/css">

    
    .bootstrap-select.is-invalid {
        padding-right: 0px !important;
    }

</style>
<?php $__env->stopPush(); ?>
<?php endif; ?>

<?php echo $__env->make('adminlte::components.form.input-group-component', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webAdmin\vendor\jeroennoten\laravel-adminlte\resources\views\components\form\select-bs.blade.php ENDPATH**/ ?>