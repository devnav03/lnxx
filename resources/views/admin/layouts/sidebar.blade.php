<div class="sticky">
        <div class="main-menu main-sidebar main-sidebar-sticky side-menu">
            <div class="main-sidebar-header main-container-1 active">
                <div class="sidemenu-logo">
                    <a class="main-logo" href="{{ route('dashboard') }}">
                        <img src="{{ asset('img/lnxx_logo.png')}}" class="header-brand-img desktop-logo" alt="logo">
                        <img src="{{ asset('img/lnxx_logo.png')}}" class="header-brand-img icon-logo" alt="logo">
                        <img src="{{ asset('img/lnxx_logo.png')}}" class="header-brand-img desktop-logo theme-logo" alt="logo">
                        <img src="{{ asset('img/lnxx_logo.png')}}" class="header-brand-img icon-logo theme-logo" alt="logo">
                    </a>
                </div>
                <div class="main-sidebar-body main-body-1">
                    <div class="slide-left disabled" id="slide-left"><i class="fe fe-chevron-left"></i></div>
                    <ul class="menu-nav nav">
                        <li class="nav-header"><span class="nav-label">Dashboard</span></li>
                        <li class="nav-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('dashboard') }}">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="ti-home sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link with-sub" href="javascript:void(0)">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="ti-user sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">Onboarding</span>
                            <!--     <span class="badge bg-danger side-badge">5</span> -->
                            </a>
                            <ul class="nav-sub">
                                <li class="side-menu-label1"><a href="javascript:void(0)">Onboarding</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="{{ route('customer') }}">Customers</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="#">Agents</a></li>
                            </ul>
                        </li>
                     <!--    <li class="nav-item">
                            <a class="nav-link with-sub" href="javascript:void(0)">
                                <span class="shape1"></span>
                                <span class="shape2"></span>
                                <i class="ti-shopping-cart-full sidemenu-icon menu-icon "></i>
                                <span class="sidemenu-label">ECommerce</span>
                                <i class="angle fe fe-chevron-right"></i>
                            </a>
                            <ul class="nav-sub">
                                <li class="side-menu-label1"><a href="javascript:void(0)">E-Commerce</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="ecommerce-dashboard.html">Dashboard</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="ecommerce-products.html">Products</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="ecommerce-product-details.html">Product Details</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="ecommerce-cart.html">Cart</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="ecommerce-wishlist.html">Wishlist</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="ecommerce-checkout.html">Checkout</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="ecommerce-orders.html">Orders</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="ecommerce-add-product.html">Add Product</a></li>
                                <li class="nav-sub-item"><a class="nav-sub-link" href="ecommerce-account.html">Account</a></li>
                            </ul>
                        </li> -->

                        
                        <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link with-sub"> <i class="ti-power-off sidemenu-icon menu-icon "></i><span class="sidemenu-label">Log Out</span></a></li>
                          
                        
                    </ul>
                <div class="slide-right" id="slide-right"><i class="fe fe-chevron-right"></i></div>
            </div>
        </div>
    </div>
</div>