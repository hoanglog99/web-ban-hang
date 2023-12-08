<div class="item">
    <p class="item-auth"><span><?php echo e(get_name_short($comment->user->name ?? "[N\A]")); ?></span><span><?php echo e($comment->user->name ?? "[N\A]"); ?></span></p>
    <p class="item-content"><?php echo e($comment->cmt_content); ?></p>
    <p class="item-footer">
        <a href="" class="js-show-form-reply" data-name="<?php echo e($comment->user->name ?? "[N\A]"); ?>"
           data-id="<?php echo e($comment->cmt_parent_id ? $comment->cmt_parent_id : $comment->id); ?>" data-product="<?php echo e($comment->cmt_product_id); ?>">Trả lời</a>
        <span>-</span>
        <a href=""><?php echo e($comment->created_at->diffForHumans()); ?></a>
    </p>
</div>
<?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/frontend/pages/product_detail/include/_inc_comment_item.blade.php ENDPATH**/ ?>