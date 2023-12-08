<div class="item">
    <p class="item_author">
        <span><?php echo e($rating->user->name ?? "Admin"); ?></span>
        <span class="item_success"><i class="la la-check-circle"></i> Đã mua hàng tại Hapi2hand</span>
    </p>
    <div class="item_review">
        <span class="item_review">
            <?php for($j = 1 ; $j <= 5 ; $j ++): ?>
                <i class="la la-star <?php echo e($j <= $rating->r_number ? 'active' : ''); ?>"></i>
            <?php endfor; ?>
        </span>
        <?php echo e($rating->r_content); ?>

    </div>
    <div class="item_footer">
        <span class="item_time"><i class="la la-clock-o"></i> đánh giá <?php echo e($rating->created_at); ?></span>
    </div>
</div><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/frontend/pages/product_detail/include/_inc_rating_item.blade.php ENDPATH**/ ?>