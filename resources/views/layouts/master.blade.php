<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Интернет магазин Electro @yield('title')</title>

    <!-- Google font -->
    {{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet"> --}}

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}" />



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->

</head>
<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +99 373 15 18</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> baxodir8991@gmail.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> Массив Феруза 15</a></li>
            </ul>
            <ul class="header-links pull-right">
                <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li>
                @guest
                <li><a href="{{route('login')}}"><i class="fa fa-user-o"></i> Мой аккаунт</a></li>
                @endguest
                @auth
                <li><a href="{{route('home')}}"><i class="fa fa-user-o"></i> Мой аккаунт</a></li>
                <li><a href="{{route('get-logout')}}">Выйти</a></li>
                @endauth
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{url('/')}}" class="logo">
                            <img src="{{url('img/logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">Категории</option>
                                <option value="1">Category 01</option>
                                <option value="1">Category 02</option>
                            </select>
                            <input class="input" placeholder="Ищите здесь">
                            <button class="search-btn">Искать</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Wishlist -->
                        <div>
                            <a href="#">
                                <i class="fa fa-heart-o"></i>
                                <span>Ваш Вишлист</span>
                                <div class="qty">2</div>
                            </a>
                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Корзина</span>
                                @if(session()->has('orderId'))
                                <div class="qty">{{$order->getFullCount()}}</div>
                                @else
                                <div class="qty">0</div>
                                @endif
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @if(session()->has('orderId'))
                                    @foreach ($order->products as $product)
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="{{asset('img/'.$product->image)}}" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">{{$product->name}}</a></h3>
                                            <h4 class="product-price"><span
                                                    class="qty">{{$product->pivot->count}}x</span>{{$product->price}}
                                                сум.</h4>
                                        </div>
                                        <form method="POST" action="{{route('basket-remove', $product)}}">
                                            @csrf
                                            <button class="delete" type="submit"><i class="fa fa-close"></i></button>
                                        </form>
                                    </div>
                                    @endforeach
                                    @endif
                                    {{-- 
                                    <div class="product-widget">
                                        <div class="product-img">
                                            <img src="./img/product02.png" alt="">
                                        </div>
                                        <div class="product-body">
                                            <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                            <h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
                                        </div>
                                        <button class="delete"><i class="fa fa-close"></i></button>
                                    </div> --}}
                                </div>
                                <div class="cart-summary">
                                    <small>
                                        @if(session()->has('orderId'))
                                        {{$order->getFullCount()}}
                                        @else
                                        0
                                        @endif
                                        кол-во товаров</small>
                                    <h5>Общая сумма:
                                        @if(session()->has('orderId'))
                                        {{$order->getFullPrice()}}
                                        @else
                                        0
                                        @endif
                                        сум.</h5>
                                </div>
                                <div class="cart-btns">
                                    <a href="{{route('basket')}}">Корзина</a>
                                    <a href="{{route('orderPlace')}}">Оформить <i class="fa fa-arrow-circle-right">
                                        </i></a>
                                </div>
                            </div>
                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="{{ url('/') }}">Главная</a></li>
                {{-- <li><a href="{{route('hot-deals')}}">Акции</a></li> --}}
                <li><a href="{{ url('categories') }}">Категории</a></li>
                <li><a href="{{url('/Ноутбуки')}}">Ноутбуки</a></li>
                <li><a href="{{url('/Мобильные_телефоны')}}">Смартфоны</a></li>
                <li><a href="{{url('/Камеры')}}">Камеры</a></li>
                <li><a href="{{url('/Аксессуары')}}">Аксессуары</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                {{-- <h3 class="breadcrumb-header">Главная</h3> --}}
                <ul class="breadcrumb-tree">
                    <li><a href="#">Главная</a></li>
                    <li class="active">Пустой</li>
                </ul>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /BREADCRUMB -->
@if (session()->has('success'))
<p class="alert alert-success" style="text-align: center">{{session()->get('success')}}</p>
@elseif(session()->has('warning'))
<p class="alert alert-warning" style="text-align: center">{{session()->get('warning')}}</p>
@endif
@yield('content')

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Подпишитесь на рассылку <strong> НОВОСТЕЙ</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Введите адрес электронной почты">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> ПОДПИСАТЬСЯ</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->

<!-- FOOTER -->
<footer id="footer">
    <!-- top footer -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">О нас</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                            incididunt ut.</p>
                        <ul class="footer-links">
                            <li><a href="#"><i class="fa fa-map-marker"></i>Массив Феруза 15</a></li>
                            <li><a href="#"><i class="fa fa-phone"></i>+99 373 15 18</a></li>
                            <li><a href="#"><i class="fa fa-envelope-o"></i>baxodir8991@gmail.com</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Категории</h3>
                        <ul class="footer-links">
                            <li><a href="#">Акции</a></li>
                            <li><a href="#">Ноутбуки</a></li>
                            <li><a href="#">Смартфоны</a></li>
                            <li><a href="#">Камеры</a></li>
                            <li><a href="#">Аксессуары</a></li>
                        </ul>
                    </div>
                </div>

                <div class="clearfix visible-xs"></div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Информация</h3>
                        <ul class="footer-links">
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Связаться с нами</a></li>
                            <li><a href="#">Политика конфиденциальности</a></li>
                            <li><a href="#">Заказы и возвраты</a></li>
                            <li><a href="#">Условия использования</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-xs-6">
                    <div class="footer">
                        <h3 class="footer-title">Обслуживание</h3>
                        <ul class="footer-links">
                            <li><a href="#">Мой аккаунт</a></li>
                            <li><a href="#">Просмотр корзины</a></li>
                            <li><a href="#">Вишлист</a></li>
                            <li><a href="#">Отслеживать свой заказ</a></li>
                            <li><a href="#">Помощь</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /top footer -->

    <!-- bottom footer -->
    <div id="bottom-footer" class="section">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <ul class="footer-payments">
                        <li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
                        <li><a href="#"><i class="fa fa-credit-card"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
                        <li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
                    </ul>
                    <span class="copyright">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        &copy; Electro - Все права защищены &nbsp;<script>
                            document.write(new Date().getFullYear());
                        </script>
                    </span>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bottom footer -->
</footer>
<!-- /FOOTER -->

<!-- jQuery Plugins -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/slick.min.js') }}"></script>
<script src="{{ asset('js/nouislider.min.js') }}"></script>
<script src="{{ asset('js/jquery.zoom.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
</body>

</html>