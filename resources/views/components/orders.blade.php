<table class="table table-condensed">
    <tbody>
        <tr>
            <th style="width: 10px">#</th>
            <th style="width: 250px">Tên sản phẩm</th>
            <th>Ảnh</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng tiền</th>
        </tr>
        @foreach($orders as $item)
            <tr>
                <td>#{{ $item->id }}.</td>
                <td>
                    <a href="">{{ $item->product->pro_name ?? "[N\A]" }}</a>
                    <br>
                    <span>
                        @if($item->od_size)
                            Size : {{ $item->od_size }}
                        @endif
                    </span>
                    <br>
                    <span>
                        @if($item->od_color)
                            Color : {{ $item->od_color }}
                        @endif
                    </span>
                    <br>
                </td>
                <td>
                    <img alt="" style="width: 60px;height: 80px" src="{{ pare_url_file($item->product->pro_avatar ?? "") }}" class="lazyload">
                </td>
                <td>{{ number_format($item->od_price,0,',','.') }} đ</td>
                <td>{{ $item->od_qty }}</td>
                <td>{{ number_format($item->od_price * $item->od_qty,0,',','.') }} đ</td>
            </tr>
        @endforeach
    </tbody>
</table>