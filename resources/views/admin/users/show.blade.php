@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')

<div class="container" style="width:600px">
    <h1 class="text-center">Chi tiết khách hàng</h1>
    <div class="card">
        <div class="card-header" style="text-align: center;color:red">Thông tin <b
                style="color:black">{{$user->name}}</b></div>
        <div class="card-body">
            <div class="card-body">
                <h5 class="card-title" style="color:red"># : <b style="color:black"> {{$user->id}} </b> </h5>
                <p class="card-text" style="color:red">Tên khách hàng : <b style="color:black">{{$user->name}}</b>
                </p>
                <p class="card-text" style="color:red">Email : <b style="color:black">{{$user->email}}</b>
                </p>
                <p class="card-text" style="color:red">Địa chỉ: <b style="color:black">{{$user->address}}</b>
                </p>
                <p class="card-text" style="color:red">Ngày sinh : <b style="color:black">{{$user->birthday}}</b>
                </p>
                <p class="card-text" style="color:red">Giới tính : <b style="color:black">{{$user->gender}}</b>
                </p>
               
            </div>
            </hr>
        </div>
    </div>
    <div class="mt-2 text-end">
        <a href="{{route('users.index')}}" class="btn btn-success"> Quay lại</a>
    </div>
</div>





@endsection