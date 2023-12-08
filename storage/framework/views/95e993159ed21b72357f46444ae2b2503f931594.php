<div class="best-sell">
    <div class="title">Top bán chạy nhất</div>
    <div class="content">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <div class="item__avatar">
                    <a href="<?php echo e(route('get.product.detail',$product->pro_slug . '-'.$product->id )); ?>" title="" class="image cover">
                        <img  class="lazyload lazy" src="<?php echo e(asset('images/preloader.gif')); ?>"  alt="" data-src="<?php echo e(pare_url_file($product->pro_avatar)); ?>">
                    </a>
                </div>
                <div class="item__info">
                    <a href="#" title="" class="cate"><?php echo e($product->category->c_name ?? "[N\A]"); ?></a>
                    <?php if($product->pro_sale): ?>
                        <a href="" title="SaleOff" class="cate sale">-<?php echo e($product->pro_sale); ?>%</a>
                    <?php endif; ?>
                    <a href="<?php echo e(route('get.product.detail',$product->pro_slug . '-'.$product->id )); ?>" title="" class="name"><?php echo e($product->pro_name); ?></a>
                    <?php if($product->pro_sale): ?> 
                        <p class="price">
                            <span>Giá bán: </span>
                            <span class="new"><?php echo e(number_format(number_price($product->pro_price,$product->pro_sale),0,',','.')); ?> đ</span>
                        </p>
                        <p class="price">
                            <span>Giá gốc: </span>
                            <span class="old"><?php echo e(number_format($product->pro_price,0,',','.')); ?> đ</span>
                        </p>
                    <?php else: ?> 
                        <p class="price">
                            <span>Giá bán: </span>
                            <span class="new"><?php echo e(number_format($product->pro_price,0,',','.')); ?> đ</span>
                        </p>
                    <?php endif; ?>
                    
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/components/top_product.blade.php ENDPATH**/ ?>