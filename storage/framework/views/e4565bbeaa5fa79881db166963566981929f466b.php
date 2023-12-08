
<?php $__env->startSection('css'); ?>
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="title">Trang tổng quan cá nhân</div>
        <div class="row">
            <div class="col-3">
                <div class="box-count" style="background: #00c0ef">
                    <div class="count-text"><?php echo e($totalTransaction); ?></div>
                    <p class="count-name">Tổng đơn</p>
                </div>
            </div>
            <div class="col-3">
                <div class="box-count" style="background: #dd4b39">
                    <div class="count-text"><?php echo e($totalTransactionCancel); ?></div>
                    <p class="count-name">Đơn huỷ</p>
                </div>
            </div>
            <div class="col-3">
                <div class="box-count" style="background: #f39c12">
                    <div class="count-text"><?php echo e($totalTransactionProcess); ?></div>
                    <p class="count-name">Tiếp nhận && Giao hàng</p>
                </div>
            </div>
            <div class="col-3">
                <div class="box-count" style="background: #00a65a">
                    <div class="count-text"><?php echo e($totalTransactionSuccess); ?></div>
                    <p class="count-name">Hoàn thành</p>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/user/dashboard.blade.php ENDPATH**/ ?>