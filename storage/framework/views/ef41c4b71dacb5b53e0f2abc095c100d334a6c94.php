<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cập nhật Slide</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.slide.index')); ?>"> Slide</a></li>
            <li class="active"> Update </li>
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
                            <div class="form-group <?php echo e($errors->first('sd_title') ? 'has-error' : ''); ?>">
                                <label for="name">Title <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" value="<?php echo e($slide->sd_title); ?>" name="sd_title"  placeholder="Name ...">
                                <?php if($errors->first('sd_title')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('sd_title')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group <?php echo e($errors->first('sd_link') ? 'has-error' : ''); ?>">
                                <label for="name">Link <span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" name="sd_link" value="<?php echo e($slide->sd_link); ?>"  placeholder="Link ...">
                                <?php if($errors->first('sd_link')): ?>
                                    <span class="text-danger"><?php echo e($errors->first('sd_link')); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group ">
                                        <label for="name">Target </label>
                                        <select class="form-control" name="sd_target">
                                            <option value="1" <?php echo e($slide->sd_target == 1 ? "selected='selected'" : ""); ?>>_blank</option>
                                            <option value="2" <?php echo e($slide->sd_target == 2 ? "selected='selected'" : ""); ?>>_self</option>
                                            <option value="3" <?php echo e($slide->sd_target == 3 ? "selected='selected'" : ""); ?>>_parent</option>
                                            <option value="4" <?php echo e($slide->sd_target == 4 ? "selected='selected'" : ""); ?>>_top</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group ">
                                        <label for="name">Vị trí </label>
                                        <input type="text" class="form-control" name="sd_sort" value="<?php echo e($slide->sd_sort); ?>" placeholder="0">
                                        <?php if($errors->first('sd_sort')): ?>
                                            <span class="text-danger"><?php echo e($errors->first('sd_sort')); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">

                            <h3 class="box-title">Banner</h3>
                            <div class="box-body block-images">
                                <div style="margin-bottom: 10px"> <img src="<?php echo e(pare_url_file($slide->sd_image ?? '') ?? '/images/no-image.jpg'); ?>" onerror="this.onerror=null;this.src='/images/no-image.jpg';" alt="" class="img-thumbnail" style="width: 100%;height: 400px;"> </div>
                                <div style="position:relative;"> <a class="btn btn-primary" href="javascript:;"> Choose File... <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="sd_avatar" size="40" class="js-upload"> </a> &nbsp; <span class="label label-info" id="upload-file-info"></span> </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center">
                                <a href="<?php echo e(route('admin.slide.index')); ?>" class="btn btn-danger">
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

<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/admin/slide/update.blade.php ENDPATH**/ ?>