<div class="container " style="background-color:#FFE4B5">
    <!-- Top box -->
    <!-- Logo & Site Name -->
    <div class="placeholder">
        <div class="parallax-window" data-parallax="scroll" data-image-src="{{asset('client/img/banner.jpg')}}">
            <div class="tm-header">
                <div class="row tm-header-inner">
                    <div class="col-md-6 col-12">
                        <img src="{{asset('client/img/logo.jpg')}}" alt="Logo" class="tm-site-logo" style="width:80px"/>
                        <div class="tm-site-text-box">
                            <h1 class="tm-site-title">Hạ Nghi Foods</h1>
                            <h6 class="tm-site-description">Thiên đường ẩm thực</h6>
                        </div>
                    </div>
                    <nav class="col-md-6 col-12 tm-nav">
                        <ul class="tm-nav-ul">
                            <li class="tm-nav-li"><a href="{{url('client.home')}}" class="tm-nav-link active" >Trang chủ</a></li>
                         <li class="tm-nav-li"><a href="contact.html" class="tm-nav-link">Liên hệ</a></li>
                            <li class="tm-nav-li"><a href="{{url('client.home.cart')}}" class="tm-nav-link">Giỏ hàng</a></li>
                           
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <main>
        <header class="row tm-welcome-section">
            <h2 class="col-12 text-center tm-section-title" style="color:red">Chào mừng bạn ghé thăm Hạ Nghi Foods</h2>
            <p class="col-12 text-center">Đến với <strong>Hạ Nghi Foods</strong> bạn sẽ được trải nghiệm những điều thú vị, nếm những món ăn ngon đến từ nhiều vùng miên trên mảnh đất chữ S thân thương này.
				Với phương châm "ăn quán vị nhà" chúng tôi hứa hẹn sẽ giúp bạn thưởng thức được món ăn mang hương vị gia đình, để dù ở xa bạn vẫn vui vẻ để đón nhận và hoàn thành tốt các công việc.
			</p>
        </header>
        <div class="tm-paging-links">
            <nav>
                <ul>
                     @foreach ($Categories as $category)
                   <li class="tm-paging-item"><a href="{{route('home.category',$category->id)}}" class="tm-paging-link " >{{$category->name}}</a></li>
                   @endforeach
                    <!-- <li class="tm-paging-item"><a href="#" class="tm-paging-link">Món chay</a></li>
                    <li class="tm-paging-item"><a href="#" class="tm-paging-link">Điểm tâm</a></li>
                    <li class="tm-paging-item"><a href="#" class="tm-paging-link">Đồ uống</a></li>  -->
                </ul>
            </nav>
        </div>