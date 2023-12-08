<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/cart.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container cart">
        <div class="left">
            <div class="list">
                <div class="title">THÔNG TIN GIỎ HÀNG</div>
                <div class="list__content">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 100px;"></th>
                            <th style="width: 30%">Sản phẩm</th>
                            <th>Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $shopping; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <a href="<?php echo e(route('get.product.detail',\Str::slug($item->name).'-'.$item->id)); ?>"
                                            title="<?php echo e($item->name); ?>" class="avatar image contain">
                                            <img alt="" src="<?php echo e(pare_url_file($item->options->image)); ?>" class="lazyload">
                                        </a>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(route('get.product.detail',\Str::slug($item->name).'-'.$item->id)); ?>"><strong><?php echo e($item->name); ?></strong></a>
                                        <p style="font-size: 13px;font-weight: 600;">
                                            <?php if($item->options->size): ?>
                                                Size : <?php echo e($item->options->size); ?>

                                            <?php endif; ?>
                                        </p>
                                        <p style="font-size: 13px;font-weight: 600;">
                                            <?php if($item->options->color): ?>
                                                Color : <?php echo e($item->options->color); ?>

                                            <?php endif; ?>
                                        </p>
                                        <p style="font-size: 13px;font-weight: 600;">
                                            <?php if($item->options->gender): ?>
                                                Gender : <?php echo e($item->options->gender == 1 ? 'Nam' : 'Nữ'); ?>

                                            <?php endif; ?>
                                        </p>
                                    </td>

                                    <td>
                                        <p><b><?php echo e(number_format($item->price,0,',','.')); ?> đ</b></p>
                                        <p>

                                            <?php if($item->options->price_old): ?>
                                                <span style="text-decoration: line-through;"><?php echo e(number_format(number_price($item->options->price_old),0,',','.')); ?> đ</span>
                                                <span class="sale">- <?php echo e($item->options->sale); ?> %</span>
                                            <?php endif; ?>
                                        </p>
                                    </td>
                                    <td>
                                        <div class="qty_number">
                                            <input type="number"  min="1" class="input_quantity" name="quantity_14692" value="<?php echo e($item->qty); ?>" id="">
                                            <p data-price="<?php echo e($item->price); ?>" data-url="<?php echo e(route('ajax_get.shopping.update', $key)); ?>" data-id-product="<?php echo e($item->id); ?>">
                                                <span class="js-increase">+</span>
                                                <span class="js-reduction">-</span>
                                            </p>
                                            <a href="<?php echo e(route('get.shopping.delete', $key)); ?>" class="js-delete-item btn-action-delete"><i class="la la-trash"></i></a>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="js-total-item"><?php echo e(number_format($item->price * $item->qty,0,',','.')); ?> đ</span>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <p style="float: right;margin-top: 20px;" class="total_cart">Tổng tiền : <b id="sub-total"><?php echo e(\Cart::subtotal(0)); ?> đ</b></p>
                </div>
            </div>
        </div>
        <div class="right">
            <div class="customer">
                <div class="title">THÔNG TIN ĐẶT HÀNG</div>
                <div class="customer__content">
                    <form class="from_cart_register" action="<?php echo e(route('post.shopping.pay')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="name" >Họ và tên <span class="cRed">(*)</span></label>
                            <input name="tst_name" id="name" required="" value="<?php echo e(get_data_user('web','name')); ?>" type="text" class="form-control" 
                              oninvalid="this.setCustomValidity('Vui lòng nhập tên')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại <span class="cRed">(*)</span></label>
                            <input name="tst_phone" id="phone" required="" value="<?php echo e(get_data_user('web','phone')); ?>" type="text" class="form-control"
                              oninvalid="this.setCustomValidity('Vui lòng nhập số điện thoại')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chỉ <span class="cRed">(*)</span></label>
                            <input name="tst_address" id="address" required="" value="<?php echo e(get_data_user('web','address')); ?>" type="text" class="form-control"
                                oninvalid="this.setCustomValidity('Vui lòng nhập địa chỉ')" oninput="setCustomValidity('')" placeholder="Số nhà, Đường, Phường (Xã), Quận (Huyện), Tỉnh (TP)">
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="cRed">(*)</span></label>
                            <input name="tst_email" id="email" required="" value="<?php echo e(get_data_user('web','email')); ?>" type="text" value="" class="form-control"
                                oninvalid="this.setCustomValidity('Vui lòng nhập Email')" oninput="setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <label for="note">Ghi chú thêm</label>
                            <textarea name="tst_note" id="note" cols="3" style="min-height: 100px;" rows="2" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="note">Áp dụng mã giảm giá</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="text" value="" class="form-control discount_code" placeholder="Mã giảm giá" style="width: 60%; float: left;">
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-purple btn-cart-discount" type="button" style="margin-left: 15px">
                                        <span class="">Áp dụng</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="btn-buy">
                            <button class="buy1 btn btn-purple <?php echo e(\Auth::id() ? '' : 'js-show-login'); ?>" type="submit">
                                Thanh toán khi nhận hàng
                            </button>
                            <button class="btn btn-purple <?php echo e(\Auth::id() ? '' : 'js-show-login'); ?>" name="payment" value="2" type="submit">
                                <span class="">Thanh toán online</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/cart.js')); ?>" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://codeseven.github.io/toastr/build/toastr.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $(".js-delete-item").click( function(event){
                event.preventDefault();
                let $this = $(this);
                let url    = $this.attr('href');

                if(url) {
                    $.ajax({
                        url: url,
                    }).done(function( results ) {
                        toastr.success(results.messages);
						$this.parents('tr').remove();
						$("#sub-total").text(results.totalMoney+ " đ");
                   });
                }
            })

            $('.js-increase').click(function (event) {
				event.preventDefault();
                let $this = $(this);
                let $input = $this.parent().prev();
                let number = parseInt($input.val());
                if (number >= 10) {
					// toastr.warning("Mỗi sản phẩm chỉ được mua tối đa số lượng 10 lần / 1 lần mua");
                	return false;
                }

                let price = $this.parent().attr('data-price');
                let URL = $this.parent().attr('data-url');
                let productID = $this.parent().attr("data-id-product");

                number = number + 1;
				$.ajax({
					url: URL,
					data: {
						qty        : number,
						idProduct  : productID
					}
				}).done(function( results ) {
					if (typeof results.totalMoney !== "undefined") {
						$input.val(number);
						$("#sub-total").text(results.totalMoney+ " đ");
						// toastr.success(results.messages);
						$this.parents('tr').find(".js-total-item").text(results.totalItem +' đ');
                    }else {
						$input.val(number - 1);
                    }
				});
			})

            $('.js-reduction').click(function (event) {
                let $this  = $(this);
                let $input = $this.parent().prev();
                let number = parseInt($input.val());
                if (number <= 1) {
					// toastr.warning("Số lượng sản phẩm phải >= 1");
                	return false;
                }

				let URL       = $this.parent().attr('data-url');
				let productID = $this.parent().attr("data-id-product");


				number = number - 1;
				$.ajax({
					url: URL,
					data: {
						qty        : number,
						idProduct  : productID
					}
				}).done(function( results ) {
					if (typeof results.totalMoney !== "undefined") {
						$input.val(number);
						$("#sub-total").text(results.totalMoney+ " đ");
						// toastr.success(results.messages);
						$this.parents('tr').find(".js-total-item").text(results.totalItem +' đ');
					}else {
						$input.val(number + 1);
					}
				});
			})
            $('.btn-cart-discount').click(function () {
                let URL = '<?php echo e(route('ajax_get.update.cart.discount')); ?>';
                let discount_code = $('.discount_code').val();

                $.ajax({
                    url: URL,
                    dataType: 'json',
                    data: {
                        discount_code : discount_code,
                    }
                }).done(function( results ) {
                   if (results.type === 'success') {
                       $('#sub-total').text(results.totalMoney + ' đ');
                       $('.discount_code').prop( "disabled", true );
                       $('.btn-cart-discount').prop( "disabled", true );
                   } else {
                       toastr.success(results.messages);
                   }
                });
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_master_frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ADMIN\web_ban_giay_L9\web_ban_giay_Hapi2hand_Finally\resources\views/frontend/pages/shopping/index.blade.php ENDPATH**/ ?>