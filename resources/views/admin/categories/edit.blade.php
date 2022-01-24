@extends('layouts.admin')

@section('title')
Tạo danh mục
@endsection

@section('content')
<h1 class='text-center'>Thay đổi danh mục {{$categories->name}}</h1>
<form method="post" action="{{route('categories.update',$categories->id)}}">
    @csrf
    @method('put')
    <div class="form-group">
        <label>Tên danh mục</label>
        <input type="text" class="form-control" placeholder="Name" name="name" value="{{$categories->name}}">

    </div>
    <div class="form-group">
        <label>Trạng Thái </label>
        <select type="text" class="form-control"  name="status" value="{{$categories->status}}">
            <option value="0"  
            @if($categories->status == 0) selected @endif
            >Không tồn tại</option>
            <option value="1" @if($categories->status == 1) selected @endif  >Tồn tại</option>

            
        </select>
    </div>  


    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>
@endsection