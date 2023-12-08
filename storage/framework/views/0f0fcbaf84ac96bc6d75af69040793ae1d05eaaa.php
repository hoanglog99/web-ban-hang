<?php $__env->startSection('css'); ?>
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="title">Danh sách đơn hàng</div>
        <form class="form-inline">
            <div class="form-group " style="margin-right: 10px;">
                <input type="text" class="form-control" value="<?php echo e(Request::get('id')); ?>" name="id" placeholder="ID">
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <select name="status" class="form-control">
                    <option value="">Trạng thái</option>
                    <option value="1" <?php echo e(Request::get('status') == 1 ? "selected='selected'" : ""); ?>>Tiếp nhận</option>
                    <option value="2" <?php echo e(Request::get('status') == 2 ? "selected='selected'" : ""); ?>>Đang vận chuyển
                    </option>
                    <option value="3" <?php echo e(Request::get('status') == 3 ? "selected='selected'" : ""); ?>>Hoàn thành
                    </option>
                    <option value="-1" <?php echo e(Request::get('status') == -1 ? "selected='selected'" : ""); ?>>Huỷ bỏ</option>
                </select>
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <button type="submit" class="btn btn-pink btn-sm">Tìm kiếm</button>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã đơn</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <th scope="row">
                        <a href="<?php echo e(route('get.user.order', $transaction->id)); ?>">DH<?php echo e($transaction->id); ?></a>
                    </th>
                    <th><?php echo e($transaction->tst_name); ?></th>
                    <th><?php echo e(number_format($transaction->tst_total_money,0,',','.')); ?> đ</th>
                    <th><?php echo e($transaction->created_at); ?></th>
                    <th>
                        <span
                            class="label label-<?php echo e($transaction->getStatus($transaction->tst_status)['class']); ?>">
                            <?php echo e($transaction->getStatus($transaction->tst_status)['name']); ?>

                        </span>
                    </th>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Lập Trình Web PHP NC\Project_Laravel\web_ban_giay_L9\resources\views/user/transaction.blade.php ENDPATH**/ ?>