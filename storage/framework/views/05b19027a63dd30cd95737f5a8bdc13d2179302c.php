<section class="top-header desktop">
    <div class="container">
        <div class="content">
            <div class="left">
                <a href="<?php echo e(route('get.static.customer_care')); ?>" title="Chăm sóc khách hàng" rel="nofollow">Chăm sóc khách hàng</a>
                 <a href="<?php echo e(route('get.user.transaction')); ?>" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
            </div>
            <div class="right">
                <?php if(Auth::check()): ?>
                    <a href="<?php echo e(route('get.user.dashboard')); ?>">Xin chào <?php echo e(Auth::user()->name); ?></a>
                    <a href="<?php echo e(route('get.user.dashboard')); ?>">Quản lý tài khoản</a>
                    <a href="<?php echo e(route('get.logout')); ?>">Đăng xuất </a>
                <?php else: ?>
                    <a href="<?php echo e(route('get.register')); ?>">Đăng ký</a>
                    <a href="<?php echo e(route('get.login')); ?>">Đăng nhập</a>
                <?php endif; ?>
             </div>
        </div>
    </div>
</section>
<section class="top-header mobile">
    <div class="container">
        <div class="content">
            <div class="left">
                <a href="<?php echo e(route('get.static.customer_care')); ?>" title="Chăm sóc khách hàng" rel="nofollow">Chăm sóc khách hàng</a>
                <a href="<?php echo e(route('get.user.transaction')); ?>" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
                <?php if(Auth::check()): ?>
                    <a href="">Xin chào <?php echo e(Auth::user()->name); ?></a>
                    <a href="<?php echo e(route('get.user.dashboard')); ?>">Quản lý tài khoản</a>
                    <a href="<?php echo e(route('get.logout')); ?>">Đăng xuất </a>
                <?php else: ?>
                    <a href="<?php echo e(route('get.register')); ?>">Đăng ký</a>
                    <a href="<?php echo e(route('get.login')); ?>">Đăng nhập</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<div class="commonTop">
    <div id="headers">
        <div class="container header-wrapper">
            <!--Thay đổi-->
            <div class="logo">
                <a href="/" class="desktop">
                    <img src="<?php echo e(url('images/logo.png')); ?>" style="height: 50px;" alt="Home">
                </a>



                <span class="menu js-menu-cate"><i class="fa fa-list-ul"></i> </span>
            </div>
            <div class="search">

                <form action="<?php echo e($link_search ?? route('get.product.list',['k' => Request::get('k')])); ?>" role="search" method="GET">
                    <input type="text" name="k" value="<?php echo e(Request::get('k')); ?>" class="form-control" placeholder="Tìm kiếm sản phẩm ...">
                    <button type="submit" class="btnSearch">
                        <i class="fa fa-search"></i>
                        <span>Tìm kiếm</span>
                    </button>
                </form>
            </div>
            <ul class="right">
                <li>
                    <a href="<?php echo e(route('get.shopping.list')); ?>" title="Giỏ hàng">
                        <i class="la la-shopping-cart"></i>
                        <span class="text">
                            <span class="">Giỏ hàng (<?php echo e(\Cart::count()); ?>)</span>
                            <span></span>
                        </span>
                    </a>
                </li>
                <li class="desktop">
                    <a href="tel:18006005" title="">
                        <i class="la la-phone"></i>
                        <span class="text">
                            <span class="">Hotline</span>
                            <span>1800.6005</span>
                        </span>
                    </a>
                </li>
            </ul>


            <div id="menu-main" class="container" style="display: none;">
                <ul class="menu-list">
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>
                        <a href="<?php echo e(route('get.category.list', $item->c_slug.'-'.$item->id)); ?>"
                           title="<?php echo e($item->c_name); ?>" class="js-open-menu">
                            <img src="<?php echo e(pare_url_file($item->c_avatar)); ?>" alt="<?php echo e($item->c_name); ?>">
                            <span><?php echo e($item->c_name); ?></span>
                            <?php if(isset($item->children) && count($item->children)): ?>
                                <span class="fa fa-angle-right"></span>
                            <?php else: ?>
                                <span></span>
                            <?php endif; ?>
                        </a>
                        <?php if(isset($item->children) && count($item->children)): ?>
                        <div class="submenu">
                            <div class="group">
                                <div class="item">
                                    <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $children): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="<?php echo e(route('get.category.list', $children->c_slug.'-'.$children->id)); ?>"
                                           title="<?php echo e($children->c_name); ?>" class="js-open-menu">
                                            <span><?php echo e($children->c_name); ?></span>
                                        </a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>

    </div>
</div>
<?php /**PATH D:\Lập Trình Web PHP NC\Project_Laravel\web_ban_giay_L9\resources\views/frontend/components/header.blade.php ENDPATH**/ ?>