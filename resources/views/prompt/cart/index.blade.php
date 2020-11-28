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
            <section class="page-header">
                
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="font-weight-bold">Cart</h1>

                        </div>
                    </div>
                </div>
            </section>

            <section class="section pt-0">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col">

                                @if(isset($cart) && $cart->getContents())

                                <div class="table-responsive">
                                    <table class="shop-cart-table w-100">
                                        <thead>
                                            <tr>
                                                <th class="product-remove"></th>
                                                <th class="product-thumbnail"></th>
                                                <th class="product-name"><strong>Product</strong></th>
                                                <th class="product-price"><strong>Unit Price</strong></th>
                                                <th class="product-quantity"><strong>Quantity</strong></th>
                                                <th class="product-subtotal"><strong>Total</strong></th>
                                            </tr>
                                        </thead>
                                        <tbody>

			                    @foreach($cart->getContents() as $slug => $product)

                                            <tr class="cart-item">
                                                <td class="product-remove">
                                                    
                                                    <form action="{{route('cart.remove', $product['name'])}}" method="POST" accept-charset="utf-8">
                                                        @csrf
                                                    
                                                    <input type="submit" name="remove" value="x Remove" class="btn btn-outline-danger"/>
                                                    </form>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <img src="{{asset('frontimages/noimg.jpg')}}" class="img-fluid" width="67" alt=""/>
                                                </td>
                                                <td class="product-name">
                                                    <a href="shop-product-detail-right-sidebar.html">{{$product['name']}}</a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="unit-price">{{@$product['price']}}</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <form action="{{route('cart.update', [$product['name'], $product['price']])}}" method="POST">
                                                            @csrf
                                                       
                                                            <input type="button" value="-" class="minus">
                                                
															<input type="number" min="0" max="99" name="qty" value="{{$product['quantity']}}" title="Qty" class="qty" size="2" id="qty">
															<input type="button" value="+" class="plus">
                                                            <input type="submit" name="update" value="Update" class="btn btn-block btn-outline-success btn-round">
                                                            {{-- <input type="button" value="-" min="1" class="minus">s
                                                        <input type="number" step="1" min="1" max="99" id="qty" name="qty" value="{{$product['quantity']}}" class="input-sm">
                                                        <input type="button" value="+" class="plus"> --}}

                                                      
                                                    </form>
                                                    </div>
                                                </td>

 
                                                <td class="product-subtotal">
                                                    <span class="sub-total"><strong>PKR {{@$product['price']* $product['quantity']}}</strong></span>
                                                </td>

                                            </tr>
                                            @endforeach
                                            {{-- <tr class="cart-item">
                                                <td class="product-remove">
                                                    <a href="#"><i class="fas fa-times" aria-label="Remove"></i></a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <img src="img/products/product-2.jpg" class="img-fluid" width="67" alt="" />
                                                </td>
                                                <td class="product-name">
                                                    <a href="shop-product-detail-right-sidebar.html">Leather Belt</a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="unit-price">$19</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" size="2">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="sub-total"><strong>$19</strong></span>
                                                </td>
                                            </tr> --}}

                                            {{-- <tr class="cart-item">
                                                <td class="product-remove">
                                                    <a href="#"><i class="fas fa-times" aria-label="Remove"></i></a>
                                                </td>
                                                <td class="product-thumbnail">
                                                    <img src="img/products/product-3.jpg" class="img-fluid" width="67" alt="" />
                                                </td>
                                                <td class="product-name">
                                                    <a href="shop-product-detail-right-sidebar.html">Jack Sandals</a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="unit-price">$30</span>
                                                </td>
                                                <td class="product-quantity">
                                                    <div class="quantity">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" size="2">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </td>
                                                <td class="product-subtotal">
                                                    <span class="sub-total"><strong>$30</strong></span>
                                                </td>
                                            </tr> --}}
                                            {{-- <tr class="border-bottom-0">
                                                <td colspan="6" class="px-0">
                                                    <div class="row mx-0">
                                                        <div class="col-md-5 px-0 mb-3 mb-md-0">
                                                            
                                                            <button class="btn btn-dark btn-outline btn-rounded font-weight-semibold btn-h-2 btn-v-3" type="submit">UPDATE CART</button>
                                                        </div>
                                                        <div class="col-md-7 text-right px-0">
                                                            <a href="products.html" class="btn btn-dark btn-outline font-weight-semibold btn-h-1 btn-v-3">Continue Shopping</a>
                                                            <a href="checkout.html" class="btn btn-primary btn-rounded font-weight-semibold btn-h-2 btn-v-3">CHECKOUT</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr> --}}


                                        </tbody>
                                    </table>
                                </div>

                                @else 
                                <p class="alert alert-danger">No Products in the Cart <a href="{{route('home')}}">Buy Some Products</a></p> 
                                @endif




                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-5 mb-md-0">
                            
                        
                        </div>
                        <div class="col-md-6">
                            <h2 class="font-weight-bold text-4 mb-3">Cart Totals</h2>
                            <div class="table-responsive">
                                <table class="cart-totals w-100">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="cart-total-label">Cart Subtotal</span>
                                            </td>
                                            <td>
                                                @if (isset($cart))
                                                <span class="cart-total-value">{{'PKR '.$cart->getTotalPrice()}}</span>                                                    
                                                @else 
                                                <span class="cart-total-value">PKR 0</span>
                                                @endif
                                                


                                            </td>
                                        </tr>
                                        
                                        <tr class="border-bottom-0">
                                            <td>
                                                <span class="cart-total-label">Total</span>
                                            </td>
                                            <td>    

                                                @if (isset($cart))
                                                <span class="cart-total-value text-color-primary text-4">{{'PKR '.$cart->getTotalPrice()}}</span>
                                                @else 
                                                <span class="cart-total-value text-color-primary text-4">PKR 0</span>    
                                                @endif
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
        function myFunction() {
  //          alert('Hello');
          
            if(document.getElementById('qty').value == 0) {
                document.getElementById('qty').value = 1;
            }
            
         
    </script>
</body>
    
@endsection