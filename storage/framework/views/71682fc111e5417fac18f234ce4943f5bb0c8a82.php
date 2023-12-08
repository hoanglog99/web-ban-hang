<style type="text/css">
    .item__content .active a {
        color: red;
    }
</style>
<div class="filter-sidebar">
    
    <?php if(isset($country) && !empty($country)): ?>
        <div class="item">
            <div class="item__title">Xuất xứ</div>
            <div class="item__content">
                <ul>
                    <?php $__currentLoopData = $country; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="<?php echo e(Request::get('country') == $item['id'] ? "active" : ""); ?> js-param-search" data-param="country=<?php echo e($item['id']); ?>">
                            <a href="<?php echo e(request()->fullUrlWithQuery(['country'=> $item['id']])); ?>">
                                <span><?php echo e($item['pdr_name']); ?></span>
                            </a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>
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
</div>
<?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/frontend/pages/product/include/_inc_sidebar.blade.php ENDPATH**/ ?>