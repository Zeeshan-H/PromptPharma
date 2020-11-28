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
                                                <a class="dropdown-item dropdown-toggle active" href="{{route('contact')}}">
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
            <section class="page-header mb-0">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="font-weight-bold">Contact Us</h1>

                        </div>
                    </div>
                </div>
            </section>

            <section class="section">
                <div class="container">
                    <div class="row text-center">
                        <div class="col">
                            <span class="top-sub-title text-color-primary appear-animation" data-appear-animation="fadeInUpShorter">PROMPT PHARMA</span>
                            <h2 class="font-weight-bold appear-animation" data-appear-animation="fadeInUpShorter">Get in Touch With Us</h2>
                            <p class="lead appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="200">If you have any further questions or queries please do not hesitate to get in touch.</p>
                        </div>
                    </div>
                    <div class="row pt-5">
                        <div class="col-lg-4">
                            <div class="row">
                                <div class="col-12 col-md-4 col-lg-12 mb-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter">
                                    <div class="icon-box icon-box-style-1">
                                        <div class="icon-box-icon">
                                            <i class="lnr lnr-apartment text-color-primary"></i>
                                        </div>
                                        <div class="icon-box-info mt-1">
                                            <div class="icon-box-info-title">
                                                <h3 class="font-weight-bold text-4 mb-0">Address</h3>
                                            </div>
                                            <p>Lahore, Pakistan
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-12 mb-lg-4 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="200">
                                    <div class="icon-box icon-box-style-1">
                                        <div class="icon-box-icon icon-box-icon-no-top">
                                            <i class="lnr lnr-envelope text-color-primary"></i>
                                        </div>
                                        <div class="icon-box-info mt-1">
                                            <div class="icon-box-info-title">
                                                <h3 class="font-weight-bold text-4 mb-0">Email Address</h3>
                                            </div>
                                            <p><a href="mailto:thepocketpharma1@gmail.com">thepocketpharma1@gmail.com</a></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-lg-12 appear-animation" data-appear-animation="fadeInLeftShorter" data-appear-animation-delay="400">
                                    <div class="icon-box icon-box-style-1">
                                        <div class="icon-box-icon">
                                            <i class="lnr lnr-phone-handset text-color-primary"></i>
                                        </div>
                                        <div class="icon-box-info mt-1">
                                            <div class="icon-box-info-title">
                                                <h3 class="font-weight-bold text-4 mb-0">Phone Number</h3>
                                            </div>
                                            <p><a href="tel:+923055566669">+92 305 5566669</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 appear-animation" data-appear-animation="fadeInRightShorter">
                            <form class="contact-form form-style-2" action="{{route('sendemail')}}" method="POST">
                                @csrf
                                @if (Session::has('success'))
                                <div class="alert alert-success">
          
                                    <strong>Success:</strong> {{Session::get('success')}}
                                    </div>                               
                                @endif

                                @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    <strong>Error:</strong> {{Session::get('error')}}
                                </div>                                    
                                @endif
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="fullname" id="name" placeholder="Full Name" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" placeholder="Email Address" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col">
                                        <textarea maxlength="5000" data-msg-required="Please enter your message." rows="5" class="form-control" name="message" id="message" placeholder="Message" required></textarea>
                                    </div>
                                </div>
                                <div class="form-row mt-2">
                                    <div class="col">
                                        <input type="submit" value="SEND MESSAGE" class="btn btn-primary btn-rounded btn-4 font-weight-semibold text-0" data-loading-text="Loading...">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <div class="container">
                <hr>
            </div>
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
    </script>

</body>

@endsection