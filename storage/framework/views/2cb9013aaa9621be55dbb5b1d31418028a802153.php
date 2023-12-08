<div class="reviews content_text">
    <h4 class="reviews-title"><b><?php echo e($product->pro_review_total); ?></b> đánh giá sản phẩm</h4>
    <div class="dashboards">
        <div class="item dashboards_sum">
            <?php
                $age = 0;
                if ($product->pro_review_total)
                    $age = round($product->pro_review_star / $product->pro_review_total,2);
            ?>
            <span> <?php echo e($age); ?> <i class="la la-star"></i></span>
        </div>
        <div class="item dashboards_item">
            <?php $__currentLoopData = $ratingDefault; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item_review">
                    <span class="item_review-name"><?php echo e($key); ?> <i class="la la-star"></i></span>
                    <div class="item_review-process">
                        <div>
                            <?php 
                                $ageItem = 0;
                                if ($product->pro_review_total)
                                    $ageItem = ($item['count_number'] / $product->pro_review_total) * 100 ;
                            ?>
                            <span style="width: <?php echo e($ageItem); ?>%;"> </span>
                        </div>
                    </div>
                    <span class="item_review-count"><b><?php echo e($item['count_number']); ?></b> đánh giá</span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php if(\Request::route()->getName() == 'get.product.rating_list'): ?>
        <?php echo $__env->make('frontend.pages.product_detail.include._inc_filter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="block-reviews" id="block-review">
        <form action="<?php echo e(route('ajax_post.user.rating.add')); ?>" id="form-review" method="POST">
            <?php echo csrf_field(); ?>
            <div>
                <p style="margin-bottom: 0">
                    <span>Chọn đánh giá của bạn</span>
                    <span id="ratings">
                        <?php for($i =1 ; $i <= 5 ; $i ++): ?>
                            <i class="la la-star active" data-i="<?php echo e($i); ?>"></i>
                        <?php endfor; ?>
                    </span>
                    <span class="reviews-text" id="reviews-text">Tuyệt vời</span>
                </p>
                <span style="color: red;margin-bottom: 10px;display: block">(Click vào ngôi sao để đánh giá)</span>
            </div>
            <div>
                <textarea name="content_review"  id="rv_content" cols="30" rows="5" placeholder="Nhập đánh giá sản phẩm (Tối thiểu 80 ký tự )"></textarea>
                <input type="hidden" name="review" id="review_value" value="5">
                <input type="hidden" name="product_id"  value="<?php echo e($product->id); ?>">
            </div>
            <button type="submit" style="font-size: 14px;margin-top: 10px" class="btn btn-success js-process-review">Gửi đánh giá</button>
        </form>
    </div>
    <div class="reviews_list">
        <?php echo $__env->make('frontend.pages.product_detail.include._inc_list_reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
    </div>
</div><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/product_detail/include/_inc_ratings.blade.php ENDPATH**/ ?>