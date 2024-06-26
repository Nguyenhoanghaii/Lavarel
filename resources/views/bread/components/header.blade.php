<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel </title>
    <link href='http://fonts.googleapis.com/css?family=Dosis:300,400' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/dest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/vendors/colorbox/example3/colorbox.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/rs-plugin/css/settings.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/rs-plugin/css/responsive.css') }}">
    <link rel="stylesheet" title="style" href="{{ asset('assets/dest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dest/css/animate.css') }}">
    <link rel="stylesheet" title="style" href="{{ asset('assets/dest/css/huong-style.css') }}">
    <script src="{{ asset('assets/dest/js/jquery.js') }}"></script>
</head>

<body>

    <div id="header">
        <div class="header-top">
            <div classcontainer>
                <div class="pull-left auto-width-left">
                    <ul class="top-menu menu-beta l-inline">
                        <li><a href=""><i class="fa fa-home"></i> 90-92 Lê Thị Riêng, Bến Thành, Quận 1</a></li>
                        <li><a href=""><i class="fa fa-phone"></i> 0163 296 7751</a></li>
                    </ul>
                </div>
                <div class="pull-right auto-width-right">
                    <ul class="top-details menu-beta l-inline">
                        <li><a href="#"><i class="fa fa-user"></i>
                        @if (Auth::check())
                            {{Auth::user()->full_name;}}
                            @else
                            Tai khoan
                        @endif
                        </a></li>
                        @if (Auth::check())
                            <li><a href="{{ route('logout') }}">Đăng xuat</a></li>
                        @else
                            <li><a href="{{ route('user.create') }}">Đăng kí</a></li>
                        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                        @endif
                        
                        
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div> <!-- .container -->
        </div> <!-- .header-top -->
        <div class="header-body">
            <div class="container beta-relative">
                <div class="pull-left">
                    <a href="{{ route('home') }}" id="logo"><img src="assets/dest/images/logo-cake.png"
                            width="200px" alt=""></a>
                </div>
                <div class="pull-right beta-components space-left ov">
                    <div class="space10">&nbsp;</div>
                    <div class="beta-comp">
                        <form role="search" method="get" id="searchform" action="/">
                            <input type="text" value="" name="s" id="s"
                                placeholder="Nhập từ khóa..." />
                            <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                        </form>
                    </div>

                    <div class="beta-comp">
                        <div class="cart">
                            <div class="beta-select"><i class="fa fa-shopping-cart"></i> Giỏ hàng
                                ({{ Session::get('sl') ?? 0 }}) <i class="fa fa-chevron-down"></i></div>
                            <div class="beta-dropdown cart-body">
                                @php
                                    $tongTien = 0;
                                @endphp

                                @if (Session::get('cart'))
                                    @foreach (Session::get('cart') as $item)
                                        <div class="cart-item" style="display:flex">
                                            <div class="media">
                                                <a class="pull-left" href="#"><img
                                                        src="{{ asset('image/product/' . $item->image) }}"
                                                        alt=""></a>
                                                <div class="media-body">
                                                    <span class="cart-item-title">{{ $item->name }}</span>
                                                    <span class="cart-item-options">Size: XS; Colar: Navy</span>
                                                    <span class="cart-item-amount"> {{ $item->quantity }}
                                                        *<span></span>{{ $item->unit_price }}</span> 
                                                    
                                                </div>
                                                @php
                                                    $tongTien += $item->quantity * $item->unit_price;
                                                @endphp
                                            </div>
                                            
                                            <a href="/remove/{{$item->id}}" style="color: red">x</a>
                                        </div>
                                    @endforeach
                                @endif



                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền: <span
                                            class="cart-total-value">{{ $tongTien }}</span></div>
                                    <div class="clearfix"></div>

                                    <div class="center">
                                        <div class="space10">&nbsp;</div>
                                        <a href="/checkout" class="beta-btn primary text-center">Đặt hàng <i
                                                class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .cart -->
                    </div>
                </div>
                <div class="clearfix"></div>
            </div> <!-- .container -->
        </div> <!-- .header-body -->
        <div class="header-bottom" style="background-color: #0277b8;">
            <div class="container">
                <a class="visible-xs beta-menu-toggle pull-right" href="#"><span
                        class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
                <div class="visible-xs clearfix"></div>
                <nav class="main-menu">
                    <ul class="l-inline ov">
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li><a href="#">Sản phẩm</a>
                            <ul class="sub-menu">
                                <li><a href="product_type.html">Sản phẩm 1</a></li>
                                <li><a href="product_type.html">Sản phẩm 2</a></li>
                                <li><a href="product_type.html">Sản phẩm 4</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('about') }}">Giới thiệu</a></li>
                        <li><a href="{{ route('contact') }}">Liên hệ</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </nav>
            </div> <!-- .container -->
        </div> <!-- .header-bottom -->
    </div> <!-- #header -->
