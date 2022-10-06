<div <?php echo e($attributes->merge(['class' => $makeBoxClass()])); ?>>

    
    <?php if(isset($icon)): ?>
        <span class="<?php echo e($makeIconClass()); ?>">
            <i class="<?php echo e($icon); ?>"></i>
        </span>
    <?php endif; ?>

    
    <div class="info-box-content">

        
        <?php if(isset($title)): ?>
            <span class="info-box-text"><?php echo e($title); ?></span>
        <?php endif; ?>

        
        <?php if(isset($text)): ?>
            <span class="info-box-number"><?php echo e($text); ?></span>
        <?php endif; ?>

        
        <?php if(isset($progress) && isset($attributes['id'])): ?>
             <?php if (isset($component)) { $__componentOriginal2833f5cd2f7c3d9d4665a747bd423726b7e93ccb = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\View\Components\Widget\Progress::class, ['value' => ''.e($progress).'','theme' => ''.e($progressTheme).'']); ?>
<?php $component->withName('adminlte-progress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['id' => 'progress-'.e($attributes['id']).'']); ?>
<?php if (isset($__componentOriginal2833f5cd2f7c3d9d4665a747bd423726b7e93ccb)): ?>
<?php $component = $__componentOriginal2833f5cd2f7c3d9d4665a747bd423726b7e93ccb; ?>
<?php unset($__componentOriginal2833f5cd2f7c3d9d4665a747bd423726b7e93ccb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <?php elseif(isset($progress)): ?>
             <?php if (isset($component)) { $__componentOriginal2833f5cd2f7c3d9d4665a747bd423726b7e93ccb = $component; } ?>
<?php $component = $__env->getContainer()->make(JeroenNoten\LaravelAdminLte\View\Components\Widget\Progress::class, ['value' => ''.e($progress).'','theme' => ''.e($progressTheme).'']); ?>
<?php $component->withName('adminlte-progress'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php if (isset($__componentOriginal2833f5cd2f7c3d9d4665a747bd423726b7e93ccb)): ?>
<?php $component = $__componentOriginal2833f5cd2f7c3d9d4665a747bd423726b7e93ccb; ?>
<?php unset($__componentOriginal2833f5cd2f7c3d9d4665a747bd423726b7e93ccb); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?> 
        <?php endif; ?>

        
        <?php if(isset($description)): ?>
            <span class="progress-description"><?php echo e($description); ?></span>
        <?php endif; ?>

    </div>

</div>



<?php if (! $__env->hasRenderedOnce('4c2106bf-b23d-4edb-81fe-e59e6282cd28')): $__env->markAsRenderedOnce('4c2106bf-b23d-4edb-81fe-e59e6282cd28'); ?>
<?php $__env->startPush('js'); ?>
<script>

    class _AdminLTE_InfoBox {

        /**
         * Constructor.
         *
         * target: The id of the target info box.
         */
        constructor(target)
        {
            this.target = target;
        }

        /**
         * Update the info box.
         *
         * data: An object with the new data.
         */
        update(data)
        {
            // Check if target and data exists.

            let t = $(`#${this.target}`);

            if (t.length <= 0 || ! data) {
                return;
            }

            // Update available data.

            if (data.title) {
                t.find('.info-box-text').html(data.title);
            }

            if (data.text) {
                t.find('.info-box-number').html(data.text);
            }

            if (data.icon) {
                t.find('.info-box-icon i').attr('class', data.icon);
            }

            if (data.description) {
                t.find('.progress-description').html(data.description);
            }

            // Update progress bar.

            if (data.progress) {
                let pBar = new _AdminLTE_Progress(`progress-${this.target}`);
                pBar.setValue(data.progress);
            }
        }
    }

</script>
<?php $__env->stopPush(); ?>
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\webAdmin\resources\views\vendor\adminlte\components\widget\info-box.blade.php ENDPATH**/ ?>