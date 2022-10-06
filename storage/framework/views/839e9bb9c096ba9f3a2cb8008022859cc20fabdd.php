<?php ( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') ); ?>

<?php if(config('adminlte.use_route_url', false)): ?>
    <?php ( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' ); ?>
<?php else: ?>
    <?php ( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' ); ?>
<?php endif; ?>

<?php $__env->startSection('adminlte_css'); ?>
    <?php echo $__env->yieldPushContent('css'); ?>
    <?php echo $__env->yieldContent('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('classes_body'); ?><?php echo e(($auth_type ?? 'login') . '-page'); ?><?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
    <div class="<?php echo e($auth_type ?? 'login'); ?>-box">

        
        <div class="<?php echo e($auth_type ?? 'login'); ?>-logo">
            <a href="<?php echo e($dashboard_url); ?>">

                
                <?php if(config('adminlte.auth_logo.enabled', false)): ?>
                    <img src="<?php echo e(asset(config('adminlte.auth_logo.img.path'))); ?>"
                         alt="<?php echo e(config('adminlte.auth_logo.img.alt')); ?>"
                         <?php if(config('adminlte.auth_logo.img.class', null)): ?>
                            class="<?php echo e(config('adminlte.auth_logo.img.class')); ?>"
                         <?php endif; ?>
                         <?php if(config('adminlte.auth_logo.img.width', null)): ?>
                            width="<?php echo e(config('adminlte.auth_logo.img.width')); ?>"
                         <?php endif; ?>
                         <?php if(config('adminlte.auth_logo.img.height', null)): ?>
                            height="<?php echo e(config('adminlte.auth_logo.img.height')); ?>"
                         <?php endif; ?>>
                <?php else: ?>
                    <img src="<?php echo e(asset(config('adminlte.logo_img'))); ?>"
                         alt="<?php echo e(config('adminlte.logo_img_alt')); ?>" height="50">
                <?php endif; ?>

                
                <?php echo config('adminlte.logo', '<b>Admin</b>LTE'); ?>


            </a>
        </div>

        
        <div class="card <?php echo e(config('adminlte.classes_auth_card', 'card-outline card-primary')); ?>">

            
            <?php if (! empty(trim($__env->yieldContent('auth_header')))): ?>
                <div class="card-header <?php echo e(config('adminlte.classes_auth_header', '')); ?>">
                    <h3 class="card-title float-none text-center">
                        <?php echo $__env->yieldContent('auth_header'); ?>
                    </h3>
                </div>
            <?php endif; ?>

            
            <div class="card-body <?php echo e($auth_type ?? 'login'); ?>-card-body <?php echo e(config('adminlte.classes_auth_body', '')); ?>">
                <?php echo $__env->yieldContent('auth_body'); ?>
            </div>

            
            <?php if (! empty(trim($__env->yieldContent('auth_footer')))): ?>
                <div class="card-footer <?php echo e(config('adminlte.classes_auth_footer', '')); ?>">
                    <?php echo $__env->yieldContent('auth_footer'); ?>
                </div>
            <?php endif; ?>

        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('adminlte_js'); ?>
    <?php echo $__env->yieldPushContent('js'); ?>
    <?php echo $__env->yieldContent('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webAdmin\resources\views/vendor/adminlte/auth/auth-page.blade.php ENDPATH**/ ?>