<table class="table">
    <thead>
    <tr>
        <th style="width: 100px;">Hình ảnh</th>
        <th style="width: 30%">Sản phẩm</th>
        <th class="text-center">Giá</th>
        <th class="text-center">Số lượng</th>
        <th class="text-center">Thành tiền</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <a href="<?php echo e(route('get.product.detail',\Str::slug($item->product->pro_slug ?? '').'-'.$item->od_product_id)); ?>"
                   title="<?php echo e($item->name); ?>" class="avatar image contain">
                    <img alt="" src="<?php echo e(pare_url_file($item->product->pro_avatar ?? '')); ?>" style="width: 80px;height: 80px;" class="lazyload">
                </a>
            </td>
            <td>
                <a href="<?php echo e(route('get.product.detail',\Str::slug($item->product->pro_slug ?? '').'-'.$item->od_product_id)); ?>">
                    <strong><?php echo e(strtolower($item->product->pro_name ?? '')); ?></strong>
                </a>
            </td>
            <td class="text-center">
                <p><b><?php echo e(number_format($item->od_price,0,',','.')); ?> đ</b></p>
            </td>
            <td class="text-center">
                <span><?php echo e($item->od_qty); ?></span>
            </td>
            <td class="text-center">
                <span class="js-total-item"><b><?php echo e(number_format($item->od_price * $item->od_qty,0,',','.')); ?> đ</b></span>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/user/include/_inc_list_product_order.blade.php ENDPATH**/ ?>