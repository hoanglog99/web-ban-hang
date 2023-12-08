<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý bài viết</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.article.index')); ?>"> Article</a></li>
            <li class="active"> List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="<?php echo e(route('admin.article.create')); ?>" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
               </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 25%">Tiêu đề</th>
                                    <th>Danh mục</th>
                                    <th>Ảnh</th>
                                    <th>Hot</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày đăng</th>
                                    <th>Hành động</th>
                                </tr>

                            </tbody>
                            <?php if(isset($articles)): ?>
                                    <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($article->id); ?></td>
                                            <td><?php echo e($article->a_name); ?></td>
                                            <td>
                                                <span class="label label-success"><?php echo e($article->menu->mn_name ?? "[N\A]"); ?></span>
                                            </td>
                                            <td>
                                                <img src="<?php echo e(pare_url_file($article->a_avatar)); ?>" style="width: 80px;height: 80px">
                                            </td>

                                            <td>
                                                <?php if($article->a_hot == 1): ?>
                                                    <a href="<?php echo e(route('admin.article.hot', $article->id)); ?>" class="label label-info">Hot</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('admin.article.hot', $article->id)); ?>" class="label label-default">None</a>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if($article->a_active == 1): ?>
                                                    <a href="<?php echo e(route('admin.article.active', $article->id)); ?>" class="label label-info">Active</a>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('admin.article.active', $article->id)); ?>" class="label label-default">Hide</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($article->created_at); ?></td>
                                            <td style="width: 120px">
                                                <a href="<?php echo e(route('admin.article.update', $article->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                                <a href="<?php echo e(route('admin.article.delete', $article->id)); ?>" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <?php echo $articles->links(); ?>

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/admin/article/index.blade.php ENDPATH**/ ?>