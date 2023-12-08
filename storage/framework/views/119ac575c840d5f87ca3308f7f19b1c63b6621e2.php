<?php if(isset($product)): ?>
    <div class="product-item">
        <a href="<?php echo e(route('get.product.detail',$product->pro_slug . '-'.$product->id )); ?>" title="" class="avatar image contain">
            <img alt="<?php echo e($product->pro_name); ?>" data-src="<?php echo e(pare_url_file($product->pro_avatar)); ?>" src="<?php echo e(asset('images/preloader.gif')); ?>" class="lazyload lazy">
            <?php if($product->pro_number <= 0): ?>
                <div class="sold-out">Hết hàng</div>
            <?php endif; ?>
        </a>
        <a href="<?php echo e(route('get.product.detail',$product->pro_slug . '-'.$product->id )); ?>"
         title="<?php echo e($product->pro_name); ?>" class="title">
            <h3><?php echo e($product->pro_name); ?></h3>
        </a>

        <p class="rating">
            <span>
                <?php 
                    $iactive = 0;
                    if ($product->pro_review_total){
                        $iactive = round($product->pro_review_star / $product->pro_review_total,2);    
                    }
                    
                ?>
                <?php for($i = 1 ; $i <= 5 ; $i ++): ?>
                    <i class="la la-star <?php echo e($i <= $iactive ? 'active' : ''); ?>"></i>
                <?php endfor; ?>
            </span>
            <span class="text"><?php echo e($product->pro_review_total); ?> đánh giá</span>
        </p>
        <?php if($product->pro_sale): ?>
            <p>
                <span class="percent">(-<?php echo e($product->pro_sale); ?>%)</span>
                <?php 
                    $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                ?>
                <span class="price"><?php echo e(number_format($price,0,',','.')); ?> đ</span>
                <span class="price-sale"><?php echo e(number_format($product->pro_price,0,',','.')); ?> đ</span>
            </p>
        <?php else: ?> 
            <p class="price"><?php echo e(number_format($product->pro_price,0,',','.')); ?> đ</p>
        <?php endif; ?>
    </div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/components/product_item.blade.php ENDPATH**/ ?>