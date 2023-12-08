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
            <form class="from_cart_register" id="forgotForm" action="" method="post" style="width: 500px;margin:0 auto;padding: 30px 0">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <p id="forgot-success" style="text-align: center; font-weight: bold; font-size: large;"></p>
                    <p id="forgot-error" style="text-align: center; font-weight: bold; font-size: large;"></p>
                    <label for="name">Email <span class="cRed">(*)</span></label>
                    <input name="email" id="name" required="" type="email" class="form-control" placeholder="nguyenvana@gmail.com"
                    oninvalid="this.setCustomValidity('Vui lòng nhập chính xác Email!')" oninput="setCustomValidity('')">
                    <?php if($errors->first('email')): ?>
                        <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="form-group" style="padding: 0 20%; display: flex;">
                    <button class="btn btn-purple btn-xs"  id="btnGetPassword">Lấy lại mật khẩu</button>
                    <a href="<?php echo e(route('get.login')); ?>" type="button" class="btn btn-purple btn-xs"  id="btnGetPassword">Quay lại trang đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <!-- AJAX Forgot -->
     <script>
        $("#forgotForm").submit(function(event) {
            event.preventDefault();
            var formdata = $(this).serialize();
            $.ajax({
                url: "/account/forget-password",
                type: "POST",
                data: formdata,
                success: function(resp) {
                    if (resp.type == "error") {
                        $("#forgot-email").hide();
                        $(".loader").hide();
                        $("#forgot-error").css('color', 'red');
                        $("#forgot-error").html(resp.errors.email);
                        setTimeout(function() {
                        $("#forgot-error").html('');
                        }, 4000);
                    } else if (resp.type == "success") {
                        $("#forgot-email").hide();
                        $(".loader").hide();
                        $("#forgot-success").css('color', 'green');
                        $("#forgot-success").html(resp.message);   
                        setTimeout(function() {
                        $("#forgot-success").html('');
                        }, 4000);
                    }
                },
                error: function() {
                    alert("Error");
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/auth/passwords/forget.blade.php ENDPATH**/ ?>