<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý menu</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.menu.index')); ?>"> Menu</a></li>
            <li class="active"> List </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo e(route('admin.menu.create')); ?>" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
               </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tên</th>
                                    <th>Ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Hot</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                <?php if($menus): ?>
                                    <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($menu->id); ?></td>
                                            <td><?php echo e($menu->mn_name); ?></td>
                                            <td>
                                                <img src="<?php echo e(pare_url_file($menu->mn_avatar)); ?>" style="width: 80px;height: 80px;">
                                            </td>
                                            <td>
                                                <?php if($menu->mn_status == 1): ?>
                                                    <a href="<?php echo e(route('admin.menu.active', $menu->id)); ?>" class="label label-info">Show</a>
                                                <?php else: ?> 
                                                    <a href="<?php echo e(route('admin.menu.active', $menu->id)); ?>" class="label label-default">Hide</a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($menu->mn_hot == 1): ?>
                                                    <a href="<?php echo e(route('admin.menu.hot', $menu->id)); ?>" class="label label-info">Hot</a>
                                                <?php else: ?> 
                                                    <a href="<?php echo e(route('admin.menu.hot', $menu->id)); ?>" class="label label-default">None</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($menu->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.menu.update', $menu->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo e(route('admin.menu.delete', $menu->id)); ?>" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/admin/menu/index.blade.php ENDPATH**/ ?>