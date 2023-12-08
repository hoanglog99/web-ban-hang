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
                    <a href="<?php echo e(route('get.blog.home')); ?>" title=""><span itemprop="title">Bài viết</span></a>
                </li>
                <li >
                    <a href="javascript://" title=""><span itemprop="title"><?php echo e($article->a_name); ?></span></a>
                </li>
            </ul>
        </div>
        <div class="blog-main">
            <div class="left">
                <div class="post-detail">
                    <h1 class="post-detail__title"><?php echo e($article->a_name); ?></h1>
                    <p class="post-detail__intro"><?php echo e($article->a_description); ?></p>
                    <div class="post-detail__content">
                        <?php echo $article->a_content; ?>

                    </div>
                    <div class="post-detail_suggest" style="margin: 10px 0">
                        <h3 >Bài viết liên quan</h3>
                        <ul>
                            <?php $__currentLoopData = $articleSuggest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('get.blog.detail',$item->a_slug.'-'.$item->id)); ?>">
                                <span ><?php echo e(($key + 1)); ?></span> <?php echo e($item->a_name); ?></a>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right">
                <?php echo $__env->make('frontend.components.articles_hot_sidebar_top',['articles' => $articlesHotSidebarTop], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('frontend.components.top_product',['products' => $productTopPay], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('frontend.components.hot_article',['articles'  => $articlesHot], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/blog_detail.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/frontend/pages/article_detail/index.blade.php ENDPATH**/ ?>