@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')
<h1 class="mt-4">Chỉnh sửa khách hàng</h1>

<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="{{route('users.update',$user->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Tên khách hàng :</label>
                <input type="text" class="form-control" placeholder="Tên khách hàng" name="name" value="{{$user->name}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Email</label> :</label>
                <input type="text" class="form-control" placeholder="email khách hàng" name="email" value="{{$user->email}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Địa chỉ :</label>
                <input type="text" class="form-control" placeholder="Địa chỉ" name="address"value="{{$user->address}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Ngày sinh:</label>
                <input type="text" class="form-control" placeholder="Ngày sinh" name="birthday"value="{{$user->birthday}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('birthday') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Mật khẩu:</label>
                <input type="text" class="form-control" placeholder="Mật khẩu" name="password" value="{{$user->password}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
        <label>Giới tính </label>
        <select type="text" class="form-control"  name="status" value="{{$user->gender}}">
            <option value="0"  
            @if($user->gender == 0) selected @endif
            >Fimale</option>
            <option value="1" @if($user->gender == 1) selected @endif  >Male</option>

            
        </select>
    </div>  
           <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</div>
@endsection