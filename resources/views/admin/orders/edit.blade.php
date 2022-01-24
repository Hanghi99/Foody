@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')
<h1 class="mt-4">Cập nhật đơn hàng</h1>

<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="{{route('orders.update',$order->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Mã đơn hàng:</label>
                <input type="text" class="form-control" placeholder="Mã đơn hàng" name="code" value="{{$order->code}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('code') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Trạng thái đơn hàng:</label>
                <select type="text" class="form-control" placeholder="Trạng thái" name="status" value="{{$order->status}}">
                    <option></option>
                    <option value="Đã thanh toán">Đã thanh toán</option>
                    <option value="Đang vận chuyển">Đang vận chuyển</option>
                </select>
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('status') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Mã khách hàng:</label>
                <select name='user_id'>
                    @foreach($users as $user)
                    <option value="{{ $user->id }}">{{$user->name}}</option>
                    @endforeach
                </select>
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('user_id') }}</p>
                    @endif
                </div>
            </div>
           
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</div>
@endsection