<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới page tinhx</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.static.index')); ?>"> Static</a></li>
            <li class="active"> Create </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST" enctype="multipart/form-data">
                         <?php echo csrf_field(); ?>
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('s_title') ? 'has-error' : ''); ?>">
                                <label for="name">Tiêu đề <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="s_title"  placeholder="Title ...">
                                <?php if($errors->first('s_title')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('s_title')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('e_link') ? 'has-error' : ''); ?>">
                                <label for="name">Loại Page <span class="text-danger">(*)</span></label>
                                <select class="form-control" name="s_type">
                                    <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>"><?php echo e($item); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                         <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('e_link') ? 'has-error' : ''); ?>">
                                <label for="name">Nội dung <span class="text-danger">(*)</span></label>
                                <textarea class="form-control textarea" id="content" name="s_content"></textarea>
                            </div>
                        </div>
                       
                       
                        <div class="col-sm-12">
                            <div class="box-footer text-center">
                                <a href="<?php echo e(route('admin.static.index')); ?>" class="btn btn-danger">
                                Quay lại <i class="fa fa-undo"></i></a>
                                <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-save"></i></button>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('admin/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('admin/ckeditor/ckeditor.js')); ?>"></script>
    <script type="text/javascript">

        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
       };

        CKEDITOR.replace( 'content' ,options);
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_L9\resources\views/admin/static/create.blade.php ENDPATH**/ ?>