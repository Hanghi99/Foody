@extends('layouts.admin')

@section('content')
<h1 class="mt-4">Quản lý sản phẩm </h1>

<div class="card mb-4">
    @if (Session::has('success'))
    <div class="alert alert-success">{{session::get('success')}}</div>
    @endif
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <a href="{{route('foods.create')}}" class="btn btn-success mb-3    ">Tạo mới <i
                        class="fas fa-plus-square"></i></a>
            </div>
            <div class="col-4">
                <form class="" method="get" action="{{route('foods.index')}}">
                    @csrf
                    <div class="input-group">
                        <input class="form-control" type="text" name="search" placeholder="Search for..."
                            aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                        <button class="btn btn-primary" id="btnNavbarSearch" type="submit"><i
                                class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>

        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tên sản phẩm </th>
                    <th scope="col">Mô tả</th>
                    <th scope="col">Ảnh</th>
                    <th scope="col">Giá</th>
                    <th scope="col">Danh mục sản phảm </th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($foods as $key => $food)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$food->name}}</td>
                    <td>{{$food->description}}</td>
                    <td><img src="{{asset('admin/images/'.$food->image)}}" style="width:100px"></td>
                    <td>{{number_format($food->price)." VNĐ"}}</td>
                    <td>{{$food->categories->name}}</td>
                    <td>
                        <a href="{{route('foods.show',$food->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="{{route('foods.edit',$food->id)}}" class="btn btn-success"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{route('foods.destroy',$food->id)}}" method="post"
                            Style="display:inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i
                                    class="fas fa-trash-alt"></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
    <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <span aria-hidden="true"> {{ $foods->links() }}</span>
                </ul>
            </nav>
        </div>
</div>
@endsection