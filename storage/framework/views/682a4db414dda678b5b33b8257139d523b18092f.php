

<?php $__env->startSection('css'); ?>
    <?php
        $display_menu = config('layouts.component.cate.home.display');
//    ?>
    <style>
        <?php $style = file_get_contents('css/home_insights.min.css');echo $style;?>
        #menu-main {
            display: '<?php echo e($display_menu); ?>';
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="component-slide">
        <?php if(config('layouts.pages.home.slide.with') == 'full'): ?>
            <div id="content-slide">
                <div class="spinner">
                    <div class="rect1"></div>
                    <div class="rect2"></div>
                    <div class="rect3"></div>
                    <div class="rect4"></div>
                    <div class="rect5"></div>
                </div>
            </div>
        <?php else: ?>
            <div class="container" style="display: flex">
                <div class="left" style="width: 250px">

                </div>
                <div class="right" style=" width: calc(100% - 250px);">
                    <div id="content-slide">
                        <div class="spinner">
                            <div class="rect1"></div>
                            <div class="rect2"></div>
                            <div class="rect3"></div>
                            <div class="rect4"></div>
                            <div class="rect5"></div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="container" id="before-slide">
        
        <div class="product-one">
            <style>
                .top a:hover{
                    color: cornflowerblue;
                    border: 1px solid black outset;
                    border-color: blue;
                }
            </style>
            <div class="top">
                <a href="<?php echo e(URL::to('san-pham')); ?>" title="" class="main-title">XEM TẤT CẢ SẢN PHẨM TẠI ĐÂY
                    <img srcset="<?php echo e(url('images/press.png')); ?> 2x" style="height: 25px; width:150" alt="Home">
                </a>
                
            </div>
            <div class="bot">

                <?php if($event1): ?>
                <div class="left">
                    <div class="image">
                        <a href="<?php echo e($event1->e_link); ?>" title="" class="<?php echo e($event1->e_name); ?>" target="_blank">
                            <img style="height: 310px;" class="lazyload lazy" alt="<?php echo e($event1->e_name); ?>" src="<?php echo e(asset('images/preloader.gif')); ?>"  data-src="<?php echo e(pare_url_file($event1->e_banner)); ?>" />
                        </a>
                    </div>
                </div>
                <?php endif; ?>
                <div class="right js-product-one owl-carousel owl-theme owl-custom">
                    <?php $__currentLoopData = $productsPay; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <?php echo $__env->make('frontend.components.product_item',[ 'product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>

        <?php if($event2): ?>
            <?php echo $__env->make('frontend.pages.home.include._inc_flash_sale', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        

        <div class="product-three">
            <div class="top">
                <a href="#" title="" class="main-title">SẢN PHẨM MỚI</a>
            </div>
            <div class="bot">
                <div class="left">
                    <div class="image">
                        <?php if(isset($event3->e_link)): ?>
                            <a href="<?php echo e($event3->e_link); ?>" title="" class="<?php echo e($event3->e_name); ?>" target="_blank">
                                <img style="height: 310px;" class="lazyload lazy" alt="<?php echo e($event3->e_name); ?>" src="<?php echo e(asset('images/preloader.gif')); ?>"  data-src="<?php echo e(pare_url_file($event3->e_banner)); ?>" />
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="right js-product-one owl-carousel owl-theme owl-custom">
                    <?php if(isset($productsNew)): ?>
                        <?php $__currentLoopData = $productsNew; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <?php echo $__env->make('frontend.components.product_item',['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="product-two">
            <div class="top">
                <a href="#" class="main-title">SẢN PHẨM NỔI BẬT</a>
            </div>
            <div class="bot">
                <?php if(isset($productsHot)): ?>
                    <?php $__currentLoopData = $productsHot; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <?php echo $__env->make('frontend.components.product_item',['product' => $product], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
        </div>
        <div class="product-two" id="product-recently"></div>
        <div id="product-by-category"></div>
        <?php echo $__env->make('frontend.pages.home.include._inc_article', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script type="text/javascript">
        var routeRenderProductRecently  = '<?php echo e(route('ajax_get.product_recently')); ?>';
       
        var routeRenderSlide  = '<?php echo e(route('ajax_get.slide')); ?>';
        var CSS = "<?php echo e(asset('css/home.min.css')); ?>";
		<?php $js = file_get_contents('js/home.js');echo $js;?>
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/home/index.blade.php ENDPATH**/ ?>