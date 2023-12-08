<style type="text/css">
    .item__content .active a {
        color: red;
    }
</style>
<div class="filter-sidebar">
    {{-- <div class="item">
        <div class="item__title">Thương hiệu</div>
        <div class="item__content">
            <ul>
                <li>
                    <label>
                        <input type="checkbox" value="594">
                        <h2><span></span></h2>
                    </label>
                </li>

                <li>
                    <label>
                        <input type="checkbox" value="563">
                        <h2><span></span></h2>
                    </label>
                </li>
            </ul>
        </div>
    </div> --}}
    @if (isset($attributes))
        @foreach($attributes as $key => $attribute)
            @if (!empty($attribute['attributes']))
                <div class="item">
                    <div class="item__title">{{ $attribute['t_name'] }}</div>
                    <div class="item__content">
                        <ul>
                            @foreach($attribute['attributes'] as $item)
                                <li class=" js-param-search {{ Request::get('attr_'.$item['atb_type_id']) == $item['id'] ? "active" : "" }}"
                                data-param="attr_{{ $item['atb_type_id'] }}={{ $item['id'] }}">
                                    <a href="{{ request()->fullUrlWithQuery(['attr_'.$item['atb_type_id'] => $item['id']]) }}">
                                        <span>{{ $item['atb_name'] }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
        @endforeach
    @endif
    <div class="item">
        <div class="item__title">Đánh giá</div>
        <div class="item__content ratings">
            <ul>
                @for ($i = 5 ; $i >0 ; $i--)
                    <li class="js-param-search {{ Request::get('rv') == $i ? "active" : "" }}" data-param="rv={{$i}}">
                        <a href="{{ request()->fullUrlWithQuery(['rv'=> $i]) }}">
                            <span>
                                @for($j = 1 ; $j <= 5 ; $j ++)
                                    <i class="la la-star {{ $j <= $i ? 'active' : '' }}"></i>
                                @endfor
                                {{ $i < 5 ? 'Trở lên' : '' }}
                            </span>
                        </a>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
    <div class="item">
        <div class="item__content ratings">
            <ul>
                <li class="js-param-search {{ Request::get('status') == 1 ? "active" : "" }}" data-param="status=1">
                    <a href="{{ request()->fullUrlWithQuery(['status'=> 1]) }}">
                        <span>
                            Còn hàng
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="item">
        <div style="height: 10px"></div>
        <form action="{{ request()->fullUrl() }}" method="get">
            <label for="min_price">Giá tối thiểu:</label>
            <input type="number" id="min_price" name="min_price" value="{{ Request::get('min_price') }}" min="0">
    
            <label for="max_price">Giá tối đa:</label>
            <input type="number" id="max_price" name="max_price" value="{{ Request::get('max_price') }}" min="0">
    
            <button class="btn btn-success" style="margin-top:10px;background-color: blue" type="submit">Tìm kiếm</button>
        </form>
    </div>
</div>
