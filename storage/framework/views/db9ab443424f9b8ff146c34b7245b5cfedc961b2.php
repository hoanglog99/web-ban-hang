<div class="filter">
    <div>Lọc theo :</div>
    <div>
        <ul>
            <li class="">
                <a href="<?php echo e(route('get.product.rating_list',$product->pro_slug . '-'.$product->id )); ?>"
                   class="<?php echo e(Request::get('s') ? '' : 'active'); ?> js-number-rating">Tất cả</a></li>
            <?php for($i = 5 ; $i >= 1 ; $i --): ?>
                <li><a class="<?php echo e(Request::get('s') == $i ? 'active' : ''); ?> js-number-rating"
                    href="<?php echo e(request()->fullUrlWithQuery(['s'=> $i])); ?>" ><?php echo e($i); ?> sao</a></li>
            <?php endfor; ?>
        </ul>
    </div>
</div>
<?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/frontend/pages/product_detail/include/_inc_filter.blade.php ENDPATH**/ ?>