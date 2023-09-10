<?php $__env->startSection('css'); ?>
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <div class="title">Danh sách sản phẩm yêu thích</div>
        <div class="row mb-5">
           <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã </th>
                            <th class="w-25" scope="col">Tên sản phẩm</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th scope="row">DH<?php echo e($item->id); ?></th>
                                <th><?php echo e($item->pro_name); ?></th>
                                <th>
                                    <span class="label label-success"><?php echo e($item->category->c_name ?? "[N\A]"); ?></span>
                                </th>
                                <th>
                                    <img src="<?php echo e(pare_url_file($item->pro_avatar)); ?>" style="width: 80px;height: 100px">
                                </th>
                                <th><?php echo e(number_format($item->pro_price,0,',','.')); ?> đ</th>
                                <th>
                                    <a class="btn btn-success" href="<?php echo e(route('get.user.favourite.delete', $item->id)); ?>">Huỷ bỏ</a>
                                </th>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
           </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_user', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Lập Trình Web PHP NC\Project_Laravel\web_ban_giay_L9\resources\views/user/favourite.blade.php ENDPATH**/ ?>