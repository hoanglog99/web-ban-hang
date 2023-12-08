
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/static.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li itemscope="" >
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li itemscope="" >
                    <a itemprop="url" href="#" title=""><span itemprop="title">Liên hệ</span></a>
                </li>
            </ul>
        </div>
        <div class="auth" style="background: white;">
            <form class="from_cart_register" action="" method="post" style="width: 500px;margin:0 auto;padding: 30px 0">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="phone">Tiêu đề <span class="cRed">(*)</span></label>
                    <input name="c_title" id="phone" required type="text"  placeholder="" class="form-control" oninvalid="this.setCustomValidity('Vui lòng nhập đầy đủ thông tin')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label for="name">Email <span class="cRed">(*)</span></label>
                    <input name="c_email" id="name" required type="email" class="form-control" placeholder="" oninvalid="this.setCustomValidity('Vui lòng nhập đầy đủ thông tin, định dạng email')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label for="phone">Điện thoại <span class="cRed">(*)</span></label>
                    <input name="c_phone" id="phone" required type="number" placeholder="" class="form-control" oninvalid="this.setCustomValidity('Vui lòng nhập đầy đủ thông tin')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label for="phone">Nội dung <span class="cRed">(*)</span></label>
                    <textarea name="c_content" required class="form-control" id="" cols="30" rows="10" oninvalid="this.setCustomValidity('Vui lòng nhập đầy đủ thông tin')" oninput="setCustomValidity('')"></textarea>
                </div>
                <div class="form-group " style="text-align: center">
                    <button class="btn btn-purple">Gửi thông tin</button>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/contact/index.blade.php ENDPATH**/ ?>