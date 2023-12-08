@extends('layouts.app_master_user')
@section('css')
<style>
    <?php $style = file_get_contents('css/user.min.css');
    echo $style; ?>
</style>
@stop
@section('content')
<section>
    <h1 class="title text-center" style="font-size: x-large !important; font-weight: bold;">Đổi Mật Khẩu</h1>
    @if(session('success'))
        <div class="alert alert-success text-center" style="color: #009900; font-weight: 600; font-size: large;">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{route('get.user.savePassword')}}" method="POST" enctype="multipart/form-data" id="changePasswordForm">
        @csrf
        <div class="form-group">
            <label for="">Mật khẩu hiện tại</label>
            <input type="password" name="current_password" class="form-control" value="" placeholder="Nhập mật khẩu hiện tại">
            @error('current_password')
                <div class="alert alert-danger" style="color: red; font-weight: 500;">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Mật khẩu mới</label>
            <input type="password" class="form-control" name="new_password" value="" placeholder="Nhập mật khẩu mới">
            @error('new_password')
              <div class="alert alert-danger" style="color: red; font-weight: 500;">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-blue btn-md">Đổi Mật Khẩu</button>
    </form>
</section>
@stop