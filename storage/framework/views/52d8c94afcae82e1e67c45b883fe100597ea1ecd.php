<section id="box-news">
    <div class="top"><a href="#" class="main-title">Tin tức</a></div>
    <div class="bot">
        <?php $__currentLoopData = $articlesHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col">
                <div class="item">
                    <div class="item__image">
                        <a href="<?php echo e(route('get.blog.detail',$item->a_slug.'-'.$item->id)); ?>"
                           title="<?php echo e($item->a_name); ?>">
                            <img class="lazyload lazy" src="<?php echo e(asset('images/preloader.gif')); ?>"
                                 data-src="<?php echo e(pare_url_file($item->a_avatar)); ?>" alt="<?php echo e($item->a_name); ?>">
                        </a>
                    </div>
                    <div class="item__content">
                        <div class="date-time"><i class="fa fa-calendar"></i> <span><?php echo e($item->created_at); ?></span></div>
                        <h3><a href="<?php echo e(route('get.blog.detail',$item->a_slug.'-'.$item->id)); ?>" class="title"
                               title="<?php echo e($item->a_name); ?>"><?php echo e($item->a_name); ?></a></h3>
                        <p class="description"> <?php echo e($item->a_description); ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</section>
<?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/frontend/pages/home/include/_inc_article.blade.php ENDPATH**/ ?>