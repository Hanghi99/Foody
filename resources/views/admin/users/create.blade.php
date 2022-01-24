@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')
<h1 class="mt-4">Thêm mới khách hàng </h1>

<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="{{route('users.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên khách hàng :</label>
                <input type="text" class="form-control" placeholder="Tên khách hàng" name="name">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Email</label> :</label>
                <input type="text" class="form-control" placeholder="email khách hàng" name="email">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('email') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Địa chỉ :</label>
                <input type="text" class="form-control" placeholder="Địa chỉ" name="address">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('address') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Ngày sinh:</label>
                <input type="text" class="form-control" placeholder="Ngày sinh" name="birthday">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('birthday') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Mật khẩu:</label>
                <input type="text" class="form-control" placeholder="Mật khẩu" name="password">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('password') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Giới tính :</label>
                <select type="text" class="form-control" placeholder="Giới tính" name="gender">
                    <option></option>
                    <option value="1">Male</option>
                    <option value="0">Fimale</option>
                </select>
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('gender') }}</p>
                    @endif
                </div>
            </div>

            <br>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</div>
@endsection




