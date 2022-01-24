@extends('layouts.client')

@section('content')

<!-- Gallery -->
<div class="row tm-gallery">
    <!-- gallery page 1 -->
    @if (Session::has('success'))
    <div class="alert alert-success">{{session::get('success')}}</div>
    @endif

    <div id="tm-gallery-page-pizza" class="tm-gallery-page">
        @foreach ($foods as $food)
        <article class="col-lg-3 col-md-4 col-sm-6 col-12 tm-gallery-item">
            <figure>
                <img src="{{ asset('admin/images/'.$food->image) }}" alt="Image" class="img-fluid tm-gallery-img"
                    style="width:145px;height:120px" />
                <figcaption>
                    <h4 class="tm-gallery-title">{{$food->name}}</h4>
                    <p class="tm-gallery-description">{{$food->description}}</p>
                    <p class="tm-gallery-price">{{number_format($food->price)." VNĐ"}}</p>
                    <a class="btn btn-primary" href="{{route('addToCart',$food->id)}}">Mua</a>
                </figcaption>
            </figure>
        </article>
        @endforeach
    </div> <!-- gallery page 1 -->


</div>
@endsection