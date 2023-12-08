
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cập nhật event</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.event.index')); ?>"> Event</a></li>
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
                            <div class="form-group <?php echo e($errors->first('e_name') ? 'has-error' : ''); ?>">
                                <label for="name">Tiêu đề <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="e_name" value="<?php echo e($event->e_name); ?>"  placeholder="Name ...">
                                <?php if($errors->first('e_name')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('e_name')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('e_link') ? 'has-error' : ''); ?>">
                                <label for="name">Link <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="e_link"  value="<?php echo e($event->e_link); ?>" placeholder="Link ...">
                                <?php if($errors->first('e_link')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('e_link')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label for="name">Home 1 </label>
                                        <input type="checkbox" name="e_position_1" <?php echo e($event->e_position_1 ?? 0 == 1 ? "checked='checked'" : ""); ?> value="1">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label for="name">Home 2 </label>
                                        <input type="checkbox" name="e_position_2" <?php echo e($event->e_position_2 ?? 0 == 1 ? "checked='checked'" : ""); ?> value="1">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label for="name">Home 3 </label>
                                        <input type="checkbox" name="e_position_3" <?php echo e($event->e_position_3 ?? 0 == 1 ? "checked='checked'" : ""); ?> value="1">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group ">
                                        <label for="name">Home 4 </label>
                                        <input type="checkbox" name="e_position_4" <?php echo e($event->e_position_4 ?? 0 == 1 ? "checked='checked'" : ""); ?> value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            
                            <h3 class="box-title">Banner</h3>
                            <div class="box-body block-images">
                                <div style="margin-bottom: 10px"> <img src="<?php echo e(pare_url_file($event->e_banner)); ?>" onerror="this.onerror=null;this.src='/images/no-image.jpg';" alt="" class="img-thumbnail" style="width: 100%;height: 250px;"> </div>
                                <div style="position:relative;"> <a class="btn btn-primary" href="javascript:;"> Choose File... <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="e_banner" size="40" class="js-upload"> </a> &nbsp; <span class="label label-info" id="upload-file-info"></span> </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center">
                                <a href="<?php echo e(route('admin.event.index')); ?>" class="btn btn-danger">
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
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/admin/event/update.blade.php ENDPATH**/ ?>