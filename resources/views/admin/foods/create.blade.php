@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')
<h1 class="mt-4">Tạo sản phẩm</h1>

<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="{{route('foods.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tên sản phẩm :</label>
                <input type="text" class="form-control" placeholder="Tên danh mục" name="name">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Mô tả sản phẩm  :</label>
                <input type="text" class="form-control" placeholder="Mô tả" name="description">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('description') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Hình ảnh:</label>
                <input type="file" class="form-control" placeholder="Hình ảnh" name="image">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('image') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Giá:</label>
                <input type="number" class="form-control" placeholder="Giá" name="price">
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('price') }}</p>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label>Danh mục sản phẩm :</label><br>
                <select name="category_id" class="form-control">
                    @foreach($categories as $key => $category)
                        <option value="{{$category->id}}">{{$category->name}}</option> 
                    @endforeach
                </select>
                <div class="error-message">
                    @if ($errors->any())
                    <p style="color:red">{{ $errors->first('category_id') }}</p>
                    @endif
                </div>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
</div>
@endsection