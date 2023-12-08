<?php if(isset($articles)): ?>
    <div class="top-question">
        <div class="title">Bài viết hot</div>
        <ul>
            <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <span class="stt"><?php echo e($key + 1); ?></span>
                <a href="<?php echo e(route('get.blog.detail',$item->a_slug.'-'.$item->id)); ?>"><?php echo e($item->a_name); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/components/articles_hot_sidebar_top.blade.php ENDPATH**/ ?>