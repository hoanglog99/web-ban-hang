
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới kiểu</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.type.index')); ?>">Type</a></li>
            <li class="active"> Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                    <form role="form" action="" method="POST">
                         <?php echo csrf_field(); ?>
                        <div class="form-group <?php echo e($errors->first('t_name') ? 'has-error' : ''); ?>">
                            <label for="t_name">Tên <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" value="<?php echo e(old('t_name')); ?>" name="t_name"  placeholder="Name ...">
                            <?php if($errors->first('t_name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('t_name')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group checkbox">
                            <label>
                                <input type="checkbox" name="t_is_multi_choice" <?php echo e(old('t_is_multi_choice') ? "checked"  : ''); ?>> 
                                Chọn nhiều
                            </label>
                        </div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center "  style="margin-top: 20px;">
                                <a href="<?php echo e(route('admin.type.index')); ?>" class="btn btn-danger">
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
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/admin/type/create.blade.php ENDPATH**/ ?>