<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới nhà cung cấp</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.producer.index')); ?>">Producer</a></li>
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
                        <div class="form-group <?php echo e($errors->first('pdr_name') ? 'has-error' : ''); ?>">
                            <label for="pdr_name">Tên <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" value="<?php echo e(old('pdr_name')); ?>" name="pdr_name"  placeholder="Name ...">
                            <?php if($errors->first('pdr_name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('pdr_name')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->first('pdr_email') ? 'has-error' : ''); ?>">
                            <label for="pdr_email">Email <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" value="<?php echo e(old('pdr_email')); ?>" name="pdr_email"  placeholder="Email ...">
                            <?php if($errors->first('pdr_email')): ?>
                                <span class="text-danger"><?php echo e($errors->first('pdr_email')); ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->first('pdr_phone') ? 'has-error' : ''); ?>">
                            <label for="pdr_phone">Phone <span class="text-danger">(*)</span></label>
                            <input type="text" class="form-control" value="<?php echo e(old('pdr_phone')); ?>" name="pdr_phone"  placeholder="Phone ...">
                            <?php if($errors->first('pdr_phone')): ?>
                                <span class="text-danger"><?php echo e($errors->first('pdr_phone')); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="col-sm-12">
                            <div class="box-footer text-center "  style="margin-top: 20px;">
                                <a href="<?php echo e(route('admin.producer.index')); ?>" class="btn btn-danger">
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
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/admin/producer/create.blade.php ENDPATH**/ ?>