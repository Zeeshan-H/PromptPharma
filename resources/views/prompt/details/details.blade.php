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
                                                <a class="dropdown-item dropdown-toggle active" href="{{route('allproducts')}}">
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
            <div class="container">

                <div class="row">
                    <div class="col">
                        <ul class="breadcrumb mt-3">
                        <li><a href="{{route('home')}}">Home</a></li>
                            <li class="active">Details</li>
                        </ul>
                    </div>
                </div>
                @foreach ($products as $product)
                <div class="row mb-5">

                    <div class="col-md-5 mb-5 mb-md-0">
                        <div class="mb-3" id="thumbGalleryDetail">
                            <div>
                            <img src="{{asset('frontimages/noimg.jpg')}}" class="img-fluid" alt="">
                            </div>
                            {{-- <div>
                                <img src="img/products/product-1-2.jpg" class="img-fluid" alt="">
                            </div>
                            <div>
                                <img src="img/products/product-1-3.jpg" class="img-fluid" alt="">
                            </div>
                            <div>
                                <img src="img/products/product-1-4.jpg" class="img-fluid" alt="">
                            </div> --}}
                        </div>
                        {{-- <div class="owl-carousel owl-theme manual thumb-gallery-thumbs mt" id="thumbGalleryThumbs">
                            <div>
                                <span class="d-block">
                                    <img alt="Product Image" src="img/products/product-1.jpg" class="img-fluid">
                                </span>
                            </div>
                            <div>
                                <span class="d-block">
                                    <img alt="Product Image" src="img/products/product-1-2.jpg" class="img-fluid">
                                </span>
                            </div>
                            <div>
                                <span class="d-block">
                                    <img alt="Product Image" src="img/products/product-1-3.jpg" class="img-fluid">
                                </span>
                            </div>
                            <div>
                                <span class="d-block">
                                    <img alt="Product Image" src="img/products/product-1-4.jpg" class="img-fluid">
                                </span>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-md-7">
                        <h2 class="line-height-1 font-weight-bold mb-2">{{@$product['name']}}</h2>
                        {{-- <div class="product-info-rate d-flex mb-3">
                            <i class="fas fa-star text-color-default mr-1"></i>
                            <i class="fas fa-star text-color-default mr-1"></i>
                            <i class="fas fa-star text-color-default mr-1"></i>
                            <i class="fas fa-star text-color-default mr-1"></i>
                            <i class="fas fa-star text-color-default"></i>									
                        </div> --}}
                    <span class="price font-primary text-4"><strong class="text-color-dark">{{@$product['company']}}</strong></span>
                        {{-- <span class="old-price font-primary text-line-trough text-2"><strong class="text-color-default">$20</strong></span> --}}
                        {{-- <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc. Vivamus bibendum magna ex.</p> --}}
                        <hr class="my-4">
                        <ul class="list list-unstyled">
                            <li>AVAILABILITY: <strong>AVAILABLE</strong></li>
                            @foreach ($product['pharmacyList'] as $item)
                                 
                            @if ($item['price'] == null)
                            <li>{{@$item['name'].': '}}<strong>'N/A' <br></strong></li>
                            @else 

                            <li>{{@$item['name'].': '}}<strong>{{@$item['price'].'PKR'}} <br></strong></li>
                            <a href="{{route('cart', [$product['name'], $item['name'], @$item['price'], $item['quantity']])}}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a><br>
                                                                                         
                            @endif
                                
                            @endforeach
                  
                        </ul>
                        <hr class="my-4">
                        {{-- <form class="shop-cart d-flex align-items-center" method="post" enctype="multipart/form-data">
                            <div class="quantity">
                                <input type="button" value="-" class="minus">
                                <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="qty" size="2">
                                <input type="button" value="+" class="plus">
                            </div> --}}
                            <a href="{{route('cart.all')}}"><button class="add-to-cart btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-h-2 btn-fs-2 ml-3">VIEW CART</button></a>
                        {{-- </form> --}}
                        <hr class="my-4">
                        {{-- <div class="d-flex align-items-center">
                            <span class="text-2">SHARE</span>
                            <ul class="social-icons social-icons-dark social-icons-1 ml-3">
                                <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                                <li class="social-icons-instagram"><a href="http://www.instagram.com/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                @endforeach
                {{-- <div class="row mb-5">
                    <div class="col">
                        <ul class="nav nav-tabs nav-tabs-default" id="productDetailTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold active" id="productDetailDescTab" data-toggle="tab" href="#productDetailDesc" role="tab" aria-controls="productDetailDesc" aria-expanded="true">DESCRIPTION</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" id="productDetailMoreInfoTab" data-toggle="tab" href="#productDetailMoreInfo" role="tab" aria-controls="productDetailMoreInfo">MORE INFO</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link font-weight-bold" id="productDetailReviewsTab" data-toggle="tab" href="#productDetailReviews" role="tab" aria-controls="productDetailReviews">REVIEWS (3)</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="contentTabProductDetail">
                            <div class="tab-pane fade pt-4 pb-4 show active" id="productDetailDesc" role="tabpanel" aria-labelledby="productDetailDescTab">
                                <p class="text-color-light-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <ul class="list list-unstyled text-color-light-3 pl-5">
                                    <li class="mb-2"><i class="fas fa-check-circle text-color-dark mr-2"></i> Lorem ipsum dolor sit amet</li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-color-dark mr-2"></i> Nulla volutpat aliquam velit </li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-color-dark mr-2"></i> Consectetur adipiscing elit</li>
                                </ul>
                                <p class="text-color-light-3 mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                            </div>
                            <div class="tab-pane fade pt-4 pb-4" id="productDetailMoreInfo" role="tabpanel" aria-labelledby="productDetailMoreInfoTab">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th class="border-top-0" scope="row">SIZE</th>
                                            <td class="border-top-0">31, 32, 33, 34, 35</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">COLOR</th>
                                            <td>blue, red, rosa, white</td>
                                        </tr>													
                                        <tr>
                                            <th scope="row">STYLE</th>
                                            <td>classic, modern</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade pt-4 pb-4" id="productDetailReviews" role="tabpanel" aria-labelledby="productDetailReviewsTab">
                                <ul class="comments">
                                    <li>
                                        <div class="comment">
                                            <div class="d-none d-sm-block">
                                                <img class="avatar rounded-circle" alt="" src="img/authors/author-2.jpg">
                                            </div>
                                            <div class="comment-block">
                                                <span class="comment-by">
                                                    <span class="comment-rating">
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star text-color-dark"></i>	
                                                    </span>
                                                    <strong class="comment-author text-color-dark">Robert Doe</strong>
                                                    <span class="comment-date border-right-0 text-color-light-3">MARCH 5, 2018 at 2:28 pm</span>
                                                </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment">
                                            <div class="d-none d-sm-block">
                                                <img class="avatar rounded-circle" alt="" src="img/authors/author-1.jpg">
                                            </div>
                                            <div class="comment-block">
                                                <span class="comment-by">
                                                    <span class="comment-rating">
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star-half text-color-dark"></i>	
                                                    </span>
                                                    <strong class="comment-author text-color-dark">John Doe</strong>
                                                    <span class="comment-date border-right-0 text-color-light-3">MARCH 5, 2018 at 2:28 pm</span>
                                                </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment">
                                            <div class="d-none d-sm-block">
                                                <img class="avatar rounded-circle" alt="" src="img/authors/author-3.jpg">
                                            </div>
                                            <div class="comment-block">
                                                <span class="comment-by">
                                                    <span class="comment-rating">
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                        <i class="fas fa-star text-color-dark mr-1"></i>
                                                    </span>
                                                    <strong class="comment-author text-color-dark">Jessica Doe</strong>
                                                    <span class="comment-date border-right-0 text-color-light-3">MARCH 5, 2018 at 2:28 pm</span>
                                                </span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae. </p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                                <div class="row mt-4 pt-2">
                                    <div class="col">
                                        <h2 class="font-weight-bold text-3 mb-3">LEAVE A REVIEW</h2>
                                        <form class="form-style-2" action="#" method="post">
                                            <div class="form-row">
                                                <div class="form-group">
                                                    <div class="rating p-1">
                                                        <label>
                                                            <input type="radio" name="rating" value="5" title="5 stars"> 5
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="4" title="4 stars"> 4
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="3" title="3 stars"> 3
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="2" title="2 stars"> 2
                                                        </label>
                                                        <label>
                                                            <input type="radio" name="rating" value="1" title="1 star"> 1
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col">
                                                    <textarea class="form-control bg-light-5 border-0 rounded-0" placeholder="Review" rows="6" name="review" required></textarea>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <input type="text" value="" class="form-control border-0 rounded-0" name="name" placeholder="Name" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <input type="email" value="" class="form-control border-0 rounded-0" name="email" placeholder="E-mail" required>
                                                </div>
                                            </div>
                                            <div class="form-row mt-2">
                                                <div class="col">
                                                    <input type="submit" value="POST REVIEW" class="btn btn-primary btn-rounded btn-h-2 btn-v-2 font-weight-bold">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

            </div>
            {{-- <section class="section bg-light-2 mt-5">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h2 class="font-weight-bold text-4 mb-4">Related Products</h2>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-sm-6 col-md-3 mb-4">
                            <div class="product portfolio-item portfolio-item-style-2">
                                <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                    <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                        <a href="shop-product-detail-right-sidebar.html">
                                            <img src="img/products/product-1.jpg" class="img-fluid" alt="">
                                        </a>
                                        <span class="image-frame-action">
                                            <a href="#" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                        </span>
                                    </span>
                                </div>
                                <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                                    <div class="product-info-title">
                                        <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">Long Hoddie</a></h3>
                                        <span class="price font-primary text-4"><strong class="text-color-dark">$59</strong></span>
                                        <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$69</strong></span>
                                    </div>
                                    <div class="product-info-rate d-flex">
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default"></i>									
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 mb-4">
                            <div class="product portfolio-item portfolio-item-style-2">
                                <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                    <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                        <a href="shop-product-detail-right-sidebar.html">
                                            <img src="img/products/product-2.jpg" class="img-fluid" alt="">
                                        </a>
                                        <span class="image-frame-action">
                                            <a href="#" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                        </span>
                                    </span>
                                </div>
                                <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                                    <div class="product-info-title">
                                        <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">Leather Belt</a></h3>
                                        <span class="price font-primary text-4"><strong class="text-color-dark">$19</strong></span>
                                        <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$29</strong></span>
                                    </div>
                                    <div class="product-info-rate d-flex">
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default"></i>									
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 mb-4">
                            <div class="product portfolio-item portfolio-item-style-2">
                                <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                    <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                        <a href="shop-product-detail-right-sidebar.html">
                                            <img src="img/products/product-3.jpg" class="img-fluid" alt="">
                                        </a>
                                        <span class="image-frame-action">
                                            <a href="#" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                        </span>
                                    </span>
                                </div>
                                <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                                    <div class="product-info-title">
                                        <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">Jack Sandals</a></h3>
                                        <span class="price font-primary text-4"><strong class="text-color-dark">$30</strong></span>
                                        <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$40</strong></span>
                                    </div>
                                    <div class="product-info-rate d-flex">
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default"></i>									
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-3 mb-4">
                            <div class="product portfolio-item portfolio-item-style-2">
                                <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                    <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                        <a href="shop-product-detail-right-sidebar.html">
                                            <img src="img/products/product-4.jpg" class="img-fluid" alt="">
                                        </a>
                                        <span class="image-frame-action">
                                            <a href="#" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                        </span>
                                    </span>
                                </div>
                                <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                                    <div class="product-info-title">
                                        <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">Vintage Hat</a></h3>
                                        <span class="price font-primary text-4"><strong class="text-color-dark">$79</strong></span>
                                        <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$99</strong></span>
                                    </div>
                                    <div class="product-info-rate d-flex">
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default mr-1"></i>
                                        <i class="fas fa-star text-color-default"></i>									
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> --}}
            {{-- <section class="section bg-dark-4 py-5 mt-0">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-2">
                            <h2 class="text-color-light text-4">NEWSLETTER</h2>
                        </div>
                        <div class="col-md-4">
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidun.</p>
                        </div>
                        <div class="col-md-6">
                            
                            <form class="newsletter-form" action="https://preview.oklerthemes.com/ezy/1.1.0/php/newsletter-subscribe.php" method="POST">
                                <div class="newsletter-form-success alert alert-success d-none">
                                    <strong>Success!</strong> You've been added to our email list.
                                </div>
                                <div class="newsletter-form-error alert alert-danger d-none">
                                    <strong>Error!</strong> There was an error to add your email.
                                </div>
                                
                                <div class="input-group bg-light rounded">
                                      <input type="email" class="newsletter-email form-control border-0 rounded" placeholder="Enter Email address" aria-label="Enter Email address" required>
                                      <span class="input-group-btn p-1">
                                        <button class="btn btn-primary font-weight-semibold btn-h-2 rounded h-100" type="submit">SUBSCRIBE</button>
                                      </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section> --}}
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
   
   
    <!-- Examples -->
    <script src="{{asset('frontjs/examples.gallery.js')}}"></script>	

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