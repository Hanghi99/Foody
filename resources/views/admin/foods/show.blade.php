@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')

<div class="container" style="width:600px">
    <h1 class="text-center">Chi tiết sản phẩm</h1>
    <div class="card">
        <div class="card-header" style="text-align: center;color:red">Thông tin <b
                style="color:black">{{$food->name}}</b></div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title" style="color:red"># : <b style="color:black"> {{$food->id}} </b> </h5>
                <p class="card-text" style="color:red">Tên sản phẩm : <b style="color:black">{{$food->name}}</b>
                </p>
                <p class="card-text" style="color:red">Mô tả : <b style="color:black">{{$food->description}}</b>
                </p>
                <p class="card-text" style="color:red">Hình ảnh: <b style="color:black">{{$food->image}}</b>
                </p>
                <p class="card-text" style="color:red">Giá : <b style="color:black">{{$food->price}}</b>
                </p>
                <p class="card-text" style="color:red">Danh mục sản phẩm  : <b style="color:black">{{$food->categories->name}}</b>
                </p>
               
            </div>
            </hr>
        </div>
    </div>
    <div class="mt-2 text-end">
        <a href="{{route('foods.index')}}" class="btn btn-success"> Quay lại</a>
    </div>
</div>





@endsection