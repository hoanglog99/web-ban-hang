<?php $__env->startSection('css'); ?>
    <style>
		<?php $style = file_get_contents('css/auth.min.css');echo $style;?>
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li>
                    <a itemprop="url" href="#" title=""><span itemprop="title">Account</span></a>
                </li>

                <li>
                    <a itemprop="url" href="#" title="Đăng ký"><span itemprop="title">Đăng ký</span></a>
                </li>

            </ul>
        </div>
        <div class="auth" style="background: white;">
            <form class="from_cart_register" action="" method="post" style="width: 500px;margin:0 auto;padding: 30px 0">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Name <span class="cRed">(*)</span></label>
                    <input name="name" id="name" type="text" value="<?php echo e(old('name')); ?>" class="form-control" placeholder="Nguyen Van A">
                    <?php if($errors->first('name')): ?>
                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="name">Email <span class="cRed">(*)</span></label>
                    <input name="email" id="name" type="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="nguyenvana@gmail.com">
                    <?php if($errors->first('email')): ?>
                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="phone">Password <span class="cRed">(*)</span></label>
                    <input name="password" id="phone" type="password" placeholder="********" class="form-control">
                    <?php if($errors->first('password')): ?>
                        <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="phone">Điện thoại <span class="cRed">(*)</span></label>
                    <input name="phone" id="phone" type="number" value="<?php echo e(old('phone')); ?>" placeholder="123456789" class="form-control">
                    <?php if($errors->first('phone')): ?>
                        <span class="text-danger"><?php echo e($errors->first('phone')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group">
                    <button class="btn btn-purple btn-xs">Đăng ký</button>
                    <a href="<?php echo e(route('get.email_reset_password')); ?>">Quên mật khẩu</a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        <?php $js = file_get_contents('js/home.js');echo $js;?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/auth/register.blade.php ENDPATH**/ ?>