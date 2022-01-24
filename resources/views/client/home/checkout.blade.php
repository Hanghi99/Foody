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
           
                <td>
                
                    <p type="number" name="quantity" class="quote" >{{$food->quantity}}</p>
                </td>
            <td>
                <h4 class="text-center amount">{{number_format($food->totalPrice)." VNĐ"}}</h4>
            </td>
          
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <!-- <h3>Tổng thanh toán</h3> -->
                    <div class="d-flex">
                        <h3>Tổng số lượng</h3>
                        @if(!$totalQuantity)
                        <div class="ml-auto font-weight-bold">Chưa nhận số lượng </div>
                        @else
                        <div class="ml-auto font-weight-bold">{{$totalQuantity->totalQuantity}} </div>
                        @endif
                    </div>
                    <div class="d-flex gr-total">
                        <h5>Tổng tiền </h5>
                        @if(!$totalPrice )
                        <div class="ml-auto font-weight-bold">Chưa nhận sản phẩm </div>
                        @else
                        <div class="ml-auto font-weight-bold">{{number_format($totalPrice->totalPrice).' VNĐ'}}</div>
                        @endif
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card mb-4">
    <div class="card-body">
        <form method="post" action="{{route('home.pay')}}" enctype="multipart/form-data">
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

            <button type="submit" class="btn btn-primary">Mua</button>
        </form>
    </div>
</div>
@endsection