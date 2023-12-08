
<?php $__env->startSection('css'); ?>
<style>
    <?php $style = file_get_contents('css/user.min.css');
    echo $style; ?>
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<section>
    <h1 class="title text-center" style="font-size: x-large !important; font-weight: bold;">Đổi Mật Khẩu</h1>
    <?php if(session('success')): ?>
        <div class="alert alert-success text-center" style="color: #009900; font-weight: 600; font-size: large;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <form action="<?php echo e(route('get.user.savePassword')); ?>" method="POST" enctype="multipart/form-data" id="changePasswordForm">
        <?php echo csrf_field(); ?>
        <div class="form-group">
            <label for="">Mật khẩu hiện tại</label>
            <input type="password" name="current_password" class="form-control" value="" placeholder="Nhập mật khẩu hiện tại">
            <?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <div class="alert alert-danger" style="color: red; font-weight: 500;"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mật khẩu mới</label>
            <input type="password" class="form-control" name="new_password" value="" placeholder="Nhập mật khẩu mới">
            <?php $__errorArgs = ['new_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <div class="alert alert-danger" style="color: red; font-weight: 500;"><?php echo e($message); ?></div>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>
        <button type="submit" class="btn btn-blue btn-md">Đổi Mật Khẩu</button>
    </form>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/user/change_pass.blade.php ENDPATH**/ ?>