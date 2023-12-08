
<?php $__env->startSection('content'); ?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý sản phẩm</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo e(route('admin.product.index')); ?>"> Product</a></li>
            <li class="active"> List </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
               <div class="box-title">
                    <form class="form-inline">
                        <input type="text" class="form-control" value="<?php echo e(Request::get('id')); ?>" name="id" placeholder="ID">
                        <input type="text" class="form-control" value="<?php echo e(Request::get('name')); ?>" name="name" placeholder="Name ...">
                        <select name="category" class="form-control" >
                            <option value="0">Danh mục</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>" <?php echo e(Request::get('category') == $item->id ? "selected='selected'" : ""); ?>><?php echo e($item->c_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Tìm kiếm</button>
                        <a href="<?php echo e(route('admin.product.create')); ?>" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a>
                    </form>
                </div>
                <div class="box-body">
                   <div class="col-md-12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th style="width: 300px">Tên</th>
                                    <th>Danh mục</th>
                                    <th>Ảnh</th>
                                    <th>Giá</th>
                                    <th>Hot</th>
                                    <th>Số lượng</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Hành động</th>
                                </tr>
                                
                            </tbody>
                            <?php if(isset($products)): ?>
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($product->id); ?></td>
                                            <td><?php echo e($product->pro_name); ?></td>
                                            <td>
                                                <span class="label label-success"><?php echo e($product->category->c_name ?? "[N\A]"); ?></span>
                                            </td>
                                            <td>
                                                <img src="<?php echo e(pare_url_file($product->pro_avatar)); ?>" style="width: 80px;height: 100px">
                                            </td>
                                            <td>
                                                <?php if($product->pro_sale): ?>
                                                    <span style="text-decoration: line-through;"><?php echo e(number_format($product->pro_price,0,',','.')); ?> vnđ</span><br>
                                                    <?php 
                                                        $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                                                    ?>
                                                    <span><?php echo e(number_format($price,0,',','.')); ?> vnđ</span>
                                                <?php else: ?> 
                                                    <?php echo e(number_format($product->pro_price,0,',','.')); ?> vnđ
                                                <?php endif; ?>
                                                
                                            </td>
                                            <td>
                                                <?php if($product->pro_hot == 1): ?>
                                                    <a href="<?php echo e(route('admin.product.hot', $product->id)); ?>" class="label label-info">Hot</a>
                                                <?php else: ?> 
                                                    <a href="<?php echo e(route('admin.product.hot', $product->id)); ?>" class="label label-default">None</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($product->pro_number); ?></td>
                                            <td>
                                                <?php if($product->pro_active == 1): ?>
                                                    <a href="<?php echo e(route('admin.product.active', $product->id)); ?>" class="label label-info">Active</a>
                                                <?php else: ?> 
                                                    <a href="<?php echo e(route('admin.product.active', $product->id)); ?>" class="label label-default">Hide</a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo e($product->created_at); ?></td>
                                            <td>
                                                <a href="<?php echo e(route('admin.product.update', $product->id)); ?>" class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i> Edit</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                        </table>
                    </div>
                </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <?php echo $products->appends($query)->links(); ?>

                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
    </section>
    <!-- /.content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app_master_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/admin/product/index.blade.php ENDPATH**/ ?>