@extends('layouts.client')

@section('content')

<table class="table table-bordered border-radius">
    <thead>
        <tr>
            <th class="darkcolor">Ảnh</th>
            <th class="darkcolor">Món ăn</th>
            <th class="darkcolor">Giá </th>
            <th class="darkcolor">Số lượng</th>
            <th class="darkcolor">Tổng</th>
            <th class="darkcolor">Thay đổi</th>
            <th class="darkcolor">Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Carts as $key => $food)
        <tr>
            <td>
                <div class="d-table product-detail-cart">
                    <div class="media">
                        <div class="row no-gutters">
                            <div class="col-12 col-lg-2 product-detail-cart-image">
                                <a class="shopping-product"><img style="width:150px;height:150px" src="{{ asset('admin/images/'.$food->image) }}" alt="Generic placeholder image"></a>
                            </div>
                            <div class="col-12 col-lg-10 mt-auto product-detail-cart-data">
                                <div class="media-body ml-lg-3">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </td>
            <td>
                <h4 class="product-name">{{$food->name}}</h4>
            </td>
            <td>
                <h4 class="text-center amount">{{number_format($food->price)." VNĐ"}}</h4>
            </td>
            <form action="{{route('fixCartUser',$food->id)}}" method="post">
                <td>
                @csrf
                    <input type="number" name="quantity" class="quote" value="{{$food->quantity}}" min="1">
                </td>
            <td>
                <h4 class="text-center amount">{{number_format($food->totalPrice)." VNĐ"}}</h4>
            </td>
            <td class="text-center"><button class="btn btn-primary">thay đổi</button></td>
            </td>
            </form>
            <td class="text-center"><a href="{{route('delelteCartUser',$food->id)}}" class="btn btn-danger">xoá</a></td>
        </tr>
        @endforeach
    </tbody>
   
</table>
<a href="{{route('home.checkout')}}" class="btn btn-primary">Thanh toán </a>
@endsection