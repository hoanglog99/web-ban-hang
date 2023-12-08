
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/user.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="title">Chi tiết đơn hàng #<?php echo e($transaction->id); ?></div>
        <div class="row">
            <div class="col-4">
                <h5>Thông tin người nhận</h5>
                <div class="box">
                    <p><b><?php echo e($transaction->user->name ?? "[N\A]"); ?></b></p>
                    <p>Địa chỉ: <span><?php echo e($transaction->tst_address); ?></span></p>
                </div>
            </div>
            <div class="col-4">
                <h5>Hình thức giao hàng</h5>
                <div class="box">
                    <p>Phí vận chuyển : <span>0 đ</span></p>
                </div>
            </div>
            <div class="col-4">
                <h5>Hình thức thanh toán</h5>
                <div class="box">
                    <p>Hình thức: <b>Giao hàng nhận tiền</b></p>
                    <p>Tổng tiền: <b><?php echo e(number_format($transaction->tst_total_money,0,',','.')); ?> VNĐ</b></p>
                </div>
            </div>
        </div>
        <div class="content">
            <h4>Thông tin sản phẩm</h4>
            <?php echo $__env->make('user.include._inc_list_product_order', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div>
                <a href="<?php echo e(route('get.user.transaction')); ?>" class="btn btn-light"><i class="fa fa-angle-double-left"></i> Quay lại đơn hàng</a>
                <?php if($transaction->tst_status != -1): ?>
                    <a href="<?php echo e(route('get.user.tracking_order', $transaction->id)); ?>" class="btn btn-primary js-">Theo dõi đơn hàng <i class="fa fa-angle-double-right"></i></a>
                <?php endif; ?>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HOC\PHP\xampp\htdocs\Hapi2hand_Finally\resources\views/user/order.blade.php ENDPATH**/ ?>