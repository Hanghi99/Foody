@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')

<div class="container" style="width:600px">
    <h1 class="text-center">Chi tiết đơn hàng</h1>
    <div class="card">
        <div class="card-header" style="text-align: center;color:red">Thông tin <b
                style="color:black">{{$order_detail->id}}</b></div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title" style="color:red"># : <b style="color:black"> {{$order_detail->id}} </b> </h5>
                <p class="card-text" style="color:red">Mã đơn hàng: <b style="color:black">{{$order_detail->quantity}}</b>
                </p>
                <p class="card-text" style="color:red">Tình trạng đơn hàng : <b style="color:black">{{$order_detail->price}}</b>
                </p>
                <p class="card-text" style="color:red">Tên món ăn: <b style="color:black">{{$order_detail->food->name}}</b>
                </p>
                <p class="card-text" style="color:red">Tên khách hàng: <b style="color:black">{{$order_detail->user->name}}</b>
                </p>
                
               
            </div>
            </hr>
        </div>
    </div>
    <div class="mt-2 text-end">
        <a href="{{route('order_details.index')}}" class="btn btn-success"> Quay lại</a>
    </div>
</div>





@endsection            
                
