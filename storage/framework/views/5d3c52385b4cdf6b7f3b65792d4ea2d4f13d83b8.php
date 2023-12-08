<table class="table table-condensed">
    <tbody>
        <tr>
            <th style="width: 10px">#</th>
            <th style="width: 250px">Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
            <!-- <th>Hành động</th> -->
        </tr>
        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>#<?php echo e($item->id); ?>.</td>
                <td>
                    <a href=""><?php echo e($item->product->pro_name ?? "[N\A]"); ?></a>
                    <br>
                    <span>
                        <?php if($item->od_size): ?>
                            Size : <?php echo e($item->od_size); ?>

                        <?php endif; ?>
                    </span>
                    <br>
                    <span>
                        <?php if($item->od_color): ?>
                            Color : <?php echo e($item->od_color); ?>

                        <?php endif; ?>
                    </span>
                    <br>
                    <span>
                        <?php if($item->od_color): ?>
                            Giới tính : <?php echo e($item->od_gender == 1 ? 'Nam' :  'Nữ'); ?>

                        <?php endif; ?>
                    </span>
                </td>
                <td>
                    <img alt="" style="width: 60px;height: 80px" src="<?php echo e(pare_url_file($item->product->pro_avatar ?? "")); ?>" class="lazyload">
                </td>
                <td><?php echo e(number_format($item->od_price,0,',','.')); ?> đ</td>
                <td><?php echo e($item->od_qty); ?></td>
                <td><?php echo e(number_format($item->od_price * $item->od_qty,0,',','.')); ?> đ</td>
                <!-- <td>
                    <a href="<?php echo e(route('ajax_admin.transaction.order_item', $item->id)); ?>" class="btn btn-xs btn-danger js-delete-order-item">Delete</a>
                </td> -->
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH D:\HOC\PHP\xampp\htdocs\Hapi2hand_Finally\resources\views/components/orders.blade.php ENDPATH**/ ?>