<div class="blog-top">
    <div class="title"> Bài viết nổi bật</div>
    
    <div class="bot">
        <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <a href="<?php echo e(route('get.blog.detail',$article->a_slug.'-'.$article->id)); ?>" title="<?php echo e($article->a_name); ?>" class="image cover">
                    <img  class="lazyload lazy" src="<?php echo e(asset('images/preloader.gif')); ?>"  alt="<?php echo e($article->a_name); ?>" data-src="<?php echo e(pare_url_file($article->a_avatar)); ?>">
                    <p><?php echo e($article->a_name); ?></p>
                </a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/frontend/components/hot_article.blade.php ENDPATH**/ ?>