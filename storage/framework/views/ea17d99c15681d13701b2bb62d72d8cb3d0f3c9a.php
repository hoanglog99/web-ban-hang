<style type="text/css">
    .item__content .active a {
        color: red;
    }
</style>
<div class="filter-sidebar">
    
    <?php if(isset($attributes)): ?>
        <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($attribute['attributes'])): ?>
                <div class="item">
                    <div class="item__title"><?php echo e($attribute['t_name']); ?></div>
                    <div class="item__content">
                        <ul>
                            <?php $__currentLoopData = $attribute['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class=" js-param-search <?php echo e(Request::get('attr_'.$item['atb_type_id']) == $item['id'] ? "active" : ""); ?>"
                                data-param="attr_<?php echo e($item['atb_type_id']); ?>=<?php echo e($item['id']); ?>">
                                    <a href="<?php echo e(request()->fullUrlWithQuery(['attr_'.$item['atb_type_id'] => $item['id']])); ?>">
                                        <span><?php echo e($item['atb_name']); ?></span>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <div class="item">
        <div class="item__title">Đánh giá</div>
        <div class="item__content ratings">
            <ul>
                <?php for($i = 5 ; $i >0 ; $i--): ?>
                    <li class="js-param-search <?php echo e(Request::get('rv') == $i ? "active" : ""); ?>" data-param="rv=<?php echo e($i); ?>">
                        <a href="<?php echo e(request()->fullUrlWithQuery(['rv'=> $i])); ?>">
                            <span>
                                <?php for($j = 1 ; $j <= 5 ; $j ++): ?>
                                    <i class="la la-star <?php echo e($j <= $i ? 'active' : ''); ?>"></i>
                                <?php endfor; ?>
                                <?php echo e($i < 5 ? 'Trở lên' : ''); ?>

                            </span>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        </div>
    </div>
    <div class="item">
        <div class="item__content ratings">
            <ul>
                <li class="js-param-search <?php echo e(Request::get('status') == 1 ? "active" : ""); ?>" data-param="status=1">
                    <a href="<?php echo e(request()->fullUrlWithQuery(['status'=> 1])); ?>">
                        <span>
                            Còn hàng
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="item">
        <div style="height: 10px"></div>
        <form action="<?php echo e(request()->fullUrl()); ?>" method="get">
            <label for="min_price">Giá tối thiểu:</label>
            <input type="number" id="min_price" name="min_price" value="<?php echo e(Request::get('min_price')); ?>" min="0">
    
            <label for="max_price">Giá tối đa:</label>
            <input type="number" id="max_price" name="max_price" value="<?php echo e(Request::get('max_price')); ?>" min="0">
    
            <button class="btn btn-success" style="margin-top:10px;background-color: blue" type="submit">Tìm kiếm</button>
        </form>
    </div>
</div>
<?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/product/include/_inc_sidebar.blade.php ENDPATH**/ ?>