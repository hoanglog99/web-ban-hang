<div id="footer">
    <div class="container footer">
        <div class="footer__left">
            <div class="top">
                <div class="item">
                    <div class="title">Về chúng tôi</div>
                    <ul>
                        <li>
                            <a href="<?php echo e(route('get.blog.home')); ?>">Bài viết</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('get.product.list')); ?>">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('get.register')); ?>">Đăng ký</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('get.login')); ?>">Đăng nhập</a>
                        </li>
                    </ul>
                </div>
                <div class="item">
                    <div class="title">Tin tức</div>
                    <ul>
                        <?php if(isset($menus)): ?>
                            <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a title="<?php echo e($menu->mn_name); ?>"
                                        href="<?php echo e(route('get.article.by_menu',$menu->mn_slug.'-'.$menu->id)); ?>">
                                        <?php echo e($menu->mn_name); ?>

                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <li><a href="<?php echo e(route('get.contact')); ?>">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="item">
                    <div class="title">Chính sách</div>
                    <ul>
                        <li><a href="<?php echo e(route('get.static.shopping_guide')); ?>">Hướng dẫn mua hàng</a></li>
                        <li><a href="<?php echo e(route('get.static.return_policy')); ?>">Chính sách đổi trả</a></li>
                    </ul>
                </div>
            </div>
            <div class="bot">
                <div class="social">
                    <div class="title">KẾT NỐI VỚI CHÚNG TÔI</div>
                    <p style="color: white;">Hapi2hand - Uy tín tạo nên thương hiệu</p>
                    <p>
                        <a href="" class="fa fa fa-youtube"></a>
                        <a href="" class="fa fa-facebook-official"></a>
                        <a href="" class="fa fa-twitter"></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="footer__mid">
            <div class="title">Hệ thống cửa hàng</div>
            <p style="color: white;">Địa chỉ: 55 Ngõ 210 Yên Hòa, Cầu Giấy, Hà Nội</p>
            <div class="image">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d5770.469312136786!2d105.78672863139067!3d21.02729099621924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1svi!2s!4v1694160455436!5m2!1svi!2s" width="100%" height="160" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
         
        </div>
        <div class="footer__right">
            <div class="title">Fanpage của chúng tôi</div>
            <p style="color: white;">www.facebook.com/hapi2hand</p>
            <p style="color: white;">www.tiktok.com/hapi2hand</p>
            <p style="color: white;">www.instagram.com/hapi2hand</p>
            <p style="color: white;">www.twitter.com/hapi2hand</p>
            <p style="color: white;">www.shopee.vn/hapi2hand</p>
           
        </div>
    </div>
</div>


<?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/frontend/components/footer.blade.php ENDPATH**/ ?>