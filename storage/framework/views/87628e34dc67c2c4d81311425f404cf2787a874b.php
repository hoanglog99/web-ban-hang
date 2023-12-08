
<?php $__env->startSection('css'); ?>
    <style>
        <?php $style = file_get_contents('css/product_detail_insights.min.css');echo $style;?>
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li>
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li>
                    <a itemprop="url" href="<?php echo e(route('get.product.list')); ?>" title="Sản phẩm"><span
                            itemprop="title">Sản phẩm</span></a>
                </li>

                <li>
                    <a itemprop="url" href="<?php echo e(route('get.category.list', $product->category->c_slug.'-'.$product->category->id)); ?>" title="<?php echo e(isset($product->category) ? $product->category->c_name : ''); ?>"><span itemprop="title"><?php echo e(isset($product->category) ? $product->category->c_name : ''); ?></span></a>
                </li>

            </ul>
        </div>
        <div class="card">
            <div class="card-body info-detail">
                <div class="left">

                    <a href="<?php echo e(route('get.product.detail',$product->pro_slug . '-'.$product->id )); ?>" title=""
                       class="">
                        <img alt="" style="max-width: 100%" src="<?php echo e(pare_url_file($product->pro_avatar)); ?>"
                             class="lazyload">
                    </a>
                </div>
                <div class="right" id="product-detail" data-id="<?php echo e($product->id); ?>">
                    <h1><?php echo e($product->pro_name); ?></h1>
                    <div class="right__content">
                        <div class="info">

                            <div class="prices">
                                <?php if($product->pro_sale): ?>
                                    <p>Giá niêm yết:
                                        <span class="value"><?php echo e(number_format($product->pro_price,0,',','.')); ?> đ</span>
                                    </p>
                                    <?php
                                        $price = ((100 - $product->pro_sale) * $product->pro_price)  /  100 ;
                                    ?>
                                    <p>
                                        Giá bán: <span
                                            class="value price-new"><?php echo e(number_format($price,0,',','.')); ?> đ</span>
                                        <span class="sale">-<?php echo e($product->pro_sale); ?>%</span>
                                    </p>
                                <?php else: ?>
                                    <p>
                                        Giá bán: <span class="value price-new"><?php echo e(number_format($product->pro_price,0,',','.')); ?> đ</span>
                                    </p>
                                <?php endif; ?>
                                <p>
                                    <span>View :&nbsp</span>
                                    <span><?php echo e($product->pro_view); ?></span>
                                </p>
                            </div>
                            <?php if($product->attributes->count() > 0): ?>
                                <div>
                                    <div style="margin-bottom: 10px">
                                        <div style="float: left; width: 30%; line-height: 36px;">
                                            Chọn Size :
                                        </div>
                                        <div>
                                            <select name="size" id="product-size" class="form-control">
                                                <option value="">Chọn size</option>
                                                <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($attribute->atb_type_id == 1): ?>
                                                        <option value="<?php echo e($attribute->atb_name); ?>" ><?php echo e($attribute->atb_name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <div style="float: left; width: 30%; line-height: 36px;">
                                            Chọn Màu :
                                        </div>
                                        <div>
                                            <select name="color" id="product-color" class="form-control">
                                                <option value="">Chọn màu</option>
                                                <?php $__currentLoopData = $product->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if($attribute->atb_type_id == 2): ?>
                                                        <option value="<?php echo e($attribute->atb_name); ?>" ><?php echo e($attribute->atb_name); ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <div>
                                <div style="float: left; width: 30%; line-height: 36px;">
                                    Giới tính :
                                </div>
                                <div>
                                    <label for="gender-male" style="line-height: 40px;"><input type="radio" name="gender" value="1" id="gender-male">&nbsp; Nam</label> &nbsp; &nbsp;
                                    <label for="gender-female"><input type="radio" name="gender" value="2" id="gender-female">&nbsp; Nữ</label>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <div class="btn-cart">
                                <a href="<?php echo e(route('get.shopping.add', $product->id)); ?>" title=""
                                   class="muangay" id="buy-now-btn">
                                    <span>Mua ngay</span>
                                    <span>Hotline: 0559518488</span>
                                </a>
                                <a href="<?php echo e(route('ajax_get.user.add_favourite', $product->id)); ?>"
                                   title="Thêm sản phẩm yêu thích"
                                   class="muatragop  <?php echo e(!\Auth::id() ? 'js-show-login' : 'js-add-favourite'); ?>" id="buy-now-btn">
                                    <span>Yêu thích</span>
                                    <span>Sản phẩm</span>
                                </a>
                            </div>
                            <div class="infomation">
                                <h2 class="infomation__title">Thông số kỹ thuật</h2>
                                <div class="infomation__group">

                                    <div class="item">
                                        <p class="text1">Danh mục:</p>
                                        <h3 class="text2">
                                            <?php if(isset($product->category->c_name)): ?>
                                                <a href="<?php echo e(route('get.category.list', $product->category->c_slug).'-'.$product->pro_category_id); ?>"><?php echo e($product->category->c_name); ?></a>
                                            <?php else: ?>
                                                "[N\A]"
                                            <?php endif; ?>
                                        </h3>
                                    </div>
                                    <div class="item">
                                        <p class="text1">Xuất sứ:</p>
                                        <h3 class="text2"><?php echo e(isset($product->producer) && !empty($product->producer) ? $product->producer->pdr_name : ''); ?></h3>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="ads">
                            <a href="#" title="Giam giá" target="_blank"><img alt="Hoan tien" style="width: 100%"
                                                                              src="<?php echo e(url('images/banner/banner_01.jpg')); ?>"></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $__env->make('frontend.pages.product_detail.include._inc_content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('frontend.pages.product_detail.include._inc_ratings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="comments">
                <div class="form-comment">
                    <form action="<?php echo e(route('ajax_post.comment')); ?>" method="POST">
                        <input type="hidden" name="productId" value="<?php echo e($product->id); ?>">
                        <div class="form-group">
                            <textarea placeholder="Mời bạn để lại bình luận ..." name="comment" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>
                        <div class="footer">
                            <p>
                                
                                <a href="#">Quy định đăng bình luận</a>
                            </p>
                            <button type="submit" class=" <?php echo e(\Auth::id() ? 'js-save-comment' : 'js-show-login'); ?>">Gửi bình luận</button>
                        </div>
                    </form>
                </div>
                <?php echo $__env->make('frontend.pages.product_detail.include._inc_list_comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

        </div>
        <div class="card-body product-des">
            <div class="left">
                <div class="tabs">
                    <div class="tabs__content">
                        <div class="product-five">
                            <div class="bot js-product-5 owl-carousel owl-theme owl-custom">
                                <?php $__currentLoopData = $productsSuggests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="item">
                                        <?php echo $__env->make('frontend.components.product_item',['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <a href="#" title="Giam giá" target="_blank">
                    <img alt="Hoan tien" style="width: 100%" src="<?php echo e(url('images/banner/banner_02.png')); ?>">
                </a>
            </div>
        </div>
    </div>
    
        
    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
		var ROUTE_COMMENT = '<?php echo e(route('ajax_post.comment')); ?>';
		var CSS = "<?php echo e(asset('css/product_detail.min.css')); ?>";


    </script>
    <script src="<?php echo e(asset('admin/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/product_detail.js')); ?>" type="text/javascript"></script>
    <script>
       $(function () {
    $('.muangay').click(function (event) {
        event.preventDefault();

        var size = $('#product-size').val();
        var color = $('#product-color').val();
        var gender = $('input[name=gender]:checked').val() !== undefined ? $('input[name=gender]:checked').val() : '';

        // Kiểm tra xem các trường đã được chọn hay chưa
        if (size === '' || color === '' || gender === '') {
            // Nếu bất kỳ trường nào chưa được chọn, hiển thị thông báo hoặc thực hiện hành động phù hợp ở đây
            alert('Vui lòng chọn size, màu và giới tính trước khi mua hàng.');
        } else {
            // Tất cả các trường đã được chọn, thực hiện yêu cầu AJAX
            var link = $(this).attr('href');
            
            $.ajax({
                url: link,
                type: 'GET',
                data: {
                    size: size,
                    gender: gender,
                    color: color,
                }
            }).done(function (result) {
                // Hoàn thành yêu cầu AJAX, có thể thực hiện hành động khác ở đây nếu cần
                window.location = window.location.href;
            });
        }
    });
});

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\HOC\PHP\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/product_detail/index.blade.php ENDPATH**/ ?>