<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{Route('foods.index')}}">
                    <div class="sb-nav-link-icon"><i class="fab fa-android"></i></div>
                Món ăn
                </a>
                <a class="nav-link" href="{{Route('users.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                   Khách hàng
                </a>
                <a class="nav-link" href="{{Route('categories.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                  Danh mục
                </a>
                <a class="nav-link" href="{{Route('orders.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                  Đơn hàng
                </a>
                <a class="nav-link" href="{{Route('order_details.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-cart-plus"></i></div>
                  Chi tiết đơn hàng
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            Start Bootstrap
        </div>
    </nav>
</div>