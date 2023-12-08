<div class="blog-item">
    <div class="avatar">
        <a href="<?php echo e(route('get.blog.detail',$article->a_slug.'-'.$article->id)); ?>" title="<?php echo e($article->a_name); ?>" class="image cover">
            <img class="lazyload lazy" alt="" src="<?php echo e(asset('images/preloader.gif')); ?>"  data-src="<?php echo e(pare_url_file($article->a_avatar)); ?>">
        </a>
    </div>
    <div class="info">
        <a href="<?php echo e(route('get.blog.detail',$article->a_slug.'-'.$article->id)); ?>" title="<?php echo e($article->a_name); ?>"
            ><?php echo e($article->a_name); ?></a>
        <p><?php echo e($article->a_description); ?></p>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/article/include/_inc_blog_item.blade.php ENDPATH**/ ?>