<header id="tg-header" class="tg-header tg-haslayout">
    <div class="tg-topbar">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="tg-addnav">
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-envelope"></i>
                                <em>Contact</em>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <i class="icon-question-circle"></i>
                                <em>Help</em>
                            </a>
                        </li>
                    </ul>
                    <div class="dropdown tg-themedropdown tg-currencydropdown">
                        <a href="javascript:void(0);" id="tg-currenty" class="tg-btnthemedropdown"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-earth"></i>
                            <span>Currency</span>
                        </a>
                        <ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-currenty">
                            <li>
                                <a href="javascript:void(0);">
                                    <i>£</i>
                                    <span>British Pound</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <i>$</i>
                                    <span>Us Dollar</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <i>€</i>
                                    <span>Euro</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tg-userlogin">
                        @if(Auth::user())
                            <figure>
                                <a href="javascript:void(0);">
                                    <img src="{{asset(Auth()->user()->image)}}" alt="image description">
                                </a>
                            </figure>
                            <div class="dropdown tg-themedropdown tg-currencydropdown">
                                <a href="javascript:void(0);" id="tg-currenty" class="tg-btnthemedropdown"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="icon-earth"></i>
                                    <span>hi, {{Auth::user()->name}}</span>
                                </a>
                                <ul class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-currenty">
                                    <li>
                                        <a href="{{route('infor')}}">
                                            <span><a >Xem thông tin cá nhân</a></span>
                                        </a>
                                    </li>
                                    <li><a href="{{route('cart', Auth::user()->id)}}">
                                            Giỏ hàng
                                        </a></li>
                                    <li><a href="{{route('orderUser', ['user'=>Auth()->user()->id])}}">
                                            Đơn hàng
                                        </a></li>
                                    <li>
                                        <a href="{{route('updatepass')}}">
                                            <span><a href="">Đổi mật khẩu</a></span>
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="http://127.0.0.1:8000/logout">
                                            @csrf
                                            <a class="block w-full px-4 py-2 text-left text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out" href="http://127.0.0.1:8000/logout" onclick="event.preventDefault();
                                                this.closest('form').submit();">Đăng xuất</a>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="{{route('login')}}" class="btn btn-success">Đăng nhập</a>
                            <a href="{{route('signUp')}}" class="btn btn-primary">Đăng ký</a>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-middlecontainer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <strong class="tg-logo"><a href="index-2.html"><img src="{{asset('font_end/images/logo.png')}}"
                                                                        alt="company name here"></a></strong>
                    <div class="tg-wishlistandcart">
                        <div class="dropdown tg-themedropdown tg-minicartdropdown">
                            <a href="javascript:void(0);" id="tg-minicart" class="tg-btnthemedropdown"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Auth()->user())
                                    @if($countCart==0)
                                        <span class="tg-themebadge"></span>
                                    @else
                                        <span class="tg-themebadge">{{$countCart}}</span>
                                    @endif
                                @endif
                                    <span class="tg-themebadge"></span>
                                <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" viewBox="0 0 576 512">
                                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path
                                        d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/>
                                </svg>

                            </a>
                            @if(Auth()->user() && $countCart >0)
                                <div class="dropdown-menu tg-themedropdownmenu" aria-labelledby="tg-minicart">
                                    <div class="tg-minicartbody">
                                        @php
                                        $sum = 0;
                                        @endphp
                                        @foreach($cartHead as $c )
                                            <div class="tg-minicarproduct">
                                                <figure>
                                                    <img style="width: 70px; height: 100px; " src="{{asset($c->Book->image)}}"
                                                         alt="image description">
                                                </figure>
                                                <div class="tg-minicarproductdata">
                                                    <h5><a href="{{route('book-detail', ['id'=>$c->Book->id, 'author_id'=>$c->Book->author_id])}}">{{$c->Book->name}}</a>
                                                    </h5>
                                                    <h5>Số lượng: {{$c->quantity}}</h5>
                                                    <h5>Giá: {{price_discount($c->Book->price, $c->Book->discount)}} VND</h5>
                                                    <h6><a href="javascript:void(0);">{{price_format($c->sum_money) }} VND</a></h6>
                                                </div>
                                            </div>
                                            @php $sum += $c->sum_money;  @endphp
                                        @endforeach
                                    </div>
                                    <div class="tg-minicartfoot">
                                        <form action="" id="clear">
                                            @csrf
                                        </form>
                                        <button class="tg-btnemptycart" onclick="if(confirm('Bạn có muốn xóa')){
                                            document.getElementById('clear').submit();
                                        }">
                                            <i class="fa fa-trash-o"></i>
                                            <span>Clear Your Cart</span>
                                        </button>
                                        <span class="tg-subtotal">Subtotal: <strong>{{number_format($sum)}} VND</strong></span>
                                        <div class="tg-btns">
                                            <a class="tg-btn tg-active" href="{{route('cart', Auth::user()->id)}}">View Cart</a>
                                            <a class="tg-btn" href="javascript:void(0);">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="tg-searchbox">
                        <form class="tg-formtheme tg-formsearch" method="post" action="{{route('search')}}">
                            @csrf
                            <fieldset>
                                <input type="text" name="search" class="typeahead form-control"
                                       placeholder="Tìm kiếm theo tác giả, tên sách, thể loại sách ">
                                <button type="submit">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
                                    </svg>
                                </button>
                            </fieldset>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="tg-navigationarea">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <nav id="tg-nav" class="tg-nav">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#tg-navigation" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div id="tg-navigation" class="collapse navbar-collapse tg-navigation">
                            <ul>
                                <li class="menu-item-has-children menu-item-has-mega-menu">
                                    <a href="javascript:void(0);">All Categories</a>
                                    <div class="mega-menu">
                                        <ul class="tg-themetabnav" role="tablist">
                                            @foreach($book_type as $bt)
                                                <li role="presentation">
                                                    <a href="#booktype{{$bt->id}}" aria-controls="booktype{{$bt->id}}"
                                                       role="tab" data-toggle="tab">{{$bt->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                        <div class="tab-content tg-themetabcontent">
                                            @foreach($book_type as $bot)
                                                <div role="tabpanel" class="tab-pane " id="booktype{{$bot->id}}">
                                                    <ul>
                                                        <li>
                                                            <div class="tg-linkstitle">
                                                                <h2>{{$bot->name}}</h2>
                                                            </div>
                                                            <ul >
                                                                @foreach($bookDetail as $item)
                                                                    @if($item->book_type_id == $bot->id)
                                                                        <li><a href="{{route('book-detail', ['id'=> $item->Book->id, 'author_id'=> $item->Book->author_id])}}">{{$item->Book->name}}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                                <li class="">
                                    <a href="{{route('home')}}">Home</a>
                                </li>
                                <li class="">
                                    <a href="{{route('author')}}">Authors</a>
                                </li>
                                <li><a href="{{route('bestselling')}}">Best Selling</a></li>
                                <li class="menu-item-has-children">
                                    <a href="{{route('newlist')}}">Latest News</a>
                                </li>
                                <li><a href="{{route('contact')}}">Contact</a></li>
                                <li class="">
                                    <a href="{{route('book')}}">Products</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
