@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')
<h1 class="mt-4">Tạo danh mục</h1>

<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="{{route('categories.store')}}">
            @csrf
            <div class="form-group">
                <label>Tên danh mục:</label>
                <input type="text" class="form-control" placeholder="Tên danh mục" name="name">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Trạng thái danh mục:</label>
                <select type="text" class="form-control" placeholder="Trạng thái" name="status">
                    <option></option>
                    <option value="1">Tồn tại</option>
                    <option value="0">Không tồn tại</option>
                </select>
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('status') }}</p>
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</div>
@endsection