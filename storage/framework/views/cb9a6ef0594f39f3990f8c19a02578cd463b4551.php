<?php $__env->startSection('css'); ?>
    <style>
		<?php $style = file_get_contents('css/auth.min.css');echo $style;?>
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li itemscope="" >
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li itemscope="" >
                    <a itemprop="url" href="" title=""><span itemprop="title">Account</span></a>
                </li>

                <li itemscope="" >
                    <a itemprop="url" href="" title=""><span itemprop="title">Reset Password</span></a>
                </li>

            </ul>
        </div>
        <div class="auth" style="background: white;">
            <form class="from_cart_register" action="" method="post" style="width: 500px;margin:0 auto;padding: 30px 0">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Email <span class="cRed">(*)</span></label>
                    <input name="email" id="name" required="" type="email" class="form-control" placeholder="nguyenvana@gmail.com">
                    <?php if($errors->first('email')): ?>
                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-purple btn-xs">Gửi xác nhận</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_L9\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>