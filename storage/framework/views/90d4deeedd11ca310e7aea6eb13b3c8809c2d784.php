
<?php $__env->startSection('css'); ?>
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <style>
            .btn_changepass:hover{
                background-color: #6699FF;
                color: black !important;
                transition: color 0.5s
            }
        </style>
        <h1 class="title">Cập Nhật Thông Tin</h1> 
        <a href="<?php echo e(route('get.user.change_password')); ?>" style="margin-left: 87%;" class="btn btn-primary btn_changepass" type="button">Đổi Mật Khẩu</a>  
        <form action="" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo e(Auth::user()->name); ?>" placeholder="">
                
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo e(Auth::user()->email); ?>" placeholder="Enter email">
                
            </div>
            <div class="form-group">
                <label for="">Phone</label>
                <input type="number" name="phone" class="form-control" value="<?php echo e(Auth::user()->phone); ?>" placeholder="Enter email">
                
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo e(Auth::user()->address); ?>" placeholder="Địa chỉ">
                
            </div>
            <div class="from-group">
                <div class="upload-btn-wrapper">
                    <button class="btn-upload">Upload a file</button>
                    <input type="file" name="avatar" />
                </div>
            </div>

            <button type="submit" class="btn btn-blue btn-md">Cập Nhật Thông Tin</button>
        </form>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HOC\PHP\xampp\htdocs\Hapi2hand_Finally\resources\views/user/update_info.blade.php ENDPATH**/ ?>