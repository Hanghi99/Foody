@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')

<div class="container" style="width:600px">
    <h1 class="text-center">Chi tiết đơn hàng</h1>
    <div class="card">
        <div class="card-header" style="text-align: center;color:red">Thông tin <b
                style="color:black">{{$order->code}}</b></div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title" style="color:red"># : <b style="color:black"> {{$order->id}} </b> </h5>
                <p class="card-text" style="color:red">Mã đơn hàng: <b style="color:black">{{$order->code}}</b>
                </p>
                <p class="card-text" style="color:red">Tình trạng đơn hàng : <b
                        style="color:black">{{$order->status}}</b>
                </p>
                <p class="card-text" style="color:red">Tên khách hàng: <b style="color:black">{{$order->user->name}}</b>
                </p>


            </div>
            </hr>
        </div>
    </div>
    <div class="card">
        <div class="card-header" style="text-align: center;color:red">Chi tiết mặt hàng</div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <td>STT</td>
                    <td>Tên sản phẩm</td>
                    <td>Số lượng</td>
                    <td>Giá tiền</td>
                </tr>

                @foreach ($order->order_details as $key => $order_detail)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$order_detail->food->name}}</td>
                    <td>{{$order_detail->quantity}}</td>
                    <td>{{$order_detail->price}}</td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
    <div class="mt-2 text-end">
        <a href="{{route('orders.index')}}" class="btn btn-success"> Quay lại</a>
    </div>
</div>

@endsection