@extends('layouts.app_master_user')
@section('css')
    <style>
		<?php $style = file_get_contents('css/user.min.css');echo $style;?>
    </style>
@stop
@section('content')
    <section>
        <div class="title">Danh sách sản phẩm yêu thích</div>
        <div class="row mb-5">
           <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Mã </th>
                            <th class="w-25" scope="col">Tên sản phẩm</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Ảnh</th>
                            <th scope="col">Giá</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                            <style>
                                .iddh {
                                    color: #000; /* Màu ban đầu của chữ */
                                    font-size: 400; /* Kích thước ban đầu của chữ */
                                    transition: color 0.3s, font-size 0.3s; /* Thời gian và thuộc tính chuyển đổi */
                                }

                                /* Khi hover, thay đổi màu và kích thước của chữ */
                                .iddh:hover {
                                    color: #fb236a; /* Màu khi hover */
                                    font-size: large; /* Kích thước khi hover */
                                }
                          </style>
                            <tr>
                                <th scope="row">
                                  <a class="iddh" href="{{ route('get.user.order', $item->id) }}">DH{{ $item->id }}</a>
                                </th>
                                <th>{{ $item->pro_name }}</th>
                                <th>
                                    <span class="label label-success">{{ $item->category->c_name ?? "[N\A]" }}</span>
                                </th>
                                <th>
                                    <img src="{{ pare_url_file($item->pro_avatar) }}" style="width: 80px;height: 100px">
                                </th>
                                <th>{{ number_format($item->pro_price,0,',','.') }} đ</th>
                                <th>
                                    <a class="btn btn-success" href="{{  route('get.user.favourite.delete', $item->id) }}">Huỷ bỏ</a>
                                </th>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
           </div>
        </div>
    </section>
@stop
