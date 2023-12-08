<style>
    .select2-container--default .select2-selection--multiple {
        border-radius: 0px !important;
    }
    .col-red {
        color: red;
    }
    .select2-selection__choice {
        color: black !important;
    }
    .checkbox {
        margin-top: 10px !important;
        margin-bottom: 10px !important;
    }
</style>
<form role="form" action="" method="POST" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <div class="col-sm-8">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Thông tin cơ bản</h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    <label for="exampleInputEmail1">Tên <b class="col-red">(*)</b></label>
                    <input type="text" class="form-control" name="pro_name" placeholder="Name ...." autocomplete="off" value="<?php echo e($product->pro_name ?? old('pro_name')); ?>">
                    <?php if($errors->first('pro_name')): ?>
                        <span class="text-danger"><?php echo e($errors->first('pro_name')); ?></span>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                             <input type="text" name="pro_price" value="<?php echo e(old('pro_price', isset($product->pro_price) ? $product->pro_price : 0)); ?>" class="form-control" data-type="currency" placeholder="15.000.000">
                             <?php if($errors->first('pro_price')): ?>
                                <span class="text-danger"><?php echo e($errors->first('pro_price')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giảm giá</label>
                             <input type="number" name="pro_sale" value="<?php echo e(old('pro_sale', isset($product->pro_sale) ? $product->pro_sale : 0)); ?>" class="form-control" data-type="currency" placeholder="5">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="tag">Keyword</label>
                            <select name="keywords[]" class="form-control js-select2-keyword" multiple="">
                                <option value="">__Click__</option>
                                <?php $__currentLoopData = $keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($keyword->id); ?>" <?php echo e(in_array($keyword->id, $keywordOld ) ? "selected='selected'"  : ''); ?>>
                                        <?php echo e($keyword->k_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <label for="exampleInputEmail1">Khuyến mại</label>
                    <textarea name="pro_description" class="form-control" id="pro_description" cols="5" rows="2" autocomplete="off"><?php echo e($product->pro_description ?? old('pro_description')); ?></textarea>
                    <?php if($errors->first('pro_description')): ?>
                        <span class="text-danger"><?php echo e($errors->first('pro_description')); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group ">
                    <label class="control-label">Danh mục <b class="col-red">(*)</b></label>
                    <select name="pro_category_id" class="form-control ">
                        <option value="">__Click__</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>" <?php echo e(($product->pro_category_id ?? 0) == $category->id ? "selected='selected'" : ""); ?>>
                                <?php echo e($category->c_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                    <?php if($errors->first('pro_category_id')): ?>
                        <span class="text-danger"><?php echo e($errors->first('pro_category_id')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Size</h3>
            </div>
            <div class="box-body">
                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($attribute['attributes'])): ?>
                        <div class="form-group col-sm-12">
                            <?php $__currentLoopData = $attribute['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item['atb_type_id'] == 1): ?>
                                    <div class="col-sm-3 checkbox">
                                        <label>
                                            <input type="checkbox" name="attribute[]" <?php echo e(in_array($item['id'], $attributeOld ) ? "checked"  : ''); ?>

                                            value="<?php echo e($item['id']); ?>"> <?php echo e($item['atb_name']); ?>

                                        </label>
                                     </div>
                                <?php endif; ?>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <hr>
            <div class="box-header with-border">
                <h3 class="box-title">Màu sắc</h3>
            </div>
            <div class="box-body">
                <?php $__currentLoopData = $attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(!empty($attribute['attributes'])): ?>
                        <div class="form-group col-sm-12">
                            <?php $__currentLoopData = $attribute['attributes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item['atb_type_id'] == 2): ?>
                                <div class="col-sm-3 checkbox">
                                    <label>
                                        <input type="checkbox" name="attribute[]" <?php echo e(in_array($item['id'], $attributeOld ) ? "checked"  : ''); ?>

                                        value="<?php echo e($item['id']); ?>"> <?php echo e($item['atb_name']); ?>

                                    </label>
                                </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <hr>
            
                
            
            
                
                    
                        
                            
                                
                                    
                                
                            
                        
                    
                
                 
                    
                        
                    
                
            
            
            <div class="box-body" style="padding: 0px;">
                <div class="form-group col-sm-6">
                    <label for="exampleInputEmail1">Xuất sứ</label>
                    <select name="pro_country" class="form-control ">
                        <option value="0">__Click__</option>
                        <?php $__currentLoopData = $producer; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e(($product->pro_country ?? '' ) == $item->id ? "selected='selected'" : ""); ?>><?php echo e($item->pdr_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-group col-sm-6">
                    <label for="">Số lượng</label>
                    <input type="number"  class="form-control" name="pro_number" value="<?php echo e($product->pro_number ?? old('pro_number',0)); ?>" placeholder="10">
                </div>
            </div>
        </div>
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Nội dung <b class="col-red">(*)</b></h3>
            </div>
            <div class="box-body">
                <div class="form-group ">
                    
                    <textarea name="pro_content" id="pro_content" class="form-control textarea" cols="5" rows="2" ><?php echo e($product->pro_content ?? ''); ?></textarea>
                    <?php if($errors->first('pro_content')): ?>
                        <span class="text-danger"><?php echo e($errors->first('pro_content')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
    <div class="col-sm-4">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="box-title">Ảnh đại diện</h3>
            </div>
            <div class="box-body block-images">
                <div style="margin-bottom: 10px">
                    <img src="<?php echo e(pare_url_file($product->pro_avatar ?? '') ?? '/images/no-image.jpg'); ?>" onerror="this.onerror=null;this.src='/images/no-image.jpg';" alt="" class="img-thumbnail" style="width: 200px;height: 200px;">
                </div>
                <div style="position:relative;"> <a class="btn btn-primary" href="javascript:;"> Choose File... <input type="file" style="position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:&quot;progid:DXImageTransform.Microsoft.Alpha(Opacity=0)&quot;;opacity:0;background-color:transparent;color:transparent;" name="pro_avatar" size="40" class="js-upload"> </a> &nbsp; <span class="label label-info" id="upload-file-info"></span> </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 clearfix">
        <div class="box-footer text-center">
            <a href="<?php echo e(route('admin.product.index')); ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</a>
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo e(isset($product) ? "Cập nhật" : "Thêm mới"); ?> </button> </div>
    </div>
</form>


<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>

<script>
    ckeditor('pro_content');
    ckeditor('pro_description');
    ckeditor('pro_specifications');
</script>
<?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/admin/product/form.blade.php ENDPATH**/ ?>