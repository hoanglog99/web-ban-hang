<section class="top-header desktop">
    <style>
        .content .headerr {
            font-weight: 550;
            color: #000; /* Màu ban đầu của chữ */
            transition: color 0.3s, font-size 0.3s; /* Thời gian và thuộc tính chuyển đổi */
        }

        /* Khi hover, thay đổi màu và kích thước của chữ */
        .content a:hover {
            color: black; /* Màu khi hover */
            font-weight: 600;
        }
    </style>
    <div class="container">
        <div class="content">
            <div class="left">
                 <a class="headerr" href="{{ route('get.static.customer_care') }}" title="Chăm sóc khách hàng" rel="nofollow">CSKH</a>
                 <a class="headerr" href="{{ route('get.blog.home') }}" title="Tin tức & Mẹo" rel="nofollow">Tin tức & Mẹo</a>
                 <a class="headerr" href="{{ route('get.contact') }}" title="Tin tức & Mẹo" rel="nofollow">Liên hệ</a>
                 @if (Auth::check())
                    <a class="headerr" href="{{ route('get.user.transaction') }}" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
                 @else
                 @endif
            </div>
            <div class="right">
                @if (Auth::check())
                    <!-- <a href="{{  route('get.user.dashboard') }}">Xin chào {{ Auth::user()->name }}</a> -->
                    <a class="headerr" href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>
                    <a class="headerr" href="{{  route('get.logout') }}">{{ Auth::user()->name }} (Đăng xuất) </a>
                @else
                    <a class="headerr" href="{{  route('get.register') }}">Đăng ký</a>
                    <a class="headerr" href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
             </div>
        </div>
    </div>
</section>
<section class="top-header mobile">
    <div class="container">
        <div class="content">
            <div class="left">
                <a href="{{ route('get.static.customer_care') }}" title="Chăm sóc khách hàng" rel="nofollow">Chăm sóc khách hàng</a>
                <a href="{{ route('get.user.transaction') }}" title="Kiểm tra đơn hàng" rel="nofollow">Kiểm tra đơn hàng</a>
                @if (Auth::check())
                    <a href="">Xin chào {{ Auth::user()->name }}</a>
                    <a href="{{  route('get.user.dashboard') }}">Quản lý tài khoản</a>
                    <a href="{{  route('get.logout') }}">Đăng xuất </a>
                @else
                    <a href="{{  route('get.register') }}">Đăng ký</a>
                    <a href="{{  route('get.login') }}">Đăng nhập</a>
                @endif
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
                    <img srcset="{{ url('images/logo_hap2handdd-removebg-preview.png') }} 2x" style="height: 60px; width:100" alt="Home">
                </a>
{{--                <a href="/" class="mobile">--}}
{{--                    <img src="{{ url('images/icon/LogoMobile.png') }}" alt="Home">--}}
{{--                </a>--}}
                <span class="menu js-menu-cate"><i class="fa fa-list-ul"></i> </span>
            </div>
            <div class="search">

                <form action="{{ $link_search ?? route('get.product.list',['k' => Request::get('k')]) }}" role="search" method="GET">
                    <input type="text" name="k" value="{{ Request::get('k') }}" class="form-control" placeholder="Tìm kiếm sản phẩm ...">
                    <button type="submit" class="btnSearch">
                        <i class="fa fa-search"></i>
                        <span>Tìm kiếm</span>
                    </button>
                </form>
            </div>
            <ul class="right">
                <li>
                    <a href="{{ route('get.shopping.list') }}" title="Giỏ hàng">
                        <i class="la la-shopping-cart"></i>
                        <span class="text">
                            <span class="">Giỏ hàng ({{ \Cart::count() }})</span>
                            <span></span>
                        </span>
                    </a>
                </li>
                <li class="desktop">
                    <a href="tel:0559518488" title="">
                        <i class="la la-phone"></i>
                        <span class="text">
                            <span class="">Hotline</span>
                            <span>0559518488</span>
                        </span>
                    </a>
                </li>
            </ul>


            <div id="menu-main" class="container" style="display: none;">
                <ul class="menu-list">
                    @foreach($categories as $item)
                    <li>
                        <a href="{{  route('get.category.list', $item->c_slug.'-'.$item->id) }}"
                           title="{{  $item->c_name }}" class="js-open-menu">
                            @if (isset($item->c_avatar))
                                <img src="{{ pare_url_file($item->c_avatar) }}" alt="{{ $item->c_name }}">
                            @endif
                            <span>{{  $item->c_name }}</span>
                            @if (isset($item->children) && count($item->children))
                                <span class="fa fa-angle-right"></span>
                            @else
                                <span></span>
                            @endif
                        </a>
                        @if (isset($item->children) && count($item->children))
                        <div class="submenu">
                            <div class="group">
                                <div class="item">
                                    @foreach($item->children as $children)
                                        <a href="{{  route('get.category.list', $children->c_slug.'-'.$children->id) }}"
                                           title="{{  $children->c_name }}" class="js-open-menu">
                                            <span>{{  $children->c_name }}</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>
