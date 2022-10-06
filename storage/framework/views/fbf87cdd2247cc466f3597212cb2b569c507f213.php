<div <?php echo e($attributes->merge(['class' => $makeProgressClass()])); ?>>

    
    <div class="<?php echo e($makeProgressBarClass()); ?>" role="progressbar"
        aria-valuenow="<?php echo e($value); ?>" aria-valuemin="0" aria-valuemax="100"
        style="<?php echo e($makeProgressBarStyle()); ?>">

        
        <?php if(isset($withLabel)): ?>
            <?php echo e($value); ?>%
        <?php else: ?>
            <span class="sr-only"><?php echo e($value); ?>% Progress</span>
        <?php endif; ?>

    </div>

</div>



<?php if (! $__env->hasRenderedOnce('2f0d0e4d-4cc7-44f4-9a06-16960648ec09')): $__env->markAsRenderedOnce('2f0d0e4d-4cc7-44f4-9a06-16960648ec09'); ?>
<?php $__env->startPush('js'); ?>
<script>

    class _AdminLTE_Progress {

        /**
         * Constructor.
         *
         * target: The id of the target progress bar.
         */
        constructor(target)
        {
            this.target = target;
        }

        /**
         * Get the current progress bar value.
         */
        getValue()
        {
            // Check if target exists.

            let t = $(`#${this.target}`);

            if (t.length <= 0) {
                return;
            }

            // Return the progress bar current value (casted to number).

            return +(t.find('.progress-bar').attr('aria-valuenow'));
        }

        /**
         * Set the new progress bar value.
         */
        setValue(value)
        {
            // Check if target exists.

            let t = $(`#${this.target}`);

            if (t.length <= 0) {
                return;
            }

            // Update progress bar.

            value = +value;

            t.find('.progress-bar').css('width', value + '%')
                .attr('aria-valuenow', value);

            if (t.find('span.sr-only').length > 0) {
                t.find('span.sr-only').text(value + '% Progress');
            } else {
                t.find('.progress-bar').text(value + '%');
            }
        }
    }

</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\webAdmin\resources\views\vendor\adminlte\components\widget\progress.blade.php ENDPATH**/ ?>