
<?php $__env->startSection('content'); ?>
    <div class="container mt-5 text-center">
        <div class="card">
            <div class="card-body">
                <h2>Brdev Framework.</h2>
                <p>version <b>1.0</b> PHP <?php echo e(phpversion()); ?></p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.theme', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\BRdev-framework\themes\views/web/welcome.blade.php ENDPATH**/ ?>