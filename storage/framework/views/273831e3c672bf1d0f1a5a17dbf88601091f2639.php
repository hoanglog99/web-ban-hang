
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/user.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="title">Theo dõi đơn hàng #<?php echo e($transaction->id); ?></div>
        <div class="content">
            <h4>Trạng thái đơn hàng</h4>
            <div class="progress">
                <p>Trạng thái <b><?php echo e($transaction->getStatus($transaction->tst_status)['name']); ?></b></p>
                <div class="progress-bar">
                    <?php $__currentLoopData = config('shopping_cart.progress'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="progress-item <?php echo e((int)$key < $transaction->tst_status ? 'active' : ''); ?>">
                            <span><?php echo e($item); ?></span>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <h4>Đơn hàng gồm có</h4>
            <?php echo $__env->make('user.include._inc_list_product_order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div>
                <a href="<?php echo e(route('get.user.transaction')); ?>" class="btn btn-light"><i class="fa fa-angle-double-left"></i> Quay lại đơn hàng</a>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/user/tracking_order.blade.php ENDPATH**/ ?>