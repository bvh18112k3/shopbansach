@extends('user.layout.master')
@section('content')
    <div id="tg-wrapper" class="tg-wrapper tg-haslayout">
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('font_end/images/parallax/bgparallax-07.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>Tác giả</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="{{route('home')}}">trang chủ</a></li>
                            <li><a href="{{route('author')}}">Tác giả</a></li>
                            <li class="tg-active"><a href="{{route('author_detail', $author->id)}}">{{$author->name}}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main id="tg-main" class="tg-main tg-haslayout">
        <div class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-authordetail">
                                <figure class="tg-authorimg">
                                    @if(!empty($author->image))
                                        <img style="height:242px; width: 170px;" src="{{asset($author->image)}}" alt="image description">
                                    @endif
                                </figure>
                                <div class="tg-authorcontentdetail">
                                    <div class="tg-sectionhead">
                                        <h2>@foreach($count as $c)<span>{{$c->count}} cuốn sách được bán ở cửa hàng chúng tôi</span> @endforeach{{$author->name}}</h2>
                                    </div>
                                    <div class="tg-description">
                                        {!! $author->description !!}
                                    </div>
                                    <div class="tg-booksfromauthor">
                                        <div class="tg-sectionhead">
                                            <h2>Sách của tác giả {{$author->name}}</h2>
                                        </div>
                                        <div class="row">
                                            @foreach($data as $bk)
                                                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
                                                    <div class="tg-postbook">
                                                        <figure class="tg-featureimg">
                                                            <div class="tg-bookimg">
                                                                <div class="tg-frontcover"><img style="height: 205px" src="{{asset($bk->image)}}" alt="image description"></div>
                                                                <div class="tg-backcover"><img style="height: 205px" src="{{asset($bk->image)}}" alt="image description"></div>
                                                            </div>
                                                            <form method="post" action="{{route('postCart')}}">
                                                                @csrf
                                                                <input type="hidden" name="book_id" value="{{$bk->id}}">
                                                                @if(Auth::user())
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                @endif
                                                                <input type="hidden" name="quantity" value="1">
                                                                <input type="hidden" name="sum_money"
                                                                       value="{{$bk->price - ($bk->price*$bk->discount)/100}}">
                                                                <input type="hidden" value="note" name="note">
                                                                <button class="tg-btnaddtowishlist">
                                                                    <i class="icon-heart"></i>
                                                                    <span>Mua ngay</span>
                                                                </button>
                                                            </form>
                                                        </figure>
                                                        <div class="tg-postbookcontent">
                                                            <div class="tg-themetagbox"><span class="tg-themetag">sale {{$bk->discount}}%</span></div>
                                                            <div class="tg-booktitle">
                                                                <h3><a href="{{asset(route('book-detail', ['id'=> $bk->id, 'author_id'=> $bk->author_id]))}}">{{$bk->name}}</a></h3>
                                                            </div>
                                                            <span class="tg-bookwriter">By: <a href="{{route('author_detail', $bk->Author->id)}}">{{$bk->Author->name}}</a></span>
                                                            @php
                                                                $reviewed = false;
                                                            @endphp
                                                            @foreach($review as $r)
                                                                @if($r->book_id == $bk->id)
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
												                       <ins>{{number_format($bk->price - ($bk->price*$bk->discount)/100, 0, '', '.')}}đ</ins>
												                       <del>{{number_format($bk->price, 0, '', '.' )}}đ</del>
											                        </span>
                                                            <form method="post" action="{{route('postCart')}}">
                                                                @csrf
                                                                <input type="hidden" name="book_id" value="{{$bk->id}}">
                                                                @if(Auth::user())
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                @endif
                                                                <input type="hidden" name="quantity" value="1">
                                                                <input type="hidden" name="sum_money"
                                                                       value="{{$bk->price - ($bk->price*$bk->discount)/100}}">
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

                    </div>
                </div>
            </div>
        </div>

    </main>
    </div>

@endsection
