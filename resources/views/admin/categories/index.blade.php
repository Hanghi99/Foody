@extends('layouts.admin')

@section('content')
<h1 class="mt-4">Quản lý danh mục</h1>

<div class="card mb-4">
    @if (Session::has('success'))
    <div class="alert alert-success">{{session::get('success')}}</div>
    @endif
    <div class="card-body">
        <div class="row">
            <div class="col-8">
                <a href="{{route('categories.create')}}" class="btn btn-success mb-3    ">Tạo mới <i
                        class="fas fa-plus-square"></i></a>
            </div>
            <div class="col-4">
                <form class="" method="get" action="#">
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
                    <th scope="col">Tên danh mục</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$category->name}}</td>
                    <td>
                        @if($category->status==1)
                            Tồn tại
                        @else
                            Không tồn tại
                        @endif
                    </td>
                    <td>
                        <a href="{{route('categories.show',$category->id)}}" class="btn btn-primary"><i class="fas fa-eye"></i></a>
                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-success"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{route('categories.destroy',$category->id)}}" method="post"
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
        <div class="d-flex justify-content-center">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <span aria-hidden="true"> {{ $categories->links() }}</span>
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection
