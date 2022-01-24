@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')

<div class="container" style="width:600px">
    <h1 class="text-center">Chi tiết danh mục</h1>
    <div class="card">
        <div class="card-header" style="text-align: center;color:red">Thông tin <b
                style="color:black">{{$categories->name}}</b></div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title" style="color:red"># : <b style="color:black"> {{$categories->id}} </b> </h5>
                <p class="card-text" style="color:red">Tên danh mục : <b style="color:black">{{$categories->name}}</b>
                </p>
                <p class="card-text" style="color:red">Trạng thái: <b style="color:black"> {{$categories->status}}</b>
                </p>
            </div>
            </hr>
        </div>
    </div>
    <div class="mt-2 text-end">
        <a href="{{route('categories.index')}}" class="btn btn-success"> Quay lại</a>
    </div>
</div>





@endsection