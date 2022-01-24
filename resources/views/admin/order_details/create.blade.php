@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')
<h1 class="mt-4">Tạo chi tiết đơn hàng</h1>

<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="{{route('order_details.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Số lượng:</label>
                <input type="text" class="form-control" placeholder="Số lượng" name="quantity">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('quantity') }}</p>
                    @endif
                </div>
            </div>
            

            <div class="form-group">
                <label>Giá:</label>
                <input type="text" class="form-control" placeholder="Giá" name="price">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('price') }}</p>
                    @endif
                </div>
            </div>
            
            <div class="form-group">
                <label>Tên món ăn:</label>
               
                <select name='food_id'>
                    @foreach($users as $user)
                    <option value="{{ $food->id }}">{{$food->name}}</option>
                    @endforeach
                </select>
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('food_id') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Tên khách hàng:</label>
               
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