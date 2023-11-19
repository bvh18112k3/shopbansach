@extends('user.layout.master')
@section('content')
    <div class="tg-innerbanner tg-haslayout tg-parallax tg-bginnerbanner" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="{{asset('font_end/images/parallax/bgparallax-07.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="tg-innerbannercontent">
                        <h1>Authors</h1>
                        <ol class="tg-breadcrumb">
                            <li><a href="{{route('home')}}">trang chủ</a></li>
                            <li class="tg-active"><a href="{{route('author')}}">tác giả</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <main id="tg-main" class="tg-main tg-haslayout">
        <!--************************************
                Authors Start
        *************************************-->
        <div class="tg-authorsgrid">
            <div class="container">
                <div class="row">
                    <div class="tg-authors">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="tg-sectionhead">
                                <h2>Các tác giả</h2>
                            </div>
                        </div>
                        @foreach($authors as $author)
                            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                                <div class="tg-author">
                                    <figure><a href="{{route('author_detail', $author->id)}}">@if(!empty($author->image))<img style="height: 218px" src="{{asset($author->image)}}" alt="image description"> @endif</a></figure>
                                    <div class="tg-authorcontent">
                                        <h2><a href="{{route('author_detail', $author->id)}}">{{$author->name}}</a></h2>
                                        @foreach($count as $co)
                                            @foreach($co as $c)
                                                @if($c->author_id === $author->id)
                                                    <span>Có {{$c->count}} cuốn sách được bán ở của hàng </span>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        <!--************************************
                Authors End
        *************************************-->
        <!--************************************
                Testimonials Start
        *************************************-->
        <section class="tg-parallax tg-bgtestimonials tg-haslayout" data-z-index="-100" data-appear-top-offset="600" data-parallax="scroll" data-image-src="images/parallax/bgparallax-05.jpg">
            <div class="tg-sectionspace tg-haslayout">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-push-2">
                            <div id="tg-testimonialsslider" class="tg-testimonialsslider tg-testimonials owl-carousel">
                                <div class="item tg-testimonial">
                                    <figure><img src="{{asset('font_end/images/author/buivanhuy.jpg')}}"
                                                 alt="image description"></figure>
                                    <blockquote><q>Nhằm cung cấp cho mọi người những kiến thức vô cùng ý nghĩa và giá trị
                                            chúng tôi luôn đem lại những cuốn sách tuyệt vời mong mọi người ủng hộ chúng
                                            tôi</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3>Bùi Văn Huy</h3>
                                        <span>Chủ sở hữu</span>
                                    </div>
                                </div>
                                <div class="item tg-testimonial">
                                    <figure><img style="height: 138.44px;"
                                                 src="{{asset('font_end/images/author/ngocai.jpeg')}}"
                                                 alt="image description"></figure>
                                    <blockquote><q>Consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore
                                            tolore magna aliqua enim ad minim veniam, quis nostrud exercitation ullamcoiars
                                            nisi ut aliquip commodo.</q></blockquote>
                                    <div class="tg-testimonialauthor">
                                        <h3>Ngọc Nguyễn</h3>
                                        <span>Đồng sở hữu </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--************************************
                Testimonials End
        *************************************-->
        <!--************************************
                Picked By Author Start
        *************************************-->
        <section class="tg-sectionspace tg-haslayout">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="tg-sectionhead">
                            <h2><span>Some Great Books</span>Picked By Authors</h2>
                            <a class="tg-btn" href="{{route('book')}}">View All</a>
                        </div>
                    </div>
                    <div id="tg-pickedbyauthorslider" class="tg-pickedbyauthor tg-pickedbyauthorslider owl-carousel">
                        @foreach($b5 as $b)
                            <div class="item">
                                <div class="tg-postbook" style="height: 600px">
                                    <figure class="tg-featureimg">
                                        <div class="tg-bookimg">
                                            <div class="tg-frontcover"><img style="height: 302px" src="{{asset($b->image)}}"
                                                                            alt="image description"></div>
                                        </div>
                                        <div class="tg-hovercontent">
                                            {{--                                        <div class="tg-description">--}}
                                            {{--                                            <p>Consectetur adipisicing elit sed do eiusmod tempor incididunt labore--}}
                                            {{--                                                toloregna aliqua enim adia minim veniam, quis nostrud.</p>--}}
                                            {{--                                        </div>--}}
                                            <strong class="tg-bookpage">Book Pages: {{$b->pages}}</strong>
                                            {{--                                        <strong class="tg-bookcategory">Category: Adventure, Fun</strong>--}}
                                            <strong class="tg-bookprice">Price: {{price_discount($b->price, $b->discount)}}
                                                VND</strong>
                                            <div class="tg-ratingbox">
                                                @php
                                                    $reviewed = false;
                                                @endphp
                                                @foreach($review as $r)
                                                    @if($r->book_id == $b->id)
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
                                                @endif</div>
                                        </div>
                                    </figure>
                                    <div class="tg-postbookcontent">
                                        <div class="tg-booktitle">
                                            <h3>
                                                <a href="{{route('book-detail', ['id'=> $b->id, 'author_id'=> $b->author_id])}}">{{$b->name}}</a>
                                            </h3>
                                        </div>
                                        <span class="tg-bookwriter">Tác giả: <a
                                                href="{{route('author_detail', $b->Author->id)}}">{{$b->Author->name}}</a></span>
                                        <form method="post" action="{{route('postCart')}}">
                                            @csrf
                                            <input type="hidden" name="book_id" value="{{$b->id}}">
                                            @if(Auth::user())
                                                <input type="hidden" name="user_id"
                                                       value="{{Auth::user()->id}}">
                                            @endif
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="sum_money"
                                                   value="{{$b->price - ($b->price*$b->discount)/100}}">
                                            <input type="hidden" value="" name="note">
                                            <button class="tg-btn tg-btnstyletwo tg-active" type="submit">

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
        </section>
        <!--************************************
                Picked By Author End
        *************************************-->
    </main>
@endsection
