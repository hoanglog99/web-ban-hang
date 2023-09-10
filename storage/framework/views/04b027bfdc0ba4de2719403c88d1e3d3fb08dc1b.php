<div class="top">
    <a href="#" class="main-title">SẢN PHẨM VỪA XEM</a>
</div>
<div class="bot">
    <?php if(isset($products)): ?>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="item">
                <?php echo $__env->make('frontend.components.product_item',['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
</div>
<?php /**PATH C:\wamp64\www\PHP_Laravel\web_ban_giay_L9\resources\views/frontend/pages/home/include/_recently.blade.php ENDPATH**/ ?>