
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/blog.min.css')); ?>">
     <style type="text/css">
        .pagination {
            margin: 10px auto;
            display: flex;
            margin-left: 9px;
        }
        .pagination li {
            padding: 5px;
            margin: 0 2px;
            border: 1px solid #dedede;
        }
        .pagination li a, .pagination li span {
            line-height: 25px;
            display: block;
            text-align: center;
            width: 25px;
            height: 25px;
        }
    </style>
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
                <?php if(isset($menu)): ?>
                    <li >
                        <a href="" title="<?php echo e($menu->mn_name); ?>"><span itemprop="title"><?php echo e($menu->mn_name); ?></span></a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
        <div class="blog-main">
            <div class="left">
                <?php if(isset($articleTop)): ?>
                    <div class="post-hot">
                        <?php if($articleTop = $articlesHotTop->first()): ?>
                        <div class="hot-left">
                            <div class="avatar">
                                <a href="<?php echo e(route('get.blog.detail',$articleTop->a_slug.'-'.$articleTop->id)); ?>" title="" class="image cover">
                                    <img class="lazyload" alt="" src="<?php echo e(pare_url_file($articleTop->a_avatar)); ?>">
                                </a>
                            </div>
                            <a href="" title="" class="title"><?php echo e($articleTop->a_name); ?></a>
                            <p class="intro-short"><?php echo e($articleTop->a_description); ?></p>
                        </div>
                        <?php endif; ?>
                        <div class="hot-right">
                            <?php $__currentLoopData = $articlesHotTop; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($i == 0): ?>
                                <div class="top">
                                    <div class="avatar">
                                        <a href="<?php echo e(route('get.blog.detail',$item->a_slug.'-'.$item->id)); ?>" title="" class="image cover">
                                            <img class="lazyload" alt="" src="<?php echo e(pare_url_file($item->a_avatar)); ?>">
                                        </a>
                                    </div>
                                    <a href="<?php echo e(route('get.blog.detail',$item->a_slug.'-'.$item->id)); ?>" title="" class="title"><?php echo e($item->a_name); ?></a>
                                </div>
                            <?php else: ?>
                                <div class="bot">
                                    <a href="<?php echo e(route('get.blog.detail',$item->a_slug.'-'.$item->id)); ?>" title="" class=""><?php echo e($item->a_name); ?></a>
                                </div>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="post-list">
                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('frontend.pages.article.include._inc_blog_item', ['article' => $article], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div style="display: block;">
                        <?php echo $articles->appends([])->links(); ?>

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
    <script src="<?php echo e(asset('js/blog.js')); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/article/index.blade.php ENDPATH**/ ?>