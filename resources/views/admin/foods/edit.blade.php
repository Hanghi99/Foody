@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')
<h1 class="mt-4">Chỉnh sửa sản phẩm</h1>

<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="{{route('foods.update',$food->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Tên sản phẩm :</label>
                <input type="text" class="form-control" placeholder="Tên danh mục" name="name" value="{{$food->name}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Mô tả sản phẩm :</label>
                <input type="text" class="form-control" placeholder="Mô tả" name="description"
                    value="{{$food->description}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Hình ảnh:</label>
                <input type="file" class="form-control" placeholder="Hình ảnh" name="image" value="{{$food->image}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Giá:</label>
                <input type="number" class="form-control" placeholder="Giá" name="price" value="{{$food->price}}">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Danh mục sản phẩm :</label><br>
                <select name="category_id" class="form-control">
                    @foreach($categories as $key => $category)
                    <option @if($category->id==$food->category_id) selected
                        @endif
                        value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</div>
@endsection