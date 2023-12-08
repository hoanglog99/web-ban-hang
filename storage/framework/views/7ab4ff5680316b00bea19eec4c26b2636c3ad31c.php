
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý Slide</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.slide.index')); ?>"> Slide</a></li>
            <li class="active"> List </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo e(route('admin.slide.create')); ?>" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
               </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tên</th>
                                    <th>Trạng thái</th>
                                    <th>Vị trí</th>
                                    <th>Target</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành dộng</th>
                                </tr>
                                <?php if(isset($slides)): ?>
                                    <?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($slide->id); ?></td>
                                            <td><?php echo e($slide->sd_title); ?></td>
                                            <td>
                                                <?php if($slide->sd_active == 1): ?>
                                                    <a href="<?php echo e(route('admin.slide.active', $slide->id)); ?>" class="label label-info">Show</a>
                                                <?php else: ?> 
                                                    <a href="<?php echo e(route('admin.slide.active', $slide->id)); ?>" class="label label-default">Hide</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($slide->sd_sort); ?></td>
                                            <td><?php echo e($slide->sd_target); ?></td>
                                            <td><?php echo e($slide->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.slide.update', $slide->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo e(route('admin.slide.delete', $slide->id)); ?>" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/admin/slide/index.blade.php ENDPATH**/ ?>