@extends('layouts.app_master_user')
@section('css')
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <section>
        <div class="title">Danh sách đơn hàng</div>
        <form class="form-inline">
            <div class="form-group " style="margin-right: 10px;">
                <input type="text" class="form-control" value="{{ Request::get('id') }}" name="id" placeholder="ID">
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <select name="status" class="form-control">
                    <option value="">Trạng thái</option>
                    <option value="1" {{ Request::get('status') == 1 ? "selected='selected'" : "" }}>Tiếp nhận</option>
                    <option value="2" {{ Request::get('status') == 2 ? "selected='selected'" : "" }}>Đang vận chuyển
                    </option>
                    <option value="3" {{ Request::get('status') == 3 ? "selected='selected'" : "" }}>Hoàn thành
                    </option>
                    <option value="-1" {{ Request::get('status') == -1 ? "selected='selected'" : "" }}>Huỷ bỏ</option>
                </select>
            </div>
            <div class="form-group" style="margin-right: 10px;">
                <button type="submit" class="btn btn-pink btn-sm">Tìm kiếm</button>
            </div>
        </form>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Mã đơn</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Time</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <style>
                        .iddh {
                            color: #000; /* Màu ban đầu của chữ */
                            font-size: 400; /* Kích thước ban đầu của chữ */
                            transition: color 0.3s, font-size 0.3s; /* Thời gian và thuộc tính chuyển đổi */
                        }

                        /* Khi hover, thay đổi màu và kích thước của chữ */
                        .iddh:hover {
                            color: #fb236a; /* Màu khi hover */
                            font-weight: bolder; /* Kích thước khi hover */
                        }
                    </style>
                    <th scope="row">
                        <a class="iddh" href="{{ route('get.user.order', $transaction->id) }}">DH{{ $transaction->id }}</a>
                    </th>
                    <th>{{ $transaction->tst_name }}</th>
                    <th>{{ number_format($transaction->tst_total_money,0,',','.') }} đ</th>
                    <th>{{  $transaction->created_at }}</th>
                    <th>
                        <span
                            class="label label-{{ $transaction->getStatus($transaction->tst_status)['class'] }}">
                            {{ $transaction->getStatus($transaction->tst_status)['name'] }}
                        </span>
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>

    </section>
@stop
