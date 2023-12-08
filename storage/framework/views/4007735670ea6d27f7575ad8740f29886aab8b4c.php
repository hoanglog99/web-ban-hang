<?php $__currentLoopData = $ratings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="item">
        <p class="item_author">
            <span><?php echo e($item->user->name ?? "[N\A]"); ?></span>
            <span class="item_success"><i class="la la-check-circle"></i> Đã đánh giá sản phẩm tại Siêu Thị Của Chúng Tôi</span>
        </p>
        <div class="item_review">
            <span class="item_review">
                <?php for($j = 1 ; $j <= 5 ; $j ++): ?>
                    <i class="la la-star <?php echo e($j <= $item->r_number ? 'active' : ''); ?>"></i>
                <?php endfor; ?>
            </span>
            <?php echo e($item->r_content); ?>

        </div>
        <div class="item_footer">
            <span class="item_time"><i class="la la-clock-o"></i> đánh giá <?php echo e($item->created_at); ?></span>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(\Request::route()->getName() == 'get.product.rating_list'): ?>
    <div>
        <?php echo $ratings->appends($query ?? [])->links(); ?>

    </div>
<?php else: ?> 
    <a href="<?php echo e(route('get.product.rating_list',$product->pro_slug . '-'.$product->id )); ?>" class="btn-load-rating">Xem tất cả đánh giá <i class="la la-angle-right"></i></a>
<?php endif; ?><?php /**PATH D:\HOC\PHP\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/product_detail/include/_inc_list_reviews.blade.php ENDPATH**/ ?>