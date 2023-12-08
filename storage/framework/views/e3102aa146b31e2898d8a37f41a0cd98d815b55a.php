<?php if(!empty($product->pro_description)): ?>
    <div class="reviews content_text" style="float: left; width: 100%;">
        <h4 class="reviews-title"><b class="product_details_title">Thông tin khuyến mại</b></h4>
        <div class="product_details_content">
            <?php echo $product->pro_description; ?>

        </div>

    </div>
<?php endif; ?>
<br>

<?php if(!empty($product->pro_content)): ?>
    <div class="reviews content_text" style="float: left; width: 100%;">
        <h4 class="reviews-title"><b class="product_details_title">Chi tiết sản phẩm</b></h4>
        <div class="product_details_content">
            <?php echo $product->pro_content; ?>

        </div>

    </div>
<?php endif; ?>
<?php /**PATH D:\HOC\PHP\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/product_detail/include/_inc_content.blade.php ENDPATH**/ ?>