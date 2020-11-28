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
        


            <section class="page-header mb-0">
                <div class="container">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="font-weight-bold">Our Products</h1>

                        </div>
                    </div>
                    <div class="search">
                        <form method="GET">
                         
                            <div class="input-group input-group-lg border">
                            
                                <input type="text" class="form-control" name="search" placeholder="Search for your Medicines..." aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                <span class="input-group-btn">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search fa-2x"></i>
    
                                    </button>
                                  </span>
                                </div>
                            {{-- <div class="input-group bg-light border">
                                  <input type="text" class="form-control text-4" name="search" placeholder="Search for your Medicines..." aria-label="Search for your Medicines">
                                  <span class="input-group-btn">
                                    <button class="btn" type="submit">
                                        <i class="fas fa-search fa-5x"></i>
    
                                    </button>
                                  </span>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </section>



            
<br>


            <div class="container">
                <div class="row">
                    <aside class="sidebar col-md-4 col-lg-3 order-2 order-md-1">
                        <div class="accordion accordion-default accordion-toggle accordion-style-1" role="tablist">
                    
                            <div class="card">
                                <div class="card-header accordion-header" role="tab" id="categories">
                                    <h5 class="mb-0">
                                        <a href="#" data-toggle="collapse" data-target="#toggleCategories" aria-expanded="false" aria-controls="toggleCategories">CATEGORIES</a>
                                    </h5>
                                </div>
                                <div id="toggleCategories" class="accordion-body collapse show" role="tabpanel" aria-labelledby="categories">
                                    <div class="card-body">
                                    @php
                                        foreach($categories as $cat) {

                                            $cats[] = $cat['type'];
                                        }
                                        $cats = array_unique($cats);
                                       
                                        
                                  @endphp
                                        @foreach ($cats as $category)
                                            <ul class="list list-unstyled mb-0">
                                 
                                            @if (isset($category))
                                
                                            {{-- <li><a href="{{url('products/'.$category->category_id)}}">{{$category->name}}</a></li> --}}
                                            <li><a href="{{route('prodcat', [$category, $search])}}">{{$category}}</a></li>
                                            @else 
                                            <li><a href="#">No Category Added</a></li>                                                
                                            @endif

                                            {{-- <li><a href="#">HEALTHCARE</a></li>
                                            <li><a href="#">SUPPLEMENTS</a></li> --}}
                                        
                                        </ul>                                            
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            
                            <div class="card">
                                <div class="card-header accordion-header" role="tab" id="price">
                                    <h5 class="mb-0">
                                        <a href="#" data-toggle="collapse" data-target="#togglePrice" aria-expanded="false" aria-controls="togglePrice">PRICE</a>
                                    </h5>
                                </div>
                                
                                <div id="togglePrice" class="accordion-body collapse show" role="tabpanel" aria-labelledby="price">
                                    <div class="card-body">
                                        <div class="slider-range-wrapper">
                                            <div class="slider-range mb-3" data-plugin-slider-range></div>
                                            @php
                                                foreach($products as $prod) {

                                                    $prod = $prod;
                                           
                                                }

                                            @endphp


                                            <form class="d-flex align-items-center justify-content-between" action="{{route('allproducts')}}"
                                            method="get">
                                                <span>
                                                    Price PKR <span class="price-range-low">0.0</span> - <span class="price-range-high">300.0</span>
                                                </span>

                                                <input type="hidden" class="hidden-price-range-low" name="priceLow" value=""/>
                                                <input type="hidden" class="hidden-price-range-high" name="priceHigh" value=""/>
                                                <input type="hidden" class="form-control" name="search" placeholder="Search for your Medicines..." aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                                <button type="submit" class="btn btn-primary btn-h-1 font-weight-bold rounded-0">FILTER</button>
                                            
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="card">
                                <div class="card-header accordion-header" role="tab" id="brands">
                                    <h5 class="mb-0">
                                        <a href="#" data-toggle="collapse" data-target="#toggleBrands" aria-expanded="false" aria-controls="toggleBrands">BRANDS</a>
                                    </h5>
                                </div>
                                <div id="toggleBrands" class="accordion-body collapse show" role="tabpanel" aria-labelledby="brands">
                                    <div class="card-body">
                                        @php
                                            // foreach ($pharmacies as $pharma) {
                                            //     $pharmas = $pharma;
                                            // }
                                            $pharmas = array_unique($pharmacies);
                                        @endphp
                                        @foreach ($pharmas as $pharmacy)
                                            

                                        <ul class="list list-unstyled mb-0">
                                 
                                            @if (isset($pharmacy))
                                            {{-- <li><a href="{{url('productbrands/'.$pharmacy->id)}}">{{$pharmacy->title}}  --}}
                                                <li><a href="#">{{$pharmacy}} 
                                                {{-- <span class="float-right">{{count($products)}}</span></a></li> --}}
                                            @else 
                                            <li><a href="#">No Pharmacy</a></li>                                                
                                            @endif

                                            {{-- <li><a href="#">AMNA ORGANICS<span class="float-right">22</span></a></li>
                                            <li><a href="#">HARYAALI<span class="float-right">05</span></a></li>
                                            <li><a href="#">CONATURAL<span class="float-right">68</span></a></li> --}}
                                            
                                        </ul>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <div class="col-md-8 col-lg-9 order-1 order-md-2 mb-5 mb-md-0">
                        <div class="row align-items-center justify-content-between mb-4">
                            {{-- <div class="col-auto mb-3 mb-sm-0">
                                <form method="get">
                                    <div class="custom-select-1">
                                        <select class="form-control border">
                                            <option value="rating">Select sorting</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="price">Sort by price: low to high</option>
                                            <option value="price-desc">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                </form>
                            </div> --}}



                            {{-- <div class="col-auto">
                                <div class="d-flex align-items-center">
                                    <span>Showing 1-20 of 100 results</span>
                                    <a href="#" class="text-color-dark text-3 ml-2" data-toggle="tooltip" data-placement="top" title="Grid"><i class="fas fa-th"></i></a>
                                    <a href="#" class="text-color-dark text-3 ml-2" data-toggle="tooltip" data-placement="top" title="List"><i class="fas fa-list-ul"></i></a>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            @foreach ($products as $product)
                                

                            <div class="col-sm-6 col-md-3 mb-4">
                                <div class="product portfolio-item portfolio-item-style-2">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                        <div class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                            <a href="#">
                                                <img src="{{asset('frontimages/noimg.jpg')}}" class="img-fluid" alt="">
                                            </a>
                                            <div class="image-frame-action">
                                                {{-- <a href="{{route('cart', [$product, $product])}}" id="btncart-{{$product->image_id}}" onclick="change('{{$product->image_id}}')" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a> --}}
                                                <a href="{{route('details', $product['name'])}}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">View Details</a><br>
                                     
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                                        <div class="product-info-title">
                                            <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">{{@$product['name']}}</a></h3><br>
                                            @foreach ($product['pharmacyList'] as $item)
                                 
                                            @if ($item['price'] == null)
                                            <span class="price font-primary text-4"><strong class="text-color-dark">{{@$item['name'].': '. 'N/A'}}</strong></span><br>
                                            {{-- <a href="{{route('cart', [$product['name'], $item['name'], 0, $item['quantity']])}}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a><br> --}}
                                            
                                            @else 
                                            <span class="price font-primary text-4"><strong class="text-color-dark">{{@$item['name'].': '.@$item['price'].'PKR'}}</strong></span><br>
                                            {{-- <a href="{{route('cart', [$product['name'], $item['name'], @$item['price'], $item['quantity']])}}" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a><br>
                                                                                         --}}
                                            @endif
                                                
                                            @endforeach

                                            {{-- <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$69</strong></span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endforeach

                            {{-- <div class="col-sm-6 col-md-3 mb-4">
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
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-sm-6 col-md-3 mb-4">
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
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-sm-6 col-md-3 mb-4">
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
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-sm-6 col-md-3 mb-4">
                                <div class="product portfolio-item portfolio-item-style-2">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                        <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                            <a href="shop-product-detail-right-sidebar.html">
                                                <img src="img/products/product-5.jpg" class="img-fluid" alt="">
                                            </a>
                                            <span class="image-frame-action">
                                                <a href="#" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                                        <div class="product-info-title">
                                            <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">Timez Watch</a></h3>
                                            <span class="price font-primary text-4"><strong class="text-color-dark">$119</strong></span>
                                            <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$199</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-sm-6 col-md-3 mb-4">
                                <div class="product portfolio-item portfolio-item-style-2">
                                    <div class="image-frame image-frame-style-1 image-frame-effect-2 mb-3">
                                        <span class="image-frame-wrapper image-frame-wrapper-overlay-bottom image-frame-wrapper-overlay-light image-frame-wrapper-align-end">
                                            <a href="shop-product-detail-right-sidebar.html">
                                                <img src="img/products/product-6.jpg" class="img-fluid" alt="">
                                            </a>
                                            <span class="image-frame-action">
                                                <a href="#" class="btn btn-primary btn-rounded font-weight-semibold btn-v-3 btn-fs-2">ADD TO CART</a>
                                            </span>
                                        </span>
                                    </div>
                                    <div class="product-info d-flex flex-column flex-lg-row justify-content-between">
                                        <div class="product-info-title">
                                            <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">Clauren Bag</a></h3>
                                            <span class="price font-primary text-4"><strong class="text-color-dark">$289</strong></span>
                                            <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$299</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-sm-6 col-md-3 mb-4">
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
                                            <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">Classik Sunglasses</a></h3>
                                            <span class="price font-primary text-4"><strong class="text-color-dark">$99</strong></span>
                                            <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$199</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                            {{-- <div class="col-sm-6 col-md-3 mb-4">
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
                                            <h3 class="text-color-default text-2 line-height-1 mb-1"><a href="shop-product-detail-right-sidebar.html">High Heels Shoes</a></h3>
                                            <span class="price font-primary text-4"><strong class="text-color-dark">$79</strong></span>
                                            <span class="old-price font-primary text-line-trough text-1"><strong class="text-color-default">$99</strong></span>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                        <hr class="mt-5 mb-4">
                        {{-- <div class="row align-items-center justify-content-between">
                            <div class="col-auto mb-3 mb-sm-0">
                                <span>Showing 1-20 of 100 results</span>
                            </div>
                            <div class="col-auto">
                                <nav aria-label="Page navigation example">
                                      <ul class="pagination mb-0">
                                        <li class="page-item">
                                              <a class="page-link prev" href="#" aria-label="Previous">
                                                <span><i class="fas fa-angle-left" aria-label="Previous"></i></span>
                                              </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">...</li>
                                        <li class="page-item"><a class="page-link" href="#">15</a></li>
                                        <li class="page-item">
                                              <a class="page-link next" href="#" aria-label="Next">
                                                <span><i class="fas fa-angle-right" aria-label="Next"></i></span>
                                              </a>
                                        </li>
                                      </ul>
                                </nav>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>



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
<script src="{{asset('frontjs/nouislider.min.js')}}"></script>

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