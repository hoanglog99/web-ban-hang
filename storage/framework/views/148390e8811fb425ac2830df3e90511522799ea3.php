<div id="slider">
    <div class="imageSlide js-banner owl-carousel">
        <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div>
                <a href="<?php echo e($item->sd_link); ?>" title="<?php echo e($item->sd_title); ?>">
                    <img alt="Đồ án tốt nghiệp" src="<?php echo e(pare_url_file($item->sd_image)); ?>"  style="max-width: 100%;height: 500px;" class="" />
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\web_ban_giay_L9\resources\views/frontend/pages/home/include/_inc_slide.blade.php ENDPATH**/ ?>