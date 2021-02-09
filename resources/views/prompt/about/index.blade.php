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
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="contact-us-1.html">Contact Us</a>
                                    </li> -->
                                
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
                                                <a class="dropdown-item dropdown-toggle" href="{{route('home')}}">
                                                    HOME
                                            </a>
                                            </li>
                                            <li class="dropdown dropdown-mega">
                                                <a class="dropdown-item dropdown-toggle active" href="about.html">
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
        



            <div class="slider-container slider-container-height-550 rev_slider_wrapper">
                <div id="revolutionSlider" class="slider rev_slider" data-version="5.4.7" data-plugin-revolution-slider data-plugin-options="{'delay': 9000, 'gridwidth': [1140,960,720,540], 'gridheight': [550,550,550,550], 'responsiveLevels': [4096,1200,992,576], 'parallax': { 'type': 'mouse', 'origo': 'slidercenter', 'speed': 2000, 'levels': [2,3,4,5,6,7,12,16,10,50], 'disable_onmobile': 'on' }, 'navigation' : {'arrows': { 'enable': true, 'hide_under': 767, 'style': 'slider-arrows-style-1' }, 'bullets': {'enable': true, 'style': 'bullets-style-1', 'h_align': 'center', 'v_align': 'bottom', 'space': 7, 'v_offset': 25, 'h_offset': 0}}}">
                    <ul>
                        <li class="slide-overlay slide-overlay-level-9" data-transition="fade">
                            <img src="{{asset('frontimages/slide-1-4.jpg')}}"  
                                alt=""
                                data-bgposition="50% 20%" 
                                data-bgfit="cover" 
                                data-bgrepeat="no-repeat" 
                                class="rev-slidebg">
            
                            <div class="tp-caption bg-primary"
                                data-x="['160','72','55','54']"
                                data-y="['166','168','184','196']"
                                data-start="1500"
                                data-width="['20','20','16','13']"
                                data-height="['123','123','92','71']"
                                data-transform_in="x:[-100%];opacity:0;s:500;"
                                data-transform_idle="skX:19deg"
                                data-transform_out="x:[-100%];opacity:0;s:500;"></div>
            
                            <div class="tp-caption text-color-light font-primary font-weight-bold"
                                data-x="['178','90','70','73']"
                                data-y="['170','170','185','195']"
                                data-start="1000"
                                data-fontsize="['32','32','22','22']"
                                data-transform_in="opacity:0;s:300;"
                                data-transform_out="opacity:0;s:300;">WE ARE A PHARMACY IN YOUR</div>
            
                            <div class="tp-caption text-color-light font-weight-bold font-primary"
                                data-x="['190','102','82','82']"
                                data-y="['195','195','195','210']"
                                data-start="1100"
                                data-fontsize="['110','110','70','50']"
                                data-lineheight="['103','103','103','73']"
                                data-transform_in="rY:95deg;opacity:0;s:600;e:Power4.easeIn;"
                                data-transform_out="rY:95deg;opacity:0;s:600;e:Power4.easeIn;">P</div>
            
                            <div class="tp-caption text-color-light font-weight-bold font-primary"
                                data-x="['265','227','165','115']"
                                data-y="['195','195','195','210']"
                                data-start="1200"
                                data-fontsize="['110','110','70','50']"
                                data-lineheight="['103','103','103','73']"
                                data-transform_in="rY:95deg;opacity:0;s:600;e:Power4.easeIn;"
                                data-transform_out="rY:95deg;opacity:0;s:600;e:Power4.easeIn;">O</div>
            
                            <div class="tp-caption text-color-light font-weight-bold font-primary"
                                data-x="['350','300','217','154']"
                                data-y="['195','195','195','210']"
                                data-start="1300"
                                data-fontsize="['110','110','70','50']"
                                data-lineheight="['103','103','103','73']"
                                data-transform_in="rY:95deg;opacity:0;s:600;e:Power4.easeIn;"
                                data-transform_out="rY:95deg;opacity:0;s:600;e:Power4.easeIn;">C</div>
            
                            <div class="tp-caption text-color-light font-weight-bold font-primary"
                                data-x="['430','427','300','186']"
                                data-y="['195','195','195','210']"
                                data-start="1400"
                                data-fontsize="['110','110','70','50']"
                                data-lineheight="['103','103','103','73']"
                                data-transform_in="rY:95deg;opacity:0;s:600;e:Power4.easeIn;"
                                data-transform_out="rY:95deg;opacity:0;s:600;e:Power4.easeIn;">K</div>
            
                            <div class="tp-caption text-color-light font-weight-bold font-primary"
                                data-x="['510','507','355','219']"
                                data-y="['195','195','195','210']"
                                data-start="1500"
                                data-fontsize="['110','110','70','50']"
                                data-lineheight="['103','103','103','73']"
                                data-transform_in="rY:95deg;opacity:0;s:600;e:Power4.easeIn;"
                                data-transform_out="rY:95deg;opacity:0;s:600;e:Power4.easeIn;">E</div>
            
                            <div class="tp-caption text-color-light font-weight-bold font-primary"
                                data-x="['590','588','410','252']"
                                data-y="['195','195','195','210']"
                                data-start="1600"
                                data-fontsize="['110','110','70','50']"
                                data-lineheight="['103','103','103','73']"
                                data-transform_in="rY:95deg;opacity:0;s:600;e:Power4.easeIn;"
                                data-transform_out="rY:95deg;opacity:0;s:600;e:Power4.easeIn;">T</div>
            
                            <div class="tp-caption text-color-light font-weight-bold font-primary"
                                data-x="['670','664','460','288']"
                                data-y="['195','195','195','210']"
                                data-start="1700"
                                data-fontsize="['110','110','70','50']"
                                data-lineheight="['103','103','103','73']"
                                data-transform_in="rY:95deg;opacity:0;s:600;e:Power4.easeIn;"
                                data-transform_out="rY:95deg;opacity:0;s:600;e:Power4.easeIn;">.</div>
            
                            <!-- <div class="tp-caption text-color-light font-weight-bold font-primary"
                                data-x="['842','754','517','412']"
                                data-y="['195','195','195','210']"
                                data-start="1800"
                                data-fontsize="['110','110','70','50']"
                                data-lineheight="['103','103','103','73']"
                                data-transform_in="rY:95deg;opacity:0;s:600;e:Power4.easeIn;"
                                data-transform_out="rY:95deg;opacity:0;s:600;e:Power4.easeIn;">C</div>
            
                            <div class="tp-caption text-color-light font-weight-bold font-primary"
                                data-x="['922','834','567','452']"
                                data-y="['195','195','195','210']"
                                data-start="1900"
                                data-fontsize="['110','110','70','50']"
                                data-lineheight="['103','103','103','73']"
                                data-transform_in="rY:95deg;opacity:0;s:600;e:Power4.easeIn;"
                                data-transform_out="rY:95deg;opacity:0;s:600;e:Power4.easeIn;">Y</div> -->
            
                            <div class="tp-caption text-color-light font-primary font-weight-thin"
                                data-x="['766','678','446','322']"
                                data-y="['305','305','290','286']"
                                data-start="2000"
                                data-fontsize="['40','40','30','30']"
                                data-transform_in="y:[100%];opacity:0;s:500;"
                                data-transform_out="y:[100%];opacity:0;s:500;">LITERALLY...</div>
            
                            <a class="tp-caption btn btn-rounded btn-primary font-weight-semibold"
                                href="https://play.google.com/store/apps/details?id=com.bilal.pocketpharma"
                                data-hash
                                data-hash-offset="65"
                                data-x="center"
                                data-y="center" data-voffset="['150','150','150','100']"
                                data-start="2100"
                                data-whitespace="nowrap"
                                data-fontsize="['13','13','13','13']"
                                data-paddingtop="['13','13','13','13']"
                                data-paddingbottom="['13','13','13','13']"
                                data-paddingleft="['65','65','65','75']"
                                data-paddingright="['65','65','65','75']"	 
                                data-transform_in="y:[100%];s:500;"
                                data-transform_out="y:[100%];s:500;"
                                data-mask_in="x:0px;y:0px;">DOWNLOAD THE APP</a>
                            
                        </li>
                        <li data-transition="fade">
                            <img src="{{asset('frontimages/slide-1-3.jpg')}}" 
                                alt=""
                                data-bgposition="center center" 
                                data-bgfit="cover" 
                                data-bgrepeat="no-repeat"
                                class="rev-slidebg">
            
                            <div class="tp-caption text-color-light font-primary font-weight-light letter-spacing-5 rs-parallaxlevel-3"
                                data-x="center" data-hoffset="['-430','-430','-285','-175']"
                                data-y="center" data-voffset="['-115','-115','-90','-70']"
                                data-start="1900"
                                data-fontsize="['14','14','14','14']"
                                data-transform_in="opacity:0;s:300;"
                                data-transform_out="opacity:0;s:300;">WHAT WE DO?</div>
            
                            <h1 class="tp-caption text-color-light font-primary font-weight-bold letter-spacing-0 rs-parallaxlevel-1"
                                data-x="center"
                                data-y="center" data-voffset="['-70','-70','-50','-40']"
                                data-start="1000"
                                data-fontsize="['65','65','45','30']"
                                data-lineheight="['65','65','50','35']"
                                data-transform_in="y:[100%];s:500;"
                                data-transform_out="y:[100%];s:500;"
                                data-mask_in="x:0px;y:0px;">We make medicines</h1>
            
                            <div class="tp-caption text-color-light font-primary font-weight-bold rs-parallaxlevel-2"
                                data-x="center"
                                data-y="center"
                                data-start="1400"
                                data-fontsize="['65','65','45','30']"
                                data-lineheight="['65','65','50','35']"
                                data-transform_in="y:[100%];s:500;"
                                data-transform_out="y:[100%];s:500;"
                                data-mask_in="x:0px;y:0px;">accessible to you in a jiffy.</div>
            
                            <div class="tp-caption border border-left-0 border-bottom-0 border-right-0 border-light rs-parallaxlevel-1"
                                data-x="center"
                                data-y="center" data-voffset="['70','70','70','55']"
                                data-start="1800"
                                data-width="['850','850','600','400']"
                                data-transform_in="opacity:0;s:300;"
                                data-transform_idle="opacity:0.4;s:300;"
                                data-transform_out="opacity:0;s:300;"></div>
            
                            <div class="tp-caption text-color-light font-primary font-weight-light rs-parallaxlevel-2"
                                data-x="center"
                                data-y="center" data-voffset="['120','120','120','100']"
                                data-start="2100"
                                data-fontsize="['30','30','30','27']"
                                data-lineheight="['35','35','35','32']"
                                data-transform_in="y:[100%];s:500;"
                                data-transform_out="y:[100%];s:500;"
                                data-mask_in="x:0px;y:0px;">Try us today & find out for yourself</div>
            
                        </li>
                    
                    </ul>
                </div>
            </div>




            <section id="services" class="section">
                <div class="container-fluid">
                    <div class="row text-center mb-5">
                        <div class="col">
                            <div class="overflow-hidden">
                                <span class="d-block top-sub-title text-color-primary appear-animation" data-appear-animation="maskUp">About Prompt Pharma</span>
                            </div>
                            <div class="overflow-hidden mb-2">
                                <h2 class="font-weight-bold mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">How It Works?</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">
                        <div class="col-lg-6 col-xl-8 p-0">
                            <div class="content-grid">
                                <div class="row content-grid-row border border-left-0 border-right-0">
                                    <div class="content-grid-item col-md-6 col-lg-12 col-xl-6 p-5">
                                        <div class="icon-box icon-box-style-7">
                                            <div class="icon-box-icon border-0">
                                                <i class="lnr lnr-tablet text-color-primary text-10"></i>
                                            </div>
                                            <div class="icon-box-info">
                                                <div class="icon-box-info-title">
                                                    <h2 class="text-4">1. Sign Up</h2>
                                                </div>
                                                <p class="mb-0">It is easy to Sign Up on PromptPharma. Simply add in your name, address and contact details and you are good to go!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-grid-item col-md-6 col-lg-12 col-xl-6 p-5">
                                        <div class="icon-box icon-box-style-7">
                                            <div class="icon-box-icon border-0">
                                                <i class="lnr lnr-magnifier text-color-primary text-10"></i>
                                            </div>
                                            <div class="icon-box-info">
                                                <div class="icon-box-info-title">
                                                    <h2 class="text-4">2. Select Pharmacy</h2>
                                                </div>
                                                <p class="mb-0">From the list of pharmacies available on the App, you are free to choose where you want to order from.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-grid-item col-md-6 col-lg-12 col-xl-6 p-5">
                                        <div class="icon-box icon-box-style-7">
                                            <div class="icon-box-icon border-0">
                                                <i class="lnr lnr-link text-color-primary text-10"></i>
                                            </div>
                                            <div class="icon-box-info">
                                                <div class="icon-box-info-title">
                                                    <h2 class="text-4">3. Search Medicines</h2>
                                                </div>
                                                <p class="mb-0">Search the medicines that are required or you can even upload your prescription!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-grid-item col-md-6 col-lg-12 col-xl-6 p-5">
                                        <div class="icon-box icon-box-style-7">
                                            <div class="icon-box-icon border-0">
                                                <i class="lnr lnr-screen text-color-primary text-10"></i>
                                            </div>
                                            <div class="icon-box-info">
                                                <div class="icon-box-info-title">
                                                    <h2 class="text-4">4. Choose Quantity & Place Order</h2>
                                                </div>
                                                <p class="mb-0">Choose the quantity of the medicines you wish to order. Simply place your order and relax. We will get to you in no time!
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xl-4 min-height-300" data-plugin-image-background data-plugin-options="{'imageUrl': '{{asset('frontimages/generic-3.jpg')}}'}"></div>
                    </div>
                </div>
            </section>
            <section class="section bg-light section-text-overlay">
                <span class="text-background font-primary font-weight-bold appear-animation" data-appear-animation="textBgFadeInUp" data-appear-animation-delay="500">WHY US?</span>
                <div class="container">
                    <div class="row text-center appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                        <div class="col-md-4 mb-5 mb-md-0">
                            <div class="px-4">
                                <span class="font-weight-bold text-color-primary font-primary text-18">1</span>
                                <h2 class="font-weight-extra-bold position-relative text-4 bg-light m-negative-2 mb-4">CONVENIENCE</h2>
                                <p>You can order medicines by simply installing our mobile App, without the hassle of going out and visiting various pharmacies to find what you need.</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-5 mb-md-0">
                            <div class="px-4">
                                <span class="font-weight-bold text-color-primary font-primary text-18">2</span>
                                <h2 class="font-weight-extra-bold position-relative text-4 bg-light m-negative-2 mb-4">EFFICIENCY</h2>
                                <p>We aim to provide you with a solution that is quicker than other options. PromptPharma delivers your medicines in under 30 minutes, at your doorstep.
                                </p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="px-4">
                                <span class="font-weight-bold text-color-primary font-primary text-18">3</span>
                                <h2 class="font-weight-extra-bold position-relative text-4 bg-light m-negative-2 mb-4">QUALITY</h2>
                                <p>The products delivered to you are authentic and to ensure you receive the correct order, you can upload your prescription on our App as well.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="portfolio" class="section bg-light-5">
                <div class="container">
                    <div class="row text-center mb-4">
                        <div class="col">
                            <!-- <div class="overflow-hidden">
                                <span class="d-block top-sub-title text-color-primary appear-animation" data-appear-animation="maskUp">RECENT PROJECTS</span>
                            </div> -->
                            <div class="overflow-hidden mb-2">
                                <h2 class="font-weight-bold mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">OUR TOP PHARMACIES</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row align-items-center mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="400">
                        <div class="col">
                            <ul id="portfolioLoadMoreFilter" class="nav sort-source justify-content-center mb-4 mb-md-0" data-sort-id="portfolio" data-option-key="filter" data-plugin-options="{'layoutMode': 'fitRows', 'filter': '*'}">

                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($pharmacies as $pharmacy)
                        <div class="col-sm-4">

                            <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                <div class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                    {{-- <a href="shop-product-detail-right-sidebar.html"> --}}
                                        <img src="{{asset(''.$pharmacy->image_path)}}" class="img-fluid" alt="">
                                    {{-- </a> --}}
                                    <div class="image-frame-action">
                                        <a href="{{@$pharmacy->brands->map_link}}" target="_blank" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">Google Map Link</a>
                                    </div>
                                </div>
                            </div>
                            <h3 class="text-color-default text-2 mb-0"><a href="shop-product-detail-right-sidebar.html">{{@$pharmacy->brands->title}}</a></h3>
                            <span class="price font-primary text-4"><strong class="text-color-dark">{{@$pharmacy->brands->address}}</strong></span>
                            {{-- <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$40</strong></span> --}}
                          
                        </div>
                        @endforeach
                            {{-- <div class="sort-destination-loader sort-destination-loader-showing mb-4">
                                <div id="portfolioLoadMoreWrapper" class="portfolio-list portfolio-list-style-2 sort-destination" data-sort-id="portfolio" data-total-pages="3"> --}}



                                    {{-- <div class="col-md-6 col-lg-4 p-0 isotope-item mb-3 design">
                                        <div class="portfolio-item hover-effect-3d text-center appear-animation" data-appear-animation="fadeInUpShorter" data-plugin-options="{'accY' : -50}">
                                            <a href="#">
                                                <span class="image-frame image-frame-style-1">
                                                    <span class="image-frame-wrapper">
                                                        <img src="img/project-2.jpg" class="img-fluid" alt="">
                                                        <span class="image-frame-inner-border"></span>
                                                        <span class="image-frame-action">
                                                            <span class="image-frame-action-icon">
                                                                <i class="lnr lnr-link text-color-light"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                            <h2 class="font-weight-bold text-4 mb-0">Health Mart Pharmacy</h2>
                                            <span class="text-uppercase">Garden Town</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4 p-0 isotope-item mb-3 web">
                                        <div class="portfolio-item hover-effect-3d text-center appear-animation" data-appear-animation="fadeInUpShorter" data-plugin-options="{'accY' : -50}">
                                            <a href="#">
                                                <span class="image-frame image-frame-style-1 ">
                                                    <span class="image-frame-wrapper">
                                                        <img src="img/project-3.jpg" class="img-fluid" alt="">
                                                        <span class="image-frame-inner-border"></span>
                                                        <span class="image-frame-action">
                                                            <span class="image-frame-action-icon">
                                                                <i class="lnr lnr-link text-color-light"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                            <h2 class="font-weight-bold text-4 mb-0">The Chemist Pharmacy</h2>
                                            <span class="text-uppercase">Johar Town</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4 p-0 isotope-item mb-3 web">
                                        <div class="portfolio-item hover-effect-3d text-center appear-animation" data-appear-animation="fadeInUpShorter" data-plugin-options="{'accY' : -50}">
                                            <a href="#">
                                                <span class="image-frame image-frame-style-1">
                                                    <span class="image-frame-wrapper">
                                                        <img src="img/project-4.jpg" class="img-fluid" alt="">
                                                        <span class="image-frame-inner-border"></span>
                                                        <span class="image-frame-action">
                                                            <span class="image-frame-action-icon">
                                                                <i class="lnr lnr-link text-color-light"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                            <h2 class="font-weight-bold text-4 mb-0">UPharmacy</h2>
                                            <span class="text-uppercase">Bedian Road</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4 p-0 isotope-item mb-3 ads">
                                        <div class="portfolio-item hover-effect-3d text-center appear-animation" data-appear-animation="fadeInUpShorter" data-plugin-options="{'accY' : -50}">
                                            <a href="#">
                                                <span class="image-frame image-frame-style-1 ">
                                                    <span class="image-frame-wrapper">
                                                        <img src="img/project-5.jpg" class="img-fluid" alt="">
                                                        <span class="image-frame-inner-border"></span>
                                                        <span class="image-frame-action">
                                                            <span class="image-frame-action-icon">
                                                                <i class="lnr lnr-link text-color-light"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                            <h2 class="font-weight-bold text-4 mb-0">Ibrahim Pharmacy</h2>
                                            <span class="text-uppercase">Mars Tower, Jamal Chowk</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-lg-4 p-0 isotope-item mb-3 design">
                                        <div class="portfolio-item hover-effect-3d text-center appear-animation" data-appear-animation="fadeInUpShorter" data-plugin-options="{'accY' : -50}">
                                            <a href="#">
                                                <span class="image-frame image-frame-style-1 ">
                                                    <span class="image-frame-wrapper">
                                                        <img src="img/project-6.jpg" class="img-fluid" alt="">
                                                        <span class="image-frame-inner-border"></span>
                                                        <span class="image-frame-action">
                                                            <span class="image-frame-action-icon">
                                                                <i class="lnr lnr-link text-color-light"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                            <h2 class="font-weight-bold text-4 mb-0">AK Pharmacy</h2>
                                            <span class="text-uppercase">Ghousia Chowk, UMT</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4 p-0 isotope-item mb-3 design">
                                        <div class="portfolio-item hover-effect-3d text-center appear-animation" data-appear-animation="fadeInUpShorter" data-plugin-options="{'accY' : -50}">
                                            <a href="#">
                                                <span class="image-frame image-frame-style-1 ">
                                                    <span class="image-frame-wrapper">
                                                        <img src="img/project-7.jpg" class="img-fluid" alt="">
                                                        <span class="image-frame-inner-border"></span>
                                                        <span class="image-frame-action">
                                                            <span class="image-frame-action-icon">
                                                                <i class="lnr lnr-link text-color-light"></i>
                                                            </span>
                                                        </span>
                                                    </span>
                                                </span>
                                            </a>
                                            <h2 class="font-weight-bold text-4 mb-0">Health Plus Pharmacy</h2>
                                            <span class="text-uppercase">Sector D1</span>
                                        </div>
                                    </div> --}}
                                
                            
                                {{-- </div> --}}
                        {{-- </div> --}}
                        </div>

                    </div>
                    <hr>
                    <!-- <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <div id="portfolioLoadMoreLoader" class="portfolio-load-more-loader">
                                <div class="bounce-loader">
                                    <div class="bounce1"></div>
                                    <div class="bounce2"></div>
                                    <div class="bounce3"></div>
                                </div>
                            </div>

                            <button id="portfolioLoadMore" type="button" class="btn btn-primary btn-rounded btn-wide-5 btn-icon-effect-2 outline-none font-weight-semibold mt-5 text-0">
                                <span>LOAD MORE</span>
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                    </div> -->
                </div>
            </section>
            <section id="team" class="section">
                <div class="container">
                    <div class="row text-center pb-2 mb-4">
                        <div class="col">
                            <div class="overflow-hidden">
                                <span class="top-sub-title text-color-primary appear-animation" data-appear-animation="maskUp">WHY USE PROMPT PHARMA?</span>
                            </div>
                            <div class="overflow-hidden mb-2">
                                <h2 class="font-weight-bold mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">READY.SET.GO</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-3 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="600">
                            <div class="text-center mb-4">
                                <div class="image-frame image-frame-style-1 image-frame-effect-1 mb-4">
                                    <span class="image-frame-wrapper">
                                        <img src="{{asset('frontimages/author-1.jpg')}}" class="img-fluid" alt="">
                                        <span class="image-frame-inner-border"></span>
                                        <!-- <span class="image-frame-action image-frame-action-effect-1 image-frame-action-sm">
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-facebook-f text-color-light"></i>
                                                </span>
                                            </a>
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-twitter text-color-light"></i>
                                                </span>
                                            </a>
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-instagram text-color-light"></i>
                                                </span>
                                            </a>
                                        </span> -->
                                    </span>
                                </div>
                                <h3 class="font-weight-bold text-4 mb-0">SAVE TIME</h3>
                                <!-- <span class="text-1">CEO AND FOUNDER</span>	 -->
                                <p class="mt-3 mb-0">With Prompt Pharma, you don't need to visit the pharmacy ever again. We bring the pharmacy to you. </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="700">
                            <div class="text-center mb-4">
                                <div class="image-frame image-frame-style-1 image-frame-effect-1 mb-4">
                                    <span class="image-frame-wrapper">
                                        <img src="{{asset('frontimages/author-2.jpg')}}" class="img-fluid" alt="">
                                        <span class="image-frame-inner-border"></span>
                                        <!-- <span class="image-frame-action image-frame-action-effect-1 image-frame-action-sm">
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-facebook-f text-color-light"></i>
                                                </span>
                                            </a>
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-twitter text-color-light"></i>
                                                </span>
                                            </a>
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-instagram text-color-light"></i>
                                                </span>
                                            </a>
                                        </span> -->
                                    </span>
                                </div>
                                <h3 class="font-weight-bold text-4 mb-0">QUALITY GUARANTEED</h3>
                                <!-- <span class="text-1 mt-3">MARKETING</span>	 -->
                                <p class="mt-3 mb-0">We do not compromise on the quality of medicines. You have the ability to order from your trusted pharmacies. </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="800">
                            <div class="text-center mb-4">
                                <div class="image-frame image-frame-style-1 image-frame-effect-1 mb-4">
                                    <span class="image-frame-wrapper">
                                        <img src="{{asset('frontimages/author-3.jpg')}}" class="img-fluid" alt="">
                                        <span class="image-frame-inner-border"></span>
                                        <!-- <span class="image-frame-action image-frame-action-effect-1 image-frame-action-sm">
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-facebook-f text-color-light"></i>
                                                </span>
                                            </a>
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-twitter text-color-light"></i>
                                                </span>
                                            </a>
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-instagram text-color-light"></i>
                                                </span>
                                            </a>
                                        </span> -->
                                    </span>
                                </div>
                                <h3 class="font-weight-bold text-4 mb-0">DOORSTEP DELIVERY</h3>
                                <!-- <span class="text-1 mt-3">DEVELOPER</span> -->
                                <p class="mt-3 mb-0">PromptPharma brings medicines to your doorstep. Delivered in a jiffy.  </p>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="900">
                            <div class="text-center mb-4">
                                <div class="image-frame image-frame-style-1 image-frame-effect-1 mb-4">
                                    <span class="image-frame-wrapper">
                                        <img src="{{asset('frontimages/author-4.jpg')}}" class="img-fluid" alt="">
                                        <span class="image-frame-inner-border"></span>
                                        <!-- <span class="image-frame-action image-frame-action-effect-1 image-frame-action-sm">
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-facebook-f text-color-light"></i>
                                                </span>
                                            </a>
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-twitter text-color-light"></i>
                                                </span>
                                            </a>
                                            <a href="#">
                                                <span class="image-frame-action-icon">
                                                    <i class="fab fa-instagram text-color-light"></i>
                                                </span>
                                            </a>
                                        </span> -->
                                    </span>
                                </div>
                                <h3 class="font-weight-bold text-4 mb-0">NO AVAILABILITY ISSUES</h3>
                                <!-- <span class="text-1 mt-3">DESIGN</span> -->
                                <p class="mt-3 mb-0">With the option to order from numerous pharmacies in your area, you won't have an availability issue at your pharmacy. </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="section bg-dark-5">
                <div class="container">
                    <div class="row appear-animation" data-appear-animation="fadeInRightShorter">
                        <div class="col">

                            <div class="owl-carousel owl-theme dots-style-1 nav-style-3 mb-0" data-plugin-options="{'items': 1, 'dots': true, 'nav': true, 'navtext': []}">
                                <div>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-md-9 text-center">
                                            <div class="testimonial testimonial-style-1">
                                                <blockquote>
                                                    <p class="text-light">" Had a great experience ordering from PromptPharma. All my medicines were delivered in the allocated time. I will definitely order again from Prompt Pharma. Highly recommended.
                                                        "</p>
                                                </blockquote>
                                                <div class="testimonial-author mb-4">
                                                    <span>
                                                        <strong class="text-light">Syed Hussain Ali</strong>
                                                        <span class="text-light">DHA, Phase V</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-md-9 text-center">
                                            <div class="testimonial testimonial-style-1">
                                                <blockquote>
                                                    <p class="text-light">" PromptPharma made my life a lot easier. I didn't have to go and search different pharmacies for the medicines i needed, instead i got them all at my house without going through the trouble of calling or visiting pharmacies to check for availability.
                                                        "</p>
                                                </blockquote>
                                                <div class="testimonial-author mb-4">
                                                    <span>
                                                        <strong class="text-light">Mahnoor Naveed</strong>
                                                        <span class="text-light">DHA, Phase VIII</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row align-items-center justify-content-center">
                                        <div class="col-md-9 text-center">
                                            <div class="testimonial testimonial-style-1">
                                                <blockquote>
                                                    <p class="text-light">" Absolutely in love with their great service.I got the right quantity of medicines that I requested and was notified beforehand when one of the medicines I ordered wasn't available. The prescription feature is also very user-friendly. "</p>
                                                </blockquote>
                                                <div class="testimonial-author mb-4">
                                                    <span>
                                                        <strong class="text-light">Ahmad Bhatti</strong>
                                                        <span class="text-light">DHA, Phase I</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>







            <section class="section section-background call-to-action overlay overlay-color-dark overlay-show overlay-op-9 call-to-action-text-light mt-5 p-0" data-plugin-image-background data-plugin-options="{'imageUrl': 'img/parallax/parallax-1.jpg', 'bgPosition': '0 50%'}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="overflow-hidden mt-negative-3 mx-auto mb-4 mb-lg-0">
                                <img src="{{asset('frontimages/smartphones-1.png')}}" alt="" class="img-fluid appear-animation" data-appear-animation="slideInUp" data-appear-animation-delay="100">
                            </div>
                        </div>
                        <div class="col-lg-6 text-lg-left justify-content-center justify-content-lg-start">
                            <div class="call-to-action-content appear-animation pt-5 pb-0 pb-lg-5" data-appear-animation="fadeInLeftShorter">
                                <h3 class="font-weight-semibold">PROMPT PHARMA </h3>
                                <p class="font-weight-light mb-0">A Pharmacy in your Pocket. Available on iOS & Android.</p>
                            </div>
                        </div>
                        <div class="col-lg-3 text-lg-left justify-content-center justify-content-lg-end pt-5 pb-5">
                            <div class="call-to-action-btn appear-animation" data-appear-animation="fadeInRightShorter">
                                <a href="https://play.google.com/store/apps/details?id=com.bilal.pocketpharma" target="_blank" class="btn btn-light btn-rounded btn-3 btn-icon-effect-1 font-weight-semibold btn-h-5 btn-v-4">
                                    <span class="wrap">
                                        <span>DOWNLOAD</span>
                                        <strong class="font-weight-semibold">NOW</strong>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>









        
            
         </div>
            
    
         <footer id="footer" class="bg-light mb-5 mt-0">
            <div class="container">
                <div class="container">
                    <hr>
                </div>
            

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
                <p class="text-md-center pb-0 mb-0">Copyrights © 2020. All Rights Reserved by PROMPT Pharma</p>
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
    </script>

</body>
@endsection