<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <title><?php echo e(strtolower($title_page ?? "Hapi2hand")); ?></title>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="icon" sizes="32x32" type="image/png" href="<?php echo e(asset('ico.png')); ?>" />
    <?php echo $__env->yieldContent('css'); ?>

    
    <?php if(session('toastr')): ?>
        <script>
			var TYPE_MESSAGE = "<?php echo e(session('toastr.type')); ?>";
			var MESSAGE = "<?php echo e(session('toastr.message')); ?>";
        </script>
    <?php endif; ?>
</head>
<body>
<?php echo $__env->make('frontend.components.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="container user">
    <div class="left">
        <div class="header">
            <img src="<?php echo e(pare_url_file(Auth::user()->avatar)); ?>" alt="">
            <p>
                <span>Tài khoản của</span>
                <span><?php echo e(Auth::user()->name); ?></span>
            </p>
        </div>
        <p>Đăng nhập lần cuối <b><?php echo e(get_time_login(Auth::user()->log_login)['time'] ?? ""); ?></b></p>
        <div class="content">
            <ul class="left-nav">
                <?php $__currentLoopData = config('user'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route($item['route'])); ?>" class="<?php echo e(\Request::route()->getName() == $item['route'] ? 'active' : ''); ?>">
                            <i class="<?php echo e($item['icon']); ?>"></i>
                            <span><?php echo e($item['name']); ?></span>
                        </a>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <div class="right">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <div class="" style="clear: both"></div>
</div>
<?php echo $__env->make('frontend.components.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<script>
	var DEVICE = '<?php echo e(device_agent()); ?>'
</script>
<script src="<?php echo e(asset('js/cart.js')); ?>" type="text/javascript"></script>

<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/layouts/app_master_user.blade.php ENDPATH**/ ?>