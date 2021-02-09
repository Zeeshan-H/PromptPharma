@extends('prompt.app')

@section('content')
<body>
    <div class="body">
        <header id="header" class="header-effect-shrink" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 120, 'stickyChangeLogo': false}">
            <div class="header-body">
                <div class="header-top">
                    <div class="header-top-container container">
                        <div class="header-row">
                            <div class="header-column justify-content-start">
                                <span class="d-none d-sm-flex align-items-center">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Delivering all across Pakistan. Same day delivery in Lahore.
                                </span>
                                <span class="d-none d-sm-flex align-items-center ml-4">
                                    <i class="fas fa-phone mr-1"></i>
                                    <a href="tel:+92 305 5566669">+92 305 5566669</a>
                                </span>
                            </div>
                            <div class="header-column justify-content-end">
                                <ul class="nav">
                                     <li class="nav-item">
                                        <a class="nav-link" href="#">Contact Us</a>
                                    </li> 
                                
                                </ul>
                                <ul class="header-top-social-icons social-icons social-icons-transparent d-none d-md-block">
                                    <li class="social-icons-facebook">
                                        <a href="http://www.facebook.com/pocketpharmaonline/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <!-- <li class="social-icons-twitter">
                                        <a href="http://www.twitter.com/bonumhealth/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a>
                                    </li> -->
                                    <li class="social-icons-instagram">
                                        <a href="http://www.instagram.com/pocketpharma/" target="_blank" title="Instragram"><i class="fab fa-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-container container">
                    <div class="header-row">
                        <div class="header-column justify-content-start">
                            <div class="header-logo">
                                <a href="{{route('home')}}">
                                    <img alt="EZ" width="125" height="62" src="{{asset('frontimages/logo-shop.png')}}">
                                </a>
                            </div>
                        </div>
                        <div class="header-column justify-content-end">
                            
                            <div class="header-nav justify-content-start">
                                
                                <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1">
                                    <nav class="collapse">
                                        <ul class="nav flex-column flex-lg-row" id="mainNav">
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-item dropdown-toggle active" href="{{route('home')}}">
                                                    HOME
                                            </a>
                                            </li>
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-item dropdown-toggle" href="{{route('about')}}">
                                                    ABOUT
                                            </a>
                                            </li>
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-item dropdown-toggle" href="{{route('search')}}">
                                                    SEARCH MEDICINES
                                            </a>
                                            </li>
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-item dropdown-toggle" href="{{route('allproducts')}}">
                                                    PRODUCTS
                                            </a>
                                            </li>
                                        
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-item dropdown-toggle" href="{{route('contact')}}">
                                                    CONTACT
                                            </a>
                                            </li>
                                            
                                        </ul>
                                    </nav>
                                </div>
                                <a href="#" class="btn btn-link text-color-default font-weight-bold order-3 d-none d-sm-block ml-auto mr-2 pt-1 text-1"></a>
                                @if(isset($cart) && $cart->getContents())
                                {{-- @foreach($cart->getContents() as $slug => $product) --}}

                                @php
                                $produc = $cart->getContents();
                                foreach($cart->getContents() as $slug => $product) {
                                        $prod = $product;
                                    
                                }
                                @endphp 
                                <div class="mini-cart order-4 justify-content-end">
                                    <span class="font-weight-bold font-primary">
                                        <span class="cart-total">{{'PKR '. @array_sum($total)}}</span>
                                    
                                     
                                    </span>

   
                                    <div class="mini-cart-icon">
                                
                                        <img src="{{asset('frontimages/cart-bag.svg')}}" class="img-fluid" alt="" />
                                        <span class="badge badge-primary rounded-circle">{{$cart->getTotalQty()}}</span>
                                 
                                  
                                    </div>

                                    <div class="mini-cart-content">
                                        <div class="inner-wrapper bg-light rounded">
                                            @foreach($cart->getContents() as $slug => $product)
                                            <div class="mini-cart-product">

                                                <div class="row">

                                                    <div class="col-7">
                                                        <h2 class="text-color-default font-secondary text-1 mt-3 mb-0">{{$product['name']}}</h2>
                                                        <strong class="text-color-dark">
                                                            <span class="qty">{{$product['quantity']}}x</span>
                                                            <span class="cart-total">{{'PKR '. $product['price']}}</span>
                                                         
                                                            {{-- <span class="cart-total">PKR 0</span>                                            
                                                         --}}
                                                        </strong>
                                                    </div>
                                           

                                                    <div class="col-5">
                                                       
                                                        <div class="product-image">
                                                            <form action="{{route('cart.remove', $product['name'])}}" method="POST" accept-charset="utf-8">
                                                                @csrf
                                                            
                                                            <input type="submit" name="remove" value="x Remove" class="btn btn-outline-danger"/>
                                                            </form>
                                                            {{-- <a href="#" class="btn btn-light btn-rounded justify-content-center align-items-center"><i class="fas fa-times"></i></a> --}}
                                                            <img src="{{asset('frontimages/noimg.jpg')}}" class="img-fluid rounded" alt="" />
                                                            <img src="" class="img-fluid rounded" alt="" />                                                                
                                                        
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>
                                            @endforeach
                                            <div class="mini-cart-total">
                                                <div class="row">
                                                    <div class="col">
                                                        <strong class="text-color-dark">TOTAL:</strong>
                                                    </div>
                                                    <div class="col text-right">
                                                        <span class="total-value text-color-dark">{{'PKR '. @array_sum($total)}}</span>
                                                        {{-- <span class="total-value text-color-dark">PKR 0</span>                                             --}}
                                                        {{-- <strong class="total-value text-color-dark">PKR 100</strong> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mini-cart-actions">
                                                <div class="row">
                                                    <div class="col pr-1">
                                                        <a href="{{route('cart.all')}}" class="btn btn-dark font-weight-bold rounded text-0">VIEW CART</a>
                                                    </div>
                                                    <div class="col pl-1">
                                                        <a href="{{route('checkout')}}" class="btn btn-primary font-weight-bold rounded text-0">CHECKOUT</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @endforeach --}}
                                @else 
                                <div class="mini-cart order-4 justify-content-end">
                                    <span class="font-weight-bold font-primary">
                                        <span class="cart-total">PKR 0</span>                                            
                                      
                                    </span>

                                    <div class="mini-cart-icon">
                                        <img src="{{asset('frontimages/cart-bag.svg')}}" class="img-fluid" alt="" />
                                        <span class="badge badge-primary rounded-circle">0</span>                                            
                                        
                                    </div>
                                    <div class="mini-cart-content">
                                        <div class="inner-wrapper bg-light rounded">
                                            <div class="mini-cart-product">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 class="text-color-default font-secondary text-1 mt-3 mb-0">{{@$product['name']}}</h2>
                                                        <strong class="text-color-dark">
                                                            <span class="qty">1x</span>
                                                            <span class="cart-total">PKR 0</span>                                            
                                                        
                                                        </strong>
                                                    </div>
                                                    <div class="col-5">
                                                        <div class="product-image">
                                                            <a href="#" class="btn btn-light btn-rounded justify-content-center align-items-center"><i class="fas fa-times"></i></a>
                                                            <img src="" class="img-fluid rounded" alt="" />                                                                
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mini-cart-total">
                                                <div class="row">
                                                    <div class="col">
                                                        <strong class="text-color-dark">TOTAL:</strong>
                                                    </div>
                                                    <div class="col text-right">
                                                        {{-- <span class="total-value text-color-dark">{{'PKR '. @$cart->getTotalPrice()}}</span> --}}
                                                        <span class="total-value text-color-dark">PKR 0</span>                                            
                                                        {{-- <strong class="total-value text-color-dark">PKR 100</strong> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mini-cart-actions">
                                                <div class="row">
                                                    <div class="col pr-1">
                                                        <a href="{{route('cart.all')}}" class="btn btn-dark font-weight-bold rounded text-0">VIEW CART</a>
                                                    </div>
                                                    <div class="col pl-1">
                                                        <a href="{{route('checkout')}}" class="btn btn-primary font-weight-bold rounded text-0">CHECKOUT</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <button class="header-btn-collapse-nav order-4 ml-3" data-toggle="collapse" data-target=".header-nav-main nav">
                                    <span class="hamburguer">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </span>
                                    <span class="close">
                                        <span></span>
                                        <span></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div role="main" class="main">
            <div class="slider-container slider-container-height-600 rev_slider_wrapper">
                <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'sliderLayout': 'standard', 'gridwidth': [1140,960,720,540], 'gridheight': [600,600,600,600], 'disableProgressBar': 'on', 'responsiveLevels': [4096,1200,992,576], 'navigation' : {'arrows': { 'enable': true, 'hide_under': 767, 'style': 'slider-arrows-style-1 slider-arrows-light' }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 35, 'h_offset': 0}}}">

                    <ul>
                        <li data-transition="fade">
                            <img src="{{asset('frontimages/slide-1-1.jpg')}}"  
                                alt=""
                                data-bgposition="center" 
                                data-bgfit="cover" 
                                data-bgrepeat="no-repeat" 
                                data-kenburns="on" 
                                data-duration="2500" 
                                data-ease="Power2.easeInOut" 
                                data-scalestart="125" 
                                data-scaleend="100" 
                                data-rotatestart="0" 
                                data-rotateend="0" 
                                data-blurstart="20" 
                                data-blurend="0" 
                                data-offsetstart="0 0" 
                                data-offsetend="0 0"
                                class="rev-slidebg">

                            <div class="tp-caption text-color-light font-primary font-weight-bold"
                                data-x="left" data-hoffset="['52','52','17','17']"
                                data-y="center" data-voffset="['-80','-80','-80','-70']"
                                data-start="1000"
                                data-fontsize="['55','55','55','55']"
                                data-lineheight="['60','60','60','60']"
                                data-transform_in="y:[100%];opacity:0;s:500;"
                                data-transform_out="y:[100%];opacity:0;s:500;"
                                data-mask_in="x:0px;y:0px;">ACCESSIBLE &</div>

                            <div class="tp-caption text-color-light font-primary font-weight-bold"
                                data-x="left" data-hoffset="['50','50','15','15']"
                                data-y="center" data-voffset="['-30','-30','-30','-30']"
                                data-start="1000"
                                data-fontsize="['55','55','55','47']"
                                data-lineheight="['60','60','60','52']"
                                data-transform_in="y:[100%];opacity:0;s:500;"
                                data-transform_out="y:[100%];opacity:0;s:500;"
                                data-mask_in="x:0px;y:0px;">AFFORDABLE</div>

                            <div class="tp-caption text-color-light font-primary"
                                data-x="left" data-hoffset="['50','50','15','15']"
                                data-y="center" data-voffset="['30','30','30','15']"
                                data-start="1000"
                                data-fontsize="['18','18','18','18']"
                                data-lineheight="['25','25','25','25']"
                                data-transform_in="y:[100%];opacity:0;s:500;"
                                data-transform_out="y:[100%];opacity:0;s:500;"
                                data-mask_in="x:0px;y:0px;">PRODUCTS <span class="bg-dark text-color-light font-weight-bold p-1">UPTO 20% OFF</span></div>

                            <a class="tp-caption btn btn-rounded btn-primary font-weight-semibold text-1"
                                href="{{route('search')}}"
                                data-x="left" data-hoffset="['50','50','15','15']"
                                data-y="center" data-voffset="['115','115','115','115']"
                                data-start="1600"
                                data-whitespace="nowrap"
                                data-fontsize="['13','14','14','14']"
                                data-paddingtop="['13','14','14','14']"
                                data-paddingbottom="['13','13','13','16']"
                                data-paddingleft="['70','70','70','70']"
                                data-paddingright="['70','70','70','70']"	 
                                data-transform_in="y:[-50%];opacity:0;s:500;"
                                data-transform_out="y:[50%];opacity:0;s:500;">SHOP NOW</a>
                            
                        </li>
                        <li data-transition="fade">
                            <img src="{{asset('frontimages/slide-1-2.jpg')}}"  
                                alt=""
                                data-bgposition="center center" 
                                data-bgfit="cover" 
                                data-bgrepeat="no-repeat" 
                                data-kenburns="on" 
                                data-duration="2500" 
                                data-ease="Power2.easeInOut" 
                                data-scalestart="125" 
                                data-scaleend="100" 
                                data-rotatestart="0" 
                                data-rotateend="0" 
                                data-blurstart="20" 
                                data-blurend="0" 
                                data-offsetstart="0 0" 
                                data-offsetend="0 0"
                                class="rev-slidebg">

                            <div class="tp-caption text-color-light font-primary font-weight-bold"
                                data-x="left" data-hoffset="['750','630','420','290']"
                                data-y="center" data-voffset="['-80','-80','-80','-70']"
                                data-start="1000"
                                data-fontsize="['55','55','55','55']"
                                data-lineheight="['60','60','60','60']"
                                data-transform_in="y:[100%];opacity:0;s:500;"
                                data-transform_out="y:[100%];opacity:0;s:500;"
                                data-mask_in="x:0px;y:0px;">CONVENIENCE</div>

                            <div class="tp-caption text-color-light font-primary font-weight-bold"
                                data-x="left" data-hoffset="['750','630','420','290']"
                                data-y="center" data-voffset="['-30','-30','-30','-30']"
                                data-start="1000"
                                data-fontsize="['55','55','55','47']"
                                data-lineheight="['60','60','60','52']"
                                data-transform_in="y:[100%];opacity:0;s:500;"
                                data-transform_out="y:[100%];opacity:0;s:500;"
                                data-mask_in="x:0px;y:0px;">DELIVERED</div>

                            <div class="tp-caption text-color-light font-primary"
                                data-x="left" data-hoffset="['750','630','420','290']"
                                data-y="center" data-voffset="['30','30','30','15']"
                                data-start="1000"
                                data-fontsize="['18','18','18','18']"
                                data-lineheight="['25','25','25','25']"
                                data-transform_in="y:[100%];opacity:0;s:500;"
                                data-transform_out="y:[100%];opacity:0;s:500;"
                                data-mask_in="x:0px;y:0px;">MORE THAN <span class="bg-light text-color-dark font-weight-bold p-1">500 PRODUCTS</span></div>

                            <a class="tp-caption btn btn-rounded btn-primary font-weight-semibold text-1"
                                href="{{route('search')}}"
                                data-x="left" data-hoffset="['750','630','420','290']"
                                data-y="center" data-voffset="['115','115','115','115']"
                                data-start="1600"
                                data-whitespace="nowrap"
                                data-fontsize="['13','14','14','14']"
                                data-paddingtop="['13','14','14','14']"
                                data-paddingbottom="['13','13','13','16']"
                                data-paddingleft="['70','70','70','70']"
                                data-paddingright="['70','70','70','70']"	 
                                data-transform_in="y:[-50%];opacity:0;s:500;"
                                data-transform_out="y:[50%];opacity:0;s:500;">SHOP NOW</a>
                            
                        </li>
                    </ul>
                </div>
            </div>
        
            <section class="section pt-4 pb-5 mt-2">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                            <div class="image-frame">
                                <div class="image-frame-wrapper">
                                    <img src="{{asset('frontimages/product-bg-1.jpg')}}" class="img-fluid" alt="">
                                    <div class="image-frame-info image-frame-info-show flex-column align-items-start px-4 mx-2">
                                        <span class="text-color-dark font-primary font-weight-bold text-3">SEARCH</span>
                                        <h2 class="text-color-dark font-weight-bold text-4 mb-4">MEDICINES</h2>
                                        <a href="{{route('search')}}" class="btn btn-primary btn-rounded font-weight-bold btn-h-1 btn-v-3 text-0">SEARCH</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 mb-4 mb-lg-0 appear-animation" data-appear-animation="fadeIn">
                            <div class="image-frame">
                                <div class="image-frame-wrapper">
                                    <img src="{{asset('frontimages/product-bg-2.jpg')}}" class="img-fluid" alt="">
                                    <div class="image-frame-info image-frame-info-show flex-column align-items-start px-4 mx-2">
                                        <span class="text-color-dark font-primary font-weight-bold text-3">TOP</span>
                                        <h2 class="text-color-dark font-weight-bold text-4 mb-4">PRODUCTS</h2>
                                        <a href="{{route('allproducts')}}" class="btn btn-primary btn-rounded font-weight-bold btn-h-1 btn-v-3 text-0">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                            <div class="image-frame">
                                <div class="image-frame-wrapper">
                                    <img src="{{asset('frontimages/product-bg-3.jpg')}}" class="img-fluid" alt="">
                                    <div class="image-frame-info image-frame-info-show flex-column align-items-start px-4 mx-2">
                                        <span class="text-color-dark font-primary font-weight-bold text-3">30 MINUTES</span>
                                        <h2 class="text-color-dark font-weight-bold text-4 mb-4">DELIVERY</h2>
                                        <a href="{{route('about')}}" class="btn btn-primary btn-rounded font-weight-bold btn-h-1 btn-v-3 text-0">LEARN MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="section pt-0 pb-5">
                <div class="container">
                    <div class="row text-center mb-4">
                        <div class="col">
                            <div class="overflow-hidden">
                                <span class="d-block top-sub-title text-color-primary appear-animation" data-appear-animation="maskUp">TOP SELLERS</span>
                            </div>
                            <div class="overflow-hidden mb-2">
                                <h2 class="font-weight-bold mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">Our Products</h2>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        <div class="col">
                            <div class="owl-carousel owl-theme nav-style-3" data-plugin-options="{'loop': true, 'autoplay': false, 'items': 4, 'nav': true, 'dots': false, 'margin': 20, 'autoplayHoverPause': true, 'autoHeight': true}">

                                <div class="text-center">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                        <div class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                            <a href="shop-product-detail-right-sidebar.html">
                                                <img src="{{asset('frontimages/product-1.jpg')}}" class="img-fluid" alt="">
                                            </a>
                                            <div class="image-frame-action">
                                                <a href="cart.html" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-right-sidebar.html">Gloves</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$59</strong></span>
                                
                                </div>

                                <div class="text-center">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                        <div class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                            <a href="shop-product-detail-right-sidebar.html">
                                                <img src="img/products/product-2.jpg" class="img-fluid" alt="">
                                            </a>
                                            <div class="image-frame-action">
                                                <a href="cart.html" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-right-sidebar.html">Hand Sanitizer</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$19</strong></span>
                                
                                </div>

                                <div class="text-center">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                        <div class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                            <a href="shop-product-detail-right-sidebar.html">
                                                <img src="img/products/product-3.jpg" class="img-fluid" alt="">
                                            </a>
                                            <div class="image-frame-action">
                                                <a href="cart.html" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-right-sidebar.html">Thermometer</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$30</strong></span>
                                    <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$40</strong></span>
                                </div>

                                

                            </div>
                        </div>
                    </div> --}}

                    {{-- <div class="row appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                         --}}
                        <div class="row">


                            {{-- <div class="owl-carousel owl-theme nav-style-3"> --}}

                                {{-- <div class="text-center">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                        <div class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                            <a href="shop-product-detail-right-sidebar.html">
                                                <img src="img/products/product-1.jpg" class="img-fluid" alt="">
                                            </a>
                                            <div class="image-frame-action">
                                                <a href="cart.html" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-right-sidebar.html">Gloves</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$59</strong></span>
                                
                                </div> --}}

                                {{-- <div class="text-center">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                        <div class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                            <a href="shop-product-detail-right-sidebar.html">
                                                <img src="img/products/product-2.jpg" class="img-fluid" alt="">
                                            </a>
                                            <div class="image-frame-action">
                                                <a href="cart.html" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-right-sidebar.html">Hand Sanitizer</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$19</strong></span>
                                
                                </div> --}}


                                    
                                @foreach ($products as $product)
                                <div class="col-sm-4">

                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                        <div class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                            {{-- <a href="shop-product-detail-right-sidebar.html"> --}}
                                                <img src="{{asset(''.$product->image_path)}}" alt="" height="300px" width="400px">
                                            {{-- </a> --}}
                                            <div class="image-frame-action">
                                                <a href="{{route('cart2', [$product, $product])}}" id="btncart-{{$product->image_id}}" onclick="change('{{$product->image_id}}')" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                                <input type="hidden" value="{{$product->image_id}}" id="myText">
                                             
                                                {{-- <a href="{{route('cart', [$product['name'], $product['type']])}}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                                                                              --}}
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-right-sidebar.html">{{@$product->products->name}}</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">{{@$product->products->price. 'PKR'}}</strong></span>

                                    {{-- <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-right-sidebar.html">{{@$product['name']}}</a></h3><br>
                                    @foreach ($product['pharmacyList'] as $item)
                                 
                                    @if ($item['price'] == null)
                                    <span class="price font-primary text-4"><strong class="text-color-dark">{{@$item['name'].': '. 'N/A'}}</strong></span><br>
                                    <a href="{{route('cart', [$product['name'], $item['name'], 0, $item['quantity']])}}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a><br>
                         
                                    @else 
                                    <span class="price font-primary text-4"><strong class="text-color-dark">{{@$item['name'].': '.@$item['price'].'PKR'}}</strong></span><br>
                                    <a href="{{route('cart', [$product['name'], $item['name'], @$item['price'], $item['quantity']])}}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a><br>
                                    
                                    @endif
                                        
                                    @endforeach --}}
                                    {{-- <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$40</strong></span> --}}
                                  
                                </div>
                                @endforeach
 
                            </div>


                        </div>

                    {{-- </div> --}}

                </div>
            </section>
            <div class="container">
                <hr>
            </div>
            {{-- <section class="section pb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="200">
                            <h2 class="font-weight-bold text-4 mb-4">New Arrivals Products</h2>

                            <div class="product row align-items-center mb-4">
                                <div class="col-4">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2">
                                        <span class="image-frame-wrapper">
                                            <img src="img/products/product-1.jpg" class="img-fluid" alt="">
                                            <span class="image-frame-action image-frame-action-style-2 image-frame-action-effect-1 image-frame-action-md">
                                                <a href="shop-product-detail-left-sidebar.html">
                                                    <span class="image-frame-action-icon">
                                                        <i class="lnr lnr-link text-color-light"></i>
                                                    </span>
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-left-sidebar.html">Long Hoddie</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$59</strong></span>
                                    <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$69</strong></span>
                                </div>
                            </div>

                            <div class="product row align-items-center mb-4">
                                <div class="col-4">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2">
                                        <span class="image-frame-wrapper">
                                            <img src="img/products/product-2.jpg" class="img-fluid" alt="">
                                            <span class="image-frame-action image-frame-action-style-2 image-frame-action-effect-1 image-frame-action-md">
                                                <a href="shop-product-detail-left-sidebar.html">
                                                    <span class="image-frame-action-icon">
                                                        <i class="lnr lnr-link text-color-light"></i>
                                                    </span>
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-left-sidebar.html">Leather Belt</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$19</strong></span>
                                    <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$29</strong></span>
                                </div>
                            </div>

                            <div class="product row align-items-center mb-4">
                                <div class="col-4">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2">
                                        <span class="image-frame-wrapper">
                                            <img src="img/products/product-3.jpg" class="img-fluid" alt="">
                                            <span class="image-frame-action image-frame-action-style-2 image-frame-action-effect-1 image-frame-action-md">
                                                <a href="shop-product-detail-left-sidebar.html">
                                                    <span class="image-frame-action-icon">
                                                        <i class="lnr lnr-link text-color-light"></i>
                                                    </span>
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-left-sidebar.html">Jack Sandals</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$30</strong></span>
                                    <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$40</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="400">
                            <h2 class="font-weight-bold text-4 mb-4">Top Rated Products</h2>

                            <div class="product row align-items-center mb-4">
                                <div class="col-4">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2">
                                        <span class="image-frame-wrapper">
                                            <img src="img/products/product-4.jpg" class="img-fluid" alt="">
                                            <span class="image-frame-action image-frame-action-style-2 image-frame-action-effect-1 image-frame-action-md">
                                                <a href="shop-product-detail-left-sidebar.html">
                                                    <span class="image-frame-action-icon">
                                                        <i class="lnr lnr-link text-color-light"></i>
                                                    </span>
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-left-sidebar.html">Vintage Hat</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$79</strong></span>
                                    <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$99</strong></span>
                                </div>
                            </div>

                            <div class="product row align-items-center mb-4">
                                <div class="col-4">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2">
                                        <span class="image-frame-wrapper">
                                            <img src="img/products/product-5.jpg" class="img-fluid" alt="">
                                            <span class="image-frame-action image-frame-action-style-2 image-frame-action-effect-1 image-frame-action-md">
                                                <a href="shop-product-detail-left-sidebar.html">
                                                    <span class="image-frame-action-icon">
                                                        <i class="lnr lnr-link text-color-light"></i>
                                                    </span>
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-left-sidebar.html">Timez Watch</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$119</strong></span>
                                    <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$199</strong></span>
                                </div>
                            </div>

                            <div class="product row align-items-center mb-4">
                                <div class="col-4">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2">
                                        <span class="image-frame-wrapper">
                                            <img src="img/products/product-6.jpg" class="img-fluid" alt="">
                                            <span class="image-frame-action image-frame-action-style-2 image-frame-action-effect-1 image-frame-action-md">
                                                <a href="shop-product-detail-left-sidebar.html">
                                                    <span class="image-frame-action-icon">
                                                        <i class="lnr lnr-link text-color-light"></i>
                                                    </span>
                                                </a>
                                            </span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-left-sidebar.html">Clauren Bag</a></h3>
                                    <span class="price font-primary text-4"><strong class="text-color-dark">$289</strong></span>
                                    <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$299</strong></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 appear-animation" data-appear-animation="fadeInRightShorter" data-appear-animation-delay="600">
                            <h2 class="font-weight-bold text-4 mb-4">Special Offer</h2>
                            <div class="image-frame">
                                <div class="image-frame-wrapper align-items-center">
                                    <img src="img/shop/product-bg-14.jpg" class="img-fluid" alt="">
                                    <div class="image-frame-info image-frame-info-show flex-column align-items-start px-4 mx-2">
                                        <h2 class="text-color-light font-weight-semibold text-4 line-height-1 mb-4"><strong class="font-weight-semibold text-6">10% OFF</strong><br>NOVAMED PRODUCTS</h2>
                                        <a href="{{route('allproducts')}}" class="btn btn-primary btn-rounded font-weight-bold btn-h-2 btn-v-3">SHOP NOW</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            <div class="container">
                <hr>
            </div>


            <section class="section call-to-action bg-primary call-to-action-text-light call-to-action-text-background">
                <span class="text-background text-color-light font-primary font-weight-bold appear-animation" data-appear-animation="textBgFadeInUp" data-appear-animation-delay="800">DOWNLOAD</span>
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-9">
                            <div class="call-to-action-content text-center text-lg-left appear-animation" data-appear-animation="fadeInLeftShorter">
                                <h2 class="font-weight-semibold">Pharmacy in your pocket. Download the App Now.</h2>
                                <p class="font-weight-light mb-0">Available on the App Store & Play Store.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-lg-3">
                            <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInRightShorter">
                                <a href="https://play.google.com/store/apps/details?id=com.bilal.pocketpharma" target="_blank" class="btn btn-light btn-outline btn-rounded font-weight-semibold btn-h-3 btn-v-3 text-0">DOWNLOAD APP</strong></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
        
            
         </div>
            
    
         <footer id="footer" class="bg-light mb-5 mt-0">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <h2 class="text-color-dark font-weight-semibold text-1 mb-3">PROMPT PHARMA</h2>
                        <p>Get your medicines delivered at your doorstep from your renowned pharmacies in your vicinity. Get discounted products from hundreds of sellers.</p>
                    </div>
                    <div class="col-lg-4 ml-auto mb-4 mb-lg-0">
                        <h2 class="text-color-dark font-weight-semibold text-1 mb-3">OUR LOCATION</h2>
                        <ul class="list list-unstyled">
                            <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span class="text-color-dark">Address:</span> Lahore, Pakistan	</li>
                            <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span class="text-color-dark">Phone:</span> <a href="tel:
                                +923055566669">
                                +92 305 5566669</a></li>
                            <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <span class="text-color-dark">Email:</span> <a href="mailto:thepocketpharma1@gmail.com" class="link-underline-dark">thepocketpharma1@gmail.com</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h2 class="text-color-dark font-weight-semibold text-1 mb-3">QUICK LINKS</h2>
                        <ul class="list list-unstyled">
                            <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="{{route('home')}}">Home</li>
                                <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="{{route('about')}}">Learn More</a></li>
                            <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="{{route('allproducts')}}">Shop Now</a></li>
                            <li class="mb-2"><i class="fas fa-angle-right mr-2 ml-1"></i> <a href="{{route('contact')}}">Contact Us</a></li>
                        </ul>
                    </div>
                    
                </div>
                <div class="container">
                    <hr>
                </div>
                <p class="text-md-center pb-0 mb-0">Copyrights © 2020. All Rights Reserved by Prompt Pharma</p>
            </div>

        

        </footer>
        
        
    </div>

    <!-- Vendor -->
    <script src="{{asset('frontjs/jquery.min.js')}}"></script>
    <script src="{{asset('frontjs/jquery.appear.min.js')}}"></script>
    <script src="{{asset('frontjs/jquery.easing.min.js')}}"></script>
    <script src="{{asset('frontjs/jquery-cookie.min.js')}}"></script>
    <script src="{{asset('frontjs/style.switcher.js')}}" id="styleSwitcherScript" data-base-path="" data-skin-src=""></script>
    <script src="{{asset('frontjs/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontjs/common.min.js')}}"></script>
    <script src="{{asset('frontjs/jquery.validation.min.js')}}"></script>
    <script src="{{asset('frontjs/jquery.easy-pie-chart.min.js')}}"></script>
    <script src="{{asset('frontjs/jquery.gmap.min.js')}}"></script>
    <script src="{{asset('frontjs/jquery.lazyload.min.js')}}"></script>
    <script src="{{asset('frontjs/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('frontjs/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontjs/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontjs/vide.min.js')}}"></script>
    <script src="{{asset('frontjs/vivus.min.js')}}"></script>
    
    <!-- Theme Base, Components and Settings -->
    <script src="{{asset('frontjs/theme.js')}}"></script>
    
    <!-- Current Page Vendor and Views -->
    <script src="{{asset('frontjs/jquery.themepunch.tools.min.js')}}"></script>		
    <script src="{{asset('frontjs/jquery.themepunch.revolution.min.js')}}"></script>
    
    <!-- Theme Custom -->
    <script src="{{asset('frontjs/custom.js')}}"></script>
    
    <!-- Theme Initialization Files -->
    <script src="{{asset('frontjs/theme.init.js')}}"></script>
  

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
    
        ga('create', 'UA-42715764-9', 'auto');
        ga('send', 'pageview');

        function change(id) {

            // var id = document.getElementById("myText").value;

document.getElementById('btncart-' + id).innerHTML = 'Added';
        }
    </script>



</body>

    
@endsection