
<?php $__env->startSection('css'); ?>
    <style>
		<?php $style = file_get_contents('css/ratings_insights.min.css');echo $style;?>
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="breadcrumb">
            <ul>
                <li >
                    <a itemprop="url" href="/" title="Home"><span itemprop="title">Trang chủ</span></a>
                </li>
                <li >
                    <a itemprop="url" href="<?php echo e(route('get.product.list')); ?>" title=""><span itemprop="title"></span></a>
                </li>

                <li>
                    <a itemprop="url" href="" title=""><span itemprop="title"></span></a>
                </li>
            </ul>
        </div>
        <div class="card">
            <?php echo $__env->make('frontend.pages.product_detail.include._inc_ratings', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
		var CSS = "<?php echo e(asset('css/ratings.min.css')); ?>";
    </script>
    <script src="<?php echo e(asset('js/product_detail.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            $("body").on("click",".pagination a", function(e){
                e.preventDefault();
                let URL = $(this).attr('href');
                $("body .js-number-rating").removeClass('active');
                $(this).addClass('active');
                getListRatings(URL);
            });

            function getListRatings(URL)
            {
                $.ajax({
                    type: "GET",
                    url: URL,
                    success: function (results) { 
                        $(".reviews_list").html(results.html)
                    }
                })
            }

            $("body").on("click",".js-number-rating", function (e) {
				e.preventDefault();
				let URL = $(this).attr('href');
				$("body .js-number-rating").removeClass('active');
				$(this).addClass('active');
				getListRatings(URL);
			})
        })

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Hapi2hand_Finally\resources\views/frontend/pages/product_detail/product_ratings.blade.php ENDPATH**/ ?>