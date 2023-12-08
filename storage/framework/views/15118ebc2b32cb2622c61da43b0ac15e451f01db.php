<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý từ khoá</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.keyword.index')); ?>"> Keyword</a></li>
            <li class="active"> List </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo e(route('admin.keyword.create')); ?>" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
               </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Tiêu đề</th>
                                    <th>Mô tả</th>
                                    <th>Hot</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                <?php if(isset($keywords)): ?>
                                    <?php $__currentLoopData = $keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($keyword->id); ?></td>
                                            <td><?php echo e($keyword->k_name); ?></td>
                                            <td><?php echo e($keyword->k_description); ?></td>
                                            <td>
                                                <?php if($keyword->k_hot == 1): ?>
                                                    <a href="<?php echo e(route('admin.keyword.hot', $keyword->id)); ?>" class="label label-info">Hot</a>
                                                <?php else: ?> 
                                                    <a href="<?php echo e(route('admin.keyword.hot', $keyword->id)); ?>" class="label label-default">None</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($keyword->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.keyword.update', $keyword->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo e(route('admin.keyword.delete', $keyword->id)); ?>" class="js-delete-confirm btn btn-xs btn-danger"><i class="fa fa-trash"></i> Delete</a>
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
                    <?php echo $keywords->links(); ?>

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/admin/keyword/index.blade.php ENDPATH**/ ?>