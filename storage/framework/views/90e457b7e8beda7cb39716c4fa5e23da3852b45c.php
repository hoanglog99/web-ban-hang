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
<?php /**PATH D:\HOC\PHP\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/home/include/_recently.blade.php ENDPATH**/ ?>