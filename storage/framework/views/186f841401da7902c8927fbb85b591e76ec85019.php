
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/blog_detail.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li >
                    <a href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                
                <li >
                    <a href="javascript://" title=""><span itemprop="title"><?php echo e($page->s_title ?? ''); ?></span></a>
                </li>
            </ul>
        </div>
        <div class="blog-main" style="margin-bottom: 20px;">
            <div class="left">
                <div class="post-detail">
                    <div class="post-detail__content">
                        <?php echo $page->s_content ?? ''; ?>

                    </div>

                </div>
            </div>
            <div class="right">
                
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/blog_detail.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/static/index.blade.php ENDPATH**/ ?>