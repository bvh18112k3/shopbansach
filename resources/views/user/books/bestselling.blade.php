@extends('user.layout.master')
@section('content')
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100"
         data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('font_end/images/parallax/bgparallax-07.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>Best Selling</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="{{route('home')}}">home</a></li>
                            <li class="tg-active"><a href="{{route('bestselling')}}">Best Selling</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main id="tg-main" class="tg-main tg-haslayout">
        <!--************************************
                News Grid Start
        *************************************-->
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div id="tg-twocolumns" class="tg-twocolumns">
                        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-9 pull-right">
                            <div id="tg-content" class="tg-content">
                                <div class="tg-products">
                                    <div class="tg-sectionhead">
                                        <h2><span>People’s Choice</span>Bestselling Books</h2>
                                    </div>
                                    <div class="tg-featurebook alert" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <div class="tg-featureditm">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 hidden-sm hidden-xs">
                                                    <figure><img style="width: 250px; height: 360px" src="{{$book_hot->image}}" alt="image description">
                                                    </figure>
                                                </div>
                                                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                                                    <div class="tg-featureditmcontent">
                                                        <div class="tg-themetagbox"><span
                                                                class="tg-themetag">featured</span></div>
                                                        <div class="tg-booktitle">
                                                            <h3><a href="javascript:void(0);">{{$book_hot->name}}</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">{{$book_hot->Author->name}}</a></span>
                                                        @php
                                                            $reviewed = false;
                                                        @endphp
                                                        @foreach($review as $r)
                                                            @if($r->book_id == $book_hot->id)
                                                                @php
                                                                    $reviewed = true;
                                                                @endphp
                                                                <div class="rating @if($r->star == 1) stars1
                                                    @elseif($r->star == 2) stars2
                                                    @elseif($r->star == 3) stars3
                                                    @elseif($r->star == 4) stars4
                                                    @elseif($r->star == 5) stars5
                                                    @else stars0 @endif">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <span dat-rating="{{ $i }}"><i class="fa fa-star"
                                                                                                       id="star{{$i}}"></i></span>
                                                                    @endfor

                                                                </div>

                                                            @endif
                                                        @endforeach
                                                        @if (!$reviewed)
                                                            <span>Chưa có đánh giá</span>
                                                        @endif
                                                        <div class="tg-priceandbtn">
																<span class="tg-bookprice">
																	<ins>{{price_discount($book_hot->price, $book_hot->discount)}} VND</ins>
																	<del>{{price_format($book_hot->price)}} VND</del>
																</span>
                                                            <a class="tg-btn tg-btnstyletwo tg-active"
                                                               href="javascript:void(0);">
                                                                <i class="fa fa-shopping-basket"></i>
                                                                <em>Add To Basket</em>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tg-productgrid">
                                        @foreach($data as $item)
                                            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                                <div class="tg-postbook">
                                                    <figure class="tg-featureimg">
                                                        <div class="tg-bookimg">
                                                            <div class="tg-frontcover"><img
                                                                    src="{{asset($item->image)}}"
                                                                    alt="image description"></div>
                                                            <div class="tg-backcover"><img src="{{asset($item->image)}}"
                                                                                           alt="image description">
                                                            </div>
                                                        </div>
                                                        <form method="post" action="{{route('postCart')}}">
                                                            @csrf
                                                            <input type="hidden" name="book_id" value="{{$item->id}}">
                                                            @if(Auth::user())
                                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            @endif
                                                            <input type="hidden" name="quantity" value="1">
                                                            <input type="hidden" name="sum_money"
                                                                   value="{{$item->price - ($item->price*$item->discount)/100}}">
                                                            <input type="hidden" value="note" name="note">
                                                            <button class="tg-btnaddtowishlist" href="">
                                                                <i class="icon-heart"></i>
                                                                <span>Mua ngay</span>
                                                            </button>
                                                        </form>
                                                    </figure>
                                                    <div class="tg-postbookcontent">
                                                        <div class="tg-themetagbox"><span class="tg-themetag">sale {{$item->discount}}%</span>
                                                        </div>
                                                        <div class="tg-booktitle">
                                                            <h3>
                                                                <a href="{{route('book-detail', ['id'=>$item->id, 'author_id'=>$item->author_id])}}">{{$item->name}}</a>
                                                            </h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a
                                                                href="{{route('author_detail', $item->author)}}">{{$item->Author->name}}</a></span>
                                                        @php
                                                            $reviewed = false;
                                                        @endphp
                                                        @foreach($review as $r)
                                                            @if($r->book_id == $item->id)
                                                                @php
                                                                    $reviewed = true;
                                                                @endphp
                                                                <div class="rating @if($r->star == 1) stars1
                                                    @elseif($r->star == 2) stars2
                                                    @elseif($r->star == 3) stars3
                                                    @elseif($r->star == 4) stars4
                                                    @elseif($r->star == 5) stars5
                                                    @else stars0 @endif">
                                                                    @for ($i = 1; $i <= 5; $i++)
                                                                        <span dat-rating="{{ $i }}"><i class="fa fa-star"
                                                                                                       id="star{{$i}}"></i></span>
                                                                    @endfor

                                                                </div>

                                                            @endif
                                                        @endforeach
                                                        @if (!$reviewed)
                                                            <span>Chưa có đánh giá</span>
                                                        @endif
                                                        <span class="tg-bookprice">
															<ins>{{number_format($item->price - ($item->price*$item->discount)/100, 0, '', '.')}}đ</ins>
                                                            <del>{{number_format($item->price, 0, '', '.' )}}đ</del>
														</span>
                                                        <form method="post" action="{{route('postCart')}}">
                                                            @csrf
                                                            <input type="hidden" name="book_id" value="{{$item->id}}">
                                                            @if(Auth::user())
                                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            @endif
                                                            <input type="hidden" name="quantity" value="1">
                                                            <input type="hidden" name="sum_money"
                                                                   value="{{$item->price - ($item->price*$item->discount)/100}}">
                                                            <input type="hidden" value="" name="note">
                                                            <button class="tg-btn tg-btnstyletwo" type="submit">
                                                                <i class="fa fa-shopping-basket"></i>
                                                                <em>Add To Basket</em>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3 pull-left">
                            <aside id="tg-sidebar" class="tg-sidebar">

                                <div class="tg-widget tg-catagories">
                                    <div class="tg-widgettitle">
                                        <h3>Categories</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            @foreach($book_type as $cate)
                                                <li><a href="{{route('book_type', $cate->id)}}">
                                                        <span>{{$cate->name}}</span>
                                                        <em>
                                                            @foreach($count as $ca)
                                                                @foreach($ca as $c)
                                                                    @if($c->book_type_id === $cate->id)
                                                                        {{$c->count}}
                                                                    @endif
                                                                @endforeach
                                                            @endforeach

                                                        </em>
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                </div>
                                <div class="tg-widget tg-widgettrending">
                                    <div class="tg-widgettitle">
                                        <h3>Trending Products</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/products/img-04.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things
                                                                    Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/products/img-05.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things
                                                                    Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/products/img-06.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things
                                                                    Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                            <li>
                                                <article class="tg-post">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/products/img-07.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-postcontent">
                                                        <div class="tg-posttitle">
                                                            <h3><a href="javascript:void(0);">Where The Wild Things
                                                                    Are</a></h3>
                                                        </div>
                                                        <span class="tg-bookwriter">By: <a href="javascript:void(0);">Kathrine Culbertson</a></span>
                                                    </div>
                                                </article>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tg-widget tg-widgetinstagram">
                                    <div class="tg-widgettitle">
                                        <h3>Instagram</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            <li>
                                                <figure>
                                                    <img src="{{asset('font_end/images/instagram/img-01.jpg')}}" alt="image description">
                                                    <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{asset('font_end/images/instagram/img-02.jpg')}}" alt="image description">
                                                    <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{asset('font_end/images/instagram/img-03.jpg')}}" alt="image description">
                                                    <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{asset('font_end/images/instagram/img-04.jpg')}}" alt="image description">
                                                    <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{asset('font_end/images/instagram/img-05.jpg')}}" alt="image description">
                                                    <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{asset('font_end/images/instagram/img-06.jpg')}}" alt="image description">
                                                    <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{asset('font_end/images/instagram/img-07.jpg')}}" alt="image description">
                                                    <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{asset('font_end/images/instagram/img-08.jpg')}}" alt="image description">
                                                    <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                            <li>
                                                <figure>
                                                    <img src="{{asset('font_end/images/instagram/img-09.jpg')}}" alt="image description">
                                                    <figcaption><a href="javascript:void(0);"><i class="icon-heart"></i><em>50,134</em></a>
                                                    </figcaption>
                                                </figure>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tg-widget tg-widgetblogers">
                                    <div class="tg-widgettitle">
                                        <h3>Top Bloogers</h3>
                                    </div>
                                    <div class="tg-widgetcontent">
                                        <ul>
                                            <li>
                                                <div class="tg-author">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/author/imag-03.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-authorcontent">
                                                        <h2><a href="javascript:void(0);">Jude Morphew</a></h2>
                                                        <span>21,658 Published Books</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="tg-author">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/author/imag-04.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-authorcontent">
                                                        <h2><a href="javascript:void(0);">Jude Morphew</a></h2>
                                                        <span>21,658 Published Books</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="tg-author">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/author/imag-05.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-authorcontent">
                                                        <h2><a href="javascript:void(0);">Jude Morphew</a></h2>
                                                        <span>21,658 Published Books</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="tg-author">
                                                    <figure><a href="javascript:void(0);"><img
                                                                src="{{asset('font_end/images/author/imag-06.jpg')}}"
                                                                alt="image description"></a></figure>
                                                    <div class="tg-authorcontent">
                                                        <h2><a href="javascript:void(0);">Jude Morphew</a></h2>
                                                        <span>21,658 Published Books</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                News Grid End
        *************************************-->
    </main>
@endsection
